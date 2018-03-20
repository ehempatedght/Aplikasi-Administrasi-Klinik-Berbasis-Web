<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Category::where('nama_kategori','=','Dokter')->first() === null) {
        	$dokterCategory = Category::create([
        		'nama_kategori'=>'Dokter',
        	]);
        }

        if (Category::where('nama_kategori','=','Perawat')->first() === null) {
        	$perawatCategory = Category::create([
        		'nama_kategori'=>'Perawat',
        	]);
        }

        if (Category::where('nama_kategori','=','Pegawai')->first() === null) {
        	$perawatCategory = Category::create([
        		'nama_kategori'=>'Pegawai',
        	]);
        }
    }
}
