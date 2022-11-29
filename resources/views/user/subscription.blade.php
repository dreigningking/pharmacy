@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
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
                        <li class="breadcrumb-item active" aria-current="page">Subscriptions</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Subscriptions</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
            
                <!-- Search Filter -->
                <div class="card search-filter">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Search Filter</h4>
                    </div>
                    <div class="card-body">
                        <div class="filter-widget">
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" placeholder="Purchase Date">
                            </div>			
                        </div>
                        <div class="filter-widget">
                            <h4>Type</h4>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type" checked>
                                    <span class="checkmark"></span> Pharmacy Management
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type" checked>
                                    <span class="checkmark"></span> Analytics
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type" checked>
                                    <span class="checkmark"></span> SMS
                                </label>
                            </div>
                        </div>
                    
                        <div class="btn-search">
                            <button type="button" class="btn btn-block">Search</button>
                        </div>	
                    </div>
                </div>
                <!-- /Search Filter -->
                
            </div>
            
            <div class="col-md-12 col-lg-8 col-xl-9">

                <!-- Doctor Widget -->
                <div class="card">
                    <div class="card-body">
                        <div class="doctor-widget">
                            <div class="doc-info-left">
                                
                                <div class="doc-info-cont">
                                    <h4 class="doc-name"><a href="doctor-profile.html">Pharmacy Subscription</a></h4>
                                    <p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                                    {{-- <h5 class="doc-department">
                                        Licenses:
                                    </h5> --}}
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Licenses</th>
                                                <th>Assigned To</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">TUJH98394934380</td>
                                                <td class="align-middle">Hycent Pharmacy</td>
                                                <td class="align-middle">24/Oct/2019</td>
                                                <td class="align-middle">25/Nov/2020</td>
                                                <td class="align-middle">Running</td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">TUJH983435434380</td>
                                                <td class="align-middle">
                                                    <select class="form-control">
                                                        <option>Select</option>
                                                        <option>Hycent Pharmacy</option>
                                                    </select>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>Unassigned</td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">TUJH983435434380</td>
                                                <td class="align-middle">
                                                    <select class="form-control">
                                                        <option>Select</option>
                                                        <option>Hycent Pharmacy</option>
                                                    </select>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>Unassigned</td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="doc-info-right">
                                <div class="clini-infos">
                                    <ul>
                                        <li><i class="far fa-calendar-alt"></i> 24-Oct-2019</li>
                                        <li><i class="far fa-star"></i> 3 Licenses</li>
                                        <li><i class="fas fa-clock"></i> 1 year</li>
                                        <li><i class="far fa-money-bill-alt"></i> Trial License </li>
                                    </ul>
                                </div>
                                <a class="btn btn-outline-warning btn-block  mb-2" href="doctor-profile.html">Renew</a>
                                <div class="clinic-booking">
                                    <a class="view-pro-btn" href="doctor-profile.html">View Receipt</a>
                                    
                                    <a class="apt-btn" href="booking.html">Subscription Features</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Doctor Widget -->

                <!-- Doctor Widget -->
                <div class="card">
                    <div class="card-body">
                        <div class="doctor-widget">
                            <div class="doc-info-left">
                                
                                <div class="doc-info-cont">
                                    <h4 class="doc-name"><a href="doctor-profile.html">Pharmacy Subscription</a></h4>
                                    <p class="doc-speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    <h5 class="doc-department"><img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">Dentist</h5>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(35)</span>
                                    </div>
                                    <div class="clinic-details">
                                        <p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA</p>
                                        <ul class="clinic-gallery">
                                            <li>
                                                <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
                                                    <img src="assets/img/features/feature-01.jpg" alt="Feature">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
                                                    <img  src="assets/img/features/feature-02.jpg" alt="Feature">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
                                                    <img src="assets/img/features/feature-03.jpg" alt="Feature">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
                                                    <img src="assets/img/features/feature-04.jpg" alt="Feature">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clinic-services">
                                        <span>Dental Fillings</span>
                                        <span> Whitneing</span>
                                    </div>
                                </div>
                            </div>
                            <div class="doc-info-right">
                                <div class="clini-infos">
                                    <ul>
                                        <li><i class="far fa-thumbs-up"></i> 100%</li>
                                        <li><i class="far fa-comment"></i> 35 Feedback</li>
                                        <li><i class="fas fa-map-marker-alt"></i> Newyork, USA</li>
                                        <li><i class="far fa-money-bill-alt"></i> $50 - $300 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i></li>
                                    </ul>
                                </div>
                                <div class="clinic-booking">
                                    <a class="view-pro-btn" href="doctor-profile.html">View Profile</a>
                                    <a class="apt-btn" href="booking.html">Book Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Doctor Widget -->

                <!-- Doctor Widget -->
                <div class="card">
                    <div class="card-body">
                        <div class="doctor-widget">
                            <div class="doc-info-left">
                                
                                <div class="doc-info-cont">
                                    <h4 class="doc-name"><a href="doctor-profile.html">SMS Subscription</a></h4>
                                    <p class="doc-speciality">MBBS, MD - General Medicine, DNB - Cardiology</p>
                                    <p class="doc-department"><img src="assets/img/specialities/specialities-04.png" class="img-fluid" alt="Speciality">Cardiology</p>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(27)</span>
                                    </div>
                                    <div class="clinic-details">
                                        <p class="doc-location"><i class="fas fa-map-marker-alt"></i> Georgia, USA</p>
                                        <ul class="clinic-gallery">
                                            <li>
                                                <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
                                                    <img src="assets/img/features/feature-01.jpg" alt="Feature">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
                                                    <img  src="assets/img/features/feature-02.jpg" alt="Feature">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
                                                    <img src="assets/img/features/feature-03.jpg" alt="Feature">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
                                                    <img src="assets/img/features/feature-04.jpg" alt="Feature">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clinic-services">
                                        <span>Dental Fillings</span>
                                        <span> Whitneing</span>
                                    </div>
                                </div>
                            </div>
                            <div class="doc-info-right">
                                <div class="clini-infos">
                                    <ul>
                                        <li><i class="far fa-thumbs-up"></i> 99%</li>
                                        <li><i class="far fa-comment"></i> 35 Feedback</li>
                                        <li><i class="fas fa-map-marker-alt"></i> Newyork, USA</li>
                                        <li><i class="far fa-money-bill-alt"></i> $100 - $400 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i></li>
                                    </ul>
                                </div>
                                <div class="clinic-booking">
                                    <a class="view-pro-btn" href="doctor-profile.html">View Profile</a>
                                    <a class="apt-btn" href="booking.html">Book Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Doctor Widget -->

                <!-- Doctor Widget -->
                <div class="card">
                    <div class="card-body">
                        <div class="doctor-widget">
                            <div class="doc-info-left">
                                
                                <div class="doc-info-cont">
                                    <h4 class="doc-name"><a href="doctor-profile.html">Analytics</a></h4>
                                    <p class="doc-speciality">MBBS, MS - General Surgery, MCh - Urology</p>
                                    <p class="doc-department"><img src="assets/img/specialities/specialities-01.png" class="img-fluid" alt="Speciality">Urology</p>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(4)</span>
                                    </div>
                                    <div class="clinic-details">
                                        <p class="doc-location"><i class="fas fa-map-marker-alt"></i> Louisiana, USA</p>
                                        <ul class="clinic-gallery">
                                            <li>
                                                <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
                                                    <img src="assets/img/features/feature-01.jpg" alt="Feature">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
                                                    <img  src="assets/img/features/feature-02.jpg" alt="Feature">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
                                                    <img src="assets/img/features/feature-03.jpg" alt="Feature">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
                                                    <img src="assets/img/features/feature-04.jpg" alt="Feature">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clinic-services">
                                        <span>Dental Fillings</span>
                                        <span> Whitneing</span>
                                    </div>
                                </div>
                            </div>
                            <div class="doc-info-right">
                                <div class="clini-infos">
                                    <ul>
                                        <li><i class="far fa-thumbs-up"></i> 97%</li>
                                        <li><i class="far fa-comment"></i> 4 Feedback</li>
                                        <li><i class="fas fa-map-marker-alt"></i> Newyork, USA</li>
                                        <li><i class="far fa-money-bill-alt"></i> $150 - $250 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i></li>
                                    </ul>
                                </div>
                                <div class="clinic-booking">
                                    <a class="view-pro-btn" href="doctor-profile.html">View Profile</a>
                                    <a class="apt-btn" href="booking.html">Book Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Doctor Widget -->

                <!-- Doctor Widget -->
                <div class="card">
                    <div class="card-body">
                        <div class="doctor-widget">
                            <div class="doc-info-left">
                                
                                <div class="doc-info-cont">
                                    <h4 class="doc-name"><a href="doctor-profile.html">Analytics</a></h4>
                                    <p class="doc-speciality">MS - Orthopaedics, MBBS, M.Ch - Orthopaedics</p>
                                    <p class="doc-department"><img src="assets/img/specialities/specialities-03.png" class="img-fluid" alt="Speciality">Orthopaedics</p>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(52)</span>
                                    </div>
                                    <div class="clinic-details">
                                        <p class="doc-location"><i class="fas fa-map-marker-alt"></i> Texas, USA</p>
                                        <ul class="clinic-gallery">
                                            <li>
                                                <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
                                                    <img src="assets/img/features/feature-01.jpg" alt="Feature">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
                                                    <img  src="assets/img/features/feature-02.jpg" alt="Feature">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
                                                    <img src="assets/img/features/feature-03.jpg" alt="Feature">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
                                                    <img src="assets/img/features/feature-04.jpg" alt="Feature">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clinic-services">
                                        <span>Dental Fillings</span>
                                        <span> Whitneing</span>
                                    </div>
                                </div>
                            </div>
                            <div class="doc-info-right">
                                <div class="clini-infos">
                                    <ul>
                                        <li><i class="far fa-thumbs-up"></i> 100%</li>
                                        <li><i class="far fa-comment"></i> 52 Feedback</li>
                                        <li><i class="fas fa-map-marker-alt"></i> Texas, USA</li>
                                        <li><i class="far fa-money-bill-alt"></i> $100 - $500 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i></li>
                                    </ul>
                                </div>
                                <div class="clinic-booking">
                                    <a class="view-pro-btn" href="doctor-profile.html">View Profile</a>
                                    <a class="apt-btn" href="booking.html">Book Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Doctor Widget -->

                <div class="load-more text-center">
                    <a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>	
                </div>	
            </div>
        </div>
    </div>
</div>


<!-- /Page Content -->
@endsection






