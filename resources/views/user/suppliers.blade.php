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
                <!-- Page Wrapper -->
                <div class="card">
                    <div class="card-header border-0 d-flex justify-content-between">
                        <div><h3>Suppliers</h3></div>
                        <a class="btn btn-primary btn-lg" data-toggle="modal" href="#add_supplier">Add
                            Supplier</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Bank Account</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($suppliers as $supplier)
                                    <tr>    
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#">{{$supplier->name}}</a>
                                            </h2>
                                        </td>

                                        <td>{{$supplier->mobile}}</td>
                                        <td>{{$supplier->email}}</td>
                                        <td>{{$supplier->bank ? $supplier->bank->name: ''}} {{$supplier->bank_account}}</td>
                                        
                                        <td class="text-right">
                                            <div class="actions">
                                                <a class="btn btn-sm bg-success-light"
                                                    data-toggle="modal" href="#edit_staff{{$supplier->id}}">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                <a data-toggle="modal" href="#delete_modal"
                                                    class="btn btn-sm bg-danger-light">
                                                    Disable
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td>No Suppliers</td></tr>
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
<!-- /Page Content -->

@endsection
@section('modals')
    <!-- Add Staff Modal -->
<div class="modal fade custom-modal add-modal" id="add_supplier">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 d-flex">
                        <div class="card flex-fill">
                            
                            <div class="card-body">
                                <form action="{{route('supplier.save')}}" method="POST">@csrf
                                   
                                    <input type="hidden" name="ajax" value="0">
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <div class="form-group ">
                                        <input type="text" name="name" id="supplier_name" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="form-group ">
                                        <input type="email" name="email" id="supplier_email" placeholder="Email" class="form-control" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="form-label">Mobile Number</label>
                                                <input type="text" name="mobile" placeholder="Mobile Number" id="supplier_mobile" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Country</label>
                                                <select name="country_id" id="supplier_country" class="select form-control" required>
                                                    @foreach ($countries as $country)
                                                        <option value="{{$country->id}}" @if($user->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">State</label>
                                                <select name="state_id" id="supplier_state" class="select form-control" required>
                                                    @foreach ($user->country->states as $state)
                                                        <option value="{{$state->id}}" @if($user->state_id == $state->id) selected @endif>{{$state->name}}</option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">City</label>
                                                <select name="city_id" id="supplier_city" class="select form-control" required>
                                                    @foreach ($user->country->cities as $city)
                                                        <option value="{{$city->id}}" @if($user->city_id == $city->id) selected @endif>{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Bank</label>
                                                <select name="country_id" id="supplier_country" class="select form-control">
                                                    @foreach ($banks as $bank)
                                                        <option value="{{$bank->id}}" >{{$bank->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="form-label">Account Number</label>
                                                <input type="text" name="bank_account" id="supplier_bank_account" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" id="save_supplier" class="btn btn-primary">Submit</button>
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

<!-- Add Staff Modal -->

@foreach ($suppliers as $supplier)
<div class="modal fade custom-modal" id="edit_staff{{$supplier->id}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Supplier Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('supplier.save')}}" method="POST">@csrf
                                   
                    <input type="hidden" name="ajax" value="0">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <div class="form-group ">
                        <input type="text" value="{{$supplier->name}}" name="name" id="supplier_name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group ">
                        <input type="email" value="{{$supplier->email}}" name="email" id="supplier_email" placeholder="Email" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" value="{{$supplier->mobile}}" name="mobile" placeholder="Mobile Number" id="supplier_mobile" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <select name="country_id" id="supplier_country" class="select form-control" required>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}" @if($supplier->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">State</label>
                                <select name="state_id" id="supplier_state" class="select form-control" required>
                                    @foreach ($user->country->states as $state)
                                        <option value="{{$state->id}}" @if($supplier->state_id == $state->id) selected @endif>{{$state->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">City</label>
                                <select name="city_id" id="supplier_city" class="select form-control" required>
                                    @foreach ($user->country->cities as $city)
                                        <option value="{{$city->id}}" @if($supplier->city_id == $city->id) selected @endif>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Bank</label>
                                <select name="country_id" id="supplier_country" class="select form-control">
                                    @foreach ($banks as $bank)
                                        <option value="{{$bank->id}}"  @if($supplier->bank_id == $bank->id) selected @endif >{{$bank->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label">Account Number</label>
                                <input type="text" value="{{$state->bank_account}}" name="bank_account" id="supplier_bank_account" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" id="save_supplier" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Edit Details Modal -->


<!-- /Edit Details Modal -->
@endsection
