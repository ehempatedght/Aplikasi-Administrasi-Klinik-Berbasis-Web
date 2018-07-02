@extends('template')
@section('main')
<style>
.select2-container .select2-choice {
    display: block!important;
    height: 30px!important;
    white-space: nowrap!important;
    line-height: 26px!important;
}
</style>
<h2>Tambah Reservasi Pasien</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('medis.reservasi.index') }}"><i class="entypo-home"> Daftar Reservasi</i></a>
	</li>
	<li class="active">
		<strong>Tambah Reservasi Pasien</strong>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('medis.reservasi.save') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal</label>
						
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" name="created_at" placeholder="tanggal reservasi">
								
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No. Reservasi</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="kd_res" placeholder="" value="{{$noRes}}" readonly>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No. RM</label>
						<input type="hidden" name="pasien_id" id="pasien_id">
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="nomor rm" value="{{ old('no_rm') }}" required readonly />
						</div>
						<a class="btn btn-white" href="javascript:;" onclick="jQuery('#modal-5').modal('show', {backdrop: 'static'}); ">	
	                       	<i class="entypo-search" ></i>        
						</a> 
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Pasien</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="pasien" name="pasien" placeholder="nama pasien" value="{{ old('pasien') }}" required readonly/>
						</div>
					</div>
						
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jenis Kelamin</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="kelamin" name="kelamin" placeholder="jenis kelamin" value="{{ old('kelamin') }}" required readonly/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Alamat Pasien</label>
						<input type="hidden" name="obat_id" id="obat_id">
						<div class="col-sm-5">
							<textarea name="alamat" id="alamat" class="form-control" placeholder="alamat pasien" readonly=""></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Poli</label>
									<div class="col-sm-5">
										<select name="poli_id" class="form-control select2" id="poli_id" required data-placeholder="Pilih poli...">
											<option></option>
											<optgroup label="Pilih Poli">
												@foreach ($poli as $poli)
													<option value="{{$poli->id}}">{{$poli->nama_poli}}</option>
												@endforeach
											</optgroup>
										</select>
									</div>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No. Urut Antrian</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="no_urut" placeholder="" value="{{$noAntri}}" readonly>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Dokter</label>
						<input type="hidden" name="dokter_id" id="dokter_id">
						<div class="col-sm-5">
							<input type="text" class="form-control" id="dokter" name="dokter" placeholder="nama dokter" value="{{ old('dokter') }}" required readonly />
						</div>
						<a class="btn btn-white" href="javascript:;" onclick="jQuery('#modal-6').modal('show', {backdrop: 'static'}); ">	
	                       	<i class="entypo-search" ></i>        
						</a> 
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Spesialisasi</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="spesialisasi" id="spesialisasi" placeholder="spesialisasi" readonly>
						</div>
					</div>

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('medis.reservasi.index') }}" class="btn btn-red btn-icon icon-left">
								Kembali
							<i class="entypo-cancel"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-5">
		<div class="modal-dialog" style="width: 800px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pilih Pasien</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered datatable" id="table-1">
						<thead>
 							<tr>
								<th width="1%">No</th>
								<th>No. RM</th>
								<th>Kategori</th>
								<th>Nama Pasien</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							@foreach($pasien as $pasien)
							<tr>
								<td><center>{{$no++}}</center></td>
								<td>{{$pasien->no_rm}}</td>
								<td>{{$pasien->kategoripasien->nama_kategori}}</td>
								<td>{{$pasien->nama_pasien}}</td>
								<td align="center">
									<button data-id="{{$pasien->id}}" data-name="{{$pasien->nama_pasien}}" data-jk="{{$pasien->jenis_kelamin}}" data-nopend="{{$pasien->no_rm}}" data-alamat="{{$pasien->alamat}}" class="btn btn-green btn-sm btn-icon icon-left addPas">
										<i class="entypo-check"></i>
										Pilih
									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-6">
		<div class="modal-dialog" style="width: 800px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pilih Dokter</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered datatable" id="table-1">
						<thead>
 							<tr>
								<th width="1%">No</th>
								<th>Nama Dokter</th>
								<th>Spesialisasi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							@foreach($dokter as $dokter)
							<tr>
								<td><center>{{$no++}}</center></td>
								<td>{{$dokter->nama}}</td>
								<td>{{$dokter->spesialisasi}}</td>
								<td align="center">
									<button data-id="{{$dokter->id}}" data-name="{{$dokter->nama}}" data-spes="{{$dokter->spesialisasi}}" class="btn btn-green btn-sm btn-icon icon-left addDok">
										<i class="entypo-check"></i>
										Pilih
									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	$(document).ready(function () {

		$("#dokter_id").change(function(){
			var nama = $(this).find('option:selected').text();
			var id = $(this).val();
			$.get(home_url + '/perekaman_aktivitas/medis/pendaftaran/search_spesialisasi/' + id, function(data) {
				$('#spesialisasi').val(data);
			});
		});

		$('.datatable').DataTable({
	      "oLanguage": {
	       "sSearch": "Search:",
	       "oPaginate": {
	         "sPrevious": "Previous &emsp;",
	         "sNext": "Next"
					 }
				}
		});

		$('.datatable').on('click','.addDok', function(e) {
			var dokter_id = $(this).data('id');
			var dokter = $(this).data('name');
			var spes = $(this).data('spes');
			$("#dokter_id").val(dokter_id);
			$("#dokter").val(dokter);
			$("#spesialisasi").val(spes);
			$("#modal-6").modal('hide');

		});

		$('.datatable').on('click','.addPas', function(e){
			var nama = $(this).data('name');
			var id = $(this).data('id');
			var nopend = $(this).data('nopend');
			var j_kelamin = $(this).data('jk');
			var address = $(this).data('alamat');
			$("#pasien_id").val(id);
			$("#no_rm").val(nopend);
			$("#pasien").val(nama);
			$("#kelamin").val(j_kelamin);
			$("#alamat").val(address);
			$("#modal-5").modal('hide');
		});

	});
</script>
@endsection