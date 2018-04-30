@extends('template')
@section('main')
<h2>Tambah Honor</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('pengeluaran.honor.index') }}"><i class="entypo-home"> Daftar Honor</i></a>
	</li>
	<li class="active">
		<strong>Tambah Honor</strong>
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
				<form role="form" class="form-horizontal" action="{{ route('pengeluaran.honor.save') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" name="tgl" data-format="dd MM yyyy" placeholder="tanggal">
										
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"style="text-align:left;">&emsp;Kategori</label>
						
						<div class="col-sm-5">
							
							<select name="category_id" class="select2" data-placeholder="Pilih kategori..." required>
								<option></option>
								<optgroup label="Pilih Kategori">
									@foreach ($kategori as $kategori)
										<option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
									@endforeach
								</optgroup>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="petugas" name="nama" placeholder="nama petugas" value="{{ old('nama petugas') }}" required readonly/>
						</div>
						<a class="btn btn-white" href="javascript:;" onclick="jQuery('#modal-5').modal('show', {backdrop: 'static'}); ">	
                       		<i class="entypo-search" ></i>        
						</a> 
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control numbers" id="jumlah" name="jumlah" placeholder="jumlah" value="{{ old('jumlah') }}" required />
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label numberValidation" style="text-align:left;">&emsp;Jam</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="jam" name="jam" placeholder="example: 2 jam" value="{{ old('jam') }}" required />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Total</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control numbers" id="total" name="total" placeholder="total" value="{{ old('total') }}" required />
						</div>
					</div>

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('pengeluaran.honor.index') }}" class="btn btn-red btn-icon icon-left">
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
					<h4 class="modal-title">Pilih Petugas</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered datatable" id="table-1">
						<thead>
 							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Spesialisasi</th>
								<th>Alamat</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							@foreach($petugas as $petugas)
							<tr>
								<td>{{$no++}}</td>
								<td>{{strtoupper($petugas->nama)}}</td>
								<td>{{$petugas->spesialisasi}}</td>
								<td>{{$petugas->alamat}}</td>
								<td align="center">
									<button data-id="{{$petugas->id}}" data-name="{{$petugas->nama}}" class="btn btn-green btn-sm btn-icon icon-left addPas">
										<i class="entypo-check"></i>
										Pilih
									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
				</div>
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
			$("#petugas").val(nama);
			$("#modal-5").modal('hide');
		});
    });
</script>
@endsection