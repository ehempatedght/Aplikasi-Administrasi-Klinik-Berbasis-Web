<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenisobatdetail extends Model
{
    protected $table = 'jenis_obat_detail';
    protected $fillable = [
    	'kd_jenis','jenis_obat_id','nama_obat','satuan','deskripsi','harga','stok'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function jenis_obat() {
    	return $this->belongsTo('App\Jenisobat');
    }

    public function vendorobat() {
        return $this->belongsTo('App\Vendorobat');
    }

    public function donasiobat() {
        return $this->belongsTo('App\Donasiobat');
    }
    
    public function pembeli() {
        return $this->hasMany('App\Pembelian');
    }
}
