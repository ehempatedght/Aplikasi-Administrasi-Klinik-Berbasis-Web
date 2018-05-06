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
					<th width="5%">No</th>
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
					<th>{{$no++}}</th>
					<th>{{ date('d M Y', strtotime($conf->tgl)) }}</th>
					<th>{{$conf->petugas->category->nama_kategori}}</th>
					<th>{{$conf->petugas->nama}}</th>
					<th class="numbers">{{$conf->honor}}</th>
					<th>
						<div align="center">
							<form action="{{route('pengaturan.honor.delete',['id' => $conf->id, 'petugas_id' => $conf->petugas_id])}}" method="post">
									{{ csrf_field() }}
									<a href="{{route('pengaturan.honor.edit', $conf->id)}}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
									</a>
									{{-- <a href="{{route('pengeluaran.pembelian.show', $conf->id)}}" class="btn btn-sm btn-info btn-icon icon-left">
										<i class="entypo-eye"></i>
										Lihat
									</a> --}}
									<button type="submit" class="btn btn-sm btn-danger btn-icon icon-left" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS PENGATURAN HONOR INI?')">
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
@endsection