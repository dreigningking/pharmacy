@extends('layouts.main.app')
@section('main')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    
                    <!-- Login Tab Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>You must change your password</h3>
                                </div>
                                <form method="POST" action="{{ route('forcepassword') }}">@csrf
                                    
                                    
                                    
                                    <div class="form-group form-focus mb-2">
                                        <input id="password" name="password" required autocomplete="current-password" type="password" class="form-control @error('password') is-invalid @enderror floating">
                                        <label class="focus-label">New Password</label>
                                        @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-focus mb-2">
                                        <input id="password_confirm" name="password_confirmation" required autocomplete="current-password" type="password" class="form-control floating">
                                        <label class="focus-label">Confirm Password</label> 
                                    </div>
                                    
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Change</button>
                                    
                                    <div class="text-center dont-have"> 
                                        
                                        <a href="{{ route('logout') }}" class="text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </form>
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


