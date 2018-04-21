<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Poli;
class PoliController extends Controller
{
	public function getPoli() {
		ini_set('memory_limit', '-1'); // Supaya memorynya unlimited
      	ini_set('max_execution_time', 1800); // Supaya execution time jadi 30 menit
		$polis = Poli::orderBy('id','DESC')->get();
		return view('masterdata.poli.poli')->withPolis($polis);
	}

	// public function getCreate() {
	// 	return view('masterdata.poli.create');
	// }

	public function doInsert(Request $request) {
		$this->validate($request, array(
			'nama_poli'=>'required'
		));
		$data = $request->all();
		$poli = Poli::create($data);
		if ($poli) {
			return redirect()->route('masterdata.poli.index')->with('message','Poli '.$poli->nama_poli.' berhasil ditambah');
		}
	}

	// public function doEdit($id) {
	// 	$poli = Poli::find($id);
	// 	return view('masterdata.poli.ubah', compact('poli'));
	// }
	
	public function doUpdate(Request $request, $id) {
		$this->validate($request, array(
			'nama_poli'=>'required'
		));
		$poli = Poli::find($id);
		$data = $request->all();
		if ($poli->update($data)) {
			return redirect()->route('masterdata.poli.index')->with('message','Poli berhasil diubah');
		}
	}

	public function doDelete($id) {
		ini_set('memory_limit', '-1'); // Supaya memorynya unlimited
      	ini_set('max_execution_time', 1800); // Supaya execution time jadi 30 menit

		$poli = Poli::find($id);
		if ($poli->delete()) {
			return redirect()->route('masterdata.poli.index')->with('message',''.$poli->nama_poli.' berhasil dihapus');
		}

	}
}
