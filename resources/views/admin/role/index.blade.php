@extends('template')
@section('main')
<h2 align="center">Daftar Group User</h2>
<a class="btn btn-blue btn-sm btn-icon btn-left" href="{{route('role.create')}}">
	<i class="entypo-user-add"></i> Tambah Group
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
				<th data-hide="phone" width="20">No</th>
				<th>Nama</th>
				<th width="5">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach($roles as $role)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$role->name}}</td>
				<td>
					<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('role.edit', $role->id)}}"><i class="entypo-pencil"></i> Ubah</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection