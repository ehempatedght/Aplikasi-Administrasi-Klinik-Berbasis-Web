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
		 	'kd_jenis' => 'required'
		));
		$sum_jenis_obat = Jenisobatdetail::where('jenis_obat_id', $data['jenis_obat_id'])->get()->sum('stok') + $data['stok'];
		$get_jumlah_obat = Donasiobat::where('id', $data['jenis_obat_id'])->get();

		if ($get_jumlah_obat->first()->jumlah == 0) {
			return redirect()->back()->with('message2','OBAT JENIS '.strtoupper($get_jumlah_obat->first()->jns_obt).' TIDAK BISA DIMASUKKAN KE DALAM STOK KARENA SUDAH HABIS!');
		} else {
			if ($data['stok'] > $get_jumlah_obat->first()->jumlah) {
				return redirect()->back()->with('message2','STOK TIDAK BOLEH MELEBIHI JUMLAH!');
			}
			$pengurangan = $get_jumlah_obat->first()->jumlah - $sum_jenis_obat;
			//dd($pengurangan);
			Donasiobat::where('id', $data['jenis_obat_id'])->update([
				'jumlah' => $pengurangan
			]);
		}

		Jenisobatdetail::create([
		 	'jenis_obat_id' => $data['jenis_obat_id'],
		 	'kd_jenis' => $data['kd_jenis'],
		 	'nama_obat'=>$data['nama_obat'],
 	 		'satuan'=>$data['satuan'],
 	 		'deskripsi'=>$data['deskripsi'],
 	 		'harga'=>str_replace(',', '',$data['harga']),
 	 		'stok'=>$data['stok'],
 	 		'total'=>str_replace(',', '',$data['total'])
		]);

		return redirect()->route('masterdata.daftarobat.index')->with('message','OBAT BERHASIL DITAMBAH!');
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

		 $update = Jenisobatdetail::where('id', $id)->get();
		 $get_jumlah = Donasiobat::where('id', $data['jenis_obat_id'])->get();
		 $get_stok = $update->first()->stok;
		 $get_current = $data['stok'];
		 $operation = $get_stok - $get_current;
		 $temp = null;
		 
		 if ($operation > 0) {
		 	$temp = $get_jumlah->first()->jumlah + $operation;
		 } elseif ($operation < 0) {
		 	if ($get_jumlah->first()->jumlah == 0) {
		 		return redirect()->back()->with('message2','TIDAK DAPAT MENAMBAH STOK OBAT KARENA JENIS OBAT '.strtoupper($get_jumlah->first()->jns_obt).' SEDANG KOSONG!');
		 	}
		 	$temp = $get_jumlah->first()->jumlah + $operation;
		 }
		 //dd($get_stok, $get_current, $operation, $get_jumlah->first()->jumlah, $temp);
		 Donasiobat::where('id', $data['jenis_obat_id'])->update([
		 	'jumlah' => $temp
		 ]);

		 Jenisobatdetail::find($id)->update([
		 	'jenis_obat_id' => $data['jenis_obat_id'],
		 	'kd_jenis' => $data['kd_jenis'],
		 	'nama_obat'=>$data['nama_obat'],
 	 		'satuan'=>$data['satuan'],
 	 		'deskripsi'=>$data['deskripsi'],
 	 		'harga'=>str_replace(',', '',$data['harga']),
 	 		'stok'=>$data['stok'],
 	 		'total'=>str_replace(',', '',$data['total'])
		 ]);
		 return redirect()->route('masterdata.daftarobat.index')->with('message','OBAT BERHASIL DIUBAH!');
	}

	public function doDelete($id) {
		$jenis = Jenisobatdetail::find($id);
		//$test = $jenis->vendor->count() > 0;
		//dd($test);
		if ($jenis->vendor->count() > 0) {
			return redirect()->back()->with('message2','OBAT '.$jenis->nama_obat.' TIDAK DAPAT DIHAPUS KARENA BERHUBUNGAN DENGAN DATA LAIN!');
		} else {
			$jenis->delete();
			return redirect()->route('masterdata.daftarobat.index')->with('message2','OBAT BERHASIL DIHAPUS!');
		}
	}
}