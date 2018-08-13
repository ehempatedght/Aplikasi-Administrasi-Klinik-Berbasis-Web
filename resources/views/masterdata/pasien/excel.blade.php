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
        <td colspan="8" align="center">
          <h3>LAPORAN REGISTRASI PASIEN</h3>
        </td>
      </tr>
      <tr>
        <td colspan="8" align="center">
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
        <td style="text-align: center; border: 1px solid #000;" width="8%"><b>No RM</b></td>
        <td style="text-align: center; border: 1px solid #000;" width="25%"><b>Nama Pasien</b></td>
        <td style="text-align: center; border: 1px solid #000;" width="15%"><b>Tgl Lahir</b></td>
        <td style="text-align: center; border: 1px solid #000;" width="59%"><b>Alamat</b></td>
        <td style="text-align: center; border: 1px solid #000;" width="25%"><b>Kelurahan</b></td>
        <td style="text-align: center; border: 1px solid #000;" width="10%"><b>Kategori</b></td>
      </tr>
      <?php $no=1; ?>
      @foreach($pasien as $pasien)
      <tr>
        <td style="border: 1px solid #000; text-align:center;">{{$no++}}</td>
        <td style="border: 1px solid #000;">{{date('d/m/Y', strtotime($pasien->created_at))}}</td>
        <td style="border: 1px solid #000;">{{$pasien->no_rm}}</td>
        <td style="border: 1px solid #000;">{{$pasien->nama_pasien}}</td>
        <td style="border: 1px solid #000;">{{date('d-M-Y', strtotime($pasien->TanggalLahir))}}</td>
        <td style="border: 1px solid #000;">{{$pasien->alamat}}</td>
        <td style="border: 1px solid #000;">{{$pasien->kelurahan->nama_kelurahan}}</td>
        <td style="border: 1px solid #000;">{{$pasien->kategoripasien->nama_kategori}}</td>
      </tr>
      @endforeach
      <tr style="text-align: center;">
        <td style="border: 1px solid #000; text-align: center;" colspan="8"><center><b>Total {{$no - 1}} Data</b></center></td>
      </tr>
      <tr><td></td></tr>
      <br>
      <tr>
        <td colspan="8" style="float: right; text-align: right;">
          Jakarta, {{date('d M Y')}}
        </td>
      </tr>
      <tr>
        <td colspan="8" style="float: right; text-align: right;">
          Penanggung Jawab
        </td>
      </tr>
      <tr>
        <td colspan="8">
      </td>
      </tr>
      <tr>
        <td colspan="8">
      </td>
      </tr>
      <tr>
        <td colspan="8">
      </td>
      </tr>
      <tr>
        <td colspan="8" style="float: right; text-align: right;">
            <strong>{{Auth::user()->first_name}}</strong>
        </td>
      </tr>
    </tbody>
  </table>
</body>
</html>