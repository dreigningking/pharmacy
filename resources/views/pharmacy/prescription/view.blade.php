@extends('layouts.main.app')
@push('styles')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

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
                <h2 class="breadcrumb-title">Prescription</h2>
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
            
                <!-- Profile Widget -->
                <div class="card widget-profile pat-widget-profile">
                    <div class="card-body">
                        <div class="pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img src="{{asset('assets/img/patients/patient.jpg')}}" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3><a href="patient-profile.html">{{$prescription->patient->name}}</a></h3>
                                    <div class="patient-details">
                                        <h5><b>Patient EMR :</b> {{$prescription->patient->emr}}</h5>
                                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Lagos, Nigeria</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="patient-info">
                            <ul>
                                <li><a href="{{route('pharmacy.patients.show',[$pharmacy,$prescription->patient])}}">View Patient Record</a> </li>
                                @if($prescription->assessment)
                                <li> <a href="{{route('pharmacy.assessments.show',[$pharmacy,$prescription->assessment])}}">View Assessment Record</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Profile Widget -->
                
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title mb-0">Prescription</h4>
                        <p class="text-muted text-right mb-0">
                            <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                <i class="fas fa-print"></i> Print
                            </a>
                            <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                <i class="fas fa-envelope"></i> Email
                            </a>
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="biller-info">
                                    <h5 class="d-block">Prescribed By:</h5>
                                    <span class="d-block text-sm text-muted">{{$prescription->user->name}}</span>
                                    <span class="d-block text-sm text-muted">{{$prescription->pharmacy->name}} Pharmacy</span>
                                    <span class="d-block text-sm text-muted">{{$prescription->pharmacy->location}}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 text-sm-right">
                                <div class="billing-info">
                                    <h4 class="d-block">Patient:</h4>
                                    <span class="d-block text-muted">{{$prescription->patient->name}}</span>
                                    <span class="d-block text-muted">#{{$prescription->id}}</span>
                                </div>
                            </div>
                        </div>
                        
                        
                        <!-- Prescription Item -->
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center">
                                    <thead>
                                        <tr>
                                            <th style="width: 50%">Name</th>
                                            <th style="width: 10%">Qty Per Dose</th>
                                            <th style="width: 10%">Days</th>
                                            <th style="width: 30%">Frequency</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($prescription->details as $detail)
                                        <tr>
                                            <td>
                                                <input class="form-control" value="{{$detail->drug->name}}" type="text" readonly>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" value="{{$detail->quantity_per_dose}}" readonly>
                                            </td>
                                            <td>
                                                <input class="form-control" value="{{$detail->duration}}" type="text" readonly>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" value="{{$detail->timeline}} a day" readonly>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="submit-section">
                                    <a href="{{route('pharmacy.prescriptions.edit',[$pharmacy,$prescription])}}" class="btn btn-primary submit-btn">Edit Prescription</a>
                                </div>
                            </div>
                        </div>
                        <!-- /Submit Section -->
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>		
<!-- /Page Content -->
@endsection


