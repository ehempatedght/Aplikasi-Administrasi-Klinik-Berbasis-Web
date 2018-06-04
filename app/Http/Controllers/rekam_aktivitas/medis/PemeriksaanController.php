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
class PemeriksaanController extends Controller 
{
    public function index() {
    	$pemeriksaan = Pemeriksaan::all();
    	return view('rekam_aktivitas.medis.pemeriksaan.index')->withPemeriksaan($pemeriksaan);
    }

    public function create() {
    	$reservasi = Reservasi::orderBy('id_res','DESC')->get();
        $noFaktur = $this->no_faktur();
        return view('rekam_aktivitas.medis.pemeriksaan.create', get_defined_vars());
         
    }

    public function save(Request $req) {
    	$this->validateWith(array(
    		'tgl' => 'required',
    		'no_faktur' => 'required',
    		'reservasi_id' => 'required|integer',
    		'nama_pemeriksaan' => 'required|max:25',
    		'tarif' => 'required',
    		'jml' => 'required',
    		'total' => 'required',
    		'disc' => 'required',
    		'subtotal' => 'required'
    	));

    	$data = $req->all();
    	Pemeriksaan::create([
    		'tgl' => date('Y-m-d', strtotime($data['tgl'])),
    		'no_faktur' => $data['no_faktur'],
    		'reservasi_id' => $data['reservasi_id'],
    		'nama_pemeriksaan' => $data['nama_pemeriksaan'],
    		'tarif' => str_replace(',', '', $data['tarif']),
    		'jml' => $data['jml'],
    		'total' => str_replace(',', '', $data['total']),
    		'disc' => $data['disc'],
    		'subtotal' => str_replace(',', '', $data['subtotal']),
            'u_id' => Auth::user()->id,
    	]);
    	return redirect()->route('medis.pemeriksaan.index')->with('message','Pemeriksaan berhasil ditambah');
    }

    public function show($id) {
    	 $reservasi = Reservasi::all();
    	 $pemeriksaan = Pemeriksaan::find($id);
    	 return view('rekam_aktivitas.medis.pemeriksaan.show', get_defined_vars());
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
