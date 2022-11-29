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
                    <li @if(Route::is('dashboard')) class="active" @endif>
                        <a href="{{route('dashboard')}}">
                            <i class="fas fa-columns"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    @if(Auth::user()->isAnyRole(['director']))
                        @usercan('pharmacy','new')
                        <li @if(Route::is('setup')) class="active" @endif>
                            <a href="{{route('setup')}}">
                                <i class="fas fa-prescription"></i>
                                <span>Add Pharmacy</span>
                            </a>
                        </li>
                        @endusercan
                        @usercan('subscription','list')
                        <li @if(Route::is('subscription')) class="active" @endif>
                            <a href="{{route('subscription')}}">
                                <i class="fas fa-money-bill"></i>
                                <span>Subscription</span>
                            </a>
                        </li>
                        @endusercan
                        @usercan('sales','list')
                        <li @if(Route::is('transactions')) class="active" @endif>
                            <a href="{{route('transactions')}}">
                                <i class="fas fa-chart-bar"></i>
                                <span>Transcation</span>
                            </a>
                        </li>
                        @endusercan
                        
                        @usercan('staff','list')
                        <li @if(Route::is('staff')) class="active" @endif>
                            <a href="{{route('staff')}}">
                                <i class="fas fa-users"></i> <span>Staff</span>
                            </a>
                        </li>
                        @endusercan
                    @endif

                </ul>
            </nav>
        </div>
    </div>
    <!-- /Profile Sidebar -->

</div>