<?php

namespace App\Http\Controllers\rekam_aktivitas\medis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservasi;
use App\Pemeriksaan;
use App\Pasien;
use App\Biayapendaftaran;
use Auth;
use App\User;
use App\Kategoripemeriksaan;
use App\DataPemeriksaan;
use App\Pasien as Data;
class PemeriksaanController extends Controller 
{
    public function index() {
    	$pemeriksaan = Pemeriksaan::all();
        $tampilan_penuh = true;
    	return view('rekam_aktivitas.medis.pemeriksaan.index', get_defined_vars());
    }

    public function create() {
    	$reservasi = Reservasi::orderBy('id_res','DESC')->get();
        $pasien = Data::orderBy('id','ASC')->get();
        $k_pemeriksaan = Kategoripemeriksaan::get();
        $d_pemeriksaan = DataPemeriksaan::get();
        $noFaktur = $this->no_faktur();
        return view('rekam_aktivitas.medis.pemeriksaan.create', get_defined_vars());
         
    }

    public function save(Request $req) {
    	$data = $req->all();
        //dd($data);
    	Pemeriksaan::create([
    		'tgl' => date('Y-m-d', strtotime($data['tgl'])),
    		'no_faktur' => $data['no_faktur'],
            'id_kpemeriksaan' => $data['id_kpemeriksaan'],
            'id_dpemeriksaan' => $data['id_dpemeriksaan'],
    		'reservasi_id' => $data['reservasi_id'],
    		'tarif' => str_replace(',', '', $data['tarif']),
    		'disc' => $data['disc'],
            'disc_result' => str_replace(',', '', $data['disc_result']),
            'disc_dokter' => $data['disc_dokter'],
            'disc_dokter_result' => str_replace(',', '', $data['disc_dokter_result']),
            'disc_klinik' => $data['disc_klinik'],
            'disc_klinik_result' => str_replace(',', '', $data['disc_klinik_result']),
    		'total' => str_replace(',', '', $data['total']),
            'bayar' => 0,
            'u_id' => Auth::user()->id,
    	]);
    	return redirect()->route('medis.pemeriksaan.index')->with('message','Pemeriksaan berhasil ditambah');
    }

    public function show($id) {
    	 $reservasi = Reservasi::all();
         $k_pemeriksaan = Kategoripemeriksaan::get();
         $d_pemeriksaan = DataPemeriksaan::get();
    	 $pemeriksaan = Pemeriksaan::find($id);
    	 return view('rekam_aktivitas.medis.pemeriksaan.show', get_defined_vars());
    }

    public function bayar(Request $req, $id) {
        $data = $req->all();
        Pemeriksaan::find($id)->update([
            'status_bayar' => str_replace(',','', $data['status_bayar']),
        ]);

        return redirect()->back()->with('message2','PEMBAYARAN SUKSES!');
    }

    public function no_faktur() {
    	$panjang = 4;
    	$id_pem = Pemeriksaan::whereRaw('id_pemeriksaan = (select max(id_pemeriksaan) from pemeriksaan)')->first();

    	if (empty($id_pem)) {
    		$angka = 0;
    	} else {
    		$angka = substr($id_pem->id_pemeriksaan, 0);
    	}

    	$angka = $angka + 1;
    	$angka = strval($angka);
    	$tmp = '';
    	for ($i=1; $i <= ($panjang - $angka); $i++) { 
    		$tmp = $tmp."0";
    	}

    	$hasil = date('ymd').$tmp.$angka;

    	return $hasil;
    }

    #-----------------------LAPORAN PEMERIKSAAN-----------------------#
    public function index_laporan() {
        $user = User::get();
        return view('rekam_aktivitas.medis.pemeriksaan.report_index', get_defined_vars());
    }

    public function output_report($tanggal_awal, $tanggal_akhir, $u_id, $tipe) {
        $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
        $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
        if ((date('d', strtotime($tanggal_awal)) == '01' AND date('d', strtotime($tanggal_akhir)) >= '30') AND date('m', strtotime($tanggal_awal)) == date('m', strtotime($tanggal_akhir))) {
            $bulanan = true;
        } else {
            $bulanan = false;
        }

        if ($u_id == 'all') {
            $pemeriksaan = Pemeriksaan::whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->get();
            // dd($pemeriksaan);
        } else {
            $pemeriksaan = Pemeriksaan::where('u_id', $u_id)->whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->get();
        }
        if (empty($pemeriksaan->first()->u_id)) {
            return redirect()->back()->with('message','BELUM ADA LAPORAN PADA PERIODE YANG DIINPUT ATAU PADA USER YANG DIPILIH!');
        }
        if ($tipe == 'pdf') {
            $tampilan_penuh = true;
            return view('rekam_aktivitas.medis.pemeriksaan.pdf', get_defined_vars());
        }
    }
}
