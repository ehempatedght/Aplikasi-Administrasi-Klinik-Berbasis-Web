<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $fillable = [
    	'tgl','vendor_id','obat_id','jumlah','harga','total','status_akunting'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function jenisobat() {
        return $this->belongsTo('App\Jenisobatdetail','obat_id');
    }

    public function vendor() {
        return $this->belongsTo('App\Vendorobat','vendor_id');
    }
}
