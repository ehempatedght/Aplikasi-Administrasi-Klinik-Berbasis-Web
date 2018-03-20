@extends('template')

@section('main')
<h2>Tambah Data Pasien</h2>
<br/>
@if(count($errors) > 0) 
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>
			{{$error}}
		</li>
		@endforeach
	</ul>
</div>
@endif
@if(session('message'))
    <div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
@endif
<div class="row">
	<div class="col-md-12">
		<hr />
		<ol class="breadcrumb bc-3" >
			<li>
				<a href="{{route('pasien.index')}}"><i class="fa fa-home"></i>Data Pasien</a>
			</li>
			<li class="active">
				<strong>Tambah Data Pasien</strong>
			</li>
		</ol>
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-body">
				<form role="form" class="form-horizontal" action="{{ route('pasien.insert') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Pasien</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="nama_pasien" placeholder="nama pasien" required>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kategori Pasien</label>
								<div class="col-sm-4">
									<select name="kategoripasien_id" class="selectboxit">
										<option selected="selected" disabled value="Pilih">Pilih Kategori</option>
											@foreach ($kategories as $kategori)
												<option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
											@endforeach
									</select>
								</div>
								<div class="col-sm-3">
									<button href="javascript:;" onclick="jQuery('#modal-6').modal('show', {backdrop: 'static'});" type="button" class="btn btn-info">
										<i class="entypo-plus"></i>
									</button>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Golongan Darah</label>
								<div class="col-sm-1">
									<input type="text" class="form-control" name="golongan_darah" required">
								</div>
								<label for="field-1" class="col-sm-2 control-label">Jenis Kelamin</label>
								<div class="col-sm-2">
									<select name="jenis_kelamin" class="selectboxit">
										<?php $genders = ['Laki-laki','Perempuan']; ?>
										@foreach($genders as $gender)
										<option value="{{$gender}}">{{$gender}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal Lahir</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" name="TanggalLahir" data-format="dd MM yyyy" placeholder="tanggal lahir">
										
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Alamat</label>
						<div class="col-sm-5">
							<textarea type="textarea" class="form-control" id="alamat" name="alamat" placeholder="alamat"></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kota</label>
								<div class="col-sm-4">
									<select name="id_kota" class="selectboxit">
										<option selected="selected" disabled value="Pilih">Pilih Kota</option>
											@foreach ($kotas as $kota)
												<option value="{{$kota->id_kota}}">{{$kota->nama_kota}}</option>
											@endforeach
									</select>
								</div>
								<div class="col-sm-3">
									<button href="javascript:;" onclick="jQuery('#modal-7').modal('show', {backdrop: 'static'});" type="button" class="btn btn-info">
										<i class="entypo-plus"></i>
									</button>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kecamatan</label>
								<div class="col-sm-4">
									<select name="id_kec" class="selectboxit">
										<option selected="selected" disabled value="Pilih">Pilih Kecamatan</option>
											@foreach ($kecamatans as $kecamatan)
												<option value="{{$kecamatan->id_kec}}">{{$kecamatan->nama_kecamatan}}</option>
											@endforeach
									</select>
								</div>
								<div class="col-sm-3">
									<button href="javascript:;" onclick="jQuery('#modal-8').modal('show', {backdrop: 'static'});" type="button" class="btn btn-info">
										<i class="entypo-plus"></i>
									</button>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kelurahan</label>
								<div class="col-sm-4">
									<select name="id_kel" class="selectboxit">
										<option selected="selected" disabled value="Pilih">Pilih Kelurahan</option>
											@foreach ($kelurahans as $kelurahan)
												<option value="{{$kelurahan->id_kel}}">{{$kelurahan->nama_kelurahan}}</option>
											@endforeach
									</select>
								</div>
								<div class="col-sm-3">
									<button href="javascript:;" onclick="jQuery('#modal-9').modal('show', {backdrop: 'static'});" type="button" class="btn btn-info">
										<i class="entypo-plus"></i>
									</button>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No HP / Telp</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_hp" name="kontak" placeholder="nomor hp" data-mask="(9999) 9999-9999" value="{{ old('kontak') }}"/>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Status Pernikahan</label>
								<div class="col-sm-2">
									<select name="status_pernikahan" class="selectboxit">
										<?php $statuss = ['Belum Menikah','Menikah','Janda','Duda']; ?>
										@foreach($statuss as $status)
											<option value="{{$status}}">{{$status}}</option>
										@endforeach
									</select>
								</div>
								<label for="field-1" class="col-sm-1 control-label">Pekerjaan</label>
								<div class="col-sm-2">
									<input type="text" class="form-control" name="pekerjaan" required">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Ibu</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="namaIbuKandung" placeholder="nama ibu kandung" required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Ayah</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="namaAyahKandung" placeholder="nama ayah kandung" required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No. KK</label>
						<div class="col-sm-5">
							<input type="text" class="form-control numberValidation" name="no_kk" placeholder="nomor kartu keluarga" required>
						</div>
					</div>

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('pasien.index') }}" class="btn btn-red btn-icon icon-left">
								Kembali
							<i class="entypo-cancel"></i>
						</a>
					</div>
				</form>
			</div>
		</div>

		<!-- Modal 6 (Long Modal)-->
	<div class="modal fade" id="modal-6">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tambah Kategori Pasien</h4>
				</div>
				
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<form action="{{route('pasien.kategori')}}" method="post">
								@csrf
								<div class="form-group">
									<label for="field-1" class="control-label">Nama Kategori</label>
									<input type="text" class="form-control" name="nama_kategori" placeholder="nama kategori" required>
								</div>
						</div>
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
					<i class="entypo-check"></i>
					Simpan</button>
				</div>
						</form>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="modal-7">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tambah Kota</h4>
				</div>
				
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<form action="{{route('pasien.kota')}}" method="post">
								@csrf
							<div class="form-group">
								<label for="field-1" class="control-label">Nama Kota</label>
								<input type="text" class="form-control" name="nama_kota" placeholder="nama kota" required>
							</div>
						</div>
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
					<i class="entypo-check"></i>
					Simpan</button>
				</div>
						</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-8">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tambah Kecamatan</h4>
				</div>
				
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<form action="{{route('pasien.kecamatan')}}" method="post">
								@csrf
								<div class="form-group">
									<label for="field-1" class="control-label">Kota</label>
									<select name="id_kota" class="selectboxit">
										<option selected="selected" disabled value="Pilih">Pilih Kota</option>
											@foreach ($kotas as $kota)
												<option value="{{$kota->id_kota}}">{{$kota->nama_kota}}</option>
											@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="field-1" class="control-label">Nama Kecamatan</label>
									<input type="text" class="form-control" name="nama_kecamatan" placeholder="nama kecamatan" required>
								</div>
							</div>
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
					<i class="entypo-check"></i>
					Simpan</button>
				</div>
						</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-9">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tambah Kelurahan</h4>
				</div>
				
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<form action="{{route('pasien.kelurahan')}}" method="post">
								@csrf
								<div class="form-group">
									<label for="field-1" class="control-label">Kecamatan</label>
									<select name="id_kec" class="selectboxit">
										<option selected="selected" disabled value="Pilih">Pilih Kecamatan</option>
											@foreach ($kecamatans as $kecamatan)
												<option value="{{$kecamatan->id_kec}}">{{$kecamatan->nama_kecamatan}}</option>
											@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="field-1" class="control-label">Nama Kelurahan</label>
									<input type="text" class="form-control" name="nama_kelurahan" placeholder="nama kelurahan" required>
								</div>
							</div>
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
					<i class="entypo-check"></i>
					Simpan</button>
				</div>
						</form>
			</div>
		</div>
	</div>

	</div>
</div>
<script>
	$('.numberValidation').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });
	$(document).ready(function() {
		$('input').on('keydown', function(event) {
		        if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
		           var $t = $(this);
		           event.preventDefault();
		           var char = String.fromCharCode(event.keyCode);
		           $t.val(char + $t.val().slice(this.selectionEnd));
		           this.setSelectionRange(1,1);
		        }
	    });
	});
</script>
@endsection