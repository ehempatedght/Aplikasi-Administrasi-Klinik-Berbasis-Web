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
        <td colspan="5" align="center">
          <h3>LAPORAN KEUANGAN DETAIL PER AKUN</h3>
        </td>
      </tr>
      <tr>
        <td colspan="5" align="center">
          @if ($bulanan == true)
            BULAN: {{ $bulan_cetak }} {{ date('Y', strtotime($tanggal_awal)) }}
            @else
            PERIODE: {{ date('d-M-Y', strtotime($tanggal_awal)) }} s/d {{ date('d-M-Y', strtotime($tanggal_akhir)) }}
          @endif
        </td>
      </tr>
    </tbody>
    <tbody>
      <tr>
          <td style="text-align: left; border: 1px solid #000;" colspan="5">
          Tipe Akun: @if($tipe_akun == 'all' && $nama_akun == 'all') <strong>Semua @else {{$akun->first()->tipeAkun->nama_tipe}}</strong> @endif
          </td>
      </tr>
    </tbody>
  @foreach($akun as $akun)
  @foreach($akun->list_nama_akun($tanggal_awal, $tanggal_akhir, $nama_akun) as $account_name)
    <tbody>
      <tr><td></td></tr>
      <tr>
        <td style="text-align: left; border: 1px solid #000;" colspan="5">Nama Akun: <strong>{{$account_name->akun->nama_akun}}</strong></td>
      </tr>
      <tr>
        <td style="text-align: center; border: 1px solid #000;" width="5%"><b>No</b></td>
        <td style="text-align: center; border: 1px solid #000;" width="15"><b>Tanggal</b></td>
        <td style="text-align: center; border: 1px solid #000;" width="60"><b>Keterangan</b></td>
        <td style="text-align: center; border: 1px solid #000;" width="20"><b>Masuk</b></td>
        <td style="text-align: center; border: 1px solid #000;" width="20"><b>Keluar</b></td>
      </tr>
      <?php 
        $no=1; 
        $total_pemasukan = 0;
        $total_pengeluaran = 0;
      ?>
      @foreach($akun->list_transaksi($tanggal_awal, $tanggal_akhir, $tipe_akun, $nama_akun) as $trs)
      <tr>
       <td style="border: 1px solid #000; text-align:center;">{{$no++}}</td>
       <td style="border: 1px solid #000;">{{date('d-M-Y', strtotime($trs->tgl))}}</td>
       <td style="border: 1px solid #000;">{{$trs->keterangan}}</td>
       <td style="border: 1px solid #000; text-align: right;">{{number_format($trs->pemasukan)}}</td>
       <td style="border: 1px solid #000; text-align: right;">{{number_format($trs->pengeluaran)}}</td>
      </tr>
      <?php
        $total_pemasukan += $trs->pemasukan;
        $total_pengeluaran += $trs->pengeluaran;
        $saldo_akhir = $total_pemasukan - $total_pengeluaran;
      ?>
      @endforeach
    </tbody>
    <tr>
      <td style="border: 1px solid #000;" colspan="4">Total Pemasukan </td>
      <td style="border: 1px solid #000; text-align: right;">{{number_format($total_pemasukan)}}</td>
    </tr>
    <tr>
      <td style="border: 1px solid #000;" colspan="4">Total Pengeluaran </td>
      <td style="border: 1px solid #000; text-align: right;">{{number_format($total_pengeluaran)}}</td>
    </tr>
    <tr>
      <td style="border: 1px solid #000;" colspan="4">Saldo Akhir </td>
      <td style="border: 1px solid #000; text-align: right;">{{number_format($saldo_akhir, 0, ',', ',')}}</td>
    </tr>
  @endforeach
  @endforeach
    <tbody>
      <tr><td></td></tr>
      <br>
      <tr>
        <td colspan="5" style="float: right; text-align: right;">
          Jakarta, {{date('d M Y')}}
        </td>
      </tr>
      <tr>
        <td colspan="5" style="float: right; text-align: right;">
          Penanggung Jawab
        </td>
      </tr>
      <tr>
        <td colspan="5">
        </td>
      </tr>
      <tr>
        <td colspan="5">
        </td>
      </tr>
      <tr>
        <td colspan="5">
        </td>
      </tr>
      <tr>
        <td colspan="5" style="float: right; text-align: right;">
          <strong>{{Auth::user()->first_name}}</strong>
        </td>
      </tr>
    </tbody>
  </table>
</body>
</html>