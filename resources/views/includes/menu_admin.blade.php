<div class="sidebar-menu">
	<div class="sidebar-menu-inner">
		<header class="logo-env">
			<!-- logo -->
			<div class="logo">
				<a href="index">
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

		<ul id="main-menu" class="main-menu">
		<li>
			<a href="#">
				<i class="entypo-gauge"></i>
				<span class="title">Dashboard</span>
			</a>
			
		</li>
		
		@if(Auth::user()->admin == '1' || Auth::user()->petugasmedis == '1' || Auth::user()->vendorobat == '1' || Auth::user()->daftarobat == '1' ||Auth::user()->datapoli == '1' || Auth::user()->pasien == '1' || Auth::user()->peralatan == '1')
		<li class="has-sub">
			<a href="#">
				<i class="entypo-layout"></i>
				<span class="title">Master Data</span>
			</a>
			<ul>
				@if(Auth::user()->petugasmedis == '1')
				<li>
					<a href="#">
						<span class="title">Petugas Medis</span>
					</a>
					<ul>
						<li>
							<a href="{{route('masterdata.petugasmedis.datapetugasmedis.index')}}">
								<span class="title">Data Petugas Medis</span>
							</a>
						</li>
						<li>
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
				@if(Auth::user()->vendorobat == '1')
				<li>
					<a href="{{route('masterdata.vendorobat.index')}}">
						<span class="title">Vendor Obat</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->daftarobat == '1')
				<li>
					<a href="{{route('masterdata.daftarobat.index')}}">
						<span class="title">Daftar Obat</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->datapoli == '1')
				<li>
					<a href="{{route('masterdata.poli.index')}}">
						<span class="title">Data Poli</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->pasien == '1')
				<li>
					<a href="#">
						<span class="title">Pasien</span>
					</a>
					<ul>
						<li>
							<a href="{{route('masterdata.pasien.kategori.index')}}">
								<span class="title">Data Kategori Pasien</span>
							</a>
						</li>
						<li>
							<a href="{{route('masterdata.pasien.kelurahan.index')}}">
								<span class="title">Data Kelurahan</span>
							</a>
						</li>
						<li>
							<a href="{{route('masterdata.pasien.datapasien.index')}}">
								<span class="title">Data Pasien</span>
							</a>
						</li>
						<li>
							<a href="{{route('masterdata.pasien.datapasien.create')}}">
								<span class="title">Registrasi Pasien</span>
							</a>
						</li>
					</ul>
				</li>
				@endif
				@if(Auth::user()->peralatan == '1')
				<li class="has-sub">
					<a href="#">
						<span class="title">Peralatan</span>
					</a>
					<ul>
						<li>
							<a href="{{route('masterdata.peralatan.medis.index')}}">
								<span class="title">Medis</span>
							</a>
						</li>
						<li>
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
		<li class="has-sub">
			<a href="#">
				<i class="entypo-doc-text-inv"></i>
				<span class="title">Perekaman Aktivitas</span>
			</a>
			<ul>
				@if(Auth::user()->rekmedis == '1')
				<li>
					<a href="#">
						<i class="fa fa-medkit"></i>
						<span class="title">Medis</span>
					</a>
					<ul>
						<li>
							<a href="#">
								<span class="title">Pendaftaran</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="title">Pemeriksaan</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="title">Pemberian Obat</span>
							</a>
						</li>
					</ul>
				</li>
				@endif
				@if(Auth::user()->rekkeuangan == '1')
				<li>
					<a href="#">
						<i class="fa fa-money"></i>
						<span class="title">Keuangan</span>
					</a>
					<ul>
						<li>
							<a href="#">
								<span class="title">Penerimaan</span>
							</a>
							<ul>
								<li>
									<a href="{{route('perekaman_aktivitas.keuangan.penerimaan.donasi_uang.index')}}">
										<span class="title">Donasi Uang</span>
									</a>
								</li>
								<li>
									<a href="{{route('perekaman_aktivitas.keuangan.penerimaan.donasi_obat.index')}}">
										<span class="title">Donasi Obat</span>
									</a>
								</li>
								<li>
									<a href="{{route('penerimaan.biaya.index')}}">
										<span class="title">Biaya Pendaftaran</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>

					<ul>
						<li>
							<a href="#">
								<span class="title">Pengeluaran</span>
							</a>
							<ul>
								<li>
									<a href="{{route('pengeluaran.honor.index')}}">
										<span class="title">Honor</span>
									</a>
								</li>
								<li>
									<a href="">
										<span class="title">Pembelian Obat</span>
									</a>
								</li>
								<li>
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
		@if(Auth::user()->lapmedis == '1' || Auth::user()->lapakuntansi == '1')
		<li class="has-sub">
			<a href="#">
				<i class="entypo-book"></i>
				<span class="title">Pelaporan</span>
			</a>
			<ul>
				@if(Auth::user()->lapmedis == '1')
				<li>
					<a href="#">
						<i class="fa fa-hospital-o"></i>
						<span class="title">Medis</span>
					</a>
					<ul>
						<li>
							<a href="#">
								<span class="title">Pemeriksaan & Tindakan Medis</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="title">Kinerja Dokter & Staff Administrasi</span>
							</a>
						</li>
					</ul>
				</li>
				@endif
				@if(Auth::user()->lapakuntansi == '1')
				<li>
					<a href="#">
						<i class="fa fa-bank"></i>
						<span class="title">Akuntansi</span>
					</a>
					<ul>
						<li>
							<a href="#">
								<span class="title">Posisi Keuangan</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="title">Kinerja Keuangan</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="title">Arus Kas</span>
							</a>
						</li>
					</ul>
				</li>
				@endif
			</ul>
		</li>
		@endif
		@if(Auth::user()->setuser == '1' || Auth::user()->sethonor == '1')
		<li class="has-sub">
			<a href="#">
				<i class="entypo-cog"></i>
				<span class="title">Pengaturan</span>
			</a>
			<ul>
				@if(Auth::user()->setuser == '1')
				<li>
					<a href="{{route('pengaturan.user.data.index')}}">
						<i class="fa fa-user-plus"></i>
						<span class="title">Pengguna</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->sethonor == '1')
				<li>
					<a href="#">
						<i class="entypo-alert"></i>
						<span class="title">Honor</span>
					</a>
					<ul>
						<li>
							<a href="#">
								<span class="title">Dokter</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="title">Staff Administrasi</span>
							</a>
						</li>
					</ul>
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