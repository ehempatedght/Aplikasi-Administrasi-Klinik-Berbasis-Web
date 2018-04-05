<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Peralatanmedik;

class PeralatanmedisController extends Controller
{
    public function getIndex() {
    	$peralatanmediks = Peralatanmedik::orderBy('id','DESC')->get();
    	return view('masterdata.peralatan.medis.index', compact('peralatanmediks'));
    }

    public function doAdd(Request $request) {
    	$this->validate($request, array(
    		'kd_alat' => 'required|max:8',
    		'nm_alat' => 'required|max:55',
    		'jumlah' => 'required|integer',
    	));

    	$data = $request->all();
    	$peralatanmedik = Peralatanmedik::create([
    		'kd_alat' => $data['kd_alat'],
    		'nm_alat' => $data['nm_alat'],
    		'jenis_alat' => $data['jenis_alat'],
    		'jumlah' => $data['jumlah'],
    		'description' => $data['description']
    	]);

    	if ($peralatanmedik) {
    		return redirect()->route('alatmedis.index')->with('message','Peralatan '.strtoupper($peralatanmedik->nm_alat).' berhasil dibuat!');
    	}
    }

    public function doUpdate(Request $request, $id) {
    	$this->validate($request, array(
    		'kd_alat' => 'required|max:8',
    		'nm_alat' => 'required|max:55',
    		'jumlah' => 'required|integer',
    	));

    	$data = $request->all();
    	$peralatanmedik = Peralatanmedik::find($id);
    	if ($peralatanmedik->update([
    		'kd_alat' => $data['kd_alat'],
    		'nm_alat' => $data['nm_alat'],
    		'jenis_alat' => $data['jenis_alat'],
    		'jumlah' => $data['jumlah'],
    		'description' => $data['description']
    	])) {
    		return redirect()->route('alatmedis.index')->with('message','Peralatan berhasil diupdate');
    	}
    }

    public function doHapus($id) {
    	$peralatanmedik = Peralatanmedik::find($id);
    	if ($peralatanmedik->delete()) {
    		return redirect()->route('')->with('message','Peralatan '.strtoupper($peralatanmedik->nm_alat).' berhasil dihapus!');
    	}
    }
}
