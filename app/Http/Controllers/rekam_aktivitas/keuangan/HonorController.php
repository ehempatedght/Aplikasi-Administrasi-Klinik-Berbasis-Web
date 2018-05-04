<?php

namespace App\Http\Controllers\rekam_aktivitas\keuangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Honor;
use App\Category;
use App\Petugas;
class HonorController extends Controller
{
    public function index() {
    	$honor = Honor::all();
    	return view('rekam_aktivitas.keuangan.pengeluaran.honor.index')->withHonor($honor);
    }

    public function create() {
    	$kategori = Category::all();
    	$petugas = Petugas::all();
    	return view('rekam_aktivitas.keuangan.pengeluaran.honor.create', get_defined_vars());
    }

    public function save(Request $request) {
    	$this->validateWith(array(
    		'tgl' => 'required',
    		'category_id' => 'required|integer',
    		'jumlah' => 'required',
    		'jam' => 'required',
    		'total' => 'required'
    	));

    	$data = $request->all();
    	Honor::create([
    		'tgl' => date('Y-m-d', strtotime(($data['tgl']))),
    		'category_id' => $data['category_id'],
    		'petugas_id' => $data['petugas_id'],
    		'jumlah' => str_replace(',', '', $data['jumlah']),
    		'jam' => $data['jam'],
    		'total' => str_replace(',', '', $data['total'])
    	]);

    	return redirect()->route('pengeluaran.honor.index')->with('message','Honor berhasil ditambah!');
    }

    public function edit($id) {
    	$honor = Honor::find($id);
    	$kategori = Category::all();
    	$petugas = Petugas::all();
    	return view('rekam_aktivitas.keuangan.pengeluaran.honor.edit', get_defined_vars());
    }

    public function doUpdate(Request $req, $id) {
        $data = $req->all();
        $honor = Honor::find($id);
        if ($honor->update([
            'tgl' => date('Y-m-d', strtotime(($data['tgl']))),
            'category_id' => $data['category_id'],
            'petugas_id' => $data['petugas_id'],
            'jumlah' => str_replace(',', '', $data['jumlah']),
            'jam' => $data['jam'],
            'total' => str_replace(',', '', $data['total'])
        ])) {
            return redirect()->route('pengeluaran.honor.index')->with('message','Honor berhasil diubah!');
        }
    }

    public function show($id) {
    	$honor = Honor::find($id);
    	$kategori = Category::all();
    	$petugas = Petugas::all();
    	return view('rekam_aktivitas.keuangan.pengeluaran.honor.show', get_defined_vars());
    }

    public function delete($id) {
    	Honor::find($id)->delete();
    	return redirect()->route('pengeluaran.honor.index')->with('message','Honor berhasil dihapus!');
    }

}
