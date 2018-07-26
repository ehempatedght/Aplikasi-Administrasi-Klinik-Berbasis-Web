<?php

namespace App\Http\Controllers\admin;

use Auth;
use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Hash;
use File;

class UserController extends Controller
{

    public function index() {
        if (Auth::user()->setuser != '1') {
            $this->cek_akses("admin");
        }
    	$users = User::all();
    	return view('admin.user.index')->withUsers($users);
    }

    public function create() {
        if (Auth::user()->setuser != '1') {
            $this->cek_akses("admin");
        }
    	return view('admin.user.create');
    }

    public function simpan(Request $request) {
        $data = $request->all();
        if (!isset($data['role'])) return redirect()->back()->withInput()->with('status','Wajib pilih minimal satu!');

        $nama_depan = $data['first_name'];
        $nama_belakang = $data['last_name'];
        $username = $data['username'];
        $password = $data['password'];
        
        if (User::where('username', $username)->count() > 0) return redirect()->back()->withInput()->with('status_username','Username sudah digunakan!');

        (isset($data['role']['admin']) ? $admin = "1" : $admin = "0");
        (isset($data['role']['petugasmedis']) ? $petugasmedis = "1" : $petugasmedis = "0");
        (isset($data['role']['vendorobat']) ? $vendorobat = "1" : $vendorobat = "0");
        (isset($data['role']['daftarobat']) ? $daftarobat = "1" : $daftarobat = "0");
        (isset($data['role']['datapemeriksaan']) ? $datapemeriksaan = "1" : $datapemeriksaan = "0");
        (isset($data['role']['datapoli']) ? $datapoli = "1" : $datapoli = "0");
        (isset($data['role']['pasien']) ? $pasien = "1" : $pasien = "0");
        (isset($data['role']['peralatan']) ? $peralatan = "1" : $peralatan = "0");
        (isset($data['role']['rekmedis']) ? $rekmedis = "1" : $rekmedis = "0");
        (isset($data['role']['rekkeuangan']) ? $rekkeuangan = "1" : $rekkeuangan = "0");
        (isset($data['role']['akunting']) ? $akunting = "1" : $akunting = "0");
        (isset($data['role']['lpmedis']) ? $lpmedis = "1" : $lpmedis = "0");
        (isset($data['role']['lpakunting']) ? $lpakunting = "1" : $lpakunting = "0");
        (isset($data['role']['setuser']) ? $setuser = "1" : $setuser = "0");
        (isset($data['role']['sethonor']) ? $sethonor = "1" : $sethonor = "0");

        if($request->hasFile('photo')) {
            $cek_ekstensi = $data['photo']->getClientMimeType();
            if (substr($cek_ekstensi, 0, 5) != "image") {
                return redirect()->back()->withInput()->with("error_upload", "Format file harus gambar!");
            } else {
                $img = random_int(0, 9999).'-'.$data['photo']->getClientOriginalName();
                $destination = public_path().'/pengguna';
                $request->file('photo')->move($destination, $img);
            }
        } else {
            $img ='';
        }

    	$user = User::create([
    		'username' => $username,
            'first_name' => $nama_depan,
            'last_name' => $nama_belakang,
            'password' => Hash::make($password),
            'img' => $img,
            'admin' => $admin,
            'petugasmedis' => $petugasmedis,
            'vendorobat' => $vendorobat,
            'daftarobat' => $daftarobat,
            'datapoli' => $datapoli,
            'datapemeriksaan' => $datapemeriksaan,
            'pasien' => $pasien,
            'peralatan' => $peralatan,
            'rekmedis' => $rekmedis,
            'rekkeuangan' => $rekkeuangan,
            'akunting' => $akunting,
            'lpmedis' => $lpmedis,
            'lpakunting' => $lpakunting,
            'setuser' => $setuser,
            'sethonor' => $sethonor
    	]);


        if ($user) {
           return redirect()->route('pengaturan.user.data.index')->with('message','Pengguna '.$user->username.' berhasil ditambah');
        }
    }

    public function edit($id) {
        if (Auth::user()->admin != '1') {
            if($id != Auth::user()->id) return redirect()->back();
        }
        $data = User::where('id', $id)->first();
        return view('admin.user.edit', get_defined_vars());
    }
    
