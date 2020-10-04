<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hama extends Model
{
    protected $table = 'hama';
    protected $fillable = ['nama', 'nama_lain', 'penanganan' ];
    public $timestamps = true;
    public function hama_gejala(){
        return $this->belongsToMany(Hama_gejala::class)->withPivot(['nilai_cf'])->withTimestamps();
    }   
}
