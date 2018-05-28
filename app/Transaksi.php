<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
    	'id_akun','id_tipe','tgl','keterangan','pengeluaran','pemasukan','nominal','jumlah','saldo','u_id'
    ];

    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function akun() {
    	return $this->belongsTo('App\NamaAkun','id_akun');
    }

    public function tipe_akun() {
        return $this->belongsTo('App\TipeAkun','id_tipe');
    }

    public function total_masuk_keseluruhan($tanggal_awal, $tanggal_akhir, $akun) {
        $transaksi = Transaksi::where('id_akun', $this->id_akun)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get();
        if ($transaksi != null) {
            $totalMasuk = $transaksi->sum('pemasukan');
        }
        return $totalMasuk;
    }

    public function total_keluar_keseluruhan($tanggal_awal, $tanggal_akhir, $akun) {
        $transaksi = Transaksi::where('id_akun', $this->id_akun)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get();
        if ($transaksi != null) {
            $totalKeluar = $transaksi->sum('pengeluaran');
        }

        return $totalKeluar;
    }

    public function total_masuk_keseluruhan2($tanggal_awal, $tanggal_akhir, $akun) {
        $transaksi = Transaksi::where('id_tipe', $this->id_tipe)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get();
        if ($transaksi != null) {
            $totalMasuk = $transaksi->sum('pemasukan');
        }
        return $totalMasuk;
    }

    public function total_keluar_keseluruhan2($tanggal_awal, $tanggal_akhir, $akun) {
        $transaksi = Transaksi::where('id_tipe', $this->id_tipe)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get();
        if ($transaksi != null) {
            $totalKeluar = $transaksi->sum('pengeluaran');
        }
        return $totalKeluar;
    }

}
