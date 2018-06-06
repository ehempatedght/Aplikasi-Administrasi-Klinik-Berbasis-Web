@extends('template')
@section('main')
<h2>Data Petugas Medis</h2>
<h5>Menu ini digunakan untuk memasukkan data petugas medis di klinik</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{ route('masterdata.petugasmedis.datapetugasmedis.create') }}">
	<i class="entypo-user-add"></i>Tambah Petugas Medis
</a>
<br/>
<br/>
@if(session('message'))
    <div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
@endif
@if(session('message2'))
    <div class="alert alert-danger">{{session('message2')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
@endif
<div class="row">
	<div class="col-md-12">
		<br/>
		<script type="text/javascript">
				jQuery( document ).ready( function( $ ) {
					var $table4 = jQuery( "#table-1" );
					$table4.DataTable( {
						dom: 'Bfrtip',
						buttons: [
							'copyHtml5',
							'excelHtml5',
							'csvHtml5',
							'pdfHtml5'
						]
					} );
						} );
		</script>
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th width="1%">No</th>
					<th>Kategori</th>
					<th>Nama</th>
					<th>Spesialisasi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($petugass as $petugas)
				<tr>
					<td>{{$no++}}</td>
					<td>
						<center>
							<span class="label label-primary">{{strtoupper($petugas->category->nama_kategori)}}</span>
						</center>
					</td>
					<td>{{$petugas->nama}}</td>
					<td width="30%">{{$petugas->spesialisasi}}</td>
					<td>
						<div align="center">
							<form action="#" method="POST">
								{{csrf_field()}}
								<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('masterdata.petugasmedis.datapetugasmedis.ubah', $petugas->id)}}">
									<i class="entypo-pencil"></i>Ubah
								</a>
								<a class="btn btn-primary btn-sm btn-icon icon-left" href="{{route('masterdata.petugasmedis.datapetugasmedis.show', $petugas->id)}}">
									<i class="entypo-eye"></i>Lihat
								</a>
								<a href="javascript:;" onclick="jQuery('#modal-8{{$petugas->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
										<i class="entypo-trash"></i>
										Hapus
									</a>
							</form>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@foreach($petugass as $petugas)
		<div class="modal fade" id="modal-8{{$petugas->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Petugas Medis</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{ route('masterdata.petugasmedis.datapetugasmedis.hapus', ['id'=>$petugas->id]) }}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus Petugas Medis {{$petugas->nama}}!</h4></center>
											</div>
										</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="submit" name="simpan" id="simpan" class="btn btn-danger btn-icon icon-left col-left">
							<i class="entypo-trash"></i>
							Ya</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection