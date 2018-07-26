@extends('template')
@section('main')
<h2>Daftar Obat</h2>
<h5>Menu ini digunakan untuk menambahkan daftar obat</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{ route('masterdata.daftarobat.create') }}">
	<i class="entypo-plus"></i>Tambah Obat
</a>
<br/>
<br/>
@if(session('message'))
    <div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
@endif
@if(session('message2'))
    <div class="alert alert-info">{{session('message2')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
@endif
<div class="row">
	<div class="col-md-12">
		<br/>
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
					});
						} );
		</script>
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th width="1%">No</th>
					<th>Jenis</th>
					<th>Nama Obat</th>
					<th>Stok</th>
					<th width="200px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($jenis_obat as $row)
				<tr>
					<td><center>{{$no++}}</center></td>
					<td>{{$row->jenis_obat->jns_obt}}</td>
					<td>{{$row->nama_obat}}</td>
					<td>{{$row->stok}}</td>
					<td>
						<div align="center">
							<form action="#" method="post">
								{{ csrf_field() }}
								<a href="{{route('masterdata.daftarobat.edit', ['id' => $row->id]) }}" class="btn btn-sm btn-green btn-icon icon-left">
									<i class="entypo-pencil"></i>
									Ubah
								</a>
								<a href="javascript:;" onclick="jQuery('#modal-7{{$row->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
								<i class="entypo-trash"></i>
								Hapus
							</a>
							</form>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@foreach($jenis_obat as $row)
			<div class="modal fade" id="modal-7{{$row->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Obat</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('masterdata.daftarobat.delete', ['id'=>$row->id]) }}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus Obat {{$row->nama_obat}}!</h4></center>
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