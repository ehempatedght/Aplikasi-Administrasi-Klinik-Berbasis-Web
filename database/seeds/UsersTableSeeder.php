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
        
        /**
	     * Tambah Users
	     *
	     */
        if (User::where('email', '=', 'admin@admin.com')->first() === null) {

	        $newUser = User::create([
	            'username'     => 'admin',
                'first_name'   => 'Administrator',
                'last_name'    => 'admin',
                'email'        => 'admin@admin.com',
                'password'     => Hash::make('admin'),
                'admin'        => 1,
                'petugasmedis' => 1,
                'vendorobat'   => 1,
                'daftarobat'   => 1,
                'datapoli'     => 1,
                'pasien'       => 1,
                'peralatan'    => 1,
                'rekmedis'     => 1,
                'rekkeuangan'  => 1,
                'lapmedis'     => 1,
                'lapakuntansi' => 1,
                'setuser'      => 1,
                'sethonor'     => 1
	        ]);

        }

    }
}