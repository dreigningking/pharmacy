@extends('layouts.main.app')
@push('styles')


<link rel="stylesheet" href="{{asset('plugins/fancybox/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

@endpush
@section('main')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Pricing</h2>
            </div>
           
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            
            
            <div class="col-md-12 col-lg-8 col-xl-9">

                <!-- Doctor Widget -->
                @foreach ($plans->where('slug','pharmacy_plan') as $plan)
                    <div class="card">
                        <div class="card-body">
                            <div class="doctor-widget">
                                <div class="doc-info-left pr-3">
                                    <div class="doc-info-cont">
                                        <h4 class="doc-name"><a href="doctor-profile.html">{{$plan->name}}</a></h4>
                                        <p class="doc-speciality">{{$plan->description}}</p>
                                        <h6 class="m-1">Modules:</h6>
                                        <div class="clinic-services">  
                                            <span class="m-1"> Pharmacy Management</span>
                                            <span class="m-1"> Patient Management</span>
                                            <span class="m-1"> Assessment Management</span>
                                            <span class="m-1"> Prescription Management</span>
                                            <span class="m-1"> Inventory Management</span>
                                            <span class="m-1"> Sales Management</span>
                                        </div>
                                        <h6 class="m-1">Features:</h6>
                                        <div class="clinic-details">
                                            <ul class="clinic-gallery">
                                                <li>
                                                    <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
                                                        <img src="assets/img/features/feature-01.jpg" alt="Feature">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
                                                        <img  src="assets/img/features/feature-02.jpg" alt="Feature">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
                                                        <img src="assets/img/features/feature-03.jpg" alt="Feature">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
                                                        <img src="assets/img/features/feature-04.jpg" alt="Feature">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="doc-info-right">
                                    <div class="clini-infos">
                                        <ul>
                                            <li><i class="far fa-envelope"></i> Unlimited Emails</li>
                                            <li><i class="far fa-comment"></i> 17 SMS Units</li>
                                            <li>
                                                <i class="far fa-money-bill-alt"></i> 
                                                {{session('currency_symbol')}} {{$plan->price['monthly']}} Per License 
                                                <i class="fas fa-info-circle" data-toggle="tooltip" title="{{session('currency_symbol')}} {{$plan->price['yearly']}} per year"></i> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clinic-booking">
                                        
                                        <a class="view-pro-btn" href="doctor-profile.html">Try for {{$plan->trial['days']}} days</a>
                                    </div>
                                </div>
                            </div>
                            <div class="clinic-booking">
                                @auth
                                <form action="" method="post" class="d-md-flex justify-content-between ">
                                    <input type="number" class="form-control" name="" placeholder="Number of Licenses">
                                    <select class="form-control">
                                        <option value="">1 Months</option>
                                        <option value="">2 Months</option>
                                        <option value="">3 Months</option>
                                        <option value="">6 Months</option>
                                        <option value="">12 Months (1 year)</option>
                                        <option value="">24 Months (2 years)</option>
                                        <option value="">36 Months (3 years)</option>
                                    </select>
                                    <a class="apt-btn" href="booking.html">Buy Subscription</a>
                                </form>
                                @else
                                <a class="apt-btn" href="booking.html">Buy Subscription</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- /Doctor Widget -->

                <!-- Doctor Widget -->
                @foreach ($plans->where('slug','analytics_plan') as $plan)
                    <div class="card">
                        <div class="card-body">
                            <div class="doctor-widget">
                                <div class="doc-info-left pr-3">
                                    <div class="doc-info-cont">
                                        <h4 class="doc-name"><a href="doctor-profile.html">{{$plan->name}}</a></h4>
                                        <p class="doc-speciality">{{$plan->description}}</p>
                                        <h6 class="m-1">Modules:</h6>
                                        <div class="clinic-services">  
                                            <span class="m-1"> Inventory Charts</span>
                                            <span class="m-1"> Workers </span>
                                            
                                        </div>
                                        <h6 class="m-1">Features:</h6>
                                        <div class="clinic-details">
                                            <ul class="clinic-gallery">
                                                <li>
                                                    <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
                                                        <img src="assets/img/features/feature-01.jpg" alt="Feature">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
                                                        <img  src="assets/img/features/feature-02.jpg" alt="Feature">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
                                                        <img src="assets/img/features/feature-03.jpg" alt="Feature">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
                                                        <img src="assets/img/features/feature-04.jpg" alt="Feature">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="doc-info-right">
                                    <div class="clini-infos">
                                        <ul>
                                            <li><i class="far fa-envelope"></i> Unlimited Emails</li>
                                            <li><i class="far fa-comment"></i> 17 SMS Units</li>
                                            <li>
                                                <i class="far fa-money-bill-alt"></i> 
                                                {{session('currency_symbol')}} {{$plan->price['monthly']}} Per License 
                                                <i class="fas fa-info-circle" data-toggle="tooltip" title="{{session('currency_symbol')}} {{$plan->price['yearly']}} per year"></i> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clinic-booking">
                                        
                                        <a class="view-pro-btn" href="doctor-profile.html">Try for {{$plan->trial['days']}} days</a>
                                    </div>
                                </div>
                            </div>
                            <div class="clinic-booking">
                                @auth
                                <form action="" method="post" class="d-md-flex justify-content-between ">
                                    <input type="number" class="form-control" name="" placeholder="Number of Licenses">
                                    <select class="form-control">
                                        <option value="">1 Months</option>
                                        <option value="">2 Months</option>
                                        <option value="">3 Months</option>
                                        <option value="">6 Months</option>
                                        <option value="">12 Months (1 year)</option>
                                        <option value="">24 Months (2 years)</option>
                                        <option value="">36 Months (3 years)</option>
                                    </select>
                                    <a class="apt-btn" href="booking.html">Buy Subscription</a>
                                </form>
                                @else
                                <a class="apt-btn" href="booking.html">Buy Subscription</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- /Doctor Widget -->

                <!-- Doctor Widget -->
                @foreach ($plans->where('slug','sms_plan') as $plan)
                    <div class="card">
                        <div class="card-body">
                            <div class="doctor-widget">
                                <div class="doc-info-left pr-3">
                                    <div class="doc-info-cont">
                                        <h4 class="doc-name"><a href="doctor-profile.html">{{$plan->name}}</a></h4>
                                        <p class="doc-speciality">{{$plan->description}}</p>
                                        @auth
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th></th>
                                                    <th>Pharmacy</th>
                                                    <th>Remaining</th>
                                                    <th>Purchase</th>
                                                    <th>Amount</th>
                                                </tr>
                                                @foreach (auth()->user()->pharmacies as $pharmacy)
                                                    <tr>
                                                        <td><input type="checkbox" checked class="form-control" name=""></td>
                                                        <td class="align-middle">{{$pharmacy->name}}</td>
                                                        <td class="align-middle">{{$pharmacy->sms_credit}}</td>
                                                        <td class="align-middle">
                                                            <input type="number" class="form-control" name="" value="{{$plan->minimum['units']}}">    
                                                        </td>      
                                                        <td class="align-middle">
                                                            {{session('currency_symbol')}} {{session('currency_code') == 'NGN' ? $plan->price['unit'] * $plan->minimum['units'] : $plan->price['unit'] * $plan->minimum['units']}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                            
                                        </div>
                                        @endauth
                                    </div>
                                </div>
                                <div class="doc-info-right">
                                    <div class="clini-infos">
                                        <ul>
                                            <li><i class="far fa-money-bill-alt"></i> {{session('currency_symbol')}} {{$plan->price['unit']}} Per SMS  </li>
                                        </ul>
                                    </div>
                                    <div class=" clinic-booking">
                                        @auth
                                        <p>Total Units: <span class="font-weight-bold">{{auth()->user()->pharmacies->count() * $plan->minimum['units']}}</span></p>
                                        @php $amount =  (session('currency_code') == 'NGN') ? $plan->price['unit'] : $plan->price['unit'] @endphp
                                        <p>Total Cost: <span class="font-weight-bold">{{session('currency_symbol')}}{{auth()->user()->pharmacies->count() * $plan->minimum['units'] * $amount}}</span></p>
                                        <a class="apt-btn" href="booking.html">Buy SMS</a>
                                        @else
                                        <a class="apt-btn" href="booking.html">Buy SMS</a>
                                        @endauth
                                    </div>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
                <!-- /Doctor Widget -->

                
            </div>
        </div>

    </div>

</div>		
<!-- /Page Content -->
@endsection
@push('scripts')
<script src="{{asset('plugins/fancybox/jquery.fancybox.min.js')}}"></script>
    
@endpush