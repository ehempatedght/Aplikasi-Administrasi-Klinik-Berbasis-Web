<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    protected $table = 'pemeriksaan';
    protected $primaryKey = 'id_pemeriksaan';
    protected $fillable = [
        'tgl','no_faktur','reservasi_id','nama_pemeriksaan','tarif','disc','subtotal','u_id'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function reservasi() {
        return $this->belongsTo('App\Reservasi','reservasi_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'u_id');
    }
}
