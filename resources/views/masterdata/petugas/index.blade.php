@extends('template')
@section('main')
<h2>Data Petugas Medis</h2>
<h5>Menu ini digunakan untuk memasukkan data petugas medis di klinik</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{ route('petugas.create') }}">
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
					<th data-hide="phone">No</th>
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
							<span class="label label-primary">{{$petugas->category->nama_kategori}}</span>
						</center>
					</td>
					<td>{{$petugas->nama}}</td>
					<td width="30%">{{$petugas->spesialisasi}}</td>
					<td>
						<div align="center">
							<form action="{{ route('petugas.hapus', ['id'=>$petugas->id]) }}" method="POST">
								{{csrf_field()}}
								<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('petugas.ubah', $petugas->id)}}">
									<i class="entypo-pencil"></i>Ubah
								</a>
								<a class="btn btn-primary btn-sm btn-icon icon-left" href="{{route('petugas.show', $petugas->id)}}">
									<i class="entypo-eye"></i>Lihat
								</a>
								<button type="submit" class="btn btn-sm btn-danger btn-icon icon-left" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS PETUGAS MEDIS INI?')">
						            <i class="entypo-trash"> </i>
						                    Hapus
	                  			</button>
							</form>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection