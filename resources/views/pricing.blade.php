@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
@endpush
@section('main')
<!-- Page Content -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="{{asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure Login">
            </div>
                
            <div class="col-md-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Pharmacy Management</h4>
                    </div>
                    <div class="card-body">
                        <p>You can use the mark tag to <mark>highlight</mark> text.</p>
                        <p><del>This line of text is meant to be treated as deleted text.</del></p>
                        <p><s>This line of text is meant to be treated as no longer accurate.</s></p>
                        <p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
                        <p><u>This line of text will render as underlined</u></p>
                        <p><small>This line of text is meant to be treated as fine print.</small></p>
                        <p><strong>This line rendered as bold text.</strong></p>
                        <p><em>This line rendered as italicized text.</em></p>
                        <p class="text-monospace mb-0">This is in monospace</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Analytics</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-primary">.text-primary</p>
                        <p class="text-secondary">.text-secondary</p>
                        <p class="text-success">.text-success</p>
                        <p class="text-danger">.text-danger</p>
                        <p class="text-warning">.text-warning</p>
                        <p class="text-info">.text-info</p>
                        <p class="text-light bg-dark">.text-light</p>
                        <p class="text-dark">.text-dark</p>
                        <p class="text-muted">.text-muted</p>
                        <p class="text-white bg-dark mb-0">.text-white</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">SMS</h4>
                    </div>
                    <div class="card-body">
                        <ul class="mb-0">
                            <li>Lorem ipsum dolor sit amet</li>
                            <li>Consectetur adipiscing elit</li>
                            <li>Integer molestie lorem at massa</li>
                            <li>Facilisis in pretium nisl aliquet</li>
                            <li>Nulla volutpat aliquam velit
                                <ul>
                                    <li>Phasellus iaculis neque</li>
                                    <li>Purus sodales ultricies</li>
                                    <li>Vestibulum laoreet porttitor sem</li>
                                    <li>Ac tristique libero volutpat at</li>
                                </ul>
                            </li>
                            <li>Faucibus porta lacus fringilla vel</li>
                            <li>Aenean sit amet erat nunc</li>
                            <li>Eget porttitor lorem</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-10 offset-md-1">

                <!-- Login Tab Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure
                        Login">
                    </div>
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
                                                        {{$plans[0]->name}}
                                                    </h4>
                                                    <h1>₦{{$plans[0]->amount}}
                                                    </h1>
                                                </div>
                                                   
                                                <div class="d-flex justify-content-center my-4">
                                                    <a class="btn btn-dark btn-lg" @guest href="{{route('register')}}" @else href="{{route('setup')}}" @endif>
                                                        Get started
                                                    </a>
                                                </div>
                                                  
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Duration: {{$plans[0]->duration}} Month</p>
                                                </div>
                                                @if($plans[0]->trial)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$plans[0]->trial}} days Free trial</p>
                                                </div>
                                                @endif
                                                @foreach($plans[0]->features as $feature)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$feature}}</p>
                                                </div>
                                                @endforeach
                                                @if($plans[0]->trial)
                                                     @if(!Auth::check() || (Auth::check() && Auth::user()->subscriptions->isEmpty())) 
                                                    <div class="text-center">
                                                         <a href="{{route('pharmacy.checkout', [$pharmacy, $plans[0]])}}?type=plan&id={{$plans[0]->id}}&trial=true" class="btn btn-sm btn-primary">Start Trial</a>
                                                        <a href="#" class="btn btn-sm btn-primary">Start Trial</a>
                                                    </div>
                                                     @endif
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
                                                        {{$plans[0]->name}}
                                                    </h4>
                                                    <h1>₦{{$plans[0]->amount}}
                                                    </h1>
                                                </div>
                                                <div class="d-flex justify-content-center my-4">
                                                    <a class="btn btn-dark btn-lg" href="{{route('pharmacy.checkout', [$pharmacy, $plans[0]])}}?type=plan&id={{$plans[0]->id}}">                                                   <a class="btn btn-dark btn-lg" href="#">
                                                        Get started
                                                    </a>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Duration: {{$plans[0]->duration}} Months</p>
                                                </div>
                                                @if($plans[0]->trial)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$plans[0]->trial}} days Free trial</p>
                                                </div>
                                                @endif
                                                @foreach($plans[0]->features as $feature)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$feature}}</p>
                                                </div>
                                                @endforeach
                                                @if($plans[0]->trial)
                                                     @if(!Auth::check() || (Auth::check() && Auth::user()->subscriptions->isEmpty()))
                                                    <div class="text-center">
                                                         <a href="{{route('pharmacy.checkout', [$pharmacy, $plans[0]])}}?type=plan&id={{$plans[0]->id}}&trial=true" class="btn btn-sm btn-primary">Start Trial</a>
                                                        <a href="#" class="btn btn-sm btn-primary">Start Trial</a>
                                                    </div>
                                                     @endif
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
                                                        {{$plans[0]->name}}
                                                    </h4>
                                                    <h1>₦{{$plans[0]->amount}}
                                                    </h1>
                                                </div>
                                                <div class="d-flex justify-content-center my-4">
                                                     <a class="btn btn-dark btn-lg" href="{{route('pharmacy.checkout', [$pharmacy, $plans[0]])}}?type=plan&id={{$plans[0]->id}}">
                                                    <a class="btn btn-dark btn-lg" href="#">
                                                        Get started
                                                    </a>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Duration: {{$plans[0]->duration}} Months</p>
                                                </div>
                                                @if($plans[0]->trial)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$plans[0]->trial}} days Free trial</p>
                                                </div>
                                                @endif
                                                @foreach($plans[0]->features as $feature)
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>{{$feature}}</p>
                                                </div>
                                                @endforeach
                                                @if($plans[0]->trial)
                                                     @if(!Auth::check() || (Auth::check() && Auth::user()->subscriptions->isEmpty()))
                                                    <div class="text-center">
                                                         <a href="{{route('pharmacy.checkout', [$pharmacy, $plans[0]])}}?type=plan&id={{$plans[0]->id}}&trial=true" class="btn btn-sm btn-primary">Start Trial</a>
                                                        <a href="#" class="btn btn-sm btn-primary">Start Trial</a>
                                                    </div>
                                                     @endif 
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

        </div> --}}
    </div>

</div>

</div>
<!-- /Page Content -->
@endsection