<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyakit;
use App\Penyakit_gejala;
use App\Data_latih_penyakit;
use App\RiwayatPenyakit;
use DB;
use Illuminate\Support\Facades\Auth;

class DiagnosaPenyakitController extends Controller
{
    public function index()
    {
        $gejala = penyakit_gejala::orderBy('id', 'asc')->get();

    	return view('Member.Diagnosa.DiagnosaPenyakit', compact('gejala'));
    }
    public function proses(Request $request)
    {
        if(empty($request->input('gejala'))){
            return redirect('/DiagnosaPenyakit')->with('danger', 'Silahkan pilih minimal 1 gejala');
        }
        $selectedgejala = collect($request->input('gejala'))->all();
        $gejala = DB::table('penyakit_gejala')->whereIn('id', $request->input('gejala'))->get();
        $dbgejalas = DB::table('penyakit_gejala')->select('id')->get();
        $jumlahdata= DB::table('data_latih_penyakit')->get()->groupBy('pengujian_ke')->count();
        $dbdatalatih = DB::table('data_latih_penyakit')->selectRaw('penyakit_id, gejala_id')->get()->groupBy('penyakit_id');
        $dbjumlahmunculpenyakit= DB::table('data_latih_penyakit')->groupBy('penyakit_id')->selectRaw('penyakit_id,count(distinct pengujian_ke) as jumlahpenyakit')->get();
        $dbjumlahpenyakit = DB::table('penyakit')->select('id')->get();
        $penyakitdatalatih = DB::table('data_latih_penyakit')->select('penyakit_id')->get()->groupBy('penyakit_id');

        $checkdatalatih = $this->checkdatalatih($penyakitdatalatih, $dbjumlahpenyakit);
        if($checkdatalatih > 0){
            return redirect('/DiagnosaPenyakit')->with('danger', 'Maaf, terjadi kesalahan. Silakan coba beberapa saat lagi.');
        }

        foreach($dbjumlahmunculpenyakit as $penyakit){
            $munculpenyakit[$penyakit->penyakit_id]=$penyakit->jumlahpenyakit;                    
        }

        foreach($dbgejalas as $gejala=>$value2){
            $arrgejalas[]=$value2->id;
        }

        $arrdbdatalatih[]=array();
        foreach($dbdatalatih as $penyakits2=>$value3){
            foreach($value3 as $gejala2=>$value4){
                $arrdbdatalatih[$penyakits2][]=$value4->gejala_id;
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
            foreach($munculpenyakit as $keymunculpenyakitlaplace => $valuemunculpenyakitlaplace){
                $munculpenyakit[$keymunculpenyakitlaplace] += 1;
            }
        }

        $arrselectedgejala[] = array();
        foreach($arrdatalatih as $keyarrdatalatih => $valuearrdatalatih){
            foreach($selectedgejala as $keyselectedgejala => $valueselectedgejala){
                $arrselectedgejala[$keyarrdatalatih][$keyselectedgejala] = $arrdatalatih[$keyarrdatalatih][$valueselectedgejala];
            }
        }unset($arrselectedgejala[0]);

        $prior = $this->prior($munculpenyakit, $jumlahdata);
        $likelihood = $this->likelihood($arrselectedgejala, $selectedgejala, $munculpenyakit);
        $hasildiagnosis = $this->posterior($prior, $likelihood);
        $nilaicfhasildiagnosis = $this->nilaicfdiagnosis($hasildiagnosis, $request, $arrgejalas);
        $nilaicfcombine = $this->nilaicfcombine($nilaicfhasildiagnosis);
        $this->simpandatalatih($selectedgejala, $hasildiagnosis);
        $riwayat = $this->simpanriwayat($selectedgejala, $hasildiagnosis, $nilaicfcombine);
        $hasil = $this->hasildiagnosa($riwayat);
        return view('Member.Diagnosa.HasilDiagnosaPenyakit', $hasil);

    }
    private function checkdatalatih($penyakitdatalatih, $dbjumlahpenyakit){
        $checkdatalatih[]=array();
        foreach($penyakitdatalatih as $keypenyakitdatalatih => $valuepenyakitdatalatih){
            $checkdatalatih[$keypenyakitdatalatih]= $valuepenyakitdatalatih;
        }unset($checkdatalatih[0]);
        $check = 0;
        foreach($dbjumlahpenyakit as $valuejumlahpenyakit){
                if(!array_key_exists($valuejumlahpenyakit->id,$checkdatalatih)){
                    $check++;
                }
        }
        return $check;
    }
    private function prior($munculpenyakit, $jumlahdata)
    {
        foreach($munculpenyakit as $keymunculpenyakit => $valuemunculpenyakit){
            $prior[$keymunculpenyakit] = $munculpenyakit[$keymunculpenyakit]/$jumlahdata;
        }
        return $prior;
    }
    private function likelihood($arrselectedgejala, $selectedgejala, $munculpenyakit)
    {
        foreach($arrselectedgejala as $keyarrselectedgejala => $valuearrselectedgejala){
            foreach($selectedgejala as $keyselectedgejala => $valueselectedgejala){
                $likelihood[$keyarrselectedgejala][] = $arrselectedgejala[$keyarrselectedgejala][$keyselectedgejala]/$munculpenyakit[$keyarrselectedgejala];
            }
        }
        return $likelihood;
    }
    private function posterior($prior, $likelihood)
    {
        foreach($likelihood as $keylikelihood1 => $valuelikelihood1){
            $posterior[$keylikelihood1]=$prior[$keylikelihood1]*array_product($likelihood[$keylikelihood1]);
        }
        $diagnosapenyakit= array_search(max($posterior), $posterior);
        return $diagnosapenyakit;
    }
    private function nilaicfdiagnosis($hasildiagnosis, $request, $arrgejalas)
    {
        $dbnilaicf = DB::table('penyakit_penyakit_gejala')->select('penyakit_id', 'penyakit_gejala_id', 'nilai_cf')->where('penyakit_id', $hasildiagnosis)->whereIn('penyakit_gejala_id', $request->input('gejala'))->orderBy('penyakit_id')->get()->groupBy('penyakit_id');
        $cfdiagnosa[]=array();
        foreach($dbnilaicf as $nilaicf){
            foreach($nilaicf as $keynilaicf => $valuenilaicf){
                $cfdiagnosa[$valuenilaicf->penyakit_gejala_id]=$valuenilaicf->nilai_cf;
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
        $pengujianke= DB::table('data_latih_penyakit')->select('pengujian_ke')->latest('pengujian_ke')->first();
        $pengujian = $pengujianke->pengujian_ke + 1;
        foreach($selectedgejala as $keyselectgejala => $selectgejala){
            $insertdatalatih = new Data_latih_penyakit;
            $insertdatalatih->pengujian_ke = $pengujian;
            $insertdatalatih->penyakit_id = $hasildiagnosis;
            $insertdatalatih->gejala_id = $selectedgejala[$keyselectgejala];
            $insertdatalatih->save();
        }
    }
    private function simpanriwayat($selectedgejala, $hasildiagnosis, $nilaicfcombine){
        $iduser = Auth::id();
        $riwayatke = DB::table('riwayat_diagnosa_penyakit')->select('riwayat_ke')->latest('riwayat_ke')->first();
        if(is_null($riwayatke)){
            $riwayat2 = 1;
        }else{
            $riwayat2 = $riwayatke->riwayat_ke + 1;
        }
        foreach($selectedgejala as $keyselectgejala => $selectgejala){
            $insertriwayat = new RiwayatPenyakit;
            $insertriwayat->user_id = $iduser;
            $insertriwayat->riwayat_ke = $riwayat2;
            $insertriwayat->penyakit_id = $hasildiagnosis;
            $insertriwayat->gejala_id = $selectedgejala[$keyselectgejala];
            $insertriwayat->nilai_cf = $nilaicfcombine;
            $insertriwayat->save();
        }return $riwayat2;
    }
    public function hasildiagnosa($riwayat_ke){
        $hasildiagnosa = DB::table('riwayat_diagnosa_penyakit')->select('user_id', 'penyakit_id', 'gejala_id', 'nilai_cf')->where('riwayat_ke', $riwayat_ke)->get();
        $gejalaid[] = array(); 
        foreach($hasildiagnosa as $valuehasildiagnosa){
            $idpenyakit = $valuehasildiagnosa->penyakit_id;
            $gejalaid[] = $valuehasildiagnosa->gejala_id;
            $nilai_keyakinan = $valuehasildiagnosa->nilai_cf;
        }unset($gejalaid[0]);
        $namagejala = DB::table('penyakit_gejala')->select('nama')->whereIn('id', $gejalaid)->get();
        $penyakits = Penyakit::find($idpenyakit);
        return compact("penyakits", "namagejala", "nilai_keyakinan" );
    }
}