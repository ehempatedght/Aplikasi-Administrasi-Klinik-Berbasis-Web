<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>{{$reservasi->no_urut}} - {{$reservasi->pasien->nama_pasien}}</title>
</head>
<body style="margin-top: -22%;">
	<center><p style="font-family: Delicious;">Rumah Sehat | Menemani</p></center>
	<center><hr style="border-bottom: 1px solid; margin-top: -4%;"></center>
	<label for="field-1" class="col-sm-2 control-label" style="text-align:left;"><b style="margin-right: 7.4%;">No Reservasi</b>: {{$reservasi->kd_res}}</label><br/>
	<label for="field-1" class="col-sm-2 control-label" style="text-align:left;"><b style="margin-right: 20.1%;">No RM</b>: {{$reservasi->no_rm}}</label><br/>
	<label for="field-1" class="col-sm-2 control-label" style="text-align:left;"><b style="margin-right: 7.4%;">Nama Pasien</b>: {{$reservasi->pasien->nama_pasien}}</label><br/>
	<label for="field-1" class="col-sm-2 control-label" style="text-align:left;"><b style="margin-right: 13%;">Nama Poli</b>: {{$reservasi->poli->nama_poli}}</label><br/>
	<label for="field-1" class="col-sm-2 control-label" style="text-align:left;"><b style="margin-right: 6.1%;">Nama Dokter</b>: {{$reservasi->dokter->nama}}</label><br/>
	<label for="field-1" class="col-sm-2 control-label" style="text-align:left;"><b style="margin-right: 18%;">No Urut</b>: {{$reservasi->no_urut}}</label>
	<center><hr style="border-bottom: 1px solid; margin-top: 2%;"></center>
	<p style="float: right; margin-top: 10%;">Petugas: {{Auth::user()->first_name}}</p>
</body>
</html>