@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
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
                            <div class="col-12 col-md-12">
                                <div class="login-header">
                                    <h2>Add New Pharmacy</h2>
                                </div>
                                <div class="form-group">
                                    <div class="change-avatar">
                                        <div class="profile-img">
                                            <img src="{{asset('assets/img/patients/patient.jpg')}}" alt="Pharmacy Image">
                                        </div>
                                        <div class="upload-img">
                                            <div class="change-photo-btn">
                                                <span><i class="fa fa-upload"></i> Upload Logo</span>
                                                <input type="file" class="upload">
                                            </div>
                                            <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                        </div>
                                        <div class="upload-img ml-auto">
                                            <div class="change-photo-btn">
                                                <span><i class="fa fa-upload"></i> Upload License</span>
                                                <input type="file" class="upload">
                                            </div>
                                            <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group form-focus ">
                                    <input type="text" class="form-control floating">
                                    <label class="focus-label">Pharmacy Name</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group form-focus">  
                                    <select class="form-control floating">
                                        <option>Community Practise</option>
                                        <option>Hospital Practise</option>
                                    </select>
                                    <label class="focus-label">Type</label>
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
                                    <input type="text" value="+1 202-555-0125" class="form-control floating">
                                    <label class="focus-label">Business Phone</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" value="United States">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" value="Newyork">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" value="Old Forge">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <label>Address</label>
                                    <input type="text" class="form-control" value="806 Twin Willow Lane">
                                </div>
                            </div>
                            
                            
                            <div class="col-12">
                                <div class="checkbox checkbox-primary ">
                                    <input id="checkbox-primary-1" type="checkbox" data-original-title="" title="" name="agreement" value="1" >
                                    <label for="checkbox-primary-1 px-2"> <a href="{{route('agreement')}}">I have read the agreement</a></label>
                                </div>
                                
                            </div>
                            
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
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
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script>
        $('.select').select2({
			placeholder: "Search Country",
			width: '100%',
            });
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


