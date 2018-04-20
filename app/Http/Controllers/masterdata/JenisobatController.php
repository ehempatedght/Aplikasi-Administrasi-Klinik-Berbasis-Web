<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jenisobat;
use App\Jenisobatdetail;
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
		// $kdjenis = $this->KdJenisObat();
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

		// $nama_obat = Input::get('nama_obat');
		// foreach ($nama_obat as $obat_detail) {
		// 	Jenisobatdetail::create([
		// 		'jenis_obat_id' => $data['jenis_obat_id'],
		// 		'nama_obat' => $data['nama_obat'],
		// 		'satuan' => $data['satuan'],
		// 		'deskripsi' => $data['deskripsi'],
		// 		'harga' => $data['harga'],
		// 		'stok' => $data['stok']
		// 	]);
		// }

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

		// if (!empty($data['jenis_obat_id'])) {
		// 	foreach ($data['jenis_obat_id'] as $key => $value) {
		// 		if ($data['jenis_obat_id'][$key] != "") {
		// 			$simpan_data2 = [
		// 				'jenis_obat_id'=>$data['jenis_obat_id'][$key],
		// 				'nama_obat'=>$data['nama_obat'][$key],
		// 				'satuan'=>$data['satuan'][$key],
		// 				'deskripsi'=>$data['deskripsi'][$key],
		// 				'harga'=>$data['harga'][$key],
		// 				'stok'=>$data['stok'][$key],
		// 			];

		// 			$simpan_jenis = Jenisobatdetail::create($simpan_data2);
		// 		}
		// 	}
		// }

		return redirect()->route('daftarobat.index')->with('message','Obat berhasil dibuat!');

	}

	public function getEdit($id) {
		$data = Jenisobatdetail::find($id);
		$jenisobat =Jenisobat::get();
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

		 return redirect()->route('daftarobat.index')->with('message','Obat berhasil diupdate!');

	}

	public function doDelete($id) {
		Jenisobatdetail::find($id)->delete();
		return redirect()->route('daftarobat.index')->with('message','Obat berhasil dihapus!');
	}
	//Using JSON
	public function addJenis(Request $request) {
		$rules = array(
                'name' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(

                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new Jenisobat();
            $data->name = $request->name;
            $data->save();

            return response()->json($data);
        }
	}

	public function updateJenis(Request $request) {
		$data = Jenisobat::find($request->id);
		$data->name = $request->name;
		$data->save();
		return response()->json($data);
	}

	public function hapusJenis(Request $req) {
		Jenisobat::find($req->id)->delete();
		return response()->json();
	}

	public function KdObat($id) {
		$kode = Jenisobat::where('id', $id)->count();
		return 'JNS00'.$id;
	}

}
