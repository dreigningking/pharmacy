@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
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
            @include('pharmacy.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <h3>Patients</h3>
                                    <a class="btn btn-primary btn-lg"
                                        href="{{route('pharmacy.patient.create',$pharmacy)}}">New
                                        Patient</a>
                                </div>
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="datatable table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>EMR</th>
                                                    <th>Patient Name</th>
                                                    <th class="">Phone Number</th>
                                                    <th>Email</th>                                                 
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($patients as $patient)
                                                    <tr>
                                                        <td>{{$patient->EMR}}</td>
                                                        <td>{{$patient->name}}</td>
                                                        <td>{{$patient->mobile}}</td>
                                                        <td>{{$patient->email}}</td>
                                                        <td class="text-center">
                                                            <div class="actions">
                                                                <a data-toggle="modal" href="#view_modal{{$patient->id}}"
                                                                    class="btn btn-sm bg-primary-light">
                                                                    <i class="fas fa-eye"></i> View
                                                                </a>
                                                                <a  href="{{route('pharmacy.patient.edit',[$pharmacy,$patient])}}"
                                                                    class="btn btn-sm bg-warning-light">
                                                                    <i class="fas fa-pen"></i>
                                                                    Edit
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

</div>
<!-- /Page Content -->

@endsection
@push('scripts')
<script src="{{asset('adminassets/js/script.js')}}"></script>
@endpush
