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

    	return redirect()->route('akun.index')->with('message','AKUN BERHASIL DIBUAT!');
    }

    public function update(Request $req, $id) {
    	$data = $req->all();
    	NamaAkun::find($id)->update([
    		'id_tipe' => $data['id_tipe'],
    		'nama_akun' => $data['nama_akun']
    	]);

    	return redirect()->route('akun.index')->with('message','AKUN BERHASIL DIUBAH!');
    }

    public function delete($id) {
    	$namaAkun = NamaAkun::find($id);
        if ($namaAkun->transaksi->count() > 0) {
            return redirect()->back()->with('danger','AKUN '.strtoupper($namaAkun->nama_akun).' TIDAK DAPAT DIHAPUS KARENA MEMPUNYAI TRANSAKSI!');
        } elseif ($namaAkun->id_akun == '4' or $namaAkun->id_akun == '8' or $namaAkun->id_akun == '9' or $namaAkun->id_akun == '11') {
            return redirect()->back()->with('danger','AKUN INI TIDAK DAPAT DIHAPUS KARENA BERHUBUNGAN DENGAN DATA '.strtoupper($namaAkun->nama_akun).'!');
        } else {
            $namaAkun->delete();
            return redirect()->route('akun.index')->with('message','AKUN '.strtoupper($namaAkun->nama_akun).' BERHASIL DIHAPUS!');
        }   
    }
}
