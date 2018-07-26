@extends('template')
@section('main')
<h2>Data Pengaturan Honor</h2>
<h5>Menu ini digunakan untuk mengatur honor</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('pengaturan.honor.create')}}">
	<i class="entypo-user-add"></i>Tambah Pengaturan Honor
</a>
<br/>
<br/>
@if(session('message'))
    <div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
@endif
@if(session('message2'))
    <div class="alert alert-info">{{session('message2')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
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
					<th>Tanggal</th>
					<th>Kategori</th>
					<th>Nama</th>
					<th>Honor/Jam</th>
					<th width="24%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($conf as $conf)
				<tr>
					<th><center>{{$no++}}</center></th>
					<th>{{ date('d M Y', strtotime($conf->tgl)) }}</th>
					<th>{{$conf->petugas->category->nama_kategori}}</th>
					<th>{{$conf->petugas->nama}}</th>
					<th class="numbers">{{$conf->honor}}</th>
					<th>
						<div align="center">
							<form action="" method="post">
									{{ csrf_field() }}
									<a href="{{route('pengaturan.honor.edit', $conf->id)}}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
									</a>
									{{-- <a href="{{route('pengeluaran.pembelian.show', $conf->id)}}" class="btn btn-sm btn-info btn-icon icon-left">
										<i class="entypo-eye"></i>
										Lihat
									</a> --}}
									<a href="javascript:;" onclick="jQuery('#modal-7{{$conf->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
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
	<?php $confs = \App\Confhonor::all(); ?>
	@foreach($confs as $conf)
			<div class="modal fade" id="modal-7{{$conf->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Pengaturan Honor</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{ route('pengaturan.honor.delete', ['id' => $conf->id]) }}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus Pengaturan Honor {{$conf->petugas->nama}}!</h4></center>
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