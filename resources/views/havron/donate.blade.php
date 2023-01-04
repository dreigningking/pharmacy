@extends('layouts.main.app')
@section('main')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    
                    <!-- Login Tab Content -->
                    <div class="account-content my-5">
                        <div class="row align-items-center justify-content-center">
                            {{-- <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure Login">	
                            </div> --}}
                            <div class="col-6">
                                
                                <div class="">
                                    <h2>Donate </h2>
                                    <form action="{{route('havron.donate')}}" method="post">@csrf
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Enter your name" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Enter your email" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="amount" placeholder="Amount in dollars" id="" class="form-control">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label class="form-label">Environment</label>
                                            <select name="environment" class="form-control">
                                                <option value="live" selected>Live</option>
                                                <option value="test">Test</option>
                                            </select>
                                        </div> --}}
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Pay Now</button>
                                        </div>
                                    </form>
                                    
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



