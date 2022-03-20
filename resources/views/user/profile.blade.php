@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">
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
                    <div class="card-body">
                        <h4 class="card-title">Details</h4>
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