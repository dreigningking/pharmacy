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
                        <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Transactions</h2>
            </div>
        </div>
    </div>
</div>
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
                <!-- Search Filter -->
                <div class="card search-filter">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Search Filter</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" method="get">
                            <div class="filter-widget">
                                <h4>Date Range</h4>			
                            </div>
                            <div class="filter-widget">
                                <div class="cal-icon">
                                    <input type="text" min="{{$min_date}}" value="{{$from_date}}" name="from_date" class="form-control datetimepicker" placeholder="From Date">
                                </div>			
                            </div>
                            <div class="filter-widget">
                                <div class="cal-icon">
                                    <input type="text" max="{{$max_date}}" value="{{$to_date}}" name="to_date" class="form-control datetimepicker" placeholder="To Date">
                                </div>			
                            </div>
                            <div class="filter-widget">
                                <h4>Sort By Date </h4>
                                <div>
                                    <select class="form-control" name="sortBy">
                                        <option value="date_desc" @if($sortBy == 'date_desc') selected @endif>Descending Order</option>
                                        <option value="date_asc" @if($sortBy == 'date_asc') selected @endif>Ascending Order</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="filter-widget">
                                <h4>Type</h4>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="type[]" value="license" id="subscription_type" @if(!$type || in_array('license',$type)) checked @endif >
                                        <span class="checkmark"></span> Subscription
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="type[]" value="sms" id="sms_type" @if(!$type || in_array('sms',$type)) checked @endif>
                                        <span class="checkmark"></span> SMS Units
                                    </label>
                                </div>
                            </div>
                            
                            <div class="btn-search">
                                <button type="submit" name="download" value="0" class="btn btn-block">Search</button>
                            </div>	
                            <button type="submit" name="download" value="1" class="btn btn-block btn-dark mt-3">Download .xls <i class="fa fa-download"></i></button>
                        </form>
                    </div>
                </div>
                <!-- /Search Filter -->
                
            </div>
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card card-table">
                    <div class="card-body">
                    
                        <!-- Invoice Table -->
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Invoice Ref</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Paid On</th>
                                        <th>Method</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payments as $payment)
                                    <tr>
                                        <td>
                                            <a href="invoice-view.html">#{{$payment->reference}}</a>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">{{$payment->purpose}}</h2>
                                        </td>
                                        <td>{{$payment->user->currency_symbol}}{{$payment->amount}}</td>
                                        <td>{{$payment->created_at->calendar()}}</td>
                                        <td>{{ucwords($payment->method)}}</td>
                                        <td class="text-right">
                                            <div class="table-action">
                                                <a href="{{route('invoice',$payment)}}" class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i> View
                                                </a>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No Transactions
                                        </td>
                                        
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /Invoice Table -->
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>		
<!-- /Page Content -->

@endsection

