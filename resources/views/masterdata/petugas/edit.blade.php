@extends('template')

@section('main')
<h2>Edit Petugas Medis</h2>
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
<div class="row">
	<div class="col-md-12">
		<hr />
		<ol class="breadcrumb bc-3" >
			<li>
				<a href="{{route('petugas.index')}}"><i class="fa fa-home"></i>Data Petugas Medis</a>
			</li>
			<li class="active">
				<strong>Edit Petugas Medis</strong>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('petugas.update', $data->id) }}" method="post">
					{{ csrf_field() }}

					<div class="form-group">
						<label class="col-sm-3 control-label"style="text-align:left;">&emsp;Kategori</label>
						
						<div class="col-sm-5">
							
							<select name="category_id" class="select2" data-validate="required" data-message-required="Wajib diisi.">
								<option selected="selected" disabled value="Pilih">Pilih Kategori</option>
									@foreach ($categories as $kategori)
										<option value="{{$kategori->id}}" @if($data->category_id == $kategori->id) selected @endif>{{$kategori->nama_kategori}}</option>
									@endforeach
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="nama" name="nama" placeholder="nama lengkap" data-validate="required" data-message-required="Wajib diisi." value="{{$data->nama}}" />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Spesialisasi</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="spesialisasi" name="spesialisasi" placeholder="spesialisasi" data-validate="required" data-message-required="Wajib diisi." value="{{ $data->spesialisasi }}" />
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Alamat</label>
						
						<div class="col-sm-5">
							<textarea type="textarea" class="form-control" id="alamat" name="alamat" placeholder="alamat" data-validate="required" data-message-required="Wajib diisi.">{{$data->alamat}}</textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kota</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="kota" name="kota" placeholder="kota" data-validate="required" data-message-required="Wajib diisi." value="{{$data->kota}}" />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nomor HP</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="nomor hp" data-mask="(9999) 9999-9999" data-validate="required" data-message-required="Wajib diisi." value="{{ $data->no_hp }}" />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nomor Telepon</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="nomor telepon" data-mask="(9999) 9999-9999" data-validate="required" data-message-required="Wajib diisi." value="{{ $data->no_telp }}" />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Alamat Email</label>
						
						<div class="col-sm-5">
							<input type="email" class="form-control" id="alamat_email" name="alamat_email" placeholder="alamat email" data-validate="required" data-message-required="Wajib diisi." value="{{ $data->alamat_email }}" onkeyup="this.value = this.value.toLowerCase()" />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal Mulai Praktek</label>
						
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" name="tgl_mulai_praktek" placeholder="tgl mulai praktek" value="{{$data->tgl_mulai_praktek}}">
								
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Hari Praktek</label>
						<div class="row">
							<div class="col-md-2">
								<b-checkbox-group>
									@foreach($days as $day)
										<div class="checkbox checkbox-replace color-green">
											<b-checkbox v-model="daysSelected" :native-value="{{$day->id}}" name="days[]"> {{$day->days}}</b-checkbox>
										</div>
										<br/>
									@endforeach
								</b-checkbox-group>
							</div>
							 <div class="col-md-2" style="margin-top: 10px;">
								<div class="form-control-wrapper">
									<input type="text" id="time" class="form-control floating-label" placeholder="jam mulai" name="senin1" value="{{$data->senin1}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time2" class="form-control floating-label" placeholder="jam mulai" name="selasa1" value="{{$data->selasa1}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time3" class="form-control floating-label" placeholder="jam mulai" name="rabu1" value="{{$data->rabu1}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time4" class="form-control floating-label" placeholder="jam mulai" name="kamis1" value="{{$data->kamis1}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time5" class="form-control floating-label" placeholder="jam mulai" name="jumat1" value="{{$data->jumat1}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time6" class="form-control floating-label" placeholder="jam mulai" name="sabtu1" value="{{$data->sabtu1}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time7" class="form-control floating-label" placeholder="jam mulai" name="minggu1" value="{{$data->minggu1}}">
								</div>
								<br/>
							</div>
							<div class="col-md-2" style="margin-top: 10px;">
								<div class="form-control-wrapper">
									<input type="text" id="time8" class="form-control floating-label" placeholder="jam selesai" name="senin2" value="{{$data->senin2}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time9" class="form-control floating-label" placeholder="jam selesai" name="selasa2" value="{{$data->selasa2}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time10" class="form-control floating-label" placeholder="jam selesai" name="rabu2" value="{{$data->rabu2}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time11" class="form-control floating-label" placeholder="jam selesai" name="kamis2" value="{{$data->kamis2}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time12" class="form-control floating-label" placeholder="jam selesai" name="jumat2" value="{{$data->jumat2}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time13" class="form-control floating-label" placeholder="jam selesai" name="sabtu2" value="{{$data->sabtu2}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time14" class="form-control floating-label" placeholder="jam selesai" name="minggu2" value="{{$data->minggu2}}">
								</div>
								<br/>
							</div>
						</div>
					</div>
					<div class="form-group">
							<label class="col-sm-2 control-label" style="text-align:left; font-size:13px;">&emsp;Upload Photo:
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
										<img src="{{ asset('petugass/'.$data->img) }}" alt="...">
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
									<div>
										<span class="btn btn-white btn-file">
											<span class="fileinput-new">Pilih Photo</span>
											<span class="fileinput-exists">Ubah</span>
											<input type="file" name="namaFile" accept="image/*">
										</span>
										<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Hapus</a>
									</div>
								</div>
							</div>
							<input type="hidden" name="gambar_lama" value="{{ $data->img }}" />
						</div>
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
				</form>
				<a href="{{route('petugas.index')}}" class="btn btn-red btn-icon icon-left col-left">
					Batal
					<i class="entypo-cancel"></i>
				</a>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('js/bootstrap-material-datetimepicker.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#time').timepicker();
		$('#time2').timepicker();
		$('#time3').timepicker();
		$('#time4').timepicker();
		$('#time5').timepicker();
		$('#time6').timepicker();
		$('#time7').timepicker();
		$('#time8').timepicker();
		$('#time9').timepicker();
		$('#time10').timepicker();
		$('#time11').timepicker();
		$('#time12').timepicker();
		$('#time13').timepicker();
		$('#time14').timepicker();
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
      daysSelected: {!!$data->days->pluck('id')!!}
    }
  });
  </script>
@endsection