@extends('template')

@section('main')
<h2>Atur Jadwal Petugas Medis</h2>
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
					});
</script>
<div class="row">
	<div class="col-md-12">
		<hr />
		<ol class="breadcrumb bc-3" >
			<li>
				<a href="{{route('masterdata.petugasmedis.jadwal.index')}}"><i class="fa fa-home"></i>Lihat Jadwal</a>
			</li>
			<li class="active">
				<strong>Atur Jadwal Petugas Medis</strong>
			</li>
		</ol>
		
			<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th data-hide="phone">No</th>
					<th>Kategori</th>
					<th>Nama</th>
					<th>Spesialisasi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($petugass as $petugas)
				<tr>
					<td>{{$no++}}</td>
					<td>
						<center>
							<span class="label label-primary">{{strtoupper($petugas->category->nama_kategori)}}</span>
						</center>
					</td>
					<td>{{$petugas->nama}}</td>
					<td width="30%">{{$petugas->spesialisasi}}</td>
					<td>
						<div align="center">
							<form action="#" method="POST">
								<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('masterdata.petugasmedis.jadwal.atur', $petugas->id)}}">
									<i class="entypo-check"></i>Pilih
								</a>
							</form>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<script src="{{asset('js/bootstrap-material-datetimepicker.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".datatable").on('click','.add', function(e){
			e.preventDefault();
			var id = $(this).data('id');
			
			$.get(home_url + '/petugas/cari_petugas/'+id, function (data){
				$("#nama").val(data.nama);
				$("#kategori").val(data.nama_kategori);
				$("#alamat").val(data.alamat);
				$("#kota").val(data.kota);
				$("#no_hp").val(data.no_hp);
				$("#no_telp").val(data.no_telp);
				$("#alamat_email").val(data.alamat_email);
				$("#tgl_mulai_praktek").val(data.tgl_mulai_praktek);
			});
		});


		$('#time').timepicker();
		$('#time2').timepicker();
		$('#time3').timepicker();
		$('#time4').timepicker();
		$('#time5').timepicker();
		$('#time6').timepicker();
		$('#time7').timepicker();
		$('#time8').timepicker();
		$('#time9').timepicker();
		$('#time10').timepicker();
		$('#time11').timepicker();
		$('#time12').timepicker();
		$('#time13').timepicker();
		$('#time14').timepicker();
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

@section('scripts')
  <script>
  var app = new Vue({
    el: '#app',
    data: {
      daysSelected: []
    }
  });
  </script>
@endsection