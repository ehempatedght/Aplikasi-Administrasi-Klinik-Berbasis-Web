<?php

namespace App\Http\Controllers\rekam_aktivitas\medis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservasi;
use App\Pasien;
use App\Petugas;
use App\Poli;
use App\Category;
use App\RekamMedis as Rekam;
use Auth;
use PDF;

class ReservasiController extends Controller
{
	public function index() {
		$reservasi = Reservasi::all();
		$rekam = Rekam::all();
		$tampilan_penuh = true;
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
	#-------------------------------------CETAK KARTU------------------------------------#
    public function print_card($id) {
        $reservasi = Reservasi::find($id);
        $pdf = PDF::loadView('rekam_aktivitas.medis.reservasi.cetak_kartu', get_defined_vars());
        $pdf->setPaper('a7', 'landscape');
        return $pdf->download($reservasi->no_urut.'-'.$reservasi->pasien->nama_pasien.'.pdf');
    }

    #------------------------------------------------------------------------------------#

	#-------------------------------- LAPORAN RESERVASI ---------------------------------#
	public function report_reservasi() {
		$dokter = Petugas::where('category_id', '1')->get();
		$poli = Poli::orderBy('nama_poli','ASC')->get();
		return view('rekam_aktivitas.medis.reservasi.index_report', get_defined_vars());
	}

	public function output_report_reservasi($tanggal_awal, $tanggal_akhir, $poli, $dokter, $tipe) {
		$tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
		$tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
		if ((date('d', strtotime($tanggal_awal)) == '01' AND date('d', strtotime($tanggal_akhir)) >= '30') AND date('m', strtotime($tanggal_awal)) == date('m', strtotime($tanggal_akhir))) {
            $bulanan = true;
        } else {
            $bulanan = false;
        }
        
        if ($poli == 'all' && $dokter == 'all') {
        	$reservasi = Reservasi::whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])->get();
        } elseif ($poli != null && $dokter == 'all') {
        	$reservasi = Reservasi::where('poli_id', $poli)->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])->get();
        } elseif($poli == 'all' && $dokter != null) {
        	$reservasi = Reservasi::where('dokter_id', $dokter)->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])->get();
        } else {
        	$reservasi = Reservasi::where('poli_id', $poli)->where('dokter_id', $dokter)->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])->get();
        }

        if (empty($reservasi->first()->poli_id) && empty($reservasi->first()->dokter_id)) {
        	return redirect()->back()->with('message','TIDAK ADA LAPORAN PADA PERIODE YANG DIINPUT ATAU PADA POLI DAN DOKTER YANG DIPILIH');
        }

        if ($tipe == 'pdf') {
        	$tampilan_penuh = true;
        	return view('rekam_aktivitas.medis.reservasi.pdf', get_defined_vars());
        }
	} 
}
