@extends('template')
@section('main')
<h2>Data Reservasi Pasien</h2>
<h5>Menu ini untuk melakukan reservasi pasien pada poli-poli yang bersangkutan</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('medis.reservasi.create')}}">
	<i class="entypo-user-add"></i>Tambah Reservasi
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
					<th width="6%">No Reservasi</th>
					<th>No Rm</th>
					<th>Nama Pasien</th>
					<th>Jenis Kelamin</th>
					<th>Jenis Pasien</th>
					<th>Nama Dokter</th>
					<th>Poli</th>
					<th>No Urut</th>
					<th>Status Reservasi</th>
					<th width="22%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($reservasi as $reservas)
				<tr>
					<th>{{$reservas->kd_res}}</th>
					<th>{{$reservas->pasien->no_rm}}</th>
					<th>{{$reservas->pasien->nama_pasien}}</th>
					<th>{{$reservas->pasien->jenis_kelamin}}</th>
					<th>{{$reservas->pasien->kategoripasien->nama_kategori}}</th>
					<th>{{$reservas->dokter->nama}}</th>
					<th>{{$reservas->poli->nama_poli}}</th>
					<th>{{$reservas->no_urut}}</th>
					<th>
						<center>
						@if($reservas->status_res == 'Belum')
						<span class="label label-danger">{{strtoupper($reservas->status_res)}}</span>
						@elseif($reservas->status_res == 'Batal')
						<span class="label label-warning">{{strtoupper($reservas->status_res)}}
						@else
						<span class="label label-success">{{strtoupper($reservas->status_res)}}
						@endif
						</center>
					</th>
					<th>
						<div align="center">
							<form action="#" method="post">
									{{ csrf_field() }}
									<a href="{{route('print.card', ['id'=>$reservas->id_res])}}" class="btn btn-sm btn-info btn-icon icon-left">
										<i class="entypo-print"></i>
										Cetak
									</a>
									@if($reservas->status_res == 'Batal')
									<a href="javascript:;" onclick="jQuery('#modal-7{{$reservas->id_res}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
									<i class="entypo-trash"></i>
									Hapus
									</a>
									@elseif($reservas->status_res == 'Belum')
									<a href="javascript:;" onclick="jQuery('#modal-8{{$reservas->id_res}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
									<i class="entypo-cancel"></i>
									Batal
									</a>
									@endif
							</form>
						</div>
					</th>
				</tr>
				@endforeach
			</tbody>
		</table>
		
		@foreach($reservasi as $reservas)
		<div class="modal fade" id="modal-8{{$reservas->id_res}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Batal Reservasi</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{ route('reservasi.cancel', ['id'=>$reservas->id_res]) }}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Membatalkan Reservasi {{$reservas->pasien->nama_pasien}}!</h4></center>
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


		@foreach($reservasi as $reservas)
		<div class="modal fade" id="modal-7{{$reservas->id_res}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Reservasi</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{ route('medis.reservasi.delete', ['id'=>$reservas->id_res]) }}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus Reservasi {{$reservas->pasien->nama_pasien}}!</h4></center>
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
@endsection