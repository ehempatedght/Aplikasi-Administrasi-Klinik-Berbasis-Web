<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    protected $table = 'pemeriksaan';
    protected $primaryKey = 'id_pemeriksaan';
    protected $fillable = [
        'id_kpemeriksaan','id_dpemeriksaan','tgl','no_faktur','reservasi_id','nama_pemeriksaan','tarif','disc','total','disc_result','disc_dokter','disc_dokter_result','disc_klinik','disc_klinik_result','status_akunting','u_id'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function reservasi() {
        return $this->belongsTo('App\Reservasi','reservasi_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'u_id');
    }

    public function data_pemeriksaan() {
        return $this->belongsTo('App\DataPemeriksaan','id_dpemeriksaan');
    }

    public function k_pemeriksaan() {
        return $this->belongsTo('App\Kategoripemeriksaan','id_kpemeriksaan');
    }
}
