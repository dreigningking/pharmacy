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
                        <form action="https://dreamguys.co.in/demo/doccure/booking-success.html">

                            <!-- Personal Information -->
                            <div class="info-widget">
                                <h4 class="card-title">Personal Information</h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name" value="{{$user->name}}"
                                                readOnly>
                                        </div>
                                    </div>

                                    <div class=" col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" readOnly
                                                value="{{$user->email}}">
                                        </div>
                                    </div>

                                </div>
                                <!-- <div class="exist-customer">Existing Customer? <a href="#">Click here to login</a>
                                </div> -->
                            </div>
                            <!-- /Personal Information -->

                            <div class="payment-widget">
                                <h4 class="card-title">Payment Method</h4>



                                <!-- Paypal Payment -->
                                <div class="payment-list">
                                    <label class="payment-radio paypal-option">
                                        <input type="radio" name="radio">
                                        <span class="checkmark"></span>
                                        Paypal
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

                                <!-- Submit Section -->
                                <div class="submit-section mt-4">
                                    <button type="submit" class="btn btn-primary submit-btn disabled" id="checkout"
                                        disabled>Continue</button>
                                </div>
                                <!-- /Submit Section -->

                            </div>
                        </form>
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
                            @if($plan->name == "Bronze")
                            <div class="row">
                                <a href="doctor-profile.html" class="booking-doc-img">
                                    <img src="{{asset('storage/pharmacies/logos/'.$user->pharmacies->first()->image)}}"
                                        alt="User Image">
                                </a>
                                <div class="booking-info">

                                    <h4><a href="doctor-profile.html">
                                            {{$user->pharmacies->first()->name}}
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
                                            {{$user->pharmacies->first()->state->name.','.$user->pharmacies->first()->city->name}}
                                        </p>
                                    </div>


                                </div>
                            </div>

                            @endif
                            <!-- Booking Doctor Info -->

                            <div class="booking-summary">
                                <div class="booking-item-wrap">
                                    <ul class="booking-date">
                                        <li>Plan Name <span>{{$plan->name}}</span></li>
                                        <li>Plan Duration <span>{{$plan->duration}}</span></li>
                                    </ul>
                                    <ul class="booking-fee">
                                        <li>Start Date <span>{{now()->format("Y-m-d")}}</span>
                                        </li>
                                        <li>End Date
                                            <span>{{now()->addMonths(1)->format("Y-m-d")}}</span>
                                        </li>
                                        <li>Amount <span>${{$plan->amount}}</span></li>
                                    </ul>
                                    <div class="booking-total">
                                        <ul class="booking-total-list">
                                            <li>
                                                <span>Total</span>
                                                <span class="total-cost">${{$plan->amount}}</span>
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
$('.select').select2({
    placeholder: "Search Country",
    width: '100%',
});

$('#states').on('change', function() {
    var state_id = $(this).val();
    // alert(state_id)
    $.ajax({
        type: 'POST',
        dataType: 'html',
        url: "{{route('getCities')}}",
        data: {
            '_token': $('meta[name="csrf-token"]').attr(
                'content'),
            'state_id': state_id
        },
        success: function(data) {
            $('#cities').html(data);
        },
        error: function(data) {
            console.log(data);
        }
    });
})

$("#image").change(function() {
    readURL(this, 'logo');
});
$("#license").change(function() {
    $('#license_text').text('1 file Attached')
});

function readURL(input, output) {
    console.log(input.id);
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#' + output).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function agreement() {
    let terms = document.querySelector("#terms_accept")
    let checkout = document.querySelector("#checkout")
    terms.addEventListener('change', function() {
        if (terms.checked) {
            checkout.classList.remove("disabled");
            checkout.removeAttribute("disabled");
        } else {
            checkout.setAttribute("disabled", "disabled");
            checkout.classList.add("disabled");
        }
    })
}
agreement()
</script>
@endpush