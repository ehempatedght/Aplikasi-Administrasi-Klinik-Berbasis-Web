<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jenisobat;
use App\Jenisobatdetail;
use App\Donasiobat;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class JenisobatController extends Controller
{
	public function getIndex() {
		$jenis_obat = Jenisobatdetail::all();
		return view('masterdata.obat.get_index', compact('jenis_obat'));
	} 

	public function getCreate() {
		return view('masterdata.obat.get_create');
	}

	public function createJenis() {
		$jenisobat =Jenisobat::get();
		return view('masterdata.obat.create_jenis')->withJenisobat($jenisobat);
	}

	public function doInsert(Request $request) {
		$data = $request->all();
		 $this->validate($request, array(
		 	'nama_obat'=>'required|max:50',
		 	'satuan'=>'required',
		 	'harga'=>'required',
		 ));


		 foreach ($data['jenis_obat_id'] as $key => $value) {
		 	Jenisobatdetail::create([
		 		'jenis_obat_id' => $data['jenis_obat_id'][$key],
		 		'kd_jenis' => $data['kd_jenis'][$key],
		 		'nama_obat'=>$data['nama_obat'][$key],
 	 			'satuan'=>$data['satuan'][$key],
 	 			'deskripsi'=>$data['deskripsi'][$key],
 	 			'harga'=>str_replace(',', '',$data['harga'][$key]),
 	 			'stok'=>$data['stok'][$key]
			]);
		  }
		return redirect()->route('masterdata.daftarobat.index')->with('message','Obat berhasil dibuat!');
	}

	public function getEdit($id) {
		$data = Jenisobatdetail::find($id);
		$jenisobat = Donasiobat::get();
		return view('masterdata.obat.get_edit', get_defined_vars());
	}

	public function doUpdate(Request $request, $id) {
		$data = $request->all();
		 $this->validate($request, array(
		 	'nama_obat'=>'required|max:50',
		 	'satuan'=>'required',
		 	'harga'=>'required',
		 ));

		 $update = Jenisobatdetail::find($id);
		 $update->update([
		 	'jenis_obat_id' => $data['jenis_obat_id'],
		 	'kd_jenis' => $data['kd_jenis'],
		 	'nama_obat'=>$data['nama_obat'],
 	 		'satuan'=>$data['satuan'],
 	 		'deskripsi'=>$data['deskripsi'],
 	 		'harga'=>str_replace(',', '',$data['harga']),
 	 		'stok'=>$data['stok']
		 ]);

		 return redirect()->route('masterdata.daftarobat.index')->with('message','Obat berhasil diupdate!');

	}

	public function doDelete($id) {
		$jenis = Jenisobatdetail::find($id);
		//$test = $jenis->vendor->count() > 0;
		//dd($test);
		if ($jenis->vendor->count() > 0) {
			return redirect()->back()->with('message2','OBAT '.$jenis->nama_obat.' TIDAK DAPAT DIHAPUS KARENA BERHUBUNGAN DENGAN DATA LAIN!');
		} else {
			$jenis->delete();
			return redirect()->route('masterdata.daftarobat.index')->with('message','OBAT BERHASIL DIHAPUS!');
		}
	}

	public function KdObat($id) {
		$kode = Donasiobat::where('id', $id)->count();
		return 'JNS00'.$id;
	}

}
