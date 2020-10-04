<?php

namespace App\Http\Controllers;

use \App\Penyakit;
use \App\Penyakit_gejala;
use \App\Data_latih_penyakit;
use Validator,Redirect,Response;
use Illuminate\Http\Request;

class BasisPengetahuanPenyakitController extends Controller
{
    
    public function index()
    {
        $penyakit = penyakit::all();
        $pen = penyakit::all();
        $gejalapenyakit = penyakit_gejala::all();
        return view('Admin.Manage.BasisPengetahuanPenyakit', ['penyakit' => $penyakit, 'gejalapenyakit' => $gejalapenyakit, 'pen' => $pen]);
    }
    
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'penyakit_id' => 'required',
            'penyakit_gejala_id' => 'required'
        ],
        [
            'penyakit_id.required' => 'silahkan pilih penyakit untuk ditambahkan',
            'penyakit_gejala_id.required' => 'silahkan pilih gejala untuk ditambahkan'

        ]
        );
        $penyakit = penyakit::find($request->penyakit_id);
        // dd($penyakit->id);
        if($penyakit->penyakit_gejala()->where('penyakit_gejala_id',$request->penyakit_gejala_id)->exists())
        {
            return redirect('/ManageDataBasisPengPenyakit')->with('statusdanger', 'Data Basis pengetahuan sudah ada');
        }
        $gejala = $request->penyakit_gejala_id;
        $penyakit->penyakit_gejala()->attach($gejala,['nilai_cf' => $request->nilai_cf]);
        
        $datalatih = Data_latih_penyakit::all()->groupBy('penyakit_id');
        foreach($datalatih as $valuedatalatih){
            if(!key_exists($penyakit->id,json_decode(json_encode($valuedatalatih), true))){
                return redirect('/ManageDataBasisPengPenyakit')->with('status', 'Data Basis pengetahuan berhasil ditambahkan, silahkan tambah data ' + $penyakit->nama + ' pada data latih');
            }else{
                return redirect('/ManageDataBasisPengPenyakit')->with('status', 'Data Basis pengetahuan berhasil ditambahkan');                
            }
        }
    }

    public function show(GejalaPenyakit $gejalapenyakit)
    {
        //
    }

    public function edit(GejalaPenyakit $gejalapenyakit)
    {
        
    }

    public function update(Request $request, $id)
    {
        $penyakit = penyakit::find($id);
        $penyakit->penyakit_gejala()->updateExistingPivot($request->id_gejala, ["nilai_cf" => $request->nilai_cf]);
        
        return redirect('/ManageDataBasisPengPenyakit')->with('status', 'Data Basis pengetahuan berhasil diubah');
    }

    public function destroy($penyakit_id,$gejala_id)
    {
        $penyakit = penyakit::find($penyakit_id);
        $penyakit->penyakit_gejala()->detach($gejala_id);
        return redirect()->back()->with('status', 'Data Basis pengetahuan berhasil dihapus');
    }
}
