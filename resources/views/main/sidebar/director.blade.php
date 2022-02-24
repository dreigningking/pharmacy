<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

    <!-- Profile Sidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>Dr. Darren Elder</h3>

                    <div class="patient-details">
                        <h5 class="mb-0">BDS, MDS - Oral & Maxillofacial Surgery</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li @if(Route::is('dashboard')) class="active" @endif>
                        <a href="{{route('dashboard')}}">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li @if(Route::is('pharmacies')) class="active" @endif>
                        <a href="{{route('pharmacies')}}">
                            <i class="fas fa-prescription"></i>
                            <span>Pharmacies</span>
                        </a>
                    </li>
                    <li @if(Route::is('payments')) class="active" @endif>
                        <a href="{{route('payments')}}">
                            <i class="fas fa-money-bill"></i>
                            <span>Payments</span>
                        </a>
                    </li>


                    <li>
                        <a href="social-media.html">
                            <i class="fas fa-pills"></i>
                            <span>ADI</span>
                        </a>
                    </li>
                    <li>
                        <a href="invoices.html">
                            <i class="fas fa-user"></i>
                            <span>Suppliers</span>
                        </a>
                    </li>
                    <li>
                        <a href="social-media.html">
                            <i class="fas fa-share"></i>
                            <span>Transfer</span>
                        </a>
                    </li>
                    <li @if(Route::is('transactions')) class="active" @endif>
                        <a href="{{route('transactions')}}">
                            <i class="fas fa-chart-bar"></i>
                            <span>Transcation</span>
                        </a>
                    </li>
                    <li @if(Route::is('staff')) class="active" @endif>
                        <a href="{{route('staff')}}">
                            <i class="fas fa-users"></i> <span>Staff</span>
                        </a>
                    </li>
                    <li @if(Route::is('profile')) class="active" @endif>
                        <a href="{{route('profile')}}">
                            <i class="fas fa-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="doctor-change-password.html">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="index-2.html">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- /Profile Sidebar -->

</div>