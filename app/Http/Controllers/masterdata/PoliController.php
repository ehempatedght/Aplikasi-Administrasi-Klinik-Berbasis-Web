<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Poli;
class PoliController extends Controller
{
	public function getPoli() {
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
			return redirect()->route('masterdata.poli.index')->with('message',''.$poli->nama_poli.' berhasil ditambah');
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
		$poli = Poli::find($id);
		if ($poli->reservasi->count() > 0) {
			return redirect()->back()->with('message2',''.$poli->nama_poli.' TIDAK DAPAT HAPUS KARENA SEDANG DIGUNAKAN RESERVASI!');
		} else {
			$poli->delete();
			return redirect()->route('masterdata.poli.index')->with('message',''.$poli->nama_poli.' BERHASIL DIHAPUS!');
		}

	}
}
