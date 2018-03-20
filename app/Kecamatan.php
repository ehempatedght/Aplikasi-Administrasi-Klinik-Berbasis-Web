<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $fillable = [
    	'nama_kecamatan','kota_id'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function kelurahan() {
    	return $this->hasMany('App\Kelurahan');
    }

    public function kota() {
    	return $this->belongsTo('App\Kota','kota_id');
    }

    public function pasien() {
        return $this->hasMany('App\Pasien');
    }
}
