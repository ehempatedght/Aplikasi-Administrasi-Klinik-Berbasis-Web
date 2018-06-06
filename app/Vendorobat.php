<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendorobat extends Model
{
    protected $table = 'vendor_obat';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'nama_vendor','alamat','no_telp','no_hp','pic','email','deskripsi','obat_id','catatan'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function jenisobatdetail() {
    	return $this->belongsTo('App\Jenisobatdetail','obat_id');
    }
    public function pembelian() {
        return $this->hasMany('App\Pembelian','vendor_id','id');
    }
}
