<?php

namespace App\Http\Controllers\akunting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TipeAkun;
use App\NamaAkun;
class AkunController extends Controller
{
    public function index() {
    	$akun = NamaAkun::orderBy('id_tipe','ASC')->get();
    	$tipe = TipeAkun::all();
    	return view('akunting.akun.index', get_defined_vars());
    }

    public function save(Request $req) {
    	$data = $req->all();
    	NamaAkun::create([
    		'id_tipe' => $data['id_tipe'],
    		'nama_akun' => $data['nama_akun']
    	]);

    	return redirect()->route('akun.index')->with('message','Akun Berhasil dibuat');
    }

    public function update(Request $req, $id) {
    	$data = $req->all();
    	NamaAkun::find($id)->update([
    		'id_tipe' => $data['id_tipe'],
    		'nama_akun' => $data['nama_akun']
    	]);

    	return redirect()->route('akun.index')->with('message','Akun Berhasil diubah');
    }

    public function delete($id) {
    	NamaAkun::find($id)->delete();
    	return redirect()->route('akun.index')->with('message','Akun Berhasil dihapus');
    }
}
