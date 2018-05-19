<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemberianobat extends Model
{
    protected $table = 'pemberian_obat';
    protected $fillable = [
    	'tgl','no_pend','pasien_id','jenis_id','obat_id','jumlah','keterangan'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function pasien() {
    	return $this->belongsTo('App\RekamMedis','pasien_id');
    }
    
   	public function obat() {
   		return $this->belongsTo('App\Jenisobatdetail','obat_id');
   	}
}
