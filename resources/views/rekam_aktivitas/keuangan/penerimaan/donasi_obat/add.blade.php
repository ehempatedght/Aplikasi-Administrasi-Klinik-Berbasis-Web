@extends('template')
@section('main')
<h2>Tambah Data Poli</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index') }}"><i class="entypo-home"> Daftar Donasi Uang</i></a>
	</li>
	<li class="active">
		<strong>Tambah Data Donasi</strong>
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
				<form role="form" class="form-horizontal" action="{{ route('perekaman_aktivitas.keuangan.penerimaan.donasi_obat.save') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Donatur</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="nama_donatur" name="nama_donatur" placeholder="nama donatur" value="{{ old('nama_donatur') }}" required />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;CP</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="cp" name="cp" placeholder="contact person" value="{{ old('cp') }}" required />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No.HP</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control numberValidation" id="hp" name="hp" placeholder="nomor hp" value="{{ old('hp') }}" required />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jenis Obat</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="jns_obt" name="jns_obt" placeholder="jenis obat" value="{{ old('jns_obt') }}" required />
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control numberValidation" id="jumlah" name="jumlah" placeholder="jumlah" value="{{ old('jumlah') }}" required />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Keterangan</label>
						
						<div class="col-sm-5">
							<textarea name="keterangan" id="keterangan" class="form-control" placeholder="keterangan"></textarea>
						</div>
					</div>

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index') }}" class="btn btn-red btn-icon icon-left">
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
	$('.numberValidation').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
    });

    $(document).ready(function () {
    	$('.numbers').number(true);
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