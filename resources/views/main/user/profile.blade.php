@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('adminassets/plugins/morris/morris.css')}}">
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
            {{-- @include('main.director.sidebar') --}}

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row justify-content-center mb-4">

                    <ul class="nav nav-pills text-align-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#home">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#menu1">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#menu2">Security</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div id="home" class="container tab-pane active container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-md-7 col-lg-8 col-xl-9">

                                <!-- Basic Information -->
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Details</h4>
                                        <div class="row form-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="change-avatar">
                                                        <div class="profile-img">
                                                            <img src="assets/img/doctors/doctor-thumb-02.jpg"
                                                                alt="User Image">
                                                        </div>
                                                        <div class="upload-img">
                                                            <div class="change-photo-btn">
                                                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                                <input type="file" class="upload">
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
                                                    <input type="email" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Last Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control select">
                                                        <option>Select</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="row justify-content-end pl-4">

                                                <button class="btn btn-primary">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Basic Information -->

                                <!-- Contact Details -->
                                <div class="card contact-card">
                                    <div class="card-body">
                                        <h4 class="card-title">Contact Details</h4>
                                        <div class="row form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address Line 1</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Address Line 2</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">City</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">State / Province</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Country</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Postal Code</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row justify-content-end pl-4">
                                                <button class="btn btn-primary">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Contact Details -->
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="row justify-content-center">
                            <div class="col-md-7 col-lg-8 col-xl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Notification Settings</h4>
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
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Display Settings</h4>
                                        <div class="row form-row">
                                            <div class="col-md-12">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch1">
                                                    <label class="custom-control-label" for="customSwitch1">Lorem
                                                        Ipsum</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch2">
                                                    <label class="custom-control-label" for="customSwitch2">Lorem
                                                        Ipsum</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch3">
                                                    <label class="custom-control-label" for="customSwitch3">Lorem
                                                        Ipsum</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Notification Settings</h4>
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
                        </div>
                    </div>
                    <div id="menu2" class=" tab-pane fade">
                        <div class="row justify-content-center">
                            <div class="col-md-7 col-lg-8 col-xl-9">
                                <div class="card contact-card">
                                    <div class="card-body">
                                        <h4 class="card-title">Password</h4>
                                        <div class="row form-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Current Password</label>
                                                    <input type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">New Password</label>
                                                    <input type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Confirm New Password</label>
                                                    <input type="password" class="form-control">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row requirements">
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
                                        </div>
                                        <div class="row justify-content-end">
                                            <button class="btn btn-outline-secondary mr-4">
                                                Cancel
                                            </button>
                                            <button class="btn btn-primary">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <button class="btn btn-outline-secondary mr-4">
                                                Cancel
                                            </button>
                                            <button class="btn btn-primary">
                                                Set up
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Social Accounts</h4>
                                        <div class="row form-row">
                                            <div class="col-md-12">

                                                <div class="col-md-12">
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <i class="fab fa-twitter social-icon"></i>
                                                                <div class="social">

                                                                    <p>Twitter</p>
                                                                    <a href="www.twitter.com">www.twitter.com</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row justify-content-end">
                                                                <button
                                                                    class="btn social-button btn-outline-secondary mr-4">
                                                                    Disconnect
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <i class="fab fa-linkedin social-icon"></i>
                                                                <div class="social">

                                                                    <p>LinkedIn</p>
                                                                    <!-- <a href="www.linkedIn.com">www.linkedIn.com</a> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row justify-content-end">
                                                                <button
                                                                    class="btn social-button btn-outline-secondary mr-4">
                                                                    Connect
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <i class="fab fa-facebook social-icon"></i>
                                                                <div class="social">

                                                                    <p>Facebook</p>
                                                                    <a href="www.twitter.com">www.facebook.com</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row justify-content-end">
                                                                <button
                                                                    class="btn social-button btn-outline-secondary mr-4">
                                                                    Disconnect
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Device History</h4>
                                        <div class="row form-row">
                                            <div class="col-md-12">



                                                <div class="col-md-12">
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-8">
                                                            <div class="row">
                                                                <div class="col-sm-1 pl-0 pr-0"><i
                                                                        class="fas fa-laptop social-icon"></i></div>
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
                                                            <div class="row justify-content-end">
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
                                                                <div class="col-sm-1 pl-0 pr-0"> <i
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
                                                            <div class="row justify-content-end">
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
                                                                <div class="col-sm-1 pl-0 pr-0"><i
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
                                                            <div class="row justify-content-end">
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
                                </div>


                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
    @endsection