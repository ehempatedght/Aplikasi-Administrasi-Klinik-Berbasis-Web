<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';
    protected $fillable = [
    	'no_urut','nama_pasien','kategoripasien_id','golongan_darah','jenis_kelamin','alamat','kota_id','kec_id','kel_id','kontak','pekerjaan','status_pernikahan','no_kk','namaIbuKandung','namaAyahKandung','TanggalLahir'
    ];
    
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function kategoripasien(){
    	return $this->belongsTo('App\Kategoripasien','kategoripasien_id');
    }

    public function kota() {
        return $this->belongsTo('App\Kota','kota_id');
    }

    public function kelurahan() {
        return $this->belongsTo('App\Kelurahan','kel_id');
    }

    public function kecamatan() {
        return $this->belongsTo('App\Kecamatan','kec_id');
    }

    public function biayaPendaftaran() {
        return $this->hasMany('App\Biayapendaftaran');
    }

    public function pemberianObat() {
        return $this->hasMany('App\Pemberianobat');
    }
}
