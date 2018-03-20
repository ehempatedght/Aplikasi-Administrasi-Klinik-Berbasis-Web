<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Day;
use App\Petugas;

class JadwalController extends Controller
{
    public function getJadwal() {
    	$petugass = Petugas::all();
    	$days = Day::orderBy('id','ASC')->get();
    	return view('masterdata.jadwal.jadwal', compact('petugass','days'));
    }
}
