<html>
<body>
<?php
$daftar_bulan = array(
  '01' => 'Januari',
  '02' => 'Februari',
  '03' => 'Maret',
  '04' => 'April',
  '05' => 'Mei',
  '06' => 'Juni',
  '07' => 'Juli',
  '08' => 'Agustus',
  '09' => 'September',
  '10' => 'Oktober',
  '11' => 'November',
  '12' => 'Desember',
);

$bulan_cetak = $daftar_bulan[date('m', strtotime($tanggal_awal))];
?>
  <table style="width: 100%; border-collapse: collapse;">
    <tbody>
      <tr>
        <td colspan="4" align="center">
          <h3>LAPORAN KEUANGAN BERDASARKAN TIPE AKUN</h3>
        </td>
      </tr>
      <tr>
        <td colspan="4" align="center">
          @if ($bulanan == true)
            BULAN: {{ $bulan_cetak }} {{ date('Y', strtotime($tanggal_awal)) }}
            @else
            PERIODE: {{ date('d-M-Y', strtotime($tanggal_awal)) }} s/d {{ date('d-M-Y', strtotime($tanggal_akhir)) }}
          @endif
        </td>
      </tr>
      <tr>
        <td style="text-align: center; border: 1px solid #000;" colspan="4" align="center"><b>{{$akun->first()->tipe_akun->nama_tipe}}</b></td>
      </tr>
      <tr>
        <td style="text-align: center; border: 1px solid #000;" width="5%"><b>No</b></td>
        <td style="text-align: center; border: 1px solid #000;" width="40"><b>Nama Akun</b></td>
        <td style="text-align: center; border: 1px solid #000;" width="20"><b>Masuk</b></td>
        <td style="text-align: center; border: 1px solid #000;" width="20"><b>Keluar</b></td>
      </tr>
      <?php $no=1; ?>
      @foreach($akun as $akun)
      <?php
        $total_masuk_ = 0;
        $total_keluar_ = 0;
        $total_masuk_keseluruhan = $akun->total_masuk_keseluruhan($tanggal_awal, $tanggal_akhir, $akun);
        $total_keluar_keseluruhan = $akun->total_keluar_keseluruhan($tanggal_awal, $tanggal_akhir, $akun);
      ?>
      <tr>
       <td style="border: 1px solid #000; text-align:center;">{{$no++}}</td>
       <td style="border: 1px solid #000;">{{$akun->akun->nama_akun}}</td>
       <td style="border: 1px solid #000; text-align: right;">{{number_format($total_masuk_keseluruhan, 0, ',', ',')}}</td>
       <td style="border: 1px solid #000; text-align: right;">{{number_format($total_keluar_keseluruhan, 0, ',', ',')}}</td>
      </tr>
      @endforeach
      <tr>
        <?php
          $total_masuk_keseluruhan2 = $akun->total_masuk_keseluruhan2($tanggal_awal, $tanggal_akhir, $akun);
          $total_keluar_keseluruhan2 = $akun->total_keluar_keseluruhan2($tanggal_awal, $tanggal_akhir, $akun);
        ?>
        <td style="text-align: center; border: 1px solid #000;" colspan="2" align="center"><center>Total</center></td>
        <td style="border: 1px solid #000; text-align: right;">{{number_format($total_masuk_keseluruhan2, 0, ',', ',')}}</td>
       <td style="border: 1px solid #000; text-align: right;">{{number_format($total_keluar_keseluruhan2, 0, ',', ',')}}</td>
      </tr>
      <tr><td></td></tr>
      <br>
      <tr>
        <td colspan="4" style="float: right; text-align: right;">
          Jakarta, {{date('d M Y')}}
        </td>
      </tr>
      <tr>
        <td colspan="4" style="float: right; text-align: right;">
          Penanggung Jawab
        </td>
      </tr>
      <tr>
        <td colspan="4">
        </td>
      </tr>
      <tr>
        <td colspan="4">
        </td>
      </tr>
      <tr>
        <td colspan="4">
        </td>
      </tr>
      <tr>
        <td colspan="4" style="float: right; text-align: right;">
          <strong>{{Auth::user()->first_name}}</strong>
        </td>
      </tr>
    </tbody>
  </table>
</body>
</html>
