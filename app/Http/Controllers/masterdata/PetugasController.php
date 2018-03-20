<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Petugas;
use App\Category;
use App\Day;
use Carbon\Carbon;
use Validator;
use File;

class PetugasController extends Controller
{
    public function getIndex() {
		$petugass = Petugas::orderBy('id','DESC')->get();
   		$categories = Category::all();
    	return view('masterdata.petugas.index', get_defined_vars());
	}

	public function getCreate() {
		$categories = Category::all();
		$days = Day::all();
		$data = [
			'categories'=>$categories,
			'days'=>$days,
		];
		return view('masterdata.petugas.create')->with($data);
	}

	public function getShow($id) {
		$data = Petugas::where('id', $id)->first();
		$categories = Category::all();
		$cats = array();
		foreach ($categories as $category) {
			$cats[$category->id] = $category->nama_kategori;
		}

		$days = Day::all();
		$days2 = array();
		foreach ($days as $day) {
			$days2[$day->id] = $day->days;
		}

		return view('masterdata.petugas.show', get_defined_vars());
	}

	public function doAdd(Request $request) {
		$data = $request->all();

		$nama = $data['nama'];
		$spesialisasi = $data['spesialisasi'];
		$alamat = $data['alamat'];
		$kota = $data['kota'];
		$no_hp = $data['no_hp'];
		$no_telp = $data['no_telp'];
		$alamat_email = $data['alamat_email'];
		$tgl_mulai = $data['tgl_mulai_praktek'];
		$category_id = $data['category_id'];
		$senin1 = $data['senin1'];
		$senin2 = $data['senin2'];
		$selasa1 = $data['selasa1'];
		$selasa2 = $data['selasa2'];
		$rabu1 = $data['rabu1'];
		$rabu2 = $data['rabu2'];
		$kamis1 = $data['kamis1'];
		$kamis2 = $data['kamis2'];
		$jumat1 = $data['jumat1'];
		$jumat2 = $data['jumat2'];
		$sabtu1 = $data['sabtu1'];
		$sabtu2 = $data['sabtu2'];
		$minggu1 = $data['minggu1'];
		$minggu2 = $data['minggu2'];

		$id = Petugas::orderBy('id', 'DESC')->first();
		if($request->hasFile('namaFile')) {
	        $cek_ekstensi = $data['namaFile']->getClientMimeType();
	        if (substr($cek_ekstensi, 0, 5) != "image") {
	          return redirect()->back()->withInput()->with("error_upload", "Format file harus gambar!");
	        } else {
	          $img = $id.'-'.$data['namaFile']->getClientOriginalName();
	          $destination = public_path().'/petugass';
	          $request->image('namaFile')->move($destination, $img);
	        }
	      } else {
	        $img ='user_default.png';
      }

		$petugas = Petugas::create([
			'nama' => $nama,
			'spesialisasi' => $spesialisasi,
			'alamat' => $alamat,
			'kota' => $kota,
			'no_hp' => $no_hp,
			'no_telp' => $no_telp,
			'alamat_email' => $alamat_email,
			'tgl_mulai_praktek' => $tgl_mulai,
			'img' => $img,
			'category_id' => $category_id,
			'senin1' => $senin1,
			'senin2' => $senin2,
			'selasa1' => $selasa1,
			'selasa2' => $selasa2,
			'rabu1' => $rabu1,
			'rabu2' => $rabu2,
			'kamis1' => $kamis1,
			'kamis2' => $kamis2,
			'jumat1' => $jumat1,
			'jumat2' => $jumat2,
			'sabtu1' => $sabtu1,
			'sabtu2' => $sabtu2,
			'minggu1' => $minggu1,
			'minggu2' => $minggu2
		]);
		$petugas->days()->sync($request->days, false);
		if ($petugas) {
			return redirect()->route('petugas.index')->with('message','Petugas medis '.strtoupper($petugas->nama).' berhasil ditambah!');
		} 
	}

