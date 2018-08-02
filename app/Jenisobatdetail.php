<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenisobatdetail extends Model
{
    protected $table = 'jenis_obat_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'kd_jenis','jenis_obat_id','nama_obat','satuan','deskripsi','harga','stok','total'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];
    
    public function jenis_obat() {
    	return $this->belongsTo('App\Donasiobat','jenis_obat_id');
    }

    public function pembeli() {
        return $this->hasMany('App\Pembelian');
    }

    public function vendor() {
        return $this->hasMany('App\Vendorobat','obat_id','id');
    }
    
    public function pemberian() {
        return $this->hasMany('App\Pemberianobat');
    }
}
