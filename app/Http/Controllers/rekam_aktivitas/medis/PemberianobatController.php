<?php

namespace App\Http\Controllers\rekam_aktivitas\medis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pemberianobat;
use App\Jenisobatdetail;
use App\RekamMedis as Rekam;

class PemberianobatController extends Controller
{
    public function index() {
    	$pemberian = Pemberianobat::orderBy('id','DESC')->get();
    	return view('rekam_aktivitas.medis.pemberian.index')->withPemberian($pemberian);
    }
    
    public function create() {
    	$pasien = Rekam::all();
    	$jenis = Jenisobatdetail::all();
    	return view('rekam_aktivitas.medis.pemberian.create', get_defined_vars());
    }

    public function save(Request $req) {
    	$this->validateWith(array(
    		'tgl' => 'required',
    		'no_pend' => 'required|max:6',
    		'pasien_id' => 'required|integer',
    		'jenis_id' => 'required|integer',
    		'obat_id' => 'required|integer',
    		'jumlah' => 'required|integer'
    	));

    	$data = $req->all();
    	Pemberianobat::create([
    		'tgl' => date('Y-m-d', strtotime(($data['tgl']))),
    		'no_pend' => $data['no_pend'],
    		'pasien_id' => $data['pasien_id'],
    		'jenis_id' => $data['jenis_id'],
    		'obat_id' => $data['obat_id'],
    		'jumlah' => $data['jumlah'],
    		'keterangan' => $data['keterangan']
    	]);

    	return redirect()->route('medis.pemberian.index')->with('message','Pemberian berhasil ditambah');
    }

    public function edit($id) {
    	$pasien = Rekam::all();
    	$jenis = Jenisobatdetail::all();
    	$pemberian = Pemberianobat::find($id);
    	return view('rekam_aktivitas.medis.pemberian.edit', get_defined_vars());
    }

    public function update(Request $req, $id) {
    	$this->validateWith(array(
    		'tgl' => 'required',
    		'no_pend' => 'required|max:6',
    		'pasien_id' => 'required|integer',
    		'jenis_id' => 'required|integer',
    		'obat_id' => 'required|integer',
    		'jumlah' => 'required|integer'
    	));

    	$data = $req->all();

    	Pemberianobat::find($id)->update([
    		'tgl' => date('Y-m-d', strtotime(($data['tgl']))),
    		'no_pend' => $data['no_pend'],
    		'pasien_id' => $data['pasien_id'],
    		'jenis_id' => $data['jenis_id'],
    		'obat_id' => $data['obat_id'],
    		'jumlah' => $data['jumlah'],
    		'keterangan' => $data['keterangan']
    	]);

    	return redirect()->route('medis.pemberian.index')->with('message','Pemberian berhasil diubah');
    }
    
    public function show($id) {
    	$pasien = Rekam::all();
    	$jenis = Jenisobatdetail::all();
    	$pemberian = Pemberianobat::find($id);
    	return view('rekam_aktivitas.medis.pemberian.show', get_defined_vars());
    }

    public function delete($id) {
    	$pemberian = Pemberianobat::find($id);
    	if ($pemberian->delete()) {
    		return redirect()->route('medis.pemberian.index')->with('message2','Pemberian berhasil dihapus');
    	}
    }
}
