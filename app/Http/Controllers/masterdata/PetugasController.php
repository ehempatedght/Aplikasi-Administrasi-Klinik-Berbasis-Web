<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Petugas;
use App\Category;
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
		$data = [
			'categories'=>$categories,
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
		
		if($request->hasFile('photo')) {
            $cek_ekstensi = $data['photo']->getClientMimeType();
            if (substr($cek_ekstensi, 0, 5) != "image") {
                return redirect()->back()->withInput()->with("error_upload", "Format file harus gambar!");
            } else {
                $img = random_int(0, 9999).'-'.$data['photo']->getClientOriginalName();
                $destination = public_path().'/petugas';
                $request->file('photo')->move($destination, $img);
            }
        } else {
            $img ='';
        }
		Petugas::create([
			'nama' => $nama,
			'img' => $img,
			'spesialisasi' => $spesialisasi,
			'alamat' => $alamat,
			'kota' => $kota,
			'no_hp' => $no_hp,
			'no_telp' => $no_telp,
			'alamat_email' => $alamat_email,
			'tgl_mulai_praktek' => $tgl_mulai,
			'category_id' => $category_id,
		]);
		return redirect()->route('masterdata.petugasmedis.datapetugasmedis.index')->with('message','Petugas medis berhasil ditambah!');
	}

	public function getEdit($id) {
		$data = Petugas::where('id', $id)->with('days')->first();
		$categories = Category::all();
		$cats = array();
		foreach ($categories as $category) {
			$cats[$category->id] = $category->nama_kategori;
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
		

		if($request->hasFile('photo')) {
            $cek_ekstensi = $data['photo']->getClientMimeType();
            if (substr($cek_ekstensi, 0, 5) != "image") {
                return redirect()->back()->with("error_upload", "Format file harus gambar!");
            } else {
                File::delete('petugas/'.$data['gambar_lama']);
                $img = random_int(0, 9999).'-'.$data['photo']->getClientOriginalName();
                $destination = public_path().'/petugas';
                $request->file('photo')->move($destination, $img);
            }
        } else {
            $img = Petugas::find($id)->img;
        }

        if (Auth::user()->petugasmedis == '1') {
        	Petugas::where('id', $id)->update([
        		'nama' => $nama,
        		'img' => $img,
				'spesialisasi' => $spesialisasi,
				'alamat' => $alamat,
				'kota' => $kota,
				'no_hp' => $no_hp,
				'no_telp' => $no_telp,
				'alamat_email' => $alamat_email,
				'tgl_mulai_praktek' => $tgl_mulai,
				'category_id' => $category_id,
        	]);
        }
     
      	return redirect()->route('masterdata.petugasmedis.datapetugasmedis.index')->with('message','Petugas medis berhasil diubah');
     

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
			return redirect()->route('masterdata.petugasmedis.datapetugasmedis.index')->with('message2','Petugas medis '.strtoupper($petugas->nama).' berhasil dihapus!');
		}

	}
}
