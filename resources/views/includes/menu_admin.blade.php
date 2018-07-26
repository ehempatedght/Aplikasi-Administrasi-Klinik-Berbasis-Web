<div class="sidebar-menu">
	<div class="sidebar-menu-inner">
		<header class="logo-env">
			<!-- logo -->
			<div class="logo">
				<a href="{{url('/')}}">
					<img src="{{asset('images/logo.jpeg') }}" width="120" alt="" />
				</a>
			</div>
			<!-- logo collapse icon -->
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
				<i class="entypo-menu"></i>
				</a>
			</div>
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
				<i class="entypo-menu"></i>
				</a>
			</div>
		</header>
		<?php
			$img = \App\User::where('id', Auth::user()->id)->first();
		?>
		<div class="sidebar-user-info">
			<div class="sui-normal">
				<a href="#" class="user-link">
					<img src="{{ asset('pengguna/'.$img->img) }}" width="55" height="56" alt="" class="img-circle" />
					<span>Welcome,</span>
					<strong>{{ Auth::user()->username }}</strong>
				</a>
			</div>
			<div class="sui-hover inline-links animate-in"><!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->
				<a href="{{route('pengaturan.user.data.edit', Auth::user()->id)}}">
					<i class="entypo-user "></i>
					<span style="font-size:15px;"><b>Edit Profile</b></span>
				</a>
				<span class="close-sui-popup">&times;</span><!-- this is mandatory -->
			</div>
		</div>
		<ul id="main-menu" class="main-menu">
		<li class="{{set_active('index')}}">
			<a href="{{url('/')}}">
				<i class="entypo-gauge"></i>
				<span class="title">Dashboard</span>
			</a>
			
		</li>
		
		@if(Auth::user()->admin == '1' || Auth::user()->petugasmedis == '1' || Auth::user()->vendorobat == '1' || Auth::user()->daftarobat == '1' ||Auth::user()->datapoli == '1' || Auth::user()->pasien == '1' || Auth::user()->peralatan == '1')
		<li class="{{set_active(['masterdata.petugasmedis.datapetugasmedis.index','masterdata.petugasmedis.jadwal.index','masterdata.vendorobat.index','masterdata.daftarobat.index','masterdata.poli.index','masterdata.pasien.kategori.index','masterdata.pasien.kelurahan.index','masterdata.pasien.datapasien.index','masterdata.pasien.datapasien.create','masterdata.peralatan.medis.index','masterdata.peralatan.kantor.index','masterdata.petugasmedis.datapetugasmedis.create','masterdata.petugasmedis.datapetugasmedis.ubah','masterdata.petugasmedis.jadwal.petugas','masterdata.petugasmedis.jadwal.atur','masterdata.petugasmedis.datapetugasmedis.show','masterdata.vendorobat.create','masterdata.vendorobat.edit','masterdata.daftarobat.create','masterdata.daftarobat.edit','masterdata.pasien.kelurahan.create','masterdata.pasien.kelurahan.edit','masterdata.pasien.datapasien.ubah','masterdata.pasien.datapasien.lihat','pemeriksaan.index','pemeriksaan.create','pemeriksaan.edit'])}} {{set_opened(['masterdata.petugasmedis.datapetugasmedis.index','masterdata.petugasmedis.jadwal.index','masterdata.vendorobat.index','masterdata.daftarobat.index','masterdata.poli.index','masterdata.pasien.kategori.index','masterdata.pasien.kelurahan.index','masterdata.pasien.datapasien.index','masterdata.pasien.datapasien.create','masterdata.peralatan.medis.index','masterdata.peralatan.kantor.index','masterdata.petugasmedis.datapetugasmedis.create','masterdata.petugasmedis.datapetugasmedis.ubah','masterdata.petugasmedis.jadwal.petugas','masterdata.petugasmedis.jadwal.atur','masterdata.petugasmedis.datapetugasmedis.show','masterdata.vendorobat.create','masterdata.vendorobat.edit','masterdata.daftarobat.create','masterdata.daftarobat.edit','masterdata.pasien.kelurahan.create','masterdata.pasien.kelurahan.edit','masterdata.pasien.datapasien.ubah','masterdata.pasien.datapasien.lihat','pemeriksaan.index','pemeriksaan.create','pemeriksaan.edit'])}} has-sub">
			<a href="#">
				<i class="entypo-layout"></i>
				<span class="title">Master Data</span>
			</a>
			<ul>
				@if(Auth::user()->petugasmedis == '1')
				<li class="{{set_opened(['masterdata.petugasmedis.datapetugasmedis.index','masterdata.petugasmedis.jadwal.index','masterdata.petugasmedis.datapetugasmedis.create','masterdata.petugasmedis.datapetugasmedis.ubah','masterdata.petugasmedis.jadwal.petugas','masterdata.petugasmedis.jadwal.atur','masterdata.petugasmedis.datapetugasmedis.show'])}} {{set_active(['masterdata.petugasmedis.datapetugasmedis.index','masterdata.petugasmedis.jadwal.index','masterdata.petugasmedis.datapetugasmedis.create','masterdata.petugasmedis.datapetugasmedis.ubah','masterdata.petugasmedis.jadwal.petugas','masterdata.petugasmedis.jadwal.atur','masterdata.petugasmedis.datapetugasmedis.show'])}} has-sub">
					<a href="#">
						<span class="title">Petugas Medis</span>
					</a>
					<ul>
						<li class="{{set_active(['masterdata.petugasmedis.datapetugasmedis.index','masterdata.petugasmedis.datapetugasmedis.create','masterdata.petugasmedis.datapetugasmedis.ubah','masterdata.petugasmedis.datapetugasmedis.show'])}}">
							<a href="{{route('masterdata.petugasmedis.datapetugasmedis.index')}}">
								<span class="title">Data Petugas Medis</span>
							</a>
						</li>
						<li class="{{set_active(['masterdata.petugasmedis.jadwal.index','masterdata.petugasmedis.jadwal.petugas','masterdata.petugasmedis.jadwal.atur'])}}">
							<a href="{{route('masterdata.petugasmedis.jadwal.index') }}">
								<span class="title">Jadwal Petugas Medis</span>
							</a>
						</li>
						{{-- <li>
							<a href="{{route('petugas.create') }}">
								<span class="title">Tambah Petugas Medis</span>
							</a>
						</li> --}}
					</ul>
				</li>
				@endif
				{{-- <li>
					<a href="#">
						<span class="title">Staff Administrasi</span>
					</a>
				</li> --}}
				@if(Auth::user()->daftarobat == '1')
				<li class="{{set_active(['masterdata.daftarobat.index','masterdata.daftarobat.create','masterdata.daftarobat.edit'])}}">
					<a href="{{route('masterdata.daftarobat.index')}}">
						<span class="title">Daftar Obat</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->vendorobat == '1')
				<li class="{{set_active(['masterdata.vendorobat.index','masterdata.vendorobat.create','masterdata.vendorobat.edit'])}}">
					<a href="{{route('masterdata.vendorobat.index')}}">
						<span class="title">Vendor Obat</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->datapemeriksaan == '1')
				<li class="{{set_active(['pemeriksaan.index','pemeriksaan.create','pemeriksaan.edit'])}}">
					<a href="{{route('pemeriksaan.index')}}">
						<span class="title">Data Pemeriksaan</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->datapoli == '1')
				<li class="{{set_active('masterdata.poli.index')}}">
					<a href="{{route('masterdata.poli.index')}}">
						<span class="title">Data Poli</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->pasien == '1')
				<li class="{{set_active(['masterdata.pasien.kategori.index','masterdata.pasien.kelurahan.index','masterdata.pasien.datapasien.index','masterdata.pasien.datapasien.create','masterdata.pasien.kelurahan.create','masterdata.pasien.kelurahan.edit','masterdata.pasien.datapasien.ubah','masterdata.pasien.datapasien.lihat'])}} {{set_opened(['masterdata.pasien.kategori.index','masterdata.pasien.kelurahan.index','masterdata.pasien.datapasien.index','masterdata.pasien.datapasien.create','masterdata.pasien.kelurahan.create','masterdata.pasien.kelurahan.edit','masterdata.pasien.datapasien.ubah','masterdata.pasien.datapasien.lihat'])}} has-sub">
					<a href="#">
						<span class="title">Pasien</span>
					</a>
					<ul>
						<li class="{{set_active('masterdata.pasien.kategori.index')}}">
							<a href="{{route('masterdata.pasien.kategori.index')}}">
								<span class="title">Data Kategori Pasien</span>
							</a>
						</li>
						<li class="{{set_active(['masterdata.pasien.kelurahan.index','masterdata.pasien.kelurahan.create','masterdata.pasien.kelurahan.edit'])}}">
							<a href="{{route('masterdata.pasien.kelurahan.index')}}">
								<span class="title">Data Kelurahan</span>
							</a>
						</li>
						<li class="{{set_active(['masterdata.pasien.datapasien.index','masterdata.pasien.datapasien.ubah','masterdata.pasien.datapasien.lihat'])}}">
							<a href="{{route('masterdata.pasien.datapasien.index')}}">
								<span class="title">Data Pasien</span>
							</a>
						</li>
						<li class="{{set_active('masterdata.pasien.datapasien.create')}}">
							<a href="{{route('masterdata.pasien.datapasien.create')}}">
								<span class="title">Registrasi Pasien</span>
							</a>
						</li>
					</ul>
				</li>
				@endif
				@if(Auth::user()->peralatan == '1')
				<li class="{{set_active(['masterdata.peralatan.medis.index','masterdata.peralatan.kantor.index'])}} {{set_opened(['masterdata.peralatan.medis.index','masterdata.peralatan.kantor.index'])}} has-sub">
					<a href="#">
						<span class="title">Peralatan</span>
					</a>
					<ul>
						<li class="{{set_active('masterdata.peralatan.medis.index')}}">
							<a href="{{route('masterdata.peralatan.medis.index')}}">
								<span class="title">Medis</span>
							</a>
						</li>
						<li class="{{set_active('masterdata.peralatan.kantor.index')}}">
						<a href="<?php echo route('masterdata.peralatan.kantor.index'); ?>">
							<span class="title">Kantor</span>
						</a>
						</li>
					</ul>
				</li>
				@endif
			</ul>
		</li>
		@endif
		@if(Auth::user()->rekmedis == '1' || Auth::user()->rekkeuangan == '1')
		<li class="{{set_active(['medis.reservasi.index','medis.pemeriksaan.index','rekam_medis.index','medis.pemberian.index','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index','pengeluaran.honor.index','pengeluaran.pembelian.index','pengeluaran.operasional.index','medis.reservasi.create','medis.pemeriksaan.create','medis.pemeriksaan.show','rekam_medis.create','rekam_medis.show','medis.pemberian.create','medis.pemberian.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.create','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.show','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.create','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.show','pengeluaran.honor.create','pengeluaran.honor.edit','pengeluaran.pembelian.create','pengeluaran.pembelian.edit','pengeluaran.operasional.create','pengeluaran.operasional.edit','pengeluaran.operasional.show'])}} {{set_opened(['medis.reservasi.index','medis.pemeriksaan.index','rekam_medis.index','medis.pemberian.index','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index','pengeluaran.honor.index','pengeluaran.pembelian.index','pengeluaran.operasional.index','medis.reservasi.create','medis.pemeriksaan.create','medis.pemeriksaan.show','rekam_medis.create','rekam_medis.show','medis.pemberian.create','medis.pemberian.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.create','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.show','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.create','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.show','pengeluaran.honor.create','pengeluaran.honor.edit','pengeluaran.pembelian.create','pengeluaran.pembelian.edit','pengeluaran.operasional.create','pengeluaran.operasional.edit','pengeluaran.operasional.show'])}} has-sub">
			<a href="#">
				<i class="entypo-doc-text-inv"></i>
				<span class="title">Perekaman Aktivitas</span>
			</a>
			<ul>
				@if(Auth::user()->rekmedis == '1')
				<li class="{{set_active(['medis.reservasi.index','medis.pemeriksaan.index','rekam_medis.index','medis.pemberian.index','medis.reservasi.create','medis.pemeriksaan.create','medis.pemeriksaan.show','rekam_medis.create','rekam_medis.show','medis.pemberian.create','medis.pemberian.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.create'])}} {{set_opened(['medis.reservasi.index','medis.pemeriksaan.index','rekam_medis.index','medis.pemberian.index','medis.reservasi.create','medis.pemeriksaan.create','medis.pemeriksaan.show','rekam_medis.create','rekam_medis.show','medis.pemberian.create','medis.pemberian.edit'])}} has-sub">
					<a href="#">
						<i class="fa fa-medkit"></i>
						<span class="title">Transaksi Klinik</span>
					</a>
					<ul>
						@if(Auth::user()->admin == '1')
						<li class="{{set_active(['medis.reservasi.index','medis.reservasi.create'])}}">
							<a href="{{route('medis.reservasi.index')}}">
								<span class="title">Reservasi</span>
							</a>
						</li>
						@endif
						@if(Auth::user()->admin == '1')
						<li class="{{set_active(['medis.pemeriksaan.index','medis.pemeriksaan.create','medis.pemeriksaan.show'])}}">
							<a href="{{route('medis.pemeriksaan.index')}}">
								<span class="title">Pemeriksaan</span>
							</a>
						</li>
						@endif
						<li class="{{set_active(['rekam_medis.index','rekam_medis.create','rekam_medis.show'])}}">
							<a href="{{route('rekam_medis.index')}}">
								<span class="title">Rekam Medis</span>
							</a>
						</li>
						<li class="{{set_active(['medis.pemberian.index','medis.pemberian.create','medis.pemberian.edit'])}}">
							<a href="{{route('medis.pemberian.index')}}">
								<span class="title">Pemberian Obat</span>
							</a>
						</li>
					</ul>
				</li>
				@endif
				@if(Auth::user()->rekkeuangan == '1')
				<li class="{{set_active(['perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.create','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.show','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.create','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.show','pengeluaran.honor.index','pengeluaran.honor.create','pengeluaran.honor.edit','pengeluaran.pembelian.index','pengeluaran.pembelian.create','pengeluaran.pembelian.edit','pengeluaran.operasional.index','pengeluaran.operasional.create','pengeluaran.operasional.edit','pengeluaran.operasional.show'])}} {{set_opened(['perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.create','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.show','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.create','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.show','pengeluaran.honor.index','pengeluaran.honor.create','pengeluaran.honor.edit','pengeluaran.pembelian.index','pengeluaran.pembelian.create','pengeluaran.pembelian.edit','pengeluaran.operasional.index','pengeluaran.operasional.create','pengeluaran.operasional.edit','pengeluaran.operasional.show'])}} has-sub">
					<a href="#">
						<i class="fa fa-money"></i>
						<span class="title">Keuangan</span>
					</a>
					<ul>
						<li class="{{set_active(['perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.create','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.show','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.create','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.show'])}} {{set_opened(['perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.create','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.show','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.create','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.show'])}} has-sub">
							<a href="#">
								<span class="title">Penerimaan</span>
							</a>
							<ul>
								<li class="{{set_active(['perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.create','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_uang.show'])}}">
									<a href="{{route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index')}}">
										<span class="title">Donasi Uang</span>
									</a>
								</li>
								<li class="{{set_active(['perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.create','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.edit','perekaman_aktivitas.keuangan.penerimaan.donasi_obat.show'])}}">
									<a href="{{route('perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index')}}">
										<span class="title">Donasi Obat</span>
									</a>
								</li>
								{{-- <li>
									<a href="{{route('penerimaan.biaya.index')}}">
										<span class="title">Biaya Pendaftaran</span>
									</a>
								</li> --}}
							</ul>
						</li>
					</ul>

					<ul>
						<li class="{{set_active(['pengeluaran.honor.index','pengeluaran.honor.create','pengeluaran.honor.edit','pengeluaran.pembelian.index','pengeluaran.pembelian.create','pengeluaran.operasional.index','pengeluaran.operasional.create','pengeluaran.operasional.edit','pengeluaran.operasional.show','pengeluaran.pembelian.edit'])}} {{set_opened(['pengeluaran.honor.index','pengeluaran.honor.create','pengeluaran.honor.edit','pengeluaran.honor.create','pengeluaran.honor.edit','pengeluaran.pembelian.index','pengeluaran.pembelian.create','pengeluaran.pembelian.edit','pengeluaran.operasional.index','pengeluaran.operasional.create','pengeluaran.operasional.edit','pengeluaran.operasional.show'])}} has-sub">
							<a href="#">
								<span class="title">Pengeluaran</span>
							</a>
							<ul>
								<li class="{{set_active(['pengeluaran.honor.index','pengeluaran.honor.create','pengeluaran.honor.edit'])}}">
									<a href="{{route('pengeluaran.honor.index')}}">
										<span class="title">Honor</span>
									</a>
								</li>
								{{-- <li class="{{set_active(['pengeluaran.pembelian.index','pengeluaran.pembelian.create','pengeluaran.pembelian.edit'])}}">
									<a href="{{route('pengeluaran.pembelian.index')}}">
										<span class="title">Pembelian Obat</span>
									</a>
								</li> --}}
								<li class="{{set_active(['pengeluaran.operasional.index','pengeluaran.operasional.create','pengeluaran.operasional.edit','pengeluaran.operasional.show'])}}">
									<a href="{{route('pengeluaran.operasional.index')}}">
										<span class="title">Operasional</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				@endif
			</ul>
		</li>
		@endif
		@if(Auth::user()->akunting == '1')
		<li class="{{set_active(['akun.index','transaksi.index','transaksi.create'])}} {{set_opened(['akun.index','transaksi.index','transaksi.create'])}} has-sub">
			<a href="#">
				<i class="fa fa-bank" style="margin-left: 5px;"></i>
				<span class="title">Akunting</span>
			</a>
			<ul>
				<li class="{{set_active(['akun.index'])}}">
					<a href="{{route('akun.index')}}">
						<span class="title">Data Akun</span>
					</a>
				</li>

				<li class="{{set_active(['transaksi.index','transaksi.create'])}}">
					<a href="{{route('transaksi.index')}}">
						<span class="title">Transaksi Keuangan</span>
					</a>
				</li>
			</ul>
		</li>
		@endif
		@if(Auth::user()->lpmedis == '1' || Auth::user()->lpakunting == '1')
		<li class="{{set_active(['laporan.registrasi','output.report','laporan.reservasi','output_report.reservasi','laporan.pemeriksaan','output.laporan.pemeriksaan','laporan.rekam_medis','output_report.rekam_medis','laporan.tipe_akun','laporan.akun','laporan.detail_akun','laporan.akun.detail','laporan.laba','output.laba','laporan.neraca','output.neraca'])}} {{set_opened(['laporan.registrasi','output.report','laporan.reservasi','output_report.reservasi','laporan.pemeriksaan','output.laporan.pemeriksaan','laporan.rekam_medis','output_report.rekam_medis','laporan.tipe_akun','laporan.akun','laporan.detail_akun','laporan.akun.detail','laporan.laba','output.laba','laporan.neraca','output.neraca'])}} has-sub">
			<a href="#">
				<i class="entypo-doc-text"></i>
				<span class="title">Laporan</span>
			</a>
			<ul>
				@if(Auth::user()->lpmedis == '1')
				<li class="{{set_active(['laporan.registrasi','output.report'])}}">
					<a href="{{route('laporan.registrasi')}}">
						<span class="title">Laporan Registrasi</span>
					</a>
				</li>
				<li class="{{set_active(['laporan.reservasi','output_report.reservasi'])}}">
					<a href="{{route('laporan.reservasi')}}">
						<span class="title">Laporan Reservasi Klinik</span>
					</a>
				</li>
				<li class="{{set_active(['laporan.pemeriksaan','output.laporan.pemeriksaan'])}}">
					<a href="{{route('laporan.pemeriksaan')}}">
						<span class="title">Laporan Pemeriksaan Pasien</span>
					</a>
				</li>
				<li class="{{set_active(['laporan.rekam_medis','output_report.rekam_medis'])}}">
					<a href="{{route('laporan.rekam_medis')}}">
						<span class="title">Laporan Rekam Medis</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->lpakunting == '1')
				<li class="{{set_active(['laporan.tipe_akun','laporan.akun'])}}">
					<a href="{{route('laporan.tipe_akun')}}">
						<span class="title">Laporan Berdasarkan Tipe Akun</span>
					</a>
				</li>
				<li class="{{set_active(['laporan.detail_akun','laporan.akun.detail'])}}">
					<a href="{{route('laporan.detail_akun')}}">
						<span class="title">Laporan Detail Per Akun</span>
					</a>
				</li>
				<li class="{{set_active(['laporan.laba','output.laba'])}}">
					<a href="{{route('laporan.laba')}}">
						<span class="title">Laporan Laba(Rugi)</span>
					</a>
				</li>
				<li class="{{set_active(['laporan.neraca','output.neraca'])}}">
					<a href="{{route('laporan.neraca')}}">
						<span class="title">Laporan Neraca</span>
					</a>
				</li>
				@endif
			</ul>
		</li>
		@endif
		@if(Auth::user()->setuser == '1' || Auth::user()->sethonor == '1')
		<li class="{{set_active(['pengaturan.user.data.index','pengaturan.user.data.create','pengaturan.user.data.edit','pengaturan.honor.index','pengaturan.honor.create','pengaturan.honor.edit'])}} {{set_opened(['pengaturan.user.data.index','pengaturan.user.data.create','pengaturan.user.data.edit','pengaturan.honor.index','pengaturan.honor.create','pengaturan.honor.edit'])}} has-sub">
			<a href="#">
				<i class="entypo-cog"></i>
				<span class="title">Pengaturan</span>
			</a>
			<ul>
				@if(Auth::user()->setuser == '1')
				<li class="{{set_active(['pengaturan.user.data.index','pengaturan.user.data.create','pengaturan.user.data.edit'])}}">
					<a href="{{route('pengaturan.user.data.index')}}">
						<i class="entypo-users"></i>
						<span class="title">Pengguna</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->sethonor == '1')
				<li class="{{set_active(['pengaturan.honor.index','pengaturan.honor.create','pengaturan.honor.edit'])}}">
					<a href="{{route('pengaturan.honor.index')}}">
						<i class="entypo-alert"></i>
						<span class="title">Honor</span>
					</a>
				</li>
				@endif
			</ul>
		</li>
		@endif
		<li>
			<a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
				<i class="entypo-logout"></i>
				<span>Logout</span>
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
			
		</li>
</ul>
	</div>
</div>