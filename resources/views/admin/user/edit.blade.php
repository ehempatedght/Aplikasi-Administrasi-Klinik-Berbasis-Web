@extends('template')

@section('main')
<h2>Edit User {{$user->username}}</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('users.index') }}"><i class="entypo-home"> Daftar User</i></a>
	</li>
	<li class="active">
		<strong>Edit User</strong>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('users.update', $user->id) }}" method="post">
					{{ csrf_field() }}
					{{method_field('PUT')}}

					<div class="form-group">
						<label class="col-sm-3 control-label"style="text-align:left;">&emsp;Role</label>
						
						<div class="col-sm-5">
							
							<select name="role" class="select2" data-allow-clear="true" data-placeholder="" required>
								<option>Pilih Role</option>
								@if($roles->count())
									@foreach ($roles as $role)
										<option value="{{$role->id}}" {{$currentRole->id == $role->id ? 'selected="selected"' : ''}}>{{$role->name}}</option>
									@endforeach
								@endif
							</select>
							
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Username</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="username" placeholder="username" value="{{$user->username}}" onkeyup="this.value=this.value.toLowerCase()" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;First Name</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="first_name" placeholder="first name" value="{{$user->first_name}}" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Last Name</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="last_name" placeholder="last name" value="{{$user->last_name}}"required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Email</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="email" placeholder="email" value="{{$user->email}}" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"style="text-align:left;">&emsp;Password</label>
						
						<div class="col-sm-5">
							<input type="password" class="form-control" id="field-1" name="ganti_password">*Isi jika ingin mengubah password
						</div>
					</div>

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" class="btn btn-green btn-icon icon-left col-left">
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
@endsection