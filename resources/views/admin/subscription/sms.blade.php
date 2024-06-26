@extends('layouts.admin.app')
@push('styles')

<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
@endpush
@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">SMS</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">SMS</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h3>Total Units Available for sale: 53</h3>
                <h6>Total Units Sold: 53 | Total SMS Sent: 53 | Total </h6>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Purchase Date</th>
                                    <th>Customer</th>
                                    <th>Pharmacy</th>
                                    <th>Units Purchased</th>
                                    <th>Amount</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    
                                    <td> 2/4/20</td>
                                    <td> Christopher</td>
                                    <td> Christopher</td>
                                    <td>50 </td>
                                    <td>$50 </td>
                                    
                                    <td class="">
                                        <div class="d-flex">
                                            {{-- <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a> --}}
                                            <a class="btn btn-sm bg-primary-light mx-1" data-toggle="modal" href="#view"> <i class="fe fe-eye"></i> View Invoice </a>
                                            {{-- <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-trash"></i> Delete </a> --}}
                                        </div>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush

@section('modals')
<div class="modal fade custom-modal add-modal" id="add">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form action="#" class="needs-validation" novalidate>
                            <div class="row my-2">
                                <div class="col-md-4">
                                    <label for="sel1">Name:</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" placeholder="Name" >
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-4">
                                    <label for="sel1">Email:</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="name" placeholder="Email address" >
                                </div>
                            </div>        
                            <div class="row my-2">
                                <div class="col-md-4">
                                    <label for="sel1">Phone Number:</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="name" placeholder="Phone number" >
                                </div>
                            </div>    
                            <div class="row my-2">
                                <div class="col-md-4">
                                    <label for="sel1">Role:</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control">
                                        <option> Customer Care </option>
                                        <option> Super Admin  </option>
                                        <option> Customer Care  </option>
                                    </select>
                                </div>
                            </div> 
                            <div class="d-flex my-2 justify-content-between">
                                <div class="">
                                    <a href="#" class="btn btn-success">Save</a>
                                </div>
                                <div class="">
                                    <a href="#" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                            
                            {{-- <button type="submit" class="btn btn-primary pl-4 pr-4 mt-2">Submit</button> --}}
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade custom-modal add-modal" id="edit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form action="#" class="needs-validation" novalidate>
                            <div class="row my-2">
                                <div class="col-md-4">
                                    <label for="sel1">Name:</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="Patient Module">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-4">
                                    <label for="sel1">Features:</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" multiple>
                                        <option selected> Patient Module </option>
                                        <option selected> Assessment Module  </option>
                                        <option> Inventory Module  </option>
                                        <option> Analytics Module  </option>
                                    </select>
                                </div>
                            </div> 
                            <div class="row my-2">
                                <div class="col-md-4">
                                    <label for="sel1">Price:</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="name" placeholder="" value="31.99">
                                </div>
                            </div>        
                              
                            
                            <div class="d-flex my-2 justify-content-between">
                                <div class="">
                                    <a href="#" class="btn btn-success">Save</a>
                                </div>
                                <div class="">
                                    <a href="#" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                            
                            {{-- <button type="submit" class="btn btn-primary pl-4 pr-4 mt-2">Submit</button> --}}
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade custom-modal add-modal" id="delete">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p>Are you sure you want to delete the plan</p>
                        
                        <button class="btn btn-danger">Continue</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reaction Modal -->
@endsection
