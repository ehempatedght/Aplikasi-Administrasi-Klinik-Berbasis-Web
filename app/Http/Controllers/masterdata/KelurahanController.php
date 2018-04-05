<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kelurahan;
use App\Kota;
use App\Kecamatan;
class KelurahanController extends Controller
{
	public function getIndex() {
		$kelurahans = Kelurahan::orderBy('id','DESC')->get();
		return view('masterdata.kelurahan.index', compact('kelurahans'));
	}

	public function getCreate() {
		$kotas = Kota::all();
    	$kecamatans = Kecamatan::all();
    	return view('masterdata.kelurahan.Addkelurahan', get_defined_vars());
	}

	public function doAdd(Request $request) {
		$this->validate($request, array(
			'nama_kelurahan' => 'required|max:55',
			'kec_id' => 'required|integer'
		));
		$data = $request->all();
		$kelurahan = Kelurahan::create([
			'nama_kelurahan' => $data['nama_kelurahan'],
			'kec_id' => $data['kec_id']
		]);

		if ($kelurahan) {
			return redirect()->route('kelurahan.index')->with('message','Kelurahan '.$kelurahan->nama_kelurahan.' berhasil ditambah');
		}
	}

	public function getEdit($id) {
		$kotas = Kota::all();
    	$kecamatans = Kecamatan::all();
    	$kelurahan = Kelurahan::find($id);
    	return view('masterdata.kelurahan.edit', get_defined_vars());
	}

	public function doUpdate(Request $request, $id) {
		$this->validate($request, array(
			'nama_kelurahan' => 'required|max:55',
			'kec_id' => 'required|integer'
		));
		$data = $request->all();
		$kelurahan = Kelurahan::find($id);
		if ($kelurahan->update([
			'nama_kelurahan' => $data['nama_kelurahan'],
			'kec_id' => $data['kec_id']
		])) {
			return redirect()->route('kelurahan.index', $kelurahan->id)->with('message','Kelurahan berhasil diubah');
		}
	}

	public function inputKota(Request $request) {
        $this->validate($request, array(
            'nama_kota' => 'required|min:3|max:55'
        ));
        $data = $request->all();
        $kota = Kota::create([
            'nama_kota' => $data['nama_kota'],
        ]);
        if ($kota) {
            return redirect()->route('kelurahan.create')->with('message','Kota '.$kota->nama_kota.' berhasil ditambah!');
        }
    }

    public function inputKecamatan(Request $request) {
        $this->validate($request, array(
            'nama_kecamatan' => 'required|min:3|max:55',
            'id_kota' => 'required|integer'
        ));
        $data = $request->all();
        $kecamatan = Kecamatan::create([
            'nama_kecamatan' => $data['nama_kecamatan'],
            'kota_id' => $data['id_kota']
        ]);
        if ($kecamatan) {
            return redirect()->route('kelurahan.create')->with('message','Kecamatan '.$kecamatan->nama_kecamatan.' berhasil ditambah!');
        }
    }

	public function doDelete($id) {
		$kelurahan = Kelurahan::find($id);
		$kelurahan->delete();
		return redirect()->route('kelurahan.index', $kelurahan->id)->with('message','Kelurahan '.$kelurahan->nama_kelurahan.' berhasil dihapus!');
	}

	// public function deleteKota($id) {
	// 	$kota = Kota::find($id);
	// 	$kota->delete();
	// 	return redirect()->route('kelurahan.create', $kota->id)->with('message','Kota '.$kota->nama_kota.' berhasil dihapus!');
	// }

	// public function deleteKecamatan($id) {
	// 	$kecamatan = Kecamatan::find($id);
	// 	$kecamatan->delete();
	// 	return redirect()->route('kelurahan.create', $kecamatan->id)->with('message','Kecamatan '.$kecamatan->nama_kecamatan.' berhasil dihapus!');
	// }
}
