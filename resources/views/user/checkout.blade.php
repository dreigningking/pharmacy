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
                        <li class="breadcrumb-Drug"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-Drug active" aria-current="page">Dashboard</li>
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

                            
                        </div>
                        

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
                            
                                {{-- @auth
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
                                @endauth --}}

                            
                            <!-- Booking Doctor Info -->

                            <div class="booking-summary">
                                <form action="{{route('planPayment')}}" method="POST">@csrf
                                    <div class="booking-Drug-wrap">
                                        <ul class="booking-date">
                                            <li>Plan Name <span>{{$plan->name}} </span></li>
                                            <li>Duration (years) <span> <input type="number" name="quantity" id="duration" max="10" min="1" value="1" > </span></li>
                                        </ul>
                                        <ul class="booking-fee">
                                            <li>Start Date <span>{{now()->format("Y-m-d")}}</span>
                                                <input type="hidden" name="currentyear" id="currentyear" value="{{now()->format('Y')}}">
                                            </li>
                                            <li>End Date
                                                <span> 
                                                    <span id="day">-{{now()->addYear()->format("d")}}</span>
                                                    <span id="month">-{{now()->addYear()->format("m")}}</span>
                                                    <span id="year">{{now()->addYear()->format("Y")}}</span>        
                                                </span>
                                            </li>
                                            <li>Amount <span>₦ {{$plan->amount}} </span>
                                                <input type="hidden" name="amount" id="amount" value="{{$plan->amount}}"> 
                                            </li>
                                        </ul>
                                        <div class="booking-total">
                                            <ul class="booking-total-list">
                                                <li>
                                                    <span>Total</span>
                                                    <span class="total-cost">₦<span class="total-cost" id="display-total">{{$plan->amount}}</span> </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="payment-widget mt-5">
                                            {{-- <h5 class="card-title">Payment Method</h5> --}}
                                            <!-- Paypal Payment -->
                                            <div class="payment-list">
                                                @if($pharmacy->subscriptions->isEmpty())
                                                <label class="payment-radio paypal-option">
                                                    <input type="radio" name="trial" id="istrial" value="1">
                                                    <span class="checkmark"></span>
                                                    Start with 14days Trial <small>(No Payment Required)</small>
                                                </label>
                                                @endif
                                                <label class="payment-radio paypal-option">
                                                    <input type="radio" name="trial" id="no-trial" value="0" checked>
                                                    <span class="checkmark"></span>
                                                    Pay Online Now
                                                </label>
                                            </div>
                                            <!-- /Paypal Payment -->
            
                                            <!-- Terms Accept -->
                                            <div class="terms-accept">
                                                <div class="custom-checkbox">
                                                    <input type="checkbox" id="terms_accept" name="agreement">
                                                    <label for="terms_accept">I have read and accept <a
                                                            href="{{route('agreement')}}">Terms &amp;
                                                            Conditions</a></label>
                                                </div>
                                            </div>
                                            <!-- /Terms Accept -->
                                            
                                        </div>
                                        
                                        <input type="hidden" name="plan_id" value="{{$plan->id}}">
                                        <input type="hidden" name="pharmacy_id" value="{{$pharmacy->id}}">
                                        <!-- Submit Section -->
                                        <div class="submit-section mt-4">
                                            <button type="submit" class="btn btn-primary submit-btn disabled" @guest disabled="true" @endguest id="checkout">Continue</button>
                                        </div>
                                        <!-- /Submit Section -->
                                        
                                    </div>
                                </form>
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
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}">
</script>
<script>
    $('#terms_accept').on('change',function(){
        $(this).is(':checked') ? $('#checkout').removeClass('disabled') : $('#checkout').addClass('disabled')
    })
    $('#duration').on('change',function(){
        if($(this).val() != '' && $(this).val() != 0){
            changeTotal($(this).val())
        }
    })
    $('#duration').on('keyup',function(){
        if($(this).val() != '' && $(this).val() != 0){
            changeTotal($(this).val())
        }
    })
    function changeTotal(duration){
        $('#display-total').text(duration * $('#amount').val());
        $('#year').text(parseInt($('#currentyear').val()) + parseInt(duration));
    }
</script>
@endpush