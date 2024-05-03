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
                        <li class="breadcrumb-item active" aria-current="page">Assessment</li>
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
                        @include('pharmacy.assessment.menu')
                    </div>
                </div>
                <!-- /Profile Sidebar -->
            
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('pharmacy.assessments.medical_medication_store', $pharmacy)}}" class="w-100" method="POST">@csrf
                            <input type="hidden" name="assessment_id" value="{{$assessment->id}}">
                            <input type="hidden" name="patient_id" value="{{$assessment->patient_id}}">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Medical & Medication History</h4>
                                </div>
                                <div class="card-body">
                                    <div id="past_histories">
                                        @forelse ($assessment->patient->medicalHistory->sortBy('start') as $key => $medHistory)
                                        <div class="row py-4 past_history border-bottom">
                                            <div class="col-md-4">
                                                <label class="text-muted text-center">Medical Condition</label>                                        
                                                <select name="conditions[]" class="selectcondition form-control">
                                                    <option value=""></option>
                                                    @foreach ($conditions as $condition)
                                                        <option value="{{$condition->id}}" @if($medHistory->condition_id == $condition->id) selected @endif>{{$condition->description}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                            <div class="col-md-3">
                                                <label class="text-muted text-center">Start</label>    
                                                <div class="input-group">
                                                    <input type="month" value="{{$medHistory->start->isoFormat('YYYY-MM')}}" name="condition_start[]" placeholder="Year. e.g 2023" class="form-control">
                                                </div>                                    
                                            </div>
                                            <div class="col-md-3">
                                                <label class="text-muted text-center">End</label>    
                                                <div class="input-group">
                                                    <input type="month" value="{{$medHistory->end->isoFormat('YYYY-MM')}}" name="condition_end[]" placeholder="Year. e.g 2023" class="form-control">
                                                </div>                                    
                                            </div>
                                            <div class="col-md-2">
                                                <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                                <button type="button" class="btn btn-primary add_past_history" title="add more"><i class="fa fa-plus"></i></button>
                                                <button type="button" class="btn btn-danger remove_past_history" title="remove"><i class="fa fa-trash"></i></button>
                                            </div>
                                            <!-- medication -->
                                            <div class="col-md-12 mt-3 past_medications">
                                                @forelse ($medHistory->medications as $key2 => $medic)
                                                    <div class="row past_medication mb-1">
                                                        <div class="col-md-3 pr-0">
                                                            <label class="text-muted text-center">Medication Used</label> 
                                                            <select name="medications[{{$key}}][]" placeholder="Medication used" class="selectmedication form-control-sm"> 
                                                                <option value=""></option>
                                                                @foreach ($drugs as $drug)
                                                                    <option value="{{$drug->id}}" @if($medic->drug_id == $drug->id) selected @endif>{{$drug->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 pr-0">
                                                            <label class="text-muted ">Start</label>    
                                                            <input type="month" value="{{$medic->start->isoFormat('YYYY-MM')}}" name="medication_start[{{$key}}][]" placeholder="Year. e.g 2023" class="medication_start form-control">                                  
                                                        </div>
                                                        <div class="col-md-2 pr-0">
                                                            <label class="text-muted text-center">End</label>    
                                                            <input type="month" value="{{$medic->end->isoFormat('YYYY-MM')}}" name="medication_end[{{$key}}][]" placeholder="Year. e.g 2023" class="medication_end form-control">                                   
                                                        </div>
                                                        <div class="col-md-2 pr-0">
                                                            <label class="d-block">Effective?</label> 
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" @if($medic->effective) checked @endif name="medication_effectiveness[{{$key}}][{{$key2}}]" id="effective{{$key}}_{{$key2}}a" value="1" class="custom-control-input">
                                                                <label class="custom-control-label" for="effective{{$key}}_{{$key2}}a">yes</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" @if(!$medic->effective) checked @endif name="medication_effectiveness[{{$key}}][{{$key2}}]" id="effective{{$key}}_{{$key2}}b" value="0" class="custom-control-input">
                                                                <label class="custom-control-label" for="effective{{$key}}_{{$key2}}b">no</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="d-block pt-3"></label>
                                                            <button type="button" class="btn btn-sm btn-info add_past_medication" title="add more"><i class="fa fa-plus"></i></button>
                                                            <button type="button" class="btn btn-sm btn-danger remove_past_medication" title="add more"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                        
                                                    </div>
                                                @empty
                                                <div class="row past_medication mb-1">
                                                    <div class="col-md-3 pr-0">
                                                        <label class="text-muted text-center">Medication Used</label> 
                                                        <select name="medications[{{$key}}][]" placeholder="Medication used" class="selectmedication form-control-sm"> 
                                                            <option value=""></option>
                                                            @foreach ($drugs as $drug)
                                                                <option value="{{$drug->id}}">{{$drug->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 pr-0">
                                                        <label class="text-muted ">Start</label>    
                                                        <input type="month" name="medication_start[{{$key}}][]" placeholder="Year. e.g 2023" class="medication_start form-control">                                  
                                                    </div>
                                                    <div class="col-md-2 pr-0">
                                                        <label class="text-muted text-center">End</label>    
                                                        <input type="month" name="medication_end[{{$key}}][]" placeholder="Year. e.g 2023" class="medication_end form-control">                                   
                                                    </div>
                                                    <div class="col-md-2 pr-0">
                                                        <label class="d-block">Effective?</label> 
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio"  name="medication_effectiveness[{{$key}}][]" value="1" id="effective{{$key}}a" class="custom-control-input">
                                                            <label class="custom-control-label" for="effective{{$key}}a">yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="medication_effectiveness[{{$key}}][]" value="0" id="effective{{$key}}b" class="custom-control-input">
                                                            <label class="custom-control-label" for="effective{{$key}}b">no</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="d-block pt-3"></label>
                                                        <button type="button" class="btn btn-sm btn-info add_past_medication" title="add more"><i class="fa fa-plus"></i></button>
                                                        <button type="button" class="btn btn-sm btn-danger remove_past_medication" title="add more"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    
                                                </div>
                                                @endforelse
                                            </div>
                                        </div>
                                        @empty
                                        <div class="row py-4 past_history border-bottom">
                                            <div class="col-md-4">
                                                <label class="text-muted text-center">Medical Condition</label>                                        
                                                <select name="conditions[]" placeholder="Condition name" class="selectcondition form-control">
                                                    <option value=""></option>
                                                    @foreach ($conditions as $condition)
                                                        <option value="{{$condition->id}}">{{$condition->description}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                            <div class="col-md-3">
                                                <label class="text-muted text-center">Start</label>    
                                                <div class="input-group">
                                                    <input type="month" name="condition_start[]" placeholder="Year. e.g 2023" class="form-control">
                                                </div>                                    
                                            </div>
                                            <div class="col-md-3">
                                                <label class="text-muted text-center">End</label>    
                                                <div class="input-group">
                                                    <input type="month" name="condition_end[]" placeholder="Year. e.g 2023" class="form-control">
                                                </div>                                    
                                            </div>
                                            <div class="col-md-2">
                                                <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                                    <button type="button" class="btn btn-primary add_past_history" title="add more"><i class="fa fa-plus"></i></button>
                                                    <button type="button" class="btn btn-danger remove_past_history" title="remove"><i class="fa fa-trash"></i></button>
                                            </div>
                                            <!-- medication -->
                                            <div class="col-md-12 mt-3 past_medications">
                                                <div class="row past_medication mb-1">
                                                    <div class="col-md-3 pr-0">
                                                        <label class="text-muted text-center">Medication Used</label> 
                                                        <select name="medications[][]" placeholder="Medication used" class="selectmedication form-control-sm"> 
                                                            <option value=""></option>
                                                            @foreach ($drugs as $drug)
                                                                <option value="{{$drug->id}}">{{$drug->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 pr-0">
                                                        <label class="text-muted ">Start</label>    
                                                        <input type="month" name="medication_start[][]" placeholder="Year. e.g 2023" class="medication_start form-control">                                  
                                                    </div>
                                                    <div class="col-md-2 pr-0">
                                                        <label class="text-muted text-center">End</label>    
                                                        <input type="month" name="medication_end[][]" placeholder="Year. e.g 2023" class="medication_end form-control">                                   
                                                    </div>
                                                    <div class="col-md-2 pr-0">
                                                        <label class="d-block">Effective?</label> 
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="abc" name="medication_effectiveness[][]" value="1" class="custom-control-input">
                                                            <label class="custom-control-label" for="abc">yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="abcs" name="medication_effectiveness[][]" value="0" class="custom-control-input">
                                                            <label class="custom-control-label" for="abcs">no</label>
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
                                        @endforelse
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            
                                            <div class="call-foot">
                                                <div class="d-flex justify-content-between">
                                                    
                                                    <button type="submit" class="btn btn-dark">  Save</button>   
                                                    <a href="{{route('pharmacy.assessments.family_history',[$pharmacy,$assessment])}}" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Family History  </a>   
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
    var past_medical_history,past_medication;
    $(document).ready(function(){
        past_medical_history = $('.past_history').last().prop("outerHTML");
        past_medication = $('.past_medication').last().prop("outerHTML");
        
        $('.selectcondition,.selectmedication').select2({width:'100%',placeholder:'Select'});
    })

    //medical and medication history
    $(document).on('click','.add_past_history',function(){
        $('#past_histories').append(past_medical_history);
        resetPastMedicationAttributes()
    })
    $(document).on('click','.add_past_medication',function(){
        $(this).closest('.past_medications').append(past_medication);
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
            console.log(outer)
            // $(this).find('.selectmedication').attr('name','medications['+outer+'][]')

            $(this).find('.past_medication').each(function(inner){
                $(this).find('.selectmedication').attr('name','medications['+outer+']['+inner+']')
                $(this).find('.medication_start').attr('name','medication_start['+outer+']['+inner+']')
                $(this).find('.medication_end').attr('name','medication_end['+outer+']['+inner+']')
                $(this).find('.custom-control-input').attr('name','medication_effectiveness['+outer+']['+inner+']')
                
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
    
</script>

@endpush