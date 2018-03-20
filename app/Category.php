<?php

namespace App;
use App\Petugas;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
    protected $fillable = [
    	'nama_kategori'
    ];

    protected $hidden = [
    	'created_at','updated_at'
    ];

     public function petugas() {
     	return $this->hasMany('App\Petugas');
     }
}
