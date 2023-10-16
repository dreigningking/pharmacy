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
                <h2 class="breadcrumb-title">Inventory</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            
            <div class="col-md-10 offset-md-1">
                <!-- Page Wrapper -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('pharmacy.transfer.save_to_inventory',$pharmacy)}}" method="POST" onsubmit="return confirm('Are you sure')">@csrf
                            <input type="hidden" name="transfer_id" value="{{$transfer->id}}">
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
                                                <strong>Transfer no:</strong> {{$transfer->reference}}
                                                </p>
                                                <p class="invoice-details">
                                                <strong>Issued:</strong> 
                                                {{$transfer->created_at->format('Y-m-d')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Invoice Drug -->
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-info">
                                                <strong class="customer-text">Sending Pharmacy</strong>
                                                <p class="invoice-details invoice-details-two">
                                                    {{$transfer->sending_pharmacy->name}}, <br>
                                                    {{$transfer->sending_pharmacy->city->name}}, {{$transfer->sending_pharmacy->state->name}} <br>
                                                   {{$transfer->sending_pharmacy->country->name}}.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="invoice-info invoice-info2">
                                                {{-- <a href="#add_supplier" data-toggle="modal" class="text-info"><u>Add new</u></a> --}}
                                                <div class="customer-text d-inline mx-2">
                                                    <bold>Receiving Pharmacy</bold>
                                                </div>
                                                <div class="invoice-details no_select_border">
                                                    <p>{{$transfer->receiving_pharmacy->name}}</p>
                                                    {{-- <br> --}}
                                                    <p><span id="city">{{$transfer->receiving_pharmacy->city->name}}</span>,<span id="state">{{$transfer->receiving_pharmacy->state->name}}</span></p>
                                                    <p id="country">{{$transfer->receiving_pharmacy->country->name}}</p>
                                                    
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
                                                            <th style="min-width: 180px;">
                                                                <span>Description</span> 
                                                            </th>
                                                            <th class="text-center">Qty</th>
                                                            <th class="text-center">Cost</th>
                                                            <th class="text-right ">Worth</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody class="select-body">
                                                        @foreach ($transfer->details as $detail)
                                                            <tr class="select-row">
                                                                <td class="first-column">
                                                                    {{$detail->inventory->name}} | {{$detail->batch->number}}
                                                                </td>
                                                                
                                                                <td class="text-center extra-column"> 
                                                                    {{$detail->quantity}}
                                                                </td>
                                                                <td class="text-center extra-column">
                                                                    {{$detail->unit_cost}}
                                                                </td>
                                                                
                                                                <td class="text-right unit_amount">
                                                                    {{$detail->unit_cost * $detail->quantity}}
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
                                                <p class="border">{{$transfer->info}}</p>
                                            </div>
                                            {{-- <div class="mt-3">
                                                <input type="checkbox" name="" id=""> Email Supplier
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
                                                                <span id="subtotal">{{$transfer->total}}</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <th>Discount:</th>
                                                        <td><span>-10%</span></td>
                                                    </tr> --}}
                                                    <tr>
                                                        <th>Total Amount:</th>
                                                        <td>
                                                            <span>
                                                                {{$pharmacy->country->currency_symbol}} 
                                                                <span id="total">{{$transfer->total}}</span>
                                                            </span>
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
                                    
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-12 text-right">
                                            @if($transfer->to_pharmacy == $pharmacy->id && !$transfer->status)
                                            <button type="submit" name="accept" value="1" class="btn btn-primary btn-sm supplies_submit">Accept Transfer</button>
                                            <button type="submit" name="accept" value="0" class="btn btn-danger btn-sm supplies_submit">Reject Transfer</button>
                                            @endif
                                            @if($transfer->status)
                                                @if($transfer->accepted_at)
                                                    Accepted {{$transfer->accepted_at->calendar()}}
                                                @else 
                                                    Rejected {{$transfer->rejected_at->calendar()}}
                                                @endif
                                            @endif
                                            <a href="{{route('pharmacy.transfer.list',$pharmacy)}}" class="btn btn-dark btn-sm">Back</a>
                                        </div>
                                        
                                    </div>
                                </div>
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
@section('modals')

@endsection

@push('scripts')
    
  
@endpush
