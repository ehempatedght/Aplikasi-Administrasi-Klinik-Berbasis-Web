<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
	     * Add Roles
	     *
	     */
    	if (Role::where('name', '=', 'Admin')->first() === null) {
	        $adminRole = Role::create([
	            'name' => 'Admin',
	            'slug' => 'admin',
	            'level' => 0,
        	]);
	    }

	    if (Role::where('name', '=', 'Staff')->first() === null) {
	        $adminRole = Role::create([
	            'name' => 'Staff',
	            'slug' => 'staff',
	            'level' => 1,
        	]);
	    }

	    if (Role::where('name', '=', 'Keuangan')->first() === null) {
	        $adminRole = Role::create([
	            'name' => 'Keuangan',
	            'slug' => 'keuangan',
	            'level' => 2,
        	]);
	    }

	    // if (Role::where('name','=','Keuangan')->first() === null) {
	    // 	$keuanganRole = Role::create([
	    // 		'name'=>'Keuangan',
	    // 		'slug'=>'keuangan',
	    // 		'description' =>'Keuangan Role',
	    // 		'level' => 1,
	    // 	]);	
	    // }

	    // if (Role::where('name','=','Peralatan')->first() === null) {
	    // 	$keuanganRole = Role::create([
	    // 		'name'=>'Peralatan',
	    // 		'slug'=>'peralatan',
	    // 		'description' =>'Peralatan Role',
	    // 		'level' => 2,
	    // 	]);	
	    // }

    	// if (Role::where('name', '=', 'User')->first() === null) {
	    //     $userRole = Role::create([
	    //         'name' => 'User',
	    //         'slug' => 'user',
	    //         'description' => 'User Role',
	    //         'level' => 3,
	    //     ]);
	    // }

    }

}