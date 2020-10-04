<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hama_gejala extends Model
{
    protected $table = 'hama_gejala';
    protected $fillable = ['nama'];
    public $timestamps = true;
    public function hama(){
        return $this->belongsToMany(Hama::class)->withPivot(['nilai_cf'])->withTimeStamps();
    }   
}
