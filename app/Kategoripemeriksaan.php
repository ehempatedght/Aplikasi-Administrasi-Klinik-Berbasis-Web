<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoripemeriksaan extends Model
{
    protected $table = 'kategori_pemeriksaan';
    protected $primaryKey = 'id_kategori'; 
    protected $fillable = ['nama_kategori'];
    protected $hidden = ['created_at','updated_at'];

    public function data_pemeriksaan() {
    	return $this->hasMany('App\DataPemeriksaan','id_kategori', 'id_kategori');
    }
}
