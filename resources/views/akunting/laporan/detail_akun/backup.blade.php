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
    <div class="col-xs-4" align="center">
      <span>
        LAPORAN KEUANGAN PER AKUN<br />
        @if ($bulanan == true)
        BULAN: {{ $bulan_cetak }} {{ date('Y', strtotime($tanggal_awal)) }}
        @else
        PERIODE: {{ date('d-M-Y', strtotime($tanggal_awal)) }} s/d {{ date('d-M-Y', strtotime($tanggal_akhir)) }}
        @endif
      </span>
    </div>
    <br/>
     <div class="col-xs-4 invoice-right">
      <span>
        <br />
        Hal. 01
      </span>
    </div>
  </div>
  <style>
  table,td,th{
    border-collapse :collapse;
  }
  th,td{
    padding: 3px;
  }
  </style>
  <table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="text-align: left; border: 1px solid;" colspan="5">
        Tipe Akun: <b>@if($tipe_akun == 'all' && $nama_akun == 'all')Semua @else {{$akun->first()->tipeAkun->nama_tipe}} @endif</b>
        </td>
    </tr>
  </table>
  <br/>
  @foreach($akun as $akun)
  @foreach($akun->list_nama_akun($tanggal_awal, $tanggal_akhir, $nama_akun) as $account_name)
  <table style="width: 100%; border-collapse: collapse;">
    <tbody>
      <tr>
        <td style="text-align: left; border: 1px solid;" colspan="5">Nama Akun: <b>{{$account_name->akun->nama_akun}}</b></td>
      </tr>
      <tr>
        <td style="text-align: center; border: 1px solid;" width="20"><b>No</b></td>
        <td style="text-align: center; border: 1px solid;" width="50"><b>Tanggal</b></td>
        <td style="text-align: center; border: 1px solid;" width="350"><b>Keterangan</b></td>
        <td style="text-align: center; border: 1px solid;" width="105"><b>Masuk</b></td>
        <td style="text-align: center; border: 1px solid;" width="105"><b>Keluar</b></td>
      </tr>
      <?php $no=1; 
        $total_pemasukan = 0;
        $total_pengeluaran = 0;
      ?>
      @foreach($akun->list_transaksi($tanggal_awal, $tanggal_akhir, $tipe_akun, $nama_akun) as $trs)
      <tr>
       <td style="border: 1px solid; text-align:center;">{{$no++}}</td>
       <td style="border: 1px solid;">{{date('d-M-Y', strtotime($trs->tgl))}}</td>
       <td style="border: 1px solid;">{{$trs->keterangan}}</td>
       <td style="border: 1px solid; text-align: right;" class="numbers">{{$trs->pemasukan}}</td>
       <td style="border: 1px solid; text-align: right;" class="numbers">{{$trs->pengeluaran}}</td>
      </tr>
      <?php
        $total_pemasukan += $trs->pemasukan;
        $total_pengeluaran += $trs->pengeluaran;
        $saldo_akhir = $total_pemasukan - $total_pengeluaran;
      ?>
      @endforeach
    </tbody>
      <tr>
        <td style="border: 1px solid;" colspan="4">Total Pemasukan </td>
        <td style="border: 1px solid; text-align: right;" class="numbers">{{$total_pemasukan}}</td>
      </tr>
      <tr>
        <td style="border: 1px solid;" colspan="4">Total Pengeluaran </td>
        <td style="border: 1px solid; text-align: right;" class="numbers">{{$total_pengeluaran}}</td>
      </tr>
      <tr>
        <td style="border: 1px solid;" colspan="4">Saldo Akhir </td>
        <td style="border: 1px solid; text-align: right;">{{number_format($saldo_akhir, 0, ',', ',')}}</td>
      </tr>
  </table>
  <br/>
  @endforeach
  @endforeach
  <br/>
</div>
<div class="row">&nbsp;</div>
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