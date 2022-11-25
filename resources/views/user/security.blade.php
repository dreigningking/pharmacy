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
                <div class="card contact-card">
                    
                    <div class="card-body">
                        <h4 class="card-title">User Password Update</h4>
                        
                        
                    </div>
                </div>
                <div class="card">
                    
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
                                            <div class="row ">
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
                                            <div class="row ">
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
                                            <div class="row ">
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
                        

                    </div>
                </div>

                
            </div>

        </div>

    </div>
    <!-- /Page Content -->
    @endsection