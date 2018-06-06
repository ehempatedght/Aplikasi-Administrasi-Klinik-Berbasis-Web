@extends('template')
@section('main')
<h2>Daftar Vendor Obat</h2>
<h5>Menu ini digunakan untuk melihat dan menambahkan vendor obat</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('masterdata.vendorobat.create')}}">
	<i class="entypo-plus"></i>Tambah Vendor
</a>
<br/>
<br/>
@if(session('message'))
    <div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
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
					} );
						} );
		</script>
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th width="1%">No</th>
					<th>Nama Vendor</th>
					<th>Alamat</th>
					<th>PIC/CP</th>
					<th width="12%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($vendorobat as $row)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$row->nama_vendor}}</td>
					<td>{{$row->alamat}}</td>
					<td>{{$row->pic}}</td>
					<td>
						<div align="center">
							<form action="{{route('masterdata.vendorobat.delete', ['nama_vendor'=>$row->nama_vendor])}}" method="post">
								{{ csrf_field() }}
							<a href="{{route('masterdata.vendorobat.edit', ['nama_vendor' => $row->nama_vendor]) }}" class="btn btn-sm btn-green btn-icon icon-left">
								<i class="entypo-pencil"></i>
								Ubah
							</a>
							 {{-- <a href="javascript:;" onclick="jQuery('#modal-7{{$row->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
								<i class="entypo-trash"></i>
								Hapus
							</a> --}}
							</form>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@foreach($vendorobat as $row)
			<div class="modal fade" id="modal-7{{$row->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Vendor Obat</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('masterdata.vendorobat.delete', ['nama_vendor'=>$row->nama_vendor])}}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus Vendor Obat {{$row->nama_vendor}}!</h4></center>
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