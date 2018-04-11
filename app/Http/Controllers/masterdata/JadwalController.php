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

    public function getCreate() {
    	$days = Day::all();
    	$petugass = Petugas::all();
    	$categories = Category::all();
    	$data = [
    		'categories'=>$categories,
    		'days'=>$days
    	];
    	return view('masterdata.jadwal.create', get_defined_vars());
    }

    public function addJadwal(Request $request) {
    	$data = $request->all();
    	dd($data);

    	$petugas->save();
    	if (isset($request->days)) {
    		$petugas->days()->sync($request->days);
    	} else {
    		$petugas->days()->sync(array());
    	}

    	return redirect()->route('jadwal.jadwal')->with('message','Berhasil tambah jadwal');


    }

    public function cari_petugas($id) {
    	$data = DB::table('petugas')
    	->join('categories','categories.id','=','petugas.category_id')
    	->where('petugas.id','=', $id)->first();

    	return Response::json($data);
    }
}
