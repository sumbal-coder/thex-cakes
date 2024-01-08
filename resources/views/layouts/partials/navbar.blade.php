<nav class="main-header navbar navbar-expand navbar-white navbar-light" id="page-header">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>

	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">

		<!-- Notifications Dropdown Menu -->

		<li class="nav-item">
			<a class="nav-link" data-widget="fullscreen" href="#" role="button">
				<i class="fas fa-expand-arrows-alt"></i>
			</a>
		</li>

		<li class="nav-item">
			<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false"><img src="{{ asset(Auth::user()->picture) }}"
					onerror="this.src ='{{ asset("assets/backend/images/avatar.png") }}';" alt="user" class="img-circle elevation-3"
					height="30px" width="30px" />

			</a>
			<div class="dropdown-menu dropdown-menu-right scale-up mr-2">
				<ul class="dropdown-user px-3">
					<div class="row">
						<div class="col-4 d-none d-lg-block d-md-block">
							<img src="{{ asset(Auth::user()->picture) }}" onerror="this.src ='{{ asset("assets/backend/images/avatar.png") }}';"
								alt="user" class="brand-image img-circle elevation-3" width="50px" height="50px">
						</div>

						<div class="col-lg-7 col-md-7 col-sm-12">
							<h4 class="mb-0">
								{{ Auth::user()->name }}
							</h4>
							<div>
								<p class="text-muted mb-1" style="font-size:12px;">
									{{ Auth::user()->email }}
								</p>
							</div>
						</div>

					</div>
					<hr class="mt-4 mb-2">

					<a href="{{ route("logout") }}"
						onclick="event.preventDefault(); document.getElementById('navbar-logout').submit();" class="link text-muted"
						data-toggle="tooltip" title="Logout">
						<div>
							<i class="fa fa-power-off"></i> Logout
						</div>
					</a>
				</ul>
				<form id="navbar-logout" action="{{ route("logout") }}" method="POST" style="display: none;">
					{{ csrf_field() }}</form>
			</div>
		</li>
		{{-- <li class="nav-item mt-2">
			{{ Config::get("app.app-version") }} v1.2.1
		</li> --}}
	</ul>
</nav>
