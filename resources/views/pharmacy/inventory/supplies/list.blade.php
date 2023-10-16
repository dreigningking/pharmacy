@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
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
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                <div class="card search-filter">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Search Purchases</h3>
                    </div>
                    <div class="card-body">
                        <form action="#" method="get">
                            <div class="filter-widget">
                                <h4>Filter Supplier</h4>			
                            </div>
                            <div class="filter-widget">
                                <input type="text" name="name" value="" class="form-control" placeholder="">		
                            </div>
                            
                            <div class="filter-widget">
                                <h4>Filter Type</h4>
                                <div class="d-flex">
                                    <div class="mr-3">
                                        <label class="custom_check">
                                            <input type="checkbox" name="type[]"  value="drug">
                                            <span class="checkmark"></span> Drugs
                                        </label>
                                    </div>
                                    <div>
                                        <label class="custom_check">
                                            <input type="checkbox" name="type[]"  value="non_drug">
                                            <span class="checkmark"></span> Non-drugs
                                        </label>
                                    </div> 
                                </div>
                            </div>
                            <div class="filter-widget">
                                <h4>Date Created</h4>			
                            </div>
                            <div class="filter-widget">
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" placeholder="From Date">
                                </div>			
                            </div>
                                                        
                            <div class="filter-widget">
                                <h4>Status</h4>
                                <div>
                                    <select name="show" class="form-control">
                                        <option value="all" >All </option>
                                        <option value="out_of_stock"> Completed</option>
                                        <option value="over_stock"> Processing</option>
                                        
                                    </select>
                                </div>
                                
    
                            </div>
                            
                            <div class="btn-search">
                                <button type="submit" class="btn btn-block">Search</button>
                            </div>	
                        </form>
                    </div>
                    {{-- <div class="card-body">
                        <div class="clinic-booking">
                            <a class="apt-btn" href="booking.html">View Subscription Plans</a>
                        </div>
                    </div> --}}
                    
                </div>
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="d-flex justify-content-between">Purchases <a href="{{route('pharmacy.purchases.create',$pharmacy)}}" class="btn btn-primary">New Purchase</a></h3>
                                <div class="table-responsivee">
                                    <table class="datatable table table-hover table-bordered table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Date Created</th>
                                                <th>Supplier</th>
                                                <th>No of items</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($purchases->sortByDesc('updated_at') as $purchase)
                                                <tr>
                                                    <td>{{$purchase->created_at->format('M d')}}</td>
                                                    <td>{{$purchase->supplier->name}}</td>   
                                                    <td>{{$purchase->details->count()}}</td>   
                                                    <td>{{$purchase->total}}</td>   
                                                    <td class="text-left">
                                                        
                                                        <div class="actions">
                                                            @if($purchase->status)
                                                                <span class="badge badge-success">Completed</span>
                                                                <a class="btn btn-sm bg-success-light" href="{{route('pharmacy.purchases.show',[$pharmacy,$purchase])}}">
                                                                    <i class="fa fa-eye"></i> View
                                                                </a>
                                                            @else
                                                        
                                                            <a class="btn btn-sm bg-success-light" href="{{route('pharmacy.purchases.add_to_inventory',[$pharmacy,$purchase])}}">
                                                                <i class="fa fa-plus-circle"></i> Add to Inventory
                                                            </a>
                                                            <a class="btn btn-sm bg-primary-light" href="{{route('pharmacy.purchases.edit',[$pharmacy,$purchase])}}">
                                                                <i class="fe fe-pencil"></i> Edit
                                                            </a>
                                                            
                                                            <a data-toggle="modal" href="#delete_modal{{$purchase->id}}" class="btn btn-sm bg-danger-light">
                                                                <i class="fe fe-trash"></i> Delete
                                                            </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No Supplies 
                                                        <a href="{{route('pharmacy.purchases.create',$pharmacy)}}">Add Supplies</a>
                                                    </td>
                                                </tr>
                                            @endforelse 
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

</div>
<!-- /Page Content -->

@endsection
@section('modals')
    @foreach ($purchases as $purchase)
        <div class="modal fade custom-modal add-modal" id="delete_modal{{$purchase->id}}">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Purchase Order
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 d-flex">
                                <div class="card flex-fill">

                                    <div class="card-body">
                                        <form method="post" action="{{route('pharmacy.purchases.delete',$pharmacy)}}">@csrf
                                            <p>Are you sure you want to delete this purchase order</p>
                                            <input type="hidden" name="purchase_id" value="{{$purchase->id}}">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Yes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
<!-- Add Staff Modal -->
@push('scripts')
@endpush