<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peralatanmedik extends Model
{
	protected $table = 'alat_medis';
	protected $fillable = [
		'kd_alat','nm_alat','jenis_alat','jumlah','description'
	];

	protected $hidden = [
		'created_at','updated_at'
	];
}
