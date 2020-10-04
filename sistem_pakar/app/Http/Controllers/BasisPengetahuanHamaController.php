<?php

namespace App\Http\Controllers;

use \App\Hama;
use \App\Hama_gejala;
use \App\Data_latih_hama;
use Validator,Redirect,Response;
use Illuminate\Http\Request;

class BasisPengetahuanHamaController extends Controller
{
    
    public function index()
    {
        $hama = hama::all();
        $hama2 = hama::all();
        $gejalahama = hama_gejala::all();
        return view('Admin.Manage.BasisPengetahuanHama', ['hama' => $hama, 'gejalahama' => $gejalahama, 'hama2' => $hama2]);
    }
    
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'hama_id' => 'required',
            'hama_gejala_id' => 'required'
        ],
        [
            'hama_id.required' => 'silahkan pilih hama untuk ditambahkan',
            'hama_gejala_id.required' => 'silahkan pilih gejala untuk ditambahkan'

        ]
        );
        $hama = hama::find($request->hama_id);
        // dd($hama->id);
        if($hama->hama_gejala()->where('hama_gejala_id',$request->hama_gejala_id)->exists())
        {
            return redirect('/ManageDataBasisPengHama')->with('statusdanger', 'Data Basis pengetahuan sudah ada');
        }
        $gejala = $request->hama_gejala_id;
        $hama->hama_gejala()->attach($gejala,['nilai_cf' => $request->nilai_cf]);
        
        $datalatih = Data_latih_hama::all()->groupBy('hama_id');
        foreach($datalatih as $valuedatalatih){
            if(!key_exists($hama->id,json_decode(json_encode($valuedatalatih), true))){
                return redirect('/ManageDataBasisPengHama')->with('status', 'Data Basis pengetahuan berhasil ditambahkan, silahkan tambah data ' + $hama->nama + ' pada data latih');
            }else{
                return redirect('/ManageDataBasisPengHama')->with('status', 'Data Basis pengetahuan berhasil ditambahkan');                
            }
        }
    }

    public function show(GejalaHama $gejalahama)
    {
        //
    }

    public function edit(GejalaHama $gejalahama)
    {
        
    }

    public function update(Request $request, $id)
    {
        $hama = hama::find($id);
        $hama->hama_gejala()->updateExistingPivot($request->id_gejala, ["nilai_cf" => $request->nilai_cf]);
        
        return redirect('/ManageDataBasisPengHama')->with('status', 'Data Basis pengetahuan berhasil diubah');
    }

    public function destroy($hama_id,$gejala_id)
    {
        $hama = hama::find($hama_id);
        $hama->hama_gejala()->detach($gejala_id);
        return redirect()->back()->with('status', 'Data Basis pengetahuan berhasil dihapus');
    }
}
