@extends('template')

@section('main')
<h2>Tambah User</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('pengaturan.user.data.index') }}"><i class="entypo-home"> Daftar User</i></a>
	</li>
	<li class="active">
		<strong>Tambah User</strong>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('pengaturan.user.data.update', $data->id) }}" method="post">
					{{ csrf_field() }}
					{{ method_field('PUT') }}

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Username</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="username" name="username" placeholder="username" data-validate="required" data-message-required="Wajib diisi." value="{{$data->username}}" onkeyup="this.value = this.value.toLowerCase()" />
							<div style="color:red;padding-top: 8px;" id="avaibility"></div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Nama Depan</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="first_name" placeholder="first name" value="{{$data->first_name}}" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Nama Belakang</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="last_name" placeholder="last name" value="{{$data->last_name}}" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Email</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="email" placeholder="email" onkeyup="this.value = this.value.toLowerCase()" value="{{$data->email}}" required>
						</div>
					</div>
					@if (Auth::user()->admin != '1')
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kata Sandi Lama:
							@if (session('error_1'))
							<br />
							<p style="color:red;">
								{{ session('error_1') }}
							</p>
							@endif
						</label>
						<div class="col-sm-5">
							<input type="password" class="form-control" id="password0" name="password0">
						</div>
					</div>
					@endif
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Kata Sandi Baru</label>
						
						<div class="col-sm-5">
							<input type="password" class="form-control" id="password" name="password" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Konfirmasi Kata Sandi</label>
						
						<div class="col-sm-5">
							<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
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
									<input type="checkbox"  id="admin" name="role[admin]" @if($data->admin == '1') checked @endif> Admin
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[petugasmedis]" @if($data->petugasmedis == '1') checked @endif>
									Petugas Medis
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[vendorobat]" @if($data->vendorobat == '1') checked @endif>
									Vendor Obat
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[daftarobat]" @if($data->daftarobat == '1') checked @endif>
									Daftar Obat
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[datapoli]" @if($data->datapoli == '1') checked @endif>
									Data Poli
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[pasien]" @if($data->pasien == '1') checked @endif>
									Pasien
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[peralatan]" @if($data->peralatan == '1') checked @endif>
									Peralatan
								</label>
							</div>
						</div>

						<div class="col-sm-2">
							<label class="control-label"><strong>Perekaman Aktivitas:</strong></label>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[rekmedis]" @if($data->rekmedis == '1') checked @endif>
									Medis
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[rekkeuangan]" @if($data->rekkeuangan == '1') checked @endif>
									Keuangan
								</label>
							</div>
						</div>

						<div class="col-sm-2">
							<label class="control-label"><strong>Pelaporan:</strong></label>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[lapmedis]" @if($data->lapmedis == '1') checked @endif>
									Medis
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[lapakuntansi]" @if($data->lapakuntansi == '1') checked @endif>
									Akuntansi
								</label>
							</div>
						</div>

						<div class="col-sm-2">
							<label class="control-label"><strong>Pengaturan:</strong></label>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[setuser]" @if($data->setuser == '1') checked @endif>
									Pengguna
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" class="check" name="role[sethonor]" @if($data->sethonor == '1') checked @endif>
									Honor
								</label>
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
	
function cekUsername(){
	var username = $('#username').val();
	$.get(home_url + '/pengaturan/user/data/cekusername/' + username, function(data){
		if(data == 'Username sudah digunakan'){
			$('#avaibility').text(data);
			$('#save').prop('disabled', true);
		}else if(data == '0'){
			$('#avaibility').text(' ');
			$('#save').removeProp('disabled');
		}
	});
}

$(document).ready(function() {
	$('#password_confirmation').keyup(function(){
		var pas1 = $('#password').val();
		var pas2 = $('#password_confirmation').val();
		var avail = $('#avaibility').text();

		if (pas1 != pas2) {
			$('#not_match').text('Password Tidak Cocok');
			$('#simpan').prop('disabled', true);
		} else {
			$('#not_match').text(' ');
			$('#simpan').removeProp('disabled');
		}
	});

	$("#username").keyup(function(){
		cekUsername();
	});

	$('#admin').click(function () {
		$('.check').prop("checked", this.checked);
	});
});
</script>
@endsection