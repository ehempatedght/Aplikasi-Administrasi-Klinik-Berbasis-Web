@extends('template')
@section('main')
<h2>Data Pasien</h2>
<h5>Menu ini digunakan untuk registrasi pasien</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{ route('pasien.create') }}">
	<i class="entypo-user-add"></i>Registrasi Pasien
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
					<th>Nama Pasien</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($pasiens as $pasien)
				<tr>
					<th>{{$no++}}</th>
					<th>
						<center>
							<span class="label label-primary">{{strtoupper($pasien->kategoripasien->nama_kategori)}}</span>
						</center>
					</th>
					<th>{{$pasien->nama_pasien}}</th>
					<th>{{$pasien->alamat}}</th>
					<th>
						<div align="center">
							<form action="{{route('pasien.hapus', ['id' => $pasien->id])}}" method="post">
								{{ csrf_field() }}
									<a href="{{route('pasien.ubah', $pasien->id)}}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
									</a>
									<a href="{{route('pasien.lihat', $pasien->id)}}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-eye"></i>
										Lihat
									</a>
									<a href="javascript:;" onclick="jQuery('#modal-8{{$pasien->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
										<i class="entypo-trash"></i>
										Hapus
									</a>
							</form>
						</div>
					</th>
				</tr>
				@endforeach
			</tbody>
		</table>

		@foreach($pasiens as $pasien)
			<div class="modal fade" id="modal-8{{$pasien->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Anda Yakin Akan Menghapus Pasien {{$pasien->nama_pasien}} ?</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('pasien.hapus', ['id' => $pasien->id])}}" method="post">
								        {{ csrf_field() }}
										<div class="form-group">
											<button type="submit" name="simpan" id="simpan" class="btn btn-danger btn-block">
											<i class="entypo-trash"></i>
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="modal-footer">
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
<script>
	$(document).ready(function() {
		$('input').on('keydown', function(event) {
		        if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
		           var $t = $(this);
		           event.preventDefault();
		           var char = String.fromCharCode(event.keyCode);
		           $t.val(char + $t.val().slice(this.selectionEnd));
		           this.setSelectionRange(1,1);
		        }
	    });
	});
</script>
@endsection