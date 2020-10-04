<?php

namespace App\Http\Controllers;

use App\Hama;
use Validator,Redirect,Response;
use Illuminate\Http\Request;
use DB;

class HamaController extends Controller
{
   
    public function indexpakar()
    {
        $hama = hama::all();
        return view('Admin.Pengetahuan.Hama', ['hama' => $hama]);
    }
    public function indexmember()
    {
        $hama = hama::all();
        return view('Member.infohama', ['hamas' => $hama]);
    }
    public function index()
    {
        $hama = hama::all();
        return view('Admin.Manage.Hama', ['hama' => $hama]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'penanganan' => 'required'
        ]);
        
        if(hama::where('nama', '=', $request->nama)->exists())
        {
            return redirect('/ManageDataHama')->with('statusdanger', 'Data Hama sudah ada');
        }

        hama::create($request->all());
        return redirect('/ManageDataHama')->with('status', 'Data Hama berhasil ditambahkan, silahkan tambah data hama ' . $request->nama . ' pada basis pengetahuan dan data latih');
    }

    public function show(Hama $hama)
    {
        //
    }

    public function edit(Hama $hama)
    {
        
    }

   
    public function update(Request $request, $id)
    {
        $inputedit = json_decode(json_encode(DB::table('hama')->where('id',$id)->where('nama','=',$request->nama)->get()));

        $request->validate([
            'nama' => 'required|max:255',
            'penanganan' => 'required'
        ]);
        
        if(!empty($inputedit) || hama::where('nama', '=', $request->nama)->doesntExist())
        {
            hama::where('id', $id)
            ->update([
                'nama' => $request->input('nama'), 
                'nama_lain' => $request->input('nama_lain'),
                'penanganan' => $request->input('penanganan')
                ]);
                return redirect('/ManageDataHama')->with('status', 'Data hama berhasil diubah');
        }else
        {
            return redirect('/ManageDataHama')->with('statusdanger', "Data hama ". $request->nama . " sudah ada");
        }
    }

    public function destroy($hama)
    {
        hama::where('id', $hama)->delete();
        return redirect('/ManageDataHama')->with('status', 'Data Hama berhasil dihapus');

    }
}
