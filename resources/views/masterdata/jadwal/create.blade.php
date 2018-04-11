@extends('template')

@section('main')
<h2>Lihat Petugas Medis</h2>
<br/>
@if(count($errors) > 0) 
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>
			{{$error}}
		</li>
		@endforeach
	</ul>
</div>
@endif
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
						});
					});

					 jQuery( document ).ready( function( $ ) {
					 	var $table4 = jQuery( "#table-2" );
					 	$table4.DataTable( {
					 		dom: 'Bfrtip',
					 		buttons: [
					 			'copyHtml5',
					 			'excelHtml5',
					 			'csvHtml5',
					 			'pdfHtml5'
					 		]
					 	});
					 });

					 jQuery( document ).ready( function( $ ) {
					 	var $table4 = jQuery( "#table-3" );
					 	$table4.DataTable( {
					 		dom: 'Bfrtip',
					 		buttons: [
					 			'copyHtml5',
					 			'excelHtml5',
					 			'csvHtml5',
					 			'pdfHtml5'
					 		]
					 	});
					 });

					 jQuery( document ).ready( function( $ ) {
					 	var $table4 = jQuery( "#table-4" );
					 	$table4.DataTable( {
					 		dom: 'Bfrtip',
					 		buttons: [
					 			'copyHtml5',
					 			'excelHtml5',
					 			'csvHtml5',
					 			'pdfHtml5'
					 		]
					 	});
					 });

					 jQuery( document ).ready( function( $ ) {
					 	var $table4 = jQuery( "#table-5" );
					 	$table4.DataTable( {
					 		dom: 'Bfrtip',
					 		buttons: [
					 			'copyHtml5',
					 			'excelHtml5',
					 			'csvHtml5',
					 			'pdfHtml5'
					 		]
					 	});
					 });

					 jQuery( document ).ready( function( $ ) {
					 	var $table4 = jQuery( "#table-6" );
					 	$table4.DataTable( {
					 		dom: 'Bfrtip',
					 		buttons: [
					 			'copyHtml5',
					 			'excelHtml5',
					 			'csvHtml5',
					 			'pdfHtml5'
					 		]
					 	});
					 });

					 jQuery( document ).ready( function( $ ) {
					 	var $table4 = jQuery( "#table-7" );
					 	$table4.DataTable( {
					 		dom: 'Bfrtip',
					 		buttons: [
					 			'copyHtml5',
					 			'excelHtml5',
					 			'csvHtml5',
					 			'pdfHtml5'
					 		]
					 	});
					 });

					 jQuery( document ).ready( function( $ ) {
					 	var $table4 = jQuery( "#table-8" );
					 	$table4.DataTable( {
					 		dom: 'Bfrtip',
					 		buttons: [
					 			'copyHtml5',
					 			'excelHtml5',
					 			'csvHtml5',
					 			'pdfHtml5'
					 		]
					 	});
					 });

					 jQuery( document ).ready( function( $ ) {
					 	var $table4 = jQuery( "#table-9" );
					 	$table4.DataTable( {
					 		dom: 'Bfrtip',
					 		buttons: [
					 			'copyHtml5',
					 			'excelHtml5',
					 			'csvHtml5',
					 			'pdfHtml5'
					 		]
					 	});
					 });
