<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatPenyakit extends Model
{
    protected $table = 'riwayat_diagnosa_penyakit';
    protected $fillable = ['user_id', 'riwayat_ke', 'penyakit_id','gejala_id','nilai_cf'];
    public $timestamps = false;
}
