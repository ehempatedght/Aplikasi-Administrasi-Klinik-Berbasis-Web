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
    <script type="text/javascript">
					jQuery(document).ready(function($)
					{
						setTimeout(function()
						{
							var opts = {
								"closeButton": true,
								"debug": false,
								"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
								"toastClass": "black",
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							};
					
							toastr.success("{{session('message')}}", opts);
						}, 5);
					});
    			</script>
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
					<th>Total (Rp)</th>
					<th width="28%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($operasional as $operasional)
				<tr>
					<th><center>{{$no++}}</center></th>
					<th>{{ date('d M Y', strtotime($operasional->tgl)) }}</th>
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
									<a href="javascript:;" onclick="jQuery('#modal-7{{$operasional->tgl}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
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
	<?php $operasional = \App\Operasional::get(); ?>
	@foreach($operasional as $operasional)
			<div class="modal fade" id="modal-7{{$operasional->tgl}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Operasional</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('pengeluaran.operasional.delete', $operasional->tgl)}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus Operasional Tanggal {{ date('d M Y', strtotime($operasional->tgl)) }}!</h4></center>
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