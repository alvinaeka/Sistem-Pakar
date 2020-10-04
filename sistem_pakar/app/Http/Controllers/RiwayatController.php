<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Riwayatpenyakit;
use App\Riwayathama;
use App\Penyakit;
use App\Penyakit_gejala;
use App\Hama;
use App\Hama_gejala;
use Illuminate\Support\Facades\Auth;
use DB;

class RiwayatController extends Controller
{
    public function indexpenyakit(){
        $iduser = Auth::id();
        $rpenyakit = Riwayatpenyakit::where('user_id', '=', $iduser)->get()->groupBy('riwayat_ke');
        $riwayatpenyakit[]=array();
        foreach($rpenyakit as $keyrpenyakit => $valuerpenyakit){
            foreach ($valuerpenyakit as $keyrpenyakit2 => $valuerpenyakit2){
                $riwayatpenyakit[$keyrpenyakit]["nilai_cf"]= $valuerpenyakit2->nilai_cf;
                $riwayatpenyakit[$keyrpenyakit]["created_at"]= $valuerpenyakit2->created_at;
                $gejala = penyakit_gejala::where('id', '=', $valuerpenyakit2->gejala_id)->get();
                $penyakit = penyakit::where('id', '=', $valuerpenyakit2->penyakit_id)->get();
                foreach($penyakit as $valuepenyakit){
                        $riwayatpenyakit[$keyrpenyakit]["nama_penyakit"]= $valuepenyakit->nama;
                        $riwayatpenyakit[$keyrpenyakit]["penanganan"]= $valuepenyakit->penanganan;
                }
                foreach($gejala as $valuegejala){
                    $riwayatpenyakit[$keyrpenyakit]["nama_gejala"][]= $valuegejala->nama;
                }
            }
        }unset($riwayatpenyakit[0]);
        return view('Member.Riwayat.RiwayatPenyakit', ['riwayat' => $riwayatpenyakit]);
    }
    public function indexhama(){
        $iduser = Auth::id();
        $rhama = Riwayathama::where('user_id', '=', $iduser)->get()->groupBy('riwayat_ke');
        $riwayathama[]=array();
        foreach($rhama as $keyrhama => $valuerhama){
            foreach ($valuerhama as $keyrhama2 => $valuerhama2){
                $riwayathama[$keyrhama]["nilai_cf"]= $valuerhama2->nilai_cf;
                $riwayathama[$keyrhama]["created_at"]= $valuerhama2->created_at;
                $gejala = hama_gejala::where('id', '=', $valuerhama2->gejala_id)->get();
                $hama = hama::where('id', '=', $valuerhama2->hama_id)->get();
                foreach($hama as $valuehama){
                        $riwayathama[$keyrhama]["nama_hama"]= $valuehama->nama;
                        $riwayathama[$keyrhama]["penanganan"]= $valuehama->penanganan;
                }
                foreach($gejala as $valuegejala){
                    $riwayathama[$keyrhama]["nama_gejala"][]= $valuegejala->nama;
                }
            }
        }unset($riwayathama[0]);
        return view('Member.Riwayat.RiwayatHama', ['riwayat' => $riwayathama]);
    }
}
