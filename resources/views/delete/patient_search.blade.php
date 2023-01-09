@extends('layouts.main.app')

@push('styles')
   
    <style>
        .select2-container .select2-selection--single{
            height:40px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered{
            line-height: 35px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            position:absolute;
            top: 6px!important;
        }
    </style>
@endpush

@section('main')
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

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @include('pharmacy.sidebar')
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="call-wrapper">
                        <div class="">
                            <div class="call-main-wrapper">
                                <div class="call-view">
                                    <div class="call-window">                      
                                        <div class="fixed-header">
                                            <div class="navbar">
                                                <div class="user-details mr-auto">
                                                    
                                                    <div class="user-info float-left">
                                                        <h2><span>Search Patient</span></h2>
                                                        <ul class="d-inline-flex mb-0 pl-0" style="list-style-type: none">
                                                            <li class="breadcrumb-item ">
                                                                Patient</li>
                                                            <li class="breadcrumb-item active">Assessment</li>
                                                            <li class="breadcrumb-item active">Prescription</li>
                                                            <li class="breadcrumb-item active">Non-medication plan</li>
                                                        </ul>       
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>       
                                        <!-- Call Contents -->
                                        <div class="call-contents">
                                            <div class="call-content-wrap d-flex justify-content-center">
                                                <div class="w-50 py-3">
                                                    <select name="patient_id" class="select2 form-control">
                                                        <option></option>
                                                        @foreach ($patients as $patient)
                                                            <option value="{{$patient->id}}" data-patient="{{route('pharmacy.patients.view',[$pharmacy,$patient])}}" data-assessment="{{route('pharmacy.assessment.create',[$pharmacy,$patient])}}">{{$patient->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="text-center py-4" id="new_patient">
                                                        <a href="{{route('pharmacy.patients.create',$pharmacy)}}" class="btn btn-primary btn-block mb-2">New Patient</a>   
                                                    </div>
                                                    <div class="text-center py-3 existing_patient" style="display: none">
                                                        <span class="username">Dr. Darren Elder</span>
                                                        <span class="call-timing-count">00:59</span>
                                                    </div>                                                
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Call Footer -->
                                        <div class="call-footer existing_patient" style="display: none">
                                            <div class="d-flex justify-content-around">
                                                <a href="" id="view_patient" title="View Patient" class="btn btn-dark"> <i class="fas fa-eye"></i> View Patient </a>
                                                <a href="#" id="schedule_assessment" class="btn btn-primary"> <i class="fas fa-calendar-alt"></i> Schedule Assessment </a>
                                                <a href="" id="begin_assessment" class="btn btn-info"> <i class="fa fa-medkit"></i> Begin Assessment </a>   
                                            </div>
                                        </div>
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
        $('.select2').select2({
            placeholder: 'Select Patient',
        });
        $(document).on('select2:select','.select2',function(e){
            let data = e.params.data;
            $('#view_patient').attr('href',data.element.dataset.patient)
            $('#begin_assessment').attr('href',data.element.dataset.assessment)
            $('#new_patient').hide()
            $('.existing_patient').show()
            // console.log(data.element.dataset.patient)
            
        });
    </script>
@endpush