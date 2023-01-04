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
                <h2 class="breadcrumb-title">Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <section class="section section-features pt-5">
        <div class="container-fluid">
            <div class="row">
                    <div class="col-md-5 features-img">
                        <img src="{{Storage::url('pharmacies/logos/'.$pharmacy->image)}}" class="img-fluid" alt="Feature" style="padding:50px;background:lightblue">
                    </div>
                    <div class="col-md-7">
                        <div class="section-header mb-3">	
                            <h2 class="mt-2">{{$pharmacy->name}}</h2>
                            <p>{{$pharmacy->description}} </p>
                        </div>	
                        <div class="row">
                            <!-- Slider Item -->
                            <div class="feature-item text-center col-md-3 mb-2">
                                <a href="{{route('pharmacy.patient.list',$pharmacy)}}">
                                    <img src="{{asset('assets/img/features/feature-03.jpg')}}" class="img-fluid" alt="Feature">
                                    <p>Patients</p>
                                </a>
                            </div>
                            <div class="feature-item text-center col-md-3 mb-2">
                                <a href="{{route('pharmacy.assessment.list',$pharmacy)}}">
                                    <img src="{{asset('assets/img/features/feature-05.jpg')}}" class="img-fluid" alt="Feature">
                                    <p>Assessments</p>
                                </a>
                            </div>
                            <div class="feature-item text-center col-md-3 mb-2">
                                <a href="{{route('pharmacy.patient.list',$pharmacy)}}">
                                    <img src="{{asset('assets/img/features/feature-01.jpg')}}" class="img-fluid" alt="Feature">
                                    <p>Sales</p>
                                </a>
                            </div>
                            <!-- /Slider Item -->
                            
                            <!-- Slider Item -->
                            <div class="feature-item text-center col-md-3 mb-2">
                                <a href="#">
                                    <img src="{{asset('assets/img/features/feature-02.jpg')}}" class="img-fluid" alt="Feature">
                                    <p>Analytics</p>
                                </a>
                                
                            </div>
                            <!-- /Slider Item -->
                            
                            <!-- Slider Item -->
                            
                            <!-- /Slider Item -->
                            
                            <!-- Slider Item -->
                            <div class="feature-item text-center col-md-3 mb-2">
                                <a href="{{route('pharmacy.prescription.list',$pharmacy)}}">
                                    <img src="{{asset('assets/img/features/feature-04.jpg')}}" class="img-fluid" alt="Feature">
                                    <p>Prescriptions</p>
                                </a>
                            </div>
                            
                            
                            <!-- Slider Item -->
                            <div class="feature-item text-center col-md-3 mb-2">
                                <a href="{{route('pharmacy.inventory.list',$pharmacy)}}">
                                <img src="{{asset('assets/img/features/feature-06.jpg')}}" class="img-fluid" alt="Feature">
                                <p>Inventory</p>
                                </a>
                            </div>

                            <div class="feature-item text-center col-md-3 mb-2">
                                <a href="{{route('pharmacy.settings',$pharmacy)}}">
                                <img src="{{asset('assets/img/features/feature-06.jpg')}}" class="img-fluid" alt="Feature">
                                <p>Settings</p>
                                </a>
                            </div>
                            <!-- /Slider Item -->
                        </div>
                    </div>
            </div>
        </div>
        <div class="container">
            <div class="card mt-5">
                <div class="card-body pt-0">
                
                    <!-- Tab Menu -->
                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_locations" data-toggle="tab">Notifications</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_reviews" data-toggle="tab">Activities</a>
                            </li>
                            
                        </ul>
                    </nav>
                    <!-- /Tab Menu -->
                    
                    <!-- Tab Content -->
                    <div class="tab-content pt-0">
                    
                        <!-- Overview Content -->
                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card dash-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-3">
                                                    <div class="dash-widget dct-border-rht">
                                                        <div class="circle-bar circle-bar1">
                                                            <div class="circle-graph1" data-percent="75">
                                                                <img src="{{asset('assets/img/icon-01.png')}}" class="img-fluid" alt="patient">
                                                            </div>
                                                        </div>
                                                        <div class="dash-widget-info">
                                                            <h6>Total Patient</h6>
                                                            <h3>1500</h3>
                                                            {{-- <p class="text-muted">Till Today</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 col-lg-3">
                                                    <div class="dash-widget dct-border-rht">
                                                        <div class="circle-bar circle-bar2">
                                                            <div class="circle-graph2" data-percent="65">
                                                                <img src="{{asset('assets/img/icon-02.png')}}" class="img-fluid" alt="Patient">
                                                            </div>
                                                        </div>
                                                        <div class="dash-widget-info">
                                                            <h6>Total Sales</h6>
                                                            <h3>160</h3>
                                                            {{-- <p class="text-muted">06, Nov 2019</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 col-lg-3">
                                                    <div class="dash-widget">
                                                        <div class="circle-bar circle-bar3">
                                                            <div class="circle-graph3" data-percent="50">
                                                                <img src="{{asset('assets/img/icon-03.png')}}" class="img-fluid" alt="Patient">
                                                            </div>
                                                        </div>
                                                        <div class="dash-widget-info">
                                                            <h6>Total Assessments</h6>
                                                            <h3>85</h3>
                                                            {{-- <p class="text-muted">06, Apr 2019</p> --}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-3">
                                                    <div class="dash-widget">
                                                        <div class="circle-bar circle-bar3 ">
                                                            <div class="circle-graph3" data-percent="20">
                                                                <img src="{{asset('assets/img/icon-02.png')}}" class="img-fluid" alt="Patient">
                                                            </div>
                                                        </div>
                                                        <div class="dash-widget-info">
                                                            <h6>Inventory</h6>
                                                            <h3>85</h3>
                                                            {{-- <p class="text-muted">06, Apr 2019</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    
                                    <!-- About Details -->
                                    <div class="widget about-widget">
                                        <h4 class="widget-title">About </h4>
                                        <p>Pharmacy Type: Community Pharmacy</p>
                                        <p>Establishment Type: Faith Based Pharmacy</p>
                                        <p>Location: <i class="fas fa-map-marker-alt"></i> Lagos,Nigeria</p>
                                    </div>
                                    <!-- /About Details -->
                                    <div class="row">
                                        <div class="col-md-6 my-3">
                                            <div class="service-list">
                                                <h4>Patients</h4>
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            Total Number of Patients who are male:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Number of Patients who are female:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Number of Patients who have received assessment:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Number of Patients who recovered:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                            <div class="service-list">
                                                <h4>Sales</h4>
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            Total Number of Sales of drugs:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Amount acrued from Sales of drugs:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Number of Sales of non-drugs:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Amount acrued from Sales of non-drugs:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Sales Amount:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="service-list">
                                                <h4>Inventory</h4>
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            Most Purchased Drugs:
                                                        </td>
                                                        <td>
                                                            Lonart
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Most Purchased NonDrug:
                                                        </td>
                                                        <td>
                                                            Water
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Expired Drugs:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Most Profitable Item:
                                                        </td>
                                                        <td>
                                                            Biscuit
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Number of Antimalaria drugs:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Number of Antibiotics:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Number of Pain Relief:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Number of Antiseptic:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="service-list">
                                                <h4>Assessment</h4>
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            Most common Disease:
                                                        </td>
                                                        <td>
                                                            Cholera
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Walk-in Prescription vs Patients:
                                                        </td>
                                                        <td>
                                                            45/12
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Number of Prescription Errors:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Drug Administration Errors:
                                                        </td>
                                                        <td>
                                                            45
                                                        </td>
                                                    </tr>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /Overview Content -->
                        
                        <!-- Locations Content -->
                        <div role="tabpanel" id="doc_locations" class="tab-pane fade">
                        
                            <!-- Review Listing -->
                            <div class="widget review-listing">
                                <ul class="comments-list">
                                
                                    <!-- Comment List -->
                                    <li>
                                        <div class="comment">
                                            
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="comment-author">Invitation Accepted</span>
                                                    <span class="comment-date"> <i class="fa fa-calendar-alt"></i> 24-Oct-2022 03:45PM</span>
                                                    <div class="review-count rating">
                                                        
                                                        <div class="comment-reply">
                                                           <p class="recommend-btn">
                                                                {{-- <span>Recommend?</span> --}}
                                                                <a href="#" class="like-btn">
                                                                    <i class="far fa-eye"></i> Mark Seen
                                                                </a>
                                                                
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p> --}}
                                                <p class="comment-content">
                                                    Your new staff Richard Watson has accepted your invitation 
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    <!-- /Comment List -->
                                    
                                    <li>
                                        <div class="comment">
                                            
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="comment-author">Product Expiration</span>
                                                    <span class="comment-date"> <i class="fa fa-calendar-alt"></i> 24-Oct-2022 03:45PM</span>
                                                    <div class="review-count rating">
                                                        
                                                        <div class="comment-reply">
                                                           <p class="recommend-btn">
                                                                {{-- <span>Recommend?</span> --}}
                                                                <a href="#" class="like-btn">
                                                                    <i class="far fa-eye"></i> Mark Seen
                                                                </a>
                                                                
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p> --}}
                                                <p class="comment-content">
                                                    Coartem with batch number 0043843943 has expired
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                                
                                <!-- Show All -->
                                <div class="all-feedback text-center">
                                    <a href="#" class="btn btn-primary btn-sm">
                                        Show all Notifications <strong>(167)</strong>
                                    </a>
                                </div>
                                <!-- /Show All -->
                                
                            </div>
                            
                        </div>
                        <!-- /Locations Content -->
                        
                        <!-- Reviews Content -->
                        <div role="tabpanel" id="doc_reviews" class="tab-pane fade">
                            
                            <!-- Education Details -->
                            <div class="widget education-widget">
                                <h4 class="widget-title">Education</h4>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name"> 
                                                        <img class="avatar avatar-sm rounded-circle" alt="User Image" src="{{asset('assets/img/patients/patient.jpg')}}" "="">
                                                        <span>John Samuel</span> 
                                                    </a>
                                                    <div>American Dental Medical University</div>
                                                    <span class="time"> <i class="fa fa-clock"></i> 22nd October, 2022 18:30</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">American Dental Medical University</a>
                                                    <div>MDS</div>
                                                    <span class="time">2003 - 2005</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Education Details -->
                
                        </div>
                        <!-- /Reviews Content -->
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>	
    
</div>

<!-- /Page Content -->
@endsection
@push('scripts')
{{-- <script src="{{asset('assets/js/jqueryy.js')}}"></script> --}}
<script src="{{asset('assets/js/jqueryui.min.js')}}"></script>
<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>
@endpush