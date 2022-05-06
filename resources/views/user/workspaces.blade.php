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

            <div class="row  ">
                @include('user.sidebar')
                <div class="col-md-12 col-lg-8 col-xl-9 workspaces">
                    @foreach ($user->pharmacies->where('pivot.status',true) as $pharmacy)
                        <!-- Doctor Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="doctor-widget">
                                    <div class="doc-info-left">
                                        <div class="doctor-img">
                                            <a href="{{route('pharmacy.dashboard',$pharmacy)}}">
                                                <img src="{{asset('storage/pharmacies/logos/'.$pharmacy->image)}}" class="img-fluid" alt="User Image">
                                            </a>
                                        </div>
                                        <div class="doc-info-cont">
                                            <h4 class="doc-name"><a href="{{route('pharmacy.dashboard',$pharmacy)}}">{{$pharmacy->name}}</a></h4>
                                            <p class="doc-speciality">{{$pharmacy->description}}</p>
                                            <h5 class="doc-department">Director</h5>
                                            <div class="rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating">(17)</span>
                                            </div>
                                            <div class="clinic-details">
                                                <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$pharmacy->state->name}}, <img src="{{$pharmacy->country->flag}}" class="img-fluid" alt="flag"></p>
                                                {{-- <ul class="clinic-gallery">
                                                    <li>
                                                        <a href="{{asset('assets/img/features/feature-01.jpg')}}" data-fancybox="gallery">
                                                            <img src="{{asset('assets/img/features/feature-01.jpg')}}" alt="Feature">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{asset('assets/img/features/feature-02.jpg')}}" data-fancybox="gallery">
                                                            <img  src="{{asset('assets/img/features/feature-02.jpg')}}" alt="Feature">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{asset('assets/img/features/feature-03.jpg')}}" data-fancybox="gallery">
                                                            <img src="{{asset('assets/img/features/feature-03.jpg')}}" alt="Feature">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{asset('assets/img/features/feature-04.jpg')}}" data-fancybox="gallery">
                                                            <img src="{{asset('assets/img/features/feature-04.jpg')}}" alt="Feature">
                                                        </a>
                                                    </li>
                                                </ul> --}}
                                            </div>
                                            {{-- <div class="clinic-services">
                                                <span>Dental Fillings</span>
                                                <span> Whitneing</span>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="doc-info-right">
                                        {{-- <div class="clini-infos">
                                            <ul>
                                                <li><i class="far fa-thumbs-up"></i> 98%</li>
                                                <li><i class="far fa-comment"></i> 17 Feedback</li>
                                                <li><i class="fas fa-map-marker-alt"></i> Florida, USA</li>
                                                <li><i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li>
                                            </ul>
                                        </div> --}}
                                        <div class="clinic-booking">
                                            <a class="view-pro-btn" href="{{route('pharmacy.dashboard',$pharmacy)}}">Dashboard</a>
                                            <a class="apt-btn" href="#">Book Appointment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                    @endforeach
                </div>
            </div>

        </div>

    </div>		
    <!-- /Page Content -->
@endsection