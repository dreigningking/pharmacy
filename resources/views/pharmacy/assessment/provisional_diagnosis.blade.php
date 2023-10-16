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
                        <form action="{{route('pharmacy.assessments.provisional_diagnosis_store', $pharmacy)}}" class="w-100" method="POST">@csrf
                            <input type="hidden" name="assessment_id" value="{{$assessment->id}}">
                            <input type="hidden" name="patient_id" value="{{$assessment->patient_id}}">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Provisional Diagnosis</h4>
                                </div>
                                <div class="card-body">
                                    <div id="provision_assessments">
                                        @foreach ($assessment->provisionalDiagnosis as $diagnosis)
                                            <div class="row provisionrows mb-4">
                                                <div class="col-md-5">
                                                    <label>Diagnosis</label>
                                                    <select class="form-control provisions" name="conditions[]">
                                                        <option value=""></option>
                                                        @foreach ($conditions as $condition)
                                                            <option value="{{$condition->id}}" @if($condition->id == $diagnosis->condition_id) selected @endif>{{$condition->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                    <label>Required Investigation</label>
                                                    <select class="form-control required_test" multiple name="laboratory_tests[][]">
                                                        <option value=""></option>
                                                        @foreach ($labtests as $labtest)
                                                            <option value="{{$labtest->id}}" @if(in_array($labtest->id,$diagnosis->laboratory_tests)) selected @endif>{{$labtest->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                                    <a href="javascript:void(0);" class="btn btn-primary add_provisions ml-2"> <i class="fa fa-plus-circle"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-danger remove_provisions ml-2"> <i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="row provisionrows mb-4">
                                            <div class="col-md-5">
                                                <label>Diagnosis</label>
                                                <select class="form-control provisions" name="conditions[]">
                                                    <option value=""></option>
                                                    @foreach ($conditions as $condition)
                                                        <option value="{{$condition->id}}">{{$condition->description}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <label>Required Investigation</label>
                                                <select class="form-control required_test" multiple name="laboratory_tests[][]">
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
                                                    <button type="submit" class="btn btn-dark">  Save</button>     
                                                    <a href="{{route('pharmacy.assessments.laboratory_test',[$pharmacy,$assessment])}}" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Laboratory Test  </a>   
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
        
        provisional = $('.provisionrows').last().prop("outerHTML");
        reviews = $('.systemreviewrows').last().prop("outerHTML");
        $('.provisions,.required_test').select2({width:'100%',placeholder:'Select'});
    })
   
    //provisional diagnosis
    $(document).on('click','.add_provisions',function(){
        $('#provision_assessments').append(provisional);
        $('.provisions,.required_test').select2({width:'100%',placeholder:'Select'})
        resetProvision()
    })

    $(document).on('click','.remove_provisions',function(){
        if($('.provisions').length > 1){
            $(this).closest('.provisionrows').remove();
        }
        resetProvision()
    })

    function resetProvision(){
        $('.required_test').each(function(ind,va){
            $(this).attr('name','laboratory_tests['+ind+'][]')
        })
    }
    
     
</script>


@endpush