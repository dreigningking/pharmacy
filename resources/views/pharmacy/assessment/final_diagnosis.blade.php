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
                        @include('pharmacy.assessment.menu')
                    </div>
                </div>
                <!-- /Profile Sidebar -->
            
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('pharmacy.assessments.final_diagnosis_store', $pharmacy)}}" class="w-100" method="POST">@csrf
                            <input type="hidden" name="assessment_id" value="{{$assessment->id}}">
                            <input type="hidden" name="patient_id" value="{{$assessment->patient_id}}">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Final Diagnosis</h4>
                                </div>
                                <div class="card-body">
                                    <div id="diagnosis_area">
                                        @foreach ($assessment->finalDiagnoses as $finalDiagnosis)
                                            <div class="row diagnosisrows">
                                                <div class="col-md-3 form-group">
                                                    <label>Condition</label>
                                                    <select class="form-control diagnosis_condition" name="conditions[]">
                                                        <option value=""></option>
                                                        @foreach ($conditions as $condition)
                                                        <option value="{{$condition->id}}" data-outcomes="{{str_replace('[','',str_replace(']','',$condition->treatment_outcome))}}"
                                                            @if($condition->id == $finalDiagnosis->condition_id) selected @endif>{{$condition->description}}</option> 
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-5 form-group">
                                                    <label>Expected Outcome</label>
                                                    <select class="form-control expected_outcome" name="expected_outcome[]" >
                                                        <option>{{$finalDiagnosis->expected_outcome}}</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-2">
                                                    <label class="d-block">Achieved?</label> 
                                                    <select class="form-control" name="achieved[{{$loop->index}}]">
                                                        <option value=""></option>
                                                        <option value="yes" @if($finalDiagnosis->achieved == 'yes') selected @endif>Yes</option>
                                                        <option value="no" @if($finalDiagnosis->achieved == 'no') selected @endif>No</option>
                                                    </select>
                                                    
                                                </div>
                                                <div class="col-md-1">
                                            
                                                    <div class="form-group">
                                                        <label class="mt-3"></label>
                                                        <div class="d-flex">
                                                            <button type="button" class="btn btn-sm btn-info add_final mx-1" title="add more"><i class="fa fa-plus"></i></button>
                                                            <button type="button" class="btn btn-sm btn-danger remove_final " title="remove more"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                            <div class="row diagnosisrows">
                                                <div class="col-md-3 form-group">
                                                    <label>Condition</label>
                                                    <select class="form-control diagnosis_condition" name="conditions[]">
                                                        <option value=""></option>
                                                        @foreach ($conditions as $condition)
                                                            <option value="{{$condition->id}}" data-outcomes="{{str_replace("'",'',str_replace('[','',str_replace(']','',$condition->treatment_outcome)))}}">{{$condition->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-5 form-group">
                                                    <label>Expected Outcome</label>
                                                    <select class="form-control expected_outcome" name="expected_outcome[]" >
                                                        
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-2">
                                                    <label class="d-block">Achieved?</label> 
                                                    <select class="form-control" name="achieved[]">
                                                        <option value=""></option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                    
                                                </div>
                                                <div class="col-md-1">
                                            
                                                    <div class="form-group">
                                                        <label class="mt-3"></label>
                                                        <div class="d-flex">
                                                            <button type="button" class="btn btn-sm btn-info add_final mx-1" title="add more"><i class="fa fa-plus"></i></button>
                                                            <button type="button" class="btn btn-sm btn-danger remove_final " title="remove more"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="call-foot">
                                                <div class="d-flex justify-content-between">
                                                    <button type="submit" name="prescription" value="0" class="btn btn-dark"> Save and Exit</button>   
                                                    <button type="submit" name="prescription" value="1" class="btn btn-info next"><i class="fa fa-arrow-right"></i> Save & Give Prescription</button>   
                                                    
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
    var diagnosis;
    $(document).ready(function(){
        diagnosis = $('.diagnosisrows').last().prop("outerHTML");
        $('.diagnosis_condition').select2({width:'100%',placeholder:'Select'});
    })
    //family and social history
    $(document).on('click','.add_final',function(){
        $('#diagnosis_area').append(diagnosis);
        $('.diagnosis_condition').select2({width:'100%',placeholder:'Select'})
        //resetFamilyHistory()
    })

    $(document).on('click','.remove_final',function(){
        if($('.remove_final').length > 1){
            $(this).closest('.diagnosisrows').remove();
        }
        //resetFamilyHistory()
    })
    /*
    function resetFamilyHistory(){
        $('.diagnosisrows').each(function(outer){
            $(this).find('.custom-control-input').each(function(inde,val){
                $(this).attr('id',outer+'past'+inde)
                $(this).attr('name','achieved['+outer+']')
            })
            $(this).find('.custom-control-label').each(function(ind,va){
                $(this).attr('for',outer+'past'+ind)
            })
        })
    }*/

    $(document).on('select2:select','.diagnosis_condition',function(e){
        var data = e.params.data;
        let outcomes = data.element.dataset.outcomes;
        console.log(outcomes)
        let options = '';
        outcomes.split(",").forEach(function(value){
            options += `<option value="${value}">${value}</option>`
        })
        $(this).closest('.diagnosisrows').find('.expected_outcome').append(options)
    })
    
</script>


@endpush