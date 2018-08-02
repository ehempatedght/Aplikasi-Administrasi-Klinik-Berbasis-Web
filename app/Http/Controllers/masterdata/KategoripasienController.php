<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Kategoripasien;
class KategoripasienController extends Controller
{
    public function getIndex() {
    	$kategories = Kategoripasien::orderBy('id','DESC')->get();
    	return view('masterdata.kategoripasien.indexkategori', compact('kategories'));
    }

    public function doInsert(Request $request) {
    	$this->validate($request, array(
    		'nama_kategori' => 'required|max:50'
    	));
    	$data = $request->all();
    	$kategori = Kategoripasien::create([
    		'nama_kategori' => $data['nama_kategori']
    	]);

    	if ($kategori) {
    		return redirect()->route('masterdata.pasien.kategori.index')->with('message','KATEGORI '.$kategori->nama_kategori.' BERHASIL DITAMBAH!');
    	}
    }

    public function doUpdate(Request $request, $id) {
    	$this->validate($request, array(
    		'nama_kategori' => 'required|max:50'
    	));
    	$data = $request->all();
    	$kategori = Kategoripasien::find($id);
    	if ($kategori->update($data)) {
    		return redirect()->route('masterdata.pasien.kategori.index')->with('message','KATEGORI BERHASIL DIUBAH!');
    	}
    }

    public function doDelete($id) {
    	$kategori = Kategoripasien::find($id);
        if ($kategori->pasien->count() > 0) {
            return redirect()->back()->with('message2','KATEGORI '.strtoupper($kategori->nama_kategori).' TIDAK DAPAT DIHAPUS KARENA BERHUBUNGAN DENGAN DATA PASIEN!');
        } else {
            $kategori->delete();
            return redirect()->route('masterdata.pasien.kategori.index')->with('message2','KATEGORI '.strtoupper($kategori->nama_kategori).' BERHASIL DIHAPUS!');
        }
    }
}
