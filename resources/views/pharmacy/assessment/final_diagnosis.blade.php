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
                        <form action="{{route('pharmacy.assessments.system_review_store', $pharmacy)}}" class="w-100" method="POST">@csrf
                            <input type="hidden" name="assessment_id" value="{{$assessment->id}}">
                            <input type="hidden" name="patient_id" value="{{$assessment->patient_id}}">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Final Diagnosis</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label>Condition</label>
                                                    <select class="form-control final_diagnosis" name="condition[]">
                                                        <option value=""></option>
                                                        @foreach ($conditions as $condition)
                                                            <option>{{$condition->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>Expected Outcome</label>
                                                    <select class="form-control expected_outcome" name="expected_outcome[]">
                                                        <option value=""></option>
                                                        @foreach ($labtests as $labtest)
                                                            <option value="{{$labtest->id}}">{{$labtest->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-10">
                                                    
                                                    <div class="form-group">
                                                        <label>Achieved Outcome</label>
                                                        <input type="text" class="form-control" name="comments[]" placeholder="">
                                                    </div>    
                                                </div>
                                                <div class="col-md-2 pr-0">
                                                    <label class="d-block">Achieved?</label> 
                                                    <div class="d-flex">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio"  name="medication_effectiveness[][]" value="1" id="effectivea" class="custom-control-input">
                                                            <label class="custom-control-label" for="effectivea">yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="medication_effectiveness[][]" value="0" id="effectiveb" class="custom-control-input">
                                                            <label class="custom-control-label" for="effectiveb">no</label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-2 px-0">
                                            
                                            <div class="form-group">
                                                <label class="mt-5"></label>
                                                <button type="button" class="btn btn-sm btn-info add_final " title="add more"><i class="fa fa-plus"></i></button>
                                                <button type="button" class="btn btn-sm btn-danger remove_final " title="remove more"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="call-foot">
                                                <div class="d-flex justify-content-between">
                                                    <button type="submit" class="btn btn-dark"> Save</button>   
                                                    <a href="#" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Give Prescriptions  </a>   
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


@endpush