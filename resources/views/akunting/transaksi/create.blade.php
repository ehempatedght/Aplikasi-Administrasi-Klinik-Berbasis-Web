@extends('template')
@section('main')
<style>
.col-sm-1 {
    width: 45px;
}

.select2-container .select2-choice {
    display: block!important;
    height: 30px!important;
    white-space: nowrap!important;
    line-height: 26px!important;
}
</style>
<h2>Tambah Transaksi Keuangan</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{route('transaksi.index')}}"><i class="entypo-home"> Daftar Transaksi</i></a>
	</li>
	<li class="active">
		<strong>Tambah Transaksi Keuangan</strong>
	</li>
</ol>
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-body">
				<form role="form" class="form-horizontal" action="{{route('transaksi.save')}}" method="post">
					@csrf
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" name="tgl" data-format="dd MM yyyy" placeholder="tanggal" required>
										
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tipe Akun</label>
									<div class="col-sm-5">
										<select name="id_tipe" class="form-control select2 tipe_akun" id="id_tipe" required data-placeholder="Pilih tipe akun..." required>
											<option></option>
											@foreach($tipeAkun as $tipe)
											<option value="{{$tipe->id_tipe}}">{{$tipe->nama_tipe}}</option>
											@endforeach
										</select>
									</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Akun</label>
									<div class="col-sm-5">
										<select name="id_akun" class="form-control select2" required data-placeholder="Pilih nama akun..." id="id_akun" required>
											<option></option>
											@foreach($namaAkun as $nAkun)
											<option value="{{$nAkun->id_akun}}">{{$nAkun->nama_akun}}</option>
											@endforeach
										</select>
									</div>
							</div>
						</div>
					</div>
					<div id="br"></div>
					<div id="div_nama_akun">
						<div id="4" class="nama_akun" hidden>
							<input type="hidden" name="id_pemeriksaan" id="id_pemeriksaan">
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Pemeriksaan/Tindakan</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_4" id="pemeriksaan" name="pemeriksaan" required readonly />
								</div>
								<a class="btn btn-white icon-left" href="javascript:;" onclick="jQuery('#modal-1').modal('show', {backdrop: 'static'});">
									<i class="entypo-search" ></i>
								</a>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal Pemeriksaan</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_4" id="tgl_pemeriksaan" name="tgl_pemeriksaan" required readonly />
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No.Faktur</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_4" id="no_faktur" name="no_faktur" required readonly />
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Poli</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_4" id="poli" name="poli" required readonly />
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Dokter</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_4" id="dokter" name="dokter" required readonly />
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Pasien</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_4" id="pasien" name="pasien" required readonly />
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Total</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_4" id="p_total" name="p_total" required readonly />
								</div>
							</div>
						</div>
						<div id="8" class="nama_akun" hidden>
							<input type="hidden" name="id_donasi" id="id_donasi">
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Donatur</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_8" id="nama_donatur" name="nama_donatur" required readonly />
								</div>
								<a class="btn btn-white icon-left" href="javascript:;" onclick="jQuery('#modal-2').modal('show', {backdrop: 'static'});">
									<i class="entypo-search" ></i>
								</a>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;CP</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_8" id="cp" name="cp" required readonly />
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No.HP</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_8" id="no_hp" name="no_hp" required readonly />
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah Donasi</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_8" id="jml_donasi" name="jml_donasi" required readonly />
								</div>
							</div>
						</div>

						<div id="9" class="nama_akun" hidden>
							<input type="hidden" name="id_honor" id="id_honor">
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_9" id="nama_petugas" name="nama_petugas" required readonly />
								</div>
								<a class="btn btn-white icon-left" href="javascript:;" onclick="jQuery('#modal-3').modal('show', {backdrop: 'static'});">
									<i class="entypo-search" ></i>
								</a>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kategori</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_9" id="kategori" name="kategori" required readonly />
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Honor/Jam</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_9" id="h_jam" name="h_jam" required readonly />
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah Jam</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_9" id="j_jam" name="j_jam" required readonly />
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Total</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_9" id="total" name="total" required readonly />
								</div>
							</div>

						</div>

						<div id="10" class="nama_akun" hidden>
							<input type="hidden" name="id_pembelian" id="id_pembelian">
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Vendor</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_10" id="vendor" name="vendor" required readonly />
								</div>
								<a class="btn btn-white icon-left" href="javascript:;" onclick="jQuery('#modal-4').modal('show', {backdrop: 'static'});">
									<i class="entypo-search" ></i>
								</a>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Obat/Barang</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_10" id="obt_brg" name="obt_brg" required readonly />
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_10" id="jumlah" name="jumlah" required readonly />
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Harga</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_10" id="harga" name="harga" required readonly />
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Total</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_10" id="total2" name="total" required readonly />
								</div>
							</div>
						</div>

						<div id="11" class="nama_akun" hidden>
							<input type="hidden" name="id_operasional" id="id_operasional">
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal Operasional</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_11" id="tgl_operasional" name="tgl_operasional" required readonly />
								</div>
								<a class="btn btn-white icon-left" href="javascript:;" onclick="jQuery('#modal-5').modal('show', {backdrop: 'static'});">
									<i class="entypo-search" ></i>
								</a>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Total</label>
								<div class="col-sm-5">
									<input type="text" class="form-control wajib_11" id="total3" name="total3" required readonly />
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jenis Transaksi
									<br />
									<span class="control-label">
									@if (session('status'))
									<p style="color:red;">
										{{ session('status') }}
									</p>
									@endif
									</span>
								</label>
									<div class="col-sm-5">
										<div class="row">
											<div class="col-sm-4">
												<div class="checkbox">
													<label>
													<input type="checkbox" id="tm" class="tm" name="transaksi[pemasukan]" @if(is_array(old('transaksi')) && array_key_exists("pemasukan", old('transaksi'))) checked @endif>Transaksi Masuk
													</label>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="checkbox">
													<label>
													<input type="checkbox" id="tk" class="tk" name="transaksi[pengeluaran]" @if(is_array(old('transaksi')) && array_key_exists("pengeluaran", old('transaksi'))) checked @endif>Transaksi Keluar
													</label>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nominal</label>
						<div class="col-sm-5">
							<input type="text" class="form-control numbers" id="nominall" name="nominal" value="0" required/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="jumlahh" name="jumlah" value="1" required/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Saldo</label>
						<div class="col-sm-5">
							<input type="text" class="form-control numbers" id="saldoo" name="saldo" value="0" required readonly />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Keterangan</label>
						<div class="col-sm-5">
							<textarea name="keterangan" id="keterangan" class="form-control" placeholder="keterangan transaksi"></textarea>
						</div>
					</div>

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{route('transaksi.index')}}" class="btn btn-red btn-icon icon-left">
								Kembali
							<i class="entypo-cancel"></i>
						</a>
					</div>
				</form>
				<div class="modal fade" id="modal-1">
					<div class="modal-dialog" style="width: 90%;">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Pilih Pemeriksaan</h4>
							</div>

							<div class="modal-body">
								<?php $data1 = \App\Pemeriksaan::get(); ?>
								<table class="table table-bordered datatable table-1">
									<thead>
										<th width="1%">No</th>
										<th>No Faktur</th>
										<th>Tanggal Pemeriksaan</th>
										<th>Pemeriksaan/Tindakan</th>
										<th>Poli</th>
										<th>Dokter</th>
										<th>Pasien</th>
										<th>Total</th>
										<th>Aksi</th>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										@foreach($data1 as $data1)
										@if($data1->status_akunting == '1')
										<tr class="gradeU" hidden>
											<td><center>{{$no++}}</center></td>
											<td>{{$data1->no_faktur}}</td>
											<td>{{date('d M Y', strtotime($data1->tgl))}}</td>
											<td>{{$data1->data_pemeriksaan->nama_pemeriksaan}}</td>
											<td>{{$data1->reservasi->poli->nama_poli}}</td>
											<td>{{$data1->reservasi->dokter->nama}}</td>
											<td>{{$data1->reservasi->pasien->nama_pasien}}</td>
											<td>{{number_format($data1->total, 0, ',',',')}}</td>
											<td>
												<button type="button" class="btn btn-green btn-sm btn-icon icon-left add_1" data-id="{{$data1->id_pemeriksaan}}" data-pemeriksaan="{{$data1->data_pemeriksaan->nama_pemeriksaan}}" data-total="{{number_format($data1->total, 0, ',',',')}}" data-poli="{{$data1->reservasi->poli->nama_poli}}" data-dokter="{{$data1->reservasi->dokter->nama}}" data-pasien="{{$data1->reservasi->pasien->nama_pasien}}" data-faktur="{{$data1->no_faktur}}" data-tglp="{{date('d M Y', strtotime($data1->tgl))}}" data-ptotal="{{number_format($data1->total, 0, ',',',')}}" data-dismiss="modal"
												><i class="entypo-check"></i>
												Pilih</button>
											</td>
										</tr>
										@else
										<tr class="gradeU">
											<td><center>{{$no++}}</center></td>
											<td>{{$data1->no_faktur}}</td>
											<td>{{date('d M Y', strtotime($data1->tgl))}}</td>
											<td>{{$data1->data_pemeriksaan->nama_pemeriksaan}}</td>
											<td>{{$data1->reservasi->poli->nama_poli}}</td>
											<td>{{$data1->reservasi->dokter->nama}}</td>
											<td>{{$data1->reservasi->pasien->nama_pasien}}</td>
											<td>{{number_format($data1->total, 0, ',',',')}}</td>
											<td>
												<button type="button" class="btn btn-green btn-sm btn-icon icon-left add_1" data-id="{{$data1->id_pemeriksaan}}" data-pemeriksaan="{{$data1->data_pemeriksaan->nama_pemeriksaan}}" data-total="{{number_format($data1->total, 0, ',',',')}}" data-poli="{{$data1->reservasi->poli->nama_poli}}" data-dokter="{{$data1->reservasi->dokter->nama}}" data-pasien="{{$data1->reservasi->pasien->nama_pasien}}" data-faktur="{{$data1->no_faktur}}" data-tglp="{{date('d M Y', strtotime($data1->tgl))}}" data-ptotal="{{number_format($data1->total, 0, ',',',')}}" data-dismiss="modal"
												><i class="entypo-check"></i>
												Pilih</button>
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="modal-2">
					<div class="modal-dialog" style="width: 70%;">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Pilih Donatur Uang</h4>
							</div>

							<div class="modal-body">
								<?php $data2 = \App\Donasiuang::get(); ?>
								<table class="table table-bordered datatable table-1">
									<thead>
										<th>Nama Donatur</th>
										<th>Contact Person</th>
										<th>No.HP</th>
										<th>Jumlah Donasi</th>
										<th>Keterangan</th>
										<th>Aksi</th>
									</thead>
									<tbody>
										@foreach($data2 as $data2)
										@if($data2->status_akunting == '1')
										<tr class="gradeU" hidden>
											<td>{{$data2->nama_donatur}}</td>
											<td>{{$data2->cp}}</td>
											<td>{{$data2->hp}}</td>
											<td>{{number_format($data2->jml_donasi, 0, ',',',')}}</td>
											<td>{{$data2->keterangan}}</td>
											<td>
												<button type="button" class="btn btn-green btn-sm btn-icon icon-left add_2" data-id="{{$data2->id}}" data-ndonatur="{{$data2->nama_donatur}}" data-cp="{{$data2->cp}}" data-hp="{{$data2->hp}}" data-jml="{{number_format($data2->jml_donasi, 0, ',',',')}}" data-keterangan="{{$data2->keterangan}}" data-dismiss="modal"><i class="entypo-check"></i> Pilih</button>
											</td>
										</tr>
										@else
										<tr class="gradeU">
											<td>{{$data2->nama_donatur}}</td>
											<td>{{$data2->cp}}</td>
											<td>{{$data2->hp}}</td>
											<td>{{number_format($data2->jml_donasi, 0, ',',',')}}</td>
											<td>{{$data2->keterangan}}</td>
											<td>
												<button type="button" class="btn btn-green btn-sm btn-icon icon-left add_2" data-id="{{$data2->id}}" data-ndonatur="{{$data2->nama_donatur}}" data-cp="{{$data2->cp}}" data-hp="{{$data2->hp}}" data-jml="{{number_format($data2->jml_donasi, 0, ',',',')}}" data-keterangan="{{$data2->keterangan}}" data-dismiss="modal"><i class="entypo-check"></i> Pilih</button>
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<div class="modal fade" id="modal-3">
					<div class="modal-dialog" style="width: 70%;">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Pilih Petugas</h4>
							</div>

							<div class="modal-body">
								<?php $data3 = \App\Honor::get(); ?>
								<table class="table table-bordered datatable table-1">
									<thead>
										<th width="1%">No</th>
										<th>Kategori</th>
										<th>Nama</th>
										<th>Honor/Jam</th>
										<th>Jumlah Jam</th>
										<th>Total</th>
										<th>Aksi</th>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										@foreach($data3 as $data3)
										@if($data3->status_akunting == '1')
										<tr class="gradeU" hidden>
											<td><center>{{$no++}}</center></td>
											<td>{{$data3->category->nama_kategori}}</td>
											<td>{{$data3->petugas->nama}}</td>
											<td>{{number_format($data3->confhonor->honor, 0, ',', ',')}}</td>
											<td>{{$data3->jam}}</td>
											<td>{{number_format($data3->total, 0, ',', ',')}}</td>
											<td>
												<center>
												<button type="button" class="btn btn-green btn-sm btn-icon icon-left add_3" data-id="{{$data3->id}}" data-dismiss="modal" data-kategori="{{$data3->category->nama_kategori}}" data-petugas="{{$data3->petugas->nama}}" data-total="{{number_format($data3->total, 0, ',', ',')}}" data-hjam="{{number_format($data3->confhonor->honor, 0, ',', ',')}}" data-jjam="{{$data3->jam}}"><i class="entypo-check"></i> Pilih</button>
												</center>
											</td>
										</tr>
										@else
										<tr class="gradeU">
											<td><center>{{$no++}}</center></td>
											<td>{{$data3->category->nama_kategori}}</td>
											<td>{{$data3->petugas->nama}}</td>
											<td>{{number_format($data3->confhonor->honor, 0, ',', ',')}}</td>
											<td>{{$data3->jam}}</td>
											<td>{{number_format($data3->total, 0, ',', ',')}}</td>
											<td>
												<center>
												<button type="button" class="btn btn-green btn-sm btn-icon icon-left add_3" data-id="{{$data3->id}}" data-dismiss="modal" data-kategori="{{$data3->category->nama_kategori}}" data-petugas="{{$data3->petugas->nama}}" data-total="{{number_format($data3->total, 0, ',', ',')}}" data-hjam="{{number_format($data3->confhonor->honor, 0, ',', ',')}}" data-jjam="{{$data3->jam}}"><i class="entypo-check"></i> Pilih</button>
												</center>
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="modal-4">
					<div class="modal-dialog" style="width: 70%;">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Daftar Pembelian Obat</h4>
							</div>

							<div class="modal-body">
								<?php $data4 = \App\Pembelian::get(); ?>
								<table class="table table-bordered datatable table-1">
									<thead>
										<th width="1%">No</th>
										<th>Vendor</th>
										<th>Obat/Barang</th>
										<th>Jumlah</th>
										<th>Harga</th>
										<th>Total</th>
										<th>Aksi</th>
									</thead>
									<tbody>
										<?php $no=1; ?>
										@foreach($data4 as $data4)
										@if($data4->status_akunting == '1')
										<tr hidden>
											<td><center>{{$no++}}</center></td>
											<td>{{$data4->vendor->nama_vendor}}</td>
											<td>{{$data4->jenisobat->nama_obat}}</td>
											<td>{{$data4->jumlah}}</td>
											<td>{{number_format($data4->harga,0,',',',')}}</td>
											<td>{{number_format($data4->total,0,',',',')}}</td>
											<td>
												<center>
												<button type="button" class="btn btn-green btn-sm btn-icon icon-left add_4" data-id="{{$data4->id}}" data-vendor="{{$data4->vendor->nama_vendor}}" data-nobat="{{$data4->jenisobat->nama_obat}}" data-jml="{{$data4->jumlah}}" data-harga="{{number_format($data4->harga,0,',',',')}}" data-total="{{number_format($data4->total,0,',',',')}}" data-dismiss="modal"><i class="entypo-check"></i> Pilih</button>
												</center>
											</td>
										</tr>
										@else
										<tr>
											<td><center>{{$no++}}</center></td>
											<td>{{$data4->vendor->nama_vendor}}</td>
											<td>{{$data4->jenisobat->nama_obat}}</td>
											<td>{{$data4->jumlah}}</td>
											<td>{{number_format($data4->harga,0,',',',')}}</td>
											<td>{{number_format($data4->total,0,',',',')}}</td>
											<td>
												<center>
												<button type="button" class="btn btn-green btn-sm btn-icon icon-left add_4" data-id="{{$data4->id}}" data-vendor="{{$data4->vendor->nama_vendor}}" data-nobat="{{$data4->jenisobat->nama_obat}}" data-jml="{{$data4->jumlah}}" data-harga="{{number_format($data4->harga,0,',',',')}}" data-total="{{number_format($data4->total,0,',',',')}}" data-dismiss="modal"><i class="entypo-check"></i> Pilih</button>
												</center>
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
							</table>
						</div>
					</div>
				</div>
				</div>

				<div class="modal fade" id="modal-5">
					<div class="modal-dialog" style="width: 70%;">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Daftar Operasional</h4>
							</div>

							<div class="modal-body">
								<?php $data5 = \App\Operasional::groupBy('tgl')->get(); ?>
								<table class="table table-bordered datatable table-1">
									<thead>
										<th width="1%">No</th>
										<th>Tanggal Operasional</th>
										<th>Total</th>
										<th width="10">Aksi</th>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										@foreach($data5 as $data5)
										@if($data5->status_akunting == '1')
										<tr hidden>
											<td><center>{{$no++}}</center></td>
											<td>{{date('d M Y', strtotime($data5->tgl))}}</td>
											<td>{{number_format($data5->total,0,',',',')}}</td>
											<td>
												<center>
												<button type="button" class="btn btn-green btn-sm btn-icon icon-left add_5" data-id="{{$data5->id}}" data-tgl="{{date('d M Y', strtotime($data5->tgl))}}" data-total="{{number_format($data5->total,0,',',',')}}" data-dismiss="modal"><i class="entypo-check"></i> Pilih
												</button>
												</center>
											</td>
										</tr>
										@else
										<tr>
											<td><center>{{$no++}}</center></td>
											<td>{{date('d M Y', strtotime($data5->tgl))}}</td>
											<td>{{number_format($data5->total,0,',',',')}}</td>
											<td>
												<center>
												<button type="button" class="btn btn-green btn-sm btn-icon icon-left add_5" data-id="{{$data5->id}}" data-tgl="{{date('d M Y', strtotime($data5->tgl))}}" data-total="{{number_format($data5->total,0,',',',')}}" data-dismiss="modal"><i class="entypo-check"></i> Pilih
												</button>
												</center>
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$(document).on('change', '.tipe_akun', function() {
			if($(this).val() == "1") {
				$('#id_akun').empty();
				$("#id_akun").append($("<option></option>"));
				$("#id_akun").select2();
				@foreach($namaAkun as $nAkun)
				@if($nAkun->id_tipe == '1')
				$('#id_akun').append($("<option></option>").attr("value","{{$nAkun->id_akun}}").text("{{$nAkun->nama_akun}}"));
				@endif
				@endforeach
			} else if($(this).val() == "2") {
				$('#id_akun').empty();
				$("#id_akun").append($("<option></option>"));
				$("#id_akun").select2();
				@foreach($namaAkun as $nAkun)
				@if($nAkun->id_tipe == '2')
				$('#id_akun').append($("<option></option>").attr("value","{{$nAkun->id_akun}}").text("{{$nAkun->nama_akun}}"));
				@endif
				@endforeach
			} else if($(this).val() == "3") {
				$('#id_akun').empty();
				$("#id_akun").append($("<option></option>"));
				$("#id_akun").select2();
				@foreach($namaAkun as $nAkun)
				@if($nAkun->id_tipe == '3')
				$('#id_akun').append($("<option></option>").attr("value","{{$nAkun->id_akun}}").text("{{$nAkun->nama_akun}}"));
				@endif
				@endforeach
				$('.tm').prop("checked", true);
				$('.tk').prop("checked", false);
			} else {
				$('#id_akun').empty();
				$("#id_akun").append($("<option></option>"));
				$("#id_akun").select2();
				@foreach($namaAkun as $nAkun)
				@if($nAkun->id_tipe == '4')
				$('#id_akun').append($("<option></option>").attr("value","{{$nAkun->id_akun}}").text("{{$nAkun->nama_akun}}"));
				@endif
				@endforeach
				$('.tm').prop("checked", false);
				$('.tk').prop("checked", true);
			}

		});


		$("#id_akun").change(function() {
			var id = $(this).val();
			$('[class^="wajib_"]').removeAttr('required');
			$("#div_nama_akun").find(".nama_akun").hide();
			$("#div_nama_akun").find('#'+id).show();
			$('.wajib_'+id).prop('required', true);
			$("#nominall").val(null);
			$("#saldoo").val(null);
			$("#jumlahh").val(1);
			$("#keterangan").val(null);
			$("#pemeriksaan").val(null);
			$("#poli").val(null);
			$("#dokter").val(null);
			$("#pasien").val(null);
			$("#no_faktur").val(null);
			$("#nama_donatur").val(null);
			$("#cp").val(null);
			$("#no_hp").val(null);
			$("#nama_petugas").val(null);
			$("#kategori").val(null);
			$("#h_jam").val(null);
			$("#j_jam").val(null);
			$("#total").val(null);
			$("#vendor").val(null);
			$("#obt_brg").val(null);
			$("#jumlah").val(null);
			$("#harga").val(null);
			$("#total2").val(null);
			$("#saldo").val(null);
			$("#tgl_operasional").val(null);
			$("#total3").val(null);
			$("#tgl_pemeriksaan").val(null);
			$("#p_total").val(null);
			$("#jml_donasi").val(null);
			$("#id_pemeriksaan").val(null);
			$("#id_donasi").val(null);
			$("#id_honor").val(null);
			$("#id_pembelian").val(null);
			$("#id_operasional").val(null);
		});

		$("#id_tipe").change(function() {
			var id = $(this).val();
			$("#div_nama_akun").find(".nama_akun").hide();
			$("#nominall").val(null);
			$("#saldoo").val(null);
			$("#jumlahh").val(1);
			$("#keterangan").val(null);
			$("#pemeriksaan").val(null);
			$("#poli").val(null);
			$("#dokter").val(null);
			$("#pasien").val(null);
			$("#no_faktur").val(null);
			$("#nama_donatur").val(null);
			$("#cp").val(null);
			$("#no_hp").val(null);
			$("#nama_petugas").val(null);
			$("#kategori").val(null);
			$("#h_jam").val(null);
			$("#j_jam").val(null);
			$("#total").val(null);
			$("#vendor").val(null);
			$("#obt_brg").val(null);
			$("#jumlah").val(null);
			$("#harga").val(null);
			$("#total2").val(null);
			$("#nominal").val(null);
			$("#saldo").val(null);
			$("#tgl_operasional").val(null);
			$("#total3").val(null);
			$("#tgl_pemeriksaan").val(null);
			$("#p_total").val(null);
			$("#jml_donasi").val(null);
			$("#id_pemeriksaan").val(null);
			$("#id_donasi").val(null);
			$("#id_honor").val(null);
			$("#id_pembelian").val(null);
			$("#id_operasional").val(null);
		});

		$('.table-1').DataTable({
			"oLanguage": {
				"sSearch": "Search:",
				"oPaginate": {
					"sPrevious": "Previous",
					"sNext": "Next"
				}
			}
		});

		$('.datatable').on('click', '.add_1', function() {
			$("#id_pemeriksaan").val($(this).data('id'));
			$("#pemeriksaan").val($(this).data('pemeriksaan'));
			$("#nominall").val($(this).data('total'));
			$("#poli").val($(this).data('poli'));
			$("#dokter").val($(this).data('dokter'));
			$("#pasien").val($(this).data('pasien'));
			$("#no_faktur").val($(this).data('faktur'));
			$("#saldoo").val($(this).data('total'));
			$("#tgl_pemeriksaan").val($(this).data('tglp'));
			$("#p_total").val($(this).data('ptotal'));
		});

		$('.datatable').on('click', '.add_2', function() {
			$("#id_donasi").val($(this).data('id'));
			$("#nama_donatur").val($(this).data('ndonatur'));
			$("#cp").val($(this).data('cp'));
			$("#no_hp").val($(this).data('hp'));
			$("#nominall").val($(this).data('jml'));
			$("#saldoo").val($(this).data('jml'));
			$("#jml_donasi").val($(this).data('jml'));
			$("#keterangan").val($(this).data('keterangan'));
		});

		$('.datatable').on('click', '.add_3', function() {
			$("#id_honor").val($(this).data('id'));
			$("#nama_petugas").val($(this).data('petugas'));
			$("#kategori").val($(this).data('kategori'));
			$("#nominall").val($(this).data('total'));
			$("#saldoo").val($(this).data('total'));
			$("#h_jam").val($(this).data('hjam'));
			$("#j_jam").val($(this).data('jjam'));
			$("#total").val($(this).data('total'));
		});

		$('.datatable').on('click', '.add_4', function() {
			$("#id_pembelian").val($(this).data('id'));
			$("#vendor").val($(this).data("vendor"));
			$("#obt_brg").val($(this).data("nobat"));
			$("#jumlah").val($(this).data("jml"));
			$("#harga").val($(this).data("harga"));
			$("#total2").val($(this).data('total'));
			$("#nominall").val($(this).data('total'));
			$("#saldoo").val($(this).data('total'));
		});

		$('.datatable').on('click', '.add_5', function() {
			$("#id_operasional").val($(this).data('id'));
			$("#tgl_operasional").val($(this).data("tgl"));
			$("#total3").val($(this).data("total"));
			$("#nominall").val($(this).data('total'));
			$("#saldoo").val($(this).data('total'));
		});
		
		$("#jumlahh").keyup(function() {
			var nominal = $("#nominall").val();
			var jumlah = $("#jumlahh").val();
			var hasil = nominal * jumlah;
			$("#saldoo").val(hasil);
		});

		$(".tm").click(function(e){
			if(e.target.checked) {
				$('.tk').prop("checked", false);
			}
		});

		$(".tk").click(function(e){
			if(e.target.checked){
				$('.tm').prop("checked", false);
			}
		});

		$("#nominall").keyup(function() {
			var nominal = 0;
			var jml = $("#jumlahh").val();
			$("#nominall").each(function() {
				var num = parseFloat(this.value.replace(/,/g, ''));
				if (!isNaN(num)) {
					nominal += num;
				}

				$("#saldoo").val(nominal * jml);
			});
		});

		// $("option[name='pemasukan']").prop('selected',true);
	});
</script>
@endsection