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
    <section class="section section-features">
        <div class="container-fluid">
           <div class="row">
                <div class="col-md-5 features-img">
                    <img src="{{asset('assets/img/pharmacies/1.jpg')}}" class="img-fluid" alt="Feature">
                </div>
                <div class="col-md-7">
                    <div class="section-header">	
                        <h2 class="mt-2">Availabe Modules</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                    </div>	
                    <div class="row">
                        <!-- Slider Item -->
                        <div class="feature-item text-center col-md-3 mb-2">
                            <a href="#">
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
    </section>	
    {{-- <div class="container-fluid cont">

        <div class="row">
            @include('pharmacy.sidebar')
            <div class="col-md-7 col-lg-8 col-xl-9">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card dash-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget dct-border-rht">
                                            <div class="circle-bar circle-bar1">
                                                <div class="circle-graph1" data-percent="75">
                                                    <img src="{{asset('assets/img/icon-01.png')}}')}}" class="img-fluid"
                                                        alt="patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h3>Patients</h3>
                                                <h5>{{$patients->count()}}</h5>
                                                <!-- <p class="text-muted">Till Today</p> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget dct-border-rht">
                                            <div class="circle-bar circle-bar2">
                                                <div class="circle-graph2" data-percent="65">
                                                    <img src="{{asset('assets/img/icon-02.png')}}')}}" class="img-fluid"
                                                        alt="Patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h3>drugs</h3>
                                                <h5>{{$drugs->count()}}</h5>
                                                <!-- <p class="text-muted">06, Nov 2019</p> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget">
                                            <div class="circle-bar circle-bar3">
                                                <div class="circle-graph3" data-percent="50">
                                                    <img src="{{asset('assets/img/icon-03.png')}}')}}" class="img-fluid"
                                                        alt="Patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h3>Revenue</h3>
                                                <h5>Plenty money</h5>
                                                <!-- <p class="text-muted">06, Apr 2019</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 ml-3">
                        <div class="row justify-content-start mb-4 dashboard-menu">
                            <a class="btn btn-primary btn-lg first"
                                href="{{route('pharmacy.patient.create',$pharmacy)}}">New
                                Patients</a>
                        </div>
                    </div>
                    <div class="col-sm-3 ml-3">
                        <div class="row justify-content-start mb-4 dashboard-menu">
                            <a class="btn btn-primary btn-lg second dash-btn" data-toggle="modal" href="#sales">New
                                Sales</a>
                        </div>
                    </div>
                    <!-- <div class="col-sm-3 ml-3">
                        <div class="row justify-content-start mb-4 dashboard-menu">
                            <a class="btn btn-primary btn-lg third dash-btn" data-toggle="modal" href="#supply">New
                                Supply</a>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Notification</h4>
                            </div>
                            <div class="card-body">
                                <div class="row notif">

                                    <div class="col-sm-8">
                                        <p class="text-muted">Expired drugs</p>
                                    </div>
                                    <div class="col-sm-4 d-flex justify-content-end">
                                        <span class="badge badge-pill badge-danger notif-badge">4</span>
                                    </div>


                                </div>
                                <div class="row notif">

                                    <div class="col-sm-8">
                                        <p class="text-muted">Patient Feedback</p>
                                    </div>
                                    <div class="col-sm-4 d-flex justify-content-end">
                                        <span class="badge badge-pill badge-info notif-badge">4</span>
                                    </div>


                                </div>

                                <div class="row notif">

                                    <div class="col-sm-8">
                                        <p class="text-muted">Upcoming Appointment</p>
                                    </div>
                                    <div class="col-sm-4 d-flex justify-content-end">
                                        <span class="badge badge-pill badge-success notif-badge">4</span>
                                    </div>


                                </div>
                                <div class="row notif">

                                    <div class="col-sm-8">
                                        <p class="text-muted">Upcoming Appointment</p>
                                    </div>
                                    <div class="col-sm-4 d-flex justify-content-end">
                                        <span class="badge badge-pill badge-success notif-badge">4</span>
                                    </div>


                                </div>
                                <div class="row notif">

                                    <div class="col-sm-8">
                                        <p class="text-muted">Incoming Transfers</p>
                                    </div>
                                    <div class="col-sm-4 d-flex justify-content-end">
                                        <span class="badge badge-pill badge-info notif-badge">4</span>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6 d-flex">

                        <!-- Feed Activity -->
                        <div class="card  card-table flex-fill">
                            <div class="card-header">
                                <h4 class="card-title">Revenue</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Revenue<br /> today</th>
                                                <th>Total <br /> revenue</th>
                                                <!-- <th>Paid</th>													 -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    01-02-2022
                                                </td>
                                                <td>82863</td>
                                                <td>856459</td>
                                                <!-- <td class="text-right">$100.00</td> -->
                                            </tr>
                                            <tr>
                                                <td>
                                                    02-02-2022
                                                </td>
                                                <td>2077</td>
                                                <td>5784475</td>
                                                <!-- <td class="text-right">$200.00</td> -->
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!-- <h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient3.jpg')}}" alt="User Image"></a>
															<a href="profile.html">Carl Kelly</a>
														</h2> -->
                                                    03-02-2022
                                                </td>
                                                <td>26072</td>
                                                <td>21568754</td>
                                                <!-- <td class="text-right">$250.00</td> -->
                                            </tr>
                                            <tr>
                                                <td>
                                                    04-02-2022
                                                </td>
                                                <td>50436</td>
                                                <td>6586944</td>
                                                <!-- <td class="text-right">$150.00</td> -->
                                            </tr>
                                            <tr>
                                                <td>
                                                    05-02-2022
                                                </td>
                                                <td>9548</td>
                                                <td>846745876</td>
                                                <!-- <td class="text-right">$350.00</td> -->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Feed Activity -->

                    </div>
                    <div class="col-md-6 d-flex">

                        <!-- Recent Orders -->
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h4 class="card-title">Expenses</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Expenses <br /> today</th>
                                                <th>Total <br /> Expenses</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    01-02-2022
                                                </td>
                                                <td>82863</td>
                                                <td>856459</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    01-02-2022
                                                </td>
                                                <td>82863</td>
                                                <td>856459</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    01-02-2022
                                                </td>
                                                <td>82863</td>
                                                <td>856459</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    01-02-2022
                                                </td>
                                                <td>82863</td>
                                                <td>856459</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    01-02-2022
                                                </td>
                                                <td>82863</td>
                                                <td>856459</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Recent Orders -->

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">Assessments</h4>
                        <div class="appointment-tab">



                            <div class="tab-content">

                                <!-- Upcoming Appointment Tab -->
                                <div class="tab-pane show active" id="upcoming-appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Patient Name</th>
                                                            <th>Type</th>
                                                            <th>Date</th>
                                                            <!-- <th>Purpose</th> -->

                                                            <th class="text-center">Amount</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('assets/img/patients/patient.jpg')}}')}}"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Richard Wilson
                                                                        <span>#PT0016</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>New Patient</td>
                                                            <td>11 Nov 2019</td>
                                                            <!-- <td>General</td> -->

                                                            <td class="text-center">$150</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                    <!-- <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a> -->
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('assets/img/patients/patient1.jpg')}}')}}"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Charlene Reed
                                                                        <span>#PT0001</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>Old Patient</td>
                                                            <td>3 Nov 2019</td>
                                                            <!-- <td>General</td> -->

                                                            <td class="text-center">$200</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                    <!-- <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a> -->
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('assets/img/patients/patient2.jpg')}}')}}"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Travis Trimble
                                                                        <span>#PT0002</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>New Patient</td>
                                                            <td>1 Nov 2019</td>
                                                            <!-- <td>General</td> -->

                                                            <td class="text-center">$75</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                    <!-- <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a> -->
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('assets/img/patients/patient3.jpg')}}')}}"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Carl Kelly
                                                                        <span>#PT0003</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>Old Patient</td>
                                                            <td>30 Oct 2019</td>
                                                            <!-- <td>General</td> -->

                                                            <td class="text-center">$100</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                    <!-- <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a> -->
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('assets/img/patients/patient4.jpg')}}')}}"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Michelle Fairfax
                                                                        <span>#PT0004</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>New Patient</td>
                                                            <td>28 Oct 2019 </td>
                                                            <!-- <td>General</td>
                                                                 -->
                                                            <td class="text-center">$350</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('assets/img/patients/patient5.jpg')}}')}}"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Gina Moore
                                                                        <span>#PT0005</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>Old Patient</td>
                                                            <td>27 Oct 2019</td>
                                                            <!-- <td>General</td> -->

                                                            <td class="text-center">$250</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                    <!-- <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a> -->
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Upcoming Appointment Tab -->

                                <!-- Today Appointment Tab -->
                                <div class="tab-pane" id="today-appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Patient Name</th>
                                                            <th>Appt Date</th>
                                                            <th>Purpose</th>
                                                            <th>Type</th>
                                                            <th class="text-center">Paid Amount</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('assets/img/patients/patient6.jpg')}}')}}"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Elsie Gilley
                                                                        <span>#PT0006</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">6.00
                                                                    PM</span></td>
                                                            <td>Fever</td>
                                                            <td>Old Patient</td>
                                                            <td class="text-center">$300</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('assets/img/patients/patient7.jpg')}}')}}"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Joan Gardner
                                                                        <span>#PT0006</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">5.00
                                                                    PM</span></td>
                                                            <td>General</td>
                                                            <td>Old Patient</td>
                                                            <td class="text-center">$100</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('assets/img/patients/patient8.jpg')}}')}}"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Daniel Griffing
                                                                        <span>#PT0007</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">3.00
                                                                    PM</span></td>
                                                            <td>General</td>
                                                            <td>New Patient</td>
                                                            <td class="text-center">$75</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('assets/img/patients/patient9.jpg')}}')}}"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Walter Roberson
                                                                        <span>#PT0008</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">1.00
                                                                    PM</span></td>
                                                            <td>General</td>
                                                            <td>Old Patient</td>
                                                            <td class="text-center">$350</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('assets/img/patients/patient10.jpg')}}')}}"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Robert Rhodes
                                                                        <span>#PT0010</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">10.00
                                                                    AM</span></td>
                                                            <td>General</td>
                                                            <td>New Patient</td>
                                                            <td class="text-center">$175</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('assets/img/patients/patient11.jpg')}}')}}"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile.html">Harry Williams
                                                                        <span>#PT0011</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>14 Nov 2019 <span class="d-block text-info">11.00
                                                                    AM</span></td>
                                                            <td>General</td>
                                                            <td>New Patient</td>
                                                            <td class="text-center">$450</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
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
                                <!-- /Today Appointment Tab -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div> --}}

