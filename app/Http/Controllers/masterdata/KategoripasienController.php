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
    		return redirect()->route('kategoripasien.index')->with('message','Kategori '.$kategori->nama_kategori.' berhasil ditambah!');
    	}
    }

    public function doUpdate(Request $request, $id) {
    	$this->validate($request, array(
    		'nama_kategori' => 'required|max:50'
    	));
    	$data = $request->all();
    	$kategori = Kategoripasien::find($id);
    	if ($kategori->update($data)) {
    		return redirect()->route('kategoripasien.index')->with('message','Kategori berhasil diubah!');
    	}
    }

    public function doDelete($id) {
    	$kategori = Kategoripasien::find($id);
    	if ($kategori->delete()) {
    		return redirect()->route('kategoripasien.index')->with('message','Kategori '.$kategori->nama_kategori.' berhasil dihapus!');	
    	}
    }
}
