<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategoripemeriksaan;
use App\DataPemeriksaan;
class DataPemeriksaanController extends Controller
{
	public function index() {
		$data_pemeriksaan = DataPemeriksaan::all();
		return view('masterdata.pemeriksaan.index', get_defined_vars());
	}

	public function create() {
		$kategori = Kategoripemeriksaan::all();
		return view('masterdata.pemeriksaan.create', get_defined_vars());
	}

	public function save(Request $req) {
		$this->validateWith(array(
			'id_kategori' => 'required|integer',
		));

		$data = $req->all();
		DataPemeriksaan::create([
			'id_kategori' => $data['id_kategori'],
			'nama_pemeriksaan' => $data['nama_pemeriksaan'],
		]);

		return redirect()->route('pemeriksaan.index')->with('message','DATA PEMERIKSAAN BERHASIL DITAMBAH!');
	}

	public function edit($id) {
		$kategori = Kategoripemeriksaan::all();
		$data_pemeriksaan = DataPemeriksaan::find($id);
		return view('masterdata.pemeriksaan.edit', get_defined_vars());
	}

	public function update(Request $request, $id) {
		$this->validateWith(array(
			'id_kategori' => 'required|integer',
		));

		$data = $request->all();
		$data_pemeriksaan = DataPemeriksaan::find($id);
		$data_pemeriksaan->update([
			'id_kategori' => $data['id_kategori'],
			'nama_pemeriksaan' => $data['nama_pemeriksaan'],
		]);
		return redirect()->route('pemeriksaan.index')->with('message','DATA PEMERIKSAAN BERHASIL DIUBAH!');
	}
}