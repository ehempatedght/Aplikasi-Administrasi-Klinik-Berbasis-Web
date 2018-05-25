<?php

namespace App\Http\Controllers\akunting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NamaAkun;
use App\TipeAkun;
use App\Transaksi;
use Auth;

class TransaksiController extends Controller
{
    public function index() {
    	$tampilan_penuh = true;
    	$transaksi = Transaksi::orderBy('id_transaksi','ASC')->get();
    	return view('akunting.transaksi.index', get_defined_vars());
    }

    public function create() {
    	$tipeAkun = TipeAkun::all();
    	$namaAkun = NamaAkun::all();
    	return view('akunting.transaksi.create', get_defined_vars());
    }

    public function save(Request $req) {
    	$data = $req->all();
    	$namaAkun = Transaksi::where('id_akun',$data['id_akun'])->orderBy('id_transaksi','DESC')->first();
    	// dd($data, $namaAkun);
    	if (isset($data['pemasukan'])) {
    		if (empty($namaAkun->id_akun)) {
    			$nominal = str_replace(',', '', $data['nominal']);
    			$jumlah = $data['jumlah'];
    			$saldo = 0 + ($nominal * $jumlah);
    		} else {
    			if($namaAkun->id_akun == $data['id_akun']) {
	    			if($namaAkun->saldo < 0) {
	    				$nominal = str_replace(',', '', $data['nominal']);
	    				$jumlah = $data['jumlah'];
	    				$saldo = ($namaAkun->saldo) + ($nominal * $jumlah);
	    			}

	    			if ($namaAkun->saldo > 0) {
	    				$nominal = str_replace(',', '', $data['nominal']);
	    				$jumlah = $data['jumlah'];
	    				$saldo = ($namaAkun->saldo) + ($nominal * $jumlah);
	    			}
	    		}
    		}

			Transaksi::create([
				'id_akun' => $data['id_akun'],
				'tgl' => date('Y-m-d', strtotime($data['tgl'])),
				'keterangan' => $data['keterangan'],
				'nominal' => str_replace(',', '', $data['nominal']),
				'jumlah' => $data['jumlah'],
				'pengeluaran' => 0,
				'pemasukan' =>  str_replace(',', '', $data['nominal']) * $data['jumlah'],
				'saldo' => str_replace('', '', $saldo),
				'u_id' => Auth::user()->id
    		]);

    		return redirect()->route('transaksi.index')->with('message','Transaksi berhasil ditambah!');
    	}


    	if (isset($data['pengeluaran'])) {
    		if (empty($namaAkun->id_akun)) {
    			$nominal = str_replace(',', '', $data['nominal']);
    			$jumlah = $data['jumlah'];
    			$saldo = 0 - ($nominal * $jumlah);
    		} else {
    			if($namaAkun->id_akun == $data['id_akun']) {
	    			if($namaAkun->saldo < 0) {
	    				$nominal = str_replace(',', '', $data['nominal']);
	    				$jumlah = $data['jumlah'];
	    				$saldo = ($namaAkun->saldo) - ($nominal * $jumlah);
	    			}

	    			if ($namaAkun->saldo > 0) {
	    				$nominal = str_replace(',', '', $data['nominal']);
	    				$jumlah = $data['jumlah'];
	    				$saldo = ($namaAkun->saldo) - ($nominal * $jumlah);
	    			}
	    		}
    		}

    		Transaksi::create([
				'id_akun' => $data['id_akun'],
				'tgl' => date('Y-m-d', strtotime($data['tgl'])),
				'keterangan' => $data['keterangan'],
				'nominal' => str_replace(',', '', $data['nominal']),
				'jumlah' => $data['jumlah'],
				'pengeluaran' => str_replace(',', '', $data['nominal']) * $data['jumlah'],
				'pemasukan' =>  0,
				'saldo' => str_replace('', '', $saldo),
				'u_id' => Auth::user()->id
    		]);

    		return redirect()->route('transaksi.index')->with('message','Transaksi berhasil ditambah!');
    	}	
    }

    public function delete($id) {
    	Transaksi::find($id)->delete();
    	return redirect()->route('transaksi.index')->with('message','Transaksi berhasil dihapus!');
    }
}
