<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';
    protected $fillable = [
    	'nama_kota'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function kecamatan() {
    	return $this->hasMany('App\Kota');
    }

    public function pasien() {
        return $this->hasMany('App\Pasien');
    }
}
