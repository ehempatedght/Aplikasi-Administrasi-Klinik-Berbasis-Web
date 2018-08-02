@extends('template')
@section('main')
<style>
.select2-container .select2-choice {
    display: block!important;
    height: 30px!important;
    white-space: nowrap!important;
    line-height: 26px!important;
}
</style>
<h2>Tambah Pemeriksaan Pasien</h2>
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
				<form role="form" class="form-horizontal" action="{{ route('medis.pemeriksaan.save') }}" method="post">
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
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kategori</label>
						<div class="col-sm-5">
							<select class="form-control select2 kpemeriksaan" name="id_kpemeriksaan" id="id_kpemeriksaan" required data-placeholder="Pilih Kategori...">
								<option></option>
								<optgroup label="Pilih Kategori">
                    			@foreach ($k_pemeriksaan as $row)
                        			<option value="{{ $row->id_kategori }}">{{ $row->nama_kategori }}</option>
                    			@endforeach
                    			</optgroup>
                			</select>
						</div>
					</div>
					<div id="id_dpemeriksaan"></div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tarif</label>
						
						<div class="col-sm-5">
							<input type="text" required="required" class="form-control numbers tarif" id="tarif" name="tarif" placeholder="Rp. 0,00" value="0" onkeyup="kalkulasi_tarif()" />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Diskon</label>
						<div class="row">
							<div class="col-md-1">
								<input type="text" required="required" class="form-control" id="diskon_persen" placeholder="0%" name="disc" value="0" min="1" max="3" />
							</div>
							<div class="col-md-4">
								<input type="text" required="required numbers" class="form-control numbers" id="diskon" name="disc_result" placeholder="Rp. 0,00" value="0" readonly="" style="width: 96%;" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Total</label>
						
						<div class="col-sm-5">
							<input type="text" required="required" class="form-control numbers total" id="total" name="total" placeholder="Rp. 0,00" value="0" readonly/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jasa Dokter</label>
						<div class="row">
							<div class="col-md-1">
								<input type="text" required="required" class="form-control" id="jasa_dokter_persen" placeholder="0%" name="disc_dokter" value="0"/>
							</div>
							<div class="col-md-4">
								<input type="text" required="required numbers" class="form-control numbers" id="jasa_dokter_utama" name="disc_dokter_result" placeholder="Rp. 0,00" value="0" readonly="" style="width: 96%;"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Klinik</label>
						<div class="row">
							<div class="col-md-1">
								<input type="text" required="required" class="form-control numbers" id="klinik_persen" placeholder="0%" name="disc_klinik" readonly="">
							</div>
							<div class="col-md-4">
								<input type="text" required="required numbers" class="form-control numbers" id="klinik" name="disc_klinik_result" placeholder="Rp. 0,00" value="0" readonly="" style="width: 96%;" />
							</div>
						</div>
					</div>

					{{-- <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;SubTotal</label>
							<div class="col-sm-5">
								<input type="text" class="form-control numbers" id="subtotal" name="subtotal" value="0" required readonly />
							</div>
					</div> --}}

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
		$(".numbers").number(true,0);
		$("#klinik_persen").val(100);
		$('#id_kpemeriksaan').change(function() {
			var id_kd = $(this).val();
			var html = '';
			$("#id_dpemeriksaan").empty();
			if (id_kd == "1") {
				html += 
				'<div class="form-group">'+
				'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Pemeriksaan</label>'+
				'<div class="col-sm-5">'+
				'<select class="form-control dpemeriksaan" name="id_dpemeriksaan" id="id_pemeriksaan" required data-placeholder="Pilih Pemeriksaan...">'+
				'<option></option>'+
				'<optgroup label="Pilih Pemeriksaan">'+
                @foreach ($d_pemeriksaan as $row)
                @if($row->id_kategori == '1')
                '<option value="{{ $row->id_dpemeriksaan }}">{{ $row->nama_pemeriksaan }}</option>'+
                @endif
                @endforeach
                '</optgroup>'+
                '</select>'+
				'</div>'+
				'</div>';
				$("#id_dpemeriksaan").append(html);
				$("#id_pemeriksaan").select2();
				
			} else if(id_kd == "2") {
				html += 
				'<div class="form-group">'+
				'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tindakan</label>'+
				'<div class="col-sm-5">'+
				'<select class="form-control dpemeriksaan" name="id_dpemeriksaan" id="id_pemeriksaan" required data-placeholder="Pilih Pemeriksaan...">'+
				'<option></option>'+
				'<optgroup label="Pilih Pemeriksaan">'+
                @foreach ($d_pemeriksaan as $row)
                @if($row->id_kategori == '2')
                '<option value="{{ $row->id_dpemeriksaan }}">{{ $row->nama_pemeriksaan }}</option>'+
                @endif
                @endforeach
                '</optgroup>'+
                '</select>'+
				'</div>'+
				'</div>';
				$("#id_dpemeriksaan").append(html);
				$("#id_pemeriksaan").select2();
			} else if(id_kd == "3") {
				html += 
				'<div class="form-group">'+
				'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Pemeriksaan</label>'+
				'<div class="col-sm-5">'+
				'<select class="form-control dpemeriksaan" name="id_dpemeriksaan" id="id_pemeriksaan" required data-placeholder="Pilih Pemeriksaan...">'+
				'<option></option>'+
				'<optgroup label="Pilih Pemeriksaan">'+
                @foreach ($d_pemeriksaan as $row)
                @if($row->id_kategori == '3')
                '<option value="{{ $row->id_dpemeriksaan }}">{{ $row->nama_pemeriksaan }}</option>'+
                @endif
                @endforeach
                '</optgroup>'+
                '</select>'+
				'</div>'+
				'</div>';
				$("#id_dpemeriksaan").append(html);
				$("#id_pemeriksaan").select2();
			} else {
				html += 
				'<div class="form-group">'+
				'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tindakan</label>'+
				'<div class="col-sm-5">'+
				'<select class="form-control dpemeriksaan" name="id_dpemeriksaan" id="id_pemeriksaan" required data-placeholder="Pilih Tindakan...">'+
				'<option></option>'+
				'<optgroup label="Pilih Tindakan">'+
                @foreach ($d_pemeriksaan as $row)
                @if($row->id_kategori == '4')
                '<option value="{{ $row->id_dpemeriksaan }}">{{ $row->nama_pemeriksaan }}</option>'+
                @endif
                @endforeach
                '</optgroup>'+
                '</select>'+
				'</div>'+
				'</div>';
				$("#id_dpemeriksaan").append(html);
				$("#id_pemeriksaan").select2();
			}
		});
			// $.get(home_url + '/perekaman_aktivitas/medis/pemeriksaan/get_data/' + id_kd, function(data){
			// 	$.each(data, function(index, value) {
   //              $('#tarif').append($("<option></option>").attr("value", value.tarif).text(value.tarif));
   //              });
			// });

		

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
			$("#modal-5").modal('hide');
		});
	});

