<?php

namespace App\Http\Controllers\masterdata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jenisobatdetail;
use App\Vendorobat;
use DB;

class VendorobatController extends Controller
{
    public function getIndex() {
    	$vendorobat = DB::table('vendor_obat')->groupBy('nama_vendor')->get();
    	return view('masterdata.vendorobat.index')->withVendorobat($vendorobat);
    }

    public function getCreate() {
    	$obats = Jenisobatdetail::get();
    	return view('masterdata.vendorobat.add', get_defined_vars());
    }

    public function doAdd(Request $request) {
    	$this->validate($request, array(
    		'nama_vendor' => 'required|max:25',
    		'alamat' => 'required',
    		'no_telp' => 'required',
    		'pic' => 'required|max:25',
    		'no_hp' => 'required',
    		'email' => 'required',
    		'deskripsi' => 'required',
    		'catatan' => 'required'
    	));
        // Vendorobat::create([
        //     'nama_vendor' => $request->nama_vendor,
        //     'alamat' => $request->alamat,
        //     'no_telp' => $request->no_telp,
        //     'pic' => $request->pic,
        //     'no_hp' => $request->no_hp,
        //     'email' => $request->email,
        //     'deskripsi' => $request->deskripsi,
        //     'obat_id' => $request->obat_id,
        //     'catatan' => $request->catatan
        // ]);
    	for ($i=0; $i < count($request->obat_id); $i++) {
    		$input = Vendorobat::create([
    			'nama_vendor' => $request->nama_vendor,
    			'alamat' => $request->alamat,
    			'no_telp' => $request->no_telp,
    			'pic' => $request->pic,
    			'no_hp' => $request->no_hp,
    			'email' => $request->email,
    			'deskripsi' => $request->deskripsi,
    			'obat_id' => $request->obat_id[$i],
    			'catatan' => $request->catatan[$i]
    		]); 
    	}

    	return redirect()->route('masterdata.vendorobat.index')->with('message','Vendor berhasil ditambah!');
    }

    public function getEdit($nama_vendor) {
        $vendor = Vendorobat::where('nama_vendor', $nama_vendor)->get();
        $obats = Jenisobatdetail::get();
        return view('masterdata.vendorobat.edit', get_defined_vars(), get_object_vars($this));
    }

    public function doUpdate(Request $request, $nama_vendor) {
            $first_id = Vendorobat::where('nama_vendor', $nama_vendor)->first();
            $vendor = Vendorobat::where('nama_vendor', $nama_vendor)->delete();
            $this->validate($request, array(
                'nama_vendor' => 'required|max:25',
                'alamat' => 'required',
                'no_telp' => 'required',
                'pic' => 'required|max:25',
                'no_hp' => 'required',
                'email' => 'required',
                'deskripsi' => 'required',
                'catatan' => 'required'
            ));

            for ($i=0; $i < count($request->obat_id); $i++) {
                $input = Vendorobat::create([
                    'id' => $first_id->id,
                    'nama_vendor' => $request->nama_vendor,
                    'alamat' => $request->alamat,
                    'no_telp' => $request->no_telp,
                    'pic' => $request->pic,
                    'no_hp' => $request->no_hp,
                    'email' => $request->email,
                    'deskripsi' => $request->deskripsi,
                    'obat_id' => $request->obat_id[$i],
                    'catatan' => $request->catatan[$i]
                ]); 
            }

            return redirect()->route('masterdata.vendorobat.index')->with('message','Vendor berhasil diupdate!');
        }

    public function doDelete($nama_vendor) {
        Vendorobat::where('nama_vendor', $nama_vendor)->delete();
        return redirect()->route('masterdata.vendorobat.index')->with('Vendor berhasil dihapus!');
    }
}
