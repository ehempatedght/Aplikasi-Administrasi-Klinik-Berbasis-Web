<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenisobat extends Model
{
    protected $table = 'jenis_obat';
    protected $fillable = [
    	'kd_jenis','name'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];
    
    public function jenis_obat_detail() {
    	return $this->hasMany('App\Jenisobatdetail');
    }
}
