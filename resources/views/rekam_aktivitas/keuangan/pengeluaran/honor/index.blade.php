@extends('template')
@section('main')
<h2>Data Honor</h2>
<h5>Menu ini digunakan untuk menambahkan honor</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('pengeluaran.honor.create')}}">
	<i class="entypo-user-add"></i>Tambah Honor
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
					<th>Tanggal</th>
					<th>Kategori</th>
					<th>Nama</th>
					<th>Honor/Jam</th>
					<th>Jumlah Jam</th>
					<th>Total</th>
					<th width="24%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($honor as $honor)
				<tr>
					<th>{{$no++}}</th>
					<th>{{ date('d M Y', strtotime($honor->tgl)) }}</th>
					<th>{{$honor->confhonor->petugas->category->nama_kategori}}</th>
					<th>{{$honor->confhonor->petugas->nama}}</th>
					<th class="numbers">{{$honor->confhonor->honor}}</th>
					<th>{{$honor->jam}}</th>
					<th class="numbers">{{$honor->confhonor->honor * $honor->jam}}</th>
					<th>
						<div align="center">
							<form action="{{route('pengeluaran.honor.delete', $honor->id)}}" method="post">
									{{ csrf_field() }}
									<a href="{{route('pengeluaran.honor.edit', $honor->id)}}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
									</a>
									<button type="submit" class="btn btn-sm btn-danger btn-icon icon-left" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS HONOR INI?')">
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