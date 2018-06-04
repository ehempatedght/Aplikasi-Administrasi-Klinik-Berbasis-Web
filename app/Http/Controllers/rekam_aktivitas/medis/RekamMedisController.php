<?php

namespace App\Http\Controllers\rekam_aktivitas\medis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RekamMedis as Rekam;
use App\Reservasi;
use Auth;

class RekamMedisController extends Controller
{
    public function index() {
    	$rekam = Rekam::all();
    	return view('rekam_aktivitas.medis.rekam_medis.index')->withRekam($rekam);
    }

    public function create() {
    	$reservasi = Reservasi::all();
    	return view('rekam_aktivitas.medis.rekam_medis.create')->withReservasi($reservasi);
    }
    
    public function save(Request $req) {
    	$this->validateWith(array(
    		'res_id' => 'required|integer',
    		'tgl' => 'required',
    	));

    	$data = $req->all();

    	Rekam::create([
    		'res_id' => $data['res_id'],
    		'tgl' => date('Y-m-d', strtotime($data['tgl'])),
    		'rmkeluhan' => $data['rmkeluhan'],
    		'rmpemeriksaan' => $data['rmpemeriksaan'],
    		'rmalergiobat' => $data['rmalergiobat'],
    		'rmterapi' => $data['rmterapi'],
    		'rmresep' => $data['rmresep'],
    		'rmkesimpulan' => $data['rmkesimpulan'],
    		'rmdiagnosa' => $data['rmdiagnosa'],
    		'kondisi_pasien' => $data['kondisi_pasien'],
    		'u_id' => Auth::user()->id
    	]);

        if ($data['res_id'] != null) {
            Reservasi::find($data['res_id'])->update([
                'status_res' => 'Sudah',
            ]);
        }
    	return redirect()->route('rekam_medis.index')->with('message','Rekam medis berhasil dibuat');
    }

    public function edit($id) {
    	$reservasi = Reservasi::all();
    	$rekam = Rekam::find($id);
    	return view('rekam_aktivitas.medis.rekam_medis.edit', get_defined_vars());
    }

    public function update(Request $req, $id) {
    	$this->validateWith(array(
    		'res_id' => 'required|integer',
    		'tgl' => 'required',
    	));

    	$data = $req->all();

    	Rekam::find($id)->update([
    		'res_id' => $data['res_id'],
    		'tgl' => date('Y-m-d', strtotime($data['tgl'])),
    		'rmkeluhan' => $data['rmkeluhan'],
    		'rmpemeriksaan' => $data['rmpemeriksaan'],
    		'rmalergiobat' => $data['rmalergiobat'],
    		'rmterapi' => $data['rmterapi'],
    		'rmresep' => $data['rmresep'],
    		'rmkesimpulan' => $data['rmkesimpulan'],
    		'rmdiagnosa' => $data['rmdiagnosa'],
            'kondisi_pasien' => $data['kondisi_pasien'],
    		'u_id' => Auth::user()->id
    	]);

    	return redirect()->route('rekam_medis.index')->with('message','Rekam medis berhasil diubah!');
    }

    public function show($id) {
    	$reservasi = Reservasi::all();
    	$rekam = Rekam::find($id);
    	return view('rekam_aktivitas.medis.rekam_medis.show', get_defined_vars());
    }

    public function delete($id) {
    	Rekam::find($id)->delete();
    	return redirect()->route('rekam_medis.index')->with('message','Rekam medis berhasil dihapus!');
    }


    #-------------------------------------REPORT-----------------------------------------#
    public function report_index() {
        $rekam = Rekam::all();
        return view('rekam_aktivitas.medis.rekam_medis.index_report')->withRekam($rekam);
    }

    public function output_report($id) {
        $rekam = Rekam::find($id);
        return view('rekam_aktivitas.medis.rekam_medis.pdf', get_defined_vars());
    }
    #-------------------------------------------------------------------------------------#	
}
