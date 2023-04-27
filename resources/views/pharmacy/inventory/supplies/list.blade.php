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
            @include('pharmacy.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="d-flex justify-content-between">Purchases <a href="{{route('pharmacy.inventory.purchases.create',$pharmacy)}}" class="btn btn-primary">New Supplies</a></h3>
                                <div class="table-responsivee">
                                    <table class="datatable table table-hover table-bordered table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
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
                                                        @else
                                                       
                                                        <a class="btn btn-sm bg-success-light" href="{{route('pharmacy.inventory.purchases.add_to_inventory',[$pharmacy,$purchase])}}">
                                                            <i class="fa fa-plus-circle"></i> Add to Inventory
                                                        </a>
                                                        <a class="btn btn-sm bg-primary-light" href="#">
                                                            <i class="fe fe-pencil"></i> Edit
                                                        </a>
                                                        {{-- <form class="d-inline" action="#" method="POST">@csrf
                                                            <input type="hidden" name="purchase_id" value="{{$purchase->id}}">
                                                            <button type="submit" class="btn btn-sm bg-danger-light"><i class="fe fe-pencil"></i> Add to Inventory</button>
                                                        </form> --}}
                                                        <a data-toggle="modal" href="#delete_modal{{$purchase->id}}" class="btn btn-sm bg-danger-light">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr><td colspan="5" class="text-center">No Supplies <a href="{{route('pharmacy.inventory.purchases.create',$pharmacy)}}">Add Supplies</a></td></tr>
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
                        <h5 class="modal-title">Delete Supply
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
                                        <form action="#" action="">@csrf
                                            <p>Are you sure you want to delete this</p>
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
<script src="{{asset('adminassets/js/script.js')}}"></script>
@endpush