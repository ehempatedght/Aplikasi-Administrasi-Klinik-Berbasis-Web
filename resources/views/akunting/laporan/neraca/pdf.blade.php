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
        LAPORAN NERACA<br />
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
        <tr>
          <th width="25%">{{$aktiva->tipeAkun->nama_tipe}}</th>
        </tr>
      </table>
      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <th style="border: 1px solid;"><center><b>Nama Akun</b></center></th>
          <th style="border: 1px solid;"><center><b>Nominal</b></center></th>
        </tr>
        <?php
          $jumlahkan_nominal_aktiva = 0;
          $total_neraca_aktiva = 0;
        ?>
        @foreach($aktiva_ as $akt)
        <?php
          $total_neraca_aktiva = $akt->total_neraca_aktiva($tanggal_awal, $tanggal_akhir);
        ?>
        <tr>
          <td style="border: 1px solid;">{{$akt->akun->nama_akun}}</td>
          <td style="border: 1px solid; text-align: right;" class="numbers">{{number_format($total_neraca_aktiva, 0, ',', ',')}}</td>
          <?php
            $jumlahkan_nominal_aktiva += $total_neraca_aktiva;
          ?>
        </tr>
        @endforeach
      </table>
    </div>
    <div class="col-sm-6">
      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <th width="27%">{{$pasiva->tipeAkun->nama_tipe}}</th>
        </tr>
      </table>
      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <th style="border: 1px solid;"><center><b>Nama Akun</b></center></th>
          <th style="border: 1px solid;"><center><b>Nominal</b></center></th>
        </tr>
        <?php 
        $jumlahkan_nominal_pasiva = 0; 
        $total_neraca_pasiva = 0;
        ?>
        @foreach($pasiva_ as $pas)
        <?php
          $total_neraca_pasiva = $pas->total_neraca_pasiva($tanggal_awal, $tanggal_akhir); 
        ?>
        <tr>
          <td style="border: 1px solid;">{{$pas->akun->nama_akun}}</td>
          <td style="border: 1px solid; text-align: right;" class="numbers">{{number_format($total_neraca_pasiva, 0, ',', ',')}}</td>
          <?php
            $jumlahkan_nominal_pasiva += $total_neraca_pasiva;
          ?>
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
          <td><b>Aktiva<?php for($i=1; $i<=145; $i++) {print ".";}?> : {{number_format($jumlahkan_nominal_aktiva, 0, ',', ',')}}</b></td>
        </tr>
        <tr>
          <td><b>Pasiva<?php for($i=1; $i<=145; $i++) {print ".";}?> : {{number_format($jumlahkan_nominal_pasiva, 0, ',', ',')}}</b>
          </td>
        </tr>
        <?php
          $selisih = $jumlahkan_nominal_aktiva - $jumlahkan_nominal_pasiva;
        ?>
        <tr>
          <td><?php for($i=1; $i<=157; $i++) {print "&nbsp;";}?>&nbsp;  -------------- <b>-</b></td>
        </tr>
        <tr>
          <td><b>Selisih<?php for($i=1; $i<=145; $i++) {print ".";}?> : {{number_format($selisih, 0, ',', ',')}}</b></td>
        </tr>
      </table>
      <br/>
      <table style="width: 100%; border-collapse: collapse;">
        <th style="border-top: 1px solid; border-bottom: 1px solid;"><center><b>Selisih : {{number_format($selisih, 0, ',', ',')}}</b></center></th>
      </table>
    </div>
  </div>
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

