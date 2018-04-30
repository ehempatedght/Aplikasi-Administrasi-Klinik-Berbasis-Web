@extends('template')
@section('main')
<h2>Edit Operasional Pada Tanggal {{date("d M Y", strtotime($operasional[0]->tgl)) }}</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('pengeluaran.operasional.index') }}"><i class="entypo-home"> Daftar Operasional</i></a>
	</li>
	<li class="active">
		<strong>Edit Operasional</strong>
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
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-body">
				<form role="form" class="form-horizontal" action="{{ route('pengeluaran.operasional.update', ['tgl' => $operasional[0]->tgl]) }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" name="tgl" data-format="dd MM yyyy" placeholder="tanggal" value="{{date("d M Y", strtotime($operasional[0]->tgl)) }}">
										
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div id="tambah">
					<?php $i = 0; ?>
					@foreach($operasional as $operasional)
					<?php $i++; ?>
					<div id="ket_<?= $i; ?>">
						<hr>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah</label>
							
							<div class="col-sm-5">
								<input type="text" class="form-control numbers jumlah" id="jumlah_<?= $i; ?>" name="jumlah[]" placeholder="jumlah" value="{{$operasional->jumlah}}" autocomplete="off" onkeyup="hitung_total()" required />
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Keterangan</label>
							<div class="col-sm-5">
								<textarea id="keterangan_<?= $i; ?>" name="keterangan[]"  placeholder="keterangan" class="form-control">{{$operasional->keterangan}}</textarea>
							</div>
						</div>
						@if($i >= 2)
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button type="button" class="btn btn-red btn-icon icon-left hapus" data-id="<?= $i; ?>"> Hapus
									<i class="entypo-cancel"></i>
								</button>
							</div>
						</div>
						@else
	                  	&nbsp;
						@endif
					</div>
					@endforeach
					</div>
					<div id="tambah_list"></div>
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label"></label>

						<div class="col-sm-5">
							<button type="button" id="tambah_ket" class="btn btn-blue btn-icon icon-left">
							Tambah
							<i class="entypo-plus"></i>
							</button>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Total</label>
							
						<div class="col-sm-5">
							<input type="text" class="form-control numbers" id="total" name="total" placeholder="total" value="{{$operasional->total}}" required readonly/>
						</div>
					</div>
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
						<a href="{{ route('pengeluaran.operasional.index') }}" class="btn btn-red btn-icon icon-left">
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
	var loop = <?= ++$i; ?>;
	function jumlah(e) {
		var id = e.id;
		var jumlah_id = $('#jumlah_'+id).val();
		$('#jumlah_'+id).val(jumlah_id);

		hitung_total();
	}

	function hitung_total() {
		var total = 0;
		$(".jumlah").each(function () {
			var num = parseFloat(this.value.replace(/,/g,''));
			if (!isNaN(num)) {
				total += num;
			}

			$("#total").val(total);
		});
	}

	$(document).ready(function () {
		$('#tambah_ket').click(function(e) {
			e.preventDefault();
			var html = '';
			html += 
					'<div id="ket_'+loop+'">' +
					'<hr>' +
					'<div class="form-group">' +
					'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jumlah</label>' +
					'<div class="col-sm-5"> <input type="text" class="form-control numbers jumlah" id="jumlah_'+loop+'" name="jumlah[]" placeholder="jumlah" value="0" autocomplete="off" onkeyup="hitung_total()" required /></div>' +
					'</div>' +

					'<div class="form-group">' +
					'<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Keterangan</label>' +
					'<div class="col-sm-5">' +
					'<textarea id="keterangan_'+loop+'" name="keterangan[]"  placeholder="keterangan" class="form-control"></textarea>' +
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

					$('#tambah').append(html);
					$('.numbers').number(true);
					loop++;					
		});

		$("#tambah").on('click','.hapus', function(e){
			e.preventDefault();
			var id = $(this).data('id');
			$("#ket_"+id).remove();
			hitung_total();
		});
	});
</script>
@endsection