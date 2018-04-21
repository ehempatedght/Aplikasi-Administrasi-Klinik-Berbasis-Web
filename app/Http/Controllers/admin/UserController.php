<?php

namespace App\Http\Controllers\admin;

use Auth;
use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index() {
    	$users = User::all();
    	return view('admin.user.index')->withUsers($users);
    }

    public function create() {

    	$roles = Role::all();
    	$data = [
    		'roles' => $roles,
    	];

    	return view('admin.user.create')->with($data);
    }

    public function simpan(Request $request) {

    	  $validator = Validator::make($request->all(),
    	  	[
    	  		'username'				=>'required|max:255|unique:users',
    	  		'first_name'			=>'',
    	  		'last_name'				=>'',
    	  		'email'					=>'required|email|max:255|unique:users',
    	  		'password'				=>'required|min:6|max:20|confirmed',
    	  		'password_confirmation'	=>'required|same:password',
    	  		'role'					=>'required',
    	  	],
    	  	[
    	  		  'username.unique'     => trans('auth.userNameTaken'),
                  'username.required'   => trans('auth.userNameRequired'),
                  'first_name.required' => trans('auth.fNameRequired'),
                  'last_name.required'  => trans('auth.lNameRequired'),
                  'email.required'      => trans('auth.emailRequired'),
                  'email.email'         => trans('auth.emailInvalid'),
                  'password.required'   => trans('auth.passwordRequired'),
                  'password.min'        => trans('Panjang password minimal 6'),
                  'password.max'        => trans('auth.PasswordMax'),
                  'role.required'       => trans('auth.roleRequired'),
    	  	]
    	  );

    	  if ($validator->fails()) {
    	  	return back()->withErrors($validator)->withInput();
    	  }

    	$user = User::create([
    		'username' => $request->input('username'),
    		'first_name' => $request->input('first_name'),
    		'last_name' => $request->input('last_name'),
    		'email' => $request->input('email'),
    		'password' => bcrypt($request->input('password')),
            'token'    => str_random(64),
    	]);

    	$user->attachRole($request->input('role'));

        if ($user) {
           return redirect()->route('pengaturan.user.data.index')->with('message','User '.$user->username.' berhasil ditambah');
        }
    }

    public function edit($id) {

        $user = User::find($id);
        $roles = Role::all();

        foreach ($user->roles as $user_role) {
            $currentRole = $user_role;
        }

        $data = [
            'user'  => $user,
            'roles' => $roles,
            'currentRole' => $currentRole,
        ];

        return view('admin.user.edit')->with($data);
    }

    public function update(Request $request, $id) {

        $user = User::find($id);
        $data = $request->all();

        //Akan dieksekusi jika ingin mengganti password
        if (!empty($data['ganti_password'])) {
            $data['password'] = bcrypt($data['ganti_password']);
        }

        //Akan dieksekusi jika mengganti role user
        $userRole = $request->input('role');
        if ($userRole != null) {
            $user->detachAllRoles();
            $user->attachRole($userRole);
        }

        if($user->update($data)) {
            return redirect()->route('pengaturan.user.data.index')->with('message','User berhasil diubah');
        }
    }
    
    public function delete($id) {
        $user = User::find($id);

        if ($user->delete()) {
            return redirect()->route('pengaturan.user.data.index')->with('message','User '.$user->username.' berhasil dihapus');
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
