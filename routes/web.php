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

Route::group(['middleware'=> ['web','auth']], function() {

	Route::group(['prefix'=>'pengaturan'], function () {
		//user
		Route::group(['prefix'=>'user'], function() {
			Route::group(['prefix'=>'data'], function() {
				Route::get('/', ['as'=>'pengaturan.user.data.index','uses'=>'admin\UserController@index']);
				Route::get('/create', ['as'=>'pengaturan.user.data.create','uses'=>'admin\UserController@create']);
				Route::post('/save', ['as'=>'pengaturan.user.data.simpan','uses'=>'admin\UserController@simpan']);
				Route::get('/edit/{id}', ['as'=>'pengaturan.user.data.edit','uses'=>'admin\UserController@edit']);
				Route::put('/update/{id}', ['as'=>'pengaturan.user.data.update','uses'=>'admin\UserController@update']);
				Route::post('/delete/{id}', ['as'=>'pengaturan.user.data.delete', 'uses'=>'admin\UserController@delete']);
				Route::get('/cekusername/{username}', ['as'=>'pengaturan.user.data.cek', 'uses'=>'admin\UserController@cekusername']);
			});
		});
	});
	//master data
	Route::group(['prefix'=>'masterdata'], function () {
		Route::group(['prefix'=>'petugasmedis'], function() {
			//Petugas
			Route::group(['prefix'=>'datapetugasmedis'], function() {
				Route::get('/', ['as'=>'masterdata.petugasmedis.datapetugasmedis.index','uses'=>'masterdata\PetugasController@getIndex']);
				Route::get('/create', ['as'=>'masterdata.petugasmedis.datapetugasmedis.create','uses'=>'masterdata\PetugasController@getCreate']);
				Route::post('/insert', ['as'=>'masterdata.petugasmedis.datapetugasmedis.insert','uses'=>'masterdata\PetugasController@doAdd']);
				Route::get('/ubah/{id}', ['as'=>'masterdata.petugasmedis.datapetugasmedis.ubah','uses'=>'masterdata\PetugasController@getEdit']);
				Route::post('/update/{id}', ['as'=>'masterdata.petugasmedis.datapetugasmedis.update','uses'=>'masterdata\PetugasController@doUpdate']);
				Route::get('/show/{id}', ['as'=>'masterdata.petugasmedis.datapetugasmedis.show','uses'=>'masterdata\PetugasController@getShow']);
				Route::post('/hapus/{id}',['as'=>'masterdata.petugasmedis.datapetugasmedis.hapus','uses'=>'masterdata\PetugasController@doHapus']);
			});
		
			//Jadwal
			Route::group(['prefix'=>'jadwal'], function() {
				Route::get('/', ['as'=>'masterdata.petugasmedis.jadwal.index','uses'=>'masterdata\JadwalController@getJadwal']);
				Route::get('/petugas', ['as'=>'masterdata.petugasmedis.jadwal.petugas','uses'=>'masterdata\JadwalController@getPetugas']);
				Route::get('/aturjadwal/{id}', ['as'=>'masterdata.petugasmedis.jadwal.atur','uses'=>'masterdata\JadwalController@aturJadwal']);
				Route::post('/aturjadwal/{id}', ['as'=>'masterdata.petugasmedis.jadwal.add','uses'=>'masterdata\JadwalController@addAtur']);
			});
		});
		
		//Poli
		Route::group(['prefix' => 'poli'], function () {
			Route::get('/', ['as'=>'masterdata.poli.index','uses'=>'masterdata\PoliController@getPoli']);
			Route::post('/insert',['as'=>'masterdata.poli.insert','uses'=>'masterdata\PoliController@doInsert']);
			Route::post('/update/{id}', ['as'=>'masterdata.poli.update','uses'=>'masterdata\PoliController@doUpdate']);
			Route::post('/hapus/{id}',['as'=>'masterdata.poli.hapus','uses'=>'masterdata\PoliController@doDelete']);
		});

		
		Route::group(['prefix'=>'pasien'], function() {
			//Kategori Pasien
			Route::group(['prefix'=>'kategori'], function() {
				Route::get('/', ['as'=>'masterdata.pasien.kategori.index','uses'=>'masterdata\KategoripasienController@getIndex']);
				Route::post('/insert', ['as'=>'masterdata.pasien.kategori.insert','uses'=>'masterdata\KategoripasienController@doInsert']);
				Route::post('/update/{id}', ['as'=>'masterdata.pasien.kategori.update','uses'=>'masterdata\KategoripasienController@doUpdate']);
				Route::post('/delete/{id}', ['as'=>'masterdata.pasien.kategori.delete','uses'=>'masterdata\KategoripasienController@doDelete']);
			});

			//Pasien
			Route::group(['prefix'=>'datapasien'], function() {
				Route::get('/', ['as'=>'masterdata.pasien.datapasien.index','uses'=>'masterdata\PasienController@getIndex']);
				Route::get('/create', ['as'=>'masterdata.pasien.datapasien.create','uses'=>'masterdata\PasienController@getCreate']);
				Route::post('/insert', ['as'=>'masterdata.pasien.datapasien.insert','uses'=>'masterdata\PasienController@doInsert']);
				Route::get('/ubah/{id_pasien}', ['as'=>'masterdata.pasien.datapasien.ubah', 'uses'=>'masterdata\PasienController@getEdit']);
				Route::post('/update/{id}', ['as'=>'masterdata.pasien.datapasien.update', 'uses'=>'masterdata\PasienController@doUpdate']);
				Route::get('/lihat/{id_pasien}', ['as'=>'masterdata.pasien.datapasien.lihat', 'uses'=>'masterdata\PasienController@getShow']);
				Route::post('/hapus/{id}', ['as'=>'masterdata.pasien.datapasien.hapus', 'uses'=>'masterdata\PasienController@hapus']);
				Route::post('/tambahkategori', ['as'=>'masterdata.pasien.datapasien.kategori', 'uses'=>'masterdata\PasienController@inputKategoriPasien']);
				Route::post('/tambahkota', ['as'=>'masterdata.pasien.datapasien.kota','uses'=>'masterdata\PasienController@inputKotaPasien']);
				Route::post('/tambahkecamatan', ['as'=>'masterdata.pasien.datapasien.kecamatan','uses'=>'masterdata\PasienController@inputKecamatanPasien']);
				Route::post('/tambahkelurahan', ['as'=>'masterdata.pasien.datapasien.kelurahan','uses'=>'masterdata\PasienController@inputKelurahanPasien']);
			});

			//kelurahan
			Route::group(['prefix'=>'kelurahan'], function() {
				Route::get('/', ['as'=>'masterdata.pasien.kelurahan.index','uses'=>'masterdata\KelurahanController@getIndex']);
				Route::post('/insert', ['as'=>'masterdata.pasien.kelurahan.insert','uses'=>'masterdata\KelurahanController@doAdd']);
				Route::get('/create', ['as'=>'masterdata.pasien.kelurahan.create','uses'=>'masterdata\KelurahanController@getCreate']);
				Route::get('/edit/{id}', ['as'=>'masterdata.pasien.kelurahan.edit','uses'=>'masterdata\KelurahanController@getEdit']);
				Route::post('/update/{id}', ['as'=>'masterdata.pasien.kelurahan.update','uses'=>'masterdata\KelurahanController@doUpdate']);
				Route::post('/delete/{id}', ['as'=>'masterdata.pasien.kelurahan.delete','uses'=>'masterdata\KelurahanController@doDelete']);
				Route::post('/inputkota', ['as'=>'masterdata.pasien.kelurahan.kota','uses'=>'masterdata\KelurahanController@inputKota']);
				Route::post('/inputkecamatan', ['as'=>'masterdata.pasien.kelurahan.kecamatan','uses'=>'masterdata\KelurahanController@inputKecamatan']);
				Route::post('/deletekota/{id}', ['as'=>'masterdata.pasien.kelurahan.deletekota','uses'=>'masterdata\KelurahanController@deleteKota']);
				Route::post('/deletekec/{id}', ['as'=>'masterdata.pasien.kelurahan.deletekec','uses'=>'masterdata\KelurahanController@deleteKecamatan']);
			});
		});
		
		//Pemeriksaan
		 // Route::group(['prefix' => 'pemeriksaan'], function () {
		 // 	Route::get('/', ['as'=>'masterdata.pemeriksaan.index','uses'=>'masterdata\PemeriksaanController@getIndex']);
		 // 	Route::get('/create', ['as'=>'masterdata.pemeriksaan.create','uses'=>'masterdata\PemeriksaanController@getCreate']);
		 // 	Route::post('/insert', ['as'=>'masterdata.pemeriksaan.masukkan','uses'=>'masterdata\PemeriksaanController@doMasukkan']);
		 // });

		//peralatan
		Route::group(['prefix'=>'peralatan'], function () {
			// medis
			Route::group(['prefix'=>'medis'], function() {
				Route::get('/', ['as'=>'masterdata.peralatan.medis.index','uses'=>'masterdata\PeralatanmedisController@getIndex']);
			 	Route::post('/insert', ['as'=>'masterdata.peralatan.medis.insert','uses'=>'masterdata\PeralatanmedisController@doAdd']);
			 	Route::post('/update/{id}', ['as'=>'masterdata.peralatan.medis.update','uses'=>'masterdata\PeralatanmedisController@doUpdate']);
			});

			// kantor
			Route::group(['prefix'=>'kantor'], function() {
				Route::get('/', ['as'=>'masterdata.peralatan.kantor.index','uses'=>'masterdata\PeralatankantorController@getIndex']);
			 	Route::post('/insert', ['as'=>'masterdata.peralatan.kantor.insert','uses'=>'masterdata\PeralatankantorController@doAdd']);
			 	Route::post('/update/{id}', ['as'=>'masterdata.peralatan.kantor.update','uses'=>'masterdata\PeralatankantorController@doUpdate']);
			 });
		});

		 //data obat
		 Route::group(['prefix'=>'daftarobat'], function () {
		 	Route::get('/', ['as'=>'masterdata.daftarobat.index','uses'=>'masterdata\JenisobatController@getIndex']);
		 	Route::get('/create', ['as'=>'masterdata.daftarobat.create','uses'=>'masterdata\JenisobatController@getCreate']);
		 	Route::get('/edit/{id}', ['as'=>'masterdata.daftarobat.edit','uses'=>'masterdata\JenisobatController@getEdit']);
		 	Route::post('/insert', ['as'=>'masterdata.daftarobat.insert','uses'=>'masterdata\JenisobatController@doInsert']);
		 	Route::post('/delete/{id}', ['as'=>'masterdata.daftarobat.delete','uses'=>'masterdata\JenisobatController@doDelete']);
		 	Route::post('/update/{id}', ['as'=>'masterdata.daftarobat.update','uses'=>'masterdata\JenisobatController@doUpdate']);
		 	Route::get('/createJenis', ['as'=>'masterdata.daftarobat.jenis','uses'=>'masterdata\JenisobatController@createJenis']);
		 	//pake json
		 	Route::post('/addjenis', 'masterdata\JenisobatController@addJenis');
		 	Route::post('/updatejenis','masterdata\JenisobatController@updateJenis');
		 	Route::post('/deletejenis','masterdata\JenisobatController@hapusJenis');
		 	//search kd obat
		 	Route::get('/cari_kode/{id}', ['as'=>'masterdata.daftarobat.cari_kode','uses'=>'masterdata\JenisobatController@KdObat']);
		});

		//vendor
		Route::group(['prefix'=>'vendorobat'], function () {
			Route::get('/', ['as'=>'masterdata.vendorobat.index','uses'=>'masterdata\VendorobatController@getIndex']);
			Route::get('/create', ['as'=>'masterdata.vendorobat.create', 'uses'=>'masterdata\VendorobatController@getCreate']);
			Route::get('/edit/{nama_vendor}', ['as'=>'masterdata.vendorobat.edit', 'uses'=>'masterdata\VendorobatController@getEdit']);
			Route::post('/insert', ['as'=>'masterdata.vendorobat.insert', 'uses'=>'masterdata\VendorobatController@doAdd']);
			Route::post('/delete/{nama_vendor}', ['as'=>'masterdata.vendorobat.delete', 'uses'=>'masterdata\VendorobatController@doDelete']);
			Route::post('/update/{nama_vendor}', ['as'=>'masterdata.vendorobat.update', 'uses'=>'masterdata\VendorobatController@doUpdate']);
		});
	});
});


Route::group(['middleware'=>['auth','role:staff']], function() {
	
});

Route::group(['middleware'=>['auth','role:keuangan']], function() {

});

