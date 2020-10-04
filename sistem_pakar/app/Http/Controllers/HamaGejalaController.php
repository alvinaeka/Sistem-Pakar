<?php

namespace App\Http\Controllers;

use App\Hama_gejala;
use Validator,Redirect,Response;
use Illuminate\Http\Request;

class HamaGejalaController extends Controller
{

    public function index()
    {
        $gejalahama = hama_gejala::all();
        return view('Admin.Manage.GejalaHama', ['gejalahama' => $gejalahama]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255'
        ]);

        if(hama_gejala::where('nama', '=', $request->nama)->exists())
        {
            return redirect('/ManageDataGejalaHama')->with('statusdanger', 'Data Gejala Hama sudah ada');
        }

        hama_gejala::create($request->all());
        return redirect('/ManageDataGejalaHama')->with('status', 'Data Gejala Hama berhasil ditambahkan');
    }

    public function show(GejalaHama $gejalahama)
    {
        //
    }

    public function edit(GejalaHama $gejalahama)
    {
        
    }

    public function update(Request $request, $gejalahama)
    {
        $request->validate([
            'nama' => 'required|max:255'
        ]);

        if(hama_gejala::where('nama', '=', $request->nama)->exists())
        {
            return redirect('/ManageDataGejalaHama')->with('statusdanger', "Data gejala hama ". $request->nama . " sudah ada");
        }

        hama_gejala::where('id', $gejalahama)
          ->update([
              'nama' => $request->input('nama')
          ]);
        
        return redirect('/ManageDataGejalaHama')->with('status', 'Data Gejala Hama berhasil diubah');
    }

    public function destroy($id)
    {
        hama_gejala::where('id', $id)->delete();
        return redirect('/ManageDataGejalaHama')->with('status', 'Data Gejala Hama berhasil dihapus');

    }
}
