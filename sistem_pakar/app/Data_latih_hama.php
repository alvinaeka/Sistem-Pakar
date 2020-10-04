<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_latih_hama extends Model
{
    protected $table = 'data_latih_hama';
    protected $fillable = ['pengujian_ke', 'hama_id','gejala_id'];
    public $timestamps = false;
}
