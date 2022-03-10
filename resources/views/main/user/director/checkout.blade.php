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
            <div class="col-md-7 col-lg-8">
                <div class="card">
                    <div class="card-body">

                        <!-- Checkout Form -->
                        <div>

                            <!-- Personal Information -->
                            <div class="info-widget">
                                <h4 class="card-title">Personal Information</h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name" value="{{Auth::check() ? Auth::user()->name :''}}"
                                                readOnly>
                                        </div>
                                    </div>

                                    <div class=" col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" readOnly
                                                value="{{Auth::check() ? Auth::user()->email :''}}">
                                        </div>
                                    </div>

                                </div>
                                @guest 
                                    <div class="exist-customer">Existing Customer? 
                                        <form class="d-inline" action="{{route('pay')}}" method="POST">@csrf
                                            <button type="submit" class="border-0 bg-white"><u>Click here to login</u></button>
                                        </form> 
                                    </div> 
                                @endguest
                                
                            </div>
                            <!-- /Personal Information -->

                            <div class="payment-widget">
                                <h4 class="card-title">Payment Method</h4>



                                <!-- Paypal Payment -->
                                <div class="payment-list">
                                    <label class="payment-radio paypal-option">
                                        <input type="radio" name="radio" checked>
                                        <span class="checkmark"></span>
                                        Online Payment
                                    </label>
                                </div>
                                <!-- /Paypal Payment -->

                                <!-- Terms Accept -->
                                <div class="terms-accept">
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="terms_accept">
                                        <label for="terms_accept">I have read and accept <a
                                                href="{{route('agreement')}}">Terms &amp;
                                                Conditions</a></label>
                                    </div>
                                </div>
                                <!-- /Terms Accept -->
                                <form action="{{route('pay')}}" method="POST">@csrf

                                    <input type="hidden" name="trial" value="{{$trial}}">
                                    <input type="hidden" name="plan_id" value="{{$plan->id}}">
                                    <!-- Submit Section -->
                                    <div class="submit-section mt-4">
                                        <button type="submit" class="btn btn-primary submit-btn disabled" @guest disabled="true" @endguest id="checkout">Continue</button>
                                    </div>
                                    <!-- /Submit Section -->
                                </form>
                            </div>
                        </div>
                        <!-- /Checkout Form -->

                    </div>
                </div>

            </div>

            <div class=" col-md-5 col-lg-4 theiaStickySidebar">

                <!-- Booking Summary -->
                <div class="card booking-card">
                    <div class="card-header">
                        <h4 class="card-title">Checkout Summary</h4>
                    </div>
                    <div class="card-body">

                        <!-- Booking Doctor Info -->

                        <div class="booking-doc-info">
                            {{-- @if($plan->name == "Bronze")
                                @auth
                                <div class="row">
                                    <a href="#" class="booking-doc-img">
                                        <img src="{{asset('storage/pharmacies/logos/'.Auth::user()->pharmacies->first()->image)}}"
                                            alt="User Image">
                                    </a>
                                    <div class="booking-info">
                                        <h4><a href="doctor-profile.html">
                                                {{Auth::user()->pharmacies->first()->name}}
                                            </a>
                                        </h4>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">35</span>
                                        </div>
                                        <div class="clinic-details">
                                            <p class="doc-location"><i class="fas fa-map-marker-alt"></i>
                                                {{Auth::user()->pharmacies->first()->state->name.','.Auth::user()->pharmacies->first()->city->name}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endauth

                            @endif --}}
                            <!-- Booking Doctor Info -->

                            <div class="booking-summary">
                                <div class="booking-item-wrap">
                                    <ul class="booking-date">
                                        <li>Plan Name <span>{{$plan->name}} @if($trial)<i>Trial</i>  @endif</span></li>
                                        <li>Plan Duration <span>{{$trial ? $plan->trial.' days' : $plan->duration.' '.Illuminate\Support\Str::plural('month',$plan->duration)}}</span></li>
                                    </ul>
                                    <ul class="booking-fee">
                                        <li>Start Date <span>{{now()->format("Y-m-d")}}</span>
                                        </li>
                                        <li>End Date
                                            <span> @if($trial) 
                                                        {{now()->addDays($plan->trial)->format("Y-m-d")}}
                                                    @else
                                                        {{now()->addMonths($plan->duration)->format("Y-m-d")}}
                                                    @endif
                                            </span>
                                        </li>
                                        <li>Amount <span>₦ @if($trial) 0 @else {{$plan->amount}} @endif</span></li>
                                    </ul>
                                    <div class="booking-total">
                                        <ul class="booking-total-list">
                                            <li>
                                                <span>Total</span>
                                                <span class="total-cost">₦ @if($trial) 0 @else {{$plan->amount}} @endif</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Booking Summary -->

                </div>
            </div>

        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection
@push('scripts')
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}">
</script>
<script>
    $('#terms_accept').on('change',function(){
        $(this).is(':checked') ? $('#checkout').removeClass('disabled') : $('#checkout').addClass('disabled')
    })
</script>
@endpush