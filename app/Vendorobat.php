<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendorobat extends Model
{
    protected $table = 'vendor_obat';
    protected $fillable = [
    	'nama_vendor','alamat','no_telp','no_hp','pic','email','deskripsi','obat_id','catatan'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function jenisobatdetail() {
    	return $this->hasMany('App\Jenisobatdetail');
    }

    public function pembelian() {
        return $this->hasMany('App\Pembelian');
    }
}
