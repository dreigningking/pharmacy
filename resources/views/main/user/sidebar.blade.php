<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

    <!-- Profile Sidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{$user->name}}</h3>

                    <div class="patient-details">
                        <h5 class="mb-0">@if($user->work) {{$user->work}} @endif</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>

                    @if(Auth::user()->isAnyRole(['director']))
                    <li @if(Route::is('dashboard')) class="active" @endif>
                        <a href="{{route('dashboard')}}">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li @if(Route::is('setup')) class="active" @endif>
                        <a href="{{route('setup')}}">
                            <i class="fas fa-prescription"></i>
                            <span>Add Pharmacy</span>
                        </a>
                    </li>
                    <li @if(Route::is('subscription')) class="active" @endif>
                        <a href="{{route('subscription')}}">
                            <i class="fas fa-money-bill"></i>
                            <span>Subscription</span>
                        </a>
                    </li>
                    <li @if(Route::is('transactions')) class="active" @endif>
                        <a href="{{route('transactions')}}">
                            <i class="fas fa-chart-bar"></i>
                            <span>Transcation</span>
                        </a>
                    </li>

                    <li @if(Route::is('medicine')) class="active" @endif>
                        <a href="{{route('medicine')}}">
                            <i class="fas fa-pills"></i>
                            <span>Medicine</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('suppliers')}}">
                            <i class="fas fa-users"></i>
                            <span>Suppliers</span>
                        </a>
                    </li>
                    <li>
                        <a href="social-media.html">
                            <i class="fas fa-share"></i>
                            <span>Transfer</span>
                        </a>
                    </li>

                    <li @if(Route::is('staff')) class="active" @endif>
                        <a href="{{route('staff')}}">
                            <i class="fas fa-users"></i> <span>Staff</span>
                        </a>
                    </li>

                    @endif

                    <li @if(Route::is('workspaces')) class="active" @endif>
                        <a href="{{route('workspaces')}}">
                            <i class="fas fa-columns"></i>
                            <span>Workspaces</span>
                        </a>
                    </li>
                    <li @if(Route::is('activities')) class="active" @endif>
                        <a href="{{route('activities')}}">
                            <i class="fas fa-list-ol"></i>
                            <span>activities</span>
                        </a>
                    </li>
                    <li @if(Route::is('profile')) class="active" @endif>
                        <a href="{{route('profile')}}">
                            <i class="fas fa-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li @if(Route::is('security')) class="active" @endif>
                        <a href="{{route('security')}}">
                            <i class="fas fa-user-shield"></i>
                            <span>Security</span>
                        </a>
                    </li>
                    <li @if(Route::is('setting')) class="active" @endif>
                        <a href="{{route('setting')}}">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>


                </ul>
            </nav>
        </div>
    </div>
    <!-- /Profile Sidebar -->

</div>