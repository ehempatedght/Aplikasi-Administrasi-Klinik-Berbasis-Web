@extends('template')
@section('main')
<h2>Data Biaya Pendaftaran</h2>
<h5>Menu ini digunakan untuk menambahkan biaya pendaftaran</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('penerimaan.biaya.create')}}">
	<i class="entypo-user-add"></i>Tambah Biaya Pendafataran
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
					<th>No.RM</th>
					<th>Pasien</th>
					<th>Jumlah Biaya</th>
					<th width="24%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($biaya as $biaya)
				<tr>
					<th>{{$no++}}</th>
					<th>{{date('d M y', strtotime($biaya->tgl))}}</th>
					<th>{{$biaya->no_pend}}</th>
					<th>{{$biaya->pasien->nama_pasien}}</th>
					<th class="numbers">{{$biaya->jumlah}}</th>
					<th>
						<div align="center">
							<form action="{{route('penerimaan.biaya.delete', $biaya->id)}}" method="post">
									{{ csrf_field() }}
									<a href="{{route('penerimaan.biaya.edit', $biaya->id)}}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
									</a>
									<button type="submit" class="btn btn-sm btn-danger btn-icon icon-left" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS BIAYA PENDAFTARAN INI?')">
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