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
					<th>Kategori</th>
					<th>Nama</th>
					<th>Honor/Jam</th>
					<th>Jumlah Jam</th>
					<th>Total</th>
					<th width="20%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($honor as $honor)
				<tr>
					<th><center>{{$no++}}</center></th>
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
									
							<a href="javascript:;" onclick="jQuery('#modal-7{{$honor->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
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
	<?php $honor = \App\Honor::get(); ?>
	@foreach($honor as $honor)
			<div class="modal fade" id="modal-7{{$honor->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Honor</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('pengeluaran.honor.delete', $honor->id)}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus Honor {{$honor->petugas->nama}}!</h4></center>
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