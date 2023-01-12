@extends('layouts.main.app')
@push('styles')

<style>
    .select2-container .select2-selection--single{
        height:40px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 35px;
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
                                        <span>Past Medical History</span>
                                    </a>
                                </li>
                                <li class="current_medical_history">
                                    <a href="javascript:void(0)" >
                                        <i class="fas fa-file-medical-alt"></i>
                                        <span>Current Medical History</span>
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
                                                            @foreach ($pharmacy->patients as $patient)
                                                                <option value="{{$patient->id}}" 
                                                                    @if($pateint && $pateint->id == $patient->id) selected @endif 
                                                                    data-name="{{$patient->name}}" 
                                                                    data-emr="{{$patient->emr}}" 
                                                                    data-phone="{{$patient->mobile}}" 
                                                                    data-email="{{$patient->email}}" 
                                                                    data-age="{{$patient->age}}" 
                                                                    data-gender="{{$patient->gender}}" 
                                                                    data-bloodgroup="{{$patient->bloodgroup}}" 
                                                                    data-genotype="{{$patient->genotype}}">{{$patient->emr}}-{{$patient->name}}</option>
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
                                {{-- <div class="pane " id="complaint">
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
                                                            <a href="javascript:void(0)" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Next  </a>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="pane " id="past_medical_history">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Past Medical History</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="past_histories">
                                                <div class="row my-4 past_history">
                                                    <div class="col-md-5">
                                                        <label class="text-muted text-center">Previous Medical Condition</label>                                        
                                                        <select name="past_history[condition][]" placeholder="Condition name" class="selectcondition form-control">
                                                            <option value=""></option>
                                                            @foreach ($conditions as $condition)
                                                                <option value="{{$condition->id}}">{{$condition->description}}</option>
                                                            @endforeach
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="text-muted text-center">When did it happen</label>    
                                                        <div class="input-group">
                                                            <input type="month" name="past_history[date][]" placeholder="Year. e.g 2023" class="form-control">
                                                        </div>                                    
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                                            <button type="button" class="btn btn-primary add_past_history" title="add more"><i class="fa fa-plus"></i></button>
                                                            <button type="button" class="btn btn-danger remove_past_history" title="remove"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    <div class="col-md-12" id="past_medications">
                                                        <div class="row past_medication mb-1">
                                                            <div class="col-md-4">
                                                                <label class="text-muted text-center">Medication Used</label> 
                                                                <select name="past_history[medication][][]" placeholder="Medication used" class="selectmedication form-control-sm"> 
                                                                    <option value=""></option>
                                                                    @foreach ($medicines as $medicine)
                                                                        <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 pt-2">
                                                                <label class="d-block pt-3"></label> 
                                                                <label for="d-block">Effective?</label>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="abc" name="past_history[effectiveness][][]" value="1" class="custom-control-input">
                                                                    <label class="custom-control-label" for="abc">Yes</label>
                                                                </div>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="xyz" name="past_history[effectiveness][][]" value="0" class="custom-control-input">
                                                                    <label class="custom-control-label" for="xyz">No</label>
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
                                            <div class="row">
                                                <div class="col-md-7">
                                                    
                                                    <div class="call-foot">
                                                        <div class="d-flex justify-content-between">
                                                            <a href="javascript:void(0)" class="btn btn-primary previous"> <i class="fa fa-arrow-left"></i> Previous  </a>   
                                                            <a href="javascript:void(0)" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Next  </a>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pane " id="current_medical_history">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Current Medical History</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="current_histories">
                                                <div class="row my-4 current_history">
                                                    <div class="col-md-5">
                                                        <label class="text-muted text-center">Previous Medical Condition</label>                                        
                                                        <select name="current_history[condition][]" placeholder="Condition name" class="selectcondition form-control">
                                                            <option value=""></option>
                                                            @foreach ($conditions as $condition)
                                                                <option value="{{$condition->id}}">{{$condition->description}}</option>
                                                            @endforeach
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="text-muted text-center">When did it happen</label>    
                                                        <div class="input-group">
                                                            <input type="month" name="current_history[date][]" placeholder="Year. e.g 2023" class="form-control">
                                                        </div>                                    
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                                            <button type="button" class="btn btn-primary add_current_history" title="add more"><i class="fa fa-plus"></i></button>
                                                            <button type="button" class="btn btn-danger remove_current_history" title="remove"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    <div class="col-md-12" id="current_medications">
                                                        <div class="row current_medication mb-1">
                                                            <div class="col-md-4">
                                                                <label class="text-muted text-center">Medication Used</label> 
                                                                <select name="current_history[medication][][]" placeholder="Medication used" class="selectmedication form-control-sm"> 
                                                                    <option value=""></option>
                                                                    @foreach ($medicines as $medicine)
                                                                        <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 pt-2">
                                                                <label class="d-block pt-3"></label> 
                                                                <label for="d-block">Effective?</label>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="abc" name="current_history[effectiveness][][]" value="1" class="custom-control-input">
                                                                    <label class="custom-control-label" for="abc">Yes</label>
                                                                </div>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="xyz" name="current_history[effectiveness][][]" value="0" class="custom-control-input">
                                                                    <label class="custom-control-label" for="xyz">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="d-block pt-3"></label>
                                                                <button type="button" class="btn btn-sm btn-info add_current_medication" title="add more"><i class="fa fa-plus"></i></button>
                                                                <button type="button" class="btn btn-sm btn-danger remove_current_medication" title="add more"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    
                                                    <div class="call-foot">
                                                        <div class="d-flex justify-content-between">
                                                            <a href="javascript:void(0)" class="btn btn-primary previous"> <i class="fa fa-arrow-left"></i> Previous  </a>   
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
                                                        <input type="text" value="Yes" readonly class="form-control" name="familyhistory[answers][]">
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
                                                        <select class="form-control reviewquestions" name="review[questions][]">
                                                            <option value=""></option>
                                                            @foreach ($reviews as $review)
                                                                <option>{{$review->description}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text" value="Yes" readonly class="form-control" name="review[answers][]">
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
                                                            <a href="javascript:void(0)" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Next  </a>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="pane " id="provisional_diagnosis">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Provisional Diagnosis</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="provisional_diagnosis" rows="2"  placeholder="What is the patient's complaints"></textarea>
                                                    </div>
                                                    <div class="call-foot">
                                                        <div class="d-flex justify-content-between">
                                                            <a href="javascript:void(0)" class="btn btn-primary previous"> <i class="fa fa-arrow-left"></i> Previous  </a>   
                                                            <a href="javascript:void(0)" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Next  </a>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>{{--
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
                                                            <option value="pregnancy">Pregnancy Test</option>
                                                            <option value="brain_scan">Brain Scan</option>
                                                            <option value="tommy_scan">Tommy Scan</option>
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
                                                            <a href="javascript:void(0)" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Next  </a>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="pane " id="final_diagnosis">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Final Diagnosis</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="final_diagnosis" rows="2" placeholder="What is the patient's complaints"></textarea>
                                                    </div>
                                                    <div class="call-foot">
                                                        <div class="d-md-flex justify-content-between">
                                                            <a href="javascript:void(0)" class="btn btn-primary previous col-md-3"> <i class="fa fa-arrow-left"></i> Previous  </a>   
                                                            <button type="submit" class="btn btn-info col-md-8"> Submit Assessment </button>   
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
    var past_medical_history,current_medical_history,family_history,vitals,reviews;
    $(document).ready(function(){
        past_medical_history = $('.past_history').last().prop("outerHTML");
        past_medication = $('.past_medication').last().prop("outerHTML");
        current_medical_history = $('.current_history').last().prop("outerHTML");
        current_medication = $('.current_medication').last().prop("outerHTML");
        family_history = $('.familyhistoryrows').last().prop("outerHTML");
        vitals = $('.vitalrows').last().prop("outerHTML");
        reviews = $('.systemreviewrows').last().prop("outerHTML");
        $('.selectcondition,.selectmedication,.familyquestions,.vitalquestions,.reviewquestions').select2({width:'100%',placeholder:'Select'});
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
    //past medical history
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
    //current medical history
    $(document).on('click','.add_current_history',function(){
        $('#current_histories').append(current_medical_history);
        resetCurrentMedicationAttributes()
    })
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
    //system review
    $(document).on('click','.add_reviews',function(){
        $('#system_review').append(reviews);
        $('.reviewquestions').select2({width:'100%',placeholder:'Select'})
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