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


<div class="content">
    <div class="container">
        @if(session('flash_message'))
            @include('layouts.main.flash')
        @endif
        <form action="{{route('subscription.store')}}" method="post">@csrf
            <div class="row">
                <div class="col-md-7 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <!-- Personal Information -->
                            <div class="info-widget">
                                <div class="filter-widget">
                                    <label class="custom_check">
                                        <input type="checkbox" name="subscription[]" id="pharmacy" value="Pharmacy" checked readonly>
                                        <span class="checkmark"></span> <span class="h3">Pharmacy Subscription</span> 
                                    </label>
                                </div>
                                
                                <div class="doctor-widget">
                                    <div class="doc-info-left pr-3">
                                        <div class="doc-info-cont">
                                            {{-- <h4 class="doc-name">
                                                <a href="doctor-profile.html">Pharmacy Management Plan</a>
                                            </h4> --}}
                                            <p class="doc-speciality text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
                                            </p>
                                            <h6 class="m-1">Images:</h6>

                                            <div class="clinic-details">
                                                <ul class="clinic-gallery">
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
                                                    <li>
                                                        <a href="{{asset('assets/img/features/feature-04.jpg')}}" data-fancybox="gallery">
                                                            <img src="{{asset('assets/img/features/feature-04.jpg')}}" alt="Feature">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{asset('assets/img/features/feature-04.jpg')}}" data-fancybox="gallery">
                                                            <img src="{{asset('assets/img/features/feature-04.jpg')}}" alt="Feature">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{asset('assets/img/features/feature-04.jpg')}}" data-fancybox="gallery">
                                                            <img src="{{asset('assets/img/features/feature-04.jpg')}}" alt="Feature">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{asset('assets/img/features/feature-04.jpg')}}" data-fancybox="gallery">
                                                            <img src="{{asset('assets/img/features/feature-04.jpg')}}" alt="Feature">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <h6 class="m-1">Features:</h6>
                                            <div class="clinic-services">  
                                                <span class="m-1"> Pharmacy Management</span>
                                                <span class="m-1"> Patient Management</span>
                                                <span class="m-1"> Assessment Management</span>
                                                <span class="m-1"> Prescription Management</span>
                                                <span class="m-1"> Inventory Management</span>
                                                <span class="m-1"> Sales Management</span>
                                                <span class="m-1"> Unlimited Emails</span>
                                                <span class="m-1"> {{$pharmacy->items['free_sms']}} SMS Units Free</span>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /Personal Information -->
                            
                            <div class="info-widget">
                                <div class="filter-widget">
                                    <label class="custom_check">
                                        <input type="checkbox" name="subscription[]" id="analytics" value="Analytics" checked>
                                        <span class="checkmark"></span> <span class="h3">Analytics</span> (optional)
                                    </label>
                                </div>
                                
                                <div class="doctor-widget">
                                    <div class="doc-info-left pr-3">
                                        <div class="doc-info-cont">
                                            {{-- <h4 class="doc-name">
                                                <a href="doctor-profile.html">Pharmacy Management Plan</a>
                                            </h4> --}}
                                            <p class="doc-speciality">Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
                                            </p>
                                            <h6 class="m-1">Images:</h6>

                                            <div class="clinic-details">
                                                <ul class="clinic-gallery">
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
                                                    <li>
                                                        <a href="{{asset('assets/img/features/feature-04.jpg')}}" data-fancybox="gallery">
                                                            <img src="{{asset('assets/img/features/feature-04.jpg')}}" alt="Feature">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{asset('assets/img/features/feature-04.jpg')}}" data-fancybox="gallery">
                                                            <img src="{{asset('assets/img/features/feature-04.jpg')}}" alt="Feature">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{asset('assets/img/features/feature-04.jpg')}}" data-fancybox="gallery">
                                                            <img src="{{asset('assets/img/features/feature-04.jpg')}}" alt="Feature">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{asset('assets/img/features/feature-04.jpg')}}" data-fancybox="gallery">
                                                            <img src="{{asset('assets/img/features/feature-04.jpg')}}" alt="Feature">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <h6 class="m-1">Features:</h6>
                                            <div class="clinic-services">  
                                                <span class="m-1"> Pharmacy Management</span>
                                                <span class="m-1"> Patient Management</span>
                                                <span class="m-1"> Assessment Management</span>
                                                <span class="m-1"> Prescription Management</span>
                                                <span class="m-1"> Inventory Management</span>
                                                <span class="m-1"> Sales Management</span>
                                                <span class="m-1"> Unlimited Emails</span>
                                                <span class="m-1"> 17 SMS Units Free</span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        
                            <!-- /Checkout Form -->
                            
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-md-5 col-lg-4 theiaStickySidebar">
                
                    <!-- Booking Summary -->
                    <div class="card booking-card">
                        <div class="card-header">
                            <h4 class="card-title">Summary</h4>
                        </div>
                        <div class="card-body">
                        
                            <!-- Booking Doctor Info -->
                            <div class="booking-doc-info">
                                
                                <div class="booking-info">
                                    <div class="clinic-details">
                                        <p class="doc-location"><i class="fas fa-shopping-cart"></i> Pharmacy Subscription <span id="analytics_subscription"><i class="fas fa-plus"></i> Analytics</span> </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Booking Doctor Info -->
                            
                            <div class="booking-summary">
                                <div class="booking-item-wrap">
                                    <div class="d-flex justify-content-between mb-3">
                                        <span>Period: </span>
                                        <select id="" name="period" class="form-control-sm col-6 border-secondary period" style="border-width:thin">
                                            <option value="1">1 Months</option>
                                            <option value="2" >2 Months</option>
                                            <option value="3">3 Months</option>
                                            <option value="6">6 Months</option>
                                            <option value="12">12 Months (1 year)</option>
                                            <option value="24">24 Months (2 years)</option>
                                            <option value="36">36 Months (3 years)</option>
                                        </select>
                                    </div>

                                    <div class="d-flex justify-content-between mb-3">
                                        <span>No of Licenses: </span>
                                        <input type="number" name="licenses" id="" class="form-control-sm col-6 border-secondary licenses" style="border-width:thin" value="1"></span>
                                    </div>

                                    <ul class="booking-fee">
                                        <li class="border-bottom pb-3">Amount Per month 
                                            <span> 
                                                <span class="price">{{number_format( $pharmacy->items["price_".$user->currency] + $analytics->items["price_".$user->currency] )}}</span> 
                                                <span class="currency">{{$user->currency_symbol}}</span> 
                                                
                                            </span>
                                        </li>
                                        <li>Subtotal 
                                            <span> 
                                                <span class="subtotal">{{number_format( $pharmacy->items["price_".$user->currency] + $analytics->items["price_".$user->currency] )}}</span>
                                                <span class="currency">{{$user->currency_symbol}}</span> 
                                                
                                            </span>
                                        </li>
                                        <li>Discount 
                                            <span> 
                                                <span class="discount">0</span>
                                                -<span class="currency">{{$user->currency_symbol}}</span>  
                                            </span>
                                        </li>
                                    </ul>
                                    <div class="booking-total">
                                        <ul class="booking-total-list">
                                            <li>
                                                <span>Total</span>
                                                <span class="total-cost">
                                                    <span class="currency">{{$user->currency_symbol}}</span> 
                                                    <span class="total">{{number_format( $pharmacy->items["price_".$user->currency] + $analytics->items["price_".$user->currency] )}}</span>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <input type="hidden" name="price" id="price" value="{{$pharmacy->items["price_".$user->currency] + $analytics->items["price_".$user->currency]}}">
                                    <input type="hidden" name="discount" id="discount" value="0">
                                    <input type="hidden" name="free_sms" value="{{$pharmacy->items["free_sms"]}}">
                                    <input type="hidden" name="total" id="total" value="{{$pharmacy->items["price_".$user->currency] + $analytics->items["price_".$user->currency]}}">
                                    <div class="submit-section text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-block submit-btn" name="trial" value="0">Confirm and Pay</button>
                                        @if($subscription_trial_days && $user->licenses->isEmpty())
                                        <button type="submit" class="border-0 bg-white font-italic small mt-3" name="trial" value="1">Try Free for {{$subscription_trial_days}} days</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Booking Summary -->
                    
                </div>
            </div>
        </form>
    </div>

