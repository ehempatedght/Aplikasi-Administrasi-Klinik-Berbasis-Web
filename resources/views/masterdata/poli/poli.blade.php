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
						<th data-hide="phone">No</th>
						<th>Nama Poli</th>
						<th width="25%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; ?>
					@foreach($polis as $poli)
					<tr>
						<td><?php echo $no++; ?></td>
						<td>{{$poli->nama_poli}}</td>
						<td>
							<div align="center">
								<form action="{{route('poli.hapus', ['id'=> $poli->id ]) }}" method="post">
									{{ csrf_field() }}
									<a href="javascript:;" onclick="jQuery('#modal-8{{$poli->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-info btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
									</a>


									<button type="submit" class="btn btn-sm btn-danger btn-icon icon-left" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS POLI INI?')">
					                    <i class="entypo-cancel"> </i>
					                    Hapus
                  					</button>
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
									<form action="{{route('poli.insert')}}" method="post">
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
							<h4 class="modal-title">UBAH POLI {{$poli->nama_poli}}</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('poli.update', ['id'=>$poli->id])}}" method="post">
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
		</div>
	</div>
</div>
@endsection