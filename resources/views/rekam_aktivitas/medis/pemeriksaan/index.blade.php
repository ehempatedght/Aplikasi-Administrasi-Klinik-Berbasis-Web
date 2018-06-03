@extends('template')
@section('main')
<h2>Data Pemeriksaan Pasien</h2>
<h5>Menu ini untuk melakukan transaksi pemeriksaan pasien</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('medis.pemeriksaan.create')}}">
	<i class="entypo-user-add"></i>Tambah Pemeriksaan
</a>
<br/>
<br/>
@if(session('message'))
    <div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
@endif
@if(session('message2'))
    <div class="alert alert-info">{{session('message2')}}<a href="{{route('penerimaan.biaya.create')}}"> KLIK DISINI</a> UNTUK MELAKUKAN BIAYA PENDAFTARAN!<button class="close" data-dismiss="alert" type="button">×</button></div>
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
					<th width="4%">No</th>
					<th>Tanggal</th>
					<th>No Faktur</th>
					<th>No Rm</th>
					<th>Nama Pasien</th>
					<th>Nama Pemeriksaan</th>
					<th>Nama Dokter</th>
					<th width="10%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($pemeriksaan as $pemeriksaan)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$pemeriksaan->tgl}}</td>
					<td>{{$pemeriksaan->no_faktur}}</td>
					<td>{{$pemeriksaan->reservasi->no_rm}}</td>
					<td>{{$pemeriksaan->reservasi->pasien->nama_pasien}}</td>
					<td>{{$pemeriksaan->nama_pemeriksaan}}</td>
					<td>{{$pemeriksaan->reservasi->dokter->nama}}</td>
					<td>
						<div align="center">
							<a href="{{route('medis.pemeriksaan.show', $pemeriksaan->id_pemeriksaan)}}" class="btn btn-sm btn-blue btn-icon icon-left">
								<i class="entypo-eye"></i>
								Detail
							</a>
							{{-- <a href="#" class="btn btn-sm btn-info btn-icon icon-left">
								<i class="entypo-print"></i>
								Cetak
							</a> --}}
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection