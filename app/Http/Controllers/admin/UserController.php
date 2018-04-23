<?php

namespace App\Http\Controllers\admin;

use Auth;
use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Hash;

class UserController extends Controller
{

    public function index() {
    	$users = User::all();
    	return view('admin.user.index')->withUsers($users);
    }

    public function create() {
    	return view('admin.user.create');
    }

    public function simpan(Request $request) {
        $data = $request->all();
        if (!isset($data['role'])) return redirect()->back()->withInput()->with('status','Wajib pilih minimal satu!');

        $nama_depan = $data['first_name'];
        $nama_belakang = $data['last_name'];
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];

        (isset($data['role']['admin']) ? $admin = "1" : $admin = "0");
        (isset($data['role']['petugasmedis']) ? $petugasmedis = "1" : $petugasmedis = "0");
        (isset($data['role']['vendorobat']) ? $vendorobat = "1" : $vendorobat = "0");
        (isset($data['role']['daftarobat']) ? $daftarobat = "1" : $daftarobat = "0");
        (isset($data['role']['datapoli']) ? $datapoli = "1" : $datapoli = "0");
        (isset($data['role']['pasien']) ? $pasien = "1" : $pasien = "0");
        (isset($data['role']['peralatan']) ? $peralatan = "1" : $peralatan = "0");
        (isset($data['role']['rekmedis']) ? $rekmedis = "1" : $rekmedis = "0");
        (isset($data['role']['rekkeuangan']) ? $rekkeuangan = "1" : $rekkeuangan = "0");
        (isset($data['role']['lapmedis']) ? $lapmedis = "1" : $lapmedis = "0");
        (isset($data['role']['lapakuntansi']) ? $lapakuntansi = "1" : $lapakuntansi = "0");
        (isset($data['role']['setuser']) ? $setuser = "1" : $setuser = "0");
        (isset($data['role']['sethonor']) ? $sethonor = "1" : $sethonor = "0");

    	$user = User::create([
    		'username' => $username,
            'first_name' => $nama_depan,
            'last_name' => $nama_belakang,
            'email' => $email,
            'password' => Hash::make($password),
            'admin' => $admin,
            'petugasmedis' => $petugasmedis,
            'vendorobat' => $vendorobat,
            'daftarobat' => $daftarobat,
            'datapoli' => $datapoli,
            'pasien' => $pasien,
            'peralatan' => $peralatan,
            'rekmedis' => $rekmedis,
            'rekkeuangan' => $rekkeuangan,
            'lapmedis' => $lapmedis,
            'lapakuntansi' => $lapakuntansi,
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
            if (password_verify($data['password0'], User::where('id', $id)->first()->password)) {
                return redirect()->back()->with('error_1','Password lama salah!');
            } else {
                if(!isset($data['role'])) return redirect()->back()->with('status','Wajib pilih minimal satu!');
            }
        }
        $nama_depan = $data['first_name'];
        $nama_belakang = $data['last_name'];
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];

        (isset($data['role']['admin']) ? $admin = "1" : $admin = "0");
        (isset($data['role']['petugasmedis']) ? $petugasmedis = "1" : $petugasmedis = "0");
        (isset($data['role']['vendorobat']) ? $vendorobat = "1" : $vendorobat = "0");
        (isset($data['role']['daftarobat']) ? $daftarobat = "1" : $daftarobat = "0");
        (isset($data['role']['datapoli']) ? $datapoli = "1" : $datapoli = "0");
        (isset($data['role']['pasien']) ? $pasien = "1" : $pasien = "0");
        (isset($data['role']['peralatan']) ? $peralatan = "1" : $peralatan = "0");
        (isset($data['role']['rekmedis']) ? $rekmedis = "1" : $rekmedis = "0");
        (isset($data['role']['rekkeuangan']) ? $rekkeuangan = "1" : $rekkeuangan = "0");
        (isset($data['role']['lapmedis']) ? $lapmedis = "1" : $lapmedis = "0");
        (isset($data['role']['lapakuntansi']) ? $lapakuntansi = "1" : $lapakuntansi = "0");
        (isset($data['role']['setuser']) ? $setuser = "1" : $setuser = "0");
        (isset($data['role']['sethonor']) ? $sethonor = "1" : $sethonor = "0");

        if (Auth::user()->admin == '1') {
            User::where('id', $id)->update([
                'username' => $username,
                'first_name' => $nama_depan,
                'last_name' => $nama_belakang,
                'email' => $email,
                'password' => Hash::make($password),
                'admin' => $admin,
                'petugasmedis' => $petugasmedis,
                'vendorobat' => $vendorobat,
                'daftarobat' => $daftarobat,
                'datapoli' => $datapoli,
                'pasien' => $pasien,
                'peralatan' => $peralatan,
                'rekmedis' => $rekmedis,
                'rekkeuangan' => $rekkeuangan,
                'lapmedis' => $lapmedis,
                'lapakuntansi' => $lapakuntansi,
                'setuser' => $setuser,
                'sethonor' => $sethonor
            ]);

            if($password != '') User::where('id', $id)->update(['password'=>Hash::make($password)]);
            return redirect()->route('pengaturan.user.data.index')->with('message','Pengguna berhasil diubah!');
        } else {
            User::where('id', $id)->update([
                'username' => $username,
                'first_name' => $nama_depan,
                'last_name' => $nama_belakang,
                'email' => $email
            ]);

            if($password != '') User::where('id', $id)->update(['password'=>Hash::make($password)]);
            return redirect('/');
        }
    }
    
    public function delete($id) {
        $user = User::find($id);

        if ($user->delete()) {
            return redirect()->route('pengaturan.user.data.index')->with('message','Pengguna '.$user->username.' berhasil dihapus');
        }
    }

    public function cekusername($username) {
        $user = User::where('username', $username)->first();
        if (count($user) > 0) {
            $msg = 'Username sudah digunakan!';
        } else {
            $msg = '0';
        }

        return $msg;
    }
}
