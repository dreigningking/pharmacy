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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title d-flex justify-content-between">
                                    <span>Non Drug Upload Instructions</span> 
                                    {{-- <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a> --}}
                                </h3>
                                <p class="text-muted mb-0 mb-sm-3">Uploading from excel is simple. Prepare the document in the following format:</p>
                                <p class="text-muted mb-0 mb-sm-3">Create an excel file and name it <span class="font-weight-bold">inventory.xls</span> (i.e with excel extension) </p>
                                <p class="text-muted mb-0 mb-sm-3">Create the content in the format below. Take note of the table headers that they are written in small textcases </p>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Type</th>
                                        <th>Type</th>
                                    </tr>
                                    <tr>
                                        <td>Eat well before taking medicine</td>
                                        <td>medical</td>
                                        <td>medical</td>
                                        <td>medical</td>
                                    </tr>
                                    <tr>
                                        <td>Sleep atleast 6 hours daily</td>
                                        <td>non-medical</td>
                                        <td>non-medical</td>
                                        <td>non-medical</td>
                                    </tr>
                                </table>
                                <div class="my-3">
                                    <form class="row" action="" method="POST" enctype="multipart/form-data">@csrf
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Upload File</label>
                                                <div class="col-lg-9">
                                                    <input type="file" name="drugs" class="form-control" required accept=".xlsx,.xls">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <div class="col-6">
                                        <div class="form-group" action="">
                                            <a href="#" class="btn btn-lg  btn-primary">Upload</a>
                                        </div>
                                    </div> 
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