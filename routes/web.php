<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', 'HomeController@index');
//cek username
// Route::group(['prefix'=>'admin'], function () {
// 	Route::group(['prefix'=>'user'], function () {
// 		Route::get('/cekusername/{username}', ['as'=>'admin.cekusername', 'uses'=>'CekUsernameController@cekusername']);
// 	});
// });

Route::group(['middleware'=> ['auth','role:admin']], function() {
	//Role
	Route::resource('role','admin\RoleController', ['except'=>'show']);
	//User
	Route::resource('users','admin\UserController', ['except'=>'show']);
	//Petugas
	Route::group(['prefix'=>'petugas'], function() {
		Route::get('/', ['as'=>'petugas.index','uses'=>'masterdata\PetugasController@getIndex']);
		Route::get('/create', ['as'=>'petugas.create','uses'=>'masterdata\PetugasController@getCreate']);
		Route::post('/insert', ['as'=>'petugas.insert','uses'=>'masterdata\PetugasController@doAdd']);
		Route::get('/ubah/{id}', ['as'=>'petugas.ubah','uses'=>'masterdata\PetugasController@getEdit']);
		Route::post('/update/{id}', ['as'=>'petugas.update','uses'=>'masterdata\PetugasController@doUpdate']);
		Route::get('/show/{id}', ['as'=>'petugas.show','uses'=>'masterdata\PetugasController@getShow']);
		Route::post('/hapus/{id}',['as'=>'petugas.hapus','uses'=>'masterdata\PetugasController@doHapus']);

		//cari data petugas
		Route::get('/cari_petugas/{id}', ['as'=>'petugas.cari_petugas','uses'=>'masterdata\JadwalController@cari_petugas']);
	});
	//Jadwal
	Route::group(['prefix'=>'jadwal'], function() {
		Route::get('/', ['as'=>'jadwal.jadwal','uses'=>'masterdata\JadwalController@getJadwal']);
		Route::get('/create', ['as'=>'jadwal.create','uses'=>'masterdata\JadwalController@getCreate']);
		Route::post('/insert', ['as'=>'jadwal.insert','uses'=>'masterdata\JadwalController@addJadwal']);
	});

	//Poli
	Route::group(['prefix' => 'poli'], function () {
		Route::get('/', ['as'=>'poli.index','uses'=>'masterdata\PoliController@getPoli']);
		Route::post('/insert',['as'=>'poli.insert','uses'=>'masterdata\PoliController@doInsert']);
		Route::post('/update/{id}', ['as'=>'poli.update','uses'=>'masterdata\PoliController@doUpdate']);
		Route::post('/hapus/{id}',['as'=>'poli.hapus','uses'=>'masterdata\PoliController@doDelete']);
	});

	//Kategori Pasien
	Route::group(['prefix'=>'kategoripasien'], function() {
		Route::get('/', ['as'=>'kategoripasien.index','uses'=>'masterdata\KategoripasienController@getIndex']);
		Route::post('/insert', ['as'=>'kategoripasien.insert','uses'=>'masterdata\KategoripasienController@doInsert']);
		Route::post('/update/{id}', ['as'=>'kategoripasien.update','uses'=>'masterdata\KategoripasienController@doUpdate']);
		Route::post('/delete/{id}', ['as'=>'kategoripasien.delete','uses'=>'masterdata\KategoripasienController@doDelete']);
	});

	//Pasien
	Route::group(['prefix'=>'pasien'], function() {
		Route::get('/', ['as'=>'pasien.index','uses'=>'masterdata\PasienController@getIndex']);
		Route::get('/create', ['as'=>'pasien.create','uses'=>'masterdata\PasienController@getCreate']);
		Route::post('/insert', ['as'=>'pasien.insert','uses'=>'masterdata\PasienController@doInsert']);
		Route::get('/ubah/{id_pasien}', ['as'=>'pasien.ubah', 'uses'=>'masterdata\PasienController@getEdit']);
		Route::post('/update/{id}', ['as'=>'pasien.update', 'uses'=>'masterdata\PasienController@doUpdate']);
		Route::get('/lihat/{id_pasien}', ['as'=>'pasien.lihat', 'uses'=>'masterdata\PasienController@getShow']);
		Route::post('/hapus/{id}', ['as'=>'pasien.hapus', 'uses'=>'masterdata\PasienController@hapus']);
		Route::post('/tambahkategori', ['as'=>'pasien.kategori', 'uses'=>'masterdata\PasienController@inputKategoriPasien']);
		Route::post('/tambahkota', ['as'=>'pasien.kota','uses'=>'masterdata\PasienController@inputKotaPasien']);
		Route::post('/tambahkecamatan', ['as'=>'pasien.kecamatan','uses'=>'masterdata\PasienController@inputKecamatanPasien']);
		Route::post('/tambahkelurahan', ['as'=>'pasien.kelurahan','uses'=>'masterdata\PasienController@inputKelurahanPasien']);
	});

	//kelurahan
	Route::group(['prefix'=>'kelurahan'], function() {
		Route::get('/', ['as'=>'kelurahan.index','uses'=>'masterdata\KelurahanController@getIndex']);
		Route::post('/insert', ['as'=>'kelurahan.insert','uses'=>'masterdata\KelurahanController@doAdd']);
		Route::get('/create', ['as'=>'kelurahan.create','uses'=>'masterdata\KelurahanController@getCreate']);
		Route::get('/edit/{id}', ['as'=>'kelurahan.edit','uses'=>'masterdata\KelurahanController@getEdit']);
		Route::post('/update/{id}', ['as'=>'kelurahan.update','uses'=>'masterdata\KelurahanController@doUpdate']);
		Route::post('/delete/{id}', ['as'=>'kelurahan.delete','uses'=>'masterdata\KelurahanController@doDelete']);
		Route::post('/inputkota', ['as'=>'kelurahan.kota','uses'=>'masterdata\KelurahanController@inputKota']);
		Route::post('/inputkecamatan', ['as'=>'kelurahan.kecamatan','uses'=>'masterdata\KelurahanController@inputKecamatan']);
		Route::post('/deletekota/{id}', ['as'=>'kelurahan.deletekota','uses'=>'masterdata\KelurahanController@deleteKota']);
		Route::post('/deletekec/{id}', ['as'=>'kelurahan.deletekec','uses'=>'masterdata\KelurahanController@deleteKecamatan']);
	});
	
	//Pemeriksaan
	 Route::group(['prefix' => 'pemeriksaan'], function () {
	 	Route::get('/', ['as'=>'pemeriksaan.index','uses'=>'masterdata\PemeriksaanController@getIndex']);
	 	Route::get('/create', ['as'=>'pemeriksaan.create','uses'=>'masterdata\PemeriksaanController@getCreate']);
	 	Route::post('/insert', ['as'=>'pemeriksaan.masukkan','uses'=>'masterdata\PemeriksaanController@doMasukkan']);
	 });

	 //peralatan medis
	 Route::group(['prefix'=>'alatmedis'], function() {
	 	Route::get('/', ['as'=>'alatmedis.index','uses'=>'masterdata\PeralatanmedisController@getIndex']);
	 	Route::post('/insert', ['as'=>'alatmedis.insert','uses'=>'masterdata\PeralatanmedisController@doAdd']);
	 	Route::post('/update/{id}', ['as'=>'alatmedis.update','uses'=>'masterdata\PeralatanmedisController@doUpdate']);
	 });

	 //peralatan kantor
	 Route::group(['prefix'=>'alatkantor'], function() {
	 	Route::get('/', ['as'=>'alatkantor.index','uses'=>'masterdata\PeralatankantorController@getIndex']);
	 	Route::post('/insert', ['as'=>'alatkantor.insert','uses'=>'masterdata\PeralatankantorController@doAdd']);
	 	Route::post('/update/{id}', ['as'=>'alatkantor.update','uses'=>'masterdata\PeralatankantorController@doUpdate']);
	 });
});

// Route::group(['middleware'=>['auth','role:staff']], function() {
	
// });

// Route::group(['middleware'=>['auth','role:keuangan']], function() {
// });

