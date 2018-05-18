<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'id_rm';
    protected $fillable = [
    	'res_id','tgl','rmkeluhan','rmpemeriksaan','rmpp','rmalergiobat','rmterapi','rmresep','rmkesimpulan','rmdiagnosa','kondisi_pasien','u_id'
    ];

    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function reservasi() {
    	return $this->belongsTo('App\Reservasi','res_id');
    }
}
