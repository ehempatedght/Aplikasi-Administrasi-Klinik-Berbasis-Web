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
	public function doInsert(Request $request) {
		$this->validate($request, array(
			'nama_poli'=>'required'
		));
		$data = $request->all();
		$poli = Poli::create($data);
		if ($poli) {
			return redirect()->route('masterdata.poli.index')->with('message',''.$poli->nama_poli.' BERHASIL DITAMBAH!');
		}
	}
	public function doUpdate(Request $request, $id) {
		$this->validate($request, array(
			'nama_poli'=>'required'
		));
		$poli = Poli::find($id);
		$data = $request->all();
		if ($poli->update($data)) {
			return redirect()->route('masterdata.poli.index')->with('message','POLI BERHASIL DIUBAH!');
		}
	}
	public function doDelete($id) {
		$poli = Poli::find($id);
		if ($poli->reservasi->count() > 0) {
			return redirect()->back()->with('message2',''.$poli->nama_poli.' TIDAK DAPAT HAPUS KARENA BERHUBUNGAN DENGAN DATA LAIN!');
		} else {
			$poli->delete();
			return redirect()->route('masterdata.poli.index')->with('message',''.$poli->nama_poli.' BERHASIL DIHAPUS!');
		}

	}
}
