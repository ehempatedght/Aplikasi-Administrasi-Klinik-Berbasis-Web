<?php

namespace App\Http\Controllers\rekam_aktivitas\keuangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Biayapendaftaran;
use App\Pasien;
class BiayapendaftaranController extends Controller
{
    public function index() {
    	$biaya = Biayapendaftaran::all();
    	return view('rekam_aktivitas.keuangan.penerimaan.biaya_pendaftaran.index')->withBiaya($biaya);
    }

    public function create() {
    	$pasien = Pasien::all();
    	$np = $this->no_pend();
    	return view('rekam_aktivitas.keuangan.penerimaan.biaya_pendaftaran.add')->withPasien($pasien)->withNp($np);
    }

    public function save(Request $request) {
    	$this->validateWith(array(
    		'tgl' => 'required',
    		'no_pend' => 'required',
    		'pasien_id' => 'required|integer',
    		'jumlah' => 'required',
    	));

    	$data = $request->all();
    	Biayapendaftaran::create([
    		'tgl' => date('Y-m-d', strtotime(($data['tgl']))),
    		'no_pend' => $data['no_pend'],
    		'pasien_id' => $data['pasien_id'],
    		'jumlah' => str_replace(',', '',$data['jumlah'])
    	]);

    	return redirect()->route('penerimaan.biaya.index')->with('message','Biaya pendaftaran berhasil ditambah!');
    }

    public function edit($id) {
    	$pasien = Pasien::all();
    	$biaya = Biayapendaftaran::find($id);
    	return view('rekam_aktivitas.keuangan.penerimaan.biaya_pendaftaran.edit', get_defined_vars());
    }

    public function update(Request $request, $id) {
    	$this->validateWith(array(
    		'tgl' => 'required',
    		'no_pend' => 'required',
    		'pasien_id' => 'required|max:50',
    		'jumlah' => 'required',
    	));

    	$data = $request->all();

    	Biayapendaftaran::find($id)->update([
    		'tgl' => date('Y-m-d', strtotime(($data['tgl']))),
    		'no_pend' => $data['no_pend'],
    		'pasien_id' => $data['pasien_id'],
    		'jumlah' => str_replace(',', '',$data['jumlah'])
    	]);

    	return redirect()->route('penerimaan.biaya.index')->with('message','Biaya pendaftaran berhasil diubah!');
    }

    public function show($id) {
    	$biaya = Biayapendaftaran::find($id);
    	return view('rekam_aktivitas.keuangan.penerimaan.biaya_pendaftaran.show', get_defined_vars());
    }

    public function doDelete($id) {
    	Biayapendaftaran::find($id)->delete();
    	return redirect()->route('penerimaan.biaya.index')->with('message','Biaya pendaftaran berhasil dihapus!');
    }

    public function no_pend() {
    	$panjang = 4;
	    $no_pend = Biayapendaftaran::whereRaw('id = (select max(id) from biaya_pendaftaran )')->first();
	    // dd($id_cust->id_customer);
	    if(empty($no_pend)){
	      $angka = 0;
	    }else{
	      $angka = substr($no_pend->id, 0);
	    }
	    $angka = $angka + 1;
	    $angka = strval($angka);
	    $tmp = "";
	    for($i=1; $i<=($panjang-strlen($angka)); $i++) {
	      $tmp=$tmp."0";
	    }
	    $hasil = $tmp.$angka;
	    // dd($hasil);
	    return $hasil;
    }
}
