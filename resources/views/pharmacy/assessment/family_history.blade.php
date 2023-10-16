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
                        <form action="{{route('pharmacy.assessments.family_history_store', $pharmacy)}}" class="w-100" method="POST">@csrf
                            <input type="hidden" name="assessment_id" value="{{$assessment->id}}">
                            <input type="hidden" name="patient_id" value="{{$assessment->patient_id}}">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Family & Social History</h4>
                                </div>
                                <div class="card-body">
                                    <div id="family_and_social_history">
                                        @foreach ($assessment->patient->familySocialHistory as $history)
                                            <div class="row familyhistoryrows mb-4">
                                                <div class="col-md-4">
                                                    <select class="form-control familyquestions" name="questions[]">
                                                        <option value=""></option>
                                                        @foreach ($familySocialQuestions as $familyQuestion)
                                                            <option value="{{$familyQuestion->id}}" @if($familyQuestion->id == $history->question_id) selected @endif>{{$familyQuestion->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>                                              
                                                <div class="col-md-2">
                                                    <div class="d-flex">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="abc{{$loop->index}}" name="answers[{{$loop->index}}]" @if($history->value) checked @endif value="yes" class="custom-control-input">
                                                            <label class="custom-control-label" for="abc">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="xyz{{$loop->index}}" name="answers[{{$loop->index}}]" @if(!$history->value) checked @endif value="no" class="custom-control-input">
                                                            <label class="custom-control-label" for="xyz">No</label>
                                                        </div> 
                                                    </div>                                                        
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" value="{{$history->comment}}" name="comments[]" placeholder="Comment">                                                       
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="javascript:void(0);" class="btn btn-primary add_family_questions ml-2"> <i class="fa fa-plus-circle"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-danger remove_family_questions ml-2"> <i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                            <div class="row familyhistoryrows mb-4">
                                                <div class="col-md-4">
                                                    <select class="form-control familyquestions" name="questions[]">
                                                        <option value=""></option>
                                                        @foreach ($familySocialQuestions as $familyQuestion)
                                                            <option value="{{$familyQuestion->id}}">{{$familyQuestion->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-2">
                                                    <div class="d-flex">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="abc" name="answers[]" value="yes" class="custom-control-input">
                                                            <label class="custom-control-label" for="abc">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="xyz" name="answers[]" value="no" class="custom-control-input">
                                                            <label class="custom-control-label" for="xyz">No</label>
                                                        </div> 
                                                    </div>                                                        
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="comments[]" placeholder="Comment">                                                       
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="javascript:void(0);" class="btn btn-primary add_family_questions ml-2"> <i class="fa fa-plus-circle"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-danger remove_family_questions ml-2"> <i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                       
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="call-foot">
                                                <div class="d-flex justify-content-between">
                                                    <button type="submit" class="btn btn-dark">  Save</button>   
                                                    <a href="{{route('pharmacy.assessments.system_review',[$pharmacy,$assessment])}}" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> System Review  </a>   
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
    var family_history;
    $(document).ready(function(){
        family_history = $('.familyhistoryrows').last().prop("outerHTML");
        $('.familyquestions').select2({width:'100%',placeholder:'Select'});
    })
    //family and social history
    $(document).on('click','.add_family_questions',function(){
        $('#family_and_social_history').append(family_history);
        $('.familyquestions').select2({width:'100%',placeholder:'Select'})
        resetFamilyHistory()
    })

    $(document).on('click','.remove_family_questions',function(){
        if($('.remove_family_questions').length > 1){
            $(this).closest('.familyhistoryrows').remove();
        }
        resetFamilyHistory()
    })

    function resetFamilyHistory(){
        $('.familyhistoryrows').each(function(outer){
            $(this).find('.custom-control-input').each(function(inde,val){
                $(this).attr('id',outer+'past'+inde)
                $(this).attr('name','answers['+outer+']')
            })
            $(this).find('.custom-control-label').each(function(ind,va){
                $(this).attr('for',outer+'past'+ind)
            })
        })
    }
    
</script>

@endpush