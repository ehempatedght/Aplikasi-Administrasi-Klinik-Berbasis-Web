@extends('template')
@section('main')
<h2>Daftar Obat</h2>
<h5>Menu ini digunakan untuk menambahkan jenis obat</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{ route('jenisobat.create') }}">
	<i class="entypo-back"></i>Kembali
</a>
<br/>
<br/>
@if(session('message'))
    <div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
@endif
<div class="form-horizontal" style="margin-left: -24px;">
	<div class="form-group row">
			<div class="col-md-12">
				<label for="field-1" class="col-sm-2 control-label" style="text-align:left;">&emsp;Kode Jenis</label>
				<div class="col-sm-3" style="margin-left: -78px; margin-right: 55px;">
					<input class="form-control" id="kode" name="kd_jenis" type="text" placeholder="kode jenis" required value="{{$kd_jenis}}" />
				</div>
				<label for="field-1" class="col-sm-2 control-label" style="text-align:left; margin-left: -40px;">Nama Jenis</label>
				<div class="col-sm-3" style="margin-left: -78px; margin-right: 14px;">
					<input class="form-control" id="jenis" name="name" type="text" placeholder="nama jenis obat" required/>
				</div>
				<button class="btn btn-primary" type="submit" id="add">
		    		<span class="glyphicon glyphicon-plus"></span> TAMBAH
		    	</button>
			</div>
			{{ csrf_field() }}
	</div>
</div>
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
					<th>Kode Jenis</th>
					<th>Nama Jenis</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($jenis_obat as $jenis_obat)
				<tr class="jenis{{$jenis_obat->id}}">
					<td>{{$jenis_obat->id}}</td>
					<td>{{$jenis_obat->kd_jenis}}</td>
					<td>{{$jenis_obat->name}}</td>
					<td><button class="edit-modal btn btn-info" data-id="{{$jenis_obat->id}}"
  							data-name="{{$jenis_obat->name}}">
  							<span class="glyphicon glyphicon-edit"></span> Ubah
  						</button>
  						<button class="delete-modal btn btn-danger"
  							data-id="{{$jenis_obat->id}}" data-name="{{$jenis_obat->name}}">
  							<span class="glyphicon glyphicon-trash"></span> Hapus
  						</button></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<script>
	$(document).ready(function() {
		$("#add").click(function() {
			$.ajax({
            type: 'post',
            url: 'jenisobat/addjenis',
            data: {
                '_token': $('input[name=_token]').val(),
                'kd_jenis' : $('input[name=kd_jenis]').val(),
                'name': $('input[name=name]').val()
            },
            
            success: function(data) {
                if ((data.errors)){
                  $('.error').removeClass('hidden');
                    $('.error').text(data.errors.name);
                }
                else {
                    $('.error').addClass('hidden');
                    $('#list').append("<tr class='jenis" + data.id + "'><td>"+data.id+"</td><td>"+data.kd_jenis+"</td><td>"+data.name+"</td> <td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Ubah</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Hapus</button></td></tr>");
                }
            },

        });
			$('#kode').val('');
        	$('#jenis').val('');
		});



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