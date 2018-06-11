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
					<th width="1%">No</th>
					<th>Nama Donatur</th>
					<th>CP</th>
					<th>No.HP</th>
					<th width="28%">Aksi</th>
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
							<form action="" method="post">
								{{ csrf_field() }}
									<a href="{{route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.edit', $donasi_uang->id)}}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
									</a>
									<a href="{{route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.show', $donasi_uang->id)}}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-eye"></i>
										Lihat
									</a>
									<a href="javascript:;" onclick="jQuery('#modal-7{{$donasi_uang->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
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
	</div>
	<?php $donasi_uang = \App\Donasiuang::all(); ?>
	@foreach($donasi_uang as $donasi_uang)
			<div class="modal fade" id="modal-7{{$donasi_uang->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Donatur</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.delete', ['id' => $donasi_uang->id])}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus Donatur {{$donasi_uang->nama_donatur}}!</h4></center>
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