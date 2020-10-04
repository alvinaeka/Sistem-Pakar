<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hama;
use App\Hama_gejala;
use App\Data_latih_hama;
use App\RiwayatHama;
use DB;
use Illuminate\Support\Facades\Auth;

class DiagnosaHamaController extends Controller
{
    public function index()
    {
        $gejala = hama_gejala::orderBy('id', 'asc')->get();

    	return view('Member.Diagnosa.DiagnosaHama', compact('gejala'));
    }
    public function proses(Request $request)
    {
        if(empty($request->input('gejala'))){
            return redirect('/DiagnosaHama')->with('danger', 'Silahkan pilih minimal 1 gejala');
        }
        $selectedgejala = collect($request->input('gejala'))->all();
        $gejala = DB::table('hama_gejala')->whereIn('id', $request->input('gejala'))->get();
        $dbgejalas = DB::table('hama_gejala')->select('id')->get();
        $jumlahdata= DB::table('data_latih_hama')->get()->groupBy('pengujian_ke')->count();
        $dbdatalatih = DB::table('data_latih_hama')->selectRaw('hama_id, gejala_id')->get()->groupBy('hama_id');
        $dbjumlahmunculhama= DB::table('data_latih_hama')->groupBy('hama_id')->selectRaw('hama_id,count(distinct pengujian_ke) as jumlahhama')->get();
        $dbjumlahhama = DB::table('hama')->select('id')->get();
        $hamadatalatih = DB::table('data_latih_hama')->select('hama_id')->get()->groupBy('hama_id');

        $checkdatalatih = $this->checkdatalatih($hamadatalatih, $dbjumlahhama);
        if($checkdatalatih > 0){
            return redirect('/DiagnosaHama')->with('danger', 'Maaf, terjadi kesalahan. Silakan coba beberapa saat lagi.');
        }

        foreach($dbjumlahmunculhama as $hama){
            $munculhama[$hama->hama_id]=$hama->jumlahhama;                    
        }

        foreach($dbgejalas as $gejala=>$value2){
            $arrgejalas[]=$value2->id;
        }

        $arrdbdatalatih[]=array();
        foreach($dbdatalatih as $hamas2=>$value3){
            foreach($value3 as $gejala2=>$value4){
                $arrdbdatalatih[$hamas2][]=$value4->gejala_id;
            }
        }unset($arrdbdatalatih[0]);
        
        $checklaplace = 0;
        foreach($arrdbdatalatih as $keyarrdbdatalatih => $valuearrdbdatalatih) {
            $arrdatalatih[$keyarrdbdatalatih] = array_count_values($valuearrdbdatalatih);
            foreach($arrgejalas as $keyarrgejala => $valuearrgejala){
                if (!array_key_exists($arrgejalas[$keyarrgejala],$arrdatalatih[$keyarrdbdatalatih])){
                    $arrdatalatih[$keyarrdbdatalatih][$valuearrgejala] = 0;
                    $checklaplace++;
                }
            }
            ksort($arrdatalatih);
            ksort($arrdatalatih[$keyarrdbdatalatih]);
        }
        
        if($checklaplace > 0){
            foreach($arrdatalatih as $keyarrdatalatihlaplace => $valuearrdatalatihlaplace){
                foreach($valuearrdatalatihlaplace as $keyarrdatalatihlaplace2 => $valuearrdatalatihlaplace2){

                    $arrdatalatih[$keyarrdatalatihlaplace][$keyarrdatalatihlaplace2] += 1;
                }
            }
            foreach($munculhama as $keymunculhamalaplace => $valuemunculhamalaplace){
                $munculhama[$keymunculhamalaplace] += 1;
            }
        }

        $arrselectedgejala[] = array();
        foreach($arrdatalatih as $keyarrdatalatih => $valuearrdatalatih){
            foreach($selectedgejala as $keyselectedgejala => $valueselectedgejala){
                $arrselectedgejala[$keyarrdatalatih][$keyselectedgejala] = $arrdatalatih[$keyarrdatalatih][$valueselectedgejala];
            }
        }unset($arrselectedgejala[0]);

        $prior = $this->prior($munculhama, $jumlahdata);
        $likelihood = $this->likelihood($arrselectedgejala, $selectedgejala, $munculhama);
        $hasildiagnosis = $this->posterior($prior, $likelihood);
        $nilaicfhasildiagnosis = $this->nilaicfdiagnosis($hasildiagnosis, $request, $arrgejalas);
        $nilaicfcombine = $this->nilaicfcombine($nilaicfhasildiagnosis);
        $this->simpandatalatih($selectedgejala, $hasildiagnosis);
        $riwayat = $this->simpanriwayat($selectedgejala, $hasildiagnosis, $nilaicfcombine);
        $hasil = $this->hasildiagnosa($riwayat);
        return view('Member.Diagnosa.HasilDiagnosaHama', $hasil);

    }
    private function checkdatalatih($hamadatalatih, $dbjumlahhama){
        $checkdatalatih[]=array();
        foreach($hamadatalatih as $keyhamadatalatih => $valuehamadatalatih){
            $checkdatalatih[$keyhamadatalatih]= $valuehamadatalatih;
        }unset($checkdatalatih[0]);
        $check = 0;
        foreach($dbjumlahhama as $valuejumlahhama){
                if(!array_key_exists($valuejumlahhama->id,$checkdatalatih)){
                    $check++;
                }
        }
        return $check;
    }
    private function prior($munculhama, $jumlahdata)
    {
        foreach($munculhama as $keymunculhama => $valuemunculhama){
            $prior[$keymunculhama] = $munculhama[$keymunculhama]/$jumlahdata;
        }
        return $prior;
    }
    private function likelihood($arrselectedgejala, $selectedgejala, $munculhama)
    {
        foreach($arrselectedgejala as $keyarrselectedgejala => $valuearrselectedgejala){
            foreach($selectedgejala as $keyselectedgejala => $valueselectedgejala){
                $likelihood[$keyarrselectedgejala][] = $arrselectedgejala[$keyarrselectedgejala][$keyselectedgejala]/$munculhama[$keyarrselectedgejala];
            }
        }
        return $likelihood;
    }
    private function posterior($prior, $likelihood)
    {
        foreach($likelihood as $keylikelihood1 => $valuelikelihood1){
            $posterior[$keylikelihood1]=$prior[$keylikelihood1]*array_product($likelihood[$keylikelihood1]);
        }
        $diagnosahama= array_search(max($posterior), $posterior);
        return $diagnosahama;
    }
    private function nilaicfdiagnosis($hasildiagnosis, $request, $arrgejalas)
    {
        $dbnilaicf = DB::table('hama_hama_gejala')->select('hama_id', 'hama_gejala_id', 'nilai_cf')->where('hama_id', $hasildiagnosis)->whereIn('hama_gejala_id', $request->input('gejala'))->orderBy('hama_id')->get()->groupBy('hama_id');
        $cfdiagnosa[]=array();
        foreach($dbnilaicf as $nilaicf){
            foreach($nilaicf as $keynilaicf => $valuenilaicf){
                $cfdiagnosa[$valuenilaicf->hama_gejala_id]=$valuenilaicf->nilai_cf;
                foreach($arrgejalas as $keyarrgejala2 => $valuearrgejala2){
                if (!array_key_exists($arrgejalas[$keyarrgejala2],$cfdiagnosa)){
                    $cfdiagnosa[$valuearrgejala2] = 0;
                }
                }
            }
        }unset($cfdiagnosa[0]);
        ksort($cfdiagnosa);
        return $cfdiagnosa;
    }
    private function nilaicfcombine($nilaicfhasildiagnosis)
    {
        $cfdiagnosaawal = array_slice($nilaicfhasildiagnosis, 0, 2);
        $cfdiagnosaselanjutnya = array_slice($nilaicfhasildiagnosis, 2);
        $cfcombine = current($cfdiagnosaawal) + (next($cfdiagnosaawal) * (1-prev($cfdiagnosaawal)));

        foreach($cfdiagnosaselanjutnya as $valuecfdiagnosa){
            $cfcombine = $cfcombine + ($valuecfdiagnosa*(1-$cfcombine));
        }
        $cfcombine *= 100;
        return $cfcombine;
    }
    private function simpandatalatih($selectedgejala, $hasildiagnosis){
        $pengujianke= DB::table('data_latih_hama')->select('pengujian_ke')->latest('pengujian_ke')->first();
        $pengujian = $pengujianke->pengujian_ke + 1;
        foreach($selectedgejala as $keyselectgejala => $selectgejala){
            $insertdatalatih = new Data_latih_hama;
            $insertdatalatih->pengujian_ke = $pengujian;
            $insertdatalatih->hama_id = $hasildiagnosis;
            $insertdatalatih->gejala_id = $selectedgejala[$keyselectgejala];
            $insertdatalatih->save();
        }
    }
    private function simpanriwayat($selectedgejala, $hasildiagnosis, $nilaicfcombine){
        $iduser = Auth::id();
        $riwayatke = DB::table('riwayat_diagnosa_hama')->select('riwayat_ke')->latest('riwayat_ke')->first();
        if(is_null($riwayatke)){
            $riwayat2 = 1;
        }else{
            $riwayat2 = $riwayatke->riwayat_ke + 1;
        }
        foreach($selectedgejala as $keyselectgejala => $selectgejala){
            $insertriwayat = new RiwayatHama;
            $insertriwayat->user_id = $iduser;
            $insertriwayat->riwayat_ke = $riwayat2;
            $insertriwayat->hama_id = $hasildiagnosis;
            $insertriwayat->gejala_id = $selectedgejala[$keyselectgejala];
            $insertriwayat->nilai_cf = $nilaicfcombine;
            $insertriwayat->save();
        }return $riwayat2;
    }
    public function hasildiagnosa($riwayat_ke){
        $hasildiagnosa = DB::table('riwayat_diagnosa_hama')->select('user_id','hama_id', 'gejala_id', 'nilai_cf')->where('riwayat_ke', $riwayat_ke)->get();
        $gejalaid[] = array(); 
        foreach($hasildiagnosa as $valuehasildiagnosa){
            $idhama = $valuehasildiagnosa->hama_id;
            $gejalaid[] = $valuehasildiagnosa->gejala_id;
            $nilai_keyakinan = $valuehasildiagnosa->nilai_cf;
        }unset($gejalaid[0]);
        $namagejala = DB::table('hama_gejala')->select('nama')->whereIn('id', $gejalaid)->get();
        $hamas = Hama::find($idhama);
        return compact("hamas", "namagejala", "nilai_keyakinan" );
    }
}