<?php

namespace App\Http\Controllers\akunting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Akun;

class AkunController extends Controller
{
    public function index() {
    	$akun = Akun::orderBy('id_akun','DESC')->get();
    	return view('akunting.akun.index')->withAkun($akun);
    }


    public function save(Request $req) {
    	$this->validateWith(array(
    		'nama_akun' => 'required|max:25',
    		'tipe_akun' => 'required|max:12'
    	));

    	$data = $req->all();

    	Akun::create([
    		'nama_akun' => $data['nama_akun'],
    		'tipe_akun' => $data['tipe_akun']
    	]);

    	return redirect()->route('akun.index')->with('message','Akun berhasil dibuat');
    }


    public function update(Request $req, $id) {
    	$this->validateWith(array(
    		'nama_akun' => 'required|max:25',
    		'tipe_akun' => 'required|max:12'
    	));
    	$data = $req->all();

    	Akun::find($id)->update([
    		'nama_akun' => $data['nama_akun'],
    		'tipe_akun' => $data['tipe_akun']
    	]);

    	return redirect()->route('akun.index')->with('message','Akun berhasil diubah');
    }

    public function delete($id) {
    	Akun::find($id)->delete();
    	return redirect()->route('akun.index')->with('message','Akun berhasil dihapus');
    }
}
