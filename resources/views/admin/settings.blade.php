@extends('layouts.admin.app')
@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Settings</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Others</a>
                    </li>
                </ul>
            </div>	
            <div class="tab-content profile-tab-cont">
                
                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">
                
                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>General Settings</span> 
                                        {{-- <a class="edit-link" data-toggle="modal" href="#"><i class="fa fa-edit mr-1"></i>Edit</a> --}}
                                    </h5>
                                    <form action="{{route('admin.settings')}}" method="POST">@csrf
                                        <div class="row my-3">
                                            <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Currency Name</p>
                                            <div class="col-sm-4">
                                                <input type="text" name="currency_name" value="{{$settings->firstWhere('name','currency_name')->value}}" class="form-control" placeholder="e.g Dollars" >
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Currency Symbol</p>
                                            <div class="col-sm-4">
                                                <input type="text" name="currency_symbol" value="{{$settings->firstWhere('name','currency_symbol')->value}}" class="form-control" placeholder="e.g $">
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Currency ISO</p>
                                            <div class="col-sm-4">
                                                <input type="text" name="currency_iso" value="{{$settings->firstWhere('name','currency_iso')->value}}" class="form-control" placeholder="e.g USD">
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            
                                            <div class="col-sm-4">
                                               <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
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
                            <h5 class="card-title">Notications</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">
                                    <form action="{{route('admin.settings')}}" method="POST">@csrf
                                        <table class="table table-hover table-center mb-0">
                                            
                                            <tbody>
                                                <tr>
                                                    <td>Send mail to subscribers 2weeks to subscription expiry</td>
                                                    <td>
                                                        <div class="status-toggle">
                                                            <input type="checkbox" name="send_subscription_email" id="status_1" class="check" checked>
                                                            <label for="status_1" class="checktoggle">checkbox</label>
                                                        </div>
                                                    </td>      
                                                </tr>
                                                <tr>
                                                    <td>Send mail to patients on patient add</td>
                                                    <td>
                                                        <div class="status-toggle">
                                                            <input type="checkbox" id="status_1" class="check" checked>
                                                            <label for="status_1" class="checktoggle">checkbox</label>
                                                        </div>
                                                    </td>      
                                                </tr>
                                                <tr>
                                                    <td>Send prescription to patient email</td>
                                                    <td>
                                                        <div class="status-toggle">
                                                            <input type="checkbox" id="status_1" class="check" checked>
                                                            <label for="status_1" class="checktoggle">checkbox</label>
                                                        </div>
                                                    </td>      
                                                </tr>
                                                <tr>
                                                    <td>Send follow-up email to patient after treatment</td>
                                                    <td>
                                                        <div class="status-toggle">
                                                            <input type="checkbox" id="status_1" class="check" checked>
                                                            <label for="status_1" class="checktoggle">checkbox</label>
                                                        </div>
                                                    </td>      
                                                </tr>
                                                <tr>
                                                    <td><button type="submit" class="btn btn-primary">Save</button></td>
                                                    <td> </td>      
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
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