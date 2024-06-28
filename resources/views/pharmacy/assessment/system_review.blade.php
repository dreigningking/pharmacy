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
                                    <h4>System Review</h4>
                                </div>
                                <div class="card-body">
                                    <div id="system_review">
                                        @foreach ($assessment->systemReview as $patientReview)
                                            <div class="row systemreviewrows mb-4">
                                                <div class="col-md-3">
                                                    <select class="form-control reviewcategories" name="systems[]">
                                                        <option value=""></option>
                                                        @foreach ($reviews->unique('system')->pluck('system')->toArray() as $system)
                                                            <option @if($patientReview->review->system == $system) selected @endif>{{$system}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control reviewoptions" name="reviews[]">
                                                        <option value=""></option>
                                                        @foreach ($reviews as $review)
                                                            <option value="{{$review->id}}" @if($patientReview->review_id == $review->id) selected @endif>{{$review->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" placeholder="Comments" name="comments[]" value="{{$patientReview->comment}}">
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="javascript:void(0);" class="btn btn-primary add_reviews ml-2"> <i class="fa fa-plus-circle"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-danger remove_reviews ml-2"> <i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="row systemreviewrows mb-4">
                                            <div class="col-md-3">
                                                <select class="form-control reviewcategories" name="systems[]">
                                                    <option value=""></option>
                                                    @foreach ($reviews->unique('system')->pluck('system')->toArray() as $system)
                                                        <option>{{$system}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control reviewoptions" name="reviews[]">
                                                    <option value=""></option>
                                                    @foreach ($reviews as $review)
                                                        <option value="{{$review->id}}">{{$review->description}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" placeholder="Comments" name="comments[]">
                                            </div>
                                            <div class="col-md-2">
                                                <a href="javascript:void(0);" class="btn btn-primary add_reviews ml-2"> <i class="fa fa-plus-circle"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-danger remove_reviews ml-2"> <i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="call-foot">
                                                <div class="d-flex justify-content-between">
                                                    <button type="submit" class="btn btn-dark">  Save</button>     
                                                    <a href="{{route('pharmacy.assessments.provisional_diagnosis',[$pharmacy,$assessment])}}" class="btn btn-info next"> <i class="fa fa-arrow-right"></i> Provisional Diagnosis  </a>   
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
    var reviews;
    $(document).ready(function(){
        reviews = $('.systemreviewrows').last().prop("outerHTML");
        $('.reviewcategories,.reviewoptions').select2({width:'100%',placeholder:'Select'});
    })
   
    $(document).on('select2:select','.reviewcategories',function(e){
        $(this).closest('.systemreviewrows').find('.reviewoptions').attr('required',true);
    })

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