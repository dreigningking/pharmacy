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
            {{-- @include('pharmacy.sidebar') --}}

            <div class="offset-1 col-10">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>Inventory Start</h4>
                                <div class="d-flex justify-content-between my-2">
                                    <button class="btn btn-dark">View Instructions</button>
                                    <button class="btn btn-primary">Download 0 Drugs</button>
                                    <button class="btn btn-success">Upload Inventory</button>
                                    <button class="btn btn-info">Download Sample Data</button>   
                                </div>
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-bordered table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox"></th>
                                                <th>Drug Name</th>
                                                <th>Contents</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($drugs->sortBy('name') as $drug)
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td><a href="invoice.html">{{$drug->name}}</td>
                                                <td>{{implode(',',$drug->ingredients->pluck('name')->toArray())}}</td>   
                                            </tr>
                                            @endforeach
                                            
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