@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('adminassets/plugins/morris/morris.css')}}">
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
            @include('main.pharmacy.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">


                <!-- Page Wrapper -->
                <div class="page-wrapper">
                    <div class="content container-fluid">

                        <!-- Page Header -->
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row justify-content-end mb-4">
                                        <a class="btn btn-primary btn-lg" data-toggle="modal" href="#add_staff">Add
                                            Drug</a>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <h3 class="page-title">List of Drugs</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{route('pharmacy.drug',$pharmacy)}}">Pharmacy</a></li>

                                        <li class="breadcrumb-item active">Patient</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /Page Header -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div class="table-responsive">
                                                <table class="datatable table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Name</th>

                                                            <th>Composition</th>

                                                            <th>QOH</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>
                                                                Lonart
                                                            </td>


                                                            <td>
                                                                <div class="mb-1">Artemether - 0.5mg</div>
                                                                <div class="mb-1">Lumefantrine - 0.9mg</div>
                                                                <div class="mb-1">Paracetamol - 0.5mg</div>
                                                            </td>



                                                            <td>
                                                                10
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>
                                                                Lonart
                                                            </td>


                                                            <td>
                                                                <div class="mb-1">Artemether - 0.5mg</div>
                                                                <div class="mb-1">Lumefantrine - 0.9mg</div>
                                                                <div class="mb-1">Paracetamol - 0.5mg</div>
                                                            </td>



                                                            <td>
                                                                10
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>
                                                                Lonart
                                                            </td>


                                                            <td>
                                                                <div class="mb-1">Artemether - 0.5mg</div>
                                                                <div class="mb-1">Lumefantrine - 0.9mg</div>
                                                                <div class="mb-1">Paracetamol - 0.5mg</div>
                                                            </td>



                                                            <td>
                                                                10
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

                    </div>
                </div>
                <!-- /Page Wrapper -->


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
                <h5 class="modal-title">Add New Staff
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
                                        <label class="col-lg-3 col-form-label">Email
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