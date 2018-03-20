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
					<th>{{$pasien->kategoripasien->nama_kategori}}</th>
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
									<button type="submit" class="btn btn-sm btn-danger btn-icon icon-left" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS PASIEN INI?')">
					                    <i class="entypo-trash"> </i>
					                    Hapus
                  					</button>
							</form>
						</div>
					</th>
				</tr>
				@endforeach
			</tbody>
		</table>
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