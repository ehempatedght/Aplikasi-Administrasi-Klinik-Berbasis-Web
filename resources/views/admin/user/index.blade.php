@extends('template')
@section('main')
<h2 align="center">Daftar Pengguna</h2>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{ route('pengaturan.user.data.create') }}">
	<i class="entypo-user-add" ></i>Tambah Pengguna
</a>
<br/>
<br/>
@if(session('message'))
    <div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
@endif

<div class="col-md-12">
<div class="row">
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
				<th>Username</th>
				<th>Nama Depan</th>
				<th>Nama Belakang</th>
				<th width="24%">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach($users as $user)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$user->username}}</td>
				<td>{{$user->first_name}}</td>
				<td>{{$user->last_name}}</td>
				<td>
					<div align="center">
						<form action="{{route('pengaturan.user.data.delete', ['id'=>$user->id])}}" method="POST">
								{{ csrf_field() }}
							<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('pengaturan.user.data.edit', $user->id)}}">
								<i class="entypo-eye" ></i>Edit
							</a>
							
							<button type="submit" class="btn btn-sm btn-danger btn-icon icon-left" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS USER INI?')">
			                    <i class="entypo-cancel"> </i>
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