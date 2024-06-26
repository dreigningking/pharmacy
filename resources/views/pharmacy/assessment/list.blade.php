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
                            <h4>Diagnosis</h4>			
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
                                    <span class="checkmark"></span> Awaiting Final Diagnosis
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
                                    <span class="checkmark"></span> Undergoing Followup
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
                            <h4>Service Provider</h4>
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
                                    <a class="btn btn-primary btn-lg" href="{{route('pharmacy.assessments.create',$pharmacy)}}">New Assessment</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-center">
                                        <thead class="th-dark">
                                            <tr>
                                                <th>Date</th>
                                                <th>Patient</th>
                                                <th>Diagnosis</th>
                                                <th>Status</th>
                                                <th>Staff</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($assessments as $assessment)
                                            <tr>
                                                <td class="text-nowrap">{{$assessment->created_at->format('d-M-Y')}} <span class="d-block text-info">{{$assessment->created_at->format('h.i A')}}</span></td>
                                                <td>
                                                    <a href="{{route('pharmacy.patients.show',[$pharmacy,$assessment->patient])}}" target="_blank">{{$assessment->patient->emr}}</a> 
                                                </td>
                                                
                                                <td>
                                                    
                                                    @if($assessment->summary)
                                                        {{$assessment->summary}} 
                                                    @else 
                                                        Inconclusive
                                                    @endif
                                                </td>
                                                
                                                <td>
                                                    @if($assessment->status == 'Inconclusive')
                                                        <span class="badge badge-pill bg-dark-light">{{$assessment->status}}</span>
                                                    @elseif($assessment->status == 'Ongoing')
                                                        <span class="badge badge-pill bg-warning-light">{{$assessment->status}}</span>
                                                    @else
                                                        <span class="badge badge-pill bg-success-light">{{$assessment->status}}</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <h2 class="table-avatar">
                                                    
                                                        @if($assessment->user->image)
                                                        <a href="#" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" src="{{asset('storage/user/photo/'.$assessment->user->image)}}" alt="User Image">
                                                        </a>
                                                        @endif 
                                                        <a href="#">{{$assessment->user->name}}</a>
                                                    </h2>
                                                </td>
                                                <td class="text-right">
                                                    <div class="table-action">
                                                        <a href="{{route('pharmacy.assessments.show',[$pharmacy,$assessment])}}" class="btn btn-sm bg-success-light">
                                                            <i class="far fa-edit"></i> View
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                                
                                            @empty
                                                <tr>
                                                    <td></td>
                                                </tr>
                                            @endforelse
                                            
                                        </tbody>
                                    </table>
                                </div>
                                @include('layouts.pagination',['data'=> $assessments])
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