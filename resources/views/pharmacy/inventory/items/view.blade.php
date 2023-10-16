@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<!-- Datatables CSS -->
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
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
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar dct-dashbd-lft">
            
                <!-- Profile Widget -->
                <div class="card widget-profile pat-widget-profile mb-0">
                    <div class="card-body">
                        <div class="pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img src="{{asset('assets/img/patients/patient.jpg')}}" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3>{{$item->name}}</h3>
                                    
                                    <div class="patient-details">
                                        <h5><b>Item ID :</b> PT0016</h5>
                                        <h5 class="mb-0"><i class="fas fa-cog"></i>Non Drug</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="patient-info">
                            <ul>
                                <li>Stock <span>256</span></li>
                                <li>Shelf <span>XLB</span></li>
                                {{-- <li>Blood Group <span>AB+</span></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Profile Widget -->
                
                <!-- Last Booking -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Menus</h4>
                    </div>
                    <div class="dashboard-widget">
                        <nav class="dashboard-menu">
                            <ul>
                                <li>
                                    <a href="#transfer_patient">
                                        <i class="fas fa-share"></i>
                                        <span>Transfer Item</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#purchase_patient">
                                        <i class="fas fa-star"></i>
                                        <span>Purchase Item</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#delete_patient" data-toggle="modal" class="text-danger">
                                        <i class="fas fa-trash"></i>
                                        <span>Delete Item</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /Last Booking -->
                
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9 dct-appoinment">
                <div class="card">
                    <div class="card-body pt-0">
                        <div class="user-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#billing" data-toggle="tab"> <span>Details</span> </a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="#medical" data-toggle="tab"> <span class="med-records">Batches</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#assessments" data-toggle="tab">Sales Report</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            
                            <!-- Billing Tab -->
                            <div id="billing" class="tab-pane fade show active">
                                
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <form action="{{route('pharmacy.inventory.update', $pharmacy)}}" class="w-100" method="POST">@csrf
                                            <input type="hidden" name="inventory_id" value="{{$item->id}}">
                                            <div class="row w-100">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" value="{{$item->name}}" name="name">
                                                    </div>
                                                </div>   
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Category</label>
                                                        <select class="form-control" id="gender" name="category" @if($item->drug_id) disabled @endif>
                                                            @if($item->drug_id) 
                                                                <option value="{{$item->drug->category->name}}" selected>{{$item->drug->category->name}}</option> 
                                                            @else 
                                                                <option value="">Select Category</option>
                                                            @endif
                                                            @foreach (explode(',',$pharmacy->categories) as $category)
                                                                <option value="{{$category}}" @if($item->category == $category) selected @endif>{{$category}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>    
                                                <div class="col-md-4">
                                                    <div class="form-group ">
                                                        <label class="form-label">Shelf</label>
                                                        <select class="form-control" id="gendeq" name="shelf">
                                                            <option value="">Select Shelf</option>
                                                            @foreach (explode(',',$pharmacy->shelves) as $shelf)
                                                                <option value="{{$shelf}}" @if($item->shelf == $shelf) selected @endif>{{$shelf}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>     
                                                            
                                                <div class="col-md-3">
                                                    <div class="form-group ">
                                                        <label class="form-label">Unit Cost</label>
                                                        <input type="number" class="form-control" name="unit_cost" value="{{$item->unit_cost}}">
                                                    </div>
                                                </div> 
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Unit Price</label>
                                                        <input type="number" class="form-control" name="unit_price" value="{{$item->unit_price}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group ">
                                                        <label class="form-label">Minimum Stock Level</label>
                                                        <input type="number" class="form-control" name="minimum_stocklevel" value="{{$item->minimum_stocklevel}}">
                                                    </div>
                                                </div> 
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Maximum Stock Level</label>
                                                        <input type="number" class="form-control" name="maximum_stocklevel" value="{{$item->maximum_stocklevel}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Alert Weeks Before Expiry</label>
                                                        <input type="number" class="form-control" name="expiry_alert_weeks" value="{{$item->expiry_alert_weeks}}" placeholder="Number of weeks">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Unit of Sales</label>
                                                        <select name="unit_of_sales" class="form-control">
                                                            <option value="">Select Unit</option>
                                                            <option value="pill" @if($item->unit_of_sales == 'pill') selected @endif>Pill</option>
                                                            <option value="bottle" @if($item->unit_of_sales == 'bottle') selected @endif>Bottle</option>
                                                            <option value="sachet" @if($item->unit_of_sales == 'sachet') selected @endif>Sachet</option>
                                                            <option value="packet" @if($item->unit_of_sales == 'packet') selected @endif>Packet</option>
                                                            <option value="carton" @if($item->unit_of_sales == 'carton') selected @endif>Carton</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Quantity <span class="small">(Leave Empty to use Batch Quantity)</span> </label>
                                                        <input type="number" class="form-control" name="quantity" value="{{$item->available}}" @if($item->batches->count()) readonly @endif placeholder="Leave Empty to use Batch">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mt-2">
                                                        <br>
                                                        <button type="submit" class="btn btn-md btn-info" >Update</button>
                                                    </div>
                                                </div> 
        
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Medical Records Tab -->
                            <div class="tab-pane fade" id="medical">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <form action="{{route('pharmacy.inventory.batches', $pharmacy)}}" class="w-100" method="POST">@csrf
                                            <input type="hidden" name="inventory_id" value="{{$item->id}}">
                                            <div class="row w-100">
                                                <div class="col-md-12 registrations-info">
                                                    @foreach ($item->batches as $batch)
                                                    <div class="row reg-cont">
                                                        <div class="col-md-3">
                                                            <div class="form-group">  
                                                                <label class="text-muted text-center">Batch Name</label>                                        
                                                                <input type="text" name="batch[]" value="{{$batch->number}}" placeholder="Batch Name/Number" class=" form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="text-muted text-center">Quantity</label>
                                                                <input type="number" name="quantity[]" value="{{$batch->quantity}}" placeholder="Quantity" class="form-control"> 
                                                            </div> 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="text-muted text-center">Expiry</label>
                                                                <input type="date" name="expire_at[]" value="{{$batch->expire_at ? $batch->expire_at->format('Y-m-d'): ''}}" placeholder="Year. e.g 2023" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-block">&nbsp;</label>
                                                            <a href="#" class="btn btn-danger btn-block trash">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </div>

                                                    </div>
                                                    @endforeach
                                                    <div class="row reg-cont">
                                                        <div class="col-md-3">
                                                            <div class="form-group">  
                                                                <label class="text-muted text-center">Batch Name</label>                                        
                                                                <input type="text" name="batch[]" placeholder="Batch Name/Number" class=" form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="text-muted text-center">Quantity</label>
                                                                <input type="number" name="quantity[]" placeholder="Quantity" class="form-control"> 
                                                            </div> 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="text-muted text-center">Expiry</label>
                                                                <input type="date" name="expire_at[]" placeholder="Year. e.g 2023" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-block">&nbsp;</label>
                                                            <a href="#" class="btn btn-danger btn-block trash">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                        

                                                    </div>
                                                </div>
                                                <div class="add-more m-4">
                                                    <a href="javascript:void(0);" class="add-reg"><i class="fa fa-plus-circle"></i> Add New</a>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-md btn-info">Update</button>
                                                    </div>
                                                </div> 
        
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /Medical Records Tab -->

                            <!-- Appointment Tab -->
                            <div class="tab-pane fade" id="assessments">
                                <div class="">
                                    <a href="add-prescription.html" class="add-new-btn">New Assessment</a>
                                    <a href="add-prescription.html" class="btn btn-info rounded-pill"><i class="fa fa-download"></i> Download Assessments</a>
                                </div>
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table datatable table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Pharmacist</th>
                                                        <th>Date</th>
                                                        <th>Complaint</th>
                                                        <th>Diagnosis</th>
                                                        <th>Follow Up</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                                </a>
                                                                <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>14 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
                                                        <td>Headache</td>
                                                        <td>Fever</td>
                                                        <td>16 Nov 2019</td>
                                                        <td><span class="badge badge-pill bg-warning-light">Ongoing</span></td>
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                    <i class="far fa-edit"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                                </a>
                                                                <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>14 Nov 2019 <span class="d-block text-info">8.00 PM</span></td>
                                                        <td>Headache</td>
                                                        <td>Fever</td>
                                                        <td>14 Nov 2019</td>
                                                        <td><span class="badge badge-pill bg-warning-light">Ongoing</span></td>
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                    <i class="far fa-edit"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                                </a>
                                                                <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>10 Nov 2019 <span class="d-block text-info">11.00 AM</span></td>
                                                        <td>Running Nose </td>
                                                        <td>Fever</td>
                                                        <td>13 Nov 2019</td>
                                                        <td><span class="badge badge-pill bg-danger-light">Cancelled</span></td>
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                    <i class="far fa-edit"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                                </a>
                                                                <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>10 Nov 2019<span class="d-block text-info">3.00 PM</span></td>
                                                        <td>Headache</td>
                                                        <td>Fever</td>
                                                        <td>10 Nov 2019 </td>
                                                        <td><span class="badge badge-pill bg-warning-light">Awaiting Followup</span></td>
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="edit-prescription.html" class="btn btn-sm bg-success-light">
                                                                    <i class="far fa-edit"></i> View
                                                                </a>
                                                                <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                    <i class="far fa-trash-alt"></i> Cancel
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                                </a>
                                                                <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>9 Nov 2019 <span class="d-block text-info">7.00 PM</span></td>
                                                        <td>Running Nose</td>
                                                        <td>Fever</td>
                                                        <td>18 Nov 2019</td>
                                                        <td><span class="badge badge-pill bg-success-light">Completed</span></td>
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                    <i class="far fa-edit"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                                </a>
                                                                <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>8 Nov 2019 <span class="d-block text-info">9.00 AM</span></td>
                                                        <td>Pain in the knee</td>
                                                        <td>Sprained Ankle</td>
                                                        <td>10 Nov 2019</td>
                                                        <td><span class="badge badge-pill bg-danger-light">Cancelled</span></td>
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                    <i class="far fa-edit"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                                </a>
                                                                <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>8 Nov 2019 <span class="d-block text-info">6.00 PM</span></td>
                                                        <td>Injury to the head</td>
                                                        <td>Fatal Injury</td>
                                                        <td>10 Nov 2019</td>
                                                        <td><span class="badge badge-pill bg-success-light">Completed</span></td>
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                    <i class="far fa-edit"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                                </a>
                                                                <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>7 Nov 2019 <span class="d-block text-info">9.00 PM</span></td>
                                                        <td>Headache</td>
                                                        <td>Fever</td>
                                                        <td>9 Nov 2019</td>
                                                        <td><span class="badge badge-pill bg-info-light">Completed</span></td>
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                    <i class="far fa-clock"></i> Reschedule
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                                </a>
                                                                <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>6 Nov 2019 <span class="d-block text-info">8.00 PM</span></td>
                                                        <td>Headache</td>
                                                        <td>Fever</td>
                                                        <td>8 Nov 2019</td>
                                                        <td><span class="badge badge-pill bg-info-light">Completed</span></td>
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                    <i class="far fa-clock"></i> Reschedule
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                                </a>
                                                                <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>5 Nov 2019 <span class="d-block text-info">5.00 PM</span></td>
                                                        <td>Running Nose</td>
                                                        <td>Fever</td>
                                                        <td>7 Nov 2019</td>
                                                        <td><span class="badge badge-pill bg-info-light">Completed</span></td>
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                    <i class="far fa-clock"></i> Reschedule
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Appointment Tab -->

                            <!-- Prescription Tab -->
                            <div class="tab-pane fade" id="prescription">
                                <div class="">
                                    <a href="add-prescription.html" class="add-new-btn">New Prescription</a>
                                    <a href="add-prescription.html" class="btn btn-info rounded-pill"><i class="fa fa-download"></i> Download Prescriptions</a>
                                </div>
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table datatable table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Date </th>
                                                        <th>Created by </th>
                                                        <th>Condition</th>									
                                                        <th>Contents</th>									
                                                        <th></th>
                                                    </tr>     
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>14 Nov 2013</td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}" alt="User Image">
                                                                </a>
                                                                <a href="doctor-profile.html">Dr. Ruby Perrin <span>Dental</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>Fever</td>
                                                        <td>Paracetamol, Amozil, Lonart </td>
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>14 Nov 2013</td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}" alt="User Image">
                                                                </a>
                                                                <a href="doctor-profile.html">Dr. Ruby Perrin <span>Hycent Pharmacy</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>Fever</td>
                                                        <td>Paracetamol, Amozil, Lonart </td>
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>14 Nov 2013</td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="doctor-profile.html">Dr. Ruby Perrin <span>ABC Hospital</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>Fever</td>
                                                        <td>Paracetamol, Amozil, Lonart </td>
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>	
                                            </table>
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

</div>
<!-- /Page Content -->

@endsection
@section('modals')
    <div class="modal fade custom-modal add-modal" id="delete_patient">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Delete Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="" class="needs-validation" novalidate>
                                <p>You are about to delete the records of Olamuyiwa Orepoms. Please note that this action is non-reversible.<br> The following will be deleted: </p>
                                <ul class="mt-2">
                                    
                                        <li>
                                            Basic Details
                                        </li>
                                        <li>
                                            Medical Records
                                        </li>
                                        <li>
                                            Assessment Records
                                        </li>
                                        <li>
                                            Prescription Records
                                        </li>
                                    
                                </ul>
                                <small class="d-block">By Clicking the Delete Button, you agree that you know what you are doing and you know the consequences</small>
                                <button type="submit" class="btn btn-danger pl-4 pr-4 mt-2">Delete</button>
                                <button type="button" class="btn btn-dark pl-4 pr-4 mt-2" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Reaction Modal -->
@endsection
@push('scripts')
    <script>
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