@extends('template')
@section('main')
<h2>Data Pembelian</h2>
<h5>Menu ini digunakan untuk menambahkan pembelian</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('pengeluaran.pembelian.create')}}">
	<i class="entypo-user-add"></i>Tambah Pembelian
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
					<th>Vendor</th>
					<th>Obat</th>
					<th>Jumlah</th>
					<th width="24%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($data as $data)
				<tr>
					<th>{{$no++}}</th>
					<th>{{ date('d M Y', strtotime($data->tgl)) }}</th>
					<th>{{$data->vendor->nama_vendor}}</th>
					<th>{{$data->jenisobat->nama_obat}}</th>
					<th>{{$data->jumlah}}</th>
					<th>
						<div align="center">
							<form action="{{route('pengeluaran.pembelian.delete', $data->id)}}" method="post">
									{{ csrf_field() }}
									<a href="{{route('pengeluaran.pembelian.edit', $data->id)}}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
									</a>
									{{-- <a href="{{route('pengeluaran.pembelian.show', $data->id)}}" class="btn btn-sm btn-info btn-icon icon-left">
										<i class="entypo-eye"></i>
										Lihat
									</a> --}}
									<a href="javascript:;" onclick="jQuery('#modal-7{{$data->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
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
	<?php $data = \App\Pembelian::get(); ?>
	@foreach($data as $data)
			<div class="modal fade" id="modal-7{{$data->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Pembelian</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('pengeluaran.pembelian.delete', $data->id)}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus Pembelian Ini!</h4></center>
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