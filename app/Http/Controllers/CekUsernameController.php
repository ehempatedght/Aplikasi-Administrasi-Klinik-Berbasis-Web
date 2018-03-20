<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CekUsernameController extends Controller
{
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