$("#diskon_persen").keyup(function () {
		var tarif = parseFloat($("#tarif").val());
		var diskon = parseFloat($("#diskon_persen").val());
		var total = tarif-((diskon/100)*tarif);
		var sisa = tarif-total;
		$("#total").val(total);
		$("#klinik").val(total);
		$("#diskon").val(sisa);
		if ($(this).val().trim().length===0) {
			$("#total").val(tarif);
		}
		if ($(this).val().trim().length===0) {
			$("#klinik").val(tarif);
		}
	});

	$("#jasa_dokter_persen").each(function () {
		$(this).keyup(function () {
			var total = parseFloat($("#total").val());
			var klinik = total;
			var jasa_dokter_persen = parseFloat($("#jasa_dokter_persen").val());
			var klinik_persen = 100;
			var sisa_klinik_persen =  klinik_persen - jasa_dokter_persen;
			var diskon = klinik - ((jasa_dokter_persen/100)*klinik);
			var sisa = klinik - diskon;
			if (!isNaN(sisa_klinik_persen)) {
				klinik_persen -= jasa_dokter_persen;
			}
			$("#jasa_dokter_utama").val(sisa);
			$("#klinik").val(diskon);
			$("#klinik_persen").val(klinik_persen);
			// $("#klinik_persen").val(sisa_klinik_persen);
			 if ($("#jasa_dokter_persen").val() == 100) {
			 	$("#jasa_dokter_utama").val(klinik);
			 } 
			 if ($(this).val().trim().length===0) {
			 	$("#klinik_persen").val(100);
			 } 

			 if ($(this).val().trim().length===0) {
			 	$("#klinik").val(total);
			 } 
		});
	});

	function kalkulasi_tarif() {
		// var tarif = 0;
		var tarif = parseFloat($("#tarif").val());
		var jasa_dokter_persen = parseFloat($("#jasa_dokter_persen").val());
		var klinik_persen = parseFloat($("#klinik_persen").val());
		var diskon_persen = parseFloat($("#diskon_persen").val());
		var result1 = parseFloat((tarif - (jasa_dokter_persen/100) * tarif));
		var result2 = parseFloat((tarif - (klinik_persen/100) * tarif));
		var result3 = parseFloat((tarif - (diskon_persen/100) * tarif));
		var sisa_diskon = tarif - result3;
		var sisa_diskon2 = tarif - result1;
		var klinik = parseFloat($("#klinik").val());
		$(".tarif").each(function () {
			$("#klinik, #total").val(tarif);
			$("#total, #klinik").val(result3);
			$("#diskon").val(sisa_diskon);
			$("#jasa_dokter_utama").val(sisa_diskon2);
		});
	}

	$('#diskon_persen, #jasa_dokter_persen').keyup(function(e) {
                var num = $(this).val();
                if (e.which!=8) {
                    num = sortNumber(num);
                   if(isNaN(num)||num<0 ||num>100) {
                       alert("Tidak boleh melebihi 100% !");
                       $(this).val(sortNumber(num.substr(0,num.length-1)));
                   }
                else
                    $(this).val(sortNumber(num));
                }
                else {
                    if(num < 2)
                        $(this).val("");
                    else
                        $(this).val(sortNumber(num.substr(0,num.length-1)));
                }
            });
            function sortNumber(n){
                var newNumber="";
                for(var i = 0; i<n.length; i++)
                    if(n[i] != "%")
                        newNumber += n[i];
                return newNumber;
            }
</script>
@endsection