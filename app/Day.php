<?php

namespace App;
use App\Petugas;
use App\PetugasDay;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $table = 'days';
    protected $fillable = [
    	'days'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function petugas() {
    	return $this->belongsToMany('App\Petugas');
    }
}
