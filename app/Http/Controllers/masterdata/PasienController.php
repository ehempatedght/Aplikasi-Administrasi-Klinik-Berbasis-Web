<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pasien;
use App\Kota;
use App\Kelurahan;
use App\Kecamatan;
use App\Kategoripasien;

class PasienController extends Controller
{
    public function getIndex() {
    	$pasiens = Pasien::orderBy('id','DESC')->get();
    	$kategories = Kategoripasien::all();
    	return view('masterdata.pasien.pasienIndex', compact('pasiens','kategories'));
    }

    public function getCreate() {
    	$kategories = Kategoripasien::all();
    	$kotas = Kota::all();
    	$kelurahans = Kelurahan::all();
    	$kecamatans = Kecamatan::all();
        $no_rekamMedis = $this->no_rekamMedis();
    	return view('masterdata.pasien.Addpasien', get_defined_vars());
    }

    public function doInsert(Request $request) {
    	$this->validate($request, array(
    		'nama_pasien' => 'required|min:3|max:191',
    		'kategoripasien_id' => 'required|integer',
    		'jenis_kelamin' => 'required',
    		'alamat' => 'required',
            'no_rm' => 'required',
    		'id_kota' => 'required|integer',
    		'id_kec' => 'required|integer',
    		'id_kel' => 'required|integer',
    		'status_pernikahan' => 'required',
    		'no_kk' => 'required',
    		'namaIbuKandung' => 'required|min:3|max:191',
    		'namaAyahKandung' => 'required|min:3|max:191',
    		'TanggalLahir' => 'required|date'
    	));

    	$data = $request->all();
        $namaPasien = $data['nama_pasien'];
        $no_rm = $data['no_rm'];
        $IDkategoriPasien = $data['kategoripasien_id'];
        $goldar = $data['golongan_darah'];
        $gender = $data['jenis_kelamin'];
        $alamat = $data['alamat'];
        $IDkota = $data['id_kota'];
        $IDkec = $data['id_kec'];
        $IDkel = $data['id_kel'];
        $kontak = $data['kontak'];
        $pekerjaan = $data['pekerjaan'];
        $status_pernikahan = $data['status_pernikahan'];
        $no_kk = $data['no_kk'];
        $IbuKandung = $data['namaIbuKandung'];
        $AyahKandung = $data['namaAyahKandung'];
        $tgl_lahir = date('Y-m-d', strtotime($data['TanggalLahir']));

    	$pasien = Pasien::create([
            'no_urut' => $no_rm,
    		'nama_pasien' => $namaPasien,
    		'kategoripasien_id' => $IDkategoriPasien,
    		'golongan_darah' => $goldar,
    		'jenis_kelamin' => $gender,
    		'alamat' => $alamat,
    		'kota_id'=> $IDkota,
    		'kec_id' => $IDkec,
    		'kel_id' => $IDkel,
    		'kontak' => $kontak,
    		'pekerjaan' => $pekerjaan,
    		'status_pernikahan' => $status_pernikahan,
    		'no_kk' => $no_kk,
    		'namaIbuKandung' => $IbuKandung,
    		'namaAyahKandung' => $AyahKandung,
    		'TanggalLahir' => $tgl_lahir
    	]);

    	if ($pasien) {
    		return redirect()->route('pasien.index')->with('message','Pasien '.$pasien->nama_pasien.' Berhasil Ditambah');
    	}
    }

    public function getShow($id) {
    	$pasien = Pasien::find($id);
        $kategories = Kategoripasien::all();
    	$kotas = Kota::all();
    	$kelurahans = Kelurahan::all();
    	$kecamatans = Kecamatan::all();
        $no_rekamMedis = $this->no_rekamMedis();
    	return view('masterdata.pasien.Showpasien', get_defined_vars());
    }

    public function getEdit($id) {
    	$pasien = Pasien::find($id);
        $kategories = Kategoripasien::all();
    	$kotas = Kota::all();
    	$kelurahans = Kelurahan::all();
    	$kecamatans = Kecamatan::all();
        $no_rekamMedis = $this->no_rekamMedis();
    	return view('masterdata.pasien.Editpasien', get_defined_vars());
    }

