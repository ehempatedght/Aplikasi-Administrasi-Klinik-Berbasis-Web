@extends('template')
@section('main')
<h2>Tambah Data Pemeriksaan</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="#"><i class="entypo-home"> Daftar Pemeriksaan</i></a>
	</li>
	<li class="active">
		<strong>Tambah Data Pemeriksaan</strong>
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
				<form role="form" class="form-horizontal" method="post">
					{{ csrf_field() }}
					

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Pemeriksaan</label>
						
						<div class="col-sm-5">
							<input type="text" required="required" class="form-control" id="nama_pemeriksaan" name="nama_pemeriksaan" placeholder="nama pemeriksaan" value="{{ old('nama_pemeriksaan') }}"/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tarif</label>
						
						<div class="col-sm-4">
							<input type="text" required="required" class="form-control numbers tarif" id="tarif" name="tarif" placeholder="Rp. 0,00" value="{{ old('tarif') }}" onkeyup="kalkulasi_tarif()" />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Diskon</label>
						<div class="row">
							<div class="col-md-1">
								<input type="text" required="required" class="form-control" id="diskon_persen" placeholder="0%" name="diskon_persen" value="{{ old('diskon_persen') }}" min="1" max="3" />
							</div>
							<div class="col-md-3">
								<input type="text" required="required numbers" class="form-control numbers" id="diskon" name="diskon" placeholder="Rp. 0,00" value="{{ old('diskon') }}" readonly="" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Total</label>
						
						<div class="col-sm-4">
							<input type="text" required="required" class="form-control numbers total" id="total" name="total" placeholder="Rp. 0,00" value="{{ old('total') }}" readonly/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jasa Dokter Utama</label>
						<div class="row">
							<div class="col-md-1">
								<input type="text" required="required" class="form-control" id="jasa_dokter_persen" placeholder="0%" name="jasa_dokter_persen" value="{{ old('jasa_dokter_persen') }}"/>
							</div>
							<div class="col-md-3">
								<input type="text" required="required numbers" class="form-control numbers" id="jasa_dokter_utama" name="jasa_dokter_utama" placeholder="Rp. 0,00" value="{{ old('jasa_dokter_utama') }}" readonly="" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jasa Asisten</label>
						<div class="row">
							<div class="col-md-1">
								<input type="text" required="required" class="form-control" id="jasa_asisten_persen" placeholder="0%" name="jasa_asisten_persen" value="{{ old('jasa_asisten_persen') }}"/>
							</div>
							<div class="col-md-3">
								<input type="text" required="required numbers" class="form-control numbers" id="jasa_asisten" name="jasa_asisten" placeholder="Rp. 0,00" value="{{ old('jasa_asisten') }}" readonly="" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jasa Perawat 1</label>
						<div class="row">
							<div class="col-md-1">
								<input type="text" required="required" class="form-control" id="jasa_perawat1_persen" placeholder="0%" name="jasa_perawat1_persen" value="{{ old('jasa_perawat1_persen') }}"/>
							</div>
							<div class="col-md-3">
								<input type="text" required="required numbers" class="form-control numbers" id="jasa_perawat1" name="jasa_perawat1" placeholder="Rp. 0,00" value="{{ old('jasa_perawat1') }}" readonly="" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jasa Perawat 2</label>
						<div class="row">
							<div class="col-md-1">
								<input type="text" required="required" class="form-control" id="jasa_perawat2_persen" placeholder="0%" name="jasa_perawat2_persen" value="{{ old('jasa_perawat2_persen') }}"/>
							</div>
							<div class="col-md-3">
								<input type="text" required="required numbers" class="form-control numbers" id="jasa_perawat2" name="jasa_perawat2" placeholder="Rp. 0,00" value="{{ old('jasa_perawat2') }}" readonly="" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Klinik</label>
						<div class="row">
							<div class="col-md-1">
								<input type="text" required="required" class="form-control numbers" id="klinik_persen" placeholder="0%" name="klinik_persen" value={{ old('klinik_persen') }}>
							</div>
							<div class="col-md-3">
								<input type="text" required="required numbers" class="form-control numbers" id="klinik" name="klinik" placeholder="Rp. 0,00" value="{{ old('klinik') }}" readonly="" />
							</div>
						</div>
					</div>

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="#" class="btn btn-red btn-icon icon-left">
								Kembali
							<i class="entypo-cancel"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".numbers").number(true,0);
		$("#klinik_persen").val(100);
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

	$("#jasa_asisten_persen").each(function () {
		$(this).keyup(function () {
			var total = parseFloat($("#total").val());
			var klinik = total;
			var jasa_klinik_persen = parseFloat($("#jasa_asisten_persen").val());
			var klinik_persen = parseFloat($("#klinik_persen").val());
			var sisa_klinik_persen =  klinik_persen - jasa_klinik_persen;
			var diskon = klinik - ((jasa_klinik_persen/100)*klinik);
			var sisa = klinik - diskon;
			if (!isNaN(sisa_klinik_persen)) {
				klinik_persen -= jasa_klinik_persen;
			}
			$("#jasa_asisten").val(sisa);
			$("#klinik").val(diskon);
			$("#klinik_persen").val(klinik_persen);
			// $("#klinik_persen").val(sisa_klinik_persen);
			 if ($("#jasa_asisten_persen").val() == 100) {
			 	$("#jasa_asisten").val(klinik);
			 } 
			 if ($(this).val().trim().length===0) {
			 	$("#klinik_persen").val(klinik_persen);
			 } 

			 if ($(this).val().trim().length===0) {
			 	$("#klinik").val(total);
			 } 
		});
	});

	function kalkulasi_tarif() {
		var tarif = 0;
		$(".tarif").each(function () {
			var num = parseFloat(this.value.replace(/,/g, ''));
			if (!isNaN(num)) {
				tarif += num;
			}
			$("#klinik, #total").val(tarif);
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

	$('#jasa_asisten_persen').keyup(function(e) {
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