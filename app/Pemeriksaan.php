<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    protected $table = 'data_pemeriksaan';
    protected $primarykey = 'id_pemeriksaan';
    protected $fillable = [
    	'nama_pemeriksaan','id_kategori_pemeriksaan','tarif','diskon_persen','diskon','total','jasa_dokter_persen','jasa_dokter_utama','jasa_asisten_persen','jasa_asisten','jasa_perawat1_persen','jasa_perawat1','jasa_perawat2_persen','jasa_perawat2','klinik_persen','klinik'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function kategoripemeriksaan() {
    	return $this->belongsTo('App\Kategoripemeriksaan','id_kategori_pemeriksaan');
    }

}
