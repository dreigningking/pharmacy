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
                <div class="card contact-card">
                    <div class="card-body">
                        <h4 class="card-title">Payment Methods</h4>
                        <div class="row jusify-content-between pl-2 pr-2">

                            <p class="text-muted">
                                Cards will be charged either at the end of the month or whenever your balance
                                exceeds the usage threshold. All major credit / debit cards accepted.
                            </p>
                            <div class="row payment">
                                <div class="col-12">

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="card contact-card">
                    <div class="card  card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title">Payment History</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Pharmacy</th>
                                            <th>Type</th>
                                            <th>Start</th>
                                            <th>Expire</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->pharmacies as $pharmacy)
                                            <tr>
                                                <td>{{$pharmacy->name}}</td>
                                                <td>@if($pharmacy->subscriptions->where('status',true)->first()->trial) Trial Subscription @else Annual Subscription @endif</td>
                                                <td>{{$pharmacy->subscriptions->where('status',true)->first()->start->format('d/m/Y')}}</td>
                                                <td>{{$pharmacy->subscriptions->where('status',true)->first()->end->format('d/m/Y') }}</td>
                                                <td>
                                                    {{-- <button class="btn btn-outline d-flex align-items-center payment-btn"><i class="fas fa-file-download"></i><p class="ml-2 mt-0 mb-0">PDF</p></button> --}}
                                                    @if($pharmacy->subscriptions->where('status',true)->first()->end < now())
                                                    <span class="badge badge-lg badge-danger">Expired</span>
                                                    @elseif($pharmacy->subscriptions->where('status',true)->first()->warn < now())
                                                    <span class="badge badge-lg badge-secondary">Expiring</span>
                                                    @else
                                                    <span class="badge badge-lg badge-success">Active</span>
                                                    @endif
                                                    
                                                </td>
                                                <td>
                                                    {{-- @if($pharmacy->subscriptions->where('status',true)->first()->end < now() || $pharmacy->subscriptions->where('status',true)->first()->warn < now()) --}}
                                                    <a href="{{route('pharmacy.checkout',[$pharmacy,$pharmacy->subscriptions->first()->plan])}}"
                                                        class="btn btn-outline d-flex align-items-center payment-btn">

                                                        <i class="fas fa-eye"></i>
                                                        <p class="ml-2 mt-0 mb-0">Renew Subscription</p>
                                                    </a>
                                                    {{-- @else --}}
                                                    {{-- <button
                                                        class="btn btn-outline d-flex align-items-center payment-btn">

                                                        <i class="fas fa-eye"></i>
                                                        <p class="ml-2 mt-0 mb-0">View Invoice</p>
                                                    </button>
                                                    @endif --}}
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td>#3682303</td>
                                            <td>Successful</td>
                                            <td>$264</td>
                                            <td>22/04/2020</td>
                                            <td>
                                                <button
                                                    class="btn btn-outline d-flex align-items-center payment-btn">
                                                    <i class="fas fa-file-download"></i>
                                                    <p class="ml-2 mt-0 mb-0">PDF</p>
                                                </button>
                                            </td>
                                            <td>
                                                <button
                                                    class="btn btn-outline d-flex align-items-center payment-btn">

                                                    <i class="fas fa-eye"></i>
                                                    <p class="ml-2 mt-0 mb-0">Quick View</p>
                                                </button>
                                            </td>
                                        </tr> --}}

                                    </tbody>
                                </table>
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






