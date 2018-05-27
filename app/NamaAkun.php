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

    public function total_masuk_keseluruhan($tanggal_awal, $tanggal_akhir, $tipe) {
        $transaksi = Transaksi::where('id_akun', $this->id_akun)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get();
        if ($transaksi != null) {
            $totalMasuk = $transaksi->sum('pemasukan');
        }
        return $totalMasuk;
    }

    public function total_keluar_keseluruhan($tanggal_awal, $tanggal_akhir, $tipe) {
        $transaksi = Transaksi::where('id_akun', $this->id_akun)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get();
        if ($transaksi != null) {
            $totalKeluar = $transaksi->sum('pengeluaran');
        }

        return $totalKeluar;
    }

    public function total_masuk_keseluruhan2($tanggal_awal, $tanggal_akhir, $tipe) {
        $transaksi = Transaksi::where('id_tipe', $this->id_tipe)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get();
        if ($transaksi != null) {
            $totalMasuk = $transaksi->sum('pemasukan');
        }
        return $totalMasuk;
    }

    public function total_keluar_keseluruhan2($tanggal_awal, $tanggal_akhir, $tipe) {
        $transaksi = Transaksi::where('id_tipe', $this->id_tipe)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get();
        if ($transaksi != null) {
            $totalKeluar = $transaksi->sum('pengeluaran');
        }
        return $totalKeluar;
    }
}
