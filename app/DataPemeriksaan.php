<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPemeriksaan extends Model {
	protected $table = 'data_pemeriksaan';
	protected $primaryKey = 'id_dpemeriksaan';
	protected $fillable = [
		'id_kategori','nama_pemeriksaan'
	];

	protected $hidden = ['created_at','updated_at'];

	public function kategori_pemeriksaan() {
		return $this->belongsTo('App\Kategoripemeriksaan', 'id_kategori');
	}
}