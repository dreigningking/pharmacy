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
                                <li class="vitals">
                                    <a href="javascript:void(0)" >
                                        <i class="fas fa-thermometer-half"></i>
                                        <span>Vitals</span>
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
                                                <div class="form-group">
                                                    <label>Select Complaints </label>
                                                    <select name="complaints[]" id="select_complaints" class="" multiple>
                                                        @foreach ($complaints as $complain)
                                                            <option value="{{$complain->description}}">{{$complain->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="d-flex justify-content-around">
                                                    <button type="submit" class="btn btn-info btn-block"> <i class="fa fa-medkit"></i> Begin Assessment </button>   
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
    var patient = @json($patient);
    if(patient){
        console.log(patient)
        $('#selectpatient').trigger('change');
        setPatient(patient.name,patient.emr,patient.mobile,patient.email,patient.age,patient.gender,patient.bloodgroup,patient.genotype);
        $('.result,.call-footer').show();
    }

    function setPatient(name,emr,phone,email,age,gender,bloodgroup,genotype){
        $('#patient_name').text(name)
        $('#patient_emr').text(emr)
        $('#patient_phone').text(phone)
        $('#patient_email').text(email)
        $('#patient_age_gender').text(age +' Years, '+gender)
        $('#patient_bloodgroup').text(bloodgroup)
        $('#patient_genotype').text(genotype)
        $('.result,.call-footer').show(); 
    }

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
        let name = data.element.dataset.name;
        let emr = data.element.dataset.emr;
        let phone = data.element.dataset.phone;
        let email = data.element.dataset.email;
        let age = data.element.dataset.age;
        let gender = data.element.dataset.gender;
        let bloodgroup = data.element.dataset.bloodgroup;
        let genotype = data.element.dataset.genotype;
        setPatient(name,emr,phone,email,age,gender,bloodgroup,genotype);
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

     
</script>


@endpush