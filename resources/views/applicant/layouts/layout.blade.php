<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="Online student Application">
	<meta name="keywords" content="inkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, webadm">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title> @yield('applicant_page_tittle')</title>

	<link href="{{ asset('admin_assert/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Applicant Dashboard</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						HOME
					</li>

					<li class="sidebar-item {{ request()->routeIs('applicant')?'active':'' }}">
						<a class="sidebar-link" href="{{ route('applicant') }}">
              <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

 <a class="sidebar-link collapsed" data-bs-toggle="collapse" href="#facultyDropdown">
        <i class="align-middle" data-feather="plus-circle"></i>
        <span class="align-middle">Make Applications</span>
        <i class="align-middle float-end" data-feather="chevron-down"></i>
    </a>
    <ul id="facultyDropdown" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
        {{-- <li class="sidebar-item {{ request()->routeIs('BridgingPayment')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('BridgingPayment') }}">
                <i class="align-middle" data-feather="plus"></i>
                <span class="align-middle">Bridging</span>
            </a>
        </li> --}}
        <li class="sidebar-item {{ request()->routeIs('applicant')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('applicant') }}">
                <i class="align-middle" data-feather="list"></i>
                <span class="align-middle">Undergraduate</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->routeIs('applicant')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('applicant') }}">
                <i class="align-middle" data-feather="list"></i>
                <span class="align-middle">UCE</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->routeIs('applicant')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('applicant') }}">
                <i class="align-middle" data-feather="list"></i>
                <span class="align-middle">Upgrading</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->routeIs('applicant')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('applicant') }}">
                <i class="align-middle" data-feather="list"></i>
                <span class="align-middle">Postgraduate</span>
            </a>
        </li>
    </ul>
</li> 
<li class="sidebar-header">
    Payments & Applications
</li>

<li class="sidebar-item {{ request()->routeIs('applicant.select-application-type')?'active':'' }}">
    <a class="sidebar-link" href="{{ route('applicant.select-application-type') }}">
        <i class="align-middle" data-feather="file-plus"></i>
        <span class="align-middle">New Application</span>
    </a>
</li>

<li class="sidebar-item {{ request()->routeIs('applicant.transactions') || request()->routeIs('payments.*')?'active':'' }}">
    <a class="sidebar-link" href="{{ route('applicant.transactions') }}">
        <i class="align-middle" data-feather="credit-card"></i>
        <span class="align-middle">Payment History</span>
    </a>
</li>

<li class="sidebar-item {{ request()->routeIs('applicant.applications')?'active':'' }}">
    <a class="sidebar-link" href="#">
        <i class="align-middle" data-feather="file-text"></i>
        <span class="align-middle">My Applications</span>
    </a>
</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="charts-chartjs.html">
              <a class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Log Out</span>
              </a>
              <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
              </form>
            </a>
					</li>

					
				</ul>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>
		
			<a class="btn btn-primary nav-item mx-12" href="#" role="button">Applicant ID: {{ Auth::user()->applicant_id }}</a>
		

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <span class="text-dark">{{ Auth::user()->name }}</span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<form method="POST" action="{{ route('logout') }}">
									@csrf
				
									<x-responsive-nav-link :href="route('logout')"
											onclick="event.preventDefault();
														this.closest('form').submit();">
										{{ __('Log Out') }}
									</x-responsive-nav-link>
								</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

				

					@yield('applicant_layout')

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
<!-- Add SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Success Message Sweet Alert -->
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
    });
@endif
</script>
	<script src="{{ asset('admin_assert/js/app.js') }}"></script>

</body>

</html>