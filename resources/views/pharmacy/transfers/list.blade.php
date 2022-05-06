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
                                <h3 class="d-flex justify-content-between">Supplies <a href="{{route('pharmacy.transfer.create',$pharmacy)}}" class="btn btn-primary">New Supplies</a></h3>
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-bordered table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Worth</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($transfers->sortByDesc('updated_at') as $transfer)
                                            <tr>
                                                <td>{{$transfer->created_at->format('M d')}}</td>
                                                <td>{{$transfer->supplier->name}}</td>   
                                                <td>{{$transfer->details->count()}}</td>   
                                                <td>{{$transfer->total}}</td>   
                                                <td class="text-right">
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-primary-light" data-toggle="modal" href="#edit_specialities_details">
                                                            <i class="fe fe-pencil"></i> View
                                                        </a>
                                                        <a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
                                                            <i class="fe fe-pencil"></i> Accept
                                                        </a>
                                                        {{-- <a data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
                                                            <i class="fe fe-trash"></i> Cancel
                                                        </a> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr><td colspan="5" class="text-center">No Supplies <a href="{{route('pharmacy.transfer.create',$pharmacy)}}">Add Supplies</a></td></tr>
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

<!-- Add Staff Modal -->
<div class=" modal fade custom-modal add-modal" id="add_staff">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload
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
                                <form action="#">

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Upload Excel File
                                            Address</label>
                                        <div class="col-lg-9">
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Role</label>
                                        <div class="col-lg-9">
                                            <select name="" id="" class="role-select form-control">
                                                <option value="agbero">
                                                    Agbero
                                                </option>

                                                <option value="pharmacist">
                                                    Pharmacist
                                                </option>
                                                <option value="store-keeper">
                                                    Store
                                                    keeper
                                                </option>
                                            </select>
                                            </td>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
@push('scripts')
<script src="{{asset('adminassets/js/script.js')}}"></script>
@endpush