</script>
<div class="row">
	<div class="col-md-12">
		<hr />
		<ol class="breadcrumb bc-3" >
			<li>
				<a href="{{route('jadwal.jadwal')}}"><i class="fa fa-home"></i>Lihat Jadwal</a>
			</li>
			<li class="active">
				<strong>Lihat Petugas Medis</strong>
			</li>
		</ol>
		<div class="panel panel-primary" data-collapsed="0">
			
			<div class="panel-heading">
				<div class="panel-title">
					Form Inputs
				</div>
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>

			<div class="panel-body">
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('jadwal.insert') }}" method="POST">
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="nama" name="nama" placeholder="nama lengkap" data-validate="required" data-message-required="Wajib diisi." value="" disabled />
						</div>
						<a class="btn btn-white btn-sm btn-icon icon-left" href="javascript:;" onclick="jQuery('#modal-4').modal('show', {backdrop: 'static'});">
								<i class="entypo-search" ></i>Pilih Petugas
						</a>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kategori</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="kategori" name="kategori" placeholder="kategori" data-validate="required" data-message-required="Wajib diisi." value="" disabled/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Alamat</label>
						
						<div class="col-sm-5">
							<textarea type="textarea" class="form-control" id="alamat" name="alamat" placeholder="alamat" data-validate="required" data-message-required="Wajib diisi." disabled></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;" disabled>&emsp;Kota</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="kota" name="kota" placeholder="kota" data-validate="required" data-message-required="Wajib diisi." value="" disabled/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nomor HP</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="nomor hp" data-mask="(9999) 9999-9999" data-validate="required" data-message-required="Wajib diisi." value="" disabled/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nomor Telepon</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="nomor telepon" data-mask="(9999) 9999-9999" data-validate="required" data-message-required="Wajib diisi." value="" disabled/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Alamat Email</label>
						
						<div class="col-sm-5">
							<input type="email" class="form-control" id="alamat_email" name="alamat_email" placeholder="alamat email" data-validate="required" data-message-required="Wajib diisi." value="" onkeyup="this.value = this.value.toLowerCase()" disabled/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal Mulai Praktek</label>
						
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" name="tgl_mulai_praktek" id="tgl_mulai_praktek" placeholder="tgl mulai praktek" value="" disabled>
								
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Hari Praktek</label>
						<div class="row">
							<div class="col-md-2">
								<b-checkbox-group>
									@foreach($days as $day)
										<div class="checkbox checkbox-replace color-green" style="margin-bottom: 15px;">
											<b-checkbox v-model="daysSelected" :native-value="{{$day->id}}" name="days[]">{{$day->days}}</b-checkbox>
										</div>
									@endforeach
								</b-checkbox-group>
							</div>
							<div class="col-md-2" style="margin-top: 10px;">
								<div class="form-control-wrapper">
									<input type="text" id="time" class="form-control floating-label" placeholder="jam mulai" name="senin1">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time2" class="form-control floating-label" placeholder="jam mulai" name="selasa1">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time3" class="form-control floating-label" placeholder="jam mulai" name="rabu1">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time4" class="form-control floating-label" placeholder="jam mulai" name="kamis1">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time5" class="form-control floating-label" placeholder="jam mulai" name="jumat1">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time6" class="form-control floating-label" placeholder="jam mulai" name="sabtu1">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time7" class="form-control floating-label" placeholder="jam mulai" name="minggu1">
								</div>
								<br/>
							</div>
							<div class="col-md-2" style="margin-top: 10px;">
								<div class="form-control-wrapper">
									<input type="text" id="time8" class="form-control floating-label" placeholder="jam selesai" name="senin2">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time9" class="form-control floating-label" placeholder="jam selesai" name="selasa2">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time10" class="form-control floating-label" placeholder="jam selesai" name="rabu2">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time11" class="form-control floating-label" placeholder="jam selesai" name="kamis2">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time12" class="form-control floating-label" placeholder="jam selesai" name="jumat2">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time13" class="form-control floating-label" placeholder="jam selesai" name="sabtu2">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time14" class="form-control floating-label" placeholder="jam selesai" name="minggu2">
								</div>
								<br/>
							</div>
						</div>
					</div>
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{route('jadwal.jadwal')}}"><button type="submit" name="cancel" class="btn btn-red btn-icon icon-left col-left">
						Batal
						<i class="entypo-cancel"></i>
						</button></a>
					</div>
				</form>

				<div class="modal fade" id="modal-4">
					<div class="modal-dialog">
						<div class="modal-content">
							
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Pilih Petugas Medis</h4>
							</div>
							
							<div class="modal-body">
								<div class="row">
									<div class="col-md-12">
										<form class="form-petugas" name="formp">
											<table class="table table-bordered datatable" id="table-3">
												<thead>
													<tr>
														<th>No</th>
														<th>Kategori</th>
														<th>Nama</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php $no=1; ?>
													@foreach($petugass as $petugas)
													<tr>
														<th>{{$no++}}</th>
														<td>{{$petugas->category->nama_kategori}}</td>
														<td>{{$petugas->nama}}</td>
														<td>
															<button data-id="{{$petugas->id}}"  name="addprobtn" data-dismiss="modal" class="btn btn-blue btn-icon icon-left col-left add">
																<i class="entypo-check"></i>
																Pilih
															</button>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('js/bootstrap-material-datetimepicker.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".datatable").on('click','.add', function(e){
			e.preventDefault();
			var id = $(this).data('id');

			$.get(home_url + '/petugas/cari_petugas/'+id, function (data){
				$("#nama").val(data.nama);
				$("#kategori").val(data.nama_kategori);
				$("#alamat").val(data.alamat);
				$("#kota").val(data.kota);
				$("#no_hp").val(data.no_hp);
				$("#no_telp").val(data.no_telp);
				$("#alamat_email").val(data.alamat_email);
				$("#tgl_mulai_praktek").val(data.tgl_mulai_praktek);
			});
		});


		$('#time').timepicker();
		$('#time2').timepicker();
		$('#time3').timepicker();
		$('#time4').timepicker();
		$('#time5').timepicker();
		$('#time6').timepicker();
		$('#time7').timepicker();
		$('#time8').timepicker();
		$('#time9').timepicker();
		$('#time10').timepicker();
		$('#time11').timepicker();
		$('#time12').timepicker();
		$('#time13').timepicker();
		$('#time14').timepicker();
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

@section('scripts')
  <script>
  var app = new Vue({
    el: '#app',
    data: {
      daysSelected: []
    }
  });
  </script>
@endsection