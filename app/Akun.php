<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    protected $fillable = [
    	'nama_akun','tipe_akun'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function transaksi() {
    	return $this->hasMany('App\Transaksi');
    }
}
