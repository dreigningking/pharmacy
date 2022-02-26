<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

    <!-- Profile Sidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{asset('assets/img/pharmacy-logo.jpg')}}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h2>Ramsgate </h2>

                    <div class="patient-details">
                        <span class="mb-0">Ota, Ogun state</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li @if(Route::is('pharmacy.dashboard')) class="active" @endif>
                        <a href="{{route('pharmacy.dashboard',$pharmacy)}}">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="appointments.html">
                            <i class="fas fa-calendar-check"></i>
                            <span>Appointments</span>
                        </a>
                    </li>
                    <li>
                        <a href="my-patients.html">
                            <i class="fas fa-user-injured"></i>
                            <span>Patients</span>
                        </a>
                    </li>
                    <li>
                        <a href="my-patients.html">
                            <i class="fas fa-pen"></i>
                            <span>Assessments</span>
                        </a>
                    </li>
                    <li>
                        <a href="schedule-timings.html">
                            <i class="fas fa-pills"></i>
                            <span>Drugs</span>
                        </a>
                    </li>
                    <li>
                        <a href="invoices.html">
                            <i class="fas fa-user"></i>
                            <span>Suppliers</span>
                        </a>
                    </li>
                    <li>
                        <a href="reviews.html">
                            <i class="fas fa-archive"></i>
                            <span>Shelf</span>
                        </a>
                    </li>
                    <li>
                        <a href="chat-doctor.html">
                            <i class="fas fa-file-invoice"></i>
                            <span>Supply</span>
                            <!-- <small class="unread-msg">23</small> -->
                        </a>
                    </li>
                    <li>
                        <a href="doctor-profile-settings.html">
                            <i class="fas fa-file-invoice"></i>
                            <span>Purchase</span>
                        </a>
                    </li>
                    <li @if(Route::is('pharmacy.transactions')) class="active" @endif>
                        <a href="{{route('pharmacy.transactions')}}">
                            <i class="fas fa-chart-bar"></i>
                            <span>Transcation</span>
                        </a>
                    </li>
                    <li>
                        <a href="social-media.html">
                            <i class="fas fa-redo"></i>
                            <span>Returns</span>
                        </a>
                    </li>
                    <li>
                        <a href="social-media.html">
                            <i class="fas fa-share"></i>
                            <span>Transfer</span>
                        </a>
                    </li>
                    <li @if(Route::is('pharmacy.staff')) class="active" @endif>
                        <a href="{{route('pharmacy.staff')}}">
                            <i class="fas fa-users"></i> <span>Staff</span>
                        </a>
                    </li>
                    <li>
                        <a href="doctor-profile-settings.html">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li @if(Route::is('pharmacy.staff-profile')) class="active" @endif>
                        <a href="{{route('pharmacy.staff-profile')}}">
                            <i class="fas fa-cog"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="index-2.html">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li> -->
                </ul>
            </nav>
        </div>
    </div>
    <!-- /Profile Sidebar -->

</div>