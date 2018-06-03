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
  <div class="row">
    <div class="col-sm-6">
      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <th width="25%"><b>{{$aktiva->tipeAkun->nama_tipe}}</b></th>
        </tr>
      </table>
      <br/>
      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <th style="border-bottom: 1px solid; border-bottom-style: dashed;">Nama Akun</th>
          <th style="border-bottom: 1px solid; border-bottom-style: dashed; text-align: right;">Nominal</th>
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
          <td>{{$akt->akun->nama_akun}}</td>
          <td style="text-align: right;">{{number_format($total_neraca_aktiva, 0, ',', ',')}}</td>
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
          <th width="25%"><b>{{$pasiva->tipeAkun->nama_tipe}}</b></th>
        </tr>
      </table>
      <br/>
      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <th style="border-bottom: 1px solid; border-bottom-style: dashed;">Nama Akun</th>
          <th style="border-bottom: 1px solid; border-bottom-style: dashed; text-align: right;">Nominal</th>
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
          <td>{{$pas->akun->nama_akun}}</td>
          <td style="text-align: right;">{{number_format($total_neraca_pasiva, 0, ',', ',')}}</td>
          <?php
            $jumlahkan_nominal_pasiva += $total_neraca_pasiva;
          ?>
        </tr>
        @endforeach
      </table>
      <br/>
    <br/>
    </div>
    <div class="col-sm-12">
      <table style="width: 100%; border-collapse: collapse;">
        <td style="border-top: 1px solid; border-top-style: dashed;"></td>
      </table>
      <br/>
      <br/>
      <div class="invoice">
        <div class="invoice-right">
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td><b>Aktiva <?php for($i=1; $i<=50; $i++){print "&nbsp;";} ?>Rp.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{number_format($jumlahkan_nominal_aktiva, 0, ',', ',')}}</b></td>
            </tr>
            <tr>
              <td><b>Pasiva <?php for($i=1; $i<=50; $i++){print "&nbsp;";} ?>Rp.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{number_format($jumlahkan_nominal_pasiva, 0, ',', ',')}}</b></td>
            </tr>
            <?php
            $selisih = $jumlahkan_nominal_aktiva - $jumlahkan_nominal_pasiva;
            ?>
          </table>
          <tr>
              <?php
                for ($i=1; $i <=39; $i++) {
              ?> 
              <td>-</td>
              <?php
            }
              ?>
              <b>&nbsp;-</b>
            </tr>
          <br/>
          <table style="width: 100%; border-collapse: collapse;">
          <tr>
              <td><b>Selisih <?php for($i=1; $i<=50; $i++){print "&nbsp;";} ?>Rp.&nbsp;&nbsp;&nbsp;&nbsp;{{number_format($selisih, 0, ',', ',')}}</b></td>
          </tr>
          </table>
          <br>
          <br>
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