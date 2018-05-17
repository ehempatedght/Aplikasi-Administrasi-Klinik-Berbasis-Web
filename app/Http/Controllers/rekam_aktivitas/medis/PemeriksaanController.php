<?php

namespace App\Http\Controllers\rekam_aktivitas\medis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservasi;
use App\Pemeriksaan;
use App\Biayapendaftaran;

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
    		'subtotal' => str_replace(',', '', $data['subtotal'])
    	]);
    	return redirect()->route('medis.pemeriksaan.index')->with('message','Pemeriksaan berhasil ditambah');
    }

    public function show($id) {
    	 $reservasi = Reservasi::all();
    	 $pemeriksaan = Pemeriksaan::find($id);
    	 return view('rekam_aktivitas.medis.pemeriksaan.show', get_defined_vars());
    }

    public function no_faktur() {
    	$panjang = 3;
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

}
