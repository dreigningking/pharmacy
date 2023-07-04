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
                            <p class="mt-0">
                                <small class="d-block">Community Pharmacy, <i class="fas fa-map-marker-alt"></i> Lagos,Nigeria</small></small> 
                                
                            </p>
                            <p>{{$pharmacy->description}} </p>
                        </div>	
                        <div class="row">
                            <!-- Slider Item -->
                            <div class="feature-item text-center col-md-3 mb-2">
                                <a href="{{route('pharmacy.patients.index',$pharmacy)}}">
                                    <img src="{{asset('assets/img/features/feature-03.jpg')}}" class="img-fluid" alt="Feature">
                                    <p>PEMR</p>
                                </a>
                            </div>
                            <div class="feature-item text-center col-md-3 mb-2">
                                <a href="{{route('pharmacy.assessments.index',$pharmacy)}}">
                                    <img src="{{asset('assets/img/features/feature-05.jpg')}}" class="img-fluid" alt="Feature">
                                    <p>Assessments</p>
                                </a>
                            </div>
                            <div class="feature-item text-center col-md-3 mb-2">
                                <a href="{{route('pharmacy.sales.index',$pharmacy)}}">
                                    <img src="{{asset('assets/img/features/feature-01.jpg')}}" class="img-fluid" alt="Feature">
                                    <p>Sales </p>
                                    
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
                                <a href="{{route('pharmacy.prescriptions.index',$pharmacy)}}">
                                    <img src="{{asset('assets/img/features/feature-04.jpg')}}" class="img-fluid" alt="Feature">
                                    <p>Prescriptions</p>
                                </a>
                            </div>
                            
                            
                            <!-- Slider Item -->
                            <div class="feature-item text-center col-md-3 mb-2">
                                <a href="{{route('pharmacy.inventory.index',$pharmacy)}}">
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
                                {{-- <div class="col-md-12">
                                    <div class="card dash-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-4">
                                                    <div class="dash-widget dct-border-rht">
                                                        <div class="circle-bar circle-bar1">
                                                            <div class="circle-graph1" data-percent="75">
                                                                <img src="{{asset('assets/img/icon-01.png')}}" class="img-fluid" alt="patient">
                                                            </div>
                                                        </div>
                                                        <div class="dash-widget-info">
                                                            <h6>Total Patient</h6>
                                                            <h3>1500</h3>
                                                            <p class="text-muted">All time</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 col-lg-4">
                                                    <div class="dash-widget dct-border-rht">
                                                        <div class="circle-bar circle-bar2">
                                                            <div class="circle-graph2" data-percent="65">
                                                                <img src="{{asset('assets/img/icon-02.png')}}" class="img-fluid" alt="Patient">
                                                            </div>
                                                        </div>
                                                        <div class="dash-widget-info">
                                                            <h6>Total Sales</h6>
                                                            <h3>160</h3>
                                                            <p class="text-muted">This month</p>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="col-md-12 col-lg-4">
                                                    <div class="dash-widget">
                                                        <div class="circle-bar circle-bar3">
                                                            <div class="circle-graph3" data-percent="50">
                                                                <img src="{{asset('assets/img/icon-03.png')}}" class="img-fluid" alt="Patient">
                                                            </div>
                                                        </div>
                                                        <div class="dash-widget-info">
                                                            <h6>Inventory</h6>
                                                            <h3>85</h3>
                                                            <p class="text-muted">All time</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-12 col-lg-12">
                                    
                                    <div class="row">
                                        <div class="col-md-6 my-3">
                                            <div class="service-list">
                                                <h4>Last Week Sales</h4>
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            Most Bought Drug:
                                                        </td>
                                                        <td class="text-right">
                                                            Paracetamol
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Most Bought Non-Drug:
                                                        </td>
                                                        <td class="text-right">
                                                            Water
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Sales (Drugs):
                                                        </td>
                                                        <td class="text-right">
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Sales (Non Drugs):
                                                        </td>
                                                        <td class="text-right">
                                                            45
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <canvas id="salesChart" style="width:100%;max-width:700px"></canvas>
                                        </div> 
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-6 my-3">
                                            <div class="service-list">
                                                <h4>Last Week Volume Sales</h4>
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            Most Bought Drug:
                                                        </td>
                                                        <td class="text-right">
                                                            Paracetamol
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Most Bought Non-Drug:
                                                        </td>
                                                        <td class="text-right">
                                                            Water
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Volume (Drugs):
                                                        </td>
                                                        <td class="text-right">
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Volume (Non Drugs):
                                                        </td>
                                                        <td class="text-right">
                                                            45
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <canvas id="volumeChart" style="width:100%;max-width:700px"></canvas>
                                        </div> 
                                    </div>

                                    
                                    
                                    <div class="row mt-5">
                                        <div class="col-md-6">
                                            <div class="service-list">
                                                <h4>Inventory</h4>
                                                <table class="table">
                                                    
                                                    <tr>
                                                        <td>
                                                            Expired Drugs:
                                                        </td>
                                                        <td class="text-right">
                                                            45 <a href="#"> <u>(view)</u> </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Expiring in 6weeks:
                                                        </td>
                                                        <td class="text-right">
                                                            45 <a href="#"> <u>(view)</u> </a>
                                                        </td>
                                                    </tr>
                                                    
                                                    
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

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
<script src="{{asset('plugins/chart/chart.min.js')}}"></script>
<script src="{{asset('plugins/chart/chartjs-plugin-datalabels.min.js')}}"></script>
<script>
    const xSales = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
    const ySales = [100,1100,400,700,900,100,120,1500];
    new Chart("salesChart", {
        plugins: [ChartDataLabels],
        type: "bar",
        data: {
            labels: xSales,
            datasets: [{
                label: "Last Weeks Sales Chart",
                backgroundColor: "rgba(0,0,255,1.0)",
                // borderColor: "rgba(0,0,255,0.1)",
                data: ySales
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Last Weeks Sales Chart"
                },
                datalabels: {
                    color: 'white',
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
            }
        }
    });
</script>
<script>
    const xVolume = ['Paracetamol','Lonart','Amoxil','Penicylin','Ampiclux','Panadol','Vitamin C','Fansidar','Tetracyclin','Ibuprofin'];
    const yVolume = [70,80,101,140,90,100,110,150,200,180];
    new Chart("volumeChart", {
        type: "bar",
        data: {
            labels: xVolume,
            datasets: [{
                label: "Last Weeks Sales Chart",
                backgroundColor: "rgba(0,0,255,1.0)",
                // borderColor: "rgba(0,0,255,0.1)",
                data: yVolume
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Last Weeks Volume Chart"
                },
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            },
        }
    });
</script>
@endpush