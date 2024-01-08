<aside class="main-sidebar sidebar-light-success elevation-4" id="main-sidebar">
	<a href="{{ url('dashboard') }}" class="brand-link" style="border-bottom: none !important;">
		<div class="d-flex">
			<img src="{{ asset('assets/frontend/images/logo/logo.png') }}" width="33" height="50" alt="AFJ Limited" class="brand-image" style="max-height: 65px !important;">

		</div>
	</a>
	<div class="sidebar">
		<div class="user-panel d-flex mt-3 mb-3 pb-3" style="border-bottom: none !important;">
			<div class="image">
				<img src="{{ asset(auth()->user()->picture) }}" onerror="this.src ='{{ asset("assets/backend/images/avatar.png") }}';" width="33.59" height="33.59" alt="user" class="img-circle elevation-3 bg-white" />
			</div>
			<div class="info">
				<a href="{{ url('dashboard') }}" class="d-block">{{ auth()->user()->name }} </a>
			</div>
		</div>
		<nav class="mt-2 mb-5 pb-5">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" aria-role="menu" aria-roledescription="menu" role="menu" data-accordion="false">

				<li class="nav-item">
					<a wire:navigate href="{{ url('dashboard') }}" @if (request()->is('dashboard')) class="nav-link active" @else class="nav-link" @endif>
						<i class="nav-icon fa-solid fa-gauge"></i>
						<p>Dashboard</p>
					</a>
				</li>

				<li @if (request()->is('users*') || request()->is('roles*')) class="nav-item menu-open" @else class="nav-item" @endif>
					<a href="#" @if (request()->is('users*') || request()->is('roles*')) class="nav-link active" @else class="nav-link" @endif>
						<i class="fa-solid fa-users nav-icon"></i>
						<p>
							User Management
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a wire:navigate href="{{ url('users') }}" @if (request()->is('user*')) class="nav-link active" @else class="nav-link" @endif>
								<i class="nav-icon fa-solid fas fa-user"></i>
								<p>Users</p>
							</a>
						</li>

						<li class="nav-item">
							<a wire:navigate href="{{ url('roles') }}" @if (request()->is('roles*')) class="nav-link active" @else class="nav-link" @endif>
								<i class="nav-icon fa-solid fa-user-shield"></i>
								<p>Roles</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item">
					<a wire:navigate href="{{ url('product') }}" @if (request()->is('product*')) class="nav-link active" @else class="nav-link" @endif>
						<i class="nav-icon fa-solid fa-store"></i>
						<p>Products</p>
					</a>
				</li>

				<li class="nav-item">
					<a wire:navigate href="{{ url('content/faq') }}" @if (request()->is('content/faq*')) class="nav-link active" @else class="nav-link" @endif>
						<i class="nav-icon fa-solid fa-store"></i>
						<p>FAQs</p>
					</a>
				</li>

				<li class="nav-item">
					<a wire:navigate href="{{ url('/address') }}" @if (request()->is('address*')) class="nav-link active" @else class="nav-link" @endif>
						<i class="nav-icon fa-solid fa-home"></i>
						<p>Address</p>
					</a>
				</li>

				<li class="nav-item">
					<a wire:navigate href="{{ url('content/about-us') }}" @if (request()->is('content/about-us*')) class="nav-link active" @else class="nav-link" @endif>
						<i class="nav-icon fa-solid fa-cubes"></i>
						<p>About Us</p>
					</a>
				</li>

				<li class="nav-item">
					<a wire:navigate href="{{ url('content/page') }}" @if (request()->is('content/page*')) class="nav-link active" @else class="nav-link" @endif>
						<i class="nav-icon fa-solid fa-pencil"></i>
						<p>Content</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
	<hr>
	<div class="row col-12 justify-content-between bg-success pb-2 pt-2 pl-3 pr-3" style="position: absolute; bottom: 0px; left: 0px; margin-left: 0px; padding-left: 0px;">
		<a {{-- href="{{ route('profile.index') }}" --}} class="link text-light text-center" title="Account Setting">
			<i class="fas fa-cog"></i>
		</a>
		<a href="#" onclick="event.preventDefault(); document.getElementById('sidebar-logout').submit();" class="link text-light text-center" title="Logout">
			<i class="fa fa-power-off"></i>
		</a>
		<form id="sidebar-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
	</div>
</aside>