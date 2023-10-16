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
                        <form action="{{route('pharmacy.assessments.laboratory_test_store', $pharmacy)}}" class="w-100" method="POST">@csrf
                            <input type="hidden" name="assessment_id" value="{{$assessment->id}}">
                            <input type="hidden" name="patient_id" value="{{$assessment->patient_id}}">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Requested Investigation</h4>
                                </div>
                                <div class="card-body">
                                    <div id="labtest">
                                        @if($assessment->patientLaboratoryResults->count())
                                            @foreach ($assessment->patientLaboratoryResults as $labResult)
                                                <div class="row tests">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <select name="tests[]" class="form-control selecttest w-100"> 
                                                                <option value=""></option>
                                                                @foreach ($labtests as $labtest)
                                                                    <option value="{{$labtest->id}}" @if($labtest->id == $labResult->test_id) selected @endif>{{$labtest->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="results[]" value="{{$labResult->result}}" placeholder="Result">
                                                        </div>    
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="comments[]" value="{{$labResult->comment}}" placeholder="Comment">
                                                        </div>    
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-sm btn-info add_test " title="add more"><i class="fa fa-plus"></i></button>
                                                            <button type="button" class="btn btn-sm btn-danger remove_test " title="remove more"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @foreach($assessment->provisionalDiagnosis->pluck('laboratory_tests')->collapse() as $testid)
                                            @if($assessment->patientLaboratoryResults->isEmpty() || !in_array($testid,$assessment->patientLaboratoryResults->pluck('test_id')->toArray()))
                                                <div class="row tests">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <select name="tests[]" class="form-control selecttest w-100"> 
                                                                <option value=""></option>
                                                                @foreach ($labtests as $labtest)
                                                                    <option value="{{$labtest->id}}" @if($labtest->id == $testid) selected @endif>{{$labtest->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="results[]"  placeholder="Result">
                                                        </div>    
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="comments[]" placeholder="Comment">
                                                        </div>    
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-sm btn-info add_test " title="add more"><i class="fa fa-plus"></i></button>
                                                            <button type="button" class="btn btn-sm btn-danger remove_test " title="remove more"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="row tests">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select name="tests[]" class="form-control selecttest w-100"> 
                                                        <option value=""></option>
                                                        @foreach ($labtests as $labtest)
                                                            <option value="{{$labtest->id}}">{{$labtest->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="results[]" placeholder="Result">
                                                </div>    
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="comments[]" placeholder="Comment">
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
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="call-foot">
                                                <div class="d-flex justify-content-between">
                                                    <button type="submit" class="btn btn-dark"> Save</button>   
                                                    <a href="{{route('pharmacy.assessments.final_diagnosis',[$pharmacy,$assessment])}}" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Final Diagnosis  </a>   
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
    var labtest;
    $(document).ready(function(){
        labtest = $('.tests').last().prop("outerHTML");
        $('.selecttest').select2({width:'100%',placeholder:'Select'});
    })

    //provisional diagnosis
    $(document).on('click','.add_test',function(){
        $('#labtest').append(labtest);
        $('.selecttest').select2({width:'100%',placeholder:'Select'});
    })

    $(document).on('click','.remove_test',function(){
        if($('.tests').length > 1){
            $(this).closest('.tests').remove();
        }
    })
     
</script>


@endpush