@extends('layouts.main.app')
@push('styles')

@endpush
@section('main')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container">

        <!-- Doctor Widget -->
        <div class="card">
            <div class="card-body">
                <div class="doctor-widget">
                    <div class="doc-info-left">
                        <div class="doctor-iymg">
                            <img src="{{asset('assets/img/pharmacies/1.jpg')}}" class="img-fluid" alt="User Image">
                        </div>
                        <div class="doc-info-cont px-3">
                            <h4 class="doc-name">{{$pharmacy->name}}</h4>
                            <p class="doc-speciality">{{$pharmacy->description}},Description of the pharmacy will be shown here so that people can 
                                easily see it</p>
                            <div class="clinic-details">
                                <span class="doc-location">
                                    <i class="fas fa-map-marker-alt"></i> {{$pharmacy->state->name}}, {{$pharmacy->country->name}} </span> 
                                
                            </div>
                            <div class="doc-speciality">
                                <span class="d-block">License: {{$pharmacy->activeLicense->number}}</span>
                                <span class="d-block">License Type: {{strtoupper($pharmacy->activeLicense->type)}}</span>
                                <span class="d-block">Expiry: {{$pharmacy->activeLicense->expire_at->calendar()}}</span>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                    <div class="doc-info-right">
                        <div class="clini-infos">
                            <ul>
                                <li><i class="far fa-comment"></i> {{$pharmacy->sms_credit}} Units
                                    <a href="{{route('subscription.show')}}">Buy More</a> 
                                </li>
                                <li class="text-danger">
                                    <i class="fa fa-trash"></i> 
                                    <a href="#delete_pharmacy" data-toggle="modal" class="text-danger" >Delete This Pharmacy</a> 
                                </li>
                                
                                
                                
                            </ul>
                        </div>
                        {{-- <div class="doctor-action">
                            <a href="javascript:void(0)" class="btn btn-white fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                            <a href="chat.html" class="btn btn-white msg-btn">
                                <i class="far fa-comment-alt"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
                                <i class="fas fa-phone"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#video_call">
                                <i class="fas fa-video"></i>
                            </a>
                        </div> --}}
                        <div class="clinic-booking">
                            <a class="apt-btn" href="{{route('pharmacy.dashboard',$pharmacy)}}">Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(session('flash_message'))
            @include('layouts.main.flash')
        @endif
        
        <!-- Doctor Details Tab -->
        <div class="card">
            <div class="card-body pt-0">
            
                <!-- Tab Menu -->
                <nav class="user-tabs mb-4">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" href="#doc_overview" data-toggle="tab">Basic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_locations" data-toggle="tab">Staff</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_business_hours" data-toggle="tab">Others</a>
                        </li>
                    </ul>
                </nav>
                <!-- /Tab Menu -->
                
                <!-- Tab Content -->
                <div class="tab-content pt-0">
                
                    <!-- Overview Content -->
                    <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                        <!-- About Details -->
                        <div class="widget about-widget">
                            <h4 class="widget-title">Edit Details</h4>
                            <form action="{{route('pharmacy.update')}}" method="POST" enctype="multipart/form-data">@csrf
                                <input type="hidden" name="pharmacy_id" value="{{$pharmacy->id}}">
                                <div class="row ">
                                    {{-- image --}}
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            @error('image')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="change-avatar">
                                                <div class="profile-img">
                                                    <img id="logo" src="{{Storage::url('pharmacies/logos/'.$pharmacy->image)}}" alt="Pharmacy Image">
                                                </div>
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">
                                                        <span><i class="fa fa-upload"></i> Change Image</span>
                                                        <input type="file" name="image" id="image" class="upload">
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                    {{-- license --}}
                                    {{-- <div class="col-12 col-md-6">     
                                        <div class="form-group">
                                            @error('license')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="change-avatar">
                                                <div class="profile-img">
                                                    <img id="logo" src="{{asset('assets/img/patients/patient.jpg')}}" alt="Pharmacy Image">
                                                </div>
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">
                                                        <span><i class="fa fa-upload"></i> Upload License</span>
                                                        <input type="file" name="license" id="license" class="upload">
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG,PNG,PDF, or DOCX. Max size of 2MB</small>
                                                </div>
                                                 
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- name --}}
                                    <div class="col-12 col-md-6">
                                        <div class="form-group form-focus ">
                                            <input type="text" id="pharmacy_name" name="name" value="{{$pharmacy->name}}" class="form-control floating" required>
                                            <label class="focus-label">Pharmacy Name</label>
                                            @error('name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- pharmacy type --}}
                                    <div class="col-12 col-md-6">
                                        <div class="form-group form-focus">  
                                            <select name="type" class="form-control floating" required>
                                                <option value="community" selected>Community Practise</option>
                                                <option value="hospital">Hospital Practise</option>
                                            </select>
                                            <label class="focus-label">Type</label>
                                            @error('type')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- description --}}
                                    <div class="col-12">
                                        <div class="form-group form-focus">  
                                            <input type="text" name="description" value="{{$pharmacy->description}}" class="form-control floating" required>
                                            <label class="focus-label">About Pharmacy</label>
                                            @error('description')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>                                 
                                    
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <input id="email" name="email" value="{{ $pharmacy->email }}" required autocomplete="email" autofocus type="email" class="form-control @error('email') is-invalid @enderror floating">
                                            <label class="focus-label">Business Email</label>
                                            @error('email')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                    </div>                           
                                    
                                    <div class="col-12 col-md-6">
                                        <div class="form-group form-focus">
                                            <input type="text" name="mobile" value="{{ $pharmacy->mobile }}" class="form-control floating" required>
                                            <label class="focus-label">Business Phone</label>
                                            @error('mobile')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group form-focus">
                                            
                                            <select name="country_id" id="countries" class="form-control floating" required>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country->id}}" @if($pharmacy->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            <label class="focus-label">Country</label>
                                            @error('country_id')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group form-focus">
                                            
                                            <select name="state_id" id="states" class="form-control select2 floating" required>
                                                @foreach ($pharmacy->country->states as $state)
                                                    <option value="{{$state->id}}" @if($pharmacy->state_id == $state->id) selected @endif>{{$state->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                            <label class="focus-label">State</label>
                                            @error('state_id')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group form-focus">
                                            
                                            <select name="city_id" id="cities" class="form-control select2 floating" required>
                                                @foreach ($pharmacy->country->cities as $city)
                                                    <option value="{{$city->id}}" @if($pharmacy->city_id == $city->id) selected @endif>{{$city->name}}</option>
                                                @endforeach    
                                            </select>
                                            <label class="focus-label">City</label>
                                            @error('city_id')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group form-focus">
                                            <input type="text" name="address" class="form-control floating" value="{{$pharmacy->address}}" placeholder="Physical location of the pharmacy" required>
                                            <label class="focus-label">Address</label>
                                        </div>
                                    </div>                      
                                    
                                    <div class="col-12">
                                        <div class="submit-section mb-4">
                                            <button type="submit" class="btn btn-primary submit-btn mb-2 disabled" id="create">Update Pharmacy</button>
                                        </div>
                                        
                                    </div>
                                    
                                    
                                </div>
                            </form>
                            
                        </div>

                    </div>
                    <!-- /Overview Content -->
                    
                    <!-- Locations Content -->
                    <div role="tabpanel" id="doc_locations" class="tab-pane fade">
                    
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('pharmacy.staff.store',$pharmacy)}}" method="post">@csrf
                                    <input type="hidden" name="pharmacy_id" value="{{$pharmacy->id}}">
                                    <h4 class="card-title">Staff</h4>
                                    <div class="registrations-info">
                                        @foreach ($pharmacy->users as $staff)
                                            <div class="row form-row reg-cont border-bottom py-3">
                                                <div class="col-12 col-md-10">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" name="name[]" value="{{$staff->name}}" class="form-control">
                                                            </div> 
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" name="email[]" value="{{$staff->email}}" class="form-control">
                                                            </div> 
                                                        </div>
                                                        <div class="col-12 text-muted mb-3">
                                                            <p>Permissions</p>
                                                            @foreach ($permissions as $permission)
                                                                <div class="custom-control custom-checkbox custom-control-inline permission">
                                                                    <input type="checkbox" id="{{$permission->name}}" name="permission[][{{$permission->id}}]" value="{{$permission->id}}" class="custom-control-input" @if($staff->permissions->firstWhere('id',$permission->id)) checked @endif>
                                                                    <label class="custom-control-label" for="{{$permission->name}}">@if($permission->name == 'pharmacy') Settings @else {{ucwords($permission->name)}} @endif</label>
                                                                </div>
                                                            @endforeach
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="col-12 col-md-2">
                                                    <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                                    <a href="#" class="btn btn-danger btn-block trash">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="row form-row reg-cont border-bottom py-3">
                                            <div class="col-12 col-md-10">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" name="name[]" class="form-control">
                                                        </div> 
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" name="email[]" class="form-control">
                                                        </div> 
                                                    </div>
                                                    <div class="col-12 text-muted mb-3">
                                                        <p>Permissions</p>
                                                        @foreach ($permissions as $permission)
                                                            <div class="custom-control custom-checkbox custom-control-inline permission">
                                                                <input type="checkbox" id="{{$permission->name}}" name="permission[][{{$permission->id}}]" value="{{$permission->id}}" class="custom-control-input">
                                                                <label class="custom-control-label" for="{{$permission->name}}">@if($permission->name == 'pharmacy') Settings @else {{ucwords($permission->name)}} @endif</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="col-12 col-md-2">
                                                <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                                <a href="#" class="btn btn-danger btn-block trash">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-more my-4">
                                        <a href="javascript:void(0);" class="add-reg"><i class="fa fa-plus-circle"></i> Add New</a>
                                    </div>
                                    <div class="submit-section submit-btn-bottom ">
                                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    
                    <!-- Business Hours Content -->
                    <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                        <form action="{{route('pharmacy.settings.others',$pharmacy)}}" method="POST">  @csrf
                            <input type="hidden" name="pharmacy_id" value="{{$pharmacy->id}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>For Pharmacy</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Notification</th>
                                                <th>By Email</th>
                                                <th>By SMS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label >Send me inventory stock limit message</label>
                                                </td>
                                                <td>
                                                    <div class=" text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="stock_limit_email" name="notify_stock_limit[]" @if($pharmacy->notify_stock_limit && is_array($pharmacy->notify_stock_limit) && in_array('email',$pharmacy->notify_stock_limit)) checked  @endif value="email" class="custom-control-input">
                                                            <label class="custom-control-label" for="stock_limit_email">Email</label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class=" text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="stock_limit_sms" name="notify_stock_limit[]" @if($pharmacy->notify_stock_limit && is_array($pharmacy->notify_stock_limit) && in_array('sms',$pharmacy->notify_stock_limit)) checked  @endif value="sms" class="custom-control-input">
                                                            <label class="custom-control-label" for="stock_limit_sms">SMS</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Send expiring/expired items message</label>
                                                </td>
                                                <td>
                                                    <div class=" text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="expired_items_email" name="notify_expired_items[]" @if($pharmacy->notify_expired_items && is_array($pharmacy->notify_expired_items) && in_array('email',$pharmacy->notify_expired_items)) checked  @endif value="email" class="custom-control-input">
                                                            <label class="custom-control-label" for="expired_items_email">Email</label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class=" text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="expired_items_sms" name="notify_expired_items[]" @if($pharmacy->notify_expired_items && is_array($pharmacy->notify_expired_items) && in_array('sms',$pharmacy->notify_expired_items)) checked  @endif value="sms" class="custom-control-input">
                                                            <label class="custom-control-label" for="expired_items_sms">SMS</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Send out purchase order to supplier</label>
                                                </td>
                                                <td>
                                                    <div class="text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="purchase_order_email" name="notify_purchase_order[]" @if($pharmacy->notify_purchase_order && is_array($pharmacy->notify_purchase_order) && in_array('email',$pharmacy->notify_purchase_order)) checked  @endif value="email" class="custom-control-input">
                                                            <label class="custom-control-label" for="purchase_order_email">Email</label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="purchase_order_sms" name="notify_purchase_order[]" @if($pharmacy->notify_purchase_order && is_array($pharmacy->notify_purchase_order) && in_array('sms',$pharmacy->notify_purchase_order)) checked  @endif value="sms" class="custom-control-input">
                                                            <label class="custom-control-label" for="purchase_order_sms">SMS</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Send me every sales record</label>
                                                </td>
                                                <td>
                                                    <div class="text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="sales_record_email" name="notify_sales_record[]" @if($pharmacy->notify_sales_record && is_array($pharmacy->notify_sales_record) && in_array('email',$pharmacy->notify_sales_record)) checked  @endif value="email" class="custom-control-input">
                                                            <label class="custom-control-label" for="sales_record_email">Email</label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="sales_record_sms" name="notify_sales_record[]" @if($pharmacy->notify_sales_record && is_array($pharmacy->notify_sales_record) && in_array('sms',$pharmacy->notify_sales_record)) checked  @endif value="sms" class="custom-control-input">
                                                            <label class="custom-control-label" for="sales_record_sms">SMS</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h3>For Patients</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Notification</th>
                                                <th>By Email</th>
                                                <th>By SMS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label >Send new patients welcome message</label>
                                                </td>
                                                <td>
                                                    <div class="text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="patients_welcome_email" name="notify_patients_welcome[]" @if($pharmacy->notify_patients_welcome && is_array($pharmacy->notify_patients_welcome) && in_array('email',$pharmacy->notify_patients_welcome)) checked  @endif value="email" class="custom-control-input">
                                                            <label class="custom-control-label" for="patients_welcome_email">Email</label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="patients_welcome_sms" name="notify_patients_welcome[]" @if($pharmacy->notify_patients_welcome && is_array($pharmacy->notify_patients_welcome) && in_array('sms',$pharmacy->notify_patients_welcome)) checked  @endif value="sms" class="custom-control-input">
                                                            <label class="custom-control-label" for="patients_welcome_sms">SMS</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Send diagnosis message to patients </label>
                                                </td>
                                                <td>
                                                    <div class="text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="patient_diagnosis_email" name="notify_patient_diagnosis[]" @if($pharmacy->notify_patient_diagnosis && is_array($pharmacy->notify_patient_diagnosis) && in_array('email',$pharmacy->notify_patient_diagnosis)) checked  @endif value="email" class="custom-control-input">
                                                            <label class="custom-control-label" for="patient_diagnosis_email">Email</label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="patient_diagnosis_sms" name="notify_patient_diagnosis[]" @if($pharmacy->notify_patient_diagnosis && is_array($pharmacy->notify_patient_diagnosis) && in_array('sms',$pharmacy->notify_patient_diagnosis)) checked  @endif value="sms" class="custom-control-input">
                                                            <label class="custom-control-label" for="patient_diagnosis_sms">SMS</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Send prescriptions to patients</label>
                                                </td>
                                                <td>
                                                    <div class="text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="patient_prescription_email" name="notify_patient_prescription[]" @if($pharmacy->notify_patient_prescription && is_array($pharmacy->notify_patient_prescription) && in_array('email',$pharmacy->notify_patient_prescription)) checked  @endif value="email" class="custom-control-input">
                                                            <label class="custom-control-label" for="patient_prescription_email">Email</label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="patient_prescription_sms" name="notify_patient_prescription[]" @if($pharmacy->notify_patient_prescription && is_array($pharmacy->notify_patient_prescription) && in_array('sms',$pharmacy->notify_patient_prescription)) checked  @endif value="sms" class="custom-control-input">
                                                            <label class="custom-control-label" for="patient_prescription_sms">SMS</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Request feedback after dosage</label>
                                                </td>
                                                <td>
                                                    <div class="text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="patient_feedback_email" name="notify_patient_feedback[]" @if($pharmacy->notify_patient_feedback && is_array($pharmacy->notify_patient_feedback) && in_array('email',$pharmacy->notify_patient_feedback)) checked  @endif value="email" class="custom-control-input">
                                                            <label class="custom-control-label" for="patient_feedback_email">Email</label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-muted mb-3">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="patient_feedback_sms" name="notify_patient_feedback[]" @if($pharmacy->notify_patient_feedback && is_array($pharmacy->notify_patient_feedback) && in_array('sms',$pharmacy->notify_patient_feedback)) checked  @endif value="sms" class="custom-control-input">
                                                            <label class="custom-control-label" for="patient_feedback_sms">SMS</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="submit-section submit-btn-bottom mt-4">
                                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                    </div>    
                                </div>
                            </div> 
                        </form>
                    </div>
                    <!-- /Business Hours Content -->
                    
                </div>
            </div>
        </div>
        <!-- /Doctor Details Tab -->

    </div>
