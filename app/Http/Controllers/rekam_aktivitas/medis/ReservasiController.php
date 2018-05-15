<?php

namespace App\Http\Controllers\rekam_aktivitas\medis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservasi;
use App\Pasien;
use App\Petugas;
use App\Poli;
use App\Category;
use App\Pemeriksaan;
use Auth;

class ReservasiController extends Controller
{
	public function index() {
		$reservasi = Reservasi::get();
		$pemeriksaan = Pemeriksaan::get();
		return view('rekam_aktivitas.medis.reservasi.index', get_defined_vars());
	}

	public function create() {
		$pasien = Pasien::orderBy('nama_pasien','ASC')->get();
		$dokter = Petugas::where('category_id', '1')->get();
		$poli = Poli::orderBy('nama_poli','ASC')->get();
		$noRes = $this->no_reservasi();
		$noAntri = $this->no_antri();
		return view('rekam_aktivitas.medis.reservasi.create', get_defined_vars());
	}

	public function save(Request $req) {
		$this->validateWith(array(
			'kd_res' => 'required|max:10',
			'poli_id' => 'required|integer',
			'pasien_id' => 'required',
			'dokter_id' => 'required',
			'no_urut' => 'required',
			'no_rm' => 'required'
		));

		$data = $req->all();

		Reservasi::create([
			'kd_res' => $data['kd_res'],
			'poli_id' => $data['poli_id'],
			'pasien_id' => $data['pasien_id'],
			'dokter_id' => $data['dokter_id'],
			'status_res' => 'Belum',
			'no_urut' => $data['no_urut'],
			'no_rm' => $data['no_rm'],
			'u_id' => Auth::user()->id
		]);

		return redirect()->route('medis.reservasi.index')->with('message','Reservasi berhasil dibuat');
	}

	public function edit($id) {
		$pasien = Pasien::orderBy('nama_pasien','ASC')->get();
		$dokter = Petugas::where('category_id', '1')->get();
		$poli = Poli::orderBy('nama_poli','ASC')->get();
		$reservasi = Reservasi::find($id);
		return view('rekam_aktivitas.medis.reservasi.edit', get_defined_vars());		
	}

	public function update(Request $req, $id) {
		$this->validateWith(array(
			'kd_res' => 'required|max:10',
			'poli_id' => 'required|integer',
			'pasien_id' => 'required|integer',
			'dokter_id' => 'required',
			'no_urut' => 'required',
			'no_rm' => 'required'
		));

		$data = $req->all();

		Reservasi::find($id)->update([
			'kd_res' => $data['kd_res'],
			'poli_id' => $data['poli_id'],
			'pasien_id' => $data['pasien_id'],
			'dokter_id' => $data['dokter_id'],
			'status_res' => 'Belum',
			'no_urut' => $data['no_urut'],
			'no_rm' => $data['no_rm'],
			'u_id' => Auth::user()->id
		]);

		return redirect()->route('medis.reservasi.index')->with('message','Reservasi berhasil diubah');
	}

	public function show($id) {
		$pasien = Pasien::orderBy('nama_pasien','ASC')->get();
		$dokter = Petugas::where('category_id', '1')->get();
		$poli = Poli::orderBy('nama_poli','ASC')->get();
		$reservasi = Reservasi::find($id);
		return view('rekam_aktivitas.medis.reservasi.edit', get_defined_vars());		
	}

	public function delete($id) {
		Reservasi::find($id)->delete();
		return redirect()->route('medis.reservasi.index')->with('message','Reservasi berhasil dihapus');
	}

	// public function search_spesialisasi($id) {
	// 	$spls = Petugas::where('spesialisasi', $id)->count();

	// 	return $id;
	// }

	public function no_reservasi() {
		$panjang = 3;
		$no_res = Reservasi::whereRaw('id_res = (select max(id_res) from reservasi)')->first();
		if (empty($no_res)) {
			$angka = 0;
		} else {
			$angka = substr($no_res->id_res, 0);
		}

		$angka = $angka + 1;
		$angka = strval($angka);
		$tmp = "";
		for ($i = 1; $i <= ($panjang - strlen($angka)); $i++) { 
			$tmp = $tmp."0";
		}
		$hasil = date("ymd").$tmp.$angka;

		return $hasil;
	}

	public function no_antri() {
		$panjang = 3;
		$no_res = Reservasi::whereRaw('id_res = (select max(id_res) from reservasi)')->first();
		if (empty($no_res)) {
			$angka = 0;
		} else {
			$angka = substr($no_res->id_res, 0);
		}

		$angka = $angka + 1;
		$angka = strval($angka);
		$tmp = "";
		for ($i = 1; $i <= ($panjang - strlen($angka)); $i++) { 
			$tmp = $tmp."0";
		}
		$hasil = $tmp.$angka;

		return $hasil;
	}
}
