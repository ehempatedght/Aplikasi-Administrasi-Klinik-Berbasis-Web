<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasiuang extends Model
{
    protected $table = 'donasi_uang';
    protected $fillable = [
    	'nama_donatur','cp','hp','jml_donasi','keterangan'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];
}
