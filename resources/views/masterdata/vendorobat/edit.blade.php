@extends('template')
@section('main')
<h2>Tambah Obat</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('masterdata.vendorobat.index') }}"><i class="entypo-home"> Daftar Vendor Obar</i></a>
	</li>
	<li class="active">
		<strong>Tambah Vendor Obat</strong>
	</li>
</ol>
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="row" style="margin-top: 15px;">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-body">
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('masterdata.vendorobat.update', ['nama_vendor' => $vendor[0]->nama_vendor]) }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Vendor</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="nama_vendor" placeholder="nama vendor" required value="{{$vendor[0]->nama_vendor}}">
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Alamat</label>
						<div class="col-sm-5">
							<textarea name="alamat" class="form-control">{{$vendor[0]->alamat}}</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No.Tlp</label>
						<div class="col-sm-5">
							<input type="text" class="form-control numberValidation" name="no_telp" placeholder="no telpon" required value="{{$vendor[0]->no_telp}}">
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;PIC/CP</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="pic" placeholder="contact person" required value="{{$vendor[0]->pic}}">
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;HP</label>
						<div class="col-sm-5">
							<input type="text" class="form-control numberValidation" name="no_hp" placeholder="no handphone" required value="{{$vendor[0]->no_hp}}">
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Email</label>
						<div class="col-sm-5">
							<input type="email" class="form-control" name="email" placeholder="email" required value="{{$vendor[0]->email}}">
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Deskripsi</label>
						<div class="col-sm-5">
							<textarea name="deskripsi" class="form-control">{{$vendor[0]->deskripsi}}</textarea>
						</div>
					</div>
					<hr>
					<?php $i = 0; ?>
					@foreach($vendor as $data)
					<?php $i++; ?>
					<div id="obat_<?= $i; ?>">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Barang/Obat</label>
									<div class="col-sm-5">
										<select name="obat_id[]" class="form-control selectboxit" id="obat_<?= $i; ?>" required>
											<option selected="selected" disabled value="Pilih">Pilih Obat</option>
												@foreach ($obats as $_obat)
													<option value="{{$_obat->id}}" @if($data->obat_id == $_obat->id) selected @endif>{{$_obat->nama_obat}}</option>
												@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Catatan</label>
							<div class="col-sm-5">
								<textarea id="catatan_<?= $i; ?>" name="catatan[]" class="form-control">{{$data->catatan}}</textarea>
							</div>
						</div>
					</div>
					@endforeach
					<div id="tambah_list"></div>
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label"></label>

						<div class="col-sm-5">
							<button type="button" id="tambah_obat" class="btn btn-blue btn-icon icon-left">
							Tambah
							<i class="entypo-plus"></i>
							</button>
						</div>
					</div>
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('masterdata.vendorobat.index') }}" class="btn btn-red btn-icon icon-left">
								Kembali
							<i class="entypo-cancel"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var loop = <?= ++$i ?>;
	$('.numberValidation').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
    });

    $(document).ready(function () {
    	$('#tambah_obat').click(function(e) {
    		e.preventDefault();
    		var html = '';
    		html += '<div id="obat_'+loop+'">' +
					'<div class="form-group">' +
					'<div class="row">' +
					'<div class="col-md-12">' +
					'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Barang/Obat</label>' +
					'<div class="col-sm-5">' +
					'<select name="obat_id[]" class="form-control" id="obat_'+loop+'">' +
					'@foreach($obats as $obat)' +
					'<option value="{{$obat->id}}">{{$obat->nama_obat}}</option>' +
					'@endforeach' +
					'</select>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'<div class="form-group">' +
					'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Catatan</label>' +
					'<div class="col-sm-5">' +
					'<textarea name="catatan[]" class="form-control" id="catatan_'+loop+'"></textarea>' +
					'</div>' +
					'</div>' +
					'<div class="form-group">' +
					'<div class="col-sm-offset-3 col-sm-5">' +
					'<button type="button" class="btn btn-red btn-icon hapus" data-id="'+loop+'">' +
					'Hapus' +
					'<i class="entypo-cancel"></i>' +
					'</button>' +
					'</div>' +
					'</div>' +
					'</div>';

					$('#tambah_list').append(html);
					$('#obat_'+loop).select2();
					loop++;
    	});

    	$("#tambah_list").on('click','.hapus', function(e){
			e.preventDefault();
			var id = $(this).data('id');
			$("#obat_"+id).remove();
		});
    });
</script>
@endsection