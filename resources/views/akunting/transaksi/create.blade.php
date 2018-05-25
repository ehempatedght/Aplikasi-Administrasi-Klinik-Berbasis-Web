@extends('template')
@section('main')
<h2>Tambah Transaksi Keuangan</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{route('transaksi.index')}}"><i class="entypo-home"> Daftar Transaksi</i></a>
	</li>
	<li class="active">
		<strong>Tambah Transaksi Keuangan</strong>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{route('transaksi.save')}}" method="post">
					@csrf
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" name="tgl" data-format="dd MM yyyy" placeholder="tanggal" required>
										
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tipe Akun</label>
									<div class="col-sm-5">
										<select name="id_tipe" class="form-control tipe_akun" id="id_tipe" required data-placeholder="Pilih tipe akun..." required>
											<optgroup label="Tipe Akun">
												@foreach($tipeAkun as $tipe)
												<option value="{{$tipe->id_tipe}}">{{$tipe->nama_tipe}}</option>
												@endforeach
											</optgroup>
										</select>
									</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Akun</label>
									<div class="col-sm-5">
										<select name="id_akun" class="form-control" required data-placeholder="Pilih nama akun..." id="id_akun" required>
											<optgroup label="Nama Akun">
											@foreach($namaAkun as $nAkun)
											@if($nAkun->id_tipe == '1')
											<option value="{{$nAkun->id_akun}}">{{$nAkun->nama_akun}}</option>
											@endif
											@endforeach
											</optgroup>
										</select>
									</div>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jenis Transaksi</label>
									<div class="col-sm-5">
										<div class="row">
											<div class="col-sm-4">
												<div class="checkbox">
													<label>
													<input type="checkbox" id="tm" class="tm" name="pemasukan">Transaksi Masuk
													</label>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="checkbox">
													<label>
													<input type="checkbox" id="tk" class="tk" name="pengeluaran">Transaksi Keluar
													</label>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nominal</label>
						<div class="col-sm-5">
							<input type="text" class="form-control numbers" id="nominal" name="nominal" value="0" required/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="jumlah" name="jumlah" value="1" required/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Saldo</label>
						<div class="col-sm-5">
							<input type="text" class="form-control numbers" id="saldo" name="saldo" value="0" required readonly />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Keterangan</label>
						<div class="col-sm-5">
							<textarea name="keterangan" class="form-control" placeholder="keterangan transaksi"></textarea>
						</div>
					</div>

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{route('transaksi.index')}}" class="btn btn-red btn-icon icon-left">
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
	$(document).on('change', '.tipe_akun', function() {
		if($(this).val() == "2") {
			$('#id_akun').empty();
			@foreach($namaAkun as $nAkun)
			@if($nAkun->id_tipe == '2')
			$('#id_akun').append($("<option></option>").attr("value","{{$nAkun->id_akun}}").text("{{$nAkun->nama_akun}}"));
			@endif
			@endforeach
			$('#tm').prop("disabled", false);
			$('#tm').prop("checked", false);
			$('#tk').prop("disabled", false);
			$('#tk').prop("checked", false);
		} else if($(this).val() == "3") {
			$('#id_akun').empty();
			@foreach($namaAkun as $nAkun)
			@if($nAkun->id_tipe == '3')
			$('#id_akun').append($("<option></option>").attr("value","{{$nAkun->id_akun}}").text("{{$nAkun->nama_akun}}"));
			@endif
			@endforeach
			$('.tm').prop('checked', true);
			$('.tm').prop('disabled', false);
			$('.tk').prop('disabled', true);
			$('.tk').prop('checked', false);
		} else if($(this).val() == "4") {
			$('#id_akun').empty();
			@foreach($namaAkun as $nAkun)
			@if($nAkun->id_tipe == '4')
			$('#id_akun').append($("<option></option>").attr("value","{{$nAkun->id_akun}}").text("{{$nAkun->nama_akun}}"));
			@endif
			@endforeach
			$('.tk').prop('checked', true);
			$('.tk').prop('disabled', false);
			$('.tm').prop('disabled', true);
			$('.tm').prop('checked', false);
		} else {
			$('#id_akun').empty();
			@foreach($namaAkun as $nAkun)
			@if($nAkun->id_tipe == '1')
			$('#id_akun').append($("<option></option>").attr("value","{{$nAkun->id_akun}}").text("{{$nAkun->nama_akun}}"));
			@endif
			@endforeach
			$('#tm').prop("disabled", false);
			$('#tm').prop("checked", false);
			$('#tk').prop("disabled", false);
			$('#tk').prop("checked", false);
		}

	});

	$(document).ready(function () {
		$("#jumlah").keyup(function() {
			var nominal = $("#nominal").val();
			var jumlah = $("#jumlah").val();
			var hasil = nominal * jumlah;
			$("#saldo").val(hasil);
		});

		$(".tm").click(function(e){
			if(e.target.checked){
				$('.tk').prop("disabled", true);
			} else {
				$('.tk').prop("disabled", false);
			}
		});

		$(".tk").click(function(e){
			if(e.target.checked){
				$('.tm').prop("disabled", true);
			} else {
				$('.tm').prop("disabled", false);
			}
		});

		$("#nominal").keyup(function() {
			var nominal = 0;
			var jml = $("#jumlah").val();
			$("#nominal").each(function() {
				var num = parseFloat(this.value.replace(/,/g, ''));
				if (!isNaN(num)) {
					nominal += num;
				}

				$("#saldo").val(nominal * jml);
			});
		});

		// $("option[name='pemasukan']").prop('selected',true);
	});
</script>
@endsection