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
            @include('pharmacy.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">


                <!-- Page Wrapper -->
                <div class="page-wrapper">
                    <div class="content container-fluid">

                        <!-- Page Header -->
                        <div class="page-header">
                            <div class="row">
                            <div class="col-sm-12">
                                    <div class="row justify-content-end mb-4">
                                        <a class="btn btn-primary btn-lg"
                                            href="{{route('pharmacy.addpatient',$pharmacy)}}">New
                                            Patient</a>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-12">
                                    <h3 class="page-title">List of Patients</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                                        <li class="breadcrumb-item active">Patient</li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                        <!-- /Page Header -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div class="table-responsive">
                                                <table class="datatable table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>EMR</th>
                                                            <th>Patient Name</th>

                                                            <th class="">Phone Number</th>
                                                            <th>Email</th>
                                                            <th>Age</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($patients as $patient)
                                                        <tr>
                                                            <td>{{$patient->EMR}}</td>
                                                            <td>
                                                                <!-- <h2 class="table-avatar">
                                                                    <a href="profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('assets/img/patients/patient1.jpg')}}"
                                                                            alt="User Image"></a>
                                                                    <p href="profile.html"></p>
                                                                </h2> -->
                                                                {{$patient->name}}
                                                            </td>


                                                            <td>
                                                            {{$patient->mobile}}
                                                            </td>
                                                            <td>{{$patient->email}}</td>
                                                            <td>{{$patient->dob->diffInYears(now())}}</td>

                                                            <td class="text-center">
                                                                <div class="actions">

                                                                    <a href="{{route('pharmacy.showpatients',$pharmacy)}}"
                                                                        class="btn btn-sm bg-info-light">
                                                                        <i class="fas fa-eye"></i> View
                                                                    </a>
                                                                    <!-- <a data-toggle="modal" href="#edit_modal"
                                                                        class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-pen"></i>
                                                                        Edit
                                                                    </a>
                                                                    <a data-toggle="modal" href="#edit_modal"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-pen"></i>
                                                                        Delete
                                                                    </a> -->
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
                <!-- /Page Wrapper -->


            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->

@endsection
