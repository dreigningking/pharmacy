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
                        <li class="breadcrumb-Drug"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-Drug active" aria-current="page">Dashboard</li>
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
            @include('pharmacy.sidebar')

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
    <!-- /Page Content -->
    @endsection