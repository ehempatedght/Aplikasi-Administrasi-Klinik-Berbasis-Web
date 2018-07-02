<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operasional extends Model
{
    protected $table = 'operasional';
    protected $fillable = [
    	'tgl','keterangan','jumlah','total','status_akunting'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];
}
