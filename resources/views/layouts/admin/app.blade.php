<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Doccure - Dashboard</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('adminassets/img/favicon.png')}}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('adminassets/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('adminassets/css/font-awesome.min.css')}}">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{asset('adminassets/css/feathericon.min.css')}}">
		@stack('styles')
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('adminassets/css/style.css')}}">
		
		<!--[if lt IE 9]>
			<script src="{{asset('adminassets/js/html5shiv.min.js')}}"></script>
			<script src="{{asset('adminassets/js/respond.min.js')}}"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="index.html" class="logo">
						<img src="{{asset('adminassets/img/logo.png')}}" alt="Logo">
					</a>
					<a href="index.html" class="logo logo-small">
						<img src="{{asset('adminassets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				
				<div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- Notifications -->
					<li class="nav-item dropdown noti-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('adminassets/img/doctors/doctor-thumb-01.jpg')}}">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
													<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('adminassets/img/patients/patient1.jpg')}}">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Charlene Reed</span> has booked her appointment to <span class="noti-title">Dr. Ruby Perrin</span></p>
													<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('adminassets/img/patients/patient2.jpg')}}">
												</span>
												<div class="media-body">
												<p class="noti-details"><span class="noti-title">Travis Trimble</span> sent a amount of $210 for his <span class="noti-title">appointment</span></p>
												<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('adminassets/img/patients/patient3.jpg')}}">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Carl Kelly</span> send a message <span class="noti-title"> to his doctor</span></p>
													<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="#">View all Notifications</a>
							</div>
						</div>
					</li>
					<!-- /Notifications -->
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="{{asset('adminassets/img/profiles/avatar-01.jpg')}}" width="31" alt="Ryan Taylor"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="{{asset('adminassets/img/profiles/avatar-01.jpg')}}" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6>Ryan Taylor</h6>
									<p class="text-muted mb-0">Administrator</p>
								</div>
							</div>
							<a class="dropdown-item" href="profile.html">My Profile</a>
							<a class="dropdown-item" href="settings.html">Settings</a>
							
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li @if(Route::is('admin.dashboard')) class="active" @endif> 
								<a href="{{route('admin.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li @if(Route::is('admin.pharmacies')) class="active" @endif> 
								<a href="{{route('admin.pharmacies')}}"><i class="fe fe-building"></i> <span>Pharmacies</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-bar-chart"></i> <span> Drug Management</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="invoice-report.html">APIs</a></li>
									<li><a href="invoice-report.html">Drug Formulations</a></li>
									<li><a href="invoice-report.html">Drug Categories</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-bar-chart"></i> <span> Assessment Settings</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="invoice-report.html">Family & Social Questions</a></li>
									<li><a href="invoice-report.html">Medical Advises</a></li>
									<li><a href="invoice-report.html">Laboratory Tests</a></li>
									<li><a href="invoice-report.html">Vitals</a></li>
								</ul>
							</li>
							<li @if(Route::is('admin.medicines')) class="active" @endif> 
								<a href="{{route('admin.medicines')}}"><i class="fe fe-building"></i> <span>API</span></a>
							</li>
							<li @if(Route::is('admin.drugs')) class="active" @endif> 
								<a href="{{route('admin.drugs')}}"><i class="fe fe-building"></i> <span>Drug Formulations</span></a>
							</li>
							{{-- <li class="submenu">
								<a href="#"><i class="fe fe-bar-chart"></i> <span> Medicine</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li @if(Route::is('admin.medicines')) class="active" @endif><a href="{{route('admin.medicines')}}">Drug Ingredients</a></li>
									<li @if(Route::is('admin.drugs')) class="active" @endif><a href="{{route('admin.drugs')}}">Drugs</a></li>
									<li @if(Route::is('admin.medicines.upload')) class="active" @endif><a href="{{route('admin.medicines.upload')}}">Upload</a></li>
								</ul>
							</li>	 --}}
							{{-- <li @if(Route::is('admin.diseases')) class="active" @endif> 
								<a href="{{route('admin.diseases')}}"><i class="fe fe-bug"></i> <span>Diseases</span></a>
							</li> --}}
							
							<li @if(Route::is('admin.patients')) class="active" @endif> 
								<a href="{{route('admin.patients')}}"><i class="fe fe-users"></i> <span>Patients</span></a>
							</li>
							<li @if(Route::is('admin.settings')) class="active" @endif> 
								<a href="{{route('admin.settings')}}"><i class="fe fe-gear"></i> <span>Settings</span></a>
							</li>
							<li @if(Route::is('admin.users')) class="active" @endif> 
								<a href="{{route('admin.users')}}"><i class="fe fe-user-plus"></i> <span>Users</span></a>
							</li>
							{{-- <li class="submenu">
								<a href="#"><i class="fe fe-vector"></i> <span> Settings </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('admin.settings.global')}}"> Global </a></li>
									<li><a href="{{route('admin.patients')}}"> Register </a></li>
									<li><a href="{{route('admin.patients')}}"> Forgot Password </a></li>
									<li><a href="{{route('admin.patients')}}"> Lock Screen </a></li>
								</ul>
							</li> --}}
							{{-- <li @if(Route::is('admin.subscriptions')) class="active" @endif> 
								<a href="{{route('admin.subscriptions')}}"><i class="fe fe-star-o"></i> <span>Subscriptions</span></a>
							</li> --}}
							<li @if(Route::is('admin.payments')) class="active" @endif> 
								<a href="{{route('admin.payments')}}"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li>
							
							<li> 
								<a href="{{route('admin.roles')}}"><i class="fe fe-vector"></i> <span>Roles</span></a>
							</li>
							
							<li class="submenu">
								<a href="#"><i class="fe fe-bar-chart"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="invoice-report.html">Invoice Reports</a></li>
								</ul>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                @yield('main')			
			</div>
			<!-- /Page Wrapper -->
				@yield('modals')
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{asset('adminassets/js/jquery-3.2.1.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('adminassets/js/popper.min.js')}}"></script>
        <script src="{{asset('adminassets/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{asset('plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
		
		
		@stack('scripts')
		<!-- Custom JS -->
		<script  src="{{asset('adminassets/js/script.js')}}"></script>
		
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->
</html>