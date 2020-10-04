<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hama;
use App\Hama_gejala;
use App\Data_latih_hama;
use DB;

class DataLatihHamaController extends Controller
{
    public function index()
    {
        $hamas = Hama::all();
        $dbhamas = Hama::all()->groupBy('id');
        $gejalas = Hama_gejala::all();
        $hamadatalatih = Data_latih_hama::all()->groupBy('hama_id');
        $dbdatalatih = Data_latih_hama::all()->sortBy('pengujian_ke')->groupBy('pengujian_ke');
        
        $datalatih[]=array();
        foreach($dbdatalatih as $keydbdatalatih => $valuedbdatalatih){
            foreach($valuedbdatalatih as $keydbdatalatih2 => $valuedbdatalatih2){
                $datalatih[$keydbdatalatih]["pengujian_ke"]= $valuedbdatalatih2->pengujian_ke;
                $namagejala = hama_gejala::where('id', $valuedbdatalatih2->gejala_id)->get();
                $namahama = hama::where('id', $valuedbdatalatih2->hama_id)->get();
                $datalatih[$keydbdatalatih]["nama_hama"]= $namahama[0]->nama;
                $datalatih[$keydbdatalatih]["id_hama"]= $namahama[0]->id;
                foreach($namagejala as $gejala){
                    $datalatih[$keydbdatalatih]["nama_gejala"][]= $gejala->nama;
                    $datalatih[$keydbdatalatih]["id_gejala"][]= $gejala->id;
                }
            }
        }unset($datalatih[0]);
        $checkkosong = array_diff_key(json_decode(json_encode($dbhamas), true),json_decode(json_encode($hamadatalatih), true));
        if(!empty($checkkosong)){
            $alert[] = array();
            foreach($checkkosong as $valuecheckkosong){
                foreach($valuecheckkosong as $valuecheckkosong2){
                    $alert[] = "Data hama " . $valuecheckkosong2["nama"] . " belum ada pada data latih, silahkan tambahkan pada data latih";
                }
            }unset($alert[0]);
            return view('Admin.Manage.DataLatihHama', ['datalatih' => $datalatih, 'hamas' => $hamas, 'gejalas' => $gejalas, 'alert' => $alert]);
        }else{
            return view('Admin.Manage.DataLatihHama', ['datalatih' => $datalatih, 'hamas' => $hamas, 'gejalas' => $gejalas]);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'hama_id' => 'required',
            'gejala_id' => 'required'
        ],
        [
            'hama_id.required' => 'silahkan pilih hama untuk ditambahkan',
            'gejala_id.required' => 'silahkan pilih gejala untuk ditambahkan'

        ]
        );

        $pengujianke = DB::table('data_latih_hama')->select('pengujian_ke')->latest('pengujian_ke')->first();
        if(is_null($pengujianke)){
            $pengujian_ke = 1;
        }else{
            $pengujian_ke = $pengujianke->pengujian_ke + 1;
        }
        $gejala_id = array_values(array_unique($request->gejala_id));
        for($i=0;$i<count($gejala_id);$i++){
            $insertdatalatih = new Data_latih_hama;
            $insertdatalatih->pengujian_ke = $pengujian_ke;
            $insertdatalatih->hama_id = $request->hama_id;
            $insertdatalatih->gejala_id = $gejala_id[$i];
            $insertdatalatih->save();
        }
        return redirect('/ManageDataLatihHama')->with('status','Data latih hama berhasil ditambah');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $pengujian_ke)
    {
        $request->validate([
            'hama_id' => 'required',
            'gejala_id' => 'required'
        ],
        [
            'hama_id.required' => 'silahkan pilih hama untuk diubah',
            'gejala_id.required' => 'silahkan pilih gejala untuk diubah'

        ]
        );
        $datalatih = Data_latih_hama::where('pengujian_ke', $pengujian_ke)->get()->groupBy('gejala_id');
        $checkadd = array_unique(array_flip(array_diff_key(array_flip($request->gejala_id),json_decode(json_encode($datalatih), true))));
        $checkdelete = array_diff_key(json_decode(json_encode($datalatih), true),array_flip($request->gejala_id));
        foreach($checkadd as $valuecheckadd){
                $insertdatalatih = new Data_latih_hama;
                $insertdatalatih->pengujian_ke = $pengujian_ke;
                $insertdatalatih->hama_id = $request->hama_id;
                $insertdatalatih->gejala_id = $valuecheckadd;
                $insertdatalatih->save();
        }
        foreach($checkdelete as $keycheckdelete => $valuecheckdelete){
            Data_latih_hama::where('pengujian_ke', $pengujian_ke)->where('gejala_id', $keycheckdelete)->delete();
        }
        if(empty($checkadd) && empty($checkdelete)){
            return redirect('/ManageDataLatihHama')->with('statusinfo', 'Tidak ada perubahan data');
        }else{
            return redirect('/ManageDataLatihHama')->with('status', 'Data latih hama berhasil diubah');
        }
    }

    public function destroy($pengujian_ke)
    {
        Data_latih_hama::where('pengujian_ke', $pengujian_ke)->delete();
        return redirect('/ManageDataLatihHama')->with('status', 'Data Hama berhasil dihapus');
    }
}
