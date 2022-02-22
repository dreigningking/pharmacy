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
                            {{-- <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure Login">	
                            </div> --}}
                            <div class="col-12">
                                <div class="login-header">
                                    <h2>Add New Pharmacy</h2>
                                </div>
                                <form method="POST" action="{{ route('login') }}">@csrf
                                    <div class="dashboard">
                                        
                                        <div class="row">    
                                            <div class="col-sm-3">
                                                <div class="box-content upload-photo mb-3 text-center">
                                                    <input type="file" style="visibility:hidden" name="logo" id="logo">
                                                    <img src="{{asset('assets/images/img/1.jpg')}}" style="height:150px;width:150px;cursor:pointer" id="logo-upload">
                                                    <caption>Upload image</caption>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>Business Name</label>
                                                    <input name="business_name" value="{{ old('business_name') }}" id="business_name" class="form-control digits" type="text" autocomplete="" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Business Description</label>
                                                    <textarea name="business_description" value="{{ old('business_description') }}" id="business_description" placeholder="We are into sales of..." class="form-control digits" ></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="certificate">CAC Document</label>
                                                    <input type="file" name="business_certificate" class="form-control" id="certificate" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Pharmacy Type</label>
                                                    <div class="">
                                                        <select name="business_categories" class="form-control select2" >
                                                            <option value="1">Community Practise</option>
                                                            <option value="2">Hospital Practise</option>
                                                        
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>                                         
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="firstname" class="form-label">First Name</label>
                                                    <input type="text" name="firstname" class="form-control" id="firstname" @auth value="{{ Auth::user()->firstname ?? old('firstname') }}" readonly @endauth placeholder="First Name" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="surname" class="form-label">Surname</label>
                                                    <input type="text" name="surname" class="form-control" id="surname" @auth value="{{Auth::user()->surname ?? old('surname')}}" readonly @endauth   placeholder="Last Name" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <input id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" class="form-control @error('email') is-invalid @enderror floating">
                                                    <label class="focus-label">Email</label>
                                                    @error('email')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    
                                                    <input type="text" name="mobile" class="form-control" id="mobile" @auth value="{{Auth::user()->mobile ?? old('mobile')}}" readonly @endauth   placeholder="Mobile" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_name" class="form-label">Full Name</label>
                                                    <input type="text" name="contact_name" value="{{ old('contact_name') }}" class="form-control" id="contact_name" placeholder="Contact Person Full name" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_email" class="form-label">Email</label>
                                                    <input type="text" name="contact_email" value="{{ old('contact_email') }}" class="form-control" id="contact_email" placeholder="Contact Email" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_phone" class="form-label">Phone Number</label>
                                                    <input type="text" name="contact_phone" value="{{ old('contact_phone') }}" class="form-control" id="contact_phone" placeholder="Contact Mobile number" >
                                                </div> 
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_document">Upload Contact Person's ID</label>
                                                    <input type="file" name="contact_document" class="form-control" id="contact_document" >
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress">Address</label>
                                            <input type="text" name="address" value="{{ old('address') }}" class="form-control" id="inputAddress" placeholder="1234 Main St" >
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="country">Country</label>
                                                <select id="country" name="country_id" class="countries select2 form-control" >
                                                    
                                                        <option value="1">Nigeria</option>
                                                        <option value="2">Ghana</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState">State</label>
                                                <select id="inputState" name="state_id" class="states form-control select2" >
                                                        <option value="1">Lagos</option>
                                                        <option value="2">Abuja</option>      
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputCity">Area</label>
                                                <select id="inputCity select2" name="city_id" class="cities form-control" >
                                                    <option>Long</option>
                                                    <option>Lat</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-12">
                                                {{-- <label class="col-xl-3 col-md-4">Free Shipping</label> --}}
                                                <div class="checkbox checkbox-primary ">
                                                    <input id="checkbox-primary-1" type="checkbox" data-original-title="" title="" name="agreement" value="1" >
                                                    <label for="checkbox-primary-1 px-2"> <a href="{{route('agreement')}}">I have read the agreement</a></label>
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    
                                    
                                      
                                    
                                    <div class="form-group form-focus mb-2">
                                        <input id="password" name="password" required autocomplete="current-password" type="password" class="form-control @error('password') is-invalid @enderror floating">
                                        <label class="focus-label">Password</label>
                                        @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="text-right">
                                        <a class="forgot-link" href="{{ route('password.request') }}">Forgot Password ?</a>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
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
                                    <div class="text-center dont-have">Don’t have an account? 
                                        <a href="{{ route('register') }}">Register</a>
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
@push('scripts')
    <script>
        $('.next').on('click',function(){
            $('.tab-pane').removeClass('active show');
            $(this).closest('.tab-pane').next().addClass('active show');
            $('li.'+$(this).closest('.tab-pane').attr('id')).removeClass('active show');
            $('li.'+$(this).closest('.tab-pane').next().attr('id')).addClass('active show');
            $(window).scrollTop(0);
        })
        $('.previous').on('click',function(){
            $('.tab-pane').removeClass('active show');
            $(this).closest('.tab-pane').prev().addClass('active show');
            $('li.'+$(this).closest('.tab-pane').attr('id')).removeClass('active show');
            $('li.'+$(this).closest('.tab-pane').prev().attr('id')).addClass('active show');
            $(window).scrollTop(0);
        })
        $('ul.setupmenu li').on('click',function(){
            $('ul.setupmenu li').removeClass('active show');
            $(this).addClass('active show');
        })


        $('.countries').on('change',function(){
            var country_id = $(this).val();
            // alert(state_id)
            $.ajax({
                type:'POST',
                dataType: 'html',
                url: "{{route('getStates')}}",
                data:{
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'country_id': country_id
                },
                success:function(data) {
                    $('.cities').html(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        })
        $('.states').on('change',function(){
            var state_id = $(this).val();
            // alert(state_id)
            $.ajax({
                type:'POST',
                dataType: 'html',
                url: "{{route('getCities')}}",
                data:{
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'state_id': state_id
                },
                success:function(data) {
                    $('.cities').html(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        })
        

    </script>
@endpush


