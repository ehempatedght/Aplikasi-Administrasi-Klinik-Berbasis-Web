<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoripemeriksaan extends Model
{
    protected $table = 'category_pemeriksaan';
    protected $fillable = ['nama_kategori_pemeriksaan'];

    public function pemeriksaan() {
    	return $this->hasMany('App\Pemeriksaan','id_kategori_pemeriksaan');
    }
}
