<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Penyakit extends Model
{
    protected $table = 'penyakit'; 
    protected $fillable = ['nama', 'nama_lain', 'penanganan' ];
    public $timestamps = true;
    public function penyakit_gejala(){
        return $this->belongsToMany(Penyakit_gejala::class)->withPivot(['nilai_cf'])->withTimeStamps();
    }
    public function riwayat(){
        return $this->belongsToMany(Riwayat::class);
    }
}

