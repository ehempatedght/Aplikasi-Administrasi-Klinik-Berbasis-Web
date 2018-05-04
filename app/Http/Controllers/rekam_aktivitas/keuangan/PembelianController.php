<?php

namespace App\Http\Controllers\rekam_aktivitas\keuangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pembelian;
use DB;
class PembelianController extends Controller
{
    public function index() {
    	$data = Pembelian::orderBy('id','DESC')->get();
    	return view('rekam_aktivitas.keuangan.pengeluaran.pembelian.index', get_defined_vars());
    }

    public function create() {
    	$vendor = DB::table('vendor_obat')->groupBy('nama_vendor')->get();
    	$jenis = DB::table('jenis_obat_detail')->get();
    	return view('rekam_aktivitas.keuangan.pengeluaran.pembelian.create', get_defined_vars());
    }

    public function save(Request $request) {
    	$data = $request->all();
        Pembelian::create([
            'tgl' => date('Y-m-d', strtotime(($data['tgl']))),
            'vendor_id' => $data['vendor_id'],
            'obat_id' => $data['obat_id'],
            'jumlah' => $data['jumlah'],
            'harga' => str_replace(',', '', $data['harga']),
            'total' => str_replace(',', '', $data['total'])
        ]);
    	// for ($i=0; $i < count($request->tgl) ; $i++) { 
    	// 	Pembelian::create([
    	// 		'tgl' => date('Y-m-d', strtotime($data['tgl'])),
    	// 		'vendor_id' => $data['vendor_id'][$i],
    	// 		'obat_id' => $data['obat_id'][$i],
    	// 		'jumlah' => $data['jumlah'][$i],
    	// 		'harga' => str_replace(',', '', $data['harga'][$i]),
    	// 		'total' => str_replace(',', '', $data['jumlah'])
    	// 	]);
    	// }
        
    	return redirect()->route('pengeluaran.pembelian.index')->with('message','Pembelian berhasil disimpan!');
    }

    public function edit($id) {
    	$vendor = DB::table('vendor_obat')->groupBy('nama_vendor')->get();
    	$jenis = DB::table('jenis_obat_detail')->get();
    	$data = Pembelian::find($id);
    	return view('rekam_aktivitas.keuangan.pengeluaran.pembelian.edit', get_defined_vars());
    }

    public function update(Request $request, $id) {
    	$data = $request->all();
        $pembelian = Pembelian::find($id);
        if ($pembelian->update([
            'tgl' => date('Y-m-d', strtotime(($data['tgl']))),
            'vendor_id' => $data['vendor_id'],
            'obat_id' => $data['obat_id'],
            'jumlah' => $data['jumlah'],
            'harga' => str_replace(',', '', $data['harga']),
            'total' => str_replace(',', '', $data['total'])
        ])) {
            return redirect()->route('pengeluaran.pembelian.index')->with('message','Pembelian berhasil diubah!');
        }

    	// for ($i=0; $i < count($request->tgl) ; $i++) { 
    	// 	Pembelian::create([
    	// 		'tgl' => date('Y-m-d', strtotime($data['tgl'])),
    	// 		'vendor_id' => $data['vendor_id'][$i],
    	// 		'obat_id' => $data['obat_id'][$i],
    	// 		'jumlah' => $data['jumlah'][$i],
    	// 		'harga' => str_replace(',', '', $data['harga'][$i]),
    	// 		'total' => str_replace(',', '', $data['jumlah'])
    	// 	]); 
    	// }

    	
    }

    public function show($tgl) {
    	$data = DB::table('pembelian')
    	->join('vendor_obat','vendor_obat.id','=','pembelian.vendor_id')
    	->join('jenis_obat_detail','jenis_obat_detail.id','=','pembelian.obat_id')
    	->where('pembelian.tgl','=', $tgl);
    	return view('rekam_aktivitas.keuangan.pengeluaran.pembelian.show', get_defined_vars());
    }

    public function delete($id) {
    	Pembelian::where('id', $id)->delete();
    	return redirect()->route('pengeluaran.pembelian.index')->with('message','Pembelian berhasil dihapus!');
    }
}
