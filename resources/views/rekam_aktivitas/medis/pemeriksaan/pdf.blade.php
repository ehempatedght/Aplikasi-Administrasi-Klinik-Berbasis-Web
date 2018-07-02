@extends('template')
@section('main')
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
<div class="invoice">
  <div class="row">
    <div class="col-xs-4 invoice-left">
      <span>
        Rumah Sehat | Menemani <br />
      </span>
    </div>
  </div>
  <table style="width: 100%; border-collapse: collapse;">
      <hr style="border-top: 1px solid; " />
      <center>
        <span>
        LAPORAN PEMERIKSAAN PASIEN<br />
        @if ($bulanan == true)
        BULAN: {{ $bulan_cetak }} {{ date('Y', strtotime($tanggal_awal)) }}
        @else
        PERIODE: {{ date('d-M-Y', strtotime($tanggal_awal)) }} s/d {{ date('d-M-Y', strtotime($tanggal_akhir)) }}
        @endif
      </span>
      <br/>
    </center>
    <hr style="border-bottom: 1px solid; " />
  </table>
  <div class="row">
    <div class="col-sm-12">
      <br/>
      <table style="width: 100%; border-collapse: collapse;">
        <thead>
          <tr style="border-top: 1px solid; border-bottom: 1px solid">
            <th><b>No</b></th>
            <th><b>Tanggal</b></th>
            <th><b>No Faktur</b></th>
            <th><b>No RM</b></th>
            <th><b>Nama Pasien</b></th>
            <th><b>Poli</b></th>
            <th><b>Nama Dokter</b></th>
            <th><b>Total</b></th>
            <th><b>User</b></th>
          </tr>
        </thead>
        <?php 
          $no=1;
          $total = 0; 
        ?>
        <tbody>
          @foreach($pemeriksaan as $checkkup)
          <tr style="border-bottom: 1px solid;">
            <td>{{$no++}}</td>
            <td>{{date('d/m/Y', strtotime($checkkup->tgl))}}</td>
            <td>{{$checkkup->no_faktur}}</td>
            <td>{{$checkkup->reservasi->no_rm}}</td>
            <td>{{$checkkup->reservasi->pasien->nama_pasien}}</td>
            <td>{{$checkkup->reservasi->poli->nama_poli}}</td>
            <td>{{$checkkup->reservasi->dokter->nama}}</td>
            <td class="numbers">{{$checkkup->total}}</td>
            <td>{{$checkkup->user->first_name}}</td>
          </tr>
          <?php $total += $checkkup->total; ?>
          @endforeach
        </tbody>
      </table>
      <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
        <tr>
          <td style="border-bottom: 1px solid; border-top: 1px solid; text-align: right;"> Total: Rp. &nbsp;&nbsp;&nbsp;{{number_format($total, 0, ',', ',')}}&nbsp;&nbsp;&nbsp;</td>
        </tr>
        </table>
      <div class="invoice">
        <div class="invoice-right">
          <br>
          <p>
            Jakarta, {{date('d M Y')}}<br/>
                Penangung Jawab&nbsp;&nbsp;
          </p>
          <br>
          <br>
          <br>
          <p>
            <b>&nbsp;{{Auth::user()->first_name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
          </p>
          <br>
          <br>
          <a href="javascript:window.print();" class="btn btn-blue btn-icon icon-left hidden-print">
            Cetak PDF
          <i class="entypo-print"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection