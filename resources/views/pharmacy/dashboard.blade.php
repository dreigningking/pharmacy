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
                        <img src="{{asset('assets/img/pharmacies/1.jpg')}}" class="img-fluid" alt="Feature" style="padding:50px;background:lightblue">
                    </div>
                    <div class="col-md-7">
                        <div class="section-header mb-3">	
                            <h2 class="mt-2">{{$pharmacy->name}}</h2>
                            <p>Modules available by the readable content of a page  </p>
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
                                <a href="#">
                                    <img src="{{asset('assets/img/features/feature-05.jpg')}}" class="img-fluid" alt="Feature">
                                    <p>Assessments</p>
                                </a>
                            </div>
                            <div class="feature-item text-center col-md-3 mb-2">
                                <a href="#">
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
                                <a href="#">
                                    <img src="{{asset('assets/img/features/feature-04.jpg')}}" class="img-fluid" alt="Feature">
                                    <p>Prescriptions</p>
                                </a>
                            </div>
                            <!-- /Slider Item -->
                            
                            <!-- Slider Item -->
                            
                            <!-- /Slider Item -->
                            
                            <!-- Slider Item -->
                            <div class="feature-item text-center col-md-3 mb-2">
                                <img src="{{asset('assets/img/features/feature-06.jpg')}}" class="img-fluid" alt="Feature">
                                <p>Inventory</p>
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
                                                            <p class="text-muted">Till Today</p>
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
                                                            <h6>Today Patient</h6>
                                                            <h3>160</h3>
                                                            <p class="text-muted">06, Nov 2019</p>
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
                                                            <h6>Appoinments</h6>
                                                            <h3>85</h3>
                                                            <p class="text-muted">06, Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-3">
                                                    <div class="dash-widget">
                                                        <div class="circle-bar circle-bar3">
                                                            <div class="circle-graph3" data-percent="20">
                                                                <img src="{{asset('assets/img/icon-02.png')}}" class="img-fluid" alt="Patient">
                                                            </div>
                                                        </div>
                                                        <div class="dash-widget-info">
                                                            <h6>Appoinments</h6>
                                                            <h3>85</h3>
                                                            <p class="text-muted">06, Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-9">
                                    <div class="row">
                                        
                                    </div>
                                    <!-- About Details -->
                                    <div class="widget about-widget">
                                        <h4 class="widget-title">About </h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                    <!-- /About Details -->
                                
                                    
                            
                                    
                                    
                                    <!-- Services List -->
                                    <div class="service-list">
                                        <h4>Services</h4>
                                        <ul class="clearfix">
                                            <li>Tooth cleaning </li>
                                            <li>Root Canal Therapy</li>
                                            <li>Implants</li>
                                            <li>Composite Bonding</li>
                                            <li>Fissure Sealants</li>
                                            <li>Surgical Extractions</li>
                                        </ul>
                                    </div>
                                    <!-- /Services List -->
                                    
                                    <!-- Specializations List -->
                                    <div class="service-list">
                                        <h4>Specializations</h4>
                                        <ul class="clearfix">
                                            <li>Children Care</li>
                                            <li>Dental Care</li>	
                                            <li>Oral and Maxillofacial Surgery </li>	
                                            <li>Orthodontist</li>	
                                            <li>Periodontist</li>	
                                            <li>Prosthodontics</li>	
                                        </ul>
                                    </div>
                                    <!-- /Specializations List -->
    
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
                                                    <span class="comment-author">Richard Wilson</span>
                                                    <span class="comment-date"> <i class="fa fa-calendar-alt"></i> 24-Oct-2022 03:45PM</span>
                                                    <div class="review-count rating">
                                                        
                                                        <div class="comment-reply">
                                                           <p class="recommend-btn">
                                                                {{-- <span>Recommend?</span> --}}
                                                                <a href="#" class="like-btn">
                                                                    <i class="far fa-thumbs-up"></i> Read
                                                                </a>
                                                                <a href="#" class="dislike-btn">
                                                                    <i class="far fa-thumbs-down"></i> Unread
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p> --}}
                                                <p class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation.
                                                    Curabitur non nulla sit amet nisl tempus
                                                </p>
                                                
                                            </div>
                                        </div>
                                        
                                        <!-- Comment Reply -->
                                        <ul class="comments-reply">
                                            <li>
                                                <div class="comment">
                                                    <img class="avatar avatar-sm rounded-circle" alt="User Image" src="{{asset('assets/img/patients/patient1.jpg')}}" "="">
                                                    <div class="comment-body">
                                                        <div class="meta-data">
                                                            <span class="comment-author">Charlene Reed</span>
                                                            <span class="comment-date">Reviewed 3 Days ago</span>
                                                            <div class="review-count rating">
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <p class="comment-content">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                            Ut enim ad minim veniam.
                                                            Curabitur non nulla sit amet nisl tempus
                                                        </p>
                                                        <div class="comment-reply">
                                                            <a class="comment-btn" href="#">
                                                                <i class="fas fa-reply"></i> Reply
                                                            </a>
                                                            <p class="recommend-btn">
                                                                <span>Recommend?</span>
                                                                <a href="#" class="like-btn">
                                                                    <i class="far fa-thumbs-up"></i> Yes
                                                                </a>
                                                                <a href="#" class="dislike-btn">
                                                                    <i class="far fa-thumbs-down"></i> No
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- /Comment Reply -->
                                        
                                    </li>
                                    <!-- /Comment List -->
                                    
                                    <!-- Comment List -->
                                    <li>
                                        <div class="comment">
                                            <img class="avatar avatar-sm rounded-circle" alt="User Image" src="{{asset('assets/img/patients/patient2.jpg')}}" "="">
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="comment-author">Travis Trimble</span>
                                                    <span class="comment-date">Reviewed 4 Days ago</span>
                                                    <div class="review-count rating">
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <p class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation.
                                                    Curabitur non nulla sit amet nisl tempus
                                                </p>
                                                <div class="comment-reply">
                                                    <a class="comment-btn" href="#">
                                                        <i class="fas fa-reply"></i> Reply
                                                    </a>
                                                    <p class="recommend-btn">
                                                        <span>Recommend?</span>
                                                        <a href="#" class="like-btn">
                                                            <i class="far fa-thumbs-up"></i> Yes
                                                        </a>
                                                        <a href="#" class="dislike-btn">
                                                            <i class="far fa-thumbs-down"></i> No
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- /Comment List -->
                                    
                                </ul>
                                
                                <!-- Show All -->
                                <div class="all-feedback text-center">
                                    <a href="#" class="btn btn-primary btn-sm">
                                        Show all feedback <strong>(167)</strong>
                                    </a>
                                </div>
                                <!-- /Show All -->
                                
                            </div>
                            <!-- /Review Listing -->
                        
                            <!-- Write Review -->
                            <div class="write-review">
                                <h4>Write a review for <strong>Dr. Darren Elder</strong></h4>
                                
                                <!-- Write Review Form -->
                                <form>
                                    <div class="form-group">
                                        <label>Review</label>
                                        <div class="star-rating">
                                            <input id="star-5" type="radio" name="rating" value="star-5">
                                            <label for="star-5" title="5 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-4" type="radio" name="rating" value="star-4">
                                            <label for="star-4" title="4 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-3" type="radio" name="rating" value="star-3">
                                            <label for="star-3" title="3 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-2" type="radio" name="rating" value="star-2">
                                            <label for="star-2" title="2 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-1" type="radio" name="rating" value="star-1">
                                            <label for="star-1" title="1 star">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Title of your review</label>
                                        <input class="form-control" type="text" placeholder="If you could say it in one sentence, what would you say?">
                                    </div>
                                    <div class="form-group">
                                        <label>Your review</label>
                                        <textarea id="review_desc" maxlength="100" class="form-control"></textarea>
                                      
                                      <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> characters remaining</small></div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="terms-accept">
                                            <div class="custom-checkbox">
                                               <input type="checkbox" id="terms_accept">
                                               <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Add Review</button>
                                    </div>
                                </form>
                                <!-- /Write Review Form -->
                                
                            </div>
                            <!-- /Write Review -->
    
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