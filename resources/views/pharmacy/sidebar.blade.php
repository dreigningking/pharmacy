<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    
    <!-- Profile Sidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{asset('storage/pharmacies/logos/'.$pharmacy->image)}}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h2>{{$pharmacy->name}} </h2>
                    <div class="patient-details">
                        <span class="mb-0"><img src="{{$pharmacy->country->flag}}">
                            {{$pharmacy->state->name.','.$pharmacy->city->name}}</span>
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
                    <!-- <li>
                        <a href="appointments.html">
                            <i class="fas fa-calendar-check"></i>
                            <span>Appointments</span>
                        </a>
                    </li> -->
                    {{-- @usercan($pharmacy,'patient') --}}
                    <li @if(Route::is('pharmacy.patient.list')) class="active" @endif>
                        <a href="{{route('pharmacy.patients.index',$pharmacy)}}">
                            <i class="fas fa-user-injured"></i>
                            <span>Patients</span>
                        </a>
                    </li>
                    {{-- @endusercan
                    @usercan($pharmacy,'assessment') --}}
                    <li @if(Route::is('pharmacy.assessments.index')) class="active" @endif>
                        <a href="{{route('pharmacy.assessments.index',$pharmacy)}}">

                            <i class="fas fa-pen"></i>
                            <span>Assessments</span>
                        </a>
                    </li>
                    {{-- @endusercan --}}
                     {{-- <li @if(Route::is('medicine')) class="active" @endif>
                        <a href="{{route('medicine')}}">
                            <i class="fas fa-pills"></i>
                            <span>Medicine</span>
                        </a>
                    </li> --}}
                    {{-- @usercan($pharmacy,'inventory') --}}
                    <li @if(Route::is('pharmacy.shelf')) class="active" @endif>
                        <a href="{{route('pharmacy.shelf',$pharmacy)}}">
                            <i class="fas fa-archive"></i>
                            <span>Shelf</span>
                        </a>
                    </li>
                    <li @if(Route::is('pharmacy.purchase.list')) class="active" @endif>
                        <a href="{{route('pharmacy.purchase.list',$pharmacy)}}">
                            <i class="fas fa-file-invoice"></i>
                            <span>Supplies</span>
                        </a>
                    </li>
                    {{-- @if(Auth::user()->pharmacies->count() > 1) --}}
                    <li @if(Route::is('pharmacy.transfer.list')) class="active" @endif>
                        <a href="{{route('pharmacy.transfer.list',$pharmacy)}}">
                            <i class="fas fa-share"></i>
                            <span>Transfers</span>
                        </a>
                    </li>
                    {{-- @endif --}}
                    <li @if(Route::is('pharmacy.inventory.index')) class="active" @endif>
                        <a href="{{route('pharmacy.inventory.index',$pharmacy)}}">
                            <i class="fas fa-boxes"></i>
                            <span>Inventory</span>
                        </a>
                    </li>
                    {{-- @endusercan --}}
                    {{-- @usercan($pharmacy,'sales') --}}
                    <li @if(Route::is('pharmacy.sales')) class="active" @endif>
                        <a href="{{route('pharmacy.sales.index',$pharmacy)}}">
                            <i class="fas fa-chart-bar"></i>
                            <span>Sales</span>
                        </a>
                    </li>
                    {{-- @endusercan --}}
                    {{-- @usercan($pharmacy,'pharmacy') --}}
                    <li>
                        <a href="{{route('pharmacy.settings',$pharmacy)}}">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    {{-- @endusercan --}}
                </ul>
            </nav>
        </div>
    </div>
    <!-- /Profile Sidebar -->

</div>