@extends('template')
@section('main')
<div class="row">
	<div class="col-md-12">
		<div style="margin-left: 18px;">
			<h2>Data Akun</h2>
			<h4>Menu ini digunakan untuk mengatur data akun keuangan klinik.</h4>
		</div>
		<div class="col-md-6">
			<a href="javascript:;" onclick="jQuery('#modal-9').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-info btn-icon icon-left">
				<i class="entypo-plus"></i>
					Tambah akun
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
					<th width="3%">No</th>
					<th>Tipe</th>
					<th>Nama Akun</th>
					<th width="20%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($akun as $akun)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$akun->tipeAkun->nama_tipe}}</td>
					<td>{{$akun->nama_akun}}</td>
					<td>
						<div align="center">
							<a href="javascript:;" onclick="jQuery('#modal-8{{$akun->id_akun}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-blue btn-icon icon-left">
								<i class="entypo-pencil"></i>
								Ubah
							</a>

							<a href="javascript:;" onclick="jQuery('#modal-7{{$akun->id_akun}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
								<i class="entypo-trash"></i>
								Hapus
							</a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="modal fade" id="modal-9">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Tambah Akun</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('akun.save')}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tipe Akun</label>
													<div class="col-sm-5">
														<select name="id_tipe" class="form-control" required data-placeholder="Pilih tipe akun..." required>
															<optgroup label="Pilih Tipe">
																<?php $tipee = \App\TipeAkun::all(); ?>
																@foreach($tipee as $tipe)
																	<option value="{{$tipe->id_tipe}}">{{$tipe->nama_tipe}}</option>
																@endforeach
															</optgroup>
														</select>
													</div>
												</div>
											</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Akun</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" name="nama_akun" required>
													</div>
												</div>
											</div>
										</div>
										<br/>
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


<?php
	$akuns = \App\NamaAkun::orderBy('id_akun','DESC')->get();
?>
			@foreach($akuns as $akun)
			<div class="modal fade" id="modal-8{{$akun->id_akun}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Ubah Akun</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('akun.update', ['id'=>$akun->id_akun])}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tipe Akun</label>
													<div class="col-sm-5">
														<select name="id_tipe" class="form-control" id="id_tipe" required data-placeholder="Pilih tipe akun..." required>
															<optgroup label="Pilih Tipe">
																@foreach($tipee as $tipe)
																<option value="{{$tipe->id_tipe}}" @if($akun->id_tipe == $tipe->id_tipe) selected @endif>{{$tipe->nama_tipe}}</option>
																@endforeach
															</optgroup>
														</select>
													</div>
												</div>
											</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Akun</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" name="nama_akun" value="{{$akun->nama_akun}}" required>
													</div>
												</div>
											</div>
										</div>
										<br/>
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

			@foreach($akuns as $akun)
			<div class="modal fade" id="modal-7{{$akun->id_akun}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Akun</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('akun.delete', ['id'=>$akun->id_akun])}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus Nama Akun {{$akun->nama_akun}}!</h4></center>
											</div>
										</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="submit" name="simpan" id="simpan" class="btn btn-danger btn-icon icon-left col-left">
							<i class="entypo-trash"></i>
							Ya</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			@endforeach

</div>
@endsection