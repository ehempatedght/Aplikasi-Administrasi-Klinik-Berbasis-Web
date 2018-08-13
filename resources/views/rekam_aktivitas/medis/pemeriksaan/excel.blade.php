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
        <td colspan="9" align="center">
          <h3>LAPORAN PEMERIKSAAN PASIEN</h3>
        </td>
        </tr>
        <tr>
          <td colspan="9" align="center">
            @if ($bulanan == true)
              BULAN: {{ $bulan_cetak }} {{ date('Y', strtotime($tanggal_awal)) }}
            @else
              PERIODE: {{ date('d-M-Y', strtotime($tanggal_awal)) }} s/d {{ date('d-M-Y', strtotime($tanggal_akhir)) }}
            @endif
          </td>
        </tr>
        <tr>
          <td style="text-align: center; border: 1px solid #000;" width="5%"><b>No</b></td>
          <td style="text-align: center; border: 1px solid #000;" width="20%"><b>Tanggal</b></td>
          <td style="text-align: center; border: 1px solid #000;" width="15%"><b>No Faktur</b></td>
          <td style="text-align: center; border: 1px solid #000;" width="8%"><b>No RM</b></td>
          <td style="text-align: center; border: 1px solid #000;" width="25%"><b>Nama Pasien</b></td>
          <td style="text-align: center; border: 1px solid #000;" width="15%"><b>Poli</b></td>
          <td style="text-align: center; border: 1px solid #000;" width="25%"><b>Nama Dokter</b></td>
          <td style="text-align: center; border: 1px solid #000;" width="20%"><b>Total</b></td>
          <td style="text-align: center; border: 1px solid #000;" width="20%"><b>User</b></td>
        </tr>
        <?php $no=1; $total = 0;?>
        @foreach($pemeriksaan as $pemeriksaan)
        <tr>
          <td style="border: 1px solid #000; text-align:center;">{{$no++}}</td>
          <td style="border: 1px solid #000;">{{date('d/m/Y', strtotime($pemeriksaan->tgl))}}</td>
          <td style="border: 1px solid #000; text-align: left;">{{$pemeriksaan->no_faktur}}</td>
          <td style="border: 1px solid #000;">{{$pemeriksaan->reservasi->no_rm}}</td>
          <td style="border: 1px solid #000;">{{$pemeriksaan->reservasi->pasien->nama_pasien}}</td>
          <td style="border: 1px solid #000;">{{$pemeriksaan->reservasi->poli->nama_poli}}</td>
          <td style="border: 1px solid #000;">{{$pemeriksaan->reservasi->dokter->nama}}</td>
          <td style="border: 1px solid #000; text-align: right;">{{number_format($pemeriksaan->total, 0, ',',',')}}</td>
          <td style="border: 1px solid #000;">{{$pemeriksaan->user->first_name}}</td>
        </tr>
        <?php $total += $pemeriksaan->total; ?>
        @endforeach
        <tr>
          <td style="border: 1px solid #000;"></td>
          <td style="border: 1px solid #000;"></td>
          <td style="border: 1px solid #000;"></td>
          <td style="border: 1px solid #000;"></td>
          <td style="border: 1px solid #000;"></td>
          <td style="border: 1px solid #000;"></td>
          <td style="border: 1px solid #000;"></td>
          <td style="border: 1px solid #000; text-align: right;"><b>Total: Rp</b></td>
          <td style="border: 1px solid #000; text-align: right;"><b>{{number_format($total, 0, ',', ',')}}</b></td>
        </tr>
        <tr><td></td></tr>
        <br>
        <tr>
          <td colspan="9" style="float: right; text-align: right;">
            Jakarta, {{date('d M Y')}}
          </td>
        </tr>
        <tr>
          <td colspan="9" style="float: right; text-align: right;">
            Penanggung Jawab
          </td>
        </tr>
        <tr>
          <td colspan="9">
          </td>
        </tr>
        <tr>
          <td colspan="9">
          </td>
        </tr>
        <tr>
          <td colspan="9">
          </td>
        </tr>
        <tr>
          <td colspan="9" style="float: right; text-align: right;">
            <strong>{{Auth::user()->first_name}}</strong>
          </td>
        </tr>
    </tbody>
  </table>
</body>
</html>