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
            <ul class="main-nav">
                <li class="active">
                    <a href="{{route('index')}}">Home</a>
                </li>
                <li>
                    <a href="#">Features </a>
                    
                </li>
                <li>
                    <a href="#">Pricing</a>
                    
                </li>
                <li>
                    <a href="#">Help </a>
                    
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li class="login-link">
                    <a href="login.html">Login / Signup</a>
                </li>
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            {{-- <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>
                </div>
                <div class="header-contact-detail">
                    <p class="contact-header">Support</p>
                    <p class="contact-info-header"> +1 315 369 5943</p>
                </div>
            </li> --}}
            
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
                        <!-- <div class="user-text">
                            <h6>Darren Elder</h6>
                            <p class="text-muted mb-0">Doctor</p>
                        </div> -->
                    </div>
                    @if(Auth::user()->role_id)
                    <a class="dropdown-item" href="{{route('dashboard')}}">@if(Auth::user()->role->name == 'director') My Dashboard @else Switch Dashboard @endif</a>
                    <a class="dropdown-item" href="{{route('profile')}}">Profile Settings</a>
                    @endif
                   
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            <!-- /User Menu -->
            @endauth
        </ul>
    </nav>
</header>
<!-- /Header -->