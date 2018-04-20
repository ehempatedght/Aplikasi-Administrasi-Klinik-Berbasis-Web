@extends('template')
@section('main')
<?php
$jenis_obats = \App\Jenisobat::all();
?>
<h2>Tambah Obat</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('daftarobat.index') }}"><i class="entypo-home"> Daftar Obat</i></a>
	</li>
	<li class="active">
		<strong>Tambah Jenis Obat</strong>
	</li>
</ol>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('daftarobat.jenis')}}">
	<i class="entypo-plus"></i>Tambah Jenis Obat
</a>
<br/>
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="row" style="margin-top: 15px;">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-body">
				<form role="form" class="form-horizontal" action="{{ route('daftarobat.update', ['id'=>$data->id]) }}" method="post">
					{{ csrf_field() }}
					<div id="obat_1">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Pilih Jenis</label>
									<div class="col-sm-5">
										<select name="jenis_obat_id" class="form-control select2" id="id_1" required data-placeholder="Pilih jenis obat...">
											<option></option>
											<optgroup label="Pilih Jenis Obat">
												@foreach ($jenis_obats as $jenis_obat)
													<option value="{{$jenis_obat->id}}" @if($data->jenis_obat_id == $jenis_obat->id) selected @endif>{{$jenis_obat->name}}</option>
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
									<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kode Jenis</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="kd_jenis" placeholder="kode jenis" id="kd_jenis_1" required value="{{$data->kd_jenis}}">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Obat/Barang</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="nama_obat" placeholder="nama obat barang" required value="{{$data->nama_obat}}">
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Satuan</label>
									<div class="col-sm-5">
										<select name="satuan" class="form-control select2" data-placeholder="Pilih satuan...">
											<option></option>
											<optgroup label="Pilih Satuan">
												<option {{old('satuan', $data->satuan)=="kg"? 'selected':''}} value="kg">kg</option>
												<option {{old('satuan', $data->satuan)=="mg"? 'selected':''}} value="mg">mg</option>
												<option {{old('satuan', $data->satuan)=="box"? 'selected':''}} value="box">box</option>
												<option {{old('satuan', $data->satuan)=="cap"? 'selected':''}} value="cap">cap</option>
											</optgroup>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Deskripsi</label>
									<div class="col-sm-5">
										<textarea name="deskripsi" class="form-control" placeholder="deskripsi">{{$data->deskripsi}}</textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Harga</label>
							<div class="col-sm-5">
								<input type="text" class="form-control numbers" name="harga" placeholder="harga" required value="{{$data->harga}}">
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Stok</label>
							<div class="col-sm-5">
								<input type="text" class="form-control numberValidation" name="stok" placeholder="stok" required value="{{$data->stok}}">
							</div>
						</div>
					</div>
					{{-- <div id="tambah_list"></div>
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label"></label>

						<div class="col-sm-5">
							<button type="button" id="tambah_obat" class="btn btn-blue btn-icon icon-left">
							Tambah
							<i class="entypo-plus"></i>
							</button>
						</div>
					</div> --}}
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('daftarobat.index') }}" class="btn btn-red btn-icon icon-left">
								Kembali
							<i class="entypo-cancel"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$('.numberValidation').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
    });

	$(document).ready(function() {

		$('#id_1').change(function() {
			var id = $(this).val();
			$.get(home_url + '/daftarobat/cari_kode/' + id, function(data) {
				$('#kd_jenis_1').val(data);
			});
		});
		
		$(".numbers").number(true,0);
		$('input').on('keydown', function(event) {
		        if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
		           var $t = $(this);
		           event.preventDefault();
		           var char = String.fromCharCode(event.keyCode);
		           $t.val(char + $t.val().slice(this.selectionEnd));
		           this.setSelectionRange(1,1);
		        }
	    });	

		

	    $("#tambah_list").on('input','.harga', function(){
		    $(".harga").keyup(function(){
		      hargaLoop();
		    });
  		});

  		$("#tambah_list").on('input','.input', function(){
		    $(".input").keyup(function(){
		      Input();
		    });
  		});

	    function Input() {
	    	$('input').on('keydown', function(event) {
		        if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
		           var $t = $(this);
		           event.preventDefault();
		           var char = String.fromCharCode(event.keyCode);
		           $t.val(char + $t.val().slice(this.selectionEnd));
		           this.setSelectionRange(1,1);
		        }
	    });
	    }
	    function hargaLoop() {
	    	var harga = 0;
	    	$(".harga").each(function(){
	    		var num1 = $(this).val();
			    var num3 = $(this).val().replace(/,/gi, "");
			    var num2 =  num3.split(/(?=(?:\d{3})+$)/).join(",");
			    var num = parseInt(num1.replace(/,/g, ''));
			    if(!isNaN(num)){
			        harga += num;
			      }
			    $(this).val(num2);
	    	});
	    } 
	});
</script>
@endsection