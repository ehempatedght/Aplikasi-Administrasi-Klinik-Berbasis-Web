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
@if(session('message2'))
    <div class="alert alert-info">{{session('message2')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
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
				<th width="1%">No</th>
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
						<form action="" method="POST">
								{{ csrf_field() }}
							<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('pengaturan.user.data.edit', $user->id)}}">
								<i class="entypo-eye" ></i>Edit
							</a>
							
							<a href="javascript:;" onclick="jQuery('#modal-7{{$user->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
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
</div>
@foreach($users as $user)
			<div class="modal fade" id="modal-7{{$user->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Pengguna</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('pengaturan.user.data.delete', ['id'=>$user->id])}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus Pengguna {{$user->username}}!</h4></center>
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
@endsection