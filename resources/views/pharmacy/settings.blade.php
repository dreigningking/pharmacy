@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">
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
                                <p class="doc-location">
                                    <i class="fas fa-map-marker-alt"></i> Newyork, USA </p> 
                                
                            </div>
                            <div class="doc-speciality">
                                <span class="d-block">License: 83493849398945</span>
                                <span class="d-block">License Type: Pharmacy Management</span>
                                <span class="d-block">License: 83493849398945</span>
                            </div>
                            
                            <p class="doc-speciality">  SMS :35Units</p>
                            
                        </div>
                    </div>
                    <div class="doc-info-right">
                        <div class="clini-infos">
                            <ul>
                                <li><i class="far fa-comment"></i> <a href="javascript:void(0);">Buy SMS</a> </li>
                                <li class="text-danger"><i class="fa fa-trash"></i> <a href="javascript:void(0);" class="text-danger">Delete Pharmacy</a> </li>
                                
                                
                                
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
        <!-- /Doctor Widget -->
        
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
                            <a class="nav-link" href="#doc_reviews" data-toggle="tab">Inventory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_business_hours" data-toggle="tab">Assessment</a>
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
                            <form action="{{route('setup')}}" method="POST" enctype="multipart/form-data">@csrf
                                <div class="row ">
                                    {{-- image --}}
                                    <div class="col-12 col-md-6">
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
                                                        <input type="file" name="image" id="image" class="upload" required>
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                    {{-- license --}}
                                    <div class="col-12 col-md-6">     
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
                                                        <input type="file" name="image" id="image" class="upload" required>
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                </div>
                                                 
                                            </div>
                                        </div>
                                    </div>
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
                                            <input type="text" name="description" class="form-control floating" required>
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
                                            <input id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" class="form-control @error('email') is-invalid @enderror floating">
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
                                            <input type="text" name="mobile" value="+1 202-555-0125" class="form-control floating" required>
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
                                                    <option value="{{$country->id}}" @if(Auth::user()->country_id == $country->id) selected @endif>{{$country->name}}</option>
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
                                                @foreach (Auth::user()->country->states as $state)
                                                    <option value="{{$state->id}}" @if(Auth::user()->state_id == $state->id) selected @endif>{{$state->name}}</option>
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
                                                @foreach (Auth::user()->country->cities as $city)
                                                    <option value="{{$city->id}}" @if(Auth::user()->city_id == $city->id) selected @endif>{{$city->name}}</option>
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
                                            <input type="text" name="address" class="form-control floating" value="{{old('address')}}" placeholder="Physical location of the pharmacy" required>
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
                        <!-- /About Details -->
                    
                        
                        {{-- <!-- Services List -->
                        <div class="service-list">
                            <h4>Services</h4>
                            <ul class="clearfix">
                                <li>Tooth cleaning </li>
                                <li>Root Canal Therapy</li>
                                <li>Implants</li>
                                <li>Composite Bonding</li>
                                <li>Fissure Sealants</li>
                                <li>Surgical Extractions</li>
                            </ul>
                        </div>
                        <!-- /Services List -->
                        
                        <!-- Specializations List -->
                        <div class="service-list">
                            <h4>Specializations</h4>
                            <ul class="clearfix">
                                <li>Children Care</li>
                                <li>Dental Care</li>	
                                <li>Oral and Maxillofacial Surgery </li>	
                                <li>Orthodontist</li>	
                                <li>Periodontist</li>	
                                <li>Prosthodontics</li>	
                            </ul>
                        </div>
                        <!-- /Specializations List --> --}}

                    </div>
                    <!-- /Overview Content -->
                    
                    <!-- Locations Content -->
                    <div role="tabpanel" id="doc_locations" class="tab-pane fade">
                    
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Staff</h4>
                                <div class="registrations-info">
                                    <div class="row form-row reg-cont border-bottom py-3">
                                        <div class="col-12 col-md-10">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control">
                                                    </div> 
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control">
                                                    </div> 
                                                </div>
                                                <div class="col-12 text-muted mb-3">
                                                    <p>Permissions</p>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                        <label class="custom-control-label" for="autodelete">Settings</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                        <label class="custom-control-label" for="autodelete">Patients</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                        <label class="custom-control-label" for="autodelete">Assessments</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                        <label class="custom-control-label" for="autodelete">Sales</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                        <label class="custom-control-label" for="autodelete">Prescriptions</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                        <label class="custom-control-label" for="autodelete">Inventory</label>
                                                    </div>
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
                            </div>
                        </div>

                    </div>
                    <!-- /Locations Content -->
                    
                    <!-- Reviews Content -->
                    <div role="tabpanel" id="doc_reviews" class="tab-pane fade">

                        <form action="#" method="POST">  
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row my-4">
                                        <p class="col-sm-3 text-muted">Currency</p>
                                        <div class="col-sm-7">
                                            <select name="" id="" class="form-control">
                                                <option value="">Naira</option>
                                                <option value="">Dollars</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <p class="col-sm-3 text-muted">Package Type</p>
                                        <div class="col-sm-7">
                                            <select name="" id="" class="form-control">
                                                <option value="">Cartons</option>
                                                <option value="">Sachets</option>
                                                <option value="">Packs</option>
                                                <option value="">Cards</option>
                                                <option value="">Pills & Bottles</option>
                                            </select>
                                        </div>
                                    </div>   
                                    <div class="row my-3">
                                        <p class="col-md-3 text-muted  mb-0 mb-sm-3">Markup</p>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <input type="number" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                                    
                                    <div class="row my-3">
                                        <p class="col-md-3 text-muted  mb-0 mb-sm-3">Stock Level</p>
                                        <div class="col-md-7">
                                            <div class="row no-gutters">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Min</span>
                                                        </div>
                                                        <input type="number" class="form-control rounded-0">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Max</span>
                                                        </div>
                                                        <input type="number" class="form-control">
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <p class="col-md-3 text-muted  mb-0 mb-sm-3">Shelf</p>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Shelf" name="services" value="No-Shelf " id="services">
                                                <small class="form-text text-muted">Note : Removal of shelf will dump all items to No-Shelf </small>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-md-6 ">
                                    <div class="row my-3">
                                        <div class="col-12 text-muted mb-3">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="price_custom" name="rating_option" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="price_custom">Notify on stock level limits</label>
                                            </div>
                                        </div>
                                        <div class="col-12 text-muted mb-3">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="autodelete">Auto-Delete expired batch items</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-section submit-btn-bottom mt-4">
                                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                    </div>    
                                </div>   
                            </div>                                             
                            
                            
                            
                            
                            
                            
                            
                            
                        </form>
            
                    </div>
                    <!-- /Reviews Content -->
                    
                    <!-- Business Hours Content -->
                    <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                        <form action="#" method="POST">  
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row my-4">
                                        <p class="col-sm-4 text-muted">Walk-in Patient Name</p>
                                        <div class="col-sm-8">
                                            <input type="text" name="walkin" value="Walk-in Patient" class="form-control">
                                        </div>
                                    </div>
                                    
                                </div> 
                                <div class="col-md-6 ">
                                    <div class="row my-3">
                                        <div class="col-12 text-muted mb-3">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="price_custom" name="rating_option" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="price_custom">Send prescriptions to patients by email</label>
                                            </div>
                                        </div>
                                        <div class="col-12 text-muted mb-3">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="autodelete">Send prescriptions to patients by sms</label>
                                            </div>
                                        </div>
                                        <div class="col-12 text-muted mb-3">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="autodelete">Request feedback after dosage by email</label>
                                            </div>
                                        </div>
                                        <div class="col-12 text-muted mb-3">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="autodelete">Request feedback after dosage by sms</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>
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
@push('scripts')
<script src="{{asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
 <script>
    $(".registrations-info").on('click','.trash', function () {
		$(this).closest('.reg-cont').remove();
		return false;
    });

    $(".add-reg").on('click', function () {

        var regcontent = `  <div class="row form-row reg-cont border-bottom py-3">
                                <div class="col-12 col-md-10">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control">
                                            </div> 
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control">
                                            </div> 
                                        </div>
                                        <div class="col-12 text-muted mb-3">
                                            <p>Permissions</p>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="autodelete">Settings</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="autodelete">Patients</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="autodelete">Assessments</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="autodelete">Sales</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="autodelete">Prescriptions</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="autodelete">Inventory</label>
                                            </div>
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
                        `;
		
        $(".registrations-info").append(regcontent);
        return false;
    });
</script>
@endpush