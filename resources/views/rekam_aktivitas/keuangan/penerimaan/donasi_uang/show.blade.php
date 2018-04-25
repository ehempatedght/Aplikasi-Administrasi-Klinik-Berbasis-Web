@extends('template')
@section('main')
<h2>Lihat Donatur {{$donasi_uang->nama_donatur}}</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index') }}"><i class="entypo-home"> Daftar Donasi Uang</i></a>
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
				<form role="form" class="form-horizontal" action="{{ route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.update', $donasi_uang->id) }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Donatur</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="nama_donatur" name="nama_donatur" placeholder="nama donatur" value="{{$donasi_uang->nama_donatur}}" required readonly />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;CP</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="cp" name="cp" placeholder="contact person" value="{{$donasi_uang->cp}}" required readonly/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No.HP</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control numberValidation" id="hp" name="hp" placeholder="nomor hp" value="{{$donasi_uang->hp}}" required readonly />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah Donasi</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control numbers" id="jml_donasi" name="jml_donasi" placeholder="jumlah donasi" value="{{$donasi_uang->jml_donasi}}" required readonly />
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Keterangan</label>
						
						<div class="col-sm-5">
							<textarea name="keterangan" id="keterangan" class="form-control" placeholder="keterangan" readonly>{{$donasi_uang->keterangan}}</textarea>
						</div>
					</div>

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left" disabled>
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index') }}" class="btn btn-red btn-icon icon-left">
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