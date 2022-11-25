@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
@endpush
@section('main')
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-10 offset-md-1">

                <!-- Login Tab Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        {{-- <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure
                        Login">
                    </div> --}}
                    <div class="col-12 ">

                        <div class="row justify-content-center mb-4">

                            <ul class="nav nav-pills text-align-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#monthly">Monthly</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#quarterly">Quarterly</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#annually">Annually</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="monthly" class="container tab-pane active container-fluid">
                                <div class="row">
                                    
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card ">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        {{$plan->name}}
                                                    </h4>
                                                    <h1>₦{{$plan->amount}}
                                                    </h1>
                                                </div>
                                                   
                                                <div class="d-flex justify-content-center my-4">
                                                    <a class="btn btn-dark btn-lg" @guest href="{{route('register')}}" @else href="{{route('setup')}}" @endif>
                                                        Get started
                                                    </a>
                                                </div>
                                                  
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Duration: {{$plan->duration}} Month</p>
                                                </div>
                                                @if($plan->trial)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$plan->trial}} days Free trial</p>
                                                </div>
                                                @endif
                                                @foreach($plan->features as $feature)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$feature}}</p>
                                                </div>
                                                @endforeach
                                                @if($plan->trial)
                                                    {{-- @if(!Auth::check() || (Auth::check() && Auth::user()->subscriptions->isEmpty())) --}}
                                                    <div class="text-center">
                                                        {{-- <a href="{{route('pharmacy.checkout', [$pharmacy, $plan])}}?type=plan&id={{$plan->id}}&trial=true" class="btn btn-sm btn-primary">Start Trial</a> --}}
                                                        <a href="#" class="btn btn-sm btn-primary">Start Trial</a>
                                                    </div>
                                                    {{-- @endif --}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div id="quarterly" class="container tab-pane fade">
                                <div class="row">
                                    
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        {{$plan->name}}
                                                    </h4>
                                                    <h1>₦{{$plan->amount}}
                                                    </h1>
                                                </div>
                                                <div class="d-flex justify-content-center my-4">
                                                    {{-- <a class="btn btn-dark btn-lg" href="{{route('pharmacy.checkout', [$pharmacy, $plan])}}?type=plan&id={{$plan->id}}"> --}}
                                                    <a class="btn btn-dark btn-lg" href="#">
                                                        Get started
                                                    </a>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Duration: {{$plan->duration}} Months</p>
                                                </div>
                                                @if($plan->trial)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$plan->trial}} days Free trial</p>
                                                </div>
                                                @endif
                                                @foreach($plan->features as $feature)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$feature}}</p>
                                                </div>
                                                @endforeach
                                                @if($plan->trial)
                                                    {{-- @if(!Auth::check() || (Auth::check() && Auth::user()->subscriptions->isEmpty())) --}}
                                                    <div class="text-center">
                                                        {{-- <a href="{{route('pharmacy.checkout', [$pharmacy, $plan])}}?type=plan&id={{$plan->id}}&trial=true" class="btn btn-sm btn-primary">Start Trial</a> --}}
                                                        <a href="#" class="btn btn-sm btn-primary">Start Trial</a>
                                                    </div>
                                                    {{-- @endif --}}
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div id="annually" class="container tab-pane fade">
                                <div class="row">
                                    
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        {{$plan->name}}
                                                    </h4>
                                                    <h1>₦{{$plan->amount}}
                                                    </h1>
                                                </div>
                                                <div class="d-flex justify-content-center my-4">
                                                    {{-- <a class="btn btn-dark btn-lg" href="{{route('pharmacy.checkout', [$pharmacy, $plan])}}?type=plan&id={{$plan->id}}"> --}}
                                                    <a class="btn btn-dark btn-lg" href="#">
                                                        Get started
                                                    </a>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Duration: {{$plan->duration}} Months</p>
                                                </div>
                                                @if($plan->trial)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$plan->trial}} days Free trial</p>
                                                </div>
                                                @endif
                                                @foreach($plan->features as $feature)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$feature}}</p>
                                                </div>
                                                @endforeach
                                                @if($plan->trial)
                                                    {{-- @if(!Auth::check() || (Auth::check() && Auth::user()->subscriptions->isEmpty())) --}}
                                                    <div class="text-center">
                                                        {{-- <a href="{{route('pharmacy.checkout', [$pharmacy, $plan])}}?type=plan&id={{$plan->id}}&trial=true" class="btn btn-sm btn-primary">Start Trial</a> --}}
                                                        <a href="#" class="btn btn-sm btn-primary">Start Trial</a>
                                                    </div>
                                                    {{-- @endif --}}
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- /Login Tab Content -->

        </div>
    </div>

</div>

</div>
<!-- /Page Content -->
@endsection