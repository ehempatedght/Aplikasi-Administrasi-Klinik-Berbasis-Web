@extends('template')
@section('main')
<h2 align="center">Daftar Transaksi Keuangan</h2>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('transaksi.create')}}">
	<i class="entypo-user-add" ></i>Tambah Transaksi
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
		<div class="panel panel-primary" id="charts_env">
			<div class="panel-body">
				<div class="tab-content">
					<div class="tab-pane active" id="aktiva">
						<table class="table table-bordered datatable" id="table-1">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>Nama Akun</th>
									<th>Keterangan</th>
									<th>Nominal</th>
									<th>Jumlah</th>
									<th>Pemasukkan</th>
									<th>Pengeluaran</th>
									<th width="10%">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($transaksi as $transaksi)
								<tr>
									<td>{{date('d M Y', strtotime($transaksi->tgl))}}</td>
									<td>{{$transaksi->akun->nama_akun}}</td>
									<td>{{$transaksi->keterangan}}</td>
									<td class="numbers">{{$transaksi->nominal}}</td>
									<td>{{$transaksi->jumlah}}</td>
									<td class="numbers">{{$transaksi->pemasukan}}</td>
									<td class="numbers">{{$transaksi->pengeluaran}}</td>
									<td>
										<div align="center">
											<a href="javascript:;" onclick="jQuery('#modal-7{{$transaksi->id_transaksi}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
												<i class="entypo-trash"></i>
												Hapus
											</a>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $trans = \App\Transaksi::all(); ?>

	@foreach($trans as $transaksi)
	<div class="modal fade" id="modal-7{{$transaksi->id_transaksi}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Transaksi</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('transaksi.delete', ['id'=>$transaksi->id_transaksi])}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus Transaksi {{$transaksi->keterangan}}!</h4></center>
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