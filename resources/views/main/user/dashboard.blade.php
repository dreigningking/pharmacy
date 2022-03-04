@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('adminassets/plugins/morris/morris.css')}}">
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
        <div class="container-fluid">

            <div class="row">
                @include('main.user.sidebar')
                
                <div class="col-md-7 col-lg-8 col-xl-9">

                    <div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
                            <a href="{{route('setup')}}">
							<div class="card">
								<div class="card-body">
									<div class="add-box">
                                        <i class="fe fe-plus add"></i>
                                        <p>Add Pharmacy</p>
                                    </div>
								</div>
							</div></a>
						</div>
                        @foreach ($user->pharmacies as $pharmacy)
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-body p-2">
                                        <a href="{{route('pharmacy.dashboard',$pharmacy)}}">
                                            <div class="dash-widget-header">
                                                {{-- <span class="dash-widget-icon text-success">
                                                    <i class="fe fe-credit-card"></i>
                                                </span> --}}
                                                <img src="{{asset('storage/pharmacies/logos/'.$pharmacy->image)}}" class="img-fluid" style="width:100%;height:150px">
                                                
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6 class="pharmacy-name">{{$pharmacy->name}}</h6>
                                                <div class="location">
                                                    <span><img src="{{$pharmacy->country->flag}}"> {{$pharmacy->state->name.','.$pharmacy->city->name}}</span>
                                                </div>                                           
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
						
						{{-- <div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
										<div class="location">
											<span>Benin</span>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="pharmacy-name">Ramsgate</h6>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
										<div class="location">
											<span>Abuja</span>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="pharmacy-name">Micoson</h6>
										
									</div>
								</div>
							</div>
						</div> --}}
					</div>
                    
                    {{--<div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-4">Patient Appoinment</h4>
                            <div class="appointment-tab">
                            
                                <!-- Appointment Tab -->
                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
                                    </li> 
                                </ul>
                                <!-- /Appointment Tab -->
                                
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
                                                                        <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/patients/patient.jpg')}}" alt="User Image"></a>
                                                                        <a href="patient-profile.html">Richard Wilson <span>#PT0016</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>11 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
                                                                <td>General</td>
                                                                <td>New Patient</td>
                                                                <td class="text-center">$150</td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/patients/patient1.jpg')}}" alt="User Image"></a>
                                                                        <a href="patient-profile.html">Charlene Reed <span>#PT0001</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>3 Nov 2019 <span class="d-block text-info">11.00 AM</span></td>
                                                                <td>General</td>
                                                                <td>Old Patient</td>
                                                                <td class="text-center">$200</td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/patients/patient2.jpg')}}" alt="User Image"></a>
                                                                        <a href="patient-profile.html">Travis Trimble  <span>#PT0002</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>1 Nov 2019 <span class="d-block text-info">1.00 PM</span></td>
                                                                <td>General</td>
                                                                <td>New Patient</td>
                                                                <td class="text-center">$75</td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/patients/patient3.jpg')}}" alt="User Image"></a>
                                                                        <a href="patient-profile.html">Carl Kelly <span>#PT0003</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>30 Oct 2019 <span class="d-block text-info">9.00 AM</span></td>
                                                                <td>General</td>
                                                                <td>Old Patient</td>
                                                                <td class="text-center">$100</td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/patients/patient4.jpg')}}" alt="User Image"></a>
                                                                        <a href="patient-profile.html">Michelle Fairfax <span>#PT0004</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>28 Oct 2019 <span class="d-block text-info">6.00 PM</span></td>
                                                                <td>General</td>
                                                                <td>New Patient</td>
                                                                <td class="text-center">$350</td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/patients/patient5.jpg')}}" alt="User Image"></a>
                                                                        <a href="patient-profile.html">Gina Moore <span>#PT0005</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>27 Oct 2019 <span class="d-block text-info">8.00 AM</span></td>
                                                                <td>General</td>
                                                                <td>Old Patient</td>
                                                                <td class="text-center">$250</td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
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
                                                                        <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/patients/patient6.jpg')}}" alt="User Image"></a>
                                                                        <a href="patient-profile.html">Elsie Gilley <span>#PT0006</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>14 Nov 2019 <span class="d-block text-info">6.00 PM</span></td>
                                                                <td>Fever</td>
                                                                <td>Old Patient</td>
                                                                <td class="text-center">$300</td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/patients/patient7.jpg')}}" alt="User Image"></a>
                                                                        <a href="patient-profile.html">Joan Gardner <span>#PT0006</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>14 Nov 2019 <span class="d-block text-info">5.00 PM</span></td>
                                                                <td>General</td>
                                                                <td>Old Patient</td>
                                                                <td class="text-center">$100</td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/patients/patient8.jpg')}}" alt="User Image"></a>
                                                                        <a href="patient-profile.html">Daniel Griffing <span>#PT0007</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>14 Nov 2019 <span class="d-block text-info">3.00 PM</span></td>
                                                                <td>General</td>
                                                                <td>New Patient</td>
                                                                <td class="text-center">$75</td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/patients/patient9.jpg')}}" alt="User Image"></a>
                                                                        <a href="patient-profile.html">Walter Roberson <span>#PT0008</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>14 Nov 2019 <span class="d-block text-info">1.00 PM</span></td>
                                                                <td>General</td>
                                                                <td>Old Patient</td>
                                                                <td class="text-center">$350</td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/patients/patient10.jpg')}}" alt="User Image"></a>
                                                                        <a href="patient-profile.html">Robert Rhodes <span>#PT0010</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>14 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
                                                                <td>General</td>
                                                                <td>New Patient</td>
                                                                <td class="text-center">$175</td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/patients/patient11.jpg')}}" alt="User Image"></a>
                                                                        <a href="patient-profile.html">Harry Williams <span>#PT0011</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>14 Nov 2019 <span class="d-block text-info">11.00 AM</span></td>
                                                                <td>General</td>
                                                                <td>New Patient</td>
                                                                <td class="text-center">$450</td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
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
                    </div>--}}
                    <div class="row">

						<div class="col-md-6 d-flex">
						
							<!-- Recent Orders -->
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Subscription Details</h4>
								</div>
								<div class="card-body sub-body">
								<div>
                                    <div class="subscription">
                                    <h2 class="sub-first">Subscription type: </h2>
                                    <h2>Silver</h2>
                                </div>
                                 <div class="subscription">
                                    <h3 class="sub-first">Subscription period: </h3>
                                    <h3>Annual</h3>
                                </div>
								<div class="subscription">
                                    <h4 class="sub-first">Start Date: </h4>
                                    <h4>01-02-2022</h4>
                                </div>
								<div class="subscription">
                                    <h5 class="sub-first">Expiry Date: </h5>
                                    <h5>01-02-2022</h5>
                                </div>
                                </div>
                                <div class="sub-btn">
                                    <button class="btn btn-primary">Change Plan</button>
                                </div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
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
													<th>Pharmacy Name</th>
													<th>Revenue</th>
													<th>Expense</th>
																									
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient1.jpg" alt="User Image"></a>
															<a href="profile.html">Medplus Agege </a>
														</h2>
													</td>
													<td>8286329170</td>
													<td>568685</td>
													<!-- <td class="text-right">$100.00</td> -->
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient2.jpg" alt="User Image"></a>
															<a href="profile.html">Medplus Abuja </a>
														</h2>
													</td>
													<td>2077299974</td>
													<td>65796578</td>
													<!-- <td class="text-right">$200.00</td> -->
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient3.jpg" alt="User Image"></a>
															<a href="profile.html">Medplus Gbagada</a>
														</h2>
													</td>
													<td>2607247769</td>
													<td>5876459</td>
													<!-- <td class="text-right">$250.00</td> -->
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient4.jpg" alt="User Image"></a>
															<a href="profile.html">Ramsgate</a>
														</h2>
													</td>
													<td>5043686874</td>
													<td>76598876</td>
													<!-- <td class="text-right">$150.00</td> -->
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient5.jpg" alt="User Image"></a>
															<a href="profile.html">Ramsgate Ibadan</a>
														</h2>
													</td>
													<td>9548207887</td>
													<td>845769458</td>
													<!-- <td class="text-right">$350.00</td> -->
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Feed Activity -->
							
						</div>
					</div>
                    <div class="row">
                        <div class="col-12">
						
							<!-- Sales Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Revenue</h4>
								</div>
								<div class="card-body">
									<div id="morrisArea" class="chart">
                                        <img src="assets/img/chart.png" alt="chart" />
                                    </div>
								</div>
							</div>
							<!-- /Sales Chart -->
							
						</div>
                    </div>
                </div>
            </div>

        </div>

    </div>		
    <!-- /Page Content -->
@endsection