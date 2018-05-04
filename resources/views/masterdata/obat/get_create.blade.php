@extends('template')
@section('main')
<?php
$jenis_obats = \App\Donasiobat::all();
?>
<h2>Tambah Obat</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('masterdata.daftarobat.index') }}"><i class="entypo-home"> Daftar Obat</i></a>
	</li>
	<li class="active">
		<strong>Tambah Jenis Obat</strong>
	</li>
</ol>
{{-- <a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('masterdata.daftarobat.jenis')}}">
	<i class="entypo-plus"></i>Tambah Jenis Obat
</a> --}}
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('masterdata.daftarobat.insert') }}" method="post">
					{{ csrf_field() }}
					<div id="obat_1">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Pilih Jenis</label>
									<div class="col-sm-5">
										<select name="jenis_obat_id[1]" class="form-control select2" id="id_1" required data-placeholder="Pilih jenis obat...">
											<option></option>
											<optgroup label="Pilih Jenis Obat">
												@foreach ($jenis_obats as $jenis_obat)
													<option value="{{$jenis_obat->id}}">{{$jenis_obat->jns_obt}}</option>
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
										<input type="text" class="form-control" name="kd_jenis[1]" placeholder="kode jenis" id="kd_jenis_1" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Obat/Barang</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="nama_obat[1]" placeholder="nama obat barang" required>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Satuan</label>
									<div class="col-sm-5">
										<select name="satuan[1]" class="form-control select2" data-placeholder="Pilih satuan...">
											<option></option>
											<?php $satuan = ['kg','mg','box','cap']; ?>
											<optgroup label="Pilih Satuan">
											@foreach($satuan as $satuan)
											<option value="{{$satuan}}">{{$satuan}}</option>
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
									<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Deskripsi</label>
									<div class="col-sm-5">
										<textarea name="deskripsi[1]" class="form-control" placeholder="deskripsi"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Harga</label>
							<div class="col-sm-5">
								<input type="text" class="form-control numbers" name="harga[1]" placeholder="harga" required value="0">
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Stok</label>
							<div class="col-sm-5">
								<input type="text" class="form-control numberValidation" name="stok[1]" placeholder="stok" required>
							</div>
						</div>
					</div>
					<div id="tambah_list"></div>
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label"></label>

						<div class="col-sm-5">
							<button type="button" id="tambah_obat" class="btn btn-blue btn-icon icon-left">
							Tambah
							<i class="entypo-plus"></i>
							</button>
						</div>
					</div>
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('masterdata.daftarobat.index') }}" class="btn btn-red btn-icon icon-left">
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
	var loop = 2;
	// var loop_ = 2;
	// var id = $(this).val();
	// 	$.get(home_url + '/daftarobat/cari_kode/' + id, function(data) {
	// 		$('#kd_jenis').val(data);
	// 	});


	$('.numberValidation').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
    });

	$(document).ready(function() {

		$('#id_1').change(function() {
			var id = $(this).val();
			$.get(home_url + '/masterdata/daftarobat/cari_kode/' + id, function(data) {
				$('#kd_jenis_1').val(data);
			});
		});

		

		$('#tambah_obat').click(function(e) {
			e.preventDefault();
			var html = '';
			html += '<div id="obat_'+loop+'">' +
			'<hr />' +
			'<div class="form-group">' +
			'<div class="row">' +
			'<div class="col-md-12">' +
			'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Pilih Jenis</label>'+
			'<div class="col-sm-5">'+
			'<select name="jenis_obat_id['+loop+']" class="form-control" data-placeholder="Pilih jenis obat..." id="id_'+loop+'">' +
			'<option></option>' +
			'<optgroup label="Pilih Jenis Obat">' +
			'@foreach ($jenis_obats as $jenis_obat)' +
			'<option class="kd_jn" value="{{$jenis_obat->id}}">{{$jenis_obat->jns_obt}}</option>' +
			'@endforeach' +
			'</optgroup>' +
			'</select>' +
			'</div>' +
			'</div>' +
			'</div>' +
			'</div>' +

			'<div class="form-group">' +
			'<div class="row">' +
			'<div class="col-md-12">' +
			'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kode Obat</label>' +
			'<div class="col-sm-5">' +
			'<input type="text" class="form-control" name="kd_jenis['+loop+']" placeholder="kode jenis" id="kode_jns_'+loop+'" required>' +
			'</div>' +
			'</div>' +
			'</div>' +
			'</div>' +

			'<div class="form-group">' +
			'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Obat/Barang</label>' +
			'<div class="col-sm-5">' +
			'<input type="text" class="form-control input" name="nama_obat['+loop+']" placeholder="nama obat barang" required>' +
			'</div>' +
			'</div>' +
			'<div class="form-group">' +
			'<div class="row">' +
			'<div class="col-md-12">'+
			'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Satuan</label>'+
			'<div class="col-sm-5">' +
			'<select name="satuan['+loop+']" data-placeholder="Pilih satuan..." class="form-control" id="satuan_'+loop+'">' +
			'<?php $satuan = ['kg','mg','box','cap']; ?>' +
			'<option></option>' +
			'<optgroup label="Pilih Satuan">' +
			'@foreach($satuan as $satuan)' +
			'<option value="{{$satuan}}">{{$satuan}}</option>' +
			'@endforeach' +
			'</optgroup>' +
			'</select>' +
			'</div>' +
			'</div>' +
			'</div>' +
			'</div>' +
			'<div class="form-group">' +
			'<div class="row">' +
			'<div class="col-md-12">' +
			'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Deskripsi</label>' +
			'<div class="col-sm-5">' +
			'<textarea name="deskripsi['+loop+']" class="form-control input" placeholder="deskripsi"></textarea>' +
			'</div>' +
			'</div>' +
			'</div>' +
			'</div>' +
			'<div class="form-group">' +
			'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Harga</label>' +
			'<div class="col-sm-5">' +
			'<input type="text" class="form-control harga"  name="harga['+loop+']" placeholder="harga" required value="0">' +
			'</div>' +
			'</div>' +
			'<div class="form-group">' +
			'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Stok</label>' +
			'<div class="col-sm-5">' +
			'<input type="text" class="form-control" name="stok['+loop+']" placeholder="stok" required>' +
			'</div>' +
			'</div>' +
			'<div class="form-group">' +
			'<div class="col-sm-offset-3 col-sm-5">' +
			'<button type="button" class="btn btn-red btn-icon hapus" data-id="'+loop+'">' +
			'Hapus' +
			'<i class="entypo-cancel"></i>' +
			'</button>' +

			'</div>';
			$('#tambah_list').append(html);
			$('#id_'+loop).select2();
			$('#satuan_'+loop).select2();
			$('.numbers').number(true);

			$('#id_'+loop).change(function() {
				var id = $(this).val();
				$.get(home_url + '/masterdata/daftarobat/cari_kode/' + id, function(data) {
					$('#kode_jns_'+loop).val(data);
					loop++;
				});
			});
			
		});

		$("#tambah_list").on('click','.hapus', function(e){
			e.preventDefault();
			var id = $(this).data('id');
			$("#obat_"+id).remove();
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