@extends('layouts.main.app')
@push('styles')

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
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                <div class="card search-filter">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Search Filter</h3>
                    </div>
                    <div class="card-body">
                        <div class="filter-widget">
                            <h4>Patient</h4>			
                        </div>
                        <div class="filter-widget">
                            <input type="text" class="form-control" placeholder="Name or EMR">		
                        </div>
                        <div class="filter-widget">
                            <h4>Complaint/Diagnosis</h4>			
                        </div>
                        <div class="filter-widget">
                            <input type="text" class="form-control" placeholder="e.g Headache, High Blood Pressure">		
                        </div>
                        <div class="filter-widget">
                            <h4>Date Range</h4>			
                        </div>
                        <div class="filter-widget">
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" placeholder="From Date">
                            </div>			
                        </div>
                        <div class="filter-widget">
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" placeholder="To Date">
                            </div>			
                        </div>
                        <div class="filter-widget">
                            <h4>Status</h4>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type" checked>
                                    <span class="checkmark"></span> Awaiting Diagnosis
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type" checked>
                                    <span class="checkmark"></span> Ongoing Treatment
                                </label>
                            </div> 
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type" checked>
                                    <span class="checkmark"></span> Awaiting Followup
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type" checked>
                                    <span class="checkmark"></span> Completed
                                </label>
                            </div> 
                            
                        </div>
                        <div class="filter-widget">
                            <h4>Staff</h4>
                            <div>
                                <select class="form-control">
                                    <option>Dr Lewis</option>
                                    <option> Mr Emmanuel</option>
                                </select>
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
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <h3>Assessment</h3>
                                    <a class="btn btn-primary btn-lg"
                                        href="{{route('pharmacy.assessments.create',$pharmacy)}}">New
                                        Assessment</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-center">
                                        <thead class="th-dark">
                                            <tr>
                                                <th>Date</th>
                                                <th>Patient</th>
                                                <th>Complaint/Diagnosis</th>
                                                <th>Status</th>
                                                <th>Staff</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap">14-Nov-2019 <span class="d-block text-info">10.00 AM</span></td>
                                                <td>
                                                    USK3834
                                                </td>
                                                
                                                <td>Fever</td>
                                                
                                                <td><span class="badge badge-pill bg-warning-light">Ongoing</span></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                        </a>
                                                        <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                    </h2>
                                                </td>
                                                <td class="text-right">
                                                    <div class="table-action">
                                                        <a href="{{route('pharmacy.assessments.show',[$pharmacy])}}" class="btn btn-sm bg-success-light">
                                                            <i class="far fa-edit"></i> View
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>14 Nov 2019 <span class="d-block text-info">8.00 PM</span></td>
                                                <td>
                                                    KJSK8232
                                                </td>
                                                <td>Headache</td>
                                                
                                                
                                                <td><span class="badge badge-pill bg-warning-light">Ongoing</span></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                        </a>
                                                        <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                    </h2>
                                                </td>
                                                <td class="text-right">
                                                    <div class="table-action">
                                                        <a href="{{route('pharmacy.assessments.show',[$pharmacy])}}" class="btn btn-sm bg-success-light">
                                                            <i class="far fa-edit"></i> View
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>10 Nov 2019 <span class="d-block text-info">11.00 AM</span></td>
                                                <td>USK3834</td>
                                                <td>Running Nose </td>
                                                
                                                
                                                <td><span class="badge badge-pill bg-danger-light">Cancelled</span></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                        </a>
                                                        <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                    </h2>
                                                </td>
                                                <td class="text-right">
                                                    <div class="table-action">
                                                        <a href="{{route('pharmacy.assessments.show',[$pharmacy])}}" class="btn btn-sm bg-success-light">
                                                            <i class="far fa-edit"></i> View
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>10 Nov 2019<span class="d-block text-info">3.00 PM</span></td>
                                                <td>USK3834</td>
                                                
                                                <td>Headache</td>
                                                
                                                
                                                <td><span class="badge badge-pill bg-warning-light">Awaiting Followup</span></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                        </a>
                                                        <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                    </h2>
                                                </td>
                                                <td class="text-right">
                                                    <div class="table-action">
                                                        <a href="edit-prescription.html" class="btn btn-sm bg-success-light">
                                                            <i class="far fa-edit"></i> View
                                                        </a>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>9 Nov 2019 <span class="d-block text-info">7.00 PM</span></td>
                                                <td>USK3834</td>
                                                
                                                
                                                <td>Fever</td>
                                            
                                                <td><span class="badge badge-pill bg-success-light">Completed</span></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                        </a>
                                                        <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                    </h2>
                                                </td>
                                                <td class="text-right">
                                                    <div class="table-action">
                                                        <a href="{{route('pharmacy.assessments.show',[$pharmacy])}}" class="btn btn-sm bg-success-light">
                                                            <i class="far fa-edit"></i> View
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>8 Nov 2019 <span class="d-block text-info">9.00 AM</span></td>
                                                <td>USK3834</td>
                                                
                                                <td>Pain in the knee</td>
                                                
                                            
                                                <td><span class="badge badge-pill bg-danger-light">Cancelled</span></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                        </a>
                                                        <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                    </h2>
                                                </td>
                                                <td class="text-right">
                                                    <div class="table-action">
                                                        <a href="{{route('pharmacy.assessments.show',[$pharmacy])}}" class="btn btn-sm bg-success-light">
                                                            <i class="far fa-edit"></i> View
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>8 Nov 2019 <span class="d-block text-info">6.00 PM</span></td>
                                                <td>USK3834</td>
                                                
                                                <td>Injury to the head</td>
                                                
                                                
                                                <td><span class="badge badge-pill bg-success-light">Completed</span></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                        </a>
                                                        <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                    </h2>
                                                </td>
                                                <td class="text-right">
                                                    <div class="table-action">
                                                        <a href="{{route('pharmacy.assessments.show',[$pharmacy])}}" class="btn btn-sm bg-success-light">
                                                            <i class="far fa-edit"></i> View
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>7 Nov 2019 <span class="d-block text-info">9.00 PM</span></td>
                                                <td>USK3834</td>
                                                
                                                
                                                <td>Fever</td>
                                                
                                                <td><span class="badge badge-pill bg-info-light">Completed</span></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                        </a>
                                                        <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                    </h2>
                                                </td>
                                                <td class="text-right">
                                                    <div class="table-action">
                                                        <a href="{{route('pharmacy.assessments.show',[$pharmacy])}}" class="btn btn-sm bg-success-light">
                                                            <i class="far fa-edit"></i> View
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6 Nov 2019 <span class="d-block text-info">8.00 PM</span></td>
                                                <td>USK3834</td>
                                                
                                                
                                                <td>Fever</td>
                                                {{-- <td>
                                                    <div class="table-action">
                                                        <a href="{{route('pharmacy.assessments.show',[$pharmacy])}}" class="btn btn-sm bg-primary-light">
                                                            <i class="far fa-clock"></i> Reschedule
                                                        </a>
                                                    </div>
                                                </td> --}}
                                                <td><span class="badge badge-pill bg-info-light">Completed</span></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                        </a>
                                                        <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                    </h2>
                                                </td>
                                                <td class="text-right">
                                                    <div class="table-action">
                                                        <a href="{{route('pharmacy.assessments.show',[$pharmacy])}}" class="btn btn-sm bg-success-light">
                                                            <i class="far fa-edit"></i> View
                                                        </a>
                                                    </div>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5 Nov 2019 <span class="d-block text-info">5.00 PM</span></td>
                                                <td>USK3834</td>
                                                
                                                <td>Running Nose</td>
                                                
                                                
                                                <td><span class="badge badge-pill bg-info-light">Completed</span></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                                        </a>
                                                        <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                    </h2>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{route('pharmacy.assessments.show',[$pharmacy])}}" class="btn btn-sm bg-success-light">
                                                        <i class="far fa-edit"></i> Views
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active">
                                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Next</a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->

@endsection