	public function getEdit($id) {
		$data = Petugas::where('id', $id)->with('days')->first();
		$categories = Category::all();
		$cats = array();
		foreach ($categories as $category) {
			$cats[$category->id] = $category->nama_kategori;
		}
		$days = Day::all();
		$days2 = array();
		foreach ($days as $day) {
			$days2[$day->id] = $day->days;
		}
		return view('masterdata.petugas.edit', get_defined_vars());
	}

	public function doUpdate(Request $request, $id) {
		$data = $request->all();

		$nama = $data['nama'];
		$spesialisasi = $data['spesialisasi'];
		$alamat = $data['alamat'];
		$kota = $data['kota'];
		$no_hp = $data['no_hp'];
		$no_telp = $data['no_telp'];
		$alamat_email = $data['alamat_email'];
		$tgl_mulai = $data['tgl_mulai_praktek'];
		$category_id = $data['category_id'];
		$senin1 = $data['senin1'];
		$senin2 = $data['senin2'];
		$selasa1 = $data['selasa1'];
		$selasa2 = $data['selasa2'];
		$rabu1 = $data['rabu1'];
		$rabu2 = $data['rabu2'];
		$kamis1 = $data['kamis1'];
		$kamis2 = $data['kamis2'];
		$jumat1 = $data['jumat1'];
		$jumat2 = $data['jumat2'];
		$sabtu1 = $data['sabtu1'];
		$sabtu2 = $data['sabtu2'];
		$minggu1 = $data['minggu1'];
		$minggu2 = $data['minggu2'];

		if($request->hasFile('namaFile')) {
        $cek_ekstensi = $data['namaFile']->getClientMimeType();
        if (substr($cek_ekstensi, 0, 5) != "image") {
          return redirect()->back()->with("error_upload", "Format file harus gambar!");
        } else {
          File::delete('petugass/'.$data['gambar_lama']);
          $img = $id.'-'.$data['namaFile']->getClientOriginalName();
          $destination = public_path().'/petugass';
          $request->image('namaFile')->move($destination, $img);
        }
      } else {
        $file = Petugas::where('id', $id)->first();
        $img = $file->img;
      }

      $petugas = Petugas::where('id', $id)->first();

       if (isset($request->days)) {
       	$petugas->days()->sync($request->days);
		} else {
			$petugas->days()->sync(array());
	   }

      if ($petugas->update([
      	'nama' => $nama,
		'spesialisasi' => $spesialisasi,
		'alamat' => $alamat,
		'kota' => $kota,
		'no_hp' => $no_hp,
		'no_telp' => $no_telp,
		'alamat_email' => $alamat_email,
		'tgl_mulai_praktek' => $tgl_mulai,
		'img' => $img,
		'category_id' => $category_id,
		'senin1' => $senin1,
		'senin2' => $senin2,
		'selasa1' => $selasa1,
		'selasa2' => $selasa2,
		'rabu1' => $rabu1,
		'rabu2' => $rabu2,
		'kamis1' => $kamis1,
		'kamis2' => $kamis2,
		'jumat1' => $jumat1,
		'jumat2' => $jumat2,
		'sabtu1' => $sabtu1,
		'sabtu2' => $sabtu2,
		'minggu1' => $minggu1,
		'minggu2' => $minggu2
      ])) {
      	return redirect()->route('petugas.index')->with('message','Petugas medis berhasil diubah');
      }

		// $petugas = Petugas::find($id);
		// if (isset($request->days)) {
		// 	$petugas->days()->sync($request->days);
		// } else {
		// 	$petugas->days()->sync(array());
		// }

		// if ($petugas->update($data)) {
		// 	return redirect()->route('petugas.index', $petugas->id)->with('message','Petugas medis berhasil diupdate');
		// }

	}

	public function doHapus($id) {
		$petugas = Petugas::find($id);
		$petugas->days()->detach();
		if ($petugas->delete()) {
			return redirect()->route('petugas.index')->with('message2','Petugas medis '.strtoupper($petugas->nama).' berhasil dihapus!');
		}

	}
}
