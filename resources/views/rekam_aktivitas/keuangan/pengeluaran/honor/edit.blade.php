@extends('template')
@section('main')
<h2>Edit Honor {{$honor->petugas->nama}}</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('pengeluaran.honor.index') }}"><i class="entypo-home"> Daftar Honor</i></a>
	</li>
	<li class="active">
		<strong>Edit Honor</strong>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{route('pengeluaran.honor.update', $honor->id)}}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" name="tgl" data-format="dd MM yyyy" placeholder="tanggal" required="" value="{{ date("d M Y", strtotime($honor->tgl)) }}">
										
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label"style="text-align:left;">&emsp;Kategori</label>
						<input type="hidden" name="category_id" id="category_id" value="{{$honor->category_id}}">
						<div class="col-sm-5">
							<input type="text" class="form-control" id="category" name="category" placeholder="nama kategori" value="{{$honor->confhonor->petugas->category->nama_kategori}}" required readonly/>
							{{-- <select name="category" class="select2" data-placeholder="Pilih kategori..." required>
								<option></option>
								<optgroup label="Pilih Kategori">
									@foreach ($kategori as $kategori)
										<option value="{{$kategori->id}}" id="category_id">{{$kategori->nama_kategori}}</option>
									@endforeach
								</optgroup>
							</select> --}}
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama</label>
						<input type="hidden" name="petugas_id" id="petugas_id" value="{{$honor->petugas_id}}">
						<div class="col-sm-5">
							<input type="text" class="form-control" id="petugas" name="nama" placeholder="nama petugas" value="{{$honor->confhonor->petugas->nama}}" required readonly/>
						</div>
						<a class="btn btn-white" href="javascript:;" onclick="jQuery('#modal-5').modal('show', {backdrop: 'static'}); ">	
                       		<i class="entypo-search" ></i>        
						</a> 
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Honor/Jam</label>
						<input type="hidden" name="confhonor_id" id="confhonor_id" value="{{$honor->confhonor_id}}">	
						<div class="col-sm-5">
							<input type="text" class="form-control numbers" id="honor" name="honor_perjam" placeholder="0" autocomplete="off" value="{{$honor->confhonor->honor}}" required readonly />
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label numberValidation" style="text-align:left;">&emsp;Jumlah Jam</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="jam" name="jam" placeholder="jumlah jam" value="{{$honor->jam}}" required />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Total</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control numbers" id="total" name="total" placeholder="total" value="{{$honor->confhonor->honor * $honor->jam}}" required readonly/>
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
								<th>Kategori</th>
								<th>Nama</th>
								<th>Honor\Jam</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							@foreach($conf as $conf)
							<tr>
								<td>{{$no++}}</td>
								<td>
									<center>
										<span class="label label-primary">{{strtoupper($conf->petugas->category->nama_kategori)}}</span>
									</center>
								</td>
								<td>{{strtoupper($conf->petugas->nama)}}</td>
								<th>{{number_format($conf->honor, 0, ',',',')}}</th>
								<td align="center">
									<button data-id="{{$conf->petugas->id}}" data-idcat="{{$conf->petugas->category->id}}" data-valcat="{{$conf->petugas->category->nama_kategori}}" data-name="{{$conf->petugas->nama}}" data-honid="{{$conf->id}}" data-honor="{{$conf->honor}}" class="btn btn-green btn-sm btn-icon icon-left addPas" data-dismiss="modal">
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

	$("#jam").keyup(function() {
		var honor = parseFloat($("#honor").val());
		var jam = parseInt($("#jam").val());
		var total = honor * jam;
		$("#total").val(total);
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
			var id = $(this).data('id');
			var idcat = $(this).data('idcat');
			var valc = $(this).data('valcat');
			var honid = $(this).data('honid');
			var honor = $(this).data('honor');
			$("#petugas_id").val(id);
			$("#category_id").val(idcat);
			$("#honor").val(honor);
			$("#confhonor_id").val(honid);
			$("#petugas").val(nama);
			$("#category").val(valc);
			$("#modal-5").modal('hide');
		});
    });
</script>
@endsection