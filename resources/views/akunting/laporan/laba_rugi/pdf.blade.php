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

$bulan_cetak = $daftar_bulan[date('m', strtotime($cetak_bulan))];
?>
<div class="invoice">
  <div class="row">

    <div class="col-sm-6 invoice-left">
      <span></span>
    </div>
    <div class="col-sm-6 invoice-right">
      <span></span>
    </div>
  </div>
  <table style="width: 100%; border-collapse: collapse;">
      <hr style="border-top: 1px solid; " />
      <center>
      <h4>LAPORAN LABA(RUGI)</h4>
      <span>
        PERIODE BULAN {{ strtoupper($bulan_cetak) }} {{ $tahun }}
      </span>
      <br/>
    </center>
    <hr style="border-bottom: 1px solid; " />
  </table>
  <br/>
  <br/>
  <style>
    table,td,th{
      border-collapse :collapse;
    }
    th,td{
      padding: 3px;
    }
  </style>
  
  <div class="row">
    <div class="col-sm-6">
      <table style="width: 100%; border-collapse: collapse;">
        @foreach($pemasukan_ as $msk)
        <?php $total_tipe_pemasukan = $msk->total_keseluruhan1($bulan, $tahun); ?>
        @endforeach
        <tr>
          <th width="25%">{{$pemasukan->tipeAkun->nama_tipe}}</th>
          <th width="20%" class="numbers" style="text-align: right;">{{$total_tipe_pemasukan}}</th>
        </tr>
      </table>
      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <th style="border: 1px solid;"><center>Nama Akun</center></th>
          <th style="border: 1px solid;"><center>Nominal</center></th>
        </tr>
        @foreach($pemasukan_ as $masuk)
        <?php
          $total1 = $masuk->total_keseluruhan($bulan, $tahun);
        ?>
        <tr>
          <td style="border: 1px solid;">{{$masuk->akun->nama_akun}}</td>
          <td style="border: 1px solid; text-align: right;" class="numbers">{{$total1}}</td>
        </tr>
        @endforeach
      </table>
    </div>
    <div class="col-sm-6">
      <table style="width: 100%; border-collapse: collapse;">
        @foreach($pengeluaran_ as $pgl)
          <?php
            $total_tipe_pengeluaran = $pgl->total_keseluruhan3($bulan, $tahun); 
          ?>
        @endforeach
        <tr>
          <th width="27%">{{$pengeluaran->tipeAkun->nama_tipe}}</th>
          <th width="20%" class="numbers" style="text-align: right;">{{$total_tipe_pengeluaran}}</th>
        </tr>
      </table>
      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <th style="border: 1px solid;">Nama Akun</th>
          <th style="border: 1px solid;">Nominal</th>
        </tr>
        @foreach($pengeluaran_ as $keluar)
        <?php
          $total2 = $keluar->total_keseluruhan2($bulan, $tahun);
        ?>
        <tr>
          <td style="border: 1px solid;">{{$keluar->akun->nama_akun}}</td>
          <td style="border: 1px solid; text-align: right;" class="numbers">{{$total2}}</td>
        </tr>
        @endforeach
      </table>   
    </div>
    <div class="col-sm-12">
      <br/>
      <table style="width: 100%; border-collapse: collapse;">
        <th style="border-top: 1px solid;"></th>
      </table>
      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <td><b>Total Pemasukan<?php for($i=1; $i<=127; $i++) {print ".";}?> : {{number_format($total_tipe_pemasukan, 0, ',', ',')}}</b></td>
        </tr>
        <tr>
          <td><b>Total Pengeluaran<?php for($i=1; $i<=125; $i++) {print ".";}?> : {{number_format($total_tipe_pengeluaran, 0, ',', ',')}}</b>
          </td>
        </tr>
        <?php
          $laba = $total_tipe_pemasukan - $total_tipe_pengeluaran; 
        ?>
        <tr>
          <td><?php for($i=1; $i<=157; $i++) {print "&nbsp;";}?>&nbsp;  -------------- <b>-</b></td>
        </tr>
        <tr>
          <td><b>Laba<?php for($i=1; $i<=148; $i++) {print ".";}?> : {{number_format($laba, 0, ',', ',')}}</b></td>
        </tr>
      </table>
      <br/>
      <table style="width: 100%; border-collapse: collapse;">
        <th style="border-top: 1px solid; border-bottom: 1px solid;"><center><b>Laba(Rugi) : {{number_format($laba, 0, ',', ',')}}</b></center></th>
      </table>
    </div>
  </div>
</div>
<div class="row">&nbsp;</div>
<div class="invoice">
  <div class="invoice-right">
    {{-- <a href="{{route('laporan.akun.detail', ['tanggal_awal' => $tanggal_awal, '$tanggal_akhir' => $tanggal_akhir, 'tipe_akun' => $tipe_akun, 'nama_akun' => $nama_akun, 'tipe' => 'excel'])}}" class="btn btn-primary btn-icon icon-left hidden-print">
      Export Excel
      <i class="entypo-doc-text"></i>
    </a> --}}
    <a href="javascript:window.print();" class="btn btn-blue btn-icon icon-left hidden-print">
        Cetak PDF
      <i class="entypo-print"></i>
    </a>
  </div>
  </div>
@endsection

