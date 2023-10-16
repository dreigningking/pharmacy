@extends('layouts.main.app')
@push('styles')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<style>
    .no_select_border span.select2-selection.select2-selection--single{
        border:0px !important;
    }
    #select2-supplier_select-container{
        text-align: right;
    }
    span.select2-selection.select2-selection--single{
        height:46px;
        padding-top:10px;
        padding-bottom:10px;
        /* width:200px; */
    }
    span.select2.select2-container select2-container--default{
        width:200px!important;
    }
    .select2-container--default .select2-selection--single {
        height: 50px;
        border: 1px solid #dcdcdc;
        border-radius: 3px;
    }
    /* .select2-container--default.select2-selection--single.select2-selection__arrow {
        top: 10px !important;
    } */
    .select2-container--default.select2-selection--single.select2-selection__arrow{
        top: 8px !important;
    }
    /* .select2-container--default .select2-selection--single .select2-selection__arrow{
        top: 8px !important;
    } */
    .select2-container--default.select2-selection--single.select2-selection__rendered {
        line-height: 42px;
    }
    
    .table-trash {
        width: 29px !important;
        height: 29px !important;
    }
    .date {
        width: 150px;
    }
    .table-input{
        width: 90px;
        height: 50px;
        border: none;
    }
    .table-input:focus{
        border: none;
        outline: none;
    }
    .table tr td{
        vertical-align: middle;
        
    }
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        /* -moz-appearance: textfield; */
    }
    .select-remote {
        /* width: 450px !important; */
    }
</style>
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
            {{-- @include('pharmacy.sidebar') --}}
            <div class="col-md-10 offset-md-1">
                <!-- Page Wrapper -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('pharmacy.purchases.update',$pharmacy)}}" method="POST">@csrf
                            <input type="hidden" name="purchase_id" value="{{$purchase->id}}">
                            <div class="invoice-content">
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-logo">
                                                <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="invoice-details ">
                                                <strong>Order: </strong> #{{$purchase->invoice_number}}
                                                </p>
                                                <p class="invoice-details">
                                                <strong>Issued:</strong> {{$purchase->created_at->format('Y-m-d')}}
                                                
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Invoice Drug -->
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-info">
                                                <strong class="customer-text">Purchase Order From</strong>
                                                <p class="invoice-details invoice-details-two">
                                                    {{$pharmacy->name}}, <br>
                                                    {{$pharmacy->city->name}}, {{$pharmacy->state->name}} <br>
                                                   {{$pharmacy->country->name}}.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="invoice-info invoice-info2">
                                                <div class="customer-text d-inline mx-2"><bold>Supplier</bold></div>
                                                <div class="invoice-details no_select_border">
                                                   
                                                    <p id="supplier_name">{{$purchase->supplier->name}}</p>
                                                    <p id="supplier_email">{{$purchase->supplier->email}}</p>
                                                    <p id="supplier_mobile">{{$purchase->supplier->mobile}}</p>
                                                    <p id="supplier_location">{{$purchase->supplier->location}}</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Invoice Drug -->
                                
                                
                                
                                <!-- Invoice Drug -->
                                <div class="invoice-item invoice-table-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive no_select_border">
                                                <table class="invoice-table table table-bordered" id="table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="d-flex flex-wrap justify-content-between" style="min-width: 180px;">
                                                                <span>Description</span> 
                                                                {{-- <a data-toggle="modal" href="#add_drug" class="font-weight-normal text-info">
                                                                    <u>Add New Drug</u>
                                                                </a> --}}
                                                            </th>
                                                            <th class="text-center">Packaging</th>
                                                            <th class="text-center">Cost</th>
                                                            <th class="text-center">Qty</th>
                                                            <th class="text-right ">Total</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody  class="select-body">
                                                        
                                                        @forelse($purchase->details as $detail)
                                                            <tr class="select-row">
                                                                <td class="first-column">
                                                                    {{$detail->inventory->name}}
                                                                </td>
                                                                <td class="text-center extra-column">
                                                                    {{ucwords($detail->package_type)}}
                                                                </td>
                                                                <td class="text-center extra-column">
                                                                    {{$detail->cost}}
                                                                </td>
                                                                <td class="text-center extra-column"> 
                                                                    {{$detail->quantity}}
                                                                </td>
                                                                <td class="text-right unit_amount">
                                                                    {{$detail->amount}}
                                                                </td>
                                                                
                                                            </tr> 
                                                        @endforeach
                                                        
                                                          
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-3">
                                                <h6>Additional information</h6>
                                                <p class="border">{{$purchase->info}}</p>
                                            </div>
                                            {{-- <div class="mt-3">
                                                <input type="checkbox" name="email_supplier" value="1"> Email Supplier
                                            </div> --}}
                                        </div>
                                        <div class="col-md-6 col-xl-4 ml-auto">
                                            <div class="table-responsive">
                                                <table class="invoice-table-two table">
                                                    <tbody>
                                                    <tr>
                                                        <th>Subtotal:</th>
                                                        <td>
                                                            <span>{{$pharmacy->country->currency_symbol}}
                                                                <span id="subtotal">{{$purchase->total}}</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <th>Discount:</th>
                                                        <td><span>-10%</span></td>
                                                    </tr> --}}
                                                    <tr>
                                                        <th>Total Amount:</th>
                                                        <td><span>{{$pharmacy->country->currency_symbol}}<span id="total">{{$purchase->total}}</span></span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Invoice Drug -->
                                
                                <!-- Invoice Information -->
                                
                                <!-- /Invoice Information -->
                                
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Page Wrapper -->


            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection

@push('scripts')
  
  
@endpush
