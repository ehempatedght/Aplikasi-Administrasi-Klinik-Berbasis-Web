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
            'no_rm' => $no_rm,
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
    		return redirect()->route('masterdata.pasien.datapasien.index')->with('message','Pasien '.$pasien->nama_pasien.' Berhasil Ditambah');
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
    		return redirect()->route('masterdata.pasien.datapasien.index', $pasien->id_pasien)->with('message','Pasien berhasil diubah!');
    	}
    }

    public function no_rekamMedis() {
        $panjang = 4;
        $no_pend = Pasien::whereRaw('id = (select max(id) from pasien )')->first();
        // dd($id_cust->id_customer);
        if(empty($no_pend)){
          $angka = 0;
        }else{
          $angka = substr($no_pend->id, 0);
        }
        $angka = $angka + 1;
        $angka = strval($angka);
        $tmp = "";
        for($i=1; $i<=($panjang-strlen($angka)); $i++) {
          $tmp=$tmp."0";
        }
        $hasil = $tmp.$angka;
        // dd($hasil);
        return $hasil;
    }

    public function hapus($id) {
    	$pasien = Pasien::find($id);
    	if ($pasien->delete()) {
    		return redirect()->route('masterdata.pasien.datapasien.index', $pasien->id)->with('message','Pasien '.$pasien->nama_pasien.' berhasil dihapus!');
    	}
    }

    #---------------------------- Laporan Registrasi -----------------------------#
    public function index_report() {
        $kategori = Kategoripasien::all();
        return view('masterdata.pasien.laporan_index', get_defined_vars());
    }

    public function output_report($tanggal_awal, $tanggal_akhir, $id_kategori, $tipe) {
        $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
        $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
        if ((date('d', strtotime($tanggal_awal)) == '01' AND date('d', strtotime($tanggal_akhir)) >= '30') AND date('m', strtotime($tanggal_awal)) == date('m', strtotime($tanggal_akhir))) {
            $bulanan = true;
        } else {
            $bulanan = false;
        }
        $patient = Pasien::get();
        if ($id_kategori == 'all') {
            $pasien = Pasien::whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])->get();
        } else {
            $pasien = Pasien::where('kategoripasien_id', $id_kategori)->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])->get();
        }
        if (empty($pasien->first()->kategoripasien_id)) {
            return redirect()->back()->with('message','TIDAK ADA LAPORAN PADA PERIODE YANG DIINPUT ATAU PADA KATEGORI YANG DIPILIH');
        }
        if ($tipe == 'pdf') {
            $tampilan_penuh = true;
            return view('masterdata.pasien.pdf', get_defined_vars());
        }
    }

    #---------------------------- END REPORT ----------------------------------#
}