</div>

<!-- /Page Content -->
@endsection
@push('scripts')
{{-- <script src="{{asset('assets/js/jqueryy.js')}}"></script> --}}
<script src="{{asset('assets/js/jqueryui.min.js')}}"></script>
{{-- <script>
$(document).ready(function() {

    var $content, $modal, $apnData, $modalCon;

    $content = $(".min");

    //To fire modal
    $(".dash-btn").click(function(e) {
        e.preventDefault();
        var $id = $(this).attr("data-target");
        $($id).modal({
            backdrop: static,
            keyboard: true
        })

    });

    $(".minimize").on("click", function() {

        $modalCon = $(this).closest(".dash-modal").attr("id");

        $apnData = $(this).closest(".show");

        $modal = "#" + $modalCon;

        $(".modal-backdrop").addClass("display-none");

        $($modal).toggleClass("min");

        if ($($modal).hasClass("min")) {

            $(".minmaxCon").append($apnData);

            $(this).find("i").toggleClass('fa-minus').toggleClass('fa-clone');

        } else {

            $("body").append($apnData);

            $(this).find("i").toggleClass('fa-clone').toggleClass('fa-minus');

        };

    });
    $("button[data-dismiss='modal']").click(function() {

        $(this).closest(".dash-modal").removeClass("min");

        $(".content").removeClass($apnData);

        $(this).next('.minimize').find("i").removeClass('fa fa-clone').addClass('fa fa-minus');

    });

})
$(".physical-assessment").on('click', '.trash', function() {
    $(this).closest('.physical').remove();
    return false;
});
$(".add-physical").on('click', function() {
    console.log("meh")
    var regcontent = ' <div class="col-11 physical d-flex">' +
        ' <div class="col-md-6 pr-0 pl-0">' +
        '<div class="form-group row">' +
        ' <div class="col-lg-11">' +
        '<select class="form-control" id="sel1">' +
        '<option value="Temp (&deg;c)">Temp (&deg;c)</option>' +
        '<option value="BP (mmHg)">BP (mmHg)</option>' +
        '<option value="PR (Beats/min)">PR (Beats/min)</option>' +
        '<option value="Wt (Kg)">Wt (Kg)</option>' +
        '<option value="Ht (m)">Ht (m)</option>' +
        ' </select>' +
        '</div>' +
        '</div>' +
        '</div>' +
        ' <div class="col-md-6 pr-0 pl-0">' +
        ' <div class="form-group row">' +
        ' <div class="col-lg-11">' +
        '<input type="text" class="form-control">' +
        ' </div>' +
        ' </div>' +
        ' </div>' +
        '<div class="col-1 pr-0 pl-0 d-flex align-items-start justify-content-end" >' +
        '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
        '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
        '</div>' +
        '</div>';

    $(".physical-assessment").append(regcontent);
    return false;
});


$(".past-med").on('click', '.trash', function() {
    $(this).closest('.past').remove();
    return false;
});
$(".add-past").on('click', function() {
    console.log("meh")
    var regcontent = ' <div class = "col-11 physical d-flex align-items-start mt-2 mb-2 past" > ' +
        ' <div class="col-md-7 pl-0 pr-0">' +
        '<div class="form-group row">' +
        ' <div class="col-lg-11">' +
        '<div class="form-group d-flex align-items-center">' +
        '<label for="usr">Medication:</label>' +
        '<input type="text" name="" id="" class = "ml-2 form-control" > ' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        ' <div class="col-md-4 pr-0 pl-0">' +
        ' <div class="form-group row">' +
        '<div class="col-lg-4">' +
        '<p>Effective?</p>' +
        '</div>' +
        '<div class="col-lg-8">' +
        '<div class="form-check-inline">' +
        '<label class="form-check-label">' +
        '<input type="radio" class="form-check-input" name = "optradio" > Yes ' +
        '</label>' +
        '</div>' +
        '<div class="form-check-inline">' +
        '<label class="form-check-label">' +
        '<input type="radio" class="form-check-input" name = "optradio" > No ' +
        '</label>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '<div class="col-1 pr-0 pl-0 d-flex align-items-start justify-content-end" >' +
        '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
        '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
        '</div>' +
        '</div>' +
        '</div>';

    $(".past-med").append(regcontent);
    return false;
});


$(".prescriptions").on('click', '.trash', function() {
    $(this).closest('.prescription').remove();
    return false;
});
$(".add-prescription").on('click', function() {
    console.log("meh")
    var regcontent = '<div class="col-md-12 pl-0 prescription">' +
        ' <div class="form-group row">' +
        '<label class="col-lg-2 col-form-label pr-0">Prescription</label>' +
        '<div class="col-lg-9">' +
        '<input type="text" class="form-control">' +
        '</div>' +
        '<div class="col-1 pr-0 pl-0 d-flex align-items-start justify-content-end" >' +
        '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
        '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
        '</div>' +
        '</div>' +

        '</div>';

    $(".prescriptions").append(regcontent);
    return false;
});
$(".plans").on('click', '.trash', function() {
    $(this).closest('.plan').remove();
    return false;
});
$(".add-plan").on('click', function() {
    console.log("meh")
    var regcontent = '<div class="col-md-12 pl-0 plan">' +
        ' <div class="form-group row">' +
        '<label class="col-lg-2 col-form-label pr-0"></label>' +
        '<div class="col-lg-9">' +
        '<input type="text" class="form-control">' +
        '</div>' +
        '<div class="col-1 pr-0 pl-0 d-flex align-items-start justify-content-end" >' +
        '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
        '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
        '</div>' +
        '</div>' +

        '</div>';

    $(".plans").append(regcontent);
    return false;
});
$(document).ready(function() {

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $(".next").click(function() {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({
                    'opacity': opacity
                });
            },
            duration: 600
        });
    });

    $(".previous").click(function() {

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({
                    'opacity': opacity
                });
            },
            duration: 600
        });
    });

    $('.radio-group .radio').click(function() {
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });

    $(".submit").click(function() {
        return false;
    })

});
</script>
@endpush --}}

