jQuery(document).ready(function($) {

  $('#jenis_pesanan').change(function() {
  		var jenis_pesanan = $(this).val();

  		if (jenis_pesanan == 'tunai') {
  			$('#display_waktu_pembayaran').hide();
  			$('#display_uang_muka').hide();
  		} else if (jenis_pesanan == 'kontrak') {
  			$('#display_waktu_pembayaran').show();
  			$('#display_uang_muka').show();
  		}
  }); 

  $('#nama_rekanan').change(function() {
  		var id_rekanan = $(this).val();

  		$.get(home_url + '/pesanan/getAddress', function(data) {
  				var data = $.parseJSON(data);
          var alamat_rekanan = $('#alamat_rekanan'),
          category_rekanan = $('#category_rekanan');
          alamat_rekanan.empty();
          category_rekanan.empty();

          $.each(data, function(key, value) {
            if (value.id_rekanan == id_rekanan) {
              alamat_rekanan.val(value.alamat);
              category_rekanan.val(value.category_rekanan);
            }
          });
      });
  }); 

  $('#volume_kontrak1, #harga_satuan1').change(function() {
  		var volume_kontrak1 = $('#volume_kontrak1').val(),
  		harga_satuan1 = $('#harga_satuan1').val()

  		if (volume_kontrak1 != 0 && harga_satuan1 != 0) {
  			$('#jumlah_harga1').val(volume_kontrak1 * harga_satuan1);
  		}
  });

  $('#ppn1').change(function() {
  		var ppn1 = $('#ppn1').val(),
  		jumlah_harga1 = $('#jumlah_harga1').val();

  		if (jumlah_harga1 != 0 && ppn1) {
  			$('#nilai_kontrak1').val(parseInt(jumlah_harga1) + parseInt(ppn1));
  		}
  });

  var no_pesanan1 = 1, no_pesanan2 = 1;

  $('#save_pesanan1').click(function(e) {
  	e.preventDefault();
		var uraian = $('#uraian_pesanan1'),
		volume_kontrak = $('#volume_kontrak1'),
		harga_satuan = $('#harga_satuan1'),
		jumlah_harga = $('#jumlah_harga1'),
		ppn = $('#ppn1'),
		nilai_kontrak = $('#nilai_kontrak1');

  	var html_input = '<div id="countPesanan" data-id="'+no_pesanan1+'"><input type="text" name="category[]" value="pesanan1" data-id="'+no_pesanan1+'" readonly="readonly"><input type="text" name="uraian_pesanan[]" value="'+uraian.val()+'" data-id="'+no_pesanan1+'" readonly="readonly"><input type="text" name="volume_kontrak[]" value="'+volume_kontrak.val()+'" data-id="'+no_pesanan1+'" readonly="readonly"><input type="text" name="harga_satuan[]" value="'+harga_satuan.val()+'" data-id="'+no_pesanan1+'" readonly="readonly"><input type="text" name="jumlah_harga[]" value="'+jumlah_harga.val()+'" data-id="'+no_pesanan1+'" readonly="readonly"><input type="text" name="ppn[]" value="'+ppn.val()+'" data-id="'+no_pesanan1+'" readonly="readonly"><input type="text" name="nilai_kontrak[]" value="'+nilai_kontrak.val()+'" data-id="'+no_pesanan1+'" readonly="readonly"></div>';
  	var html_tabel = '<tr class="gradeU"><td>'+$("#uraian_pesanan1 option:selected").html()+'</td><td>'+volume_kontrak.val()+'</td><td>'+harga_satuan.val()+'</td><td>'+jumlah_harga.val()+'</td><td>'+ppn.val()+'</td><td>'+nilai_kontrak.val()+'</td><td><a class="btn btn-danger btn-sm btn-icon icon-left remove__table" data-id="'+no_pesanan1+'" href=""><i class="entypo-cancel" ></i>Hapus</a></td></tr>';

  	$('#load__pesanan1').append(html_input);
  	$('#load__table_pesanan1').append(html_tabel);

  	uraian.val(''); 
  	volume_kontrak.val('');
  	harga_satuan.val('');
  	jumlah_harga.val('');
  	ppn.val('');
  	nilai_kontrak.val('');

  	no_pesanan1++;
  }); 

  $('#save_pesanan2').click(function(e) {
  	e.preventDefault()
		var uraian2 = $('#uraian_pesanan2'),
		volume_kontrak2 = $('#volume_kontrak2'),
		harga_satuan2 = $('#harga_satuan2'),
		jumlah_harga2 = $('#jumlah_harga2'),
		ppn2 = $('#ppn2'),
		nilai_kontrak2 = $('#nilai_kontrak2');

  	var html_input = '<input type="text" name="category2[]" value="pesanan2" data-id="'+no_pesanan2+'" readonly="readonly"><input type="text" name="uraian_pesanan2[]" value="'+uraian2.val()+'" data-id="'+no_pesanan2+'" readonly="readonly"><input type="text" name="volume_kontrak2[]" value="'+volume_kontrak2.val()+'" data-id="'+no_pesanan2+'" readonly="readonly"><input type="text" name="harga_satuan2[]" value="'+harga_satuan2.val()+'" data-id="'+no_pesanan2+'" readonly="readonly"><input type="text" name="jumlah_harga2[]" value="'+jumlah_harga2.val()+'" data-id="'+no_pesanan2+'" readonly="readonly"><input type="text" name="ppn2[]" value="'+ppn2.val()+'" data-id="'+no_pesanan2+'" readonly="readonly"><input type="text" name="nilai_kontrak2[]" value="'+nilai_kontrak2.val()+'" data-id="'+no_pesanan2+'" readonly="readonly">';
  	var html_tabel = '<tr class="gradeU"><td>'+$("#uraian_pesanan2 option:selected").html()+'</td><td>'+volume_kontrak2.val()+'</td><td>'+harga_satuan2.val()+'</td><td>'+jumlah_harga2.val()+'</td><td>'+ppn2.val()+'</td><td>'+nilai_kontrak2.val()+'</td><td><a class="btn btn-primary btn-sm btn-icon icon-left edit__tabel" data-id="'+no_pesanan2+'" href=""><i class="entypo-eye" ></i>Edit</a></td></tr>';

  	$('#load__pesanan2').append(html_input);
  	$('#load__table_pesanan2').append(html_tabel);

  	uraian2.val(''); 
  	volume_kontrak2.val('');
  	harga_satuan2.val('');
  	jumlah_harga2.val('');
  	ppn2.val('');
  	nilai_kontrak2.val('');

  	no_pesanan2++;
  }); 

  $('#volume_kontrak2, #harga_satuan2').change(function() {
  		var volume_kontrak2 = $('#volume_kontrak2').val(),
      ppn2 = $('#ppn2').val(),
  		harga_satuan2 = $('#harga_satuan2').val()

  		if (volume_kontrak2 != 0 && harga_satuan2 != 0) {
  			$('#jumlah_harga2').val(volume_kontrak2 * harga_satuan2);
  		}

      if ($('#jumlah_harga2').val() != 0 && ppn2) {
        $('#nilai_kontrak2').val(parseInt($('#jumlah_harga2').val()) + parseInt(ppn2));
      }
  });

  $('#ppn2').change(function() {
  		var ppn2 = $('#ppn2').val(),
  		jumlah_harga2 = $('#jumlah_harga2').val();

  		if (jumlah_harga2 != 0 && ppn2) {
  			$('#nilai_kontrak2').val(parseInt(jumlah_harga2) + parseInt(ppn2));
  		}
  });

  $('#volume_kontrak3, #harga_satuan3').change(function() {
      var volume_kontrak3 = $('#volume_kontrak3').val(),
      harga_satuan3 = $('#harga_satuan3').val(),
      ppn3 = $('#ppn3').val();

      if (volume_kontrak3 != 0 && harga_satuan3 != 0) {
        $('#jumlah_harga3').val(volume_kontrak3 * harga_satuan3);
      }

      if ($('#jumlah_harga3').val() != 0 && ppn3) {
        $('#nilai_kontrak3').val(parseInt($('#jumlah_harga3').val()) + parseInt(ppn3));
      }
  });

  $('#ppn3').change(function() {
      var ppn3 = $('#ppn3').val(),
      jumlah_harga3 = $('#jumlah_harga3').val();

      if (jumlah_harga3 != 0 && ppn3) {
        $('#nilai_kontrak3').val(parseInt(jumlah_harga3) + parseInt(ppn3));
      }
  });

  $(document).on('click', '.remove__table', function(e) {
    e.preventDefault();

    var id=$(this).data('id');

    $('#countPesanan').find('[data-id='+id+']').remove();
    $(this).parent().parent().remove();
  });

});