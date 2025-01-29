<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="Online student Application">
	<meta name="keywords" content="inkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, webadm">

	{{-- <link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" /> --}}
	 <!-- Favicons -->
	 <link href="{{ asset('admission_logo.png') }}" rel="icon">
	 <link href="{{ asset('admission_logo.png') }}" rel="apple-touch-icon">
	
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>URegistrar | @yield('uregistrar_page_tittle')</title>

	<link href="{{ asset('admin_assert/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- Include DataTables CSS -->
	@include('components.datatables-css')
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">URegistrar Dashboard</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						HOME
					</li>

					<li class="sidebar-item {{ request()->routeIs('Uregistrar')?'active':'' }}">
						<a class="sidebar-link" href="{{ route('Uregistrar') }}">
              <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

				 <li class="sidebar-header">
						MANAGE ACADEMIC SETTINGS 
					</li>
	
        <li class="sidebar-item {{ request()->routeIs('intakes.index')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('intakes.index') }}">
                <i class="align-middle" data-feather="plus-circle"></i>
                <span class="align-middle">Intake</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->routeIs('faculties.index')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('faculties.index') }}">
                <i class="align-middle" data-feather="plus-circle"></i>
                <span class="align-middle">Faculties</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->routeIs('departments.index')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('departments.index') }}">
                <i class="align-middle" data-feather="plus-circle"></i>
                <span class="align-middle">Departments</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->routeIs('programs.index')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('programs.index') }}">
                <i class="align-middle" data-feather="plus-circle"></i>
                <span class="align-middle">Programs</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->routeIs('users.index')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('users.index') }}">
                <i class="align-middle" data-feather="users"></i>
                <span class="align-middle">Users</span>
            </a>
        </li>
		
		<li class="sidebar-header">
			REPORTS 
		</li>
		<li class="sidebar-item {{ request()->routeIs('departments.index')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('departments.index') }}">
                <i class="align-middle" data-feather="clipboard"></i>
                <span class="align-middle">Applicant List</span>
            </a>
        </li>
		<li class="sidebar-item {{ request()->routeIs('departments.index')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('departments.index') }}">
                <i class="align-middle" data-feather="check-circle"></i>
                <span class="align-middle">Selected Applicant</span>
            </a>
        </li>
		<li class="sidebar-item {{ request()->routeIs('departments.index')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('departments.index') }}">
                <i class="align-middle" data-feather="x-circle"></i>
                <span class="align-middle">Rejected Applicant</span>
            </a>
        </li>
		<li class="sidebar-item {{ request()->routeIs('departments.index')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('departments.index') }}">
                <i class="align-middle" data-feather="dollar-sign"></i>
                <span class="align-middle">Intake Funds</span>
            </a>
        </li>
    </ul>
</li>
    {{-- <a class="sidebar-link collapsed" data-bs-toggle="collapse" href="#facultyDropdown">
        <i class="align-middle" data-feather="plus-circle"></i>
        <span class="align-middle">Faculties</span>
        <i class="align-middle float-end" data-feather="chevron-down"></i>
    </a>
    <ul id="facultyDropdown" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
        <li class="sidebar-item {{ request()->routeIs('faculties.create')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('faculties.create') }}">
                <i class="align-middle" data-feather="plus"></i>
                <span class="align-middle">Add Faculty</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->routeIs('faculties.index')?'active':'' }}">
            <a class="sidebar-link" href="{{ route('faculties.index') }}">
                <i class="align-middle" data-feather="list"></i>
                <span class="align-middle">Manage Faculties</span>
            </a>
        </li>
    </ul>
</li> --}}
						{{--
					<li class="sidebar-item {{ request()->routeIs('category.create')?'active':'' }}">
						<a class="sidebar-link" href="{{ route('category.create') }}">
              <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Undegraduate</span>
            </a>
					</li>
					<li class="sidebar-item {{ request()->routeIs('category.create')?'active':'' }}">
						<a class="sidebar-link" href="{{ route('category.create') }}">
              <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Post-graduate</span>
            </a>
					</li>
					<li class="sidebar-header">
						Applicaation Details
					</li>
					<li class="sidebar-item {{ request()->routeIs('subcategory.manage')?'active':'' }}">
						<a class="sidebar-link" href="{{ route('subcategory.manage') }}">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">View Applications</span>
            </a>
					</li>
					<li class="sidebar-item {{ request()->routeIs('subcategory.manage')?'active':'' }}">
						<a class="sidebar-link" href="{{ route('subcategory.manage') }}">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Payment Details</span>
            </a>
					</li> --}}
			
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
									 New Notifications
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
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
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

				

					@yield('uregistrar_layout')

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								( {{ date('Y') }} ) Admission &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">	@if(date('H') < 12)
										Good Morning, {{ Auth::user()->name }}
									@elseif(date('H') < 18)
										Good Afternoon, {{ Auth::user()->name }}
									@else
										Good Evening, {{ Auth::user()->name }}
									@endif</a>
								</li>
							</ul>
						</div>
						
					</div>
				</div>
			</footer>
		</div>
	</div>
<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Add SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Success Message Sweet Alert -->
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        timer: 3000,
        showConfirmButton: false,
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session('error') }}',
        timer: 3000,
        showConfirmButton: false,
    });
</script>
@endif

<!-- Delete Confirmation Script -->
<script>
function confirmDelete(deleteUrl) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Create form element
            var form = document.createElement('form');
            form.setAttribute('method', 'POST');
            form.setAttribute('action', deleteUrl);
            
            // Add CSRF token
            var csrfToken = document.createElement('input');
            csrfToken.setAttribute('type', 'hidden');
            csrfToken.setAttribute('name', '_token');
            csrfToken.setAttribute('value', '{{ csrf_token() }}');
            form.appendChild(csrfToken);
            
            // Add method spoofing
            var methodField = document.createElement('input');
            methodField.setAttribute('type', 'hidden');
            methodField.setAttribute('name', '_method');
            methodField.setAttribute('value', 'DELETE');
            form.appendChild(methodField);
            
            // Append form to body and submit
            document.body.appendChild(form);
            form.submit();
        }
    });
}
</script>

<script src="{{ asset('admin_assert/js/app.js') }}"></script>
<!-- Include DataTables JS -->
@include('components.datatables-js')
@stack('scripts')

</body>

</html>