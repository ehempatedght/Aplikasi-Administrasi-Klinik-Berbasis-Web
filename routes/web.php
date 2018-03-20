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
	});
	//Jadwal
	Route::group(['prefix'=>'jadwal'], function() {
		Route::get('/', ['as'=>'jadwal.jadwal','uses'=>'masterdata\JadwalController@getJadwal']);
		// Route::get('/lihat/{id}', ['as'=>'jadwal.tampil','uses'=>'masterdata\JadwalController@getDay']);
	});
	//Poli
	Route::group(['prefix' => 'poli'], function () {
		Route::get('/', ['as'=>'poli.index','uses'=>'masterdata\PoliController@getPoli']);
		Route::get('/create', ['as'=>'poli.create','uses'=>'masterdata\PoliController@getCreate']);
		Route::post('/insert',['as'=>'poli.insert','uses'=>'masterdata\PoliController@doInsert']);
		Route::get('/ubah/{id}', ['as'=>'poli.ubah', 'uses'=>'masterdata\PoliController@doEdit']);
		Route::post('/update/{id}', ['as'=>'poli.update','uses'=>'masterdata\PoliController@doUpdate']);
		Route::post('/hapus/{id}',['as'=>'poli.hapus','uses'=>'masterdata\PoliController@doDelete']);
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

	//Pemeriksaan
	// Route::group(['prefix' => 'pemeriksaan'], function () {
	// 	Route::get('/', ['as'=>'pemeriksaan.index','uses'=>'masterdata\PemeriksaanController@getIndex']);
	// 	Route::get('/create', ['as'=>'pemeriksaan.create','uses'=>'masterdata\PemeriksaanController@getCreate']);
	// 	Route::post('/insert', ['as'=>'pemeriksaan.masukkan','uses'=>'masterdata\PemeriksaanController@doMasukkan']);
	// });
});

Route::group(['middleware'=>['auth','role:staff']], function() {
	
});

Route::group(['middleware'=>['auth','role:keuangan']], function() {
});

