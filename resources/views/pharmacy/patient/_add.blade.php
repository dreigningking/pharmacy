@extends('layouts.main.app')
@push('styles')
<style>
    .select2-container .select2-selection--single{
        height:46px;
        border:1px solid #ced4da;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 40px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        position:absolute;
        top: 10px!important;
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
                    <div class="dashboard-widget">
                        <nav class="dashboard-menu">
                            <ul class="nav nav-tabs d-block">
                                <li>
                                    <a href="#basic" class="active" data-toggle="tab">
                                        <i class="fas fa-columns"></i>
                                        <span>Basic Information</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#past_med_history" data-toggle="tab">
                                        <i class="fas fa-user-injured"></i>
                                        <span>Past Medical History</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#current_med_history" data-toggle="tab">
            
                                        <i class="fas fa-pen"></i>
                                        <span>Current Medical History</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#family_social_history" data-toggle="tab">
                                        <i class="fas fa-user"></i>
                                        <span>Family & Social History</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tab-content pt-0">
                            <div class="tab-pane fade show active" id="basic">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Basic Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('pharmacy.patients.store', $pharmacy)}}" class="w-100" method="POST">@csrf
                                            <div class="row w-100">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Full Name</label>
                                                        <input type="text" class="form-control" name="first_name">
                                                    </div>
                                                </div>                         
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control" name="mobile">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Age</label>
                                                        <input type="number" min="1" class="form-control" name="age_today">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group ">
                                                        <label class="form-label">Gender</label>
                                                        <select class="form-control" id="gender" name="gender">
                                                            <option value="female">Female</option>
                                                            <option value="male">Male</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Address <small>(optional)</small></label>
                                                        <input type="text" class="form-control" name="address">
                                                    </div>
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="form-label">Genotype</label>
                                                        <select class="form-control" id="genotype" name="genotype">
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
                                                        <select class="form-control" id="bloodtype" name="bloodtype">
                                                            <option value="female">A+</option>
                                                            <option value="male">B+</option>
                                                            <option value="male">O+</option>
                                                            <option value="male">O-</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mt-2">
                                                        
                                                        <button type="reset" class="btn btn-md btn-danger">Reset</button>
                                                        <button type="submit" class="btn btn-md btn-info" name="action" value="save">Save & Begin Assessment </button>
                                                        <button type="submit" class="btn btn-md btn-primary" name="action" value="assessment">Save & Begin Prescription</button>
                                                        <button type="submit" class="btn btn-md btn-dark" name="action" value="prescription">Past Medical History  <i class="fa fa-arrow-right"></i></button>
                                                        
                                                    </div>
                                                </div> 
        
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                            <div class="tab-pane fade" id="past_med_history">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Past Medical History</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="#" class="w-100" method="POST">@csrf
                                            <div class="row w-100">
                                                <div class="col-12">
                                                    <div class="row my-4 condition">
                                                        <div class="col-md-5">
                                                            <div class="form-group">  
                                                                <label class="text-muted text-center">Previous Medical Condition</label>                                        
                                                                <select name="previous_history['condition']" placeholder="Condition name" class="select form-control">
                                                                    @foreach ($conditions as $condition)
                                                                        <option value="{{$condition->id}}">{{$condition->description}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">  
                                                                <label class="text-muted text-center">When did it happen</label>    
                                                                <div class="input-group">
                                                                    <input type="month" name="previous_history['year']" placeholder="Year. e.g 2023" class="form-control">
                                                                </div>                                    
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                                                <button type="button" class="btn btn-primary add_condition" title="add more"><i class="fa fa-plus"></i></button>
                                                        </div>
                                                        <div class="col-md-12 medications">
                                                            <div class="row med mb-1">
                                                                <div class="col-md-4">
                                                                    <select name="previous_history['medicine']" placeholder="Medication used" class="select form-control-sm"> 
                                                                        @foreach ($medicines as $medicine)
                                                                            <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 pt-2">
                                                                    <label for="d-block">Effective?</label>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="yes" name="previous_history['medicine_effectiveness']" value="custom_price" class="custom-control-input">
                                                                        <label class="custom-control-label" for="yes">Yes</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="no" name="previous_history['medicine_effectiveness']" value="custom_price" class="custom-control-input">
                                                                        <label class="custom-control-label" for="no">No</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <button type="button" class="btn btn-sm btn-info add_medication" title="add more"><i class="fa fa-plus"></i></button>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group mt-2">
                                                        <br>
                                                        
                                                        <button type="submit" class="btn btn-md btn-info" name="action" value="save">Save </button>

                                                        <button type="submit" class="btn btn-md btn-dark" name="action" value="prescription">Current Medical History  <i class="fa fa-arrow-right"></i></button>
   
                                                    </div>
                                                </div> 
        
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="current_med_history">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Current Medical History</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="#" class="w-100" method="POST">@csrf
                                            <div class="row w-100">
                                                <div class="col-12">
                                                    <div class="row my-4 condition">
                                                        <div class="col-md-4">
                                                            <div class="form-group">  
                                                                <label class="text-muted text-center">Medical Condition</label>                                        
                                                                <input type="text" name="medical_history" placeholder="Condition name" class=" form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">  
                                                                <label class="text-muted text-center">How Long</label>    
                                                                <div class="input-group">
                                                                    <input type="number" name="duration[]" placeholder="1" class="form-control">
                                                                    <div class="input-group-append">
                                                                        <select class="form-control" name="duration_type[]">
                                                                            <option>Days</option>
                                                                            <option>Weeks</option>
                                                                            <option>Months</option>
                                                                            <option>Years</option>
                                                                        </select>
                                                                    </div>
                                                                </div>                                    
                                                                
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
                                                        <button type="reset" class="btn btn-md btn-danger">Reset</button>
                                                        <button type="submit" class="btn btn-md btn-info" name="action" value="save">Save & Record Medical History</button>
                                                        <button type="submit" class="btn btn-md btn-primary" name="action" value="assessment">Save & Begin Assessment</button>
                                                        <button type="submit" class="btn btn-md btn-dark" name="action" value="prescription">Save & Begin Prescription</button>
                                                        
                                                    </div>
                                                </div> 
        
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="family_social_history">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Family & Social History</h4>
                                    </div>
                                    <div class="card-body physical-assessment">
                                        <div class="row physical">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <select class="form-control w-100 select" id="family_history" name="history[]">
                                                        <option value="alcohol">Do You Take Alcohol</option>
                                                        <option value="headache">Has Anyone in your family suffered headache</option>
                                                        <option value="pee">Do you pee in your bed</option>
                                                        <option value="smoke">Do you smoke</option>
                                                        
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
                                                    <a href="javascript:void(0);" class="btn btn-primary add-physical ml-2">
                                                        <i class="fa fa-plus-circle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                        </div>
                    </div>
                    <!-- /Page Wrapper -->
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /Page Content -->

@endsection
@push('scripts')
    <script>
        $(document).on('click',".add_condition", function() {
            
            var condition = ` 
                                <div class="row my-4 condition">
                                    <div class="col-md-5">
                                        <div class="form-group">  
                                            <label class="text-muted text-center">Previous Medical Condition</label>                                        
                                            <select name="previous_history['condition']" placeholder="Condition name" class="select form-control">
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">  
                                            <label class="text-muted text-center">When did it happen</label>    
                                            <div class="input-group">
                                                <input type="month" name="previous_history['year']" placeholder="Year. e.g 2023" class="form-control">
                                            </div>                                    
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                            <button type="button" class="btn btn-primary add_condition" title="add more"><i class="fa fa-plus"></i></button>
                                    </div>
                                    <div class="col-md-12 medications">
                                        <div class="row med mb-1">
                                            <div class="col-md-4">
                                                <select name="previous_history['medicine']" placeholder="Medication used" class="select form-control-sm"> 
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-3 pt-2">
                                                <label for="d-block">Effective?</label>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="yes" name="previous_history['medicine_effectiveness']" value="custom_price" class="custom-control-input">
                                                    <label class="custom-control-label" for="yes">Yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="no" name="previous_history['medicine_effectiveness']" value="custom_price" class="custom-control-input">
                                                    <label class="custom-control-label" for="no">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-sm btn-info add_medication" title="add more"><i class="fa fa-plus"></i></button>
                                                <button type="button" class="btn btn-sm btn-danger remove_medication" title="remove"><i class="far fa-trash-alt"></i></button>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            `;

            $("#medical_conditions").append(condition);
        });
        $(document).on('click',".add_medication", function() {
            var medication = ` 
                                <div class="col-md-12 medications">
                                    <div class="row med mb-1">
                                        <div class="col-md-4">
                                            <select name="previous_history['medicine']" placeholder="Medication used" class="select form-control-sm"> 
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-3 pt-2">
                                            <label for="d-block">Effective?</label>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="yes" name="previous_history['medicine_effectiveness']" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="yes">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="no" name="previous_history['medicine_effectiveness']" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="no">No</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-sm btn-info add_medication" title="add more"><i class="fa fa-plus"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger remove_medication" title="remove"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                        
                                    </div>
                                    
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