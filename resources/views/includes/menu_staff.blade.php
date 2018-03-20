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
				<i class="fa fa-home"></i>
				<span class="title">Dashboard</span>
			</a>
			
		</li>
		
		<li class="has-sub">
			<a href="#">
				<i class="fa fa-user"></i>
				<span class="title">Staff</span>
			</a>
			<ul>
				<li class="has-sub">
					<a href="#">
						<span class="title">Sub Menu</span>
					</a>
					<ul>
						<li>
							<a href="#">
								<span class="title">List</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<span class="title">Sub Menu</span>
					</a>
					<ul>
						<li>
							<a href="#">
								<span class="title">List</span>
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