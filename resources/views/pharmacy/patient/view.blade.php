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
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar dct-dashbd-lft">
            
                <!-- Profile Widget -->
                <div class="card widget-profile pat-widget-profile">
                    <div class="card-body">
                        <div class="pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img src="{{asset('assets/img/patients/patient.jpg')}}" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3>Richard Wilson</h3>
                                    
                                    <div class="patient-details">
                                        <h5><b>Patient ID :</b> PT0016</h5>
                                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, United States</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="patient-info">
                            <ul>
                                <li>Phone <span>+1 952 001 8563</span></li>
                                <li>Age <span>38 Years, Male</span></li>
                                <li>Blood Group <span>AB+</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Profile Widget -->
                
                <!-- Last Booking -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Last Booking</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="media align-items-center">
                                <div class="mr-3">
                                    <img alt="Image placeholder" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" class="avatar  rounded-circle">
                                </div>
                                <div class="media-body">
                                    <h5 class="d-block mb-0">Dr. Darren Elder </h5>
                                    <span class="d-block text-sm text-muted">Dentist</span>
                                    <span class="d-block text-sm text-muted">14 Nov 2019 5.00 PM</span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media align-items-center">
                                <div class="mr-3">
                                    <img alt="Image placeholder" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" class="avatar  rounded-circle">
                                </div>
                                <div class="media-body">
                                    <h5 class="d-block mb-0">Dr. Darren Elder </h5>
                                    <span class="d-block text-sm text-muted">Dentist</span>
                                    <span class="d-block text-sm text-muted">Headache 11.00 AM</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /Last Booking -->
                
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9 dct-appoinment">
                <div class="card">
                    <div class="card-body pt-0">
                        <div class="user-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#billing" data-toggle="tab">
                                        <span>Basic Details</span>
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="#medical" data-toggle="tab">
                                        <span class="med-records">Medical Records</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#assessments" data-toggle="tab">Assessments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#prescription" data-toggle="tab"><span>Prescription</span></a>
                                </li>
                                
                                
                            </ul>
                        </div>
                        <div class="tab-content">
                            
                            <!-- Billing Tab -->
                            <div id="billing" class="tab-pane fade show active">
                                
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <form action="{{route('pharmacy.patient.store', $pharmacy)}}" class="w-100" method="POST">@csrf
                                            <div class="row w-100">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" class="form-control" value="{{explode(' ',$patient->name)[0]}}" name="first_name">
                                                    </div>
                                                </div>                         
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" name="last_name" value="{{array_key_exists(1,explode(':',$patient->name))? explode(':',$patient->name)[1]:''}}">
                                                    </div>
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="email" value="{{$patient->email}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control" name="mobile" value="{{$patient->email}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Date of birth</label>
                                                        <input type="date" class="form-control" name="dob" value="{{$patient->dob->format('Y-m-d')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="form-label">Gender</label>
                                                        <select class="form-control" id="gender" name="gender">
                                                            <option value="female" @if($patient->gender=='female') selected @endif>Female</option>
                                                            <option value="male" @if($patient->gender=='male') selected @endif>Male</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Address <small>(optional)</small></label>
                                                        <input type="text" class="form-control" name="address" value="{{$patient->address}}">
                                                    </div>
                                                </div> 
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group mt-2">
                                                        <br>
                                                        <button type="submit" class="btn btn-md btn-info" name="action" value="save">Update</button>
                                                        
                                                        <button type="reset" class="btn btn-md btn-danger">Reset</button>
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
                                        <form action="{{route('pharmacy.patient.store', $pharmacy)}}" class="w-100" method="POST">@csrf
                                            <div class="row w-100">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Genotype</label>
                                                        <input type="text" class="form-control" name="first_name">
                                                    </div>
                                                </div>                         
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="form-label">Blood Group</label>
                                                        <input type="text" class="form-control" name="last_name">
                                                    </div>
                                                </div> 
                                                 
                                                <div class="col-md-12" id="medical_conditions">
                                                    <h4>Medical History</h4>
                                                    <div class="row my-4 condition">
                                                        <div class="col-md-7">
                                                            <div class="form-group">  
                                                                <label class="text-muted text-center">Previous Medical Condition</label>                                        
                                                                <input type="text" name="medical_history" placeholder="Condition name" class=" form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                                                <button type="button" class="btn btn-primary add_condition" title="add more"><i class="fa fa-plus"></i></button>
                                                        </div>
                                                        <div class="col-md-12 medications">
                                                            <div class="med mb-1">
                                                                <input type="text" name="medical_history" placeholder="Medication used" class="form-control-sm"> 
                                                                <label class="form-check-label mx-3">Effective? </label>
                                                                <label class="form-check-label mx-3">
                                                                    <input type="radio" class="form-check-input" name="effection">Yes
                                                                </label>
                                                                <label class="form-check-label mx-3">
                                                                    <input type="radio" class="form-check-input" name="optradio">No
                                                                </label>
                                                                <button type="button" class="btn btn-sm btn-info add_medication" title="add more"><i class="fa fa-plus"></i></button>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mt-2">
                                                        <br>
                                                        <button type="submit" class="btn btn-md btn-info" name="action" value="save">Save & Close</button>
                                                        <button type="submit" class="btn btn-md btn-primary" name="action" value="assessment">Save & Assessment</button>
                                                        <button type="reset" class="btn btn-md btn-danger">Reset</button>
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
                                <div class="text-right">
                                    <a class="add-new-btn" href="add-billing.html">Add Assessment</a>
                                </div>
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0">
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
                                <div class="text-right">
                                    <a href="add-prescription.html" class="add-new-btn">Add Prescription</a>
                                </div>
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0">
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
                            <!-- /Prescription Tab -->

                            
                            
                            
                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->

@endsection