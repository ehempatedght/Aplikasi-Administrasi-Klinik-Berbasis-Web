<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class NamaAkun extends Model
{
    protected $table = 'nama_akun';
    protected $primaryKey = 'id_akun';
    protected $fillable = [
        'id_tipe','nama_akun'
    ];
    protected $hidden = [
        'created_at','updated_at'
    ];
    
    public function tipeAkun() {
        return $this->belongsTo('App\TipeAkun','id_tipe');
    }
    
    public function transaksi() {
        return $this->hasMany('App\Transaksi','id_akun','id_akun');
    }
    public function list_nama_akun($tanggal_awal, $tanggal_akhir, $nama_akun) {
        if ($nama_akun == 'all') {
            return Transaksi::where('id_akun', $this->id_akun)->whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->orderBy('id_transaksi','ASC')->limit(1)->get();
        } else {
            return Transaksi::where('id_akun', $nama_akun)->whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->orderBy('id_transaksi','ASC')->limit(1)->get();
        }
    }
    public function list_transaksi($tanggal_awal, $tanggal_akhir, $tipe_akun, $nama_akun) {
        if ($tipe_akun == 'all' && $nama_akun == 'all') {
           return Transaksi::where('id_akun', $this->id_akun)->where('id_tipe', $this->id_tipe)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->orderBy('id_transaksi','ASC')->get();
        } elseif($tipe_akun != null && $nama_akun == 'all') {
            return Transaksi::where('id_akun', $this->id_akun)->where('id_tipe', $tipe_akun)->whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->orderBy('id_transaksi','ASC')->get();
        } elseif($tipe_akun == 'all' && $nama_akun != null) {
            return Transaksi::where('id_akun', $nama_akun)->where('id_tipe', $this->id_tipe)->whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->orderBy('id_transaksi','ASC')->get();
        } else {
            return Transaksi::where('id_akun', $nama_akun)->where('id_tipe', $tipe_akun)->whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->orderBy('id_transaksi','ASC')->get();
        }
    }
}