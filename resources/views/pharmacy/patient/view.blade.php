@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<!-- Datatables CSS -->
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
<style>
    .select2-container .select2-selection--single{
        height:46px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 42px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        position:absolute;
        top: 6px!important;
    }
    
</style>
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
                                    <h3>{{$patient->name}}</h3>
                                    
                                    <div class="patient-details">
                                        <h5><b>Patient ID :</b>{{strtoupper($patient->emr)}}</h5>
                                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, United States</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="patient-info">
                            <ul>
                                <li>Phone <span>{{$patient->mobile}}</span></li>
                                <li>Age <span>{{$patient->age}} Years, {{ucwords($patient->gender)}}</span></li>
                                <li>Blood Group <span>{{$patient->bloodgroup}}</span></li>
                                <li>Genotype <span>{{$patient->genotype}}</span></li>
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
                                @if($patient->pharmacy->owner->pharmacies->count() > 1)
                                <li>
                                    <a href="#transfer_patient" data-toggle="modal">
                                        <i class="fas fa-share"></i>
                                        <span>Transfer Patient</span>
                                    </a>
                                </li>
                                @endif
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
                                        <span>Archive Patient</span>
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
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#medical" data-toggle="tab"> <span class="med-records">Medical Records</span></a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="#assessments" data-toggle="tab">Assessments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#prescription" data-toggle="tab"><span>Prescription</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#sales" data-toggle="tab"><span>Analytics</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            
                            <!-- Billing Tab -->
                            <div id="billing" class="tab-pane fade show active">
                                
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <form action="{{route('pharmacy.patients.update', $pharmacy)}}" class="w-100" method="POST">@csrf
                                            <input type="hidden" name="patient_id" value="{{$patient->id}}">
                                            <div class="row w-100">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" value="{{$patient->name}}" name="name">
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
                                                        <input type="text" class="form-control" name="mobile" value="{{$patient->mobile}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Age <small>(today)</small> </label>
                                                        <input type="text" class="form-control" name="age_today" value="{{$patient->age}}">
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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Genotype</label>
                                                        <input type="text" class="form-control" name="genotype" value="{{$patient->genotype}}">
                                                    </div>
                                                </div>                         
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="form-label">Blood Group</label>
                                                        <input type="text" class="form-control" name="bloodgroup" value="{{$patient->bloodgroup}}">
                                                    </div>
                                                </div> 
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group mt-2">
                                                        <br>
                                                        
                                                        <button type="reset" class="btn btn-md btn-danger">Reset</button>
                                                        <button type="submit" class="btn btn-md btn-info" name="action" value="save">Update</button>
                                                        
                                                    </div>
                                                </div> 
        
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Medical Records Tab -->
                            {{-- <div class="tab-pane fade" id="medical">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <form action="{{route('pharmacy.patients.store', $pharmacy)}}" class="w-100" method="POST">@csrf
                                            <div class="row w-100">
                                                <div class="col-md-12" id="medical_conditions">
                                                    <h4>Medical History</h4>
                                                    <div class="row my-4 condition">
                                                        <div class="col-md-5">
                                                            <div class="form-group">  
                                                                <label class="text-muted text-center">Previous Medical Condition</label>                                        
                                                                <input type="text" name="medical_history" placeholder="Condition name" class=" form-control">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                            <label class="text-muted text-center">When did it happen</label>    
                                                            <div class="input-group">
                                                                <input type="month" name="past_history[date][]" placeholder="Year. e.g 2023" class="form-control">
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
                                                        
                                                        <button type="reset" class="btn btn-md btn-danger">Reset</button>
                                                    </div>
                                                </div> 
        
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div> --}}
                            <!-- /Medical Records Tab -->

                            <!-- Appointment Tab -->
                            <div class="tab-pane fade" id="assessments">
                                <div class="">
                                    <a href="{{route('pharmacy.assessments.create',[$pharmacy,$patient])}}" class="add-new-btn">New Assessment</a>
                                    <a href="#" class="btn btn-info rounded-pill"><i class="fa fa-download"></i> Download Assessments</a>
                                </div>
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table datatable table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Service Provider</th>
                                                        <th>Date</th>
                                                        <th>Complaint</th>
                                                        <th>Diagnosis</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($patient->assessments as $assessment)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                @if($assessment->user->image)
                                                                <a href="#" class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('storage/user/photo/'.$assessment->user->image)}}" alt="User Image">
                                                                </a>
                                                                @endif 
                                                                <a href="#">{{$assessment->user->name}}</a>
                                                            </h2>
                                                        </td>
                                                        <td>{{$assessment->created_at->format('d M Y')}} <span class="d-block text-info">{{$assessment->created_at->format('h:i A')}}</span></td>
                                                        <td>{{Str::limit(implode(',',$assessment->complaints), 20, '...')}}</td>
                                                        
                                                        <td>
                                                            @if($assessment->summary)
                                                                {{Str::before($assessment->summary, '@')}} 
                                                            @else 
                                                                Inconclusive
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                            @if($assessment->status == 'Inconclusive')
                                                                <span class="badge badge-pill bg-secondary-light">{{$assessment->status}}</span>
                                                            @elseif($assessment->status == 'Ongoing')
                                                                <span class="badge badge-pill bg-warning-light">{{$assessment->status}}</span>
                                                            @else
                                                                <span class="badge badge-pill bg-success-light">{{$assessment->status}}</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="{{route('pharmacy.assessments.show',[$pharmacy,$assessment])}}" class="btn btn-sm bg-success-light">
                                                                    <i class="far fa-edit"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>    
                                                    @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">
                                                            No Assessment
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                    
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
                                    <a href="{{route('pharmacy.prescriptions.create',['pharmacy'=> $pharmacy,'patient_id'=> $patient->id])}}" class="add-new-btn">New Prescription</a>
                                    <a href="#" class="btn btn-info rounded-pill"><i class="fa fa-download"></i> Download Prescriptions</a>
                                </div>
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table datatable table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Date </th>
                                                        <th>Created by </th>
                                                        <th>Origin</th>									
                                                        <th>Drugs</th>									
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>     
                                                </thead>
                                                <tbody>
                                                    @forelse ($patient->prescriptions as $prescription)
                                                        <tr>
                                                            <td class="text-nowrap">{{$prescription->created_at->format('d-M-Y')}} </td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    @if($prescription->user->image)
                                                                    <a href="#" class="avatar avatar-sm mr-2">
                                                                        <img class="avatar-img rounded-circle" src="{{asset('storage/user/photo/'.$prescription->user->image)}}" alt="User Image">
                                                                    </a>
                                                                    @endif 
                                                                    <a href="#">{{$prescription->user->name}}</a>
                                                                </h2>
                                                            </td>
                                                            <td>{{$prescription->origin}}</td>
                                                            <td>{{Str::words($prescription->summary,5)}}</td>
                                                            <td>
                                                                @switch($prescription->status)
                                                                    @case('draft') <span class="badge badge-pill bg-dark-light">Draft</span>
                                                                    @break
                                                                    @case('ongoing') <span class="badge badge-pill bg-warning-light">Ongoing</span>
                                                                    @break
                                                                    @case('completed') <span class="badge badge-pill bg-success-light">Completed</span>
                                                                    @break
                                                                @endswitch
                                                            </td>
                                                            
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    @if($prescription->status == 'draft')
                                                                    <a href="{{route('pharmacy.prescriptions.show',$pharmacy)}}" class="btn btn-sm bg-primary-light">
                                                                        <i class="far fa-eye"></i> Edit
                                                                    </a>
                                                                    <a href="{{route('pharmacy.prescriptions.show',$pharmacy)}}" class="btn btn-sm btn-danger">
                                                                        <i class="far fa-trash"></i> Delete
                                                                    </a>

                                                                    @else
                                                                    <a href="{{route('pharmacy.prescriptions.show',$pharmacy)}}" class="btn btn-sm bg-primary-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    <a href="{{route('pharmacy.prescriptions.show',$pharmacy)}}" class="btn btn-sm bg-success-light">
                                                                        <i class="far fa-edit"></i> Re-prescribe
                                                                    </a>
                                                                    
                                                                    @endif
                                                                    
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td class="text-center" colspan="6">No Prescriptions Yet </td> 
                                                        </tr> 
                                                    @endforelse
                                                </tbody>	
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Prescription Tab -->

                            <!-- Prescription Tab -->
                            <div class="tab-pane fade" id="sales">
                                
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <h4>Individual Patient Outcome Monitor</h4>
                                        <div class="row mt-5">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Select Diagnosis</label>
                                                    <select class="form-control select2 w-100" id="diagnosis_id" name="diagnosis_id" style="width:100%">
                                                        <option value=""></option>
                                                        @foreach ($patient->diagnoses as $diagnosis)
                                                        <option value="{{$diagnosis->id}}">{{$diagnosis->condition->description}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Vitals</label>
                                                    <select class="form-control select2 w-100" id="vital_id" name="vital_id" style="width:100%">
                                                        <option value=""></option>
                                                        @foreach ($vitals as $vital)
                                                            <option value="{{$vital->id}}" data-inputs="{{$vital->inputs}}">{{$vital->type}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" id="analytics_url" value="{{route('pharmacy.analytics.patient_individual',$pharmacy)}}">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-8 text-center">
                                                <button id="generate_chart" class="btn btn-primary">Generate Chart</button>
                                            </div>
                                            
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                <table class="table result">
                                                    <tr class="top">
                                                        <th>
                                                            Prescription
                                                        </th>
                                                        <th>
                                                            Prescription Date
                                                        </th>
                                                        <th>
                                                            Review Date
                                                        </th>
                                                        <th>
                                                            Result 
                                                        </th>

                                                        <th class="hide" style="display:none">
                                                            Result
                                                        </th>
                                                    </tr>
                                                    
                                                </table>
                                            </div> 
                                            <div class="col-md-12">
                                                <canvas id="volumeChart" style="width:100%;"></canvas>
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
                    <form class="">
                        <input type="hidden" name="patient_id" value="{{$patient->id}}">
                        <div class="form-group mt-2">
                            <label>Select Pharmacy </label>
                            <select class="form-control select2" name="pharmacy_id" required style="width: 100%">
                                <option value=""></option>
                                @foreach($patient->pharmacy->owner->pharmacies as $pharmacy)
                                    @if($pharmacy->id == $patient->pharmacy_id)
                                        @continue
                                    @endif
                                    <option value="{{$pharmacy->id}}">{{$pharmacy->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <p>All the patient's records will be transfered to selected pharmacy. <span class="text-danger">This means the patient's records will no longer be available on {{$pharmacy->name}}</span> </p>
                        <button type="submit" class="btn btn-warning pl-4 pr-4 mt-2">Transfer</button>
                        <button type="button" class="btn btn-dark pl-4 pr-4 mt-2" data-dismiss="modal" aria-label="Close">Cancel</button>
                    
                    </form>
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
                                        <input type="checkbox" id="share_basics" name="share_basics" checked value="basic" class="custom-control-input">
                                        <label class="custom-control-label" for="share_basics">Basic Details</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="share_meds" name="share_meds" value="medical_records" class="custom-control-input">
                                        <label class="custom-control-label" for="share_meds">Medical Records</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="share_assess" name="share_assess" value="assessment" class="custom-control-input">
                                        <label class="custom-control-label" for="share_assess">Assessments</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="share_pres" name="share_pres" value="prescriptions" class="custom-control-input">
                                        <label class="custom-control-label" for="share_pres">Prescriptions</label>
                                    </div>
                                </div>
                                
                                <div class="form-group mt-2">
                                    <label for="d-block">Share by:</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="pdftoemail" name="shareTo" value="email" class="custom-control-input">
                                        <label class="custom-control-label" for="pdftoemail">PDF to Email</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="secure" name="shareTo" value="link" class="custom-control-input">
                                        <label class="custom-control-label" for="secure">Secure Public Link</label>
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
                                <p>Send as sms or Send as Email</p>
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
                    <h5 class="modal-title text-danger">Archive Patient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="" class="needs-validation" novalidate>
                                <p>You are about to archive the records of Olamuyiwa Orepoms. Please note that this action is non-reversible.<br> The following will be archived: </p>
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
                                <small class="d-block">By Clicking the Archive Button, you agree that you know what you are doing and you know the consequences</small>
                                <button type="submit" class="btn btn-danger pl-4 pr-4 mt-2">Archive</button>
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
        $('.select2').select2();
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
        $(document).on('select2:select','#vital_id',function(e){
            var data = e.params.data;
            let inputs = data.element.dataset.inputs;
            if(inputs > 1){
                $(this).closest('.vitalrows').find('.answer_a input').attr('placeholder','Result 1');
                $(this).closest('.vitalrows').find('.answer_b').show();
            }else {
                $(this).closest('.vitalrows').find('.answer_a input').attr('placeholder','Result');
                $(this).closest('.vitalrows').find('.answer_b').hide();
            }
        })                                   
    </script> 
    <script src="{{asset('plugins/chart/chart.min.js')}}"></script>
    <script src="{{asset('plugins/chart/chartjs-plugin-datalabels.min.js')}}"></script>
    <script>
        var chart = new Chart("volumeChart", { 
                                data: {},
                                options: {
                                plugins: {
                                    legend: {
                                        display: false
                                    },
                                    title: {
                                        display: false,
                                        text: "Individual Patient Monitor"
                                    },
                                },
                            }
                        });
        $('#generate_chart').click(function(){
            let diagnosis_id = $('#diagnosis_id').val();
            let vital_id = $('#vital_id').val();
            let inputs = $('#vital_id').find(":selected").attr('data-inputs')
            let url = $('#analytics_url').val();
            $('.bottom').remove()
            
            if(diagnosis_id && vital_id){
                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url: url,
                    data:{
                        '_token' : $('meta[name="csrf-token"]').attr('content'),
                        'diagnosis_id': diagnosis_id,
                        'vital_id': vital_id,
                    },
                    success:function(data) {
                        $.each(data, function( index, value ) {
                            if(value.review_date){
                                $('.result').append(`<tr class="bottom">
                                    <td> ${value.prescription} </td> 
                                    <td> ${value.prescription_date} </td> 
                                    <td> ${value.review_date} </td> 
                                    <td> ${value.value_a} </td> 
                                    <td class="hide">${value.value_b} </td>
                                    </tr>`)
                            }
                            
                        });
                        if(inputs > 1) $('.hide').show();
                        else $('.hide').hide();
                        if(data.length){
                            const xVolume = data.map(a => a.review_date);
                            const yVolume = data.map(b => b.value_a);
                            const zVolume = data.map(c => c.value_b);
                            const dataset = [];
                            dataset.push({ type: "line", label: "Single Input", backgroundColor: "rgba(0,0,255,1.0)", data: yVolume})
                            if(zVolume[0]){
                                dataset.push({ type: "line", label: "Double Input", backgroundColor: "rgba(0,255,0,1.0)", data: zVolume})
                            }
                            updateChart(chart,xVolume,dataset)
                            $('#volumeChart').show()
                        }else{
                            $('#volumeChart').hide()
                        }
                    
                    },
                    error: function (data, textStatus, errorThrown) {
                        
                        console.log(data);
                    },
                });
            }
        })
        function updateChart(chart, label, newData) {
            chart.data.labels = label;
            chart.data.datasets= newData;
            chart.update();
        }
        
        
       
    </script>
@endpush