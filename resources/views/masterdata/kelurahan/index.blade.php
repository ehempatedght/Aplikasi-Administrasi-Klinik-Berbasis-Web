@extends('template')
@section('main')
<h2>Data Kelurahan</h2>
<h5>Menu ini digunakan untuk menambahkan data kelurahan</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{ route('masterdata.pasien.kelurahan.create') }}">
	<i class="entypo-user-add"></i>Tambah Data Kelurahan
</a>
<br/>
<br/>
@if(session('message'))
    <div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
@endif
@if(session('message2'))
    <div class="alert alert-info">{{session('message2')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
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
					<th>Kelurahan</th>
					<th>Kecamatan</th>
					<th>Kota</th>
					<th width="18%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($kelurahans as $kelurahan)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$kelurahan->nama_kelurahan}}</td>
					<td>{{$kelurahan->kecamatan->nama_kecamatan}}</td>
					<td>{{$kelurahan->kecamatan->kota->nama_kota}}</td>
					<td>
						<div align="center">
							{{-- <form action="{{route('kelurahan.delete', ['id'=>$kelurahan->id])}}" method="post">
								@csrf --}}
								<a href="{{route('masterdata.pasien.kelurahan.edit', ['id'=>$kelurahan->id]) }}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-pencil"></i>
									Ubah
								</a>
								<a href="javascript:;" onclick="jQuery('#modal-8{{$kelurahan->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
										<i class="entypo-trash"></i>
										Hapus
								</a>
							{{-- </form> --}}
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		@foreach($kelurahans as $kelurahan)
		<div class="modal fade" id="modal-8{{$kelurahan->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Kelurahan</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('masterdata.pasien.kelurahan.delete', ['id'=>$kelurahan->id])}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Mengapus Kelurahan {{$kelurahan->nama_kelurahan}}!</h4></center>
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