@extends('layouts.main.app')
@push('styles')
<style>
    span.select2-selection.select2-selection--single{
        height:46px;
        /* padding-top:10px;
        padding-bottom:10px; */
        /* width:200px; */
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        top: 10px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height:44px;
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
                <h2 class="breadcrumb-title">Prescription</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title mb-0">Add Prescription</h4>
                    </div> --}}
                    <div class="card-body">
                        <form action="{{route('pharmacy.prescriptions.store',$pharmacy)}}" method="POST">@csrf
                            <div class= "row mb-5">
                                <div class="col-sm-4">
                                    <h4 class="d-block">Patient</h4>
                                    <select name="patient_id" id="patient_id" class="form-control select2" required>
                                        <option value=""></option>
                                        @foreach($patients as $pateint)
                                            <option data-assessment="{{$pateint->assessments}}" value="{{$pateint->id}}" @if($patient && $patient->id == $pateint->id) selected @endif>{{$pateint->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="d-block">Assessment Record</h4>
                                    <select name="assessment_id" data-placeholder="Select Patient Assessment" id="assessment" class="form-control select2">
                                        <option value=""></option>
                                        @if($patient && $patient->assessments->count())
                                            @foreach ($patient->assessments as $assessment)
                                                <option value="{{$assessment->id}}" @if(!$loop->iteration) selected @endif>{{$assessment->summary}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="d-block">Source</h4>
                                    <select name="origin" id="origin" class="form-control" required>
                                        <option selected>Hospital</option>
                                        <option>Pharmacist</option>
                                        <option>Sales Rep</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="user-tabs mb-3">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#billing" data-toggle="tab"> <span>Medication planning</span> </a>
                                    </li> 
                                    <li class="nav-item">
                                        <a class="nav-link" href="#assessments" data-toggle="tab">Check the profile of the patient’s
                                            medications</a>
                                    </li>
                                    
                                </ul>
                            </div>

                            <!-- Contents -->
                            <div class="tab-content">
                                
                                <!-- Prescription Tab -->
                                <div id="billing" class="tab-pane fade show active">
                                    
                                        <div class="card card-table">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center">
                                                        <thead>
                                                            <tr>
                                                                <th style="min-width: 300px">Select patient’s medications</th>
                                                                <th style="min-width: 100px">Quantity Per dose</th>
                                                                <th style="min-width: 100px">Duration</th>
                                                                <th style="min-width: 100px;">Frequency</th>
                                                                <th style="min-width: 80px;">
                                                                    <div class="add-more-item text-right">
                                                                        <a href="javascript:void(0);" id="add_prescription_item"><i class="fas fa-plus-circle"></i> Add Item</a>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="prescription_body">
                                                            <tr class="prescription_row">
                                                                <td>
                                                                    <select class="form-control prescription_inventory" name="drugs[]" required>
                                                                        @foreach($inventories as $inventory)
                                                                            <option></option>
                                                                            <option value="{{$inventory->drug_id}}">{{$inventory->drug->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" type="number" name="quantity[]" required>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" type="number" name="duration[]" placeholder="Number of days" required>
                                                                </td>
                                                                <td>
                                                                    <div class="">
                                                                        <select class="form-control" name="frequency[]" required>
                                                                            <option>1</option>
                                                                            <option>2</option>
                                                                            <option>3</option>
                                                                            <option>4</option>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0);" class="btn bg-danger-light trash remove_prescription_item"><i class="far fa-trash-alt"></i></a>
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row p-4">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Medication Advise</label>
                                                            <select name="" id="" class="form-control select2" multiple>
                                                                <option value="">Take your drugs with food</option>
                                                                <option value="">Complete all the antibiotics</option>
                                                                <option value="">Stop the pain reliever when pain and fever are gone</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Non-Medication Advise</label>
                                                            <select name="" id="" class="form-control select2" multiple>
                                                                <option value="">Avoid Smoke-filled environment</option>
                                                                <option value="">Sleep early</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="submit-section">
                                                            <button type="submit" name="dispense" value="0" class="btn btn-primary submit-btn">Save & Close</button>
                                                            <button type="submit" name="dispense" value="1" class="btn btn-success submit-btn">Save & Dispense <i class="fa fa-arrow-right"></i></button>
                                                            <a href="{{route('pharmacy.prescriptions.index',$pharmacy)}}" class="btn btn-secondary submit-btn">Cancel</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>

                                <!-- Medication Planning Tab -->
                                <div class="tab-pane fade" id="assessments">
                                    
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>API</th>
                                                            <th>Side Effects</th>
                                                            <th>Contraindications</th>
                                                            <th>Lactation Status</th>
                                                            <th>Counsel</th>
                                                            <th>Alternative</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="api_properties">
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-center my-5" id="interaction_button" style="display: none">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#interaction">Check the interaction profile of the patient’s medications</button> 
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
@section('modals')
<div class=" modal fade custom-modal add-modal" id="add_supplier">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Prescription Error
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 d-flex">
                        <div class="card flex-fill">

                            <div class="card-body">
                                <form id="add_supplier_form" method="GET">@csrf
                                   
                                    <input type="hidden" name="pharmacy_id" value="{{$pharmacy->id}}">
                                    <div class="form-group ">
                                        <label class="form-label">Select Error</label>
                                        <select name="email" id="supplier_email" class="form-control">
                                            <option value="">ABCDEFGH</option>
                                            <option value="">YXAALLWEKLKLWE</option>
                                            <option value="">YXAALLWEklwewejkw</option>
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <label class="form-label">Select Intervention</label>
                                        <select name="email" id="supplier_email" class="form-control">
                                            <option value="">ABCDEFGH</option>
                                            <option value="">YXAALLWEKLKLWE</option>
                                            <option value="">YXAALLWEklwewejkw</option>
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <label class="form-label">Select Outcome</label>
                                        <select name="email" id="supplier_email" class="form-control">
                                            <option value="">ABCDEFGH</option>
                                            <option value="">YXAALLWEKLKLWE</option>
                                            <option value="">YXAALLWEklwewejkw</option>
                                        </select>
                                    </div>
                                    

                                    <div class="text-right">
                                        <button type="submit" id="save_supplier" class="btn btn-primary">Submit</button>
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

<div class=" modal fade custom-modal add-modal" id="interaction">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Medication Interaction </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <h2>View Patient's Medication Interaction</h2>
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>API A </th>
                                                <th>API B </th>
                                                <th>Interaction</th>									
                                                <th>Mechanism</th>									
                                                
                                            </tr>     
                                        </thead>
                                        <tbody id="interactions_data">
                                            <tr class="interaction_no">
                                                <td colspan="4">No Interactions</td>
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
@endsection

@push('scripts')
    
<script>
    $('.select2').select2()

    $(document).on('select2:select','#patient_id',function(e){
        // let data = e.params.data;
        // let assess = data.element.dataset.assessment;
        let patient_id = $(this).val();
        getPatientAssessments(patient_id)
        getMedicationApis('new',patient_id,null)

    })
</script>

<script>
    var prescription;
    $(document).ready(function(){
        prescription = $('.prescription_row').last().prop("outerHTML");
        $('.prescription_inventory').select2({width:'100%',placeholder:'Select'});
    })
    $(document).on('click','#add_prescription_item',function(){
        $('#prescription_body').append(prescription);
        $('.prescription_inventory').select2({width:'100%',placeholder:'Select'})
        // resetPastMedicationAttributes()
    })

    $(document).on('click','.remove_prescription_item',function(){
        $(this).closest('.prescription_row').remove();
        // resetPastMedicationAttributes()
        let drugs = [];
        $.each($('.prescription_inventory'),function(index,value){
            drugs.push(value.value)
        })
        getMedicationApis('current',null,drugs)
    })

    $(document).on('select2:select','.prescription_inventory',function(e){
        let drugs = [];
        $.each($('.prescription_inventory'),function(index,value){
            drugs.push(value.value)
        })
        getMedicationApis('current',null,drugs)
    });
    
</script>

<script>
    $(document).on('click','#interaction_button>button',function(){
        let api_ids = []
        $.each($('.api_ids'),function(index,value){
            api_ids.push(value.value)
        })
        $.ajax({
            type:'POST',
            dataType: 'json',
            url: "{{route('getMedicationInteractions')}}",
            data:{
                '_token' : $('meta[name="csrf-token"]').attr('content'),
                'api_ids': api_ids
            },
            success:function(data) {
                $('#interactions_data').children().not('interaction_no').remove()
                if(data.length > 0){
                    $('.interaction_no').hide()
                    $.each(data,function(index,value){
                        let row =  `<tr class="interaction_yes">
                                        <td>${value.base.name}</td>
                                        <td>${value.target.name}</td>
                                        <td>${value.remark}</td>
                                        <td class="text-right"> ${value.mechanism}</td>
                                    </tr>
                                    `
                        $('#interactions_data').append(row)
                    })
                }
            },
            error: function(data) {
                console.log(data);
            }
        });  
    })
</script>

<script>
    function getMedicationApis(type,patient_id,drugs){
        $.ajax({
            type:'POST',
            dataType: 'json',
            url: "{{route('getMedicationApis')}}",
            data:{
                '_token' : $('meta[name="csrf-token"]').attr('content'),
                'patient_id': patient_id,
                'drugs': drugs
            },
            success:function(data) {
                $('#api_properties').children('.'+type).remove()
                if(data.length > 0){
                    $.each(data,function(index,value){
                        let row = `<tr class="${type}">
                                        <td style="white-space:normal"> ${type.toUpperCase()}</td>
                                        <td style="white-space:normal">${value.name}</td> 
                                        <td style="white-space:normal">${value.side_effects}</td> 
                                        <td style="white-space:normal">${value.contraindications}</td> 
                                        <td style="white-space:normal">${value.pregnancy_status}</td> 
                                        <td style="white-space:normal">${value.medication_counsel}</td> 
                                        <td style="white-space:normal">${value.alternatives}</td> 
                                        <input type="hidden" class="api_ids" name="api_ids[]" value="${value.id}">
                                    </tr>`
                        $('#api_properties').append(row)
                    })
                }
                if($('#api_properties').children().length > 0){
                    $('#interaction_button').show()
                }else $('#interaction_button').hide()

            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function getPatientAssessments(patient_id){
        $.ajax({
            type:'POST',
            dataType: 'json',
            url: "{{route('getPatientAssessments')}}",
            data:{
                '_token' : $('meta[name="csrf-token"]').attr('content'),
                'patient_id': patient_id,
            },
            success:function(data) {
                console.log(data)
                $.each(data,function(index,value){
                    let option = `<option value="${value.id}">${value.summary}</option>`
                    $('#assessment').append(option)
                })
                
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
</script>
@endpush
