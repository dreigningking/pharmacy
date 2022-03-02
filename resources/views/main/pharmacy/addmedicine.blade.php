@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('adminassets/plugins/morris/morris.css')}}">

<!-- Datatables CSS -->
<link rel="stylesheet" href="{{asset('adminassets/plugins/datatables/datatables.min.css')}}">
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
            @include('main.pharmacy.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                @if(Auth::user()->role->name != "sales")
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <button class="btn btn-primary">Add Medicine</button>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end ">
                        <button class="btn btn-primary disabled">Add Reaction</button>
                    </div>

                </div>
                @endif
                <div class="page-wrapper">
                    <div class="content container-fluid">

                        <!-- Page Header -->
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="page-title">Medicines</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active">Medicines</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /Page Header -->


                        <div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /Page Content -->
        @endsection

        @push('scripts')
        <script src="{{asset('adminassets/js/script.js')}}"></script>
        @endpush