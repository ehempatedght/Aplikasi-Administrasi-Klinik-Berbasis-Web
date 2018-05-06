@extends('template')
@section('main')
<h2>Ubah Pengaturan Honor {{$conf->petugas->nama}}</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('pengaturan.honor.index') }}"><i class="entypo-home"> Daftar Honor</i></a>
	</li>
	<li class="active">
		<strong>Ubah Pengatuan Honor</strong>
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
	<form role="form" action="{{route('pengaturan.honor.update', $conf->id)}}" method="post">
		@csrf
	<div class="col-md-12">
		<div class="tab-content">
			<div class="tab-pane active" id="dokter">
				<div class="panel panel-primary" data-collapsed="0">
					<div class="panel-body">
						<div class="form-horizontal form-groups-bordered">
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal</label>
								<div class="col-sm-5">
									<div class="input-group">
										<input type="text" class="form-control datepicker" name="tgl" data-format="dd MM yyyy" placeholder="tanggal" required="" value="{{ date("d M Y", strtotime($conf->tgl)) }}">
												
										<div class="input-group-addon">
											<a href="#"><i class="entypo-calendar"></i></a>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kategori</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="category" name="category" placeholder="nama kategori" value="{{$conf->petugas->category->nama_kategori}}" required readonly/>
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama</label>
								<input type="hidden" name="petugas_id" id="petugas_id" value="{{$conf->petugas_id}}">
								<div class="col-sm-5">
									<input type="text" class="form-control" id="petugas" name="petugas" placeholder="nama dokter" value="{{$conf->petugas->nama}}" required readonly/>
								</div>
								<a class="btn btn-white" href="javascript:;" onclick="jQuery('#modal-5').modal('show', {backdrop: 'static'}); ">	
				                       	<i class="entypo-search" ></i>        
								</a> 
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Honor/Jam</label>
										
								<div class="col-sm-5">
									<input type="text" class="form-control numbers" id="honor" name="honor" placeholder="0" autocomplete="off" value="{{$conf->honor}}" required />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group center-block full-right" style="margin-left: 15px;">
			<button type="submit" class="btn btn-green btn-icon icon-left col-left">
				Simpan
				<i class="entypo-check"></i>
			</button>
			<a href="{{ route('pengaturan.honor.index') }}" class="btn btn-red btn-icon icon-left">
				Kembali
				<i class="entypo-cancel"></i>
			</a>
		</div>
	</div>
	</form>
	<div class="modal fade" id="modal-5">
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
								<th>No</th>
								<th>Kategori</th>
								<th>Nama Dokter</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							@foreach($petugas as $petugas)
							<tr>
								<td>{{$no++}}</td>
								<td>{{$petugas->category->nama_kategori}}</td>
								<td>{{$petugas->nama}}</td>
								<td align="center">
									<button data-id="{{$petugas->id}}" data-cat="{{$petugas->category->nama_kategori}}" data-name="{{$petugas->nama}}" class="btn btn-green btn-sm btn-icon icon-left addPet">
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
	
		$('.datatable').on('click','.addPet', function(e){
			var nama = $(this).data('name');
			var id = $(this).data('id');
			var cat = $(this).data('cat');
			$("#category").val(cat);
			$("#petugas_id").val(id);
			$("#petugas").val(nama);
			$("#modal-5").modal('hide');
		});
	});
</script>
@endsection