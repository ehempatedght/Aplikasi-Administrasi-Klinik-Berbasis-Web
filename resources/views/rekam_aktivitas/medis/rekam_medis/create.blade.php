@extends('template')
@section('main')
<h2>Tambah Rekam Medis Pasien</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('rekam_medis.index') }}"><i class="entypo-home"> Daftar Rekam Medis</i></a>
	</li>
	<li class="active">
		<strong>Tambah Rekam Medis Pasien</strong>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('rekam_medis.save') }}" method="post">
					{{ csrf_field() }}
					
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No. RM</label>
							<input type="hidden" name="res_id" id="res_id">
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
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tgl Reservasi</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="tgl_reservasi" name="tgl" placeholder="tanggal reservasi" value="{{ old('tgl_reservasi') }}" data-format="dd MM yyyy" required readonly/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Poli</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="poli" name="poli" placeholder="poli" value="{{ old('poli') }}" required readonly/>
							</div>
						</div>
					
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Dokter</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="dokter" name="dokter" placeholder="nama dokter" value="{{ old('dokter') }}" required readonly />
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Diagnosa</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="rmdiagnosa" name="rmdiagnosa" placeholder="diagnosa penyakit" value="{{ old('rmdiagnosa') }}" required/>
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Keluhan</label>
							<div class="col-sm-5">
								<textarea class="form-control" id="rmkeluhan" name="rmkeluhan" placeholder="keluhan"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Pemeriksaan</label>
							<div class="col-sm-5">
								<textarea class="form-control" id="rmpemeriksaan" name="rmpemeriksaan" placeholder="pemeriksaan"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Terapi</label>
							<div class="col-sm-5">
								<textarea class="form-control" id="rmterapi" name="rmterapi" placeholder="terapi"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Alergi Obat</label>
							<div class="col-sm-5">
								<textarea class="form-control" id="rmalergiobat" name="rmalergiobat" placeholder="alergi obat"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Resep</label>
							<div class="col-sm-5">
								<textarea class="form-control" id="rmresep" name="rmresep" placeholder="resep"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kesimpulan</label>
							<div class="col-sm-5">
								<textarea class="form-control" id="rmkesimpulan" name="rmkesimpulan" placeholder="kesimpulan"></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kondisi Pasien Keluar</label>
									<div class="col-sm-5">
										<select name="kondisi_pasien" class="form-control select2" id="kondisi_pasien" required data-placeholder="Kondisi Pasien Keluar...">
											<option></option>
											<optgroup label="Pilih Kondisi">
												<option value="SEMBUH">SEMBUH</option>
												<option value="DALAM PROSES PENYEMBUHAN">DALAM PROSES PENYEMBUHAN</option>
												<option value="MENETAP/MEMBURUK">MENETAP/MEMBURUK</option>
												<option value="MENINGGAL">MENINGGAL</option>
												<option value="CACAT">CACAT</option>
											</optgroup>
										</select>
									</div>
						</div>

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('rekam_medis.index') }}" class="btn btn-red btn-icon icon-left">
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
					<h4 class="modal-title">Pencarian Data Reservasi Pasien</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered datatable" id="table-1">
						<thead>
 							<tr>
								<th width="1%">No</th>
								<th>No. RM</th>
								<th>Kategori</th>
								<th>Nama Pasien</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							@foreach($reservasi as $reservasi)
							@if($reservasi->status_res == 'Batal')
							<tr hidden>
								<td><center>{{$no++}}</center></td>
								<td>{{$reservasi->no_rm}}</td>
								<td>{{$reservasi->pasien->kategoripasien->nama_kategori}}</td>
								<td>{{$reservasi->pasien->nama_pasien}}</td>
								<td align="center">
									<button data-id="{{$reservasi->id_res}}" data-name="{{$reservasi->pasien->nama_pasien}}" data-jk="{{$reservasi->pasien->jenis_kelamin}}" data-nopend="{{$reservasi->no_rm}}" data-jnsp="{{$reservasi->pasien->kategoripasien->nama_kategori}}" data-tgl="{{date('d M Y', strtotime($reservasi->created_at)) }}" data-nors="{{$reservasi->kd_res}}" data-poli="{{$reservasi->poli->nama_poli}}" data-dokter="{{$reservasi->dokter->nama}}" class="btn btn-green btn-sm btn-icon icon-left addPas">
										<i class="entypo-check"></i>
										Pilih
									</button>
								</td>
							</tr>
							@else
							<tr>
								<td><center>{{$no++}}</center></td>
								<td>{{$reservasi->no_rm}}</td>
								<td>{{$reservasi->pasien->kategoripasien->nama_kategori}}</td>
								<td>{{$reservasi->pasien->nama_pasien}}</td>
								<td align="center">
									<button data-id="{{$reservasi->id_res}}" data-name="{{$reservasi->pasien->nama_pasien}}" data-jk="{{$reservasi->pasien->jenis_kelamin}}" data-nopend="{{$reservasi->no_rm}}" data-jnsp="{{$reservasi->pasien->kategoripasien->nama_kategori}}" data-tgl="{{date('d M Y', strtotime($reservasi->created_at)) }}" data-nors="{{$reservasi->kd_res}}" data-poli="{{$reservasi->poli->nama_poli}}" data-dokter="{{$reservasi->dokter->nama}}" class="btn btn-green btn-sm btn-icon icon-left addPas">
										<i class="entypo-check"></i>
										Pilih
									</button>
								</td>
							</tr>
							@endif
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
			$("#res_id").val(id);
			$("#no_rm").val(nopend);
			$("#pasien").val(nama);
			$("#kelamin").val(j_kelamin);
			$("#jenis_pasien").val(j_pasien);
			$("#tgl_reservasi").val(tgl);
			$("#no_reservasi").val(nors);
			$("#poli").val(poli);
			$("#dokter").val(dokter);
			$("#modal-5").modal('hide');
		});
	});
</script>
@endsection