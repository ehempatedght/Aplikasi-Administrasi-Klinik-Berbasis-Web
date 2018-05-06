<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confhonor extends Model
{
    protected $table = 'conf_honor';
    protected $fillable = [
    	'tgl','petugas_id','honor'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function petugas() {
    	return $this->belongsTo('App\Petugas','petugas_id');
    }
}
