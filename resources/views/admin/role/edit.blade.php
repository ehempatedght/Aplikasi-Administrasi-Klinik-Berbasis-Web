@extends('template')
@section('main')
<h2>Edit Role</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('role.index') }}"><i class="entypo-home"> Daftar Role</i></a>
	</li>
	<li class="active">
		<strong>Edit Role</strong>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('role.update', $role->id) }}" method="post">
					@csrf
					{{method_field('PUT')}}
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Nama</label>
							
							<div class="col-sm-5">
								<input type="text" class="form-control" id="field-1" name="name" value="{{$role->name}}" required>
							</div>
						</div>
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" class="btn btn-green btn-icon icon-left col-left">
						Ubah
						<i class="entypo-check"></i>
						</button>
						<a href="{{route('role.index')}}" type="submit" name="cancel" class="btn btn-red btn-icon icon-left col-left">
						Batal
						<i class="entypo-cancel"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
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