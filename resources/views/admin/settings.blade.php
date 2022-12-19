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
                        <a class="nav-link active" data-toggle="tab" href="#general_tab">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#subscriptions_tab">Subscription Plans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#sms_tab">SMS Units</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#notifications_tab">Notifications</a>
                    </li>
                </ul>
            </div>	
            <div class="tab-content profile-tab-cont">
                
                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="general_tab">
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
                                            <div class="col-sm-6">
                                                <input type="text" name="currency_name" value="{{$settings->firstWhere('name','currency_name')->value}}" class="form-control" placeholder="e.g Dollars" >
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Currency Symbol</p>
                                            <div class="col-sm-6">
                                                <input type="text" name="currency_symbol" value="{{$settings->firstWhere('name','currency_symbol')->value}}" class="form-control" placeholder="e.g $">
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Currency ISO</p>
                                            <div class="col-sm-6">
                                                <input type="text" name="currency_iso" value="{{$settings->firstWhere('name','currency_iso')->value}}" class="form-control" placeholder="e.g USD">
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            
                                            <div class="col-sm-6">
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
                
                <div id="subscriptions_tab" class="tab-pane fade">
                
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Subscriptions</h5>
                            <div class="row">
                                <div class="col-sm-12">
                                    
                                    <div class="card">
										{{-- <div class="card-header">
											<h4 class="card-title">Basic justified tabs</h4>
										</div> --}}
										<div class="card-body">
											<ul class="nav nav-tabs nav-justified">
												<li class="nav-item"><a class="nav-link active" href="#basic-justified-tab1" data-toggle="tab">PHARMACY MANAGEMENT PLAN</a></li>
												<li class="nav-item"><a class="nav-link " href="#basic-justified-tab2" data-toggle="tab">ANALYTICS PLAN</a></li>
												<li class="nav-item"><a class="nav-link " href="#basic-justified-tab3" data-toggle="tab">SMS PLAN</a></li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="basic-justified-tab1">
													<form action="#" method="POST">@csrf
                                                        <div class="row my-4">
                                                            <p class="col-sm-2 text-muted">Display Name</p>
                                                            <div class="col-sm-6">
                                                                <input type="text" name="currency_name" value="Pharmacy Management" class="form-control" placeholder="e.g Dollars" >
                                                            </div>
                                                        </div>                                                       
                                                        <div class="row my-4">
                                                            <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Details</p>
                                                            <div class="col-sm-6">
                                                                <textarea class="form-control" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row my-3">
                                                            <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Price Per Month</p>
                                                            <div class="col-md-6">
                                                                <div class="row no-gutters">
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">₦</span>
                                                                            </div>
                                                                            <input type="number" class="form-control rounded-0">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">$</span>
                                                                            </div>
                                                                            <input type="number" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-3">
                                                            <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Price Per Year</p>
                                                            <div class="col-md-6">
                                                                <div class="row no-gutters">
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">₦</span>
                                                                            </div>
                                                                            <input type="number" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">$</span>
                                                                            </div>
                                                                            <input type="number" class="form-control">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-3">
                                                            <p class="col-sm-2 text-muted">Minimum Duration</p>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Months</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-3">
                                                            <p class="col-sm-2 text-muted">Trial Duration</p>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Days</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-3">
                                                            <div class="col-sm-6">
                                                               <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
												</div>
												<div class="tab-pane" id="basic-justified-tab2">
													<form action="#" method="POST">@csrf
                                                        <div class="row my-4">
                                                            <p class="col-sm-2 text-muted">Display Name</p>
                                                            <div class="col-sm-6">
                                                                <input type="text" name="currency_name" value="Analytics Plans" class="form-control" placeholder="" >
                                                            </div>
                                                        </div>                                                       
                                                        <div class="row my-4">
                                                            <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Details</p>
                                                            <div class="col-sm-6">
                                                                <textarea class="form-control" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row my-3">
                                                            <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Price Per Month</p>
                                                            <div class="col-md-6">
                                                                <div class="row no-gutters">
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">₦</span>
                                                                            </div>
                                                                            <input type="number" class="form-control rounded-0">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">$</span>
                                                                            </div>
                                                                            <input type="number" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-3">
                                                            <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Price Per Year</p>
                                                            <div class="col-md-6">
                                                                <div class="row no-gutters">
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">₦</span>
                                                                            </div>
                                                                            <input type="number" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">$</span>
                                                                            </div>
                                                                            <input type="number" class="form-control">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-3">
                                                            <p class="col-sm-2 text-muted">Minimum Duration</p>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Months</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-3">
                                                            <p class="col-sm-2 text-muted">Trial Duration</p>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Days</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-3">
                                                            
                                                            <div class="col-sm-6">
                                                               <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
												</div>
												<div class="tab-pane" id="basic-justified-tab3">
													<form action="#" method="POST">@csrf
                                                        <div class="row my-4">
                                                            <p class="col-sm-2 text-muted">Display Name</p>
                                                            <div class="col-sm-6">
                                                                <input type="text" name="currency_name" value="SMS Units" class="form-control" placeholder="e.g Dollars" >
                                                            </div>
                                                        </div>                                                       
                                                        <div class="row my-4">
                                                            <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Details</p>
                                                            <div class="col-sm-6">
                                                                <textarea class="form-control" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row my-3">
                                                            <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Price Per Unit</p>
                                                            <div class="col-md-6">
                                                                <div class="row no-gutters">
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">₦</span>
                                                                            </div>
                                                                            <input type="number" class="form-control rounded-0">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">$</span>
                                                                            </div>
                                                                            <input type="number" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row my-3">
                                                            <p class="col-sm-2 text-muted">Minimum Units</p>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Units</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-3">
                                                            <p class="col-sm-2 text-muted">Trial Units</p>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Units</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-3">
                                                            
                                                            <div class="col-sm-6">
                                                               <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
												</div>
												<div class="tab-pane" id="basic-justified-tab4">
													Tab content 4
												</div>
											</div>
										</div>
									</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sms_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">SMS Units</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">
                                    <p>Total Units Available : 5,578 units</p>
                                    <p>Total Units in circulation : 10,000 units</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="notifications_tab" class="tab-pane fade">
                
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

            

            </div>
        </div>
    </div>

</div>
@endsection