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
<h2>Tambah Petugas Medis</h2>
<br/>
@if(count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>
			{{$error}}
		</li>
		@endforeach
	</ul>
</div>
@endif
@if(session('message2'))
    <div class="alert alert-danger">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
@endif
<div class="row">
	<div class="col-md-12">
		<hr />
		<ol class="breadcrumb bc-3" >
			<li>
				<a href="{{route('masterdata.petugasmedis.datapetugasmedis.index')}}"><i class="fa fa-home"></i>Data Petugas Medis</a>
			</li>
			<li class="active">
				<strong>Tambah Petugas Medis</strong>
			</li>
		</ol>
		<div class="panel panel-primary" data-collapsed="0">
			
			<div class="panel-heading">
				<div class="panel-title">
					Form Inputs
				</div>
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>

			<div class="panel-body">
				<form role="form" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" action="{{ route('masterdata.petugasmedis.datapetugasmedis.insert') }}" method="post" >
					{{ csrf_field() }}

					<div class="form-group">
						<label class="col-sm-3 control-label"style="text-align:left;">&emsp;Kategori</label>
						
						<div class="col-sm-5">
							
							<select name="category_id" class="select2" required data-placeholder="Pilih Kategori...">
								<option></option>
								<optgroup label="Pilih Kategori">
									@foreach ($categories as $kategori)
										<option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
									@endforeach
								</optgroup>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="nama" name="nama" placeholder="nama lengkap" value="{{ old('nama') }}" required />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Spesialisasi</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="spesialisasi" name="spesialisasi" placeholder="spesialisasi" value="{{ old('spesialisasi') }}"/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Alamat</label>
						
						<div class="col-sm-5">
							<textarea type="textarea" class="form-control" id="alamat" name="alamat" placeholder="alamat"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kota</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="kota" name="kota" placeholder="kota" value="{{ old('kota') }}"/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nomor HP</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="nomor hp" data-mask="(9999) 9999-9999" value="{{ old('no_hp') }}"/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nomor Telepon</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="nomor telepon" data-mask="(9999) 9999-9999" value="{{ old('no_telp') }}"/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Alamat Email</label>
						
						<div class="col-sm-5">
							<input type="email" class="form-control" id="alamat_email" name="alamat_email" placeholder="alamat email" value="{{ old('alamat_email') }}" onkeyup="this.value = this.value.toLowerCase()"/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal Mulai Praktek</label>
						
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" name="tgl_mulai_praktek" placeholder="tgl mulai praktek">
								
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
							<label class="col-sm-3 control-label" style="text-align:left; font-size:13px;">&emsp;Upload Photo:
								@if (session('error_upload'))
									<br />
									<p style="color:red;">
										{{ session('error_upload') }}
									</p>
								@endif
							</label>
							<div class="col-sm-5">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
										<img src="http://placehold.it/200x150" alt="...">
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
									<div>
										<span class="btn btn-white btn-file">
											<span class="fileinput-new">Pilih Photo</span>
											<span class="fileinput-exists">Ubah</span>
											<input type="file" name="photo" accept="image/*">
										</span>
										<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Hapus</a>
									</div>
								</div>
							</div>
						</div>
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
				</form>
				<a href="{{route('masterdata.petugasmedis.datapetugasmedis.index')}}" class="btn btn-red btn-icon icon-left col-left">
					Batal
					<i class="entypo-cancel"></i>
				</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="{{ asset('js/fileinput.js') }}"></script>
<script src="{{asset('js/bootstrap-material-datetimepicker.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
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
@section('scripts')
  <script>
  var app = new Vue({
    el: '#app',
    data: {
      daysSelected: []
    }
  });
  </script>
@endsection