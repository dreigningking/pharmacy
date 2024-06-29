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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                        <form action="{{route('pharmacy.assessments.vitals_store', $pharmacy)}}" class="w-100" method="POST">@csrf
                            <input type="hidden" name="assessment_id" value="{{$assessment->id}}">
                            <input type="hidden" name="patient_id" value="{{$assessment->patient_id}}">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Vitals</h4>
                                </div>
                                <div class="card-body">
                                    <div id="vital_assessments">
                                        @foreach ($assessment->vitals as $eVital)
                                            <div class="row vitalrows mb-4">
                                                <div class="col-md-3">
                                                    <select class="form-control vitalquestions" name="vitals[]" >
                                                        <option value=""></option>
                                                        @foreach ($vitals as $vital)
                                                            <option value="{{$vital->id}}" data-inputs="{{$vital->inputs}}" @if($eVital->vital_id == $vital->id) selected @endif>{{$vital->type}} ({{$vital->unit}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2 answer_a">
                                                    <input type="number" step="0.1" class="form-control" name="answers_a[]"  value="{{$eVital->value_a}}" placeholder="Result 1">
                                                </div>
                                                
                                                <div class="col-md-2 answer_b" @if(!$eVital->value_b) style="display:none" @endif>
                                                    <input type="number" step="0.1" class="form-control" name="answers_b[]" value="{{$eVital->value_b}}" placeholder="Result 2">
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="comments[]" value="{{$eVital->comment}}" placeholder="Comment">
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="javascript:void(0);" class="btn btn-primary add_vitals ml-2"> <i class="fa fa-plus-circle"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-danger remove_vitals ml-2"> <i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="row vitalrows mb-4">
                                            <div class="col-md-3">
                                                <select class="form-control vitalquestions" name="vitals[]" >
                                                    <option value=""></option>
                                                    @foreach ($vitals as $vital)
                                                        <option value="{{$vital->id}}" data-inputs="{{$vital->inputs}}">{{$vital->type}} ({{$vital->unit}})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2 answer_a">
                                                <input type="number" class="form-control" name="answers_a[]"  placeholder="Result">
                                            </div>
                                            <div class="col-md-2 answer_b" style="display: none">
                                                <input type="number" class="form-control" name="answers_b[]" placeholder="Result 2">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="comments[]" placeholder="Comment">
                                            </div>
                                            <div class="col-md-2">
                                                <a href="javascript:void(0);" class="btn btn-primary add_vitals ml-2"> <i class="fa fa-plus-circle"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-danger remove_vitals ml-2"> <i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="call-foot">
                                                <div class="d-flex justify-content-between">
                                                    <button type="submit" class="btn btn-dark">  Save</button>   
                                                    <a href="{{route('pharmacy.assessments.medical_medication',[$pharmacy,$assessment])}}" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Go to Medical & Medication History  </a>   
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
    var vitals;
    $(document).ready(function(){
        vitals = $('.vitalrows').last().prop("outerHTML");
        $('.vitalquestions').select2({width:'100%',placeholder:'Select'});
    })
    
    $(document).on('click','.add_vitals',function(){
        $('#vital_assessments').append(vitals);
        $('.vitalquestions').select2({width:'100%',placeholder:'Select'})
    })

    $(document).on('click','.remove_vitals',function(){
        if($('.vitalquestions').length > 1){
            $(this).closest('.vitalrows').remove();
        }
    })
    $(document).on('select2:select','.vitalquestions',function(e){
        var data = e.params.data;
        let inputs = data.element.dataset.inputs;
        $(this).closest('.vitalrows').find('.answer_a input').attr('required',true);
        if(inputs > 1){
            $(this).closest('.vitalrows').find('.answer_a input').attr('placeholder','Result 1');
            $(this).closest('.vitalrows').find('.answer_b input').attr('required',true);
            $(this).closest('.vitalrows').find('.answer_b').show();
        }else {
            $(this).closest('.vitalrows').find('.answer_a input').attr('placeholder','Result');
            $(this).closest('.vitalrows').find('.answer_b').hide();
        }
    })
    
     
</script>


@endpush