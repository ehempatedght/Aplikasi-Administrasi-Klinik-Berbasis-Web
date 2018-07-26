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
Route::get('/', 'HomeController@index')->name('index');
Route::group(['middleware'=> ['web','auth']], function() {
	Route::group(['prefix'=>'pengaturan'], function () {
		//pengaturan pengguna
		Route::group(['prefix'=>'pengguna'], function() {
			Route::get('/', ['as'=>'pengaturan.user.data.index','uses'=>'admin\UserController@index']);
			Route::get('/create', ['as'=>'pengaturan.user.data.create','uses'=>'admin\UserController@create']);
			Route::post('/save', ['as'=>'pengaturan.user.data.simpan','uses'=>'admin\UserController@simpan']);
			Route::get('/edit/{id}', ['as'=>'pengaturan.user.data.edit','uses'=>'admin\UserController@edit']);
			Route::post('/update/{id}', ['as'=>'pengaturan.user.data.update','uses'=>'admin\UserController@update']);
			Route::post('/delete/{id}', ['as'=>'pengaturan.user.data.delete', 'uses'=>'admin\UserController@delete']);
			Route::get('/cekusername/{username}', ['as'=>'pengaturan.user.data.cek', 'uses'=>'admin\UserController@cekUserName']);
		});

		//pengaturan honor
		Route::group(['prefix'=>'honor'], function() {
			Route::get('/', ['uses'=>'pengaturan\ConfhonorController@index'])->name('pengaturan.honor.index');
			Route::get('/create', ['as'=>'pengaturan.honor.create','uses'=>'pengaturan\ConfhonorController@create']);
			Route::post('/save', ['as'=>'pengaturan.honor.save','uses'=>'pengaturan\ConfhonorController@save']);
			Route::get('/edit/{id}', ['uses'=>'pengaturan\ConfhonorController@edit'])->name('pengaturan.honor.edit');
			Route::post('/update/{id}', ['uses'=>'pengaturan\ConfhonorController@update'])->name('pengaturan.honor.update');
			Route::post('/delete/{id}', ['uses'=>'pengaturan\ConfhonorController@doDelete'])->name('pengaturan.honor.delete');
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

		//data pemeriksaan
		Route::group(['prefix'=>'data_pemeriksaan'], function () {
			Route::get('/', ['uses'=>'masterdata\DataPemeriksaanController@index'])->name('pemeriksaan.index');
			Route::get('/create', ['uses'=>'masterdata\DataPemeriksaanController@create'])->name('pemeriksaan.create');
			Route::post('/save', ['uses'=>'masterdata\DataPemeriksaanController@save'])->name('pemeriksaan.save');
			Route::get('/edit/{id}', ['uses'=>'masterdata\DataPemeriksaanController@edit'])->name('pemeriksaan.edit');
			Route::post('/update/{id}', ['uses'=>'masterdata\DataPemeriksaanController@update'])->name('pemeriksaan.update');
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
			
	//perekeman aktivitas
	Route::group(['prefix'=>'perekaman_aktivitas'], function() {
		//keuangan
		Route::group(['prefix'=>'keuangan'], function () {
			Route::group(['prefix'=>'penerimaan'], function() {
				Route::group(['prefix'=>'donasi_uang'], function() {
					Route::get('/', ['as'=>'perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index','uses'=>'rekam_aktivitas\keuangan\DonasiuangController@getIndex']);
					Route::get('/create', ['as'=>'perekaman_aktivitas.keuangan.penerimaan.donasi_uang.create','uses'=>'rekam_aktivitas\keuangan\DonasiuangController@getCreate']);
					Route::post('/save', ['as'=>'perekaman_aktivitas.keuangan.penerimaan.donasi_uang.save','uses'=>'rekam_aktivitas\keuangan\DonasiuangController@save']);
					Route::get('/show/{id}', ['as'=>'perekaman_aktivitas.keuangan.penerimaan.donasi_uang.show','uses'=>'rekam_aktivitas\keuangan\DonasiuangController@show']);
					Route::get('/edit/{id}', ['as'=>'perekaman_aktivitas.keuangan.penerimaan.donasi_uang.edit','uses'=>'rekam_aktivitas\keuangan\DonasiuangController@edit']);
					Route::post('/update/{id}', ['as'=>'perekaman_aktivitas.keuangan.penerimaan.donasi_uang.update','uses'=>'rekam_aktivitas\keuangan\DonasiuangController@update']);
					Route::post('/delete/{id}', ['as'=>'perekaman_aktivitas.keuangan.penerimaan.donasi_uang.delete','uses'=>'rekam_aktivitas\keuangan\DonasiuangController@doDelete']);
				});

				Route::group(['prefix'=>'donasi_obat'], function () {
					Route::get('/', ['as'=>'perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index','uses'=>'rekam_aktivitas\keuangan\DonasiobatController@getIndex']);
					Route::get('/create', ['as'=>'perekaman_aktivitas.keuangan.penerimaan.donasi_obat.create','uses'=>'rekam_aktivitas\keuangan\DonasiobatController@getCreate']);
					Route::post('/save', ['as'=>'perekaman_aktivitas.keuangan.penerimaan.donasi_obat.save','uses'=>'rekam_aktivitas\keuangan\DonasiobatController@save']);
					Route::get('/show/{id}', ['as'=>'perekaman_aktivitas.keuangan.penerimaan.donasi_obat.show','uses'=>'rekam_aktivitas\keuangan\DonasiobatController@show']);
					Route::get('/edit/{id}', ['as'=>'perekaman_aktivitas.keuangan.penerimaan.donasi_obat.edit','uses'=>'rekam_aktivitas\keuangan\DonasiobatController@edit']);
					Route::post('/update/{id}', ['as'=>'perekaman_aktivitas.keuangan.penerimaan.donasi_obat.update','uses'=>'rekam_aktivitas\keuangan\DonasiobatController@update']);
					Route::post('/delete/{id}', ['as'=>'perekaman_aktivitas.keuangan.penerimaan.donasi_obat.delete','uses'=>'rekam_aktivitas\keuangan\DonasiobatController@delete']);
				});

				Route::group(['prefix'=>'biaya_pendaftaran'], function() {
					Route::get('/', ['as'=>'penerimaan.biaya.index','uses'=>'rekam_aktivitas\keuangan\BiayapendaftaranController@index']);
					Route::get('/create', ['as'=>'penerimaan.biaya.create','uses'=>'rekam_aktivitas\keuangan\BiayapendaftaranController@create']);
					Route::post('/save', ['as'=>'penerimaan.biaya.save','uses'=>'rekam_aktivitas\keuangan\BiayapendaftaranController@save']);
					Route::get('/edit/{id}', ['as'=>'penerimaan.biaya.edit','uses'=>'rekam_aktivitas\keuangan\BiayapendaftaranController@edit']);
					Route::post('/update/{id}', ['as'=>'penerimaan.biaya.update','uses'=>'rekam_aktivitas\keuangan\BiayapendaftaranController@update']);
					Route::post('/delete/{id}', ['as'=>'penerimaan.biaya.delete','uses'=>'rekam_aktivitas\keuangan\BiayapendaftaranController@doDelete']);
				});
			});

			Route::group(['prefix'=>'pengeluaran'], function() {
				Route::group(['prefix'=>'honor'], function() {
					Route::get('/', ['as'=>'pengeluaran.honor.index','uses'=>'rekam_aktivitas\keuangan\HonorController@index']);
					Route::get('/create', ['as'=>'pengeluaran.honor.create','uses'=>'rekam_aktivitas\keuangan\HonorController@create']);
					Route::post('/save', ['as'=>'pengeluaran.honor.save','uses'=>'rekam_aktivitas\keuangan\HonorController@save']);
					Route::get('/edit/{id}', ['as'=>'pengeluaran.honor.edit','uses'=>'rekam_aktivitas\keuangan\HonorController@edit']);
					Route::post('/update/{id}', ['as'=>'pengeluaran.honor.update','uses'=>'rekam_aktivitas\keuangan\HonorController@doUpdate']);
					Route::get('/show/{id}', ['as'=>'pengeluaran.honor.show','uses'=>'rekam_aktivitas\keuangan\HonorController@show']);
					Route::post('/delete/{id}', ['as'=>'pengeluaran.honor.delete','uses'=>'rekam_aktivitas\keuangan\HonorController@delete']);
				});

				Route::group(['prefix'=>'operasional'], function() {
					Route::get('/', ['as'=>'pengeluaran.operasional.index','uses'=>'rekam_aktivitas\keuangan\OperasionalController@index']);
					Route::get('/create', ['as'=>'pengeluaran.operasional.create','uses'=>'rekam_aktivitas\keuangan\OperasionalController@create']);
					Route::post('/save', ['as'=>'pengeluaran.operasional.save','uses'=>'rekam_aktivitas\keuangan\OperasionalController@save']);
					Route::get('/edit/{tgl}', ['as'=>'pengeluaran.operasional.edit','uses'=>'rekam_aktivitas\keuangan\OperasionalController@edit']);
					Route::post('/update/{tgl}', ['as'=>'pengeluaran.operasional.update','uses'=>'rekam_aktivitas\keuangan\OperasionalController@update']);
					Route::get('/show/{tgl}', ['as'=>'pengeluaran.operasional.show','uses'=>'rekam_aktivitas\keuangan\OperasionalController@show']);
					Route::post('/delete/{tgl}', ['as'=>'pengeluaran.operasional.delete','uses'=>'rekam_aktivitas\keuangan\OperasionalController@doDelete']);
				});

				Route::group(['prefix'=>'pembelian'], function() {
					Route::get('/', ['as'=>'pengeluaran.pembelian.index','uses'=>'rekam_aktivitas\keuangan\PembelianController@index']);
					Route::get('/create', ['as'=>'pengeluaran.pembelian.create','uses'=>'rekam_aktivitas\keuangan\PembelianController@create']);
					Route::post('/save', ['as'=>'pengeluaran.pembelian.save','uses'=>'rekam_aktivitas\keuangan\PembelianController@save']);
					Route::get('/edit/{id}', ['as'=>'pengeluaran.pembelian.edit','uses'=>'rekam_aktivitas\keuangan\PembelianController@edit']);
					Route::post('/update/{id}', ['as'=>'pengeluaran.pembelian.update','uses'=>'rekam_aktivitas\keuangan\PembelianController@update']);
					Route::get('/show/{id}', ['as'=>'pengeluaran.pembelian.show','uses'=>'rekam_aktivitas\keuangan\PembelianController@show']);
					Route::post('/delete/{id}', ['as'=>'pengeluaran.pembelian.delete','uses'=>'rekam_aktivitas\keuangan\PembelianController@delete']);
				});
			});
		});

		//medis
		Route::group(['prefix'=>'medis'], function() {
			//reservasi
			Route::group(['prefix'=>'pendaftaran'], function () {
				Route::get('/', ['uses'=>'rekam_aktivitas\medis\ReservasiController@index'])->name('medis.reservasi.index');
				Route::get('/create', ['uses'=>'rekam_aktivitas\medis\ReservasiController@create'])->name('medis.reservasi.create');
				Route::post('/save', ['uses'=>'rekam_aktivitas\medis\ReservasiController@save'])->name('medis.reservasi.save');
				Route::get('/edit/{id}', ['uses'=>'rekam_aktivitas\medis\ReservasiController@edit'])->name('medis.reservasi.edit');
				Route::get('/show/{id}', ['uses'=>'rekam_aktivitas\medis\ReservasiController@show'])->name('medis.reservasi.show');
				Route::post('/update/{id}', ['uses'=>'rekam_aktivitas\medis\ReservasiController@update'])->name('medis.reservasi.update');
				Route::post('/delete/{id}', ['uses'=>'rekam_aktivitas\medis\ReservasiController@delete'])->name('medis.reservasi.delete');
				//search spesialisasi
				Route::get('/search_spesialisasi/{id}', ['as'=>'search.spesialisasi','uses'=>'rekam_aktivitas\medis\ReservasiController@search_spesialisasi']);
				Route::post('/cancel/{id}', ['uses'=>'rekam_aktivitas\medis\ReservasiController@doCancel'])->name('reservasi.cancel');
				//cetak kartu
				Route::get('/cetak/{id}', ['as'=>'print.card', 'uses'=>'rekam_aktivitas\medis\ReservasiController@print_card']);
			});

			//pemeriksaan
			Route::group(['prefix'=>'pemeriksaan'], function () {
				Route::get('/', ['uses'=>'rekam_aktivitas\medis\PemeriksaanController@index'])->name('medis.pemeriksaan.index');
				Route::get('/create', ['uses'=>'rekam_aktivitas\medis\PemeriksaanController@create'])->name('medis.pemeriksaan.create');
				Route::post('/save', ['uses'=>'rekam_aktivitas\medis\PemeriksaanController@save'])->name('medis.pemeriksaan.save');
				Route::get('/show/{id}', ['uses'=>'rekam_aktivitas\medis\PemeriksaanController@show'])->name('medis.pemeriksaan.show');
				//PEMBAYARAN
				Route::post('/bayar/{id}', ['uses'=>'rekam_aktivitas\medis\PemeriksaanController@bayar'])->name('medis.pemeriksaan.bayar');
			});

			//pemberian
			Route::group(['prefix'=>'pemberian'], function () {
				Route::get('/', ['as'=>'medis.pemberian.index','uses'=>'rekam_aktivitas\medis\PemberianobatController@index']);
				Route::get('/create', ['as'=>'medis.pemberian.create','uses'=>'rekam_aktivitas\medis\PemberianobatController@create']);
				Route::post('/save', ['as'=>'medis.pemberian.save','uses'=>'rekam_aktivitas\medis\PemberianobatController@save']);
				Route::get('/edit/{id}', ['as'=>'medis.pemberian.edit','uses'=>'rekam_aktivitas\medis\PemberianobatController@edit']);
				Route::post('/update/{id}', ['as'=>'medis.pemberian.update','uses'=>'rekam_aktivitas\medis\PemberianobatController@update']);
				Route::get('/show/{id}', ['as'=>'medis.pemberian.show','uses'=>'rekam_aktivitas\medis\PemberianobatController@show']);
				Route::post('/delete/{id}', ['as'=>'medis.pemberian.delete','uses'=>'rekam_aktivitas\medis\PemberianobatController@delete']);
			});

			//rekam medis
			Route::group(['prefix'=>'rekam_medis'], function() {
				Route::get('/', ['uses'=>'rekam_aktivitas\medis\RekamMedisController@index'])->name('rekam_medis.index');
				Route::get('/create', ['uses'=>'rekam_aktivitas\medis\RekamMedisController@create'])->name('rekam_medis.create');
				Route::post('/save', ['uses'=>'rekam_aktivitas\medis\RekamMedisController@save'])->name('rekam_medis.save');
				Route::get('/edit/{id}', ['uses'=>'rekam_aktivitas\medis\RekamMedisController@edit'])->name('rekam_medis.edit');
				Route::post('/update/{id}', ['uses'=>'rekam_aktivitas\medis\RekamMedisController@update'])->name('rekam_medis.update');
				Route::get('/show/{id}', ['uses'=>'rekam_aktivitas\medis\RekamMedisController@show'])->name('rekam_medis.show');
				Route::post('/delete/{id}', ['uses'=>'rekam_aktivitas\medis\RekamMedisController@delete'])->name('rekam_medis.delete');
			});
		});
	});

	//akunting
	Route::group(['prefix'=>'akunting'], function() {
		//data akun
		Route::group(['prefix'=>'data_akun'], function() {
			Route::get('/', ['uses'=>'akunting\AkunController@index'])->name('akun.index');
			Route::post('/save', ['uses'=>'akunting\AkunController@save'])->name('akun.save');
			Route::post('/update/{id}', ['uses'=>'akunting\AkunController@update'])->name('akun.update');
			Route::post('/delete/{id}', ['uses'=>'akunting\AkunController@delete'])->name('akun.delete');
		});

		//transaksi
		Route::group(['prefix'=>'transaksi'], function() {
			Route::get('/', ['uses'=>'akunting\TransaksiController@index'])->name('transaksi.index');
			Route::get('/create', ['uses'=>'akunting\TransaksiController@create'])->name('transaksi.create');
			Route::post('/save', ['uses'=>'akunting\TransaksiController@save'])->name('transaksi.save');
			Route::post('/delete/{id}', ['uses'=>'akunting\TransaksiController@delete'])->name('transaksi.delete');
		});

	});
// ----------------------------------- REPORTS --------------------------------------------//

	// REPORT MEDIS
	Route::group(['prefix'=>'laporan'], function() {
		//laporan registrasi
		Route::get('/pasien/registrasi', ['uses'=>'masterdata\PasienController@index_report'])->name('laporan.registrasi');
		Route::get('/pasien/registrasi/{tanggal_awal}/{tanggal_akhir}/{id_kategori}/{tipe}', ['uses'=>'masterdata\PasienController@output_report'])->name('output.report');
		//laporan reservasi
		Route::get('/pasien/reservasi', ['uses'=>'rekam_aktivitas\medis\ReservasiController@report_reservasi'])->name('laporan.reservasi');
		Route::get('/pasien/reservasi/{tanggal_awal}/{tanggal_akhir}/{poli}/{dokter}/{tipe}',['uses'=>'rekam_aktivitas\medis\ReservasiController@output_report_reservasi'])->name('output_report.reservasi');
		//laporan pemeriksaan
		Route::get('/pasien/pemeriksaan', ['uses'=>'rekam_aktivitas\medis\PemeriksaanController@index_laporan'])->name('laporan.pemeriksaan');
		Route::get('/pasien/pemeriksaan/{tanggal_awal}/{tanggal_akhir}/{u_id}/{tipe}', ['uses'=>'rekam_aktivitas\medis\PemeriksaanController@output_report'])->name('output.laporan.pemeriksaan');
		//laporan rekam medis
		Route::get('/pasien/rekam_medis', ['uses'=>'rekam_aktivitas\medis\RekamMedisController@report_index'])->name('laporan.rekam_medis');
		Route::get('/pasien/rekam_medis/{id}', ['uses'=>'rekam_aktivitas\medis\RekamMedisController@output_report'])->name('output_report.rekam_medis');
	});

	//LAPORAN KEUANGAN 
	Route::group(['prefix'=>'laporan'], function() {
		//lapoan berdasarkan tipe akun
		Route::get('/akunting/tipe_akun', ['uses'=>'akunting\TransaksiController@berdasarkan_akun'])->name('laporan.tipe_akun');
		Route::get('/akunting/tipe_akun/{tanggal_awal}/{tanggal_akhir}/{akun}/{tipe}', ['uses'=>'akunting\TransaksiController@output_berdasarkan_akun'])->name('laporan.akun');
		//laporan detail per akun
		Route::get('/akunting/detail_akun', ['uses'=>'akunting\TransaksiController@detail_akun'])->name('laporan.detail_akun');
		Route::get('/akunting/detail_akun/{tanggal_awal}/{tanggal_akhir}/{tipe_akun}/{nama_akun}/{tipe}', ['uses'=>'akunting\TransaksiController@output_detail_akun'])->name('laporan.akun.detail');
		//laporan laba(rugi)
		Route::get('/akunting/laba_rugi', ['uses'=>'akunting\TransaksiController@laba_rugi'])->name('laporan.laba');
		Route::get('/akunting/laba_rugi/{tanggal_awal}/{tanggal_akhir}/{tipe}', ['uses'=>'akunting\TransaksiController@output_laba_rugi'])->name('output.laba');
		//laporan neraca
		Route::get('/akunting/neraca', ['uses'=>'akunting\TransaksiController@neraca'])->name('laporan.neraca');
		Route::get('/akunting/neraca/{tanggal_awal}/{tanggal_akhir}/{tipe}', ['uses'=>'akunting\TransaksiController@output_neraca'])->name('output.neraca');
	});
});

