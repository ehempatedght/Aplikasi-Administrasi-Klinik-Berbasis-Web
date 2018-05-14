@extends('template')
@section('main')
<h2>Tambah Pemeriksaan Dokter</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('medis.pemeriksaan.index') }}"><i class="entypo-home"> Daftar Pemeriksaan</i></a>
	</li>
	<li class="active">
		<strong>Tambah Pemeriksaan Pasien</strong>
	</li>
</ol>
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-body">
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('medis.pemeriksaan.save') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" name="tgl" data-format="dd MM yyyy" placeholder="tanggal" required="">
										
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No. Faktur</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_faktur" name="no_faktur" placeholder="no faktur" value="{{$noFaktur}}" required readonly />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No. RM</label>
						<input type="hidden" name="reservasi_id" id="reservasi_id">
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="nomor rm" value="{{ old('no_rm') }}" required readonly />
						</div>
						<a class="btn btn-white" href="javascript:;" onclick="jQuery('#modal-5').modal('show', {backdrop: 'static'}); ">	
	                       	<i class="entypo-search" ></i>        
						</a> 
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Pasien</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="pasien" name="pasien" placeholder="nama pasien" value="{{ old('pasien') }}" required readonly/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jenis Pasien</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="jenis_pasien" name="jenis_pasien" placeholder="jenis pasien" value="{{ old('jenis_pasien') }}" required readonly/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jenis Kelamin</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="kelamin" name="kelamin" placeholder="jenis kelamin" value="{{ old('kelamin') }}" required readonly/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal Reservasi</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="tgl_reservasi" name="tgl_reservasi" placeholder="tanggal reservasi" value="{{ old('tgl_reservasi') }}" data-format="dd MM yyyy" required readonly/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No. Reservasi</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_reservasi" name="no_reservasi" placeholder="nomor reservasi" value="{{ old('no_reservasi') }}" required readonly/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Poli</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="poli" name="poli" placeholder="poli" value="{{ old('poli') }}" required readonly/>
						</div>
					</div>
				
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Dokter/Bidan</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="dokter" name="dokter" placeholder="nama dokter" value="{{ old('dokter') }}" required readonly />
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Pemeriksaan</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="pemeriksaan" name="nama_pemeriksaan" placeholder="nama pemeriksaan" value="{{ old('nama_pemeriksaan') }}" required/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tarif</label>
						<div class="col-sm-5">
							<input type="text" class="form-control numbers" id="tarif" name="tarif" value="0" required/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah</label>
						<div class="row">
							<div class="col-sm-1">
								<input type="text" class="form-control" id="jml" name="jml" value="1" required/>
							</div>
							<label for="field-1" class="col-sm-1 control-label">Total</label>
							<div class="col-xs-3">
								<input type="text" class="form-control numbers" id="total" name="total" value="0" required readonly />
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Diskon</label>
						<div class="row">
							<div class="col-sm-1">
								<input type="text" class="form-control" id="disc" name="disc" value="0" required/>
							</div>
							<label for="field-1" class="col-sm-1 control-label">%</label>
							<div class="col-xs-3">
								<input type="text" class="form-control numbers" id="disc_result" name="disc_result" value="0" required readonly />
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;SubTotal</label>
							<div class="col-sm-5">
								<input type="text" class="form-control numbers" id="subtotal" name="subtotal" value="0" required readonly />
							</div>
					</div>

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('medis.pemeriksaan.index') }}" class="btn btn-red btn-icon icon-left">
								Kembali
							<i class="entypo-cancel"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-5">
		<div class="modal-dialog" style="width: 800px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pilih Pasien</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered datatable" id="table-1">
						<thead>
 							<tr>
								<th>No</th>
								<th>No. RM</th>
								<th>Kategori</th>
								<th>Nama Pasien</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							@foreach($reservasi as $reservasi)
							<tr>
								<td>{{$no++}}</td>
								<td>{{$reservasi->no_rm}}</td>
								<td>{{$reservasi->pasien->kategoripasien->nama_kategori}}</td>
								<td>{{$reservasi->pasien->nama_pasien}}</td>
								<td align="center">
									<button data-id="{{$reservasi->id_res}}" data-name="{{$reservasi->pasien->nama_pasien}}" data-jk="{{$reservasi->pasien->jenis_kelamin}}" data-nopend="{{$reservasi->no_rm}}" data-jnsp="{{$reservasi->pasien->kategoripasien->nama_kategori}}" data-tgl="{{date('d M Y', strtotime($reservasi->created_at)) }}" data-nors="{{$reservasi->kd_res}}" data-poli="{{$reservasi->poli->nama_poli}}" data-dokter="{{$reservasi->dokter->nama}}" data-tarif="{{$reservasi->pasien->biayaPendaftaran[0]->jumlah}}" class="btn btn-green btn-sm btn-icon icon-left addPas">
										<i class="entypo-check"></i>
										Pilih
									</button>
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
<script type="text/javascript">

	$(document).ready(function () {

		$("#dokter_id").change(function(){
			var nama = $(this).find('option:selected').text();
			var id = $(this).val();
			$.get(home_url + '/perekaman_aktivitas/medis/pendaftaran/search_spesialisasi/' + id, function(data) {
				$('#spesialisasi').val(data);
			});
		});

		$("#jml").keyup(function() {
			var tarif = $("#tarif").val();
			var jml = $("#jml").val();
			var hasil = tarif * jml;
			$("#total").val(hasil);
			$("#subtotal").val(hasil);
		});

		$('.datatable').DataTable({
	      "oLanguage": {
	       "sSearch": "Search:",
	       "oPaginate": {
	         "sPrevious": "Previous &emsp;",
	         "sNext": "Next"
					 }
				}
		});

		$('.datatable').on('click','.addPas', function(e){
			var nama = $(this).data('name');
			var id = $(this).data('id');
			var nopend = $(this).data('nopend');
			var j_kelamin = $(this).data('jk');
			var j_pasien = $(this).data('jnsp');
			var tgl = $(this).data('tgl');
			var nors = $(this).data('nors');
			var poli = $(this).data('poli');
			var dokter = $(this).data('dokter');
			var tarif = $(this).data('tarif');
			$("#reservasi_id").val(id);
			$("#no_rm").val(nopend);
			$("#pasien").val(nama);
			$("#kelamin").val(j_kelamin);
			$("#jenis_pasien").val(j_pasien);
			$("#tgl_reservasi").val(tgl);
			$("#no_reservasi").val(nors);
			$("#poli").val(poli);
			$("#dokter").val(dokter);
			$("#tarif").val(tarif);
			$("#subtotal").val(tarif);
			$("#total").val(tarif);
			$("#modal-5").modal('hide');
		});

	});
</script>
@endsection