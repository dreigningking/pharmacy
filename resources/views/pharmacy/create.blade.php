@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
@endpush
@section('main')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    
                    <!-- Login Tab Content -->
                    <div class="account-content mb-6">
                        <form action="{{route('pharmacy.setup')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="row align-items-center justify-content-center">
                                <div class="col-12 col-md-12">
                                    <div class="login-header">
                                        <h2>Add New Pharmacy</h2>
                                    </div>
                                    <div class="form-group">
                                        @error('image')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        
                                        @enderror
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img id="logo" src="{{asset('assets/img/patients/patient.jpg')}}" alt="Pharmacy Image">
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Logo</span>
                                                    <input type="file" name="image" id="image" class="upload" required>
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                            <!-- <div class="upload-img ml-auto">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> <span id="license_text">Upload License</span></span>
                                                    <input type="file" name="license" id="license" class="upload" required>
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group form-focus ">
                                        <input type="text" name="name" class="form-control floating" value="{{old('name')}}" required>
                                        <label class="focus-label">Pharmacy Name</label>
                                        @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group form-focus">  
                                        <select name="type" class="form-control floating" required>
                                            <option value="community">Community Practise</option>
                                            <option value="hospital">Hospital Practise</option>
                                        </select>
                                        <label class="focus-label">Type</label>
                                        @error('type')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group form-focus">  
                                        <input type="text" name="description" value="{{old('description')}}" class="form-control floating" required>
                                        <label class="focus-label">About Pharmacy</label>
                                        @error('description')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>                                 
                                
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <input id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" class="form-control @error('email') is-invalid @enderror floating">
                                        <label class="focus-label">Business Email</label>
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    
                                </div>                           
                                
                                <div class="col-12 col-md-6">
                                    <div class="form-group form-focus">
                                        <input type="text" name="mobile" value="{{old('mobile')}}" place="+1 202-555-0125" class="form-control floating" required>
                                        <label class="focus-label">Business Phone</label>
                                        @error('mobile')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group form-focus">
                                        
                                        <select name="country_id" id="countries" class="form-control floating" required>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}" @if(Auth::user()->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="focus-label">Country</label>
                                        @error('country_id')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group form-focus">
                                        
                                        <select name="state_id" id="states" class="form-control select2 floating" required>
                                            @foreach (Auth::user()->country->states as $state)
                                                <option value="{{$state->id}}" @if(Auth::user()->state_id == $state->id) selected @endif>{{$state->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                        <label class="focus-label">State</label>
                                        @error('state_id')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group form-focus">
                                        
                                        <select name="city_id" id="cities" class="form-control select2 floating" required>
                                            @foreach (Auth::user()->country->cities as $city)
                                                <option value="{{$city->id}}" @if(Auth::user()->city_id == $city->id) selected @endif>{{$city->name}}</option>
                                            @endforeach    
                                        </select>
                                        <label class="focus-label">City</label>
                                        @error('city_id')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group form-focus">
                                        <input type="text" name="address" value="{{old('address')}}" class="form-control floating" value="{{old('address')}}" placeholder="Physical location of the pharmacy" required>
                                        <label class="focus-label">Address</label>
                                    </div>
                                </div>                      
                                
                                <div class="col-12">
                                    <div class="checkbox checkbox-primary ">
                                        <input id="agreement_check" type="checkbox" data-original-title="" title="" name="agreement" value="1" required>
                                        <label for="agreement_check px-2"> <a href="{{route('agreement')}}">I have read the agreement</a></label>
                                    </div>
                                    
                                </div>
                                
                                <div class="submit-section mb-4">
                                    <button type="submit" class="btn btn-primary submit-btn mb-2 disabled" id="create">Create Pharmacy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /Login Tab Content -->
                        
                </div>
            </div>

        </div>

    </div>		
    <!-- /Page Content -->
@endsection
@push('scripts')

<script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script>
        $('.select').select2({
			placeholder: "Search Country",
			width: '100%',
            });
        $('#countries').on('change',function(){
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
                    $('#states').html(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        })
        $('#states').on('change',function(){
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
                    $('#cities').html(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        })

        $("#image").change(function() {
            readURL(this,'logo');
        });
        // $("#license").change(function() {
        //     $('#license_text').text('1 file Attached')
        // });
        function readURL(input,output) {
            console.log(input.id);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('#'+output).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#agreement_check').on('change',function(){
            $(this).is(':checked') ? $('#create').removeClass('disabled') : $('#create').addClass('disabled')
        })
    </script>
@endpush


