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
                                    <h3><a href="patient-profile.html">Richard Wilson</a></h3>
                                    <div class="patient-details">
                                        <h5><b>Patient ID :</b> PT0016</h5>
                                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Lagos, Nigeria</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="patient-info">
                            <ul>
                                <li>Patient Record <span>View</span></li>
                                <li>Assessment <span>View</span></li>
                                
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
                                    <h4 class="d-block">Dr. Darren Elder</h4>
                                    <span class="d-block text-sm text-muted">Erica Pharmacy</span>
                                    <span class="d-block text-sm text-muted">Lagos, Nigeria</span>
                                </div>
                            </div>
                            <div class="col-sm-6 text-sm-right">
                                <div class="billing-info">
                                    <h4 class="d-block">1 November 2019</h4>
                                    <span class="d-block text-muted">#INV0001</span>
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
                                            <th style="width: 200px">Name</th>
                                            <th style="width: 100px">Quantity</th>
                                            <th style="width: 100px">Days</th>
                                            <th style="width: 100px;">Time</th>
                                            <th style="width: 80px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="form-control" value="Amoxapine" type="text" readonly>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" value="2" readonly>
                                            </td>
                                            <td>
                                                <input class="form-control" value="2 Days" type="text" readonly>
                                            </td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked> Morning
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked> Afternoon
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox"> Evening
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked> Night
                                                    </label>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text" value="Benazepril" readonly>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" value="2" readonly>
                                            </td>
                                            <td>
                                                <input class="form-control" value="1 Days" type="text" readonly>
                                            </td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked> Morning
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked> Afternoon
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox"> Evening
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked> Night
                                                    </label>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Prescription Item -->
                        
                        <!-- Signature -->
                        {{-- <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="signature-wrap">
                                    <div class="signature">
                                        Click here to sign
                                    </div>
                                    <div class="sign-name">
                                        <p class="mb-0">( Dr. Darren Elder )</p>
                                        <span class="text-muted">Signature</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- /Signature -->
                        
                        <!-- Submit Section -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Back to List</button>
                                    
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


