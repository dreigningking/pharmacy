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
    <div class="container-fluid">

        <div class="row">
            @include('main.director.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">



                <div class="row row-grid">
                    @foreach ($user->pharmacies as $pharmacy)   
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="{{route('pharmacy.dashboard',$pharmacy)}}">
                                    <img class="img-fluid" alt="User Image" src="assets/img/pharmacy-logo2.png">
                                </a>
                                <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </div>
                            <div class="pro-content">
                                <h3 class="title">
                                    <a href="doctor-profile.html">Medicraft</a>
                                    <i class="fas fa-check-circle verified"></i>
                                </h3>


                                <ul class="available-info">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i> Ogba, Lagos
                                    </li>

                                </ul>
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <a href="doctor-profile.html" class="btn btn-primary">View</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="booking.html" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="{{route('pharmacy.dashboard',2)}}">
                                    <img class="img-fluid" alt="User Image" src="assets/img/pharmacy-logo2.png">
                                </a>
                                <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </div>
                            <div class="pro-content">
                                <h3 class="title">
                                    <a href="doctor-profile.html">Micoson</a>
                                    <i class="fas fa-check-circle verified"></i>
                                </h3>

                                <ul class="available-info">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i> Sango ota, Lagos
                                    </li>

                                </ul>
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <a href="doctor-profile.html" class="btn btn-primary">View</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="booking.html" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="{{route('pharmacy.dashboard',2)}}">
                                    <img class="img-fluid" alt="User Image" src="assets/img/pharmacy-logo.jpg">
                                </a>
                                <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </div>
                            <div class="pro-content">
                                <h3 class="title">
                                    <a href="doctor-profile.html">Women's health</a>
                                    <i class="fas fa-check-circle verified"></i>
                                </h3>

                                <ul class="available-info">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>Lekki, Lagos
                                    </li>

                                </ul>
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <a href="doctor-profile.html" class="btn btn-primary">View</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="booking.html" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="{{route('pharmacy.dashboard',2)}}">
                                    <img class="img-fluid" alt="User Image" src="assets/img/pharmacy-logo.jpg">
                                </a>
                                <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </div>
                            <div class="pro-content">
                                <h3 class="title">
                                    <a href="doctor-profile.html">Medicare</a>
                                    <i class="fas fa-check-circle verified"></i>
                                </h3>

                                <ul class="available-info">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>Ota, Ogun State
                                    </li>

                                </ul>
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <a href="doctor-profile.html" class="btn btn-primary">View</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="booking.html" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="{{route('pharmacy.dashboard',2)}}">
                                    <img class="img-fluid" alt="User Image" src="assets/img/pharmacy-logo2.png">
                                </a>
                                <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </div>
                            <div class="pro-content">
                                <h3 class="title">
                                    <a href="doctor-profile.html">Bolatito Pharmacy</a>
                                    <i class="fas fa-check-circle verified"></i>
                                </h3>

                                <ul class="available-info">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>Agege, Lagos
                                    </li>

                                </ul>
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <a href="doctor-profile.html" class="btn btn-primary">View</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="booking.html" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="{{route('pharmacy.dashboard',2)}}">
                                    <img class="img-fluid" alt="User Image" src="assets/img/pharmacy-logo.jpg">
                                </a>
                                <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </div>
                            <div class="pro-content">
                                <h3 class="title">
                                    <a href="doctor-profile.html">Ramsgate</a>
                                    <i class="fas fa-check-circle verified"></i>
                                </h3>

                                <ul class="available-info">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i> Sango Ota, Ogun State
                                    </li>

                                </ul>
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <a href="doctor-profile.html" class="btn btn-primary">View</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="booking.html" class="btn btn-danger">Delete</a>
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