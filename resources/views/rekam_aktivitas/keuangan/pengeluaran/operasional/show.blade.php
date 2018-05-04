@extends('template')
@section('main')
<h2>Lihat Operasional Pada Tanggal {{date("d M Y", strtotime($operasional[0]->tgl)) }}</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('pengeluaran.operasional.index') }}"><i class="entypo-home"> Daftar Operasional</i></a>
	</li>
	<li class="active">
		<strong>Lihat Operasional</strong>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('pengeluaran.operasional.update', ['tgl' => $operasional[0]->tgl]) }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" name="tgl" data-format="dd MM yyyy" placeholder="tanggal" value="{{date("d M Y", strtotime($operasional[0]->tgl)) }}" readonly>
										
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div id="tambah">
					<?php $i = 0; ?>
					@foreach($operasional as $operasional)
					<?php $i++; ?>
					<div id="ket_<?= $i; ?>">
						<hr>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah</label>
							
							<div class="col-sm-5">
								<input type="text" class="form-control numbers jumlah" id="jumlah_<?= $i; ?>" name="jumlah[]" placeholder="jumlah" value="{{$operasional->jumlah}}" readonly autocomplete="off" onkeyup="hitung_total()" required/>
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Keterangan</label>
							<div class="col-sm-5">
								<textarea id="keterangan_<?= $i; ?>" name="keterangan[]"  placeholder="keterangan" class="form-control" readonly>{{$operasional->keterangan}}</textarea>
							</div>
						</div>
					</div>
					@endforeach
					</div>
					{{-- <div id="tambah_list"></div>
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label"></label>

						<div class="col-sm-5">
							<button type="button" id="tambah_ket" class="btn btn-blue btn-icon icon-left">
							Tambah
							<i class="entypo-plus"></i>
							</button>
						</div>
					</div> --}}
					<hr>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Total</label>
							
						<div class="col-sm-5">
							<input type="text" class="form-control numbers" id="total" name="total" placeholder="total" value="{{$operasional->total}}" required readonly/>
						</div>
					</div>
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<a href="{{ route('pengeluaran.operasional.index') }}" class="btn btn-red btn-icon icon-left">
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