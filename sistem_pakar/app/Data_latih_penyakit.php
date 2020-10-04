<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_latih_penyakit extends Model
{
    protected $table = 'data_latih_penyakit';
    protected $fillable = ['pengujian_ke', 'penyakit_id','gejala_id'];
    public $timestamps = false;
}
