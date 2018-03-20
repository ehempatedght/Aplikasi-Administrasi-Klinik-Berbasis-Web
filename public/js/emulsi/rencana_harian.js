jQuery(document).ready(function($) {
	$('#no_pesanan').change(function() {
		var no_pesanan = $(this).val();

		$.get(home_url + '/harian/getPesanan', { no_pesanan }, function(data) {
			var data = $.parseJSON(data);

			$('#id_pesanan').val(data.listPesanan.id);
			$('#no_po').val(data.listPesanan.no_po);
			$('#tanggal').val(data.listPesanan.tanggal);
			$('#jenis_pesanan').val(data.listPesanan.jenis_pesanan);
			$('#nama_rekanan').val(data.listRekanan.nama);
			$('#alamat').val(data.listRekanan.alamat);
			$('#awal_tgl_pengiriman').val(data.listPesanan.awal_tgl_pengiriman);
			$('#akhir_tgl_pengiriman').val(data.listPesanan.akhir_tgl_pengiriman);
			$('#lokasi_pengiriman').val(data.listPesanan.lokasi_pengiriman);

			if (data.html_detail_pesanan) {
				$('#load__uraian').empty();
				$('#load__uraian').append(data.html_detail_pesanan);
			}
    });
  });

  $('#load__uraian').change(function() {
  	var id_pesanan = $(this).val();
  	var id_uraian = $('#load__uraian :selected').data('uraian');

  	$.get(home_url + '/harian/getMaterial', { id_pesanan, id_uraian }, function(data) {
			var data = $.parseJSON(data);

			if (data.htmlMaterial) {
				$('#load__material').empty();
				$('#load__material').append(data.htmlMaterial);
			} 

			$('#volume_kontrak').val(data.detailPesanan.volume_kontrak);
    });
  });

  var no_pesanan = 1;

  $('#save_pesanan1').click(function(e) {
  	e.preventDefault();

  	var id_detail_pesanan = $('#load__uraian'),
		volume_kontrak = $('#volume_kontrak'),
		realisasi_produksi = $('#realisasi_produksi'),
		waktu_kerja = $('#waktu_kerja'),
		id_material = $('#load__material'),
		rencana_kebutuhan = $('#rencana_kebutuhan'),
		realisasi_kebutuhan = $('#realisasi_kebutuhan');

		var html_produksi = '<tr class="gradeU"><td>'+no_pesanan+'</td><td>'+$("#load__uraian option:selected").html()+'</td><td>'+volume_kontrak.val()+'</td><td>'+realisasi_produksi.val()+'</td><td>'+waktu_kerja.val()+'</td><td><a class="btn btn-primary btn-sm btn-icon icon-left" href=""><i class="entypo-eye" ></i>Edit</a></td></tr>';
		var html_input_produksi = '<input type="text" name="id_detail_pesanan1[]" value="'+id_detail_pesanan.val()+'" data-id="'+no_pesanan+'" readonly="readonly"><input type="text" name="volume_kontrak1[]" value="'+volume_kontrak.val()+'" data-id="'+no_pesanan+'" readonly="readonly"><input type="text" name="realisasi_produksi1[]" value="'+realisasi_produksi.val()+'" data-id="'+no_pesanan+'" readonly="readonly"><input type="text" name="waktu_kerja1[]" value="'+waktu_kerja.val()+'" data-id="'+no_pesanan+'" readonly="readonly">';
		var html_kebutuhan = '<tr class="gradeU"><td>'+no_pesanan+'</td><td>'+$("#load__material option:selected").html()+'</td><td>'+rencana_kebutuhan.val()+'</td><td>'+realisasi_kebutuhan.val()+'</td><td><a class="btn btn-primary btn-sm btn-icon icon-left" href=""><i class="entypo-eye" ></i>Edit</a></td></tr>';
		var html_input_kebutuhan = '<input type="text" name="id_material2[]" value="'+id_material.val()+'" data-id="'+no_pesanan+'" readonly="readonly"><input type="text" name="rencana_kebutuhan2[]" value="'+rencana_kebutuhan.val()+'" data-id="'+no_pesanan+'" readonly="readonly"><input type="text" name="realisasi_kebutuhan2[]" value="'+realisasi_kebutuhan.val()+'" data-id="'+no_pesanan+'" readonly="readonly">';

		$('#load__data_produksi').append(html_input_produksi);
		$('#load__data_kebutuhan').append(html_input_kebutuhan);

		$('#load__produksi').append(html_produksi);
		$('#load__kebutuhan').append(html_kebutuhan);

		id_detail_pesanan.val('');
		volume_kontrak.val('');
		realisasi_produksi.val('');
		waktu_kerja.val('');
		id_material.val('');
		rencana_kebutuhan.val('');
		realisasi_kebutuhan.val('');


		no_pesanan++;
	});
});