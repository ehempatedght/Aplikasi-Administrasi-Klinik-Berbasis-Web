<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeAkun extends Model
{
    protected $table = 'tipe_akun';
    protected $primaryKey = 'id_tipe';
    protected $fillable = [
    	'nama_tipe'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function namaAkun() {
    	return $this->hasMany('App\NamaAkun','id_tipe','id_tipe');
    }

    public function transaksi_() {
        return $this->hasMany('App\Transaksi','id_tipe');
    }
    
}
