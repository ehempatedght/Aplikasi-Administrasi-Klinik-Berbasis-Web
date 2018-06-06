<?php

namespace App\Http\Controllers\rekam_aktivitas\keuangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Donasiobat;
class DonasiobatController extends Controller
{
    public function getIndex() {
    	$donasi_obat = Donasiobat::orderBy('id','DESC')->get();
    	return view('rekam_aktivitas.keuangan.penerimaan.donasi_obat.index', compact('donasi_obat'));
    }

    public function getCreate() {
    	return view('rekam_aktivitas.keuangan.penerimaan.donasi_obat.add');
    }

    public function save(Request $request) {
    	$data = $request->all();
    	$this->validateWith(array(
    		'nama_donatur' => 'required|max:50',
    		'cp' => 'required|max:50',
    		'hp' => 'required|max:14',
    		'jns_obt' => 'required|max:50',
    		'jumlah' => 'required|integer'
    	));
    	Donasiobat::create($data);
    	return redirect()->route('perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index')->with('message','Donatur berhasil ditambah!');
    }

    public function edit($id) {
    	$donasi_obat = Donasiobat::find($id);
    	return view('rekam_aktivitas.keuangan.penerimaan.donasi_obat.edit', compact('donasi_obat'));
    }

    public function update(Request $request, $id) {
    	$data = $request->all();
    	$this->validateWith(array(
    		'nama_donatur' => 'required|max:50',
    		'cp' => 'required|max:50',
    		'hp' => 'required|max:14',
    		'jns_obt' => 'required|max:50',
    		'jumlah' => 'required|integer'
    	));
    	Donasiobat::find($id)->update($data);
    	return redirect()->route('perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index')->with('message','Donatur berhasil diubah!');
    }

    public function show($id) {
    	$donasi_obat = Donasiobat::find($id);
    	return view('rekam_aktivitas.keuangan.penerimaan.donasi_obat.show', compact('donasi_obat'));
    }

    public function delete($id) {
        $donasi_obat = Donasiobat::find($id);
    	if ($donasi_obat->jenis_obat_detail->count() > 0) {
            return redirect()->back()->with('message2', 'DONATUR '.$donasi_obat->nama_donatur.' TIDAK BISA DIHAPUS KARENA BERHUBUNGAN DENGAN DATA LAIN!');
        } else {
            $donasi_obat->delete();
            return redirect()->route('perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index')->with('message','DONATUR BERHASIL DIHAPUS!');
        }
    }
}
