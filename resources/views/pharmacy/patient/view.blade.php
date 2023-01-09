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
                        <h4 class="card-title">Other Menus</h4>
                    </div>
                    <div class="dashboard-widget">
                        <nav class="dashboard-menu">
                            <ul>
                                <li>
                                    <a href="#transfer_patient" data-toggle="modal">
                                        <i class="fas fa-share"></i>
                                        <span>Transfer Patient</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#send_record" data-toggle="modal">
                                        <i class="fas fa-share-alt"></i>
                                        <span>Share Patient Records</span>
                                    </a>
                                </li>
                                {{-- @endusercan
                                @usercan($pharmacy,'assessment') --}}
                                <li>
                                    <a href="#message_patient" data-toggle="modal">
                                        <i class="fas fa-envelope"></i>
                                        <span>Message Patient</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#delete_patient" data-toggle="modal" class="text-danger">
                                        <i class="fas fa-trash"></i>
                                        <span>Delete Patient</span>
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
                                    <a class="nav-link active" href="#billing" data-toggle="tab"> <span>Basic Details</span> </a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="#medical" data-toggle="tab"> <span class="med-records">Medical Records</span></a>
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
                                        <form action="{{route('pharmacy.patients.store', $pharmacy)}}" class="w-100" method="POST">@csrf
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
                                        <form action="{{route('pharmacy.patients.store', $pharmacy)}}" class="w-100" method="POST">@csrf
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
@section('modals')
    <!-- Medicine Info Modal -->
    
    <div class="modal fade custom-modal add-modal" id="transfer_patient">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Transfer Patient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 d-flex">
                            <div class="card flex-fill">
                                
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-4 pl-0 pr-0">
                                            Name:
                                        </div>
                                        <div class="col-sm-8 pl-0 pr-0"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-4 pl-0 pr-0">
                                            Brands:
                                        </div>
                                        <div class="col-sm-8 pl-0 pr-0">Emzor, M&B</div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-4 pl-0 pr-0">
                                            Contraindications:
                                        </div>
                                        <div class="col-sm-8 pl-0 pr-0"></div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-4 pl-0 pr-0">
                                            Treats:
                                        </div>
                                    
                                        <div class="col-sm-8 pl-0 pr-0">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-4 pl-0 pr-0">
                                            Treats:
                                        </div>
                                        <div class="col-sm-8 pl-0 pr-0">Headache et al.,</div>
                                    </div> 
                                </div>
                            
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Medicine Info Modal -->
    <!-- Reaction Modal -->
    <div class="modal fade custom-modal add-modal" id="send_record">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Share Patient Records</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="" class="needs-validation" novalidate>
                                <p>You are sharing Patient's information with a third party</p>
                                <div class="col-12 text-muted mb-3">
                                    <p>What to Share</p>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="share_basics" name="share_basics" checked value="custom_price" class="custom-control-input">
                                        <label class="custom-control-label" for="autodelete">Basic Details</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="share_meds" name="share_meds" value="custom_price" class="custom-control-input">
                                        <label class="custom-control-label" for="autodelete">Medical Records</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="share_assess" name="share_assess" value="custom_price" class="custom-control-input">
                                        <label class="custom-control-label" for="autodelete">Assessments</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="share_pres" name="share_pres" value="custom_price" class="custom-control-input">
                                        <label class="custom-control-label" for="autodelete">Prescriptions</label>
                                    </div>
                                </div>
                                
                                <div class="form-group mt-2">
                                    <label for="d-block">Share by:</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="pdftoemail" name="share" value="custom_price" class="custom-control-input">
                                        <label class="custom-control-label" for="share">PDF to Email</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="secure" name="share" value="custom_price" class="custom-control-input">
                                        <label class="custom-control-label" for="share">Secure Public Link</label>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Share to </label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <small class="d-block">By Clicking the Share Button, you agree that you know what you are doing and you know the consequences</small>
                                <button type="submit" class="btn btn-primary pl-4 pr-4 mt-2">Share</button>
                                <button type="button" class="btn btn-dark pl-4 pr-4 mt-2" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade custom-modal add-modal" id="message_patient">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="#" class="needs-validation" novalidate>
                                
                                <div class="form-group mt-2">
                                    <label for="pwd">Message:</label>
                                    <textarea class="form-control" rows="3" id="description" name="body" required></textarea> 
                                </div>
                                <div class="form-group mt-2">
                                    <label for="pwd">Attachment:</label>
                                    <input type="file" class="form-control" name="file" multiple> 
                                    <small>Can attach multiple files</small>
                                </div>

                                <button type="submit" class="btn btn-primary pl-4 pr-4 mt-2">Send</button>
                                <button type="button" class="btn btn-dark pl-4 pr-4 mt-2" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade custom-modal add-modal" id="delete_patient">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Delete Patient</h5>
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
        $(document).on('click',".add_condition", function() {
            console.log("condition")
            var condition = ` 
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
                                            <button type="button" class="btn btn-danger remove_condition" title="add more"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                    <div class="col-md-12 medications">
                                        <div class="med mb-1">
                                            <input type="text" name="medical_history" placeholder="Medication used" class="form-control-sm"> 
                                            <label class="form-check-label mx-3">Effective? </label>
                                            <label class="form-check-label mx-3">
                                                <input type="radio" class="form-check-input" name="optradio">Yes
                                            </label>
                                            <label class="form-check-label mx-3">
                                                <input type="radio" class="form-check-input" name="optradio">No
                                            </label>
                                            <button type="button" class="btn btn-sm btn-info add_medication" title="add more"><i class="fa fa-plus"></i></button>
                                        </div>
                                        
                                    </div>     
                                </div>
                            `;

            $("#medical_conditions").append(condition);
        });
        $(document).on('click',".add_medication", function() {
            var medication = ` 
                                <div class="med mb-1">
                                    <input type="text" name="medical_history" placeholder="Medication used" class="form-control-sm"> 
                                    <label class="form-check-label mx-3">Effective? </label>
                                    <label class="form-check-label mx-3">
                                        <input type="radio" class="form-check-input" name="optradio">Yes
                                    </label>
                                    <label class="form-check-label mx-3">
                                        <input type="radio" class="form-check-input" name="optradio">No
                                    </label>
                                    <button type="button" class="btn btn-sm btn-info add_medication" title="add more"><i class="fa fa-plus"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger remove_medication" title="remove"><i class="far fa-trash-alt"></i></button>
                                </div> 
                            `;

            $(this).closest(".medications").append(medication);
        });
        $(document).on('click', '.remove_condition', function() {
            $(this).closest('.condition').remove();
        });
        $(document).on('click', '.remove_medication', function() {
            $(this).closest('.med').remove();
        });                                           
    </script> 
    
@endpush