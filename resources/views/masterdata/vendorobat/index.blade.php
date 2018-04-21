@extends('template')
@section('main')
<h2>Daftar Obat</h2>
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
					<th data-hide="phone">No</th>
					<th>Nama Vendor</th>
					<th>Alamat</th>
					<th>PIC/CP</th>
					<th>Aksi</th>
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
							 <button type="submit" class="btn btn-sm btn-danger btn-icon icon-left" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS VENDOR INI?')">
			                    <i class="entypo-cancel"> </i>
			                    Hapus
			                </button>
							</form>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
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