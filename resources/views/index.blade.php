@extends('template')
@section('main')
<?php
	$img = \App\User::where('id', Auth::user()->id)->first();
?>
<div class="row">
	<div class="col-md-6 col-sm-8 clearfix">
		<ul class="user-info pull-left pull-none-xsm">
			<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="{{ asset('pengguna/'.$img->img) }}" alt="" class="img-circle" width="44" height="46" />
						{{ Auth::user()->first_name}}
				</a>
				
				<ul class="dropdown-menu">
					<!-- Reverse Caret -->
					<li class="caret"></li>
					<!-- Profile sub-links -->
					<li>
						<a href="{{route('pengaturan.user.data.edit', Auth::user()->id)}}">
							<i class="entypo-user"></i>
							Edit Profile
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		<ul class="list-inline links-list pull-right">
			<li>
				<a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
					Log Out <i class="entypo-logout right"></i>
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                	@csrf
            	</form>
			</li>
		</ul>
	</div>
</div>
<hr/>
<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		setTimeout(function()
			{
				var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
					"toastClass": "black",
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
		
				toastr.success("SELAMAT DATANG, <b>{{strtoupper(Auth::user()->first_name)}}</b>", opts);
			}, 3000);
			<?php
				$transaksi_masuk = \App\Transaksi::where('pemasukan','!=','0')->count();
				$transaksi_keluar = \App\Transaksi::where('pengeluaran','!=','0')->count();
			?>
			Morris.Donut({
				element: 'chart5',
				data: [
					{label: "Transaksi Keluar", value:{{$transaksi_keluar}}, formatted: ' {{$transaksi_keluar}} %'},
					{label: "Transaksi Masuk", value: {{$transaksi_masuk}}, formatted: ' {{$transaksi_masuk}} %'},
				],
				formatter: function (x, data) { return data.formatted},
				colors: ['#455064','#707f9b']
			});
			// Donut Colors
			Morris.Donut({
				element: 'chart6',
				data: [
					{label: "Reservasi", value: {{\App\Reservasi::all()->count()}}, formatted: ' {{\App\Reservasi::all()->count()}} Data'},
					{label: "Pemeriksaan", value: {{\App\Pemeriksaan::all()->count()}}, formatted: ' {{\App\Pemeriksaan::all()->count()}} Data'},
					{label: "Rekam Medis", value: {{\App\RekamMedis::all()->count()}}, formatted: ' {{\App\RekamMedis::all()->count()}} Data'},
					{label: "Pemberian Obat", value: {{\App\Pemberianobat::all()->count()}}, formatted: ' {{\App\Pemberianobat::all()->count()}} Data'},
				],
				labelColor: '#303641',
				formatter: function (x, data) { return data.formatted},
				colors: ['#f26c4f', '#00a651', '#00bff3', '#0072bc']
			});
			
			// Donut Formatting
			Morris.Donut({
				element: 'chart7',
				data: [
					{value: {{\App\Pasien::where('jenis_kelamin','Perempuan')->count()}}, label: 'Perempuan', formatted: '{{\App\Pasien::where('jenis_kelamin','Perempuan')->count()}} %' },
					{value: {{\App\Pasien::where('jenis_kelamin','Laki-laki')->count()}}, label: 'Laki-Laki', formatted: '{{\App\Pasien::where('jenis_kelamin','Laki-laki')->count()}} %' }
				],
				formatter: function (x, data) { return data.formatted; },
				colors: ['#b92527', '#d13c3e']
			});
	});
	function getRandomInt(min, max)
	{
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}
</script>
<?php
	$pengguna = \App\User::all()->count();
	$petugas = \App\Petugas::all()->count();
	$pasien = \App\Pasien::all()->count();
	$obat = \App\Jenisobatdetail::get()->sum('stok');
?>
<div class="row">
	<div class="col-sm-3 col-xs-6">
		{{-- <a href="{{route('pengaturan.user.data.index')}}"> --}}
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="{{$pengguna}}" data-postfix="" data-duration="1500" data-delay="0">0</div>
		
			<h3>Pengguna</h3>
			<p>jumlah pengguna aplikasi.</p>
		</div>
		{{-- </a> --}}
	</div>
	<div class="col-sm-3 col-xs-6">
		{{-- <a href="{{route('masterdata.petugasmedis.datapetugasmedis.index')}}"> --}}
		<div class="tile-stats tile-green">
			<div class="icon" style="margin-bottom: 35px;"><i class="fa fa-user-md"></i></div>
			<div class="num" data-start="0" data-end="{{$petugas}}" data-postfix="" data-duration="1500" data-delay="600">0</div>
				<h3>Petugas</h3>
				<p>jumlah petugas klinik.</p>
		</div>
		{{-- </a> --}}
	</div>
	<div class="clear visible-xs"></div>
	
	<div class="col-sm-3 col-xs-6">
		{{-- <a href="{{route('masterdata.pasien.datapasien.index')}}"> --}}
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-user"></i></div>
			<div class="num" data-start="0" data-end="{{$pasien}}" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			<h3>Pasien</h3>
			<p>jumlah pasien yang sudah registrasi.</p>
		</div>
		{{-- </a> --}}
	</div>
	<div class="col-sm-3 col-xs-6">
		{{-- <a href="{{route('masterdata.daftarobat.index')}}"> --}}
		<div class="tile-stats tile-blue">
			<div class="icon" style="margin-bottom: 35px;"><i class="fa fa-medkit"></i></div>
			<div class="num" data-start="0" data-end="{{$obat}}" data-postfix="" data-duration="1500" data-delay="1800">0</div>
			<h3>Stok Obat</h3>
			<p>jumlah keseluruhan stok obat klinik.</p>
		</div>
		{{-- </a> --}}
	</div>
</div>
<br/>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td width="33%">
						<strong>Jenis Kelamin Pasien</strong>
						<br />
						<div id="chart7" style="height: 250px"></div>
					</td>
					<td width="33%">
						<strong>Perekaman Aktivitas - Transaksi Klinik</strong>
						<br />
						<div id="chart6" style="height: 250px"></div>
						</td>
					<td width="33%">
						<strong>Akunting - Transaksi Keuangan</strong>
						<br />
						<div id="chart5" style="height: 250px"></div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@stop