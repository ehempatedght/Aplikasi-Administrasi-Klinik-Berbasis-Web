<?php

namespace App\Http\Controllers\rekam_aktivitas\keuangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Donasiuang;

class DonasiuangController extends Controller
{
    public function getIndex() {
    	$donasi_uang = Donasiuang::orderBy('id','DESC')->get();
    	return view('rekam_aktivitas.keuangan.penerimaan.donasi_uang.index', compact('donasi_uang'));
    }

    public function getCreate() {
    	return view('rekam_aktivitas.keuangan.penerimaan.donasi_uang.add');
    }

    public function save(Request $request) {
    	$this->validateWith(array(
    		'nama_donatur' => 'required|max:50',
    		'cp' => 'required|max:50',
    		'hp' => 'required|max:15',
    		'jml_donasi' => 'required',
    		'keterangan' => 'required'
    	));

    	$data = $request->all();
    	Donasiuang::create([
    		'nama_donatur' => $data['nama_donatur'],
    		'cp' => $data['cp'],
    		'hp' => $data['hp'],
    		'jml_donasi' => str_replace(',', '', $data['jml_donasi']),
    		'keterangan' => $data['keterangan']
    	]);
    	return redirect()->route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index')->with('message','Donatur berhasil ditambah!');
    }

    public function edit($id) {
    	$donasi_uang = Donasiuang::find($id);
    	return view('rekam_aktivitas.keuangan.penerimaan.donasi_uang.edit', compact('donasi_uang'));
    }

    public function show($id) {
    	$donasi_uang = Donasiuang::find($id);
    	return view('rekam_aktivitas.keuangan.penerimaan.donasi_uang.show', compact('donasi_uang'));
    }

    public function update(Request $request, $id) {
    	$this->validate($request, array(
    		'nama_donatur' => 'required|max:50',
    		'cp' => 'required|max:50',
    		'hp' => 'required|max:15',
    		'jml_donasi' => 'required',
    		'keterangan' => 'required'
    	));

    	$data = $request->all();
    	Donasiuang::find($id)->update([
    		'nama_donatur' => $data['nama_donatur'],
    		'cp' => $data['cp'],
    		'hp' => $data['hp'],
    		'jml_donasi' => str_replace(',', '', $data['jml_donasi']),
    		'keterangan' => $data['keterangan']
    	]);
    	return redirect()->route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index')->with('message','Donatur berhasil diubah!');
    }

    public function doDelete($id) {
    	Donasiuang::find($id)->delete();
    	return redirect()->route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index')->with('message','Donatur berhasil dihapus!');
    }
}
