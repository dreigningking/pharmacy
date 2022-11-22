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
                        <h4 class="user-name mb-0">{{$pharmacy->name}} </h4>
                        <h6 class="text-muted"> {{$pharmacy->email}} </h6>
                        <div class="user-Location"><i class="fa fa-map-marker"></i> {{$pharmacy->state->name}}, {{$pharmacy->country->name}}</div>
                        <div class="about-text">License: @if($pharmacy->license) {{$pharmacy->license->number}} @else No License @endif.</div>
                        @if($pharmacy->license)
                        <div class="about-text">Subscription Expiry: @if($pharmacy->license->active()) {{$pharmacy->license->expire_at->format('d/m/Y')}} @else Expired | <button class="btn btn-success"></button> @endif Renew</div>
                        @endif
                    </div>
                    <div class="col-auto profile-btn">
                        @if($pharmacy->active)
                        <form action="{{route('admin.pharmacy.status',$pharmacy)}}" method="post" onsubmit="return confirm('Are you want you want to suspend')">@csrf
                            <button type="submit" class="btn btn-danger">
                                Suspend
                            </button>
                        </form>
                        @else
                        <form action="{{route('admin.pharmacy.status',$pharmacy)}}" method="post" onsubmit="return confirm('Are you want you want to reactivate')">@csrf
                            <button type="submit" class="btn btn-primary">
                                Reactivate
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab">Details</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Owner</a>
                    </li>
                </ul>
            </div>	
            <div class="tab-content profile-tab-cont">
                
                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">             
                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Details</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-center mb-0">
                                           <tr><td> Assessment</td> <td> {{$pharmacy->assessments->count()}} </td></tr> 
                                           <tr><td>Inventory</td> <td> {{$pharmacy->Inventories->count()}} </td></tr>
                                           <tr><td> patients</td> <td> {{$pharmacy->patients->count()}} </td></tr>
                                           <tr><td> sms</td> <td> {{$pharmacy->sms_credit}} </td></tr>
                                           <tr><td> staff</td> <td> {{$pharmacy->users->count()}} </td></tr>
                                           <tr><td> prescriptions</td> <td> {{$pharmacy->prescriptions->count()}} </td></tr>
                                           <tr><td> currency</td> <td> {{$pharmacy->country->currency_iso}} </td></tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Personal Details -->
                </div>
                <!-- /Personal Details Tab -->
                
                <!-- Change Password Tab -->
                <div id="password_tab" class="tab-pane fade">
                
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Details</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-center mb-0">
                                           <tr><td> Name</td> <td> {{$pharmacy->owner->name}} </td></tr> 
                                           <tr><td>Email</td> <td> {{$pharmacy->owner->email}} </td></tr>
                                           <tr><td> Mobile</td> <td> {{$pharmacy->owner->mobile}} </td></tr>
                                           <tr><td> No of pharmacies</td> <td> {{$pharmacy->owner->pharmacies->count()}} </td></tr>
                                         
                                        </table>
                                    </div>
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