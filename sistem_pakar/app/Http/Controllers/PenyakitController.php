<?php

namespace App\Http\Controllers;

use App\Penyakit;
use Validator,Redirect,Response;
use Illuminate\Http\Request;
use DB;

class PenyakitController extends Controller
{
    public function indexpakar()
    {
        $penyakit = penyakit::all();
        return view('Admin.Pengetahuan.Penyakit', ['penyakit' => $penyakit]);
    }
    public function indexmember()
    {
        $penyakit = penyakit::all();
        return view('Member.infopenyakit', ['penyakits' => $penyakit]);
    }
    public function index()
    {
        $penyakit = penyakit::all();
        return view('Admin.Manage.Penyakit', ['penyakit' => $penyakit]);
    }
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'nama_lain' => 'required',
            'penanganan' => 'required',
        ]);     
        if(penyakit::where('nama', '=', $request->nama)->exists())
        {
            return redirect('/ManageDataPenyakit')->with('statusdanger', 'Data penyakit sudah ada');
        }

        penyakit::create($request->all());
        return redirect('/ManageDataPenyakit')->with('status', 'Data Penyakit berhasil ditambahkan, silahkan tambah penyakit ' . $request->input('nama') . ' pada basis pengetahuan dan data latih');
    }

    public function show(Penyakit $penyakit)
    {
        //
    }

    public function edit(Penyakit $penyakit)
    {

    }

    public function update(Request $request, $id)
    {
        $inputedit = json_decode(json_encode(DB::table('penyakit')->where('id',$id)->where('nama','=',$request->nama)->get()));

        $request->validate([
            'nama' => 'required|max:255',
            'nama_lain' => 'required',
            'penanganan' => 'required',
        ]);

        if(!empty($inputedit) || penyakit::where('nama', '=', $request->nama)->doesntExist())
        {
            penyakit::where('id', $id)
            ->update([
                'nama' => $request->input('nama'), 
                'nama_lain' => $request->input('nama_lain'),
                'penanganan' => $request->input('penanganan')
                ]);
                return redirect('/ManageDataPenyakit')->with('status', 'Data Penyakit berhasil diubah');
        }else
        {
            return redirect('/ManageDataPenyakit')->with('statusdanger', "Data penyakit ". $request->nama . " sudah ada");
        }
    }

    public function destroy($id)
    {
        penyakit::where('id', $id)->delete();
        return redirect('/ManageDataPenyakit')->with('status', 'Data Penyakit berhasil dihapus');
    }
}
