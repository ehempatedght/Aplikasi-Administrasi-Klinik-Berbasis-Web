@extends('template')
@section('main')
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
        LAPORAN REKAM MEDIS PASIEN<br />
      </span>
    </center>
    <hr style="border-bottom: 1px solid; " />
  </table>
  <div class="row">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;No RM</label>
              <div class="col-sm-5">
                <p type="text">: {{$rekam->reservasi->no_rm}}</p>
              </div>
          </div><br/>
          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Nama Pasien</label>
            <div class="col-sm-5">
              <p type="text">: {{$rekam->reservasi->pasien->nama_pasien}}</p>
            </div>
          </div>

          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Kategori Pasien</label>
            <div class="col-sm-5">
              <p type="text">: {{$rekam->reservasi->pasien->kategoripasien->nama_kategori}}</p>
            </div>
          </div><br/>
          
          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Gol.Darah</label>
            <div class="col-sm-5">
              <p type="text">: {{$rekam->reservasi->pasien->golongan_darah}}</p>
            </div>
          </div><br/>
          
          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Alamat</label>
            <div class="col-sm-5">
              <p type="text">: {{$rekam->reservasi->pasien->alamat}}</p>
            </div>
          </div><br/>

          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Tanggal Lahir</label>
            <div class="col-sm-5">
                <p type="text">: {{date('d-M-Y', strtotime($rekam->reservasi->pasien->TanggalLahir))}}</p>
              </div>
          </div><br/>

          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Poli</label>
            <div class="col-sm-5">
              <p type="text">: {{$rekam->reservasi->poli->nama_poli}}</p>
            </div>
          </div><br/>
          
          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Tanggal</label>
            <div class="col-sm-5">
              <p type="text">: {{date('d-M-Y', strtotime($rekam->tgl))}}</p>
            </div>
          </div><br/>
          <?php
            $birthdate = new Datetime($rekam->reservasi->pasien->TanggalLahir);
            $today = new Datetime('today');
            $umur = $today->diff($birthdate)->y;
          ?>
          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Umur</label>
            <div class="col-sm-5">
              <p type="text">: {{$umur}} Tahun</p>
            </div>
          </div><br/>

          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Dokter</label>
            <div class="col-sm-5">
              <p type="text">: {{$rekam->reservasi->dokter->nama}}</p>
            </div>
          </div><br/>

          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;R.Jalan/Inap</label>
            <div class="col-sm-5">
              <p type="text">: RAWAT JALAN</p>
            </div>
          </div><br/>
          
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Diagnosa Utama</label>
            <div class="col-sm-5">
              <p type="text">: {{$rekam->rmdiagnosa}}</p>
            </div>
          </div><br/>
          
          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Keluhan</label>
            <div class="col-sm-5">
              <p type="text">: {{$rekam->rmkeluhan}}</p>
            </div>
          </div><br/>
          
          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Pemeriksaan</label>
            <div class="col-sm-5">
              <p type="text">: {{$rekam->rmpemeriksaan}}</p>
            </div>
          </div><br/>

          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Terapi</label>
            <div class="col-sm-5">
              <p type="text">: {{$rekam->rmterapi}}</p>
            </div>
          </div><br/>

          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Alergi Obat</label>
            <div class="col-sm-5">
              <p type="text">: {{$rekam->rmalergiobat}}</p>
            </div>
          </div><br/>
          
          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Resep</label>
            <div class="col-sm-5">
              <p type="text">: {{$rekam->rmresep}}</p>
            </div>
          </div><br/>
          
          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Kesimpulan</label>
            <div class="col-sm-5">
              <p type="text">: {{$rekam->rmkesimpulan}}</p>
            </div>
          </div><br/>
          
          <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Kondisi Keluar</label>
            <div class="col-sm-5">
              <p type="text">: {{$rekam->kondisi_pasien}}</p>
            </div>
          </div><br/>
        </div>
      </div>
      <hr style="border-bottom: 1px solid;">
      <br>
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