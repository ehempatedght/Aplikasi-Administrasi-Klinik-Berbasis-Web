@extends('template')

@section('main')
<h2>Tambah Data Kelurahan</h2>
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
@if(session('message'))
    <div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
@endif
<div class="row">
	<div class="col-md-12">
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

				jQuery( document ).ready( function( $ ) {
					var $table4 = jQuery( "#table-2" );
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
		<hr />
		<ol class="breadcrumb bc-3" >
			<li>
				<a href="{{route('kelurahan.index')}}"><i class="fa fa-home"></i>Data Kelurahan</a>
			</li>
			<li class="active">
				<strong>Tambah Data Kelurahan</strong>
			</li>
		</ol>
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-body">
				<form role="form" class="form-horizontal" action="{{ route('kelurahan.insert') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kota</label>
								<div class="col-sm-4">
									<select name="id_kota" class="selectboxit">
										<option selected="selected" disabled value="Pilih">Pilih Kota</option>
											@foreach ($kotas as $kota)
												<option value="{{$kota->id}}">{{$kota->nama_kota}}</option>
											@endforeach
									</select>
								</div>
								<div class="col-sm-3">
									<button href="javascript:;" onclick="jQuery('#modal-7').modal('show', {backdrop: 'static'});" type="button" class="btn btn-info">
										<i class="entypo-plus"></i>
									</button>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kecamatan</label>
								<div class="col-sm-4">
									<select name="kec_id" class="selectboxit">
										<option selected="selected" disabled value="Pilih">Pilih Kecamatan</option>
											@foreach ($kecamatans as $kecamatan)
												<option value="{{$kecamatan->id}}">{{ $kecamatan->nama_kecamatan.' | '.$kecamatan->kota->nama_kota}}</option>
											@endforeach
									</select>
								</div>
								<div class="col-sm-3">
									<button href="javascript:;" onclick="jQuery('#modal-8').modal('show', {backdrop: 'static'});" type="button" class="btn btn-info">
										<i class="entypo-plus"></i>
									</button>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Kelurahan</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="nama_kelurahan" placeholder="nama kelurahan" required>
						</div>
					</div>

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('kelurahan.index') }}" class="btn btn-red btn-icon icon-left">
								Kembali
							<i class="entypo-cancel"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-7">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tambah Kota</h4>
				</div>
				
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered datatable" id="table-1">
									<thead>
										<tr>
											<th width="2%">No</th>
											<th>Kota</th>
											{{-- <th>Aksi</th> --}}
										</tr>
									</thead>
									<tbody>
										<?php $no=1; ?>
										@foreach($kotas as $kota)
										<tr>
											<td>{{$no++}}</td>
											<td>{{$kota->nama_kota}}</td>
											{{-- <td>
												<div align="center">
													<form action="{{route('kelurahan.deletekota', ['id'=>$kota->id]) }}" method="post">
														@csrf
														<button type="submit" class="btn btn-sm btn-danger btn-icon icon-left" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS KOTA {{strtoupper($kota->nama_kota) }}')">
										                    <i class="entypo-trash"> </i>
										                    Hapus
		                  								</button>
													</form>
												</div>
											</td> --}}
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form action="{{route('kelurahan.kota')}}" method="post">
									@csrf
								<div class="form-group">
									<br/>
									<label for="field-1" class="control-label">Nama Kota</label>
									<input type="text" class="form-control" name="nama_kota" placeholder="nama kota" required>
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
	
	<div class="modal fade" id="modal-8">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tambah Kecamatan</h4>
				</div>
				
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered datatable" id="table-2">
								<thead>
									<tr>
										<th width="2%">No</th>
										<th>Kecamatan</th>
										{{-- <th>Aksi</th> --}}
									</tr>
								</thead>
								<tbody>
									<?php $no=1; ?>
									@foreach($kecamatans as $kecamatan)
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $kecamatan->nama_kecamatan.' | '.$kecamatan->kota->nama_kota; ?></td>
										{{-- <td>
											<div align="center">
												<form action="{{ route('kelurahan.deletekec', ['id'=> $kecamatan->id]) }}" method="post">
													@csrf
													<button type="submit" class="btn btn-sm btn-danger btn-icon icon-left" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS KECAMATAN {{strtoupper($kecamatan->nama_kecamatan) }}')">
										                    <i class="entypo-trash"> </i>
										                    Hapus
		                  							</button>
												</form>
											</div>
										</td> --}}
									</tr>
									@endforeach
								</tbody>	
							</table>
						</div>
					</div>
					<div class="row">
						<br/>
						<div class="col-md-6">
							<form action="{{route('kelurahan.kecamatan')}}" method="post">
								@csrf
								<div class="form-group">
									<label for="field-1" class="control-label">Kota</label>
									<select name="id_kota" class="selectboxit" required="">
										<option selected="selected" disabled value="Pilih">Pilih Kota</option>
											@foreach ($kotas as $kota)
												<option value="{{$kota->id}}">{{$kota->nama_kota}}</option>
											@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="field-1" class="control-label">Nama Kecamatan</label>
									<input type="text" class="form-control" name="nama_kecamatan" placeholder="nama kecamatan" required>
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
<script>
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
