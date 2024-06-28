@extends('layouts.main.app')
@push('styles')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<style>
    .no_select_border span.select2-selection.select2-selection--single{
        border:0px !important;
    }
    /* #select2-supplier_select-container{
        text-align: right;
    } */
    span.select2-selection.select2-selection--single{
        height:46px;
        padding-top:10px;
        padding-bottom:10px;
        /* width:200px; */
    }
    span.select2.select2-container select2-container--default{
        width:200px!important;
    }
    .select2-container--default .select2-selection--single {
        height: 50px;
        border: 1px solid #dcdcdc;
        border-radius: 3px;
    }
    /* .select2-container--default.select2-selection--single.select2-selection__arrow {
        top: 10px !important;
    } */
    .select2-container--default.select2-selection--single.select2-selection__arrow{
        top: 8px !important;
    }
    /* .select2-container--default .select2-selection--single .select2-selection__arrow{
        top: 8px !important;
    } */
    .select2-container--default.select2-selection--single.select2-selection__rendered {
        line-height: 42px;
    }
    
    .table-trash {
        width: 29px !important;
        height: 29px !important;
    }
    .date {
        width: 150px;
    }
    .table-input{
        width: 90px;
        height: 50px;
        border: none;
    }
    .table-input:focus{
        border: none;
        outline: none;
    }
    .table tr td{
        vertical-align: middle;
        
    }
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        /* -moz-appearance: textfield; */
    }
    .select-remote {
        /* width: 450px !important; */
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
                <h2 class="breadcrumb-title">Assessment</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            {{-- @include('pharmacy.sidebar') --}}
            <div class="col-md-12">
                <!-- Page Wrapper -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('pharmacy.purchases.store',$pharmacy)}}" method="POST">@csrf
                            <div class="invoice-content">
                                
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td> Name: </td>
                                                    <td> {{$assessment->patient->name}} </td>
                                                </tr>
                                                <tr>
                                                    <td> Phone Number: </td>
                                                    <td> {{$assessment->patient->mobile}} </td>
                                                </tr>
                                                <tr>
                                                    <td> Assessment Date: </td>
                                                    <td> {{$assessment->created_at->format('jS M Y')}} </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-borderless">
                                                <tr>
                                                    {{-- <td> <a href="{{route('pharmacy.assessments.create',$pharmacy)}}" class="btn btn-light btn-sm supplies_submit">Edit Assessment</a>  </td> --}}
                                                    <td> <a href="{{route('pharmacy.prescriptions.create',$pharmacy)}}" class="btn btn-dark btn-sm supplies_submit " >View Prescription</a> </td>
                                                </tr>
                                                
                                            </table>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                
                                
                                <!-- Invoice Drug -->
                                <div class="invoice-item invoice-table-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive no_select_border">
                                                <table class="invoice-table table table-bordered" id="table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Assessment
                                                                
                                                            </th>
                                                            <th class="text-left">Details</th>
                                                            <th class="text-left">Action</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody  class="">
                                                        <tr class="">
                                                            <td class="extra-column">
                                                                Complaints
                                                            </td>
                                                            <td class="">
                                                                {{implode(',',$assessment->complaints)}}
                                                            </td>
                                                            <td></td>
                                                        </tr> 
                                                        <tr class="">
                                                            <td class="extra-column">
                                                                Vitals
                                                            </td>
                                                            <td class="">
                                                                <ul>
                                                                    @forelse ($assessment->vitals as $patientVital)
                                                                    <li>{{$patientVital->vital->type}} : {{$patientVital->value}} {{$patientVital->vital->unit}} ({{$patientVital->comment}}) </li>
                                                                    @empty

                                                                    @endforelse
                                                                    
                                                                </ul>
                                                                
                                                            </td>
                                                            <td>
                                                                <div class="table-action">
                                                                    <a href="{{route('pharmacy.assessments.vitals',[$pharmacy,$assessment])}}" class="btn btn-sm bg-primary-light">
                                                                        <i class="far fa-edit"></i> Edit
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr> 
                                                        <tr class="">
                                                            <td class="extra-column">
                                                                Past Medical Record
                                                            </td>
                                                            <td class="">
                                                                <ul>
                                                                    @forelse ($assessment->patientMedicalHistory as $medicalHistory)
                                                                        <li>{{$medicalHistory->condition->description}} @if($medicalHistory->start) - {{$medicalHistory->start->format('M Y')}} @endif
                                                                            <ul class="list-unstyled font-italic">
                                                                                <li class="list-style-none">Medication Used</li>
                                                                                    <ul class="text-muted small">
                                                                                        @forelse($medicalHistory->medications as $medication)
                                                                                            <li>{{$medication->drug->name}}</li>
                                                                                        @empty

                                                                                        @endforelse
                                                                                    </ul>
                                                                            </ul>
                                                                        </li>
                                                                    @empty
                                                                        
                                                                    @endforelse
                                                                </ul>
                                                                
                                                            </td>
                                                            <td>
                                                                <div class="table-action">
                                                                    <a href="{{route('pharmacy.assessments.medical_medication',[$pharmacy,$assessment])}}" class="btn btn-sm bg-primary-light">
                                                                        <i class="far fa-edit"></i> Edit
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr> 
                                                        
                                                        <tr class="">
                                                            <td class="extra-column">
                                                                Family & Social History
                                                            </td>
                                                            <td class="">
                                                                <ul>
                                                                    @forelse ($assessment->familySocialHistory as $familySocialHistory)
                                                                    <li>{{$familySocialHistory->question->description}} - {{$familySocialHistory->value}} ({{$familySocialHistory->comment}}) </li>
                                                                    @empty

                                                                    @endforelse
                                                                </ul>
                                                                
                                                            </td>
                                                            <td>
                                                                <div class="table-action">
                                                                    <a href="{{route('pharmacy.assessments.family_history',[$pharmacy,$assessment])}}" class="btn btn-sm bg-primary-light">
                                                                        <i class="far fa-edit"></i> Edit
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>  
                                                         
                                                        <tr class="">
                                                            <td class="extra-column">
                                                                System Review
                                                            </td>
                                                            <td class="">
                                                                <ul>
                                                                    @forelse ($assessment->systemReview as $patientReview)
                                                                        <li>{{$patientReview->review->system}} : <span class="text-muted small font-italic">{{$patientReview->review->description}}</span>
                                                                            
                                                                        </li>
                                                                    @empty
                                                                        
                                                                    @endforelse
                                                                </ul>
                                                                
                                                            </td>
                                                            <td>
                                                                <div class="table-action">
                                                                    <a href="{{route('pharmacy.assessments.system_review',[$pharmacy,$assessment])}}" class="btn btn-sm bg-primary-light">
                                                                        <i class="far fa-edit"></i> Edit
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>  
                                                        <tr class="">
                                                            <td class="extra-column">
                                                                Provisional Diagnosis
                                                            </td>
                                                            <td class="">
                                                                <ul>
                                                                    @forelse ($assessment->provisionalDiagnosis as $diagnosis)
                                                                        <li>{{$diagnosis->condition->description}} </span>
                                                                            
                                                                        </li>
                                                                    @empty
                                                                        
                                                                    @endforelse
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <div class="table-action">
                                                                    <a href="{{route('pharmacy.assessments.provisional_diagnosis',[$pharmacy,$assessment])}}" class="btn btn-sm bg-primary-light">
                                                                        <i class="far fa-edit"></i> Edit
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>  
                                                        <tr class="">
                                                            <td class="extra-column">
                                                               Laboratory
                                                            </td>
                                                            <td class="">
                                                                <ul>
                                                                    @forelse ($assessment->provisionalDiagnosis as $diagnosis)
                                                                        <li>{{$diagnosis->condition->description}} </span>
                                                                            
                                                                        </li>
                                                                    @empty
                                                                        
                                                                    @endforelse
                                                                </ul>
                                                                
                                                            </td>
                                                            <td>
                                                                <div class="table-action">
                                                                    <a href="{{route('pharmacy.assessments.laboratory_test',[$pharmacy,$assessment])}}" class="btn btn-sm bg-primary-light">
                                                                        <i class="far fa-edit"></i> Edit
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr> 
                                                        <tr class="">
                                                            <td class="extra-column">
                                                               Final Diagnosis
                                                            </td>
                                                            <td class="">
                                                                Confirmed Presence of CBN intervention
                                                            </td>
                                                            <td>
                                                                <div class="table-action">
                                                                    <a href="{{route('pharmacy.assessments.final_diagnosis',[$pharmacy,$assessment])}}" class="btn btn-sm bg-primary-light">
                                                                        <i class="far fa-edit"></i> Edit
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr> 
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- /Invoice Drug -->
                                
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Page Wrapper -->


            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection



