@extends('template')
@section('main')
<div class="row">
	<div class="col-md-12">
		<div style="margin-left: 18px;">
			<h2>Data Poli</h2>
			<h4>Menu ini digunakan untuk memasukkan data poli</h4>
		</div>
		<div class="col-md-6">
			<a href="javascript:;" onclick="jQuery('#modal-7').modal('show', {backdrop: 'static'});" class="btn btn-success btn-sm btn-icon">
				<i class="entypo-plus icon-white"></i>
				Tambah Data Poli
			</a>
		</div>
		<br/>
		<div class="panel-body">
			@if(session('message'))
    			<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						setTimeout(function()
						{
							var opts = {
								"closeButton": true,
								"debug": false,
								"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
								"toastClass": "black",
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							};
					
							toastr.success("{{session('message')}}", opts);
						}, 5);
					});
    			</script>
			@endif
			@if(session('message2'))
    			<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						setTimeout(function()
						{
							var opts = {
								"closeButton": true,
								"debug": false,
								"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
								"toastClass": "black",
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							};
					
							toastr.error("{{session('message2')}}", opts);
						}, 5);
					});
    			</script>
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
						<th>Nama Poli</th>
						<th width="25%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; ?>
					@foreach($polis as $poli)
					<tr>
						<td><center><?php echo $no++; ?></center></td>
						<td>{{$poli->nama_poli}}</td>
						<td>
							<div align="center">
								<form action="{{route('masterdata.poli.hapus', ['id'=> $poli->id ]) }}" method="post">
									{{ csrf_field() }}
									<a href="javascript:;" onclick="jQuery('#modal-8{{$poli->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-info btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
									</a>


									<a href="javascript:;" onclick="jQuery('#modal-7{{$poli->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
								<i class="entypo-trash"></i>
								Hapus
							</a>
								</form>
							</div> 
							{{-- {!! Form::open(['method'=>'DELETE','route'=>['petugas.destroy', $petugas->id]]) !!}
								{{ Form::button('<i class="entypo-pencil"></i> Hapus',['type'=>'submit', 'class'=>'btn btn-danger btn-sm btn-icon icon-left'])}}
							{!! Form::close() !!} --}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="modal fade" id="modal-7">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">TAMBAH POLI</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('masterdata.poli.insert')}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Poli</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" name="nama_poli" required onkeyup="this.value = this.value.toUpperCase()">
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
			@foreach($polis as $poli)
			<div class="modal fade" id="modal-8{{$poli->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">UBAH {{$poli->nama_poli}}</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('masterdata.poli.update', ['id'=>$poli->id])}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Poli</label>
													<div class="col-sm-5">
														<input type="text" class="form-control" name="nama_poli" value="{{$poli->nama_poli}}" required onkeyup="this.value = this.value.toUpperCase()">
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

			@foreach($polis as $poli)
			<div class="modal fade" id="modal-7{{$poli->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Poli</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('masterdata.poli.hapus', ['id'=> $poli->id ]) }}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus {{$poli->nama_poli}}!</h4></center>
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
	</div>
</div>
@endsection