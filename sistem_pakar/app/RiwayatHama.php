<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatHama extends Model
{
    protected $table = 'riwayat_diagnosa_hama';
    protected $fillable = ['user_id', 'riwayat_ke', 'hama_id','gejala_id','nilai_cf'];
    public $timestamps = false;
}
