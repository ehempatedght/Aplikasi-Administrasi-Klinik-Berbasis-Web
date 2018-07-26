<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'id_akun','id_tipe','tgl','keterangan','pengeluaran','pemasukan','nominal','jumlah','u_id','id_pemeriksaan','id_donasi_uang','id_honor','id_pembelian','id_operasional'
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

    public function operasional() {
        return $this->belongsTo('App\Operasional','id_operasional');
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
    // laba(rugi) - pemasukan
    public function total_keseluruhan($tanggal_awal, $tanggal_akhir) {
        return Transaksi::where('id_tipe', '3')->where('id_akun', $this->id_akun)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get()->sum('pemasukan'); 
    }
    // laba(rugi) - pemasukan
    public function total_keseluruhan1($tanggal_awal, $tanggal_akhir) {
        return Transaksi::where('id_tipe', '3')->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get()->sum('pemasukan');
    }
    // laba(rugi) - pengeluaran
    public function total_keseluruhan2($tanggal_awal, $tanggal_akhir) {
        return Transaksi::where('id_tipe', '4')->where('id_akun', $this->id_akun)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get()->sum('pengeluaran'); 
    }
    //laba(rugi) - pengeluaran
    public function total_keseluruhan3($tanggal_awal, $tanggal_akhir) {
        return Transaksi::where('id_tipe', '4')->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get()->sum('pengeluaran');
    }
    //neraca - aktiva
    public function total_neraca_aktiva($tanggal_awal, $tanggal_akhir) {
        $pemasukan = Transaksi::where('id_tipe', '1')->where('id_akun', $this->id_akun)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get()->sum('pemasukan');
        $pengeluaran = Transaksi::where('id_tipe', '1')->where('id_akun', $this->id_akun)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get()->sum('pengeluaran');
        $total_neraca = $pemasukan - $pengeluaran;
        return $total_neraca;
    }
    //neraca - pasiva
    public function total_neraca_pasiva($tanggal_awal, $tanggal_akhir) {
        $pemasukan = Transaksi::where('id_tipe', '2')->where('id_akun', $this->id_akun)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get()->sum('pemasukan');
        $pengeluaran = Transaksi::where('id_tipe', '2')->where('id_akun', $this->id_akun)->whereBetween('tgl', [$tanggal_awal,$tanggal_akhir])->get()->sum('pengeluaran');
        $total_neraca = $pemasukan - $pengeluaran;
        return $total_neraca;
    }
}