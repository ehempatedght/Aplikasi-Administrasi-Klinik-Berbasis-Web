<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table = 'poli';
    protected $fillable = [
    	'nama_poli'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function reservasi() {
    	return $this->hasMany('App\Reservasi');
    }
}