{{-- @section('modals')
    <!-- Sales Modal -->
<div class="modal fade custom-modal dash-modal" id="sales" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Sales</h5>
                <div class="modal-control">
                    <button class="minimize">
                        <span aria-hidden="true"><i class="fas fa-minus"></i></span>
                    </button>
                    <button type="button" class="close end" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>

<!-- Sales Modal -->


<!-- Supply Modal -->
<div class="modal fade custom-modal dash-modal" id="supply" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered supply">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Supply</h5>
                <div class="modal-control">
                    <button class="minimize">
                        <span aria-hidden="true"><i class="fas fa-minus"></i></span>
                    </button>
                    <button type="button" class="close end" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                        <form action="">
                            <div class="container-fluid pl-0 pr-0">
                                <div class="row ">
                                    <div class="col-md-7">
                                        <div class="form-group row align-items-center">
                                            <label for="usr" class="col-3">Invoice No:</label>
                                            <input type="text" class="form-control col-9" id="usr">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row w-100 justify-content-end">
                                            <a class="btn btn-primary btn-lg" data-toggle="modal" href="#">Add New
                                                Drug</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-7">
                                        <div class="form-group row align-items-center">
                                            <label for="usr" class="col-3">Supply:</label>
                                            <select class="form-control col-9" id="sel1">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row w-100 justify-content-end">
                                            <a class="btn btn-primary btn-lg" data-toggle="modal" href="#">Add
                                                Supplier</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-7">
                                        <div class="form-group row align-items-center">
                                            <label for="usr" class="col-3">Date:</label>
                                            <input type="date" class="form-control col-9" id="usr">
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

<!-- Sales Modal -->
@endsection --}}