    public function doUpdate(Request $request, $id) {
    	$this->validate($request, array(
    		'nama_pasien' => 'required|min:3|max:191',
    		'kategoripasien_id' => 'required|integer',
    		'jenis_kelamin' => 'required',
    		'alamat' => 'required',
    		'id_kota' => 'required|integer',
    		'id_kec' => 'required|integer',
    		'id_kel' => 'required|integer',
    		'status_pernikahan' => 'required',
    		'no_kk' => 'required',
    		'namaIbuKandung' => 'required|min:3|max:191',
    		'namaAyahKandung' => 'required|min:3|max:191',
    		'TanggalLahir' => 'required|date'
    	));

    	$data = $request->all();

    	$namaPasien = $data['nama_pasien'];
    	$IDkategoriPasien = $data['kategoripasien_id'];
    	$goldar = $data['golongan_darah'];
    	$gender = $data['jenis_kelamin'];
    	$alamat = $data['alamat'];
    	$IDkota = $data['id_kota'];
    	$IDkec = $data['id_kec'];
    	$IDkel = $data['id_kel'];
    	$kontak = $data['kontak'];
    	$pekerjaan = $data['pekerjaan'];
    	$status_pernikahan = $data['status_pernikahan'];
    	$no_kk = $data['no_kk'];
    	$IbuKandung = $data['namaIbuKandung'];
    	$AyahKandung = $data['namaAyahKandung'];
    	$tgl_lahir = date('Y-m-d', strtotime($data['TanggalLahir']));

    	$pasien = Pasien::find($id);
    	if ($pasien->update([
    		'nama_pasien' => $namaPasien,
    		'kategoripasien_id' => $IDkategoriPasien,
    		'golongan_darah' => $goldar,
    		'jenis_kelamin' => $gender,
    		'alamat' => $alamat,
    		'kota_id'=> $IDkota,
    		'kec_id' => $IDkec,
    		'kel_id' => $IDkel,
    		'kontak' => $kontak,
    		'pekerjaan' => $pekerjaan,
    		'status_pernikahan' => $status_pernikahan,
    		'no_kk' => $no_kk,
    		'namaIbuKandung' => $IbuKandung,
    		'namaAyahKandung' => $AyahKandung,
    		'TanggalLahir' => $tgl_lahir
    	])) {
    		return redirect()->route('pasien.index', $pasien->id_pasien)->with('message','Pasien berhasil diubah!');
    	}
    }

    public function no_rekamMedis() {
        $panjang = 2;
        $no_rm = Pasien::whereRaw('id = (select max(id) from pasien )')->first();
        if (empty($no_rm)) {
            $angka = 0;
        } else {
            $angka = substr($no_rm->id, 0);
        }
        $angka++;
        $angka = strval($angka);
        $tmp = "";
        for ($i=1; $i<=($panjang-strlen($angka)); $i++) { 
            $tmp = $tmp."rm00";
        }

        $hasil = $tmp.$angka;
        // dd($hasil);
        return $hasil;
    }

    public function inputKategoriPasien(Request $request) {
        $this->validate($request, array(
            'nama_kategori' => 'required|min:3|max:55'
        ));
        $data = $request->all();
        $kategori = Kategoripasien::create([
            'nama_kategori' => $data['nama_kategori'],
        ]);
        if ($kategori) {
            return redirect()->route('pasien.create')->with('message','Kategori '.$kategori->nama_kategori.' berhasil ditambah!');
        }
    }

    public function inputKotaPasien(Request $request) {
        $this->validate($request, array(
            'nama_kota' => 'required|min:3|max:55'
        ));
        $data = $request->all();
        $kota = Kota::create([
            'nama_kota' => $data['nama_kota'],
        ]);
        if ($kota) {
            return redirect()->route('pasien.create')->with('message','Kota '.$kota->nama_kota.' berhasil ditambah!');
        }
    }

    public function inputKecamatanPasien(Request $request) {
        $this->validate($request, array(
            'nama_kecamatan' => 'required|min:3|max:55',
            'id_kota' => 'required|integer'
        ));
        $data = $request->all();
        $kecamatan = Kecamatan::create([
            'nama_kecamatan' => $data['nama_kecamatan'],
            'kota_id' => $data['id_kota']
        ]);
        if ($kecamatan) {
            return redirect()->route('pasien.create')->with('message','Kecamatan '.$kecamatan->nama_kecamatan.' berhasil ditambah!');
        }
    }

    public function inputKelurahanPasien(Request $request) {
        $this->validate($request, array(
            'nama_kelurahan' => 'required|min:3|max:55',
            'id_kec' => 'required|integer'
        ));
        $data = $request->all();
        $kelurahan = Kelurahan::create([
            'nama_kelurahan' => $data['nama_kelurahan'],
            'kec_id' => $data['id_kec']
        ]);
        if ($kelurahan) {
            return redirect()->route('pasien.create')->with('message','Kelurahan '.$kelurahan->nama_kelurahan.' berhasil ditambah!');
        }
    }

    public function hapus($id) {
    	$pasien = Pasien::find($id);
    	if ($pasien->delete()) {
    		return redirect()->route('pasien.index', $pasien->id)->with('message','Pasien '.$pasien->nama_pasien.' berhasil dihapus!');
    	}
    }
}
