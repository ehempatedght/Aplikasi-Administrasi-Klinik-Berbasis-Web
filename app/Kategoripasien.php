<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoripasien extends Model
{
    protected $table = 'kategoripasien';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'nama_kategori'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];
    
    public function pasien() {
    	return $this->hasMany('App\Pasien','kategoripasien_id','id');
    }
}
