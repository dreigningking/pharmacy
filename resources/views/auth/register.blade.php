@extends('layouts.main.app')
@section('main')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-8 offset-md-2">
                        
                    <!-- Register Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure Register">	
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                @if(session('flash_message'))
                                    @include('layouts.main.flash')
                                @endif
                                <div class="login-header">
                                    <h3>Owners's Details <a href="#">Add new Pharmacy</a></h3>
                                </div>
                                
                                <!-- Register Form -->
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    @error('user_type')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="form-group form-focus">
                                        <select name="type" class="form-control floating @error('user_type') is-invalid @enderror">
                                            <option > Private Establishment</option>
                                            <option > Corporate Body </option>
                                            <option > Government Establishment </option>
                                            <option > University</option>
                                            <option > Public / Community </option>
                                            <option > Faith Based Organization </option>
                                            
                                            {{-- <option > Private Hospital</option> --}}
                                            {{-- <option > Private Owned Community Pharmacy </option> --}}
                                            {{-- <option > Corporate Hospital </option> --}}
                                            {{-- <option > Teaching Hospital</option> --}}
                                            {{-- <option > Primary Health Care </option> --}}
                                            {{-- <option > General Hospital </option> --}}
                                            {{-- <option > Public Owned Community Pharmacy </option> --}}
                                            {{-- <option > Faith Based Organization Hospital </option>
                                            <option > Faith Based Organization Owned Community Pharmacy </option>  --}}
                                        </select>
                                        <label class="focus-label">Owner Type</label>
                                    </div>
                                    @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="form-group form-focus">
                                        <input type="text" name="name" class="form-control floating @error('name') is-invalid @enderror">
                                        <label class="focus-label">Director Name</label>
                                    </div>
                                    @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="form-group form-focus">
                                        <input type="email" name="email" class="form-control floating @error('email') is-invalid @enderror">
                                        <label class="focus-label">Director Email</label>
                                    </div>
                                    @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="form-group form-focus">
                                        <input type="password" name="password" class="form-control floating @error('password') is-invalid @enderror">
                                        <label class="focus-label">Director Password</label>
                                    </div>
                                    <div class="text-right">
                                        <a class="forgot-link" href="{{route('login')}}">Already have an account?</a>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Get Started</button>
                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
                                    <div class="row form-row social-login">
                                        <div class="col-6">
                                            <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                                        </div>
                                    </div>
                                </form>
                                <!-- /Register Form -->
                                
                            </div>
                        </div>
                    </div>
                    <!-- /Register Content -->
                        
                </div>
            </div>

        </div>

    </div>		
    <!-- /Page Content -->
@endsection
