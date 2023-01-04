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
                                    <span class="checkmark"></span> Show Expired Subscription
                                </label>
                            </div>
                        </div>
                    
                        <div class="btn-search">
                            <button type="button" class="btn btn-block">Search</button>
                        </div>	
                        
                    </div>
                    {{-- <div class="card-body">
                        <div class="clinic-booking">
                            <a class="apt-btn" href="booking.html">View Subscription Plans</a>
                        </div>
                    </div> --}}
                    
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
                                
                                <div class="clinic-booking">
                                    <a class="view-pro-btn" href="doctor-profile.html">Renew</a>  
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
                                    <h4 class="doc-name"><a href="doctor-profile.html">Pharmacy Analytics</a></h4>
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
                                
                                <div class="clinic-booking">
                                    <a class="view-pro-btn" href="doctor-profile.html">Buy Again</a>
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






