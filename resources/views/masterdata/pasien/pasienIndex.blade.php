@extends('template')
@section('main')
<h2>Data Pasien</h2>
<h5>Menu ini digunakan untuk melihat daftar pasien</h5><br/>
{{-- <a class="btn btn-blue btn-sm btn-icon icon-left" href="{{ route('masterdata.pasien.datapasien.create') }}">
	<i class="entypo-user-add"></i>Registrasi Pasien
</a> --}}
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
@if(session('message2'))
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
					
							toastr.error("{{session('message2')}}", opts);
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
					<th>Kategori</th>
					<th>Nama Pasien</th>
					<th>Alamat</th>
					<th width="27%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($pasiens as $pasien)
				<tr>
					<th><center>{{$no++}}</center></th>
					<th>
						<center>
							<span class="label label-primary">{{strtoupper($pasien->kategoripasien->nama_kategori)}}</span>
						</center>
					</th>
					<th>{{$pasien->nama_pasien}}</th>
					<th>{{$pasien->alamat}}</th>
					<th>
						<div align="center">
							<form action="{{route('masterdata.pasien.datapasien.hapus', ['id' => $pasien->id])}}" method="post">
								{{ csrf_field() }}
									<a href="{{route('masterdata.pasien.datapasien.ubah', $pasien->id)}}" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
									</a>
									<a href="{{route('masterdata.pasien.datapasien.lihat', $pasien->id)}}" class="btn btn-sm btn-blue btn-icon icon-left">
										<i class="entypo-eye"></i>
										Lihat
									</a>
									<a href="javascript:;" onclick="jQuery('#modal-8{{$pasien->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
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

		@foreach($pasiens as $pasien)
			<div class="modal fade" id="modal-8{{$pasien->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Pasien</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('masterdata.pasien.datapasien.hapus', ['id' => $pasien->id])}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus Nama Pasien {{$pasien->nama_pasien}}!</h4></center>
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
</div>
<script>
	$(document).ready(function() {
		$('input').on('keydown', function(event) {
		        if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
		           var $t = $(this);
		           event.preventDefault();
		           var char = String.fromCharCode(event.keyCode);
		           $t.val(char + $t.val().slice(this.selectionEnd));
		           this.setSelectionRange(1,1);
		        }
	    });
	});
</script>
@endsection