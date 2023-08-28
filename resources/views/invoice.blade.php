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
                        <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Invoice</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="offset-md-2 col-md-8">
                <!-- Page Wrapper -->
                <div class="page-wrapper">
                    <div class="content container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="invoice-content">
                                            <div class="invoice-item">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="invoice-logo mb-0">
                                                            <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                                                        </div>
                                                        <div class="invoice-info">
                                                            {{-- <strong class="customer-text">Invoice From</strong> --}}
                                                            <p class="invoice-details invoice-details-two">
                                                                Dr. Darren Elder <br>
                                                                806  Twin Willow Lane, Old Forge,<br>
                                                                Newyork, USA <br>
                                                            </p>
                                                            <p class="invoice-details invoice-details-two mt-4">
                                                                <strong>Order:</strong> #{{$payment->reference}} <br>
                                                                <strong>Issued:</strong> {{$payment->created_at->calendar()}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="invoice-info invoice-info2">
                                                            <strong class="customer-text">Invoice To</strong>
                                                            <p class="invoice-details">
                                                                {{$payment->user->name}} <br>
                                                                {{$payment->user->email}} <br>
                                                                {{$payment->user->state->name}}, {{$payment->user->city->name}}<br>
                                                                {{$payment->user->country->name}} <br>
                                                            </p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            <!-- Invoice Drug -->
                                            <div class="invoice-item invoice-table-wrap">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="invoice-table table table-bordered">
                                                                <thead> 
                                                                    <tr>
                                                                        <th>Description</th>
                                                                        <th class="text-center">Quantity</th>
                                                                        
                                                                        <th class="text-right">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>{{strtoupper($payment->purpose)}}</td>
                                                                        <td class="text-center">
                                                                            @if($payment->purpose == 'sms')
                                                                                {{$payment->sms->units}}
                                                                            @else
                                                                                {{$payment->licenses->count()}}
                                                                            @endif
                                                                        </td>
                                                                        
                                                                        <td class="text-right">{{$payment->user->currency_symbol}}{{$payment->amount}}</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-xl-4 ml-auto">
                                                        <div class="table-responsive">
                                                            <table class="invoice-table-two table">
                                                                <tbody>
                                                                <tr>
                                                                    <th>Total Amount Paid:</th>
                                                                    <td><span>{{$payment->user->currency_symbol}}{{number_format($payment->amount)}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Payment Medium:</th>
                                                                    <td><span>{{ucwords($payment->method)}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th></th>
                                                                    <td>
                                                                        <a href="javascript:void(0);" class="btn btn-sm btn-dark">
                                                                        <i class="fas fa-print"></i> Print
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Invoice Drug -->
                                            
                                            <!-- Invoice Information -->
                                            <div class="other-info">
                                                <h4>Other information</h4>
                                                <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
                                            </div>
                                            <!-- /Invoice Information -->
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /Page Wrapper -->


            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection
