<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biayapendaftaran extends Model
{
    protected $table = 'biaya_pendaftaran';
    protected $fillable = [
    	'tgl','no_pend','pasien','jumlah'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];
}