    public function update(Request $request, $id) {
        $data = $request->all();

        if (Auth::user()->admin != '1') {
            if (password_verify($data['password0'], User::find($id)->password)) return redirect()->back()->with('error_1', 'Password lama salah!');
            } else {
                if(!isset($data['role'])) return redirect()->back()->with('status','Wajib pilih minimal satu!');
            }
        $nama_depan = $data['first_name'];
        $nama_belakang = $data['last_name'];
        $username = $data['username'];
        $password = $data['password'];
        
        // if(User::where('username', $username)->count() > 0) return redirect()->back()->withInput()->with('status_username','Username sudah digunakan');

        (isset($data['role']['admin']) ? $admin = "1" : $admin = "0");
        (isset($data['role']['petugasmedis']) ? $petugasmedis = "1" : $petugasmedis = "0");
        (isset($data['role']['vendorobat']) ? $vendorobat = "1" : $vendorobat = "0");
        (isset($data['role']['daftarobat']) ? $daftarobat = "1" : $daftarobat = "0");
        (isset($data['role']['datapemeriksaan']) ? $datapemeriksaan = "1" : $datapemeriksaan = "0");
        (isset($data['role']['datapoli']) ? $datapoli = "1" : $datapoli = "0");
        (isset($data['role']['pasien']) ? $pasien = "1" : $pasien = "0");
        (isset($data['role']['peralatan']) ? $peralatan = "1" : $peralatan = "0");
        (isset($data['role']['rekmedis']) ? $rekmedis = "1" : $rekmedis = "0");
        (isset($data['role']['rekkeuangan']) ? $rekkeuangan = "1" : $rekkeuangan = "0");
        (isset($data['role']['akunting']) ? $akunting = "1" : $akunting = "0");
        (isset($data['role']['lpmedis']) ? $lpmedis = "1" : $lpmedis = "0");
        (isset($data['role']['lpakunting']) ? $lpakunting = "1" : $lpakunting = "0");
        (isset($data['role']['setuser']) ? $setuser = "1" : $setuser = "0");
        (isset($data['role']['sethonor']) ? $sethonor = "1" : $sethonor = "0");

        if($request->hasFile('photo')) {
            $cek_ekstensi = $data['photo']->getClientMimeType();
            if (substr($cek_ekstensi, 0, 5) != "image") {
                return redirect()->back()->with("error_upload", "Format file harus gambar!");
            } else {
                File::delete('pengguna/'.$data['gambar_lama']);
                $img = random_int(0, 9999).'-'.$data['photo']->getClientOriginalName();
                $destination = public_path().'/pengguna';
                $request->file('photo')->move($destination, $img);
            }
        } else {
            $img = User::find($id)->img;
        }

        if (Auth::user()->admin == '1') {
            User::where('id', $id)->update([
                'username' => $username,
                'first_name' => $nama_depan,
                'last_name' => $nama_belakang,
                'img' => $img,
                'admin' => $admin,
                'petugasmedis' => $petugasmedis,
                'vendorobat' => $vendorobat,
                'daftarobat' => $daftarobat,
                'datapoli' => $datapoli,
                'datapemeriksaan' => $datapemeriksaan,
                'pasien' => $pasien,
                'peralatan' => $peralatan,
                'rekmedis' => $rekmedis,
                'rekkeuangan' => $rekkeuangan,
                'akunting' => $akunting,
                'lpmedis' => $lpmedis,
                'lpakunting' => $lpakunting,
                'setuser' => $setuser,
                'sethonor' => $sethonor
            ]);

            if($password != '') User::find($id)->update(['password'=>Hash::make($password)]);
            return redirect()->route('pengaturan.user.data.index')->with('message','Pengguna berhasil diubah!');
        } else {
            User::where('id', $id)->update([
                'username' => $username,
                'first_name' => $nama_depan,
                'last_name' => $nama_belakang,
                'img' => $img
            ]);

            if($password != '') User::find($id)->update(['password'=>Hash::make($password)]);
            return redirect('/');
        }
    }
    
    public function delete($id) {
        $user = User::find($id);
        if ($user->admin == '1') {
            return redirect()->back()->with('message2','PENGGUNA '.strtoupper($user->username).' TIDAK BISA DIHAPUS!. KARENA STATUSNYA SEBAGAI ADMIN!');
        } else {
            $user->delete();
            return redirect()->route('pengaturan.user.data.index')->with('message','PENGGUNA '.strtoupper($user->username).' BERHASIL DIHAPUS!');
        }
    }
    
    public function cekUserName($username) {
        $user = User::where('username', $username)->first();
        if (count($user) > 0) {
            $msg = "Username sudah digunakan!";
        } else {
            $msg = '0';
        }

        return $msg;
    }
}