</div>
<!-- /Page Content -->
@endsection
@push('scripts')
<script src="{{asset('plugins/fancybox/jquery.fancybox.min.js')}}"></script>
<script>
    let pharmacy = @json($pharmacy->items["price_".$user->currency]);
    let analytics = @json($analytics->items["price_".$user->currency]);
    let discount = @json($subscription_discount);
    let period = 1;
    let licenses = 1;

    $('#analytics').change(function(){
        let price;
        if($(this).is(':checked')){
            $('#analytics_subscription').show();
            price = parseInt(pharmacy) + parseInt(analytics)
        }else{
            $('#analytics_subscription').hide();
            price = parseInt(pharmacy)
        }
        $('.price').text(price)
        $('#price').val(price)
        getDiscount();
    })

    $('.period').change(function(){
        period = $(this).val();
        getDiscount();
    })
    $('.licenses').on('input',function(){
        licenses = $(this).val();
        getDiscount();
    })
    function months(){
        let licenses = parseInt($('.licenses').val())
        let duration = parseInt($('.period').val())
        console.log(licenses * duration)
        return licenses * duration;
    }

    function subtotal(){
        let cost = parseInt($('#price').val())
        let subtotal = months() * cost;
        $('.subtotal').text(subtotal)
        return subtotal;
    }

    function getDiscount(){
        let reduction;
        if(months() >= 60){
            reduction = parseInt(discount[1])/100 * subtotal();
        }else if(months() >=24){
            reduction = parseInt(discount[0])/100 * subtotal();
        }else reduction = 0;
        $('.discount').text(reduction)
        $('#discount').val(reduction)
        $('.total').text(subtotal() - reduction)
        $('#total').val(subtotal() - reduction)
        return reduction;
    }
    
    
</script>
@endpush