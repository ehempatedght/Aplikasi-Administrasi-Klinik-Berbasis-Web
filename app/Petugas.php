<?php

namespace App;
use App\Category;
use App\Day;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';
    protected $fillable = [
    	'nama','spesialisasi','alamat','kota','no_hp','no_telp','alamat_email','tgl_mulai_praktek','img','category_id','senin1','senin2','selasa1','selasa2','rabu1','rabu2','kamis1','kamis2','jumat1','jumat2','sabtu1','sabtu2','minggu1','minggu2'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function category() {
    	return $this->belongsTo('App\Category','category_id');
    }
    
    public function days() {
    	return $this->belongsToMany('App\Day');
    }
}
