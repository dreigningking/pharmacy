@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

@endpush
@section('main')
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Login Tab Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        {{-- <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure
                        Login">
                    </div> --}}
                    <div class="col-12 ">
                        <!-- <div class="login-header">
                            <h3>Login <span>Doccure</span></h3>
                        </div> -->

                        <div class="row justify-content-center mb-4">

                            <ul class="nav nav-pills text-align-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#home">Monthly</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#menu1">Quarterly</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#menu2">Annually</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active container-fluid">
                                <div class="row">
                                    @foreach ($plans->where('type','month') as $plan)
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card ">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        {{$plan->name}}
                                                    </h4>
                                                    <h1>${{$plan->amount}}
                                                    </h1>
                                                </div>

                                                <form action="{{route('checkout')}}" method="POST">@csrf

                                                    <div class="form-group row mb-0">
                                                        <!-- <label class="col-lg-3 col-form-label">Email Address</label> -->
                                                        <div class="col-lg-9 ">
                                                            <input type="hidden" class="form-control" name="name"
                                                                value="{{$plan->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <!-- <label class="col-lg-3 col-form-label">Email Address</label> -->
                                                        <div class="col-lg-9">
                                                            <input type="hidden" class="form-control" name="amount"
                                                                value="{{$plan->amount}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <!-- <label class="col-lg-3 col-form-label">Email Address</label> -->
                                                        <div class="col-lg-9">
                                                            <input type="hidden" class="form-control" name="duration"
                                                                value="{{$plan->duration}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <!-- <label class="col-lg-3 col-form-label">Email Address</label> -->
                                                        <div class="col-lg-9">
                                                            <input type="hidden" class="form-control" name="plan_id"
                                                                value="{{$plan->id}}">
                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-center my-4">
                                                        <button class="btn btn-dark btn-lg" type="submit">
                                                            Get started
                                                        </button>
                                                    </div>

                                                </form>

                                                <!-- <p class="text-muted">Renews at &#8358;800 a year</p> -->
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$plan->duration}} Month</p>
                                                </div>
                                               
                                                @foreach($plan->features as $feature)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$feature}}</p>
                                                </div>
                                                @endforeach
                                                

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="menu1" class="container tab-pane fade">
                                <div class="row">
                                    @foreach ($plans->where('type','quarter') as $plan)
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        {{$plan->name}}
                                                    </h4>
                                                    <h1>${{$plan->amount}}
                                                    </h1>
                                                </div>
                                                <form action="{{route('checkout')}}" method="POST">@csrf

                                                    <div class="form-group row mb-0">
                                                        <!-- <label class="col-lg-3 col-form-label">Email Address</label> -->
                                                        <div class="col-lg-9 ">
                                                            <input type="hidden" class="form-control" name="name"
                                                                value="{{$plan->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <!-- <label class="col-lg-3 col-form-label">Email Address</label> -->
                                                        <div class="col-lg-9">
                                                            <input type="hidden" class="form-control" name="amount"
                                                                value="{{$plan->amount}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <!-- <label class="col-lg-3 col-form-label">Email Address</label> -->
                                                        <div class="col-lg-9">
                                                            <input type="hidden" class="form-control" name="duration"
                                                                value="{{$plan->duration}}">
                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-center my-4">
                                                        <button class="btn btn-dark btn-lg" type="submit">
                                                            Get started
                                                        </button>
                                                    </div>

                                                </form>
                                                <!-- <p class="text-muted">Renews at &#8358;800 a year</p> -->
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$plan->duration}} Months</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>14 days Free trial</p>
                                                </div>
                                                @foreach($plan->features as $feature)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$feature}}</p>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="menu2" class="container tab-pane fade">
                                <div class="row">
                                    @foreach ($plans->where('type','annual') as $plan)
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        {{$plan->name}}
                                                    </h4>
                                                    <h1>${{$plan->amount}}
                                                    </h1>
                                                </div>
                                                <form action="{{route('checkout')}}" method="POST">

                                                    <div class="form-group row mb-0">
                                                        <!-- <label class="col-lg-3 col-form-label">Email Address</label> -->
                                                        <div class="col-lg-9 ">
                                                            <input type="hidden" class="form-control" name="name"
                                                                value="{{$plan->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <!-- <label class="col-lg-3 col-form-label">Email Address</label> -->
                                                        <div class="col-lg-9">
                                                            <input type="hidden" class="form-control" name="amount"
                                                                value="{{$plan->amount}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <!-- <label class="col-lg-3 col-form-label">Email Address</label> -->
                                                        <div class="col-lg-9">
                                                            <input type="hidden" class="form-control" name="duration"
                                                                value="{{$plan->duration}}">
                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-center my-4">
                                                        <button class="btn btn-dark btn-lg" type="submit">
                                                            Get started
                                                        </button>
                                                    </div>

                                                </form>
                                                <!-- <p class="text-muted">Renews at &#8358;800 a year</p> -->
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$plan->duration}} Months</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>14 days Free trial</p>
                                                </div>
                                                @foreach($plan->features as $feature)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$feature}}</p>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @if(Auth::check() && Auth::user()->subscriptions)
                            You're currently on
                            @foreach(Auth::user()->subscriptions as $subscription)
                                <div class="row justify-content-end">
                                    <p class="text-muted mx-3">
                                         {{$subscription->plan->name}} plan
                                    </p>
                                    <a href="#" class="btn btn-info">Continune</a>
                                </div>
                            @endforeach
                        @endif
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