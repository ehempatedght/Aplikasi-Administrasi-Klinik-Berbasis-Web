<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $fillable = [
    	'nama_kelurahan','kec_id'
    ];

    public function kecamatan() {
    	return $this->belongsTo('App\Kecamatan','kec_id');
    }

    public function pasien() {
    	return $this->hasMany('App\Pasien');
    }
}
