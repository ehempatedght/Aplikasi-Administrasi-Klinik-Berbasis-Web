@extends('template')

@section('main')
<h2>Tambah User</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('users.index') }}"><i class="entypo-home"> Daftar User</i></a>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('users.store') }}" method="post">
					{{ csrf_field() }}

					<div class="form-group">
						<label class="col-sm-3 control-label"style="text-align:left;">&emsp;Role</label>
						
						<div class="col-sm-5">
							
							<select name="role" class="select2" data-validate="required" data-message-required="Wajib diisi.">
								<option>Pilih Role</option>
								@if($roles->count())
									@foreach ($roles as $role)
										<option value="{{$role->id}}">{{$role->name}}</option>
									@endforeach
								@endif
							</select>
							
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Username</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="username" name="username" placeholder="username" data-validate="required" data-message-required="Wajib diisi." value="{{ old('username') }}" onkeyup="this.value = this.value.toLowerCase()" />
							<div style="color:red; padding-top: 8px;" class="help-block hasil_cek_username"></div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;First Name</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="first_name" placeholder="first name" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Last Name</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="last_name" placeholder="last name" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Email</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="email" placeholder="email" onkeyup="this.value = this.value.toLowerCase()" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Password</label>
						
						<div class="col-sm-5">
							<input type="password" class="form-control" id="password" name="password">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Ulangi Password</label>
						
						<div class="col-sm-5">
							<input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
						</div>
						<div style="color:red;padding-top: 8px;" id="not_match"></div>
					</div>
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<button type="submit" name="cancel" class="btn btn-red btn-icon icon-left col-left">
						Cancel
						<i class="entypo-cancel"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ asset('js/fileinput.js') }}"></script>
<script type="text/javascript">

$(document).ready(function() {
	$('#password_confirmation').keyup(function(){
		var pas1 = $('#password').val();
		var pas2 = $('#password_confirmation').val();
		var nf = $('#notif').text();

		if (pas1 != pas2) {
			$('#not_match').text('Password Tidak Cocok');
			$('#simpan').prop('disabled', true);
		} else {
			$('#not_match').text(' ');
			$('#simpan').removeProp('disabled');
		}

		if(nf == 'Username sudah digunakan') {
			$('#simpan').prop('disabled', true);
		}
	});


	 // $("#username").keyup(function(){
	 // 	var username = $("#username").val();
	 // 	$.get(home_url + '/admin/user/cekusername/'+username, function(data){
		// if(data == 'Username sudah digunakan'){
	 // 		$('#notif').text(data);
	 // 		$('#simpan').prop('disabled', true);
	 // 	}else if(data == '0'){
	 // 		$("#notif").text(' ');
	 // 		$("#simpan").removeProp('disabled');
	 // 	}
	 // 	});
	 // });
	 // jumlah karakter minimal
		// 	var jum_karakter_minimal = 3;

		// 	// pesan error jika username < 3
		// 	var karakter_minimal_error = "Karakter kurang dari 3";

		// 	// pesan cek username
		// 	var pesan_cek = 'cek username ...';

		// 	// variabel username
		// 	var check_username = $('#username');

		// 	// variabel result hasil cek
		// 	var hasil_cek_username = $('.hasil_cek_username')

		// 	// menggunakan onkeyup untuk mendeteksi setiap inputan
		// 	check_username.on('keyup', function(){

		// 		if(check_username.val().length <= jum_karakter_minimal) {
					
		// 			hasil_cek_username.html(karakter_minimal_error);

		// 		} else {

		// 			// hasil_cek_username.html(pesan_cek);

		// 			// // check username
		// 			cek_username();
		// 		}

		// 	});


	 // function cek_username() {
		// var username = $('input[name="username"]').val();
		// $.get("cek_username.php", {username: username}, function (hasil){
		// 	if (hasil == 1) {
		// 		hasil_cek_username.html('<strong>'+username+'</strong> tersedia');
		// 	} else {
		// 		hasil_cek_username.html('<strong>'+username+'</strong> sudah digunakan!');
		// 	}
		// });
}
});
</script>
@endsection