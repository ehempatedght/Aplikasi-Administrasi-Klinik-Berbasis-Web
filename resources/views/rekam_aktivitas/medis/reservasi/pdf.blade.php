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
  <table style="width: 100%; border-collapse: collapse;" hidden>
    <tr>
        <td style="text-align: left; border: 1px solid;" colspan="5">
        Kategori: <b>@if($poli == 'all')Semua @else {{$reservasi->first()->poli->nama_poli}} @endif</b>
        </td>
    </tr>
  </table>
  <table style="width: 100%; border-collapse: collapse;" hidden>
    <tr>
        <td style="text-align: left; border: 1px solid;" colspan="5">
        Kategori: <b>@if($dokter == 'all')Semua @else {{$reservasi->first()->dokter->nama}} @endif</b>
        </td>
    </tr>
  </table>
  <table style="width: 100%; border-collapse: collapse;">
      <hr style="border-top: 1px solid; " />
      <center>
        <span>
        LAPORAN RESERVASI PASIEN<br />
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
            <th><b>Tanggal Reservasi</b></th>
            <th><b>No RM</b></th>
            <th><b>Nama Pasien</b></th>
            <th><b>Umur</b></th>
            <th><b>Jenis Pasien</b></th>
            <th><b>Nama Dokter</b></th>
            <th><b>Nama Poli</b></th>
          </tr>
        </thead>
        <?php $no=1; ?>
        <tbody>
          @foreach($reservasi as $reservas)
          <?php
            $birthdate = new Datetime($reservas->pasien->TanggalLahir);
            $today = new Datetime('today');
            $umur = $today->diff($birthdate)->y;
          ?>
          <tr style="border-bottom: 1px solid;">
            <td>{{$no++}}</td>
            <td>{{date('d/m/Y', strtotime($reservas->created_at))}}</td>
            <td>{{$reservas->no_rm}}</td>
            <td>{{$reservas->pasien->nama_pasien}}</td>
            <td>{{$umur}} Tahun</td>
            <td>{{$reservas->pasien->kategoripasien->nama_kategori}}</td>
            <td>{{$reservas->dokter->nama}}</td>
            <td>{{$reservas->poli->nama_poli}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <table style="width: 100%; border-collapse: collapse; margin-top: 6px;">
        <tr>
          <td style="border-bottom: 1px solid; border-top: 1px solid; text-align: center;">Total {{$no - 1}} Data</td>
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
          <a href="{{route('output_report.reservasi', ['tanggal_awal' => $tanggal_awal, 'tanggal_akhir' => $tanggal_akhir, 'poli' => $poli, 'dokter' => $dokter, 'tipe' => 'excel']) }}" class="btn btn-green btn-icon icon-left hidden-print">
            Export Excel
          <i class="entypo-doc-text"></i>
          </a>
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