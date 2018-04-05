<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peralatankantor extends Model
{
    protected $table = 'alat_kantor';
	protected $fillable = [
		'kd_alat','nm_alat','jenis_alat','jumlah'
	];

	protected $hidden = [
		'created_at','updated_at'
	];
}