</div>    
@endsection
@section('modals')
<div class="modal fade custom-modal add-modal" id="delete_pharmacy">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Delete Pharmacy
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <p class="text-center text-danger">You are about to delete all records of {{$pharmacy->name}}:<br> 
                                    The following will be deleted and can never be recovered: </p>
                                <div class="mt-3">
                                    <div class="change-avatar justify-content-center">
                                        <form class="" action="{{route('pharmacy.destroy')}}" method="POST">@csrf
                                            <input type="hidden" name="pharmacy_id" value="{{$pharmacy->id}}" id="pharmacy_id">
                                            <ul class="mt-2 text-muted">
                                    
                                                <li>
                                                     {{$pharmacy->name}} Basic Details
                                                </li>
                                                <li>
                                                    {{$pharmacy->name}} Inventory Records
                                                </li>
                                                <li>
                                                    {{$pharmacy->name}} Purchasement Records
                                                </li>
                                                <li>
                                                    {{$pharmacy->name}} Patient Records
                                                </li>
                                                <li>
                                                    {{$pharmacy->name}} Assessment Records
                                                </li>
                                                <li>
                                                    {{$pharmacy->name}} Prescription Records
                                                </li>
                                                <li>
                                                    {{$pharmacy->name}} Sales Records
                                                </li>
                                                <li>
                                                    {{$pharmacy->name}} Staff Accounts
                                                </li>
                                            
                                            </ul>
                                            <p class="form-text text-muted">Enter your password in the textbox below to confirm</p>
                                            <div class="input-group">
                                                <input type="password" name="password" placeholder="********" class="form-control">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger">Continue</button>
                                                </div>
                                            </div>
                                            
                                            
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
</div>
@endsection
@push('scripts')

<script>
    var regcontent;
    $("#image").change(function() {
        readURL(this,'logo');
    });
    function readURL(input,output) {
        console.log(input.id);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            $('#'+output).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function(){
        regcontent = $('.reg-cont').last().prop("outerHTML");
    })
    $(".registrations-info").on('click','.trash', function () {
		$(this).closest('.reg-cont').remove();
		return false;
    });
    // reg-cont
    $(document).on('click',".add-reg", function () {
        $(".registrations-info").append(regcontent);
        $('.permission').each(function(index,val){
            $(this).find('.custom-control-input').attr('id','id'+index);  
            $(this).find('.custom-control-label').attr('for','id'+index); 
        })
        $('.reg-cont').each(function(index,val){
            $(this).find('.custom-control-input').each(function(abc,valu){
                let name = $(this).attr('name');
                let new_name = name.replace("[]","["+index+"]") 
                $(this).attr('name',new_name);
                // console.log('index:'+index+',inner:'+abc+',item:'+$(this).attr('name'))
            })
            
        })
        
        return false;
    });
</script>
@endpush