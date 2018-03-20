<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pemeriksaan;
use App\Kategoripemeriksaan;

class PemeriksaanController extends Controller
{
    public function getIndex() {
    	$pemeriksaans = Pemeriksaan::all();
    	$kategories = Kategoripemeriksaan::all();
    	return view('masterdata.pemeriksaan.index', compact('pemeriksaans','kategories'));
    }

    public function getCreate() {
    	$kategories = Kategoripemeriksaan::all();
    	return view('masterdata.pemeriksaan.create', compact('kategories'));
    }

    public function doMasukkan(Request $request) {
    	$data = $request->all();

    	$this->validateWith($request, [
    		'nama_pemeriksaan'=>'required|max:500',
    		'id_kategori_pemeriksaan'=>'required|integer',
    		'tarif'=>'required|bigInteger',
    		'diskon'=>'required|bigInteger',
    		'total'=>'required|bigInteger',
    		'jasa_dokter_utama'=>'required|bigInteger',
    		'jasa_asisten'=>'required|bigInteger',
    		'jasa_perawat1'=>'required|bigInteger',
    		'jasa_perawat2'=>'required|bigInteger',
    		'klinik'=>'required|bigInteger'
    	]);

    	$pemeriksaan = Pemeriksaan::create($data);
    	if ($pemeriksaan) {
    		return redirect()->route('petugas.index')->with('message','Pemeriksaan '.$pemeriksaan->nama_pemeriksaan.' berhasil ditambah');
    	}

    }
}
