<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NamaAkun extends Model
{
    protected $table = 'nama_akun';
    protected $primaryKey = 'id_akun';
    protected $fillable = [
    	'id_tipe','nama_akun'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function tipeAkun() {
    	return $this->belongsTo('App\TipeAkun','id_tipe');
    }

    public function transaksi() {
        return $this->hasMany('App\Transaksi','id_akun','id_akun');
    }
}
