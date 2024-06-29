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
                <h2 class="breadcrumb-title">Invoice View</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<div class="content" style="min-height: 259.2px;">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="invoice-content">
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-logo">
                                    <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="invoice-details">
                                    <strong>Order:</strong> #{{$sale->id}} <br>
                                    <strong>Issued:</strong> {{$sale->created_at->format('d/m/Y')}} <br> 
                                    <strong>Status:</strong> @if($sale->status) Paid @else Unpaid @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <strong class="customer-text">Invoice From</strong>
                                    <p class="invoice-details invoice-details-two">
                                        {{$pharmacy->name}} <br>
                                        {{$pharmacy->address}},{{$pharmacy->city->name}}<br>
                                        {{$pharmacy->state->name}}, {{$pharmacy->country->name}} <br>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-info invoice-info2">
                                    <strong class="customer-text">Invoice To</strong>
                                    <p class="invoice-details">
                                        {{$sale->patient->name}} <br>
                                        {{$sale->patient->email}} <br>
                                        {{$sale->patient->mobile}} <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
                    
                    
                    
                    <!-- Invoice Item -->
                    <div class="invoice-item invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="invoice-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sale->details as $detail)
                                            <tr>
                                                <td>{{$detail->inventory->name}} ({{$detail->batch}})</td>
                                                <td class="text-center">{{$detail->quantity}}</td>
                                                <td class="text-center">{{$pharmacy->country->currency_symbol}}{{$detail->price}}</td>
                                                <td class="text-right">{{$pharmacy->country->currency_symbol}}{{$detail->amount}}</td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 ml-auto">
                                <div class="table-responsive">
                                    <table class="invoice-table-two table">
                                        <tbody>
                                        <tr>
                                            <th>Subtotal:</th>
                                            <td><span>{{$pharmacy->country->currency_symbol}}{{$sale->total}}</span></td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Total Amount:</th>
                                            <td><span>{{$pharmacy->country->currency_symbol}}{{$sale->total}}</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
                    
                    <!-- Invoice Information -->
                    <div class="other-info">
                        
                        <p class="text-muted text-right mb-0">
                            <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                <i class="fas fa-print"></i> Print
                            </a>
                            <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                <i class="fas fa-envelope"></i> Email
                            </a>
                        </p>
                    </div>
                    <!-- /Invoice Information -->
                    
                </div>
            </div>
        </div>

    </div>

</div>

@endsection