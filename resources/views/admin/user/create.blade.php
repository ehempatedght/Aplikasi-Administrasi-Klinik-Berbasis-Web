@extends('template')

@section('main')
<h2>Tambah Pengguna</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('pengaturan.user.data.index') }}"><i class="entypo-home"> Daftar Pengguna</i></a>
	</li>
	<li class="active">
		<strong>Tambah Pengguna</strong>
	</li>
</ol>
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
				<form role="form" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" action="{{ route('pengaturan.user.data.simpan') }}" method="post">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Username</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="username" name="username" placeholder="username" data-validate="required" data-message-required="Wajib diisi." value="{{ old('username') }}"/>
							<div style="color:red;padding-top: 8px;" id="avaibility">@if (session('status_username')){{ session('status_username') }} @endif</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Nama Depan</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="first_name" placeholder="first name" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Nama Belakang</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="last_name" placeholder="last name" required>
						</div>
					</div>

					{{-- <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Email</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="email" placeholder="email" onkeyup="this.value = this.value.toLowerCase()" required>
						</div>
					</div> --}}

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Kata Sandi</label>
						
						<div class="col-sm-5">
							<input type="password" class="form-control" id="password" name="password">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Konfirmasi Kata Sandi</label>
						
						<div class="col-sm-5">
							<input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
						</div>
						<div style="color:red;padding-top: 8px;" id="not_match"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" style="text-align:left;">&emsp;Peran:
							<br />
							@if (session('status'))
							<p style="color:red;">
								{{ session('status') }}
							</p>
							@endif
						</label>
						<div class="col-sm-2">
							<label class="control-label"><strong>Master Data:</strong></label>
							<div class="checkbox">
								<label>
									<input type="checkbox"  id="admin" name="role[admin]" @if(is_array(old('role')) && array_key_exists("admin", old('role'))) checked @endif> Admin
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[petugasmedis]" @if(is_array(old('role')) && array_key_exists("petugasmedis", old('role'))) checked @endif>
									Petugas Medis
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[vendorobat]" @if(is_array(old('role')) && array_key_exists("vendorobat", old('role'))) checked @endif>
									Vendor Obat
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[daftarobat]" @if(is_array(old('role')) && array_key_exists("daftarobat", old('role'))) checked @endif>
									Daftar Obat
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[datapoli]" @if(is_array(old('role')) && array_key_exists("datapoli", old('role'))) checked @endif>
									Data Poli
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[pasien]" @if(is_array(old('role')) && array_key_exists("pasien", old('role'))) checked @endif>
									Pasien
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[peralatan]" @if(is_array(old('role')) && array_key_exists("peralatan", old('role'))) checked @endif>
									Peralatan
								</label>
							</div>
						</div>

						<div class="col-sm-2">
							<label class="control-label"><strong>Perekaman Aktivitas:</strong></label>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[rekmedis]" @if(is_array(old('role')) && array_key_exists("rekmedis", old('role'))) checked @endif>
									Medis
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[rekkeuangan]" @if(is_array(old('role')) && array_key_exists("rekkeuangan", old('role'))) checked @endif>
									Keuangan
								</label>
							</div>
						</div>

						<div class="col-sm-2">
							<label class="control-label"><strong>Pelaporan:</strong></label>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[lapmedis]" @if(is_array(old('role')) && array_key_exists("lapmedis", old('role'))) checked @endif>
									Medis
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[lapakuntansi]" @if(is_array(old('role')) && array_key_exists("lapakuntansi", old('role'))) checked @endif>
									Akuntansi
								</label>
							</div>
						</div>

						<div class="col-sm-2">
							<label class="control-label"><strong>Pengaturan:</strong></label>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[setuser]" @if(is_array(old('role')) && array_key_exists("setuser", old('role'))) checked @endif>
									Pengguna
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[sethonor]" @if(is_array(old('role')) && array_key_exists("sethonor", old('role'))) checked @endif>
									Honor
								</label>
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
						<a href="{{route('pengaturan.user.data.index')}}" class="btn btn-red btn-icon icon-left col-left">
					Batal
					<i class="entypo-cancel"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ asset('js/fileinput.js') }}"></script>
<script type="text/javascript">

$(document).ready(function() {
	$("#password_confirmation").keyup(function(){
		var pas1 = $('#password').val();
		var pas2 = $('#password_confirmation').val();
		var avail = $("#avaibility").text();

		if (pas1 != pas2) {
			$('#not_match').text('Password Tidak Cocok');
			$('#simpan').prop('disabled', true);
		} else {
			$('#not_match').text(' ');
			$('#simpan').removeProp('disabled');
		}

		if (avail == 'Username sudah digunakan!') {
			$("#simpan").prop('disabled', true);
		}
	});

	$("#username").keyup(function(){
		var home_Url = "{{url('/')}}";
		var username = $("#username").val();
		$.get(home_Url + '/pengaturan/pengguna/cekusername/' + username, function(data){
			if (data == 'Username sudah digunakan'){
				$("#avaibility").text(data);
				$('#simpan').prop('disabled', true);
			} else if(data == '0') {
				$("#avaibility").text(' ');
				$("#simpan").removeProp('disabled');
			}
		});
	});

	$("#admin").click(function () {
		$('.check').prop("checked", this.checked);
	});

	$(".check").click(function() {
		if (($('#admin').prop('checked') == true) && ($(this).prop("checked") == false)) {
			$("#admin").prop("checked", false);
		}
	});
});
</script>
@endsection