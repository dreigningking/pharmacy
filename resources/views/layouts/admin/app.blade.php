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
							<span class="user-img"><img class="rounded-circle" src="{{asset('adminassets/img/profiles/avatar-01.jpg')}}" width="31" alt="{{auth()->user()->name}}"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="{{asset('adminassets/img/profiles/avatar-01.jpg')}}" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6>{{auth()->user()->name}}</h6>
									<p class="text-muted mb-0">{{auth()->user()->role->name}}</p>
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
							@if(auth()->user()->isRole('admin') || auth()->user()->role->hasPermission('pharmacy'))
							<li @if(Route::is('admin.pharmacies')) class="active" @endif> 
								<a href="{{route('admin.pharmacies')}}"><i class="fe fe-building"></i> <span>Pharmacies</span></a>
							</li>
							@endif
							@if(auth()->user()->isRole('admin') || auth()->user()->role->hasPermission('medicine'))
							<li @if(Route::is('admin.medicines')) class="submenu" @endif>
								<a href="#"><i class="fe fe-building"></i> <span> Drug Management</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('admin.apis')}}">APIs</a></li>
									<li><a href="{{route('admin.api.interactions')}}">Interactions</a></li>
									<li><a href="{{route('admin.categories')}}">Drug Categories</a></li>
									<li><a href="{{route('admin.drugs')}}">Drug Formulations</a></li>
									<li><a href="{{route('admin.drugs.submissions')}}">Submissions</a></li>
									
								</ul>
							</li>
							@endif
							@if(auth()->user()->isRole('admin') || auth()->user()->role->hasPermission('assessment_settings'))
							<li class="submenu">
								<a href="#"><i class="fe fe-cloud"></i> <span> Assessment Settings</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('admin.assessments.complaints')}}">Complaints</a></li>
									<li><a href="{{route('admin.assessments.conditions')}}">Medical Conditions</a></li>
									<li><a href="{{route('admin.assessments.errors')}}">Errors & Interventions</a></li>
									<li><a href="{{route('admin.assessments.family_social_questions')}}">Family & Social History Questions</a></li>
									<li><a href="{{route('admin.assessments.vitals')}}">Vitals</a></li>
									<li><a href="{{route('admin.assessments.system_review_questions')}}">System Review Questions</a></li>
									<li><a href="{{route('admin.assessments.labtests')}}">Laboratory Tests</a></li>
								</ul>
							</li>
							@endif
							@if(auth()->user()->isRole('admin') || auth()->user()->role->hasPermission('subscription'))
							<li class="submenu">
								<a href="#"><i class="fe fe-tablet"></i> <span> Subscriptions </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('admin.subscriptions.subscribers')}}">Subscribers</a></li>
									<li><a href="{{route('admin.subscriptions.licenses')}}">Licenses</a></li>
									<li><a href="{{route('admin.subscriptions.transactions')}}">Transactions</a></li>
									<li><a href="{{route('admin.subscriptions.sms')}}">SMS</a></li>
									
								</ul>
							</li>
							@endif
							@if(auth()->user()->isRole('admin') || auth()->user()->role->hasPermission('role'))
							<li class="submenu">
								<a href="#"><i class="fe fe-vector"></i> <span> Roles </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('admin.roles.staff')}}">Admin</a></li>
									<li><a href="{{route('admin.roles.pharmacy')}}">Pharmacies</a></li>
								</ul>
							</li>
							@endif
							@if(auth()->user()->isRole('admin') || auth()->user()->role->hasPermission('system_settings'))
							<li @if(Route::is('admin.settings')) class="active" @endif> 
								<a href="{{route('admin.settings')}}"><i class="fe fe-gear"></i> <span>Settings</span></a>
							</li>
							@endif
							@if(auth()->user()->isRole('admin') || auth()->user()->role->hasPermission('user'))
							<li @if(Route::is('admin.users')) class="active" @endif> 
								<a href="{{route('admin.users.list')}}"><i class="fe fe-user-plus"></i> <span>Admin Users</span></a>
							</li>
							@endif
							{{-- @if(auth()->user()->isRole('admin') || auth()->user()->role->hasPermission('support'))
							<li @if(Route::is('admin.support.inbox')) class="active" @endif> 
								<a href="{{route('admin.support.inbox')}}"><i class="fe fe-comments"></i> <span>Support</span></a>
							</li>
							@endif --}}
							{{-- <li class="submenu">
								<a href="#"><i class="fe fe-bar-chart"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="#">Invoice Reports</a></li>
								</ul>
							</li> --}}
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