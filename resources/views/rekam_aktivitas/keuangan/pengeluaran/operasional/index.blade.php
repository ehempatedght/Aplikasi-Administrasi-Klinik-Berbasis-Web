@extends('template')
@section('main')
<h2>Data Operasional</h2>
<h5>Menu ini digunakan untuk menambahkan operasional</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('pengeluaran.operasional.create')}}">
	<i class="entypo-user-add"></i>Tambah Operasional
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
					<th>Total (Rp)</th>
					<th width="24%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($operasional as $operasional)
				<tr>
					<th>{{$no++}}</th>
					<th>{{ date('d M y', strtotime($operasional->tgl)) }}</th>
					<th class="numbers">{{$operasional->total}}</th>
					<th>
						<div align="center">
							<form action="{{route('pengeluaran.operasional.delete', $operasional->tgl)}}" method="post">
									{{ csrf_field() }}
									<a href="{{route('pengeluaran.operasional.edit', $operasional->tgl)}}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
									</a>
									<a href="{{route('pengeluaran.operasional.show', $operasional->tgl)}}" class="btn btn-sm btn-info btn-icon icon-left">
										<i class="entypo-eye"></i>
										Lihat
									</a>
									<button type="submit" class="btn btn-sm btn-danger btn-icon icon-left" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS OPERASIONAL INI?')">
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