<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$faker 		  = Faker\Factory::create();
        // $userRole 	  = Role::where('name', '=', 'User')->first();
        $adminRole 	  = Role::where('name', '=', 'Admin')->first();
		$permissions  = Permission::all();

	    /**
	     * Tambah Users
	     *
	     */
        if (User::where('email', '=', 'admin@admin.com')->first() === null) {

	        $newUser = User::create([
	            'username'         => 'admin',
                'first_name'   => 'Administrator',
                'last_name'    => 'admin',
                'email'        => 'admin@admin.com',
                'password'     => Hash::make('admin'),
	        ]);

	        $newUser->attachRole($adminRole);
			foreach ($permissions as $permission) {
				$newUser->attachPermission($permission);
			}

        }

        // if (User::where('email', '=', 'user@user.com')->first() === null) {

	       //  $newUser = User::create([
	       //      'name'        => $faker->userName,
        //         'first_name'  => $faker->firstName,
        //         'last_name'   => $faker->lastName,
        //         'email'       => 'user@user.com',
        //         'password'    => Hash::make('password'),
	       //  ]);

	       //  $newUser;
	       //  $newUser->attachRole($userRole);

        // }

    }
}