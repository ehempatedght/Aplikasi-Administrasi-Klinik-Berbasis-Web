@extends('template')

@section('main')
<h2>Ubah Data Pasien {{$pasien->nama_pasien}}</h2>
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
				<a href="{{route('masterdata.pasien.datapasien.index')}}"><i class="fa fa-home"></i>Data Pasien</a>
			</li>
			<li class="active">
				<strong>Ubah Data Pasien</strong>
			</li>
		</ol>
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-body">
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('masterdata.pasien.datapasien.update', $pasien->id) }}" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No RM</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="no_rm" value="{{strtoupper($pasien->no_rm)}}" readonly="" required>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Pasien</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="nama_pasien" placeholder="nama pasien" value="{{$pasien->nama_pasien}}" required>
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
												<option value="{{$kategori->id}}" @if($pasien->kategoripasien_id == $kategori->id) selected @endif>{{$kategori->nama_kategori}}</option>
											@endforeach
									</select>
								</div>
								<div class="col-sm-3">
									<button href="javascript:;" onclick="jQuery('#modal-6').modal('show', {backdrop: 'static'});" type="button" class="btn btn-info" disabled="">
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
									<input type="text" class="form-control" name="golongan_darah" required value="{{$pasien->golongan_darah}}">
								</div>
								<label for="field-1" class="col-sm-2 control-label">Jenis Kelamin</label>
								<div class="col-sm-2">
									<select name="jenis_kelamin" class="selectboxit">
										<option {{old('jenis_kelamin', $pasien->jenis_kelamin)=="Laki-laki"? 'selected':''}} value="Laki-laki">Laki-laki</option>
										<option {{old('jenis_kelamin', $pasien->jenis_kelamin)=="Perempuan"? 'selected':''}} value="Perempuan">Perempuan</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal Lahir</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" name="TanggalLahir" data-format="dd MM yyyy" placeholder="tanggal lahir" value="{{date("d M Y", strtotime($pasien->TanggalLahir)) }}">
										
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Alamat</label>
						<div class="col-sm-5">
							<textarea type="textarea" class="form-control" id="alamat" name="alamat" placeholder="alamat">{{$pasien->alamat}}</textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kota</label>
								<div class="col-sm-5">
									<select name="id_kota" class="selectboxit">
										<option selected="selected" disabled value="Pilih">Pilih Kota</option>
											@foreach ($kotas as $kota)
												<option value="{{$kota->id}}" @if($pasien->kota_id == $kota->id) selected @endif>{{$kota->nama_kota}}</option>
											@endforeach
									</select>
								</div>
								{{-- <div class="col-sm-3">
									<button href="javascript:;" onclick="jQuery('#modal-7').modal('show', {backdrop: 'static'});" type="button" class="btn btn-info" disabled="">
										<i class="entypo-plus"></i>
									</button>
								</div> --}}
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kecamatan</label>
								<div class="col-sm-5">
									<select name="id_kec" class="selectboxit">
										<option selected="selected" disabled value="Pilih">Pilih Kecamatan</option>
											@foreach ($kecamatans as $kecamatan)
												<option value="{{$kecamatan->id}}" @if($pasien->kec_id == $kecamatan->id) selected @endif>{{$kecamatan->nama_kecamatan.' | '.$kecamatan->kota->nama_kota}}</option>
											@endforeach
									</select>
								</div>
								{{-- <div class="col-sm-3">
									<button href="javascript:;" onclick="jQuery('#modal-8').modal('show', {backdrop: 'static'});" type="button" class="btn btn-info" disabled="">
										<i class="entypo-plus"></i>
									</button>
								</div> --}}
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kelurahan</label>
								<div class="col-sm-5">
									<select name="id_kel" class="selectboxit">
										<option selected="selected" disabled value="Pilih">Pilih Kelurahan</option>
											@foreach ($kelurahans as $kelurahan)
												<option value="{{$kelurahan->id}}" @if($pasien->kel_id == $kelurahan->id) selected @endif>{{$kelurahan->nama_kelurahan.' | '.$kelurahan->kecamatan->nama_kecamatan}}</option>
											@endforeach
									</select>
								</div>
								{{-- <div class="col-sm-3">
									<button href="javascript:;" onclick="jQuery('#modal-9').modal('show', {backdrop: 'static'});" type="button" class="btn btn-info" disabled="">
										<i class="entypo-plus"></i>
									</button>
								</div> --}}
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No HP / Telp</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_hp" name="kontak" placeholder="nomor hp" data-mask="(9999) 9999-9999" value="{{$pasien->kontak}}"/>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Status Pernikahan</label>
								<div class="col-sm-2">
									<select name="status_pernikahan" class="selectboxit">
										<option {{old('status_pernikahan', $pasien->status_pernikahan)=="Belum Menikah"? 'selected':''}} value="Belum Menikah">Belum Menikah</option>
										<option {{old('status_pernikahan', $pasien->status_pernikahan)=="Menikah"? 'selected':''}} value="Menikah">Menikah</option>
										<option {{old('status_pernikahan', $pasien->status_pernikahan)=="Janda"? 'selected':''}} value="Janda">Janda</option>
										<option {{old('status_pernikahan', $pasien->status_pernikahan)=="Duda"? 'selected':''}} value="Duda">Duda</option>
									</select>
								</div>
								<label for="field-1" class="col-sm-1 control-label">Pekerjaan</label>
								<div class="col-sm-2">
									<input type="text" class="form-control" name="pekerjaan" required value="{{$pasien->pekerjaan}}">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Ibu</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="namaIbuKandung" placeholder="nama ibu kandung" value="{{$pasien->namaIbuKandung}}" required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Ayah</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="namaAyahKandung" placeholder="nama ayah kandung" value="{{$pasien->namaAyahKandung}}" required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No. KK</label>
						<div class="col-sm-5">
							<input type="text" class="form-control numberValidation" name="no_kk" placeholder="nomor kartu keluarga" value="{{$pasien->no_kk}}" required>
						</div>
					</div>

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('masterdata.pasien.datapasien.index') }}" class="btn btn-red btn-icon icon-left">
								Kembali
							<i class="entypo-cancel"></i>
						</a>
					</div>
				</form>
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