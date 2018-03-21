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
		
		<li class="has-sub">
			<a href="#">
				<i class="entypo-layout"></i>
				<span class="title">Master Data</span>
			</a>
			<ul>
				<li>
					<a href="#">
						<span class="title">Petugas Medis</span>
					</a>
					<ul>
						<li>
							<a href="{{route('petugas.index')}}">
								<span class="title">Data Petugas Medis</span>
							</a>
						</li>
						<li>
							<a href="{{route('jadwal.jadwal') }}">
								<span class="title">Jadwal Petugas Medis</span>
							</a>
						</li>
						<li>
							<a href="{{route('petugas.create') }}">
								<span class="title">Tambah Petugas Medis</span>
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">
						<span class="title">Staff Administrasi</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="title">Pasien</span>
					</a>
					<ul>
						<li>
							<a href="{{route('kategoripasien.index')}}">
								<span class="title">Data Kategori Pasien</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="title">Data Kelurahan</span>
							</a>
						</li>
						<li>
							<a href="{{route('pasien.index')}}">
								<span class="title">Data Pasien</span>
							</a>
						</li>
						<li>
							<a href="{{route('pasien.create')}}">
								<span class="title">Registrasi Pasien</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<span class="title">Peralatan</span>
					</a>
					<ul>
						<li>
							<a href="#">
								<span class="title">Medis</span>
							</a>
						</li>
						<li>
						<a href="#">
							<span class="title">Kantor</span>
						</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		
		<li class="has-sub">
			<a href="#">
				<i class="entypo-doc-text-inv"></i>
				<span class="title">Perekeman Aktivitas</span>
			</a>
			<ul>
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
									<a href="">
										<span class="title">Donasi Uang</span>
									</a>
								</li>
								<li>
									<a href="">
										<span class="title">Donasi Obat</span>
									</a>
								</li>
								<li>
									<a href="">
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
									<a href="">
										<span class="title">Honor</span>
									</a>
								</li>
								<li>
									<a href="">
										<span class="title">Pembelian Obat</span>
									</a>
								</li>
								<li>
									<a href="">
										<span class="title">Operasional</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<li class="has-sub">
			<a href="#">
				<i class=" fa fa-book"></i>
				<span class=" title"> Pelaporan</span>
			</a>
			<ul>
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
			</ul>
		</li>
		<li class="has-sub">
			<a href="#">
				<i class="entypo-cog"></i>
				<span class="title">Pengaturan</span>
			</a>
			<ul>
				<li class="has-sub">
					<a href="#">
						<i class="fa fa-user-plus"></i>
						<span class="title">User</span>
					</a>
					<ul>
						<li>
							<a href="{{route('role.index')}}">
								<i class="fa fa-group"></i>
								<span class="title">Group User</span>	
							</a>
						</li>

						<li>
							<a href="{{route('users.index')}}">
								<i class="fa fa-user"></i>
								<span class="title">Data User</span>	
							</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="#">
						<i class="entypo-calendar"></i>
						<span class="title">Jadwal</span>
					</a>
				</li>

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
								<span class="title">Staf Administrasi</span>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>
	
		<li>
			<a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
				<i class="fa fa-sign-out"></i>
				<span>Logout</span>
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
			
		</li>
</ul>
	</div>
</div>