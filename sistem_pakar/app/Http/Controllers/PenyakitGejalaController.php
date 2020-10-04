<?php

namespace App\Http\Controllers;

use App\Penyakit_gejala;
use Validator,Redirect,Response;
use Illuminate\Http\Request;

class PenyakitGejalaController extends Controller
{
    public function index()
    {
        $gejalapenyakit = penyakit_gejala::all();
        return view('Admin.Manage.GejalaPenyakit', ['gejalapenyakit' => $gejalapenyakit]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255'
        ]);

        if(penyakit_gejala::where('nama', '=', $request->nama)->exists())
        {
            return redirect('/ManageDataGejalaPenyakit')->with('statusdanger', 'Data Gejala Penyakit sudah ada');
        }

        penyakit_gejala::create($request->all());

        return redirect('/ManageDataGejalaPenyakit')->with('status', 'Data Gejala Penyakit berhasil ditambahkan');
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
        $request->validate([
            'nama' => 'required|max:255'
        ]);

        if(penyakit_gejala::where('nama', '=', $request->nama)->exists())
        {
            return redirect('/ManageDataGejalaPenyakit')->with('statusdanger', "Data gejala penyakit ". $request->nama . " sudah ada");
        }
        
        penyakit_gejala::where('id', $id)
          ->update([
              'nama' => $request->input('nama')
          ]);
        
        return redirect('/ManageDataGejalaPenyakit')->with('status', 'Data Gejala Penyakit berhasil diubah');
    }

    public function destroy($id)
    {
        penyakit_gejala::where('id', $id)->delete();
        return redirect('/ManageDataGejalaPenyakit')->with('status', 'Data Gejala Penyakit berhasil dihapus');

    }
}
