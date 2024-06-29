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
                <h2 class="breadcrumb-title">Sales</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                <div class="card search-filter">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Search Filter</h3>
                    </div>
                    <form>
                    <div class="card-body">
                        <div class="filter-widget">
                            <h4>Item</h4>			
                        </div>
                        <div class="filter-widget">
                            <input type="text" name="search" value="{{$search}}" class="form-control" placeholder="Item or Batch">		
                        </div>
                        
                        <div class="filter-widget">
                            <h4>Date Range</h4>			
                        </div>
                        <div class="filter-widget">
                            <div class="cal-icon">
                                <input type="text" name="from" value="{{$from}}" class="form-control datetimepicker" placeholder="From Date">
                            </div>			
                        </div>
                        <div class="filter-widget">
                            <div class="cal-icon">
                                <input type="text" name="to" value="{{$to}}" class="form-control datetimepicker" placeholder="To Date">
                            </div>			
                        </div>
                        
                        
                        <div class="filter-widget">
                            <h4>Service Provider</h4>
                            <div>
                                <select class="form-control" name="user">
                                    <option value="0" @if(!$user) selected @endif>All Providers</option>
                                    @foreach($pharmacy->users as $staff)
                                    <option @if($user == $staff->name) selected @endif value="{{$staff->id}}">{{$staff->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            
                        </div>
                    
                        <div class="btn-search">
                            <button type="submit" class="btn btn-block">Search</button>
                        </div>	
                        
                    </div>
                    </form>
                    
                </div>
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <h3>Sales</h3>
                                    <a class="btn btn-primary btn-lg"
                                        href="{{route('pharmacy.sales.create',$pharmacy)}}">New
                                        Sale</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-center">
                                        <thead class="th-dark">
                                            <tr>
                                                <th>Date</th>
                                                <th>Invoice No</th>
                                                <th>Items</th>  
                                                <th>Total Amount</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($sales as $sale)
                                                <tr>
                                                    <td class="text-nowrap">{{$sale->created_at->format('d-M-Y')}} </td>
                                                    <td>
                                                        {{$sale->id}}
                                                    </td>
                                                    
                                                    
                                                    <td>{{$sale->summary}}</td>
                                                    <td>₦ {{number_format($sale->total)}}</td>
                                                    <td>
                                                        @if($sale->status)
                                                        <span class="badge badge-pill bg-success-light">Completed</span>
                                                        @else
                                                        <span class="badge badge-pill bg-dark-light">Draft</span>
                                                        @endif
                                                    </td>
                                                    
                                                    <td class="text-right">
                                                        <div class="table-action">
                                                            @if($sale->status)
                                                            <a href="{{route('pharmacy.sales.show',[$pharmacy,$sale])}}" class="btn btn-sm bg-success-light">
                                                                <i class="far fa-eye"></i> View
                                                            </a>
                                                            @else
                                                            <a href="{{route('pharmacy.sales.edit',[$pharmacy,$sale])}}" class="btn btn-sm bg-dark text-white">
                                                                <i class="far fa-edit"></i> Edit
                                                            </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>  
                                                    <td colspan="6" class="text-center">
                                                        No Sales Yet
                                                    </td>
                                                </tr> 
                                            @endforelse
                                            
                                        </tbody>
                                    </table>
                                </div>
                                @include('layouts.pagination',['data'=> $sales])
                                
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