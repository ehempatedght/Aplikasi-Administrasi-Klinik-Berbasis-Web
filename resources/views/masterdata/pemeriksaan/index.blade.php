@extends('template')
@section('main')
<div class="row">
	<div class="col-md-12">
		<div style="margin-left: 18px;">
			<h2>Data Pemeriksaan</h2>
			<h4>Menu ini digunakan untuk memasukkan data pemeriksaan</h4>
		</div>
		<div class="col-md-6">
			<a href="{{route('pemeriksaan.create')}}" class="btn btn-success btn-sm btn-icon">
				<i class="entypo-plus icon-white"></i>
				Tambah Data Pemeriksaan
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
						<th>Kategori</th>
						<th>Nama Pemeriksaan</th>
						<th width="10%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; ?>
					@foreach($data_pemeriksaan as $row)
					<tr>
						<td><center><?php echo $no++; ?></center></td>
						<td>{{$row->kategori_pemeriksaan->nama_kategori}}</td>
						<td>{{$row->nama_pemeriksaan}}</td>
						<td>
							<div align="center">
								<form action="#" method="post">
									<a href="{{route('pemeriksaan.edit', $row->id_dpemeriksaan)}}" class="btn btn-sm btn-info btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
									</a>
									{{-- <button type="submit" class="btn btn-sm btn-danger btn-icon icon-left"> <i class="entypo-trash"></i>
					                    Hapus
                  					</button> --}}
								</form>
							</div> 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection