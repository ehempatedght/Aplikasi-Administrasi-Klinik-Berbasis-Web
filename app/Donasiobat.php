<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasiobat extends Model
{
    protected $table = 'donasi_obat';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'nama_donatur','cp','hp','jns_obt','jumlah','keterangan'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];
    
    public function jenis_obat_detail() {
    	return $this->hasMany('App\Jenisobatdetail','jenis_obat_id','id');
    }
}
