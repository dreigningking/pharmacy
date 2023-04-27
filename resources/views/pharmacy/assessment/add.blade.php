@extends('layouts.main.app')
@push('styles')

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
    .pane{
        display:none;
    }
    .showit{
        display:block;
    }

    .past_medication{
        font-size:12px !important;
    }
    .past_medication label{
        margin-bottom:0px;
    }
    .past_medication .select2-container .select2-selection--single,.past_medication input{
        height:36px !important;    
    }
    .past_medication .form-control{
        height:36px !important;
        min-height:36px !important;
        font-size:12px !important;
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
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    
                <!-- Profile Sidebar -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Assessment</h4>
                    </div>
                    <div class="dashboard-widget">
                    
                        <nav class="dashboard-menu">
                            <ul class="assessment_menus">
                                <li class="active patient">
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-user-injured"></i> <span>Patient</span>
                                    </a>
                                </li>
                                
                                <li class="complaint">
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-sad-cry"></i>
                                        <span>Complaint</span>
                                    </a>
                                </li>
                                <li class="past_medical_history">
                                    <a href="javascript:void(0)" >
                                        <i class="fas fa-book-medical"></i>
                                        <span>Medical & Medication History</span>
                                    </a>
                                </li>
                                
                                <li class="family_social_history"> 
                                    <a href="javascript:void(0)" >
                                        <i class="fas fa-users"></i>
                                        <span>Family & Social History</span>
                                    </a>
                                </li>
                                <li class="vitals">
                                    <a href="javascript:void(0)" >
                                        <i class="fas fa-thermometer-half"></i>
                                        <span>Vitals</span>
                                    </a>
                                </li>
                                <li class="review">
                                    <a href="javascript:void(0)" >
                                        <i class="fas fa-diagnoses"></i>
                                        <span>System Review</span>
                                    </a>
                                </li>
                                <li class="provisional_diagnosis">
                                    <a href="javascript:void(0)" >
                                        <i class="fas fa-stethoscope"></i>
                                        <span>Provisional Diagnosis</span>
                                    </a>
                                </li>
                                <li class="laboratory">
                                    <a href="javascript:void(0)" >
                                        <i class="fas fa-microscope"></i>
                                        <span>Laboratory</span>
                                    </a>
                                </li>
                                <li class="final_diagnosis">
                                    <a href="javascript:void(0)" >
                                        <i class="fas fa-plus-square"></i>
                                        <span>Final Diagnosis</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /Profile Sidebar -->
            
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('pharmacy.assessments.store', $pharmacy)}}" class="w-100" method="POST">@csrf
                            <div class="contents">
                                <div class="pane showit" id="patient">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Patients</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    {{-- <p>Begin assessment by finding the patient for whom accessment will be done</p> --}}
                                                    
                                                    <div class="search">
                                                        <label class="h6">Search Patient</label>
                                                        <select name="patient_id" id="selectpatient" class="form-control">
                                                            <option></option>
                                                            @foreach ($pharmacy->patients as $patientz)
                                                                <option value="{{$patientz->id}}" 
                                                                    @if($patient && $patient->id == $patientz->id) selected @endif 
                                                                    data-name="{{$patientz->name}}" 
                                                                    data-emr="{{$patientz->emr}}" 
                                                                    data-phone="{{$patientz->mobile}}" 
                                                                    data-email="{{$patientz->email}}" 
                                                                    data-age="{{$patientz->age}}" 
                                                                    data-gender="{{$patientz->gender}}" 
                                                                    data-bloodgroup="{{$patientz->bloodgroup}}" 
                                                                    data-genotype="{{$patientz->genotype}}">{{$patientz->emr}}-{{$patientz->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="result" style="display: none">
                                                        <div class="d-flex flex-column">
                                                            <div class="card-body">
                                                                <div class="pro-widget-content">
                                                                    <div class="profile-info-widget">
                                                                        
                                                                        <div class="profile-det-info">
                                                                            <h3><span id="patient_name"> Richard Wilson</span></h3>
                                                                            
                                                                            <div class="patient-details">
                                                                                <h5><b>Patient ID :</b> <span id="patient_emr">PT0016</span> </h5>
                                                                                <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> <span id="patient_location"></span> Newyork, United States</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="patient-info p-3">
                                                                    <ul>
                                                                        <li>Phone <span id="patient_phone">+1 952 001 8563</span></li>
                                                                        <li>Email <span  id="patient_email">somebody@gmail.com</span></li>
                                                                        <li>Age <span  id="patient_age_gender">38 Years, Male</span></li>
                                                                        <li>Blood Group <span  id="patient_bloodgroup">AB+</span></li>
                                                                        <li>Genotype <span  id="patient_genotype">AB+</span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <a href="javascript:void(0)" id="select_patient" class="btn btn-outline-primary mb-2" style="display: none">Select Patient</a>
                                                        <div class="my-4">OR</div>
                                                        <a href="javascript:void(0)" id="new_patient" class="btn btn-outline-primary mb-2">New Patient</a>   
                                                    </div>
                                                           
                                                    
                                                    
                                                    <div class="patient_form pt-3" style="display: none">
                                                        
                                                            <div class="row w-100">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Full Name</label>
                                                                        <input type="text" id="patient_form_name" class="form-control" name="name">
                                                                    </div>
                                                                </div>                         
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Email</label>
                                                                        <input type="email" id="patient_form_email" class="form-control" name="email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Phone Number</label>
                                                                        <input type="text" id="patient_form_mobile" class="form-control" name="mobile">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Address <small>(optional)</small></label>
                                                                        <input type="text" id="patient_form_address" class="form-control" name="address">
                                                                    </div>
                                                                </div> 
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Age</label>
                                                                        <input type="number" id="patient_form_age" min="1" class="form-control" name="age_today">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="form-label" >Gender</label>
                                                                        <select class="form-control" id="patient_form_gender" name="gender">
                                                                            <option value="female">Female</option>
                                                                            <option value="male">Male</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="form-label">Genotype</label>
                                                                        <select class="form-control" id="patient_form_genotype" name="genotype">
                                                                            <option value="female">AA</option>
                                                                            <option value="male">AB</option>
                                                                            <option value="male">AC</option>
                                                                            <option value="male">SS</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="form-label">Blood Type</label>
                                                                        <select class="form-control" id="patient_form_bloodtype" name="bloodtype">
                                                                            <option value="female">A+</option>
                                                                            <option value="male">B+</option>
                                                                            <option value="male">O+</option>
                                                                            <option value="male">O-</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                {{-- 
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mt-2">
                                                                            
                                                                            <button type="reset" class="btn btn-md btn-danger">Reset</button>
                                                                            <button type="submit" class="btn btn-md btn-info" name="action" value="save">Save & Begin Assessment </button>
                                                                            <button type="submit" class="btn btn-md btn-primary" name="action" value="assessment">Save & Begin Prescription</button>
                                                                            <button type="submit" class="btn btn-md btn-dark" name="action" value="prescription">Past Medical History  <i class="fa fa-arrow-right"></i></button>
                                                                            
                                                                        </div>
                                                                    </div> 
                                                                --}}
                                                            </div>
                                                        
                                                    </div>

                                                    <div class="call-footer" style="display: none">
                                                        <div class="d-flex justify-content-around">
                                                            <a href="javascript:void(0)" id="goto_complaint" class="btn btn-info btn-block next"> <i class="fa fa-medkit"></i> Begin Assessment </a>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                 <div class="pane " id="complaint">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Compliants</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <select name="complaints[]" id="select_complaints" class="" multiple>
                                                            @foreach ($complaints as $complain)
                                                                <option value="{{$complain->description}}">{{$complain->description}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="call-foot">
                                                        <div class="d-flex justify-content-between">
                                                            <a href="javascript:void(0)" class="btn btn-primary previous"> <i class="fa fa-arrow-left"></i> Previous  </a>
                                                            <a href="javascript:void(0)" class="btn btn-dark">  Save & Continue Later</a>   
                                                            <a href="javascript:void(0)" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Next  </a>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="pane " id="past_medical_history">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Medical & Medication History</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="past_histories">
                                                <div class="row py-4 past_history border-bottom">
                                                    <div class="col-md-4">
                                                        <label class="text-muted text-center">Medical Condition</label>                                        
                                                        <select name="past_history[condition][]" placeholder="Condition name" class="selectcondition form-control">
                                                            <option value=""></option>
                                                            @foreach ($conditions as $condition)
                                                                <option value="{{$condition->id}}">{{$condition->description}}</option>
                                                            @endforeach
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="text-muted text-center">Start</label>    
                                                        <div class="input-group">
                                                            <input type="month" name="history[start][]" placeholder="Year. e.g 2023" class="form-control">
                                                        </div>                                    
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="text-muted text-center">End</label>    
                                                        <div class="input-group">
                                                            <input type="month" name="history[end][]" placeholder="Year. e.g 2023" class="form-control">
                                                        </div>                                    
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                                            <button type="button" class="btn btn-primary add_past_history" title="add more"><i class="fa fa-plus"></i></button>
                                                            <button type="button" class="btn btn-danger remove_past_history" title="remove"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    <div class="col-md-12 mt-3" id="past_medications">
                                                        <div class="row past_medication mb-1">
                                                            <div class="col-md-3 pr-0">
                                                                <label class="text-muted text-center">Medication Used</label> 
                                                                <select name="past_history[medication][][]" placeholder="Medication used" class="selectmedication form-control-sm"> 
                                                                    <option value=""></option>
                                                                    @foreach ($medicines as $medicine)
                                                                        <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2 pr-0">
                                                                <label class="text-muted ">Start</label>    
                                                                <input type="month" name="history[start][]" placeholder="Year. e.g 2023" class="form-control">                                  
                                                            </div>
                                                            <div class="col-md-2 pr-0">
                                                                <label class="text-muted text-center">End</label>    
                                                                <input type="month" name="history[end][]" placeholder="Year. e.g 2023" class="form-control">                                   
                                                            </div>
                                                            <div class="col-md-1 pr-0">
                                                                <label class="d-block">Effective?</label> 
                                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                                    <input type="checkbox" id="abc" name="past_history[effectiveness][][]" value="1" class="custom-control-input">
                                                                    <label class="custom-control-label" for="abc">yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="d-block pt-3"></label>
                                                                <button type="button" class="btn btn-sm btn-info add_past_medication" title="add more"><i class="fa fa-plus"></i></button>
                                                                <button type="button" class="btn btn-sm btn-danger remove_past_medication" title="add more"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-7">
                                                    
                                                    <div class="call-foot">
                                                        <div class="d-flex justify-content-between">
                                                            <a href="javascript:void(0)" class="btn btn-primary previous"> <i class="fa fa-arrow-left"></i> Previous  </a>
                                                            <a href="javascript:void(0)" class="btn btn-dark">  Save & Continue Later</a>   
                                                            <a href="javascript:void(0)" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Next  </a>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 
                                <div class="pane " id="family_social_history">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Family & Social History</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="family_and_social_history">
                                                <div class="row familyhistoryrows mb-4">
                                                    <div class="col-md-5">
                                                        <select class="form-control familyquestions" name="familyhistory[questions][]">
                                                            <option value=""></option>
                                                            @foreach ($familySocialQuestions as $familyQuestions)
                                                                <option>{{$familyQuestions->description}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="col-md-3 pt-2">
                                                            <div class="d-flex">
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="abcfamilyhistory" name="familyhistory[answers][]" value="1" class="custom-control-input">
                                                                    <label class="custom-control-label" for="abc">Yes</label>
                                                                </div>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="xyzfamilyhistory" name="familyhistory[answers][]" value="0" class="custom-control-input">
                                                                    <label class="custom-control-label" for="xyz">No</label>
                                                                </div> 
                                                            </div>     
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:void(0);" class="btn btn-primary add_family_questions ml-2"> <i class="fa fa-plus-circle"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-danger remove_family_questions ml-2"> <i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="call-foot">
                                                        <div class="d-flex justify-content-between">
                                                            <a href="javascript:void(0)" class="btn btn-primary previous"> <i class="fa fa-arrow-left"></i> Previous  </a>
                                                            <a href="javascript:void(0)" class="btn btn-dark">  Save & Continue Later</a>   
                                                            <a href="javascript:void(0)" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Next  </a>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>        
                                <div class="pane " id="vitals">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Vitals</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="vital_assessments">
                                                <div class="row vitalrows mb-4">
                                                    <div class="col-md-5">
                                                        <select class="form-control vitalquestions" name="vitals[assessments][]">
                                                            <option value=""></option>
                                                            @foreach ($vitals as $vital)
                                                                <option>{{$vital->type}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" name="vitals[answers][]">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:void(0);" class="btn btn-primary add_vitals ml-2"> <i class="fa fa-plus-circle"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-danger remove_vitals ml-2"> <i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="call-foot">
                                                        <div class="d-flex justify-content-between">
                                                            <a href="javascript:void(0)" class="btn btn-primary previous"> <i class="fa fa-arrow-left"></i> Previous  </a>
                                                            <a href="javascript:void(0)" class="btn btn-dark">  Save & Continue Later</a>   
                                                            <a href="javascript:void(0)" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Next  </a>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="pane " id="review">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>System Review</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="system_review">
                                                <div class="row systemreviewrows mb-4">
                                                    <div class="col-md-5">
                                                        <select class="form-control reviewcategories" name="review[questions][]">
                                                            <option value=""></option>
                                                            @foreach ($reviews->unique('system')->pluck('system')->toArray() as $system)
                                                                <option>{{$system}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="form-control reviewoptions" name="review[options][]">
                                                            <option value=""></option>
                                                            @foreach ($reviews as $review)
                                                                <option>{{$review->description}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:void(0);" class="btn btn-primary add_reviews ml-2"> <i class="fa fa-plus-circle"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-danger remove_reviews ml-2"> <i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="call-foot">
                                                        <div class="d-flex justify-content-between">
                                                            <a href="javascript:void(0)" class="btn btn-primary previous"> <i class="fa fa-arrow-left"></i> Previous  </a>
                                                            <a href="javascript:void(0)" class="btn btn-dark">  Save & Continue Later</a>     
                                                            <a href="javascript:void(0)" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Next  </a>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pane " id="provisional_diagnosis">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Provisional Diagnosis</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="provision_assessments">
                                                <div class="row provisionrows mb-4">
                                                    <div class="col-md-5">
                                                        <label>Condition</label>
                                                        <select class="form-control provisions" name="provisional[assessments][]">
                                                            <option value=""></option>
                                                            @foreach ($conditions as $condition)
                                                                <option>{{$condition->description}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label>Require Test</label>
                                                        <select class="form-control required_test" name="require_test[assessments][]">
                                                            <option value=""></option>
                                                            @foreach ($labtests as $labtest)
                                                                <option value="{{$labtest->id}}">{{$labtest->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                                        <a href="javascript:void(0);" class="btn btn-primary add_provisions ml-2"> <i class="fa fa-plus-circle"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-danger remove_provisions ml-2"> <i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="call-foot">
                                                        <div class="d-flex justify-content-between">
                                                            <a href="javascript:void(0)" class="btn btn-primary previous"> <i class="fa fa-arrow-left"></i> Previous  </a>
                                                            <a href="javascript:void(0)" class="btn btn-dark">  Save & Continue Later</a>   
                                                            <a href="javascript:void(0)" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Next  </a>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pane " id="laboratory">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Lab Test</h4>
                                        </div>
                                        <div class="card-body labtest">
                                            <div class="row ">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <select name="tests[]" class="form-control select w-100"> 
                                                            @foreach ($labtests as $labtest)
                                                                <option value="{{$labtest->id}}">{{$labtest->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="physical_assessment_value[]">
                                                    </div>    
                                                </div>
                                                
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-sm btn-info add_test " title="add more"><i class="fa fa-plus"></i></button>
                                                        <button type="button" class="btn btn-sm btn-danger remove_test " title="remove more"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="call-foot">
                                                        <div class="d-flex justify-content-between">
                                                            <a href="javascript:void(0)" class="btn btn-primary previous"> <i class="fa fa-arrow-left"></i> Previous  </a>
                                                            <a href="javascript:void(0)" class="btn btn-dark">  Save & Continue Later</a>   
                                                            <a href="javascript:void(0)" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Next  </a>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pane " id="final_diagnosis">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Final Diagnosis</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Condition</label>
                                                    <select class="form-control final_diagnosis" name="final_diagnosis[assessments][]">
                                                        <option value=""></option>
                                                        @foreach ($conditions as $condition)
                                                            <option>{{$condition->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                    <label>Expected Outcome</label>
                                                    <select class="form-control expected_outcome" name="expected_outcome[assessments][]">
                                                        <option value=""></option>
                                                        @foreach ($labtests as $labtest)
                                                            <option value="{{$labtest->id}}">{{$labtest->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="call-foot">
                                                        <div class="d-md-flex justify-content-between">
                                                            <a href="javascript:void(0)" class="btn btn-primary previous"> <i class="fa fa-arrow-left"></i> Previous  </a>   
                                                            <button type="submit" name="action" value="draft" class="btn btn-dark"> Save Assessment </button>   
                                                            <button type="submit" name="action" value="complete" class="btn btn-info"> Conclude & Prescribe Medicine <i class="fa fa-arrow-right"></i></button>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

<!-- /Page Content -->

@endsection

@push('scripts')
<script>
    var past_medical_history,family_history,vitals,provisional,reviews;
    $(document).ready(function(){
        past_medical_history = $('.past_history').last().prop("outerHTML");
        past_medication = $('.past_medication').last().prop("outerHTML");
        family_history = $('.familyhistoryrows').last().prop("outerHTML");
        vitals = $('.vitalrows').last().prop("outerHTML");
        provisional = $('.provisionrows').last().prop("outerHTML");
        reviews = $('.systemreviewrows').last().prop("outerHTML");
        $('.selectcondition,.selectmedication,.familyquestions,.vitalquestions,.provisions,.required_test,.reviewcategories,.reviewoptions').select2({width:'100%',placeholder:'Select'});
    })

    //patients
    $('#new_patient').on('click',function(){
        $('.search').hide()
        $(this).hide()
        $('.result,.call-footer').hide();
        $('#select_patient').show()
        $('.patient_form').fadeIn()
    })
    $('#selectpatient').select2({
            placeholder: 'Select Patient',
    });
    $('#select_patient').on('click',function(){
        $('.search').fadeIn()
        $(this).hide()
        $('#new_patient').show()
        $('.patient_form').hide()
    })
    $(document).on('select2:select','#selectpatient',function(e){
        let data = e.params.data;
        $('#patient_name').text(data.element.dataset.name)
        $('#patient_emr').text(data.element.dataset.emr)
        $('#patient_phone').text(data.element.dataset.phone)
        $('#patient_email').text(data.element.dataset.email)
        $('#patient_age_gender').text(data.element.dataset.age +' Years, '+data.element.dataset.gender)
        $('#patient_bloodgroup').text(data.element.dataset.bloodgroup)
        $('#patient_genotype').text(data.element.dataset.genotype)
        $('.result,.call-footer').show(); 
    });
    $(document).on('input','#patient_form_mobile,#patient_form_name',function(){
        if($('#patient_form_name').val() != '' && $('#patient_form_mobile').val() != '')
        $('.call-footer').show()
    })
    //complaints
    $('#select_complaints').select2({
        tags:true,
        width:'100%'
    })
    //medical and medication history
    $(document).on('click','.add_past_history',function(){
        $('#past_histories').append(past_medical_history);
        resetPastMedicationAttributes()
    })
    $(document).on('click','.add_past_medication',function(){
        $(this).closest('#past_medications').append(past_medication);
        resetPastMedicationAttributes()
    })
    $(document).on('click','.remove_past_history',function(){
        if($('.remove_past_history').length > 1){
            $(this).closest('.past_history').remove();
        }
        resetPastMedicationAttributes()
    })
    $(document).on('click','.remove_past_medication',function(){
        
        if($(this).closest('.past_history').find('.remove_past_medication').length > 1){
            $(this).closest('.past_medication').remove();
            console.log('more than 1')
        }
        resetPastMedicationAttributes()
    })
    function resetPastMedicationAttributes(){
        $('.selectcondition,.selectmedication').select2({width:'100%',placeholder:'Select'})
        $('.past_history').each(function(outer){
            $(this).find('.selectmedication').attr('name','past_history[medication]['+outer+'][]')

            $(this).find('.past_medication').each(function(inner){
                
                $(this).find('.custom-control-input').attr('name','past_history[effectiveness]['+outer+']['+inner+']')
                
                $('.past_medication').find('.custom-control-input').each(function(inde,val){
                    $(this).attr('id','past'+inde)
                })
                $('.past_medication').find('.custom-control-label').each(function(ind,va){
                    $(this).attr('for','past'+ind)
                })
            
            })
        })
    }
    
    $(document).on('click','.add_current_medication',function(){
        $(this).closest('#current_medications').append(current_medication);
        resetCurrentMedicationAttributes()
    })
    $(document).on('click','.remove_current_history',function(){
        if($('.remove_current_history').length > 1){
            $(this).closest('.current_history').remove();
        }
        resetCurrentMedicationAttributes()
    })
    $(document).on('click','.remove_current_medication',function(){
        
        if($(this).closest('.current_history').find('.remove_current_medication').length > 1){
            $(this).closest('.current_medication').remove();
            console.log('more than 1')
        }
        resetCurrentMedicationAttributes()
    })
    function resetCurrentMedicationAttributes(){
        $('.selectcondition,.selectmedication').select2({width:'100%',placeholder:'Select'})
        $('.current_history').each(function(outer){
            $(this).find('.selectmedication').attr('name','current_history[medication]['+outer+'][]')

            $(this).find('.current_medication').each(function(inner){
                
                $(this).find('.custom-control-input').attr('name','current_history[effectiveness]['+outer+']['+inner+']')
                
                $('.current_medication').find('.custom-control-input').each(function(inde,val){
                    $(this).attr('id','current'+inde)
                })
                $('.current_medication').find('.custom-control-label').each(function(ind,va){
                    $(this).attr('for','current'+ind)
                })
            
            })
        })
    }
    //family and social history
    $(document).on('click','.add_family_questions',function(){
        $('#family_and_social_history').append(family_history);
        $('.familyquestions').select2({width:'100%',placeholder:'Select'})
    })

    $(document).on('click','.remove_family_questions',function(){
        if($('.remove_family_questions').length > 1){
            $(this).closest('.familyhistoryrows').remove();
        }
    })
    //vitals
    $(document).on('click','.add_vitals',function(){
        $('#vital_assessments').append(vitals);
        $('.vitalquestions').select2({width:'100%',placeholder:'Select'})
    })

    $(document).on('click','.remove_vitals',function(){
        if($('.vitalquestions').length > 1){
            $(this).closest('.vitalrows').remove();
        }
    })
    //provisional diagnosis
    $(document).on('click','.add_provisions',function(){
        $('#provision_assessments').append(provisional);
        $('.provisions,.required_test').select2({width:'100%',placeholder:'Select'})
    })

    $(document).on('click','.remove_provisions',function(){
        if($('.provisions').length > 1){
            $(this).closest('.provisionrows').remove();
        }
    })
    //system review
    $(document).on('click','.add_reviews',function(){
        $('#system_review').append(reviews);
        $('.reviewcategories,.reviewoptions').select2({width:'100%',placeholder:'Select'})
    })

    $(document).on('click','.remove_reviews',function(){
        if($('.remove_reviews').length > 1){
            $(this).closest('.systemreviewrows').remove();
        }
    })
     
</script>
<script>
    $(document).on('click','.next',function(){
        let menu = $(this).closest('.pane').next().attr('id')
        $('.pane').removeClass('showit')
        $(this).closest('.pane').next().addClass('showit')
        $('ul.assessment_menus li').removeClass('active');
        $('li.'+menu).addClass('active');
    })
    $(document).on('click','.previous',function(){
        let menu = $(this).closest('.pane').prev().attr('id')
        $('.pane').removeClass('showit')
        $(this).closest('.pane').prev().addClass('showit')
        $('ul.assessment_menus li').removeClass('active');
        $('li.'+menu).addClass('active');
        
    })
</script>

@endpush