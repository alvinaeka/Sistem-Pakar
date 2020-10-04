<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Penyakit_gejala extends Model
{
    protected $table = 'penyakit_gejala';
    protected $fillable = ['nama'];
    public $timestamps = true;
    public function penyakit(){
        return $this->belongsToMany(Penyakit::class)->withPivot(['nilai_cf'])->withTimestamps();
    }
    public function riwayat(){
        return $this->belongsToMany(Riwayat::class);
    }
}
