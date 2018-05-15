<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';
    protected $primaryKey = 'id_res';
    protected $fillable = [
    	'kd_res','poli_id','pasien_id','dokter_id','status_res','no_urut','no_rm','u_id'
    ];

    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function poli() {
    	return $this->belongsTo('App\Poli','poli_id');
    }
    
    public function pasien() {
    	return $this->belongsTo('App\Pasien','pasien_id');
    }

    public function dokter() {
    	return $this->belongsTo('App\Petugas','dokter_id');
    }

    public function pemeriksaan() {
        return $this->hasMany('App\Pemeriksaan','reservasi_id','id_res');
    }
}
