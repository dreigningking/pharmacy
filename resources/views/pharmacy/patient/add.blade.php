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
                    <div class="page-header">
                        <div class="row">

                            <div class="col-sm-12">
                                <!-- <h3 class="page-title">List of Patients</h3> -->
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item active">Add
                                        Patient</li>
                                    <li class="breadcrumb-item "><a
                                            href="{{route('pharmacy.newassessment',$pharmacy)}}">Assessment</a></li>
                                    <li class="breadcrumb-item"><a
                                            href="{{route('pharmacy.prescription',$pharmacy)}}">Prescription</a></li>
                                    <li class="breadcrumb-item"><a
                                            href="{{route('pharmacy.plan',$pharmacy)}}">Non-medication plan</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <form action="{{route('pharmacy.storepatient', $pharmacy)}}" class="w-100" method="POST">@csrf
                            <div class="row justify-content-start mt-4 w-100">



                                <div class="row mt-4 pl-4 pr-2 collapse show w-100 justify-content-center"
                                    id="personal_info">

                                    <div class="row w-100">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label pr-0">First Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="first_name">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label pr-0">Last Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="last_name">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row w-100">
                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label pr-0">Email</label>
                                                <div class="col-lg-9">
                                                    <input type="email" class="form-control" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label pr-0">Phone Number</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="mobile">
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row w-100">
                                    <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label pr-0">Date of
                                                    birth</label>
                                                <div class="col-lg-9">
                                                    <input type="date" class="form-control" name="dob">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label pr-0">Gender</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" id="gender" name="gender">
                                                        <option value="female">Female</option>
                                                        <option value="male">Male</option>
                                                        <option value="other">Other</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="row w-100 justify-content-end pr-4 mt-4">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
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