<!-- Header -->
<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="{{route('index')}}" class="navbar-brand logo">
                <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{route('index')}}" class="menu-logo">
                    <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            @guest
            <ul class="main-nav">
                <li class="active">
                    <a href="{{route('index')}}">Home</a>
                </li>
                <li>
                    <a href="#">Features </a>
                    
                </li>
                <li>
                    <a href="{{route('plans')}}">Plans</a>
                    
                </li>
                <li>
                    <a href="#">Help </a>
                    
                </li>
                <li>
                    <a href="#abc">Contact</a>
                </li>
                <li class="login-link">
                    <a href="{{route('login')}}">Login / Signup</a>
                </li>
            </ul>
            @else
                @if(request()->route('pharmacy'))
                    <ul class="main-nav">
                        <li class="active">
                            <a href="{{route('pharmacy.dashboard',$pharmacy)}}">Dashboard</a>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Patients <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li><a href="search.html">New Patient</a></li>
                                <li><a href="doctor-profile.html">All Patient</a></li>
                                <li><a href="booking.html">Transfer Patient</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Health Care <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li class="has-submenu">
                                    <a href="invoices.html">Assessments</a>
                                    <ul class="submenu">
                                        <li><a href="invoices.html">New Assessment</a></li>
                                        <li><a href="invoice-view.html">All Assessments</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href="invoices.html">Prescriptions</a>
                                    <ul class="submenu">
                                        <li><a href="invoices.html">New Prescription</a></li>
                                        <li><a href="invoice-view.html">All Prescriptions</a></li>
                                    </ul>
                                </li>
                                <li><a href="search.html">Errors</a></li>
                                <li><a href="doctor-profile.html">Messages</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Inventory <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li><a href="doctor-profile.html">Upload Items</a></li>
                                <li class="has-submenu">
                                    <a href="invoices.html">Items</a>
                                    <ul class="submenu">
                                        <li><a href="invoices.html">Drugs</a></li>
                                        <li><a href="invoice-view.html">Non-Drugs</a></li>
                                    </ul>
                                </li>
                                <li><a href="search.html">Shelves</a></li>
                                <li><a href="search.html">Transfer Items</a></li>
                                <li><a href="search.html">Suppliers</a></li>
                                <li class="has-submenu">
                                    <a href="doctor-profile.html">Sales</a>
                                    <ul class="submenu">
                                        <li><a href="invoices.html">New Sale</a></li>
                                        <li><a href="invoice-view.html">All Sales</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Help </a>
                            
                        </li>
                        <li>
                            <a href="#abc">Contact</a>
                        </li>
                        <li class="login-link">
                            <a href="{{route('login')}}">Login / Signup</a>
                        </li>
                    </ul>
                @else
                    <ul class="main-nav">
                        <li class="active">
                            <a href="{{route('dashboard')}}">Home</a>

                        </li>
                        <li class="has-submenu">
                            <a href="#">Pharmacies <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                @foreach (auth()->user()->pharmacies as $pharmacy)
                                <li><a href="{{route('pharmacy.dashboard',$pharmacy)}}">{{$pharmacy->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('subscription')}}">Subscription</a>
                        </li>
                        <li>
                            <a href="{{route('plans')}}">Plans</a>
                        </li>
                        <li>
                            <a href="#">Help </a> 
                        </li>
                        <li>
                            <a href="#abc">Contact</a>
                        </li>
                        <li class="login-link">
                            <a href="{{route('login')}}">Login / Signup</a>
                        </li>
                    </ul>  
                @endif
            @endguest

        </div>
        <ul class="nav header-navbar-rht">
            
            @guest
            <li class="nav-item">
                <a class="nav-link btn btn-primary" href="{{route('register')}}">
                    Add Pharmacy
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link header-login" href="{{route('login')}}">
                    Login/Signup
                </a>
            </li>
            @else
            <!-- User Menu -->
        
            <li class="nav-item dropdown contact-item">
                <a href="#" class="dropdown-toggle header-contact-img" data-toggle="dropdown">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-pill">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <p class="py-2 px-3 mb-0 ">Notifications</p>
                    <a class="dropdown-item " href="{{route('dashboard')}}">
                        <div class="d-flex">
                            <span class="avatar avatar-sm">
                                <img class="avatar-img rounded-circle" alt="User Image" src="http://localhost/reigntech/pharmacy/public/adminassets/img/doctors/doctor-thumb-01.jpg">
                            </span>
                            <div class="media-body pl-3">
                                <p class="mb-0"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
                                <p class="mb-0"><span class="notification-time">4 mins ago</span></p>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item flex-column align-items-start" href="#">
                        <p class="mb-0 d-block">Admin sent you a message when you returned from travel</p>
                        <small class="mb-0 text-muted">4 mins ago</small>

                    </a>
                    <a class="dropdown-item" href="#">Something</a>
                    <p class="text-center">
                        <a href="#">View all Notifications</a> 
                    </p>
                    
                </div>
            </li> 
        
            <li class="nav-item dropdown has-arrow logged-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" width="31"
                            alt="Darren Elder">
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image"
                                class="avatar-img rounded-circle">
                        </div>
                         <div class="user-text">
                            <h6>{{explode(' ',Auth::user()->name)[0]}}</h6>
                            {{-- <p class="text-muted mb-0">Doctor</p> --}}
                        </div> 
                    </div>
                    <a class="dropdown-item" href="{{route('dashboard')}}">Home</a>
                    <a class="dropdown-item" href="{{route('profile')}}">My Account</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endauth
        </ul>
    </nav>
</header>
<!-- /Header -->