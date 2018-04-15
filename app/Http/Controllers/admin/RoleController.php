<?php

namespace App\Http\Controllers\admin;

use Auth;
use App\User;
use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
	
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$roles = Role::all();
    	return view('admin.role.index',compact('roles'));
	}

	public function create() {
		return view('admin.role.create');
	}
	
	public function store(Request $request) {
		$role = Role::orderBy('id','DESC')->first();

		$data = $request->all();
		$data['level'] = $role->level + 1;

		$createRole = Role::create([
			'name'=>$request->input('name'),
			'slug'=>strtolower(($data['name'])),
			'level'=>$data['level'] = $role->level + 1,
		]);

		if ($createRole) {
			return redirect()->route('role.index')->with('message','Role '.$createRole->name .' berhasil ditambah');
		}
	}

	public function edit($id) {
		$role = Role::find($id);
		return view('admin.role.edit', compact('role'));
	}

	public function update(Request $request, $id) {
		$role = Role::find($id);
		$data = $request->all();
		$data['slug'] = strtolower(($data['name']));
		if ($role->update($data)) {
			return redirect()->route('role.index')->with('message','Role berhasil diubah!');
		}
	}

	public function destroy($id) {
		$role = Role::find($id);

		if ($role->delete()) {
			return redirect()->route('role.index')->with('message','Role '.$role->name.' berhasil dihapus!');
		}
	}
}
