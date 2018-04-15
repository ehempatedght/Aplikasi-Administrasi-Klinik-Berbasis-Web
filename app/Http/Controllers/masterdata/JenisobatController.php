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
		$jenis_obat = Jenisobat::all();
		return view('masterdata.obat.get_index', compact('jenis_obat'));
	} 

	public function getCreate() {
		return view('masterdata.obat.get_create', compact('kd_jenis','jenis_obat'));
	}

	public function createJenis() {
		$kd_jenis = $this->KdJenisObat();
		$jenis_obat =Jenisobat::all();
		return view('masterdata.obat.create_jenis', compact('jenis_obat','kd_jenis'));
	}
	public function doInsert(Request $request) {
		$data = $request->all();
		 $this->validate($request, array(
		 	'nama_obat'=>'required|max:50',
		 	'satuan'=>'required',
		 	'harga'=>'required',
		 	'stok'=>'required|integer',
		 	'jenis_obat_id'=>'required|integer'
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

		return redirect()->route('jenisobat.index')->with('message','Jenis obat berhasil dibuat!');

	}

	public function addJenis(Request $request) {
		$required = array(
			'kd_jenis' => 'required',
			'name' => 'required',
		);

		$validator = validator::make(Input::all(), $required);
		if ($validator->fails()) {
			return Response::json(array(
				'errors' => $validator->getMessageBag()->toArray(),
            ));
		} else {
			$data = new Jenisobat();
			$data->kd_jenis = $this->KdJenisObat();
			$data->name = $request->name;
			$data->save();
			return Response::json($data);
		}
	}

	public function KdJenisObat() {
		$panjang = 2;
        $no_rm = Jenisobat::whereRaw('id = (select max(id) from jenis_obat )')->first();
        if (empty($no_rm)) {
            $angka = 0;
        } else {
            $angka = substr($no_rm->id, 0);
        }
        $angka++;
        $angka = strval($angka);
        $tmp = "";
        for ($i=1; $i<=($panjang-strlen($angka)); $i++) { 
            $tmp = $tmp."JN00";
        }

        $hasil = $tmp.$angka;
        // dd($hasil);
        return $hasil;
	}

}
