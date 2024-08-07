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
                        <h4 class="card-title mb-0">Search Filter</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" method="get">
                            <div class="filter-widget">
                                <div class="">
                                    <input type="text" name="name" value="{{$name}}" class="form-control" placeholder="First or Last Name">
                                </div>			
                            </div>
                            <div class="filter-widget">
                                <div class="">
                                    <input type="text" name="search" value="{{$search}}" class="form-control" placeholder="EMR or Last 4 digits of phone number">
                                </div>			
                            </div>
                            <div class="filter-widget">
                                <div class="cal-icon">
                                    <input type="text" name="created_at" value="{{$created_at}}" class="form-control datetimepicker" placeholder="Record Date">
                                </div>			
                            </div>
                            <div class="filter-widget">
                                <h4>Gender</h4>
                                <div>
                                    <select class="form-control">
                                        <option value="both" @if($gender == 'both') selected @endif>Both</option>
                                        <option value="male" @if($gender == 'male') selected @endif>Male</option>
                                        <option value="female" @if($gender == 'female') selected @endif>Female</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="filter-widget">
                                <h4>Assessment</h4>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="treatment" @if($treatment) checked @endif  value="1">
                                        <span class="checkmark"></span> Undergoing Treatment
                                    </label>
                                </div>
                                
                                
                            </div>
                        
                            <div class="btn-search">
                                <button type="submit" class="btn btn-block">Search</button>
                            </div>	
                        </form>
                    </div>
                    {{-- <div class="card-body">
                        <div class="clinic-booking">
                            <a class="apt-btn" href="booking.html">View Subscription Plans</a>
                        </div>
                    </div> --}}
                    
                </div>
            </div>
            {{-- @include('pharmacy.sidebar') --}}

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <h3>Patients</h3>
                                    <a class="btn btn-primary btn-lg" href="{{route('pharmacy.assessments.create',$pharmacy)}}">New Patient</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>EMR</th>
                                                <th>Patient Name</th>
                                                <th class="">Date Registered</th>
                                                <th>Assessments</th>                                                 
                                                <th>Prescriptions</th>                                                 
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($patients as $patient)
                                                <tr>
                                                    <td>{{strtoupper($patient->emr)}}</td>
                                                    <td>{{$patient->name}}</td>
                                                    <td>{{$patient->created_at->format('d/m/Y')}}</td>
                                                    <td>{{$patient->assessments->count()}}</td>
                                                    <td>{{$patient->prescriptions->count()}}</td>
                                                    <td class="text-center">
                                                        <div class="actions">
                                                            
                                                            <a  href="{{route('pharmacy.patients.show',[$pharmacy,$patient])}}"
                                                                class="btn btn-sm bg-primary-light">
                                                                <i class="fas fa-eye"></i>
                                                                View
                                                            </a>     
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
@push('scripts')
{{-- <script src="{{asset('adminassets/js/script.js')}}"></script> --}}
@endpush
