@extends('template')
@section('main')
<style>
.select2-container .select2-choice {
    display: block!important;
    height: 30px!important;
    white-space: nowrap!important;
    line-height: 26px!important;
    width: 100%!important;
}
</style>
<h2>Tambah Data Pemeriksaan</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{route('pemeriksaan.index')}}"><i class="entypo-home"> Daftar Data Pemeriksaan</i></a>
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
				<form action="{{route('pemeriksaan.save')}}" role="form" class="form-horizontal form-groups-bordered" method="post">
					{{ csrf_field() }}
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kategori</label>
								<div class="col-sm-5">
									<select name="id_kategori" class="select2" required data-placeholder="Pilih Kategori...">
											<option></option>
											<optgroup label="Pilih Kategori">
											@foreach ($kategori as $kategori)
												<option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
											@endforeach
											</optgroup>
									</select>
								</div>
								{{-- <div class="col-sm-3">
									<button href="javascript:;" onclick="jQuery('#modal-7').modal('show', {backdrop: 'static'});" type="button" class="btn btn-info">
										<i class="entypo-plus"></i>
									</button>
								</div> --}}
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Pemeriksaan</label>
						
						<div class="col-sm-5">
							<input type="text" required="required" class="form-control" id="nama_pemeriksaan" name="nama_pemeriksaan" placeholder="nama pemeriksaan" value="{{ old('nama_pemeriksaan') }}"/>
						</div>
					</div>
					
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{route('pemeriksaan.index')}}" class="btn btn-red btn-icon icon-left">
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