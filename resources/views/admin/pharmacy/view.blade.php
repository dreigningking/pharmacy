@extends('layouts.admin.app')
@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Profile</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#">
                            <img class="rounded-circle" alt="User Image" src="{{asset('assets/img/pharmacy-logo.jpg')}}">
                        </a>
                    </div>
                    <div class="col ml-md-n2 profile-user-info">
                        <h4 class="user-name mb-0">Medplus Pharmacy</h4>
                        <h6 class="text-muted">ryantaylor@admin.com</h6>
                        <div class="user-Location"><i class="fa fa-map-marker"></i> Florida, United States</div>
                        <div class="about-text">License: iwlenbfiuw8793iunisadf9834834j3kj4buisbiu.</div>
                        <div class="about-text">Subscription Expiry: 23/12/2023</div>
                    </div>
                    <div class="col-auto profile-btn">
                        
                        <a href="#" class="btn btn-danger">
                            Suspend
                        </a>
                    </div>
                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab">Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Assessments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Transactions</a>
                    </li>
                </ul>
            </div>	
            <div class="tab-content profile-tab-cont">
                
                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">
                
                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Personal Details -->

                </div>
                <!-- /Personal Details Tab -->
                
                <!-- Change Password Tab -->
                <div id="password_tab" class="tab-pane fade">
                
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Assessments</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Change Password Tab -->
                
            </div>
        </div>
    </div>

</div>
@endsection