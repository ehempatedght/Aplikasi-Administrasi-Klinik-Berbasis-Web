<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Peralatankantor;
class PeralatankantorController extends Controller
{
     public function getIndex() {
    	$Peralatankantors = Peralatankantor::orderBy('id','DESC')->get();
    	return view('masterdata.peralatan.kantor.index', compact('Peralatankantors'));
    }

    public function doAdd(Request $request) {
    	$this->validate($request, array(
    		'kd_alat' => 'required|max:8',
    		'nm_alat' => 'required|max:55',
    		'jumlah' => 'required|integer',
    	));

    	$data = $request->all();
    	$Peralatankantor = Peralatankantor::create([
    		'kd_alat' => $data['kd_alat'],
    		'nm_alat' => $data['nm_alat'],
    		'jenis_alat' => $data['jenis_alat'],
    		'jumlah' => $data['jumlah']
    	]);

    	if ($Peralatankantor) {
    		return redirect()->route('masterdata.peralatan.kantor.index')->with('message','Peralatan '.strtoupper($Peralatankantor->nm_alat).' berhasil dibuat!');
    	}
    }

    public function doUpdate(Request $request, $id) {
    	$this->validate($request, array(
    		'kd_alat' => 'required|max:8',
    		'nm_alat' => 'required|max:55',
    		'jumlah' => 'required|integer',
    	));

    	$data = $request->all();
    	$Peralatankantor = Peralatankantor::find($id);
    	if ($Peralatankantor->update([
    		'kd_alat' => $data['kd_alat'],
    		'nm_alat' => $data['nm_alat'],
    		'jenis_alat' => $data['jenis_alat'],
    		'jumlah' => $data['jumlah']
    	])) {
    		return redirect()->route('masterdata.peralatan.kantor.index')->with('message','Peralatan berhasil diupdate');
    	}
    }
}
