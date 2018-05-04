@extends('template')
@section('main')
<h2>Ubah Biaya Pendaftaran</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('penerimaan.biaya.index') }}"><i class="entypo-home"> Daftar Biaya Pendaftaran</i></a>
	</li>
	<li class="active">
		<strong>Ubah Biaya Pendaftaran</strong>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('penerimaan.biaya.update', $biaya->id) }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" name="tgl" data-format="dd MM yyyy" placeholder="tanggal" value="{{date("d M Y", strtotime($biaya->tgl)) }}">
										
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No.Pendaftaran</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="no_pend" placeholder="nomor pendaftaran" id="nopen" required readonly value="{{$biaya->no_pend}}" />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Pasien</label>
						<input type="hidden" name="pasien_id" id="pasien_id" value="{{$biaya->pasien_id}}">
						<div class="col-sm-5">
							<input type="text" class="form-control" id="pasien" name="pasien" placeholder="pasien" value="{{$biaya->pasien->nama_pasien}}" required readonly/>
						</div>
						<a class="btn btn-white" href="javascript:;" onclick="jQuery('#modal-5').modal('show', {backdrop: 'static'}); ">	
	                       		<i class="entypo-search" ></i>        
						</a> 
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control numbers" id="jumlah" name="jumlah" placeholder="jumlah" value="{{$biaya->jumlah}}" required />
						</div>
					</div>

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('penerimaan.biaya.index') }}" class="btn btn-red btn-icon icon-left">
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
								<th>No.RM</th>
								<th>Nama Pasien</th>
								<th>Alamat</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($pasien as $pasien)
							<tr>
								<td>{{strtoupper($pasien->no_urut)}}</td>
								<td>{{$pasien->nama_pasien}}</td>
								<td>{{$pasien->alamat}}</td>
								<td align="center">
									<button data-id="{{$pasien->id}}" data-pend="{{$pasien->no_urut}}" data-name="{{$pasien->nama_pasien}}" class="btn btn-green btn-sm btn-icon icon-left addPas">
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
			var pasien_id = $(this).data('id');
			var valpen = $(this).data('pend');
			$("#nopen").val(valpen);
			$("#pasien").val(nama);
			$("#pasien_id").val(pasien_id);
			$("#modal-5").modal('hide');
		});
    });
</script>
@endsection