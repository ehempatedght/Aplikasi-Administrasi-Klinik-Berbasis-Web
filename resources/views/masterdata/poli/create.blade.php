@extends('template')
@section('main')
<h2>Tambah Data Poli</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('masterdata.poli.index') }}"><i class="entypo-home"> Daftar Poli</i></a>
	</li>
	<li class="active">
		<strong>Tambah Data Poli</strong>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('masterdata.poli.insert') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Nama Poli</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="nama_poli" required onkeyup="this.value = this.value.toUpperCase()">
						</div>
					</div>
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('masterdata.poli.index') }}" class="btn btn-red btn-icon icon-left">
								Kembali
							<i class="entypo-cancel"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection