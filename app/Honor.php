<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Honor extends Model
{
    protected $table = 'honor';
    protected $fillable = [
    	'tgl','category_id','petugas_id','confhonor_id','jam','total'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function category() {
    	return $this->belongsTo('App\Category','category_id');
    }

    public function petugas() {
        return $this->belongsTo('App\Petugas','petugas_id');
    }
    
    public function confhonor() {
        return $this->belongsTo('App\Confhonor','confhonor_id');
    }
}
