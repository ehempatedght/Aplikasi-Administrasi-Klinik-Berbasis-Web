@extends('template')
@section('main')
<div class="row">
	<div class="col-md-12">
		<div style="margin-left: 18px;">
			<h2>Data Alat Medis</h2>
			<h4>Menu ini digunakan untuk memasukkan data alat medis</h4>
		</div>
		<div class="col-md-6">
			<a href="javascript:;" onclick="jQuery('#modal-9').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-info btn-icon icon-left">
				<i class="entypo-plus"></i>
					Tambah alat medis
			</a>
		</div>
		<br/>
		<div class="panel-body">
			@if(session('message'))
    			<div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
			@endif
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<script type="text/javascript">
					jQuery( document ).ready( function( $ ) {
						var $table4 = jQuery( "#table-1" );
						$table4.DataTable( {
							dom: 'Bfrtip',
							buttons: [
								'copyHtml5',
								'excelHtml5',
								'csvHtml5',
								'pdfHtml5'
							]
						} );
							} );
			</script>
			<table class="table table-bordered datatable" id="table-1">
				<thead>
					<tr>
						<th width="1%">No</th>
						<th>Kode Alat</th>
						<th>Nama Alat</th>
						<th>Jenis Alat</th>
						<th>Jumlah</th>
						<th width="16%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; ?>
					@foreach($peralatanmediks as $alat_medis)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$alat_medis->kd_alat}}</td>
						<td>{{$alat_medis->nm_alat}}</td>
						<td>{{$alat_medis->jenis_alat}}</td>
						<td>{{$alat_medis->jumlah}}</td>
						<td>
							<div align="center">
								<a href="javascript:;" onclick="jQuery('#modal-8{{$alat_medis->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-info btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
								</a>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			@foreach($peralatanmediks as $alat_medis)
			<div class="modal fade" id="modal-8{{$alat_medis->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Ubah Alat {{$alat_medis->nm_alat}}</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('masterdata.peralatan.medis.update', ['id'=>$alat_medis->id])}}" method="post" class="form-horizontal form-groups-bordered">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kode Alat</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" name="kd_alat" value="{{$alat_medis->kd_alat}}">
													</div>
												</div>
											</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Alat</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" name="nm_alat" value="{{$alat_medis->nm_alat}}">
													</div>
												</div>
											</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jenis Alat</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" name="jenis_alat" value="{{$alat_medis->jenis_alat}}">
													</div>
												</div>
											</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" name="jumlah" value="{{$alat_medis->jumlah}}">
													</div>
												</div>
											</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Deskripsi</label>
													<div class="col-sm-5">
														<textarea type="textarea" class="form-control" name="description">{{$alat_medis->description}}</textarea>
													</div>
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
							<i class="entypo-check"></i>
							Ubah</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		@endforeach

		<div class="modal fade" id="modal-9">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Tambah Alat Medis</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('masterdata.peralatan.medis.insert')}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kode Alat</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" name="kd_alat" required>
													</div>
												</div>
											</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Alat</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" name="nm_alat" required>
													</div>
												</div>
											</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jenis Alat</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" name="jenis_alat" required>
													</div>
												</div>
											</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" name="jumlah" required>
													</div>
												</div>
											</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Deskripsi</label>
													<div class="col-sm-5">
														<textarea type="textarea" class="form-control" name="description" required>
														</textarea>
													</div>
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
							<i class="entypo-check"></i>
							Simpan</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection