<?php

namespace App\Http\Controllers\rekam_aktivitas\keuangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Operasional;
use DB;

class OperasionalController extends Controller
{
	public function index() {
		$operasional = DB::table('operasional')->groupBy('tgl')->get();
		return view('rekam_aktivitas.keuangan.pengeluaran.operasional.index', compact('operasional'));
	}

	public function create() {
		return view('rekam_aktivitas.keuangan.pengeluaran.operasional.create');
	}

	public function save(Request $request) {
		$this->validateWith(array(
			'tgl' => 'required',
			'jumlah' => 'required',
			'total' => 'required'
		));

		$data = $request->all();
		for ($i=0; $i < count($request->keterangan); $i++) { 
			Operasional::create([
				'tgl' => date('Y-m-d', strtotime($data['tgl'])),
				'keterangan' => $data['keterangan'][$i],
				'jumlah' => str_replace(',', '', $data['jumlah'][$i]),
				'total' => str_replace(',', '', $data['total'])
			]);
		}

		return redirect()->route('pengeluaran.operasional.index')->with('message','Operasional berhasil ditambah!');
	}

	public function edit($tgl) {
		$operasional = Operasional::where('tgl', $tgl)->get();
		return view('rekam_aktivitas.keuangan.pengeluaran.operasional.edit', get_defined_vars(), get_object_vars($this));
	}

	public function update(Request $req, $tgl) {
		$operasional = Operasional::where('tgl', $tgl)->delete();
		$this->validateWith(array(
			'tgl' => 'required',
			'jumlah' => 'required',
			'total' => 'required'
		));

		$data = $req->all();
		for ($i=0; $i < count($req->keterangan); $i++) { 
			Operasional::create([
				'tgl' => date('Y-m-d', strtotime($data['tgl'])),
				'keterangan' => $data['keterangan'][$i],
				'jumlah' => str_replace(',', '', $data['jumlah'][$i]),
				'total' => str_replace(',', '', $data['total'])
			]);
		}

		return redirect()->route('pengeluaran.operasional.index')->with('message','Operasional berhasil diubah!');
	}

	public function show($tgl) {
		$operasional = Operasional::where('tgl', $tgl)->get();
		return view('rekam_aktivitas.keuangan.pengeluaran.operasional.show', compact('operasional'));
	}

	public function doDelete($tgl) {
		Operasional::where('tgl', $tgl)->delete();
		return redirect()->route('pengeluaran.operasional.index')->with('message','Operasional berhasil dihapus!');
	}    
}
