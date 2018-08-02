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
					<td><center>{{$no++}}</center></td>
					<td>{{$pemeriksaan->k_pemeriksaan->nama_kategori}}</td>
					<td>{{$pemeriksaan->tgl}}</td>
					<td>{{$pemeriksaan->no_faktur}}</td>
					<td>{{$pemeriksaan->reservasi->no_rm}}</td>
					<td>{{$pemeriksaan->reservasi->pasien->nama_pasien}}</td>
					<td>{{$pemeriksaan->data_pemeriksaan->nama_pemeriksaan}}</td>
					<td>{{$pemeriksaan->reservasi->dokter->nama}}</td>
					<td>
						<div align="center">
							<a href="{{route('medis.pemeriksaan.show', $pemeriksaan->id_pemeriksaan)}}" class="btn btn-sm btn-blue btn-icon icon-left">
								<i class="entypo-eye"></i>
								Detail
							</a>
							{{-- @if($pemeriksaan->status_bayar == '0')
							<a href="javascript:;" onclick="jQuery('#modal-8{{$pemeriksaan->id_pemeriksaan}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-info btn-icon icon-left">
								<i class="fa fa-money"></i>
								Bayar
							</a>
							@else
							<div class="btn btn-sm btn-green btn-icon icon-left">
								<i class="entypo-check"></i>
								Sudah Bayar
							</div>
							@endif --}}
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
		<?php $pemeriksaan = \App\Pemeriksaan::get(); ?>
		@foreach($pemeriksaan as $pemeriksaan)
			<div class="modal fade" id="modal-8{{$pemeriksaan->id_pemeriksaan}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Informasi Pembayaran</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('medis.pemeriksaan.bayar', ['id'=>$pemeriksaan->id_pemeriksaan])}}" method="post" class="form-horizontal form-groups-bordered">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Grand Total</label>
													<div class="col-sm-5">
														<input type="text" class="form-control numbers" name="grand_total" id="grand_total" value="{{$pemeriksaan->total}}" readonly>
													</div>
												</div>
											</div>
										</div>
										{{-- <br/> --}}
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Bayar</label>
													<div class="col-sm-5">
														<input type="text" id="status_bayar" class="form-control numbers" name="status_bayar" value="0">
													</div>
												</div>
											</div>
										</div>
										{{-- <br/> --}}
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kembali</label>
													<div class="col-sm-5">
														<input type="text" class="form-control numbers" id="kembali" name="kembali" value="0" readonly="">
													</div>
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
							<i class="entypo-check"></i>
							Bayar</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
	    		$("#status_bayar"+$pemeriksaan->id_pemeriksaan).keyup(function(){
		        var g_total = $("#grand_total").val();
				var bayar = $("#status_bayar").val();
				var kembali = bayar - g_total;
				$("#kembali").val(kembali);
			    });
			});
			</script>
			@endforeach
	</div>
</div>
@endsection