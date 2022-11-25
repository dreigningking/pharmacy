@extends('layouts.main.app')
@push('styles')

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
            @include('user.sidebar')
            <div class="col-md-7 col-lg-8 col-xl-9">
                <!-- Basic Information -->
                <div class="card">
                    <div class="card-body pt-0">
                        <!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Profile</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Password</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_medical_records" data-toggle="tab"><span class="med-records">Security</span></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_billing" data-toggle="tab">Notifications</a>
											</li>
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													{{-- <h4 class="card-title">Details</h4> --}}
                                                        <form action="{{route('profile')}}" method="POST" enctype="multipart/form-data">@csrf
                                                            <div class="row form-row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div class="change-avatar">
                                                                            <div class="profile-img">
                                                                                @if($user->image)
                                                                                <img id="logo" src="{{asset('storage/user/photo/'.$user->image)}}"
                                                                                    alt="User Image">
                                                                                @else 
                                                                                <img id="logo" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}"
                                                                                    alt="User Image">
                                                                                @endif
                                                                            </div>
                                                                            <div class="upload-img">
                                                                                <div class="change-photo-btn">
                                                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                                                    <input type="file" name="image" id="image" class="upload">
                                                                                </div>
                                                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG.
                                                                                    Max size of
                                                                                    2MB</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Email <span class="text-danger">*</span></label>
                                                                        <input type="email" name="email" value="{{$user->email}}" class="form-control" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Full Name <span class="text-danger">*</span></label>
                                                                        <input type="text" name="name" value="{{$user->name}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Phone Number</label>
                                                                        <input type="text" name="mobile" value="{{$user->mobile}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Country</label>
                                                                        <input type="text" name="country" value="{{$user->country->name}}" class="form-control" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">State / Province</label>
                                                                        <select name="state_id" id="states" class="form-control">
                                                                            @foreach ($user->country->states as $state)
                                                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">City</label>
                                                                        <select name="city_id" id="cities" class="form-control">
                                                                            @foreach ($user->country->cities as $city)
                                                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div> 
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <button class="btn btn-primary">
                                                                            Save
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </form>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
										<!-- Prescription Tab -->
										<div class="tab-pane fade" id="pat_prescriptions">
											<div class="card card-table mb-0">
												<div class="card-body">
													<form action="{{route('password_update')}}" method="post">@csrf
                                                        <div class="row form-row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Current Password</label>
                                                                    <input type="password" name="oldpassword" id="oldpassword" class="form-control">
                                                                    @error('oldpassword')
                                                                    <span class="invalid-feedback d-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">New Password</label>
                                                                    <input type="password" name="password" id="password" class="form-control">
                                                                    @error('password')
                                                                    <span class="invalid-feedback d-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Confirm New Password</label>
                                                                    <input type="password" name="password_confirmation" id="password_confirm" class="form-control">
                                                                </div>
                                                            </div>
                            
                            
                                                        </div>
                                                        {{-- <div class="row requirements">
                                                            <h5>password Requirements</h5><br>
                                                            <p>Ensure that these requirements are met:</p>
                                                            <ul>
                                                                <li>Minimum 8 characters long - the more, the better</li>
                                                                <li>
                                                                    At least one lowercase character
                                                                </li>
                                                                <li>
                                                                    At least one uppercase character
                                                                </li>
                                                                <li>
                                                                    At least one number, symbol, or whitespace character
                                                                </li>
                                                            </ul>
                                                        </div> --}}
                                                        <div class="row ">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <button type="reset" class="btn btn-outline-secondary mr-4">
                                                                        Cancel
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Update
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </form>
                                                    
												</div>
											</div>
										</div>
										<!-- /Prescription Tab -->
											
										<!-- Medical Records Tab -->
										<div id="pat_medical_records" class="tab-pane fade">
											<div class="card mb-0">
												<div class="card-body">
                                                    <h4 class="card-title">Two-step verification</h4>
                                                    <div class="row form-row">
                                                        <div class="col-md-12">
                                                            <p class="text-muted">Start by entering your password so we know it's
                                                                you.</p>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Current Password</label>
                                                                    <input type="password" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <button class="btn btn-outline-secondary mr-4">
                                                                        Cancel
                                                                    </button>
                                                                    <button class="btn btn-primary">
                                                                        Set up
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>

                                                <h4 class="card-title my-5 pl-3">Device History</h4>
                                                <div class="row form-row">
                                                    <div class="col-md-12">
                                                        <div class="row justify-content-between">
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-sm-1 pl-4 pr-0"><i class="fas fa-laptop social-icon"></i></div>
                                                                    <div class="col-sm-10 pl-0 social">

                                                                        <p>Dell XPs 15</p>
                                                                        <div>
                                                                            <div>
                                                                                <p>
                                                                                    <strong class="text-muted">Ip
                                                                                        address:</strong>
                                                                                    213.230.93.79 /
                                                                                </p>
                                                                            </div>
                                                                            <div>
                                                                                <p>
                                                                                    <strong class="text-muted"> Last
                                                                                        Active:</strong>
                                                                                    Now
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class=" col-md-4">
                                                                <div class="row ">
                                                                    <button
                                                                        class="btn social-button btn-outline-secondary mr-4">
                                                                        Logout
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-between">
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-sm-1 pl-4 pr-0"> <i
                                                                            class="fas fa-desktop social-icon"></i></div>
                                                                    <div class="col-sm-10 pl-0 social">

                                                                        <p>Microsoft Studio 2</p>
                                                                        <div>
                                                                            <div>
                                                                                <p>
                                                                                    <strong class="text-muted">Ip
                                                                                        address:</strong>
                                                                                    213.230.93.79 /
                                                                                </p>
                                                                            </div>
                                                                            <div>
                                                                                <p>
                                                                                    <strong class="text-muted"> Last
                                                                                        Active:</strong>
                                                                                    4 days ago
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row ">
                                                                    <button
                                                                        class="btn social-button btn-outline-secondary mr-4">
                                                                        Logout
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row justify-content-between">
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-sm-1 pl-4 pr-0"><i
                                                                            class="fas fa-mobile social-icon"></i></div>
                                                                    <div class="col-sm-10 pl-0 social">

                                                                        <p>Google Pixel 3a</p>
                                                                        <div>
                                                                            <div>
                                                                                <p>
                                                                                    <strong class="text-muted">Ip
                                                                                        address:</strong>
                                                                                    213.230.93.79 /
                                                                                </p>
                                                                            </div>
                                                                            <div>
                                                                                <p>
                                                                                    <strong class="text-muted"> Last
                                                                                        Active:</strong>
                                                                                    22 minutes ago
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row ">
                                                                    <button
                                                                        class="btn social-button btn-outline-secondary mr-4">
                                                                        Logout
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
											</div>
										</div>
										<!-- /Medical Records Tab -->
										
										<!-- Billing Tab -->
										<div id="pat_billing" class="tab-pane fade">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="row form-row">
                                                        <div class="col-md-12">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customSwitch1">
                                                                <label class="custom-control-label" for="customSwitch1">SMS
                                                                    Notification</label>
                                                            </div>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customSwitch2">
                                                                <label class="custom-control-label" for="customSwitch2">SMS
                                                                    Notification</label>
                                                            </div>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customSwitch3">
                                                                <label class="custom-control-label" for="customSwitch3">SMS
                                                                    Notification</label>
                                                            </div>
                            
                                                        </div>
                                                    </div>
												</div>
											</div>
										</div>
										<!-- /Billing Tab -->
										
									</div>
									<!-- Tab Content -->

                        
                    </div>
                </div>
                
            </div>
        </div>

    </div>
    <!-- /Page Content -->
    @endsection
    @push('scripts')
    <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script>
        $('.select').select2({
			placeholder: "Search Country",
			width: '100%',
            });
        
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
        $("#license").change(function() {
            $('#license_text').text('1 file Attached')
        });
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
    </script>
@endpush