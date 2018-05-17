@extends('template')
@section('main')
<h2>Tambah Pemberian Obat</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('medis.pemberian.index') }}"><i class="entypo-home"> Daftar Pemberian Obat</i></a>
	</li>
	<li class="active">
		<strong>Tambah Pemberian Obat</strong>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('medis.pemberian.save') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" name="tgl" data-format="dd MM yyyy" placeholder="tanggal" required="">
										
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No.Pendaftaran</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_pend" name="no_pend" placeholder="nomor pendaftaran" value="{{ old('no_pend') }}" required readonly/>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Pasien</label>
						<input type="hidden" name="pasien_id" id="pasien_id">
						<div class="col-sm-5">
							<input type="text" class="form-control" id="pasien" name="pasien" placeholder="nama pasien" value="{{ old('pasien') }}" required readonly/>
						</div>
						<a class="btn btn-white" href="javascript:;" onclick="jQuery('#modal-5').modal('show', {backdrop: 'static'}); ">	
	                       	<i class="entypo-search" ></i>        
						</a> 
					</div>
						
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jenis Obat</label>
						<input type="hidden" name="jenis_id" id="jenis_id">
						<div class="col-sm-5">
							<input type="text" class="form-control" id="jenis" name="jenis" placeholder="jenis obat" value="{{ old('jenis') }}" required readonly/>
						</div>
						<a class="btn btn-white" href="javascript:;" onclick="jQuery('#modal-6').modal('show', {backdrop: 'static'}); ">	
	                       	<i class="entypo-search" ></i>        
						</a> 
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Obat</label>
						<input type="hidden" name="obat_id" id="obat_id">
						<div class="col-sm-5">
							<input type="text" class="form-control" id="obat" name="obat" placeholder="nama obat" value="{{ old('obat') }}" required readonly/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah</label>
							
						<div class="col-sm-5">
							<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="harga" value="0" autocomplete="off" required />
							</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Keterangan</label>
							
						<div class="col-sm-5">
							<textarea class="form-control" name="keterangan" placeholder="keterangan"></textarea>
						</div>
					</div>
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('medis.pemberian.index') }}" class="btn btn-red btn-icon icon-left">
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
								<th>No</th>
								<th>No.Pendaftaran</th>
								<th>Kategori</th>
								<th>Nama Pasien</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							@foreach($pasien as $pasien)
							<tr>
								<td>{{$no++}}</td>
								<td>{{$pasien->reservasi->no_rm}}</td>
								<td>{{$pasien->reservasi->pasien->kategoripasien->nama_kategori}}</td>
								<td>{{$pasien->reservasi->pasien->nama_pasien}}</td>
								<td align="center">
									<button data-id="{{$pasien->id_pemeriksaan}}" data-name="{{$pasien->reservasi->pasien->nama_pasien}}" data-nopend="{{$pasien->reservasi->no_rm}}" class="btn btn-green btn-sm btn-icon icon-left addPas">
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
					<h4 class="modal-title">Pilih Jenis Obat</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered datatable2" id="table-2">
						<thead>
 							<tr>
								<th>No</th>
								<th>Jenis Obat</th>
								<th>Nama Obat</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							@foreach($jenis as $jenis)
							<tr>
								<td>{{$no++}}</td>
								<td>{{$jenis->jenis_obat->jns_obt}}</td>
								<td>{{$jenis->nama_obat}}</td>
								<td align="center">
									<button data-id="{{$jenis->id}}" data-jnsid={{$jenis->jenis_obat->id}} data-name="{{$jenis->nama_obat}}" data-jenis={{$jenis->jenis_obat->jns_obt}} class="btn btn-green btn-sm btn-icon icon-left addObt" data-dismiss="modal">
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

		$('.datatable').DataTable({
	      "oLanguage": {
	       "sSearch": "Search:",
	       "oPaginate": {
	         "sPrevious": "Previous &emsp;",
	         "sNext": "Next"
					 }
				}
		});

		$('.datatable2').DataTable({
	      "oLanguage": {
	       "sSearch": "Search:",
	       "oPaginate": {
	         "sPrevious": "Previous &emsp;",
	         "sNext": "Next"
					 }
				 }
		});
	
		$('.datatable').on('click','.addPas', function(e){
			var nama = $(this).data('name');
			var id = $(this).data('id');
			var nopend = $(this).data('nopend');
			$("#pasien_id").val(id);
			$("#no_pend").val(nopend);
			$("#pasien").val(nama);
			$("#modal-5").modal('hide');
		});

		$('.datatable2').on('click','.addObt', function(e){
			var id = $(this).data('id');
			var jnsid = $(this).data('jnsid');
			var nama = $(this).data('name');
			var jenis = $(this).data('jenis');
			$("#obat_id").val(id);
			$("#jenis_id").val(jnsid);
			$("#jenis").val(jenis);
			$("#obat").val(nama);
		});
	});
</script>
@endsection