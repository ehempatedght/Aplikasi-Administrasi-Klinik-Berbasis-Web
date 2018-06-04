@extends('template')
@section('main')
<div class="invoice">
  <div class="row">
  	<div class="col-md-12">
  		<br/><br/><br/><br/><br/><br/><br/>
  		
	  		<div class="col-sm-3"></div>
	  			<div class="col-sm-6">
	  				<hr style="border-bottom: 1px solid;">
	  				<h3><center>Klinik - Menemani</center></h3>
	  				<hr style="border-bottom: 1px solid;">
		  				<div class="form-group">
	            			<label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;No Reservasi</label>
				              <div class="col-sm-5">
				                <p type="text">: {{$reservasi->kd_res}}</p>
				              </div>
	          			</div><br/>
	          			<div class="form-group">
	            			<label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;No RM</label>
				              <div class="col-sm-5">
				                <p type="text">: {{$reservasi->no_rm}}</p>
				              </div>
	          			</div><br/>
	          			<div class="form-group">
	            			<label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Nama Pasien</label>
				              <div class="col-sm-5">
				                <p type="text">: {{$reservasi->pasien->nama_pasien}}</p>
				              </div>
	          			</div><br/>
	          			<div class="form-group">
	            			<label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Nama Poli</label>
				              <div class="col-sm-5">
				                <p type="text">: {{$reservasi->poli->nama_poli}}</p>
				              </div>
	          			</div><br/>
	          			<div class="form-group">
	            			<label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;Nama Dokter</label>
				              <div class="col-sm-5">
				                <p type="text">: {{$reservasi->dokter->nama}}</p>
				              </div>
	          			</div><br/>
	          			<div class="form-group">
	            			<label for="field-1" class="col-sm-4 control-label" style="text-align:left;">&emsp;No Urut</label>
				              <div class="col-sm-5">
				                <p>: <b>{{$reservasi->no_urut}}</b></p>
				              </div>
	          			</div><br/>
	          			<hr style="border-bottom: 1px solid;">
	          			<br/>
	          			<div class="invoice">
	          				<div class="invoice-right">
	          					<p>Petugas: {{Auth::user()->first_name}}</p>
	          					<a href="javascript:window.print();" class="btn btn-blue btn-icon icon-left hidden-print">
            Cetak PDF
          <i class="entypo-print"></i>
          </a>
	          				</div>
	          			</div>
	  			</div>
	  		<div class="col-sm-3"></div>
  		
  	</div>
  </div>
</div>
@endsection