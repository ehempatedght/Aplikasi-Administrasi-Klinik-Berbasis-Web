@extends('template')
@section('main')
<h2 align="center">Daftar User</h2>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{ route('users.create') }}">
	<i class="entypo-user-add" ></i>Tambah User
</a>
<br/>
<br/>
@if(session('message'))
    <div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
@endif

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
				<th>First Name</th>
				<th>Last Name</th>
				<th>Role</th>
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
					@foreach($user->roles as $user_role)
					<center>
						<span class="label label-primary">{{$user_role->name}}</span>
					</center>
					@endforeach
				</td>
				<td>
					<div class="row">
						<div class="col-sm-3">
							<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('users.edit', $user->id)}}">
								<i class="entypo-eye" ></i>Edit
							</a>
						</div>

						<div class="col-sm-2">
							{!! Form::open(['method'=>'DELETE', 'route'=>['users.destroy', $user->id]]) !!}
							{{ Form::button('<i class="entypo-pencil"></i> Hapus',['type'=>'submit', 'class'=>'btn btn-danger btn-sm btn-icon icon-left']) }}
							{!! Form::close() !!}
						</div>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection