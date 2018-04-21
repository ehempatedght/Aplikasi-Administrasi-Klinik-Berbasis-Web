<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;
use App\Day;
use App\Petugas;
use App\Category;
class JadwalController extends Controller
{
    public function getJadwal() {
    	$petugass = Petugas::all();
    	$days = Day::orderBy('id','ASC')->get();
    	$categories = Category::all();
    	return view('masterdata.jadwal.jadwal', get_defined_vars());
    }

    public function getPetugas() {
    	$petugass = Petugas::all();
    	return view('masterdata.jadwal.create', get_defined_vars());
    }

    public function aturJadwal($id) {
        $days = Day::all();
        $petugas = Petugas::find($id);
        return view('masterdata.jadwal.atur', get_defined_vars());
    }

    public function addAtur(Request $request, $id) {
        $data = $request->all();
        $petugas = Petugas::find($id);
        if (isset($request->days)) {
        $petugas->days()->sync($request->days);
        } else {
        $petugas->days()->sync(array());
       }
        $petugas->update([
            'senin1' => $data['senin1'],
            'senin2' => $data['senin2'],
            'selasa1' => $data['selasa1'],
            'selasa2' => $data['selasa2'],
            'rabu1' => $data['rabu1'],
            'rabu2' => $data['rabu2'],
            'kamis1' => $data['kamis1'],
            'kamis2' => $data['kamis2'],
            'jumat1' => $data['jumat1'],
            'jumat2' => $data['jumat2'],
            'sabtu1' => $data['sabtu1'],
            'sabtu2' => $data['sabtu2'],
            'minggu1' => $data['minggu1'],
            'minggu2' => $data['minggu2']
        ]);

        return redirect()->route('jadwal.jadwal')->with('message','Berhasil atur jadwal!');
    }

    // public function cari_petugas($id) {
    // 	$data = DB::table('petugas')
    // 	->join('categories','categories.id','=','petugas.category_id')
    // 	->where('petugas.id','=', $id)->first();

    // 	return Response::json($data);
    // }
}
