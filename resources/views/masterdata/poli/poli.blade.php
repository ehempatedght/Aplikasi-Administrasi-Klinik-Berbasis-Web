@extends('template')
@section('main')
<div class="row">
	<div class="col-md-12">
		<div style="margin-left: 18px;">
			<h2>Data Poli</h2>
			<h4>Menu ini digunakan untuk memasukkan data poli</h4>
		</div>
		<div class="col-md-6">
			<a href="{{route('poli.create')}}" class="btn btn-success btn-sm btn-icon">
				<i class="entypo-plus icon-white"></i>
				Tambah Data Poli
			</a>
		</div>
		<br/>
		<div class="panel-body">
			@if(session('message'))
    			<div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
			@endif
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
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
						<th>Nama Poli</th>
						<th width="25%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; ?>
					@foreach($polis as $poli)
					<tr>
						<td><?php echo $no++; ?></td>
						<td>{{$poli->nama_poli}}</td>
						<td>
							<div align="center">
								<form action="{{route('poli.hapus', ['id'=> $poli->id ]) }}" method="post">
									{{ csrf_field() }}
									<a href="{{route('poli.ubah', $poli->id)}}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
									</a>
									<button type="submit" class="btn btn-sm btn-danger btn-icon icon-left" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS POLI INI?')">
					                    <i class="entypo-cancel"> </i>
					                    Hapus
                  					</button>
								</form>
							</div> 
							{{-- {!! Form::open(['method'=>'DELETE','route'=>['petugas.destroy', $petugas->id]]) !!}
								{{ Form::button('<i class="entypo-pencil"></i> Hapus',['type'=>'submit', 'class'=>'btn btn-danger btn-sm btn-icon icon-left'])}}
							{!! Form::close() !!} --}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection