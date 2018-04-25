@extends('template')
@section('main')
<h2>Data Donasi Uang</h2>
<h5>Menu ini digunakan untuk menambahkan donasi uang</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{ route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.create') }}">
	<i class="entypo-user-add"></i>Tambah Donasi
</a>
<br/>
<br/>
@if(session('message'))
    <div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
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
					<th>Nama Donatur</th>
					<th>CP</th>
					<th>No.HP</th>
					<th width="24%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($donasi_uang as $donasi_uang)
				<tr>
					<th>{{$no++}}</th>
					<th>{{$donasi_uang->nama_donatur}}</th>
					<th>{{$donasi_uang->cp}}</th>
					<th>{{$donasi_uang->hp}}</th>
					<th>
						<div align="center">
							<form action="{{route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.delete', ['id' => $donasi_uang->id])}}" method="post">
								{{ csrf_field() }}
									<a href="{{route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.edit', $donasi_uang->id)}}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
									</a>
									<a href="{{route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.show', $donasi_uang->id)}}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-eye"></i>
										Lihat
									</a>
									<button type="submit" name="simpan" id="simpan" class="btn btn-sm btn-danger btn-icon icon-left">
										<i class="entypo-trash"></i>
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
@endsection