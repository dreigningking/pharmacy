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
            @include('main.director.sidebar')

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
                                            Staff</a>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <h3 class="page-title">List of Patient</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
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

                                                            <th>Staff Name</th>
                                                            <th>Pharmacy</th>
                                                            <th class="text-center">Role</th>

                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>

                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="assets/img/patients/patient1.jpg"
                                                                            alt="User Image"></a>
                                                                    <a href="profile.html">Charlene Reed </a>
                                                                </h2>
                                                            </td>

                                                            <td>Medplus</td>
                                                            <td class="text-center">
                                                                <select name="" id="" class="role-select form-control">

                                                                    <option value="pharmacist">Pharmacist</option>
                                                                    <option value="store-keeper">Store keeper</option>
                                                                </select>
                                                            </td>



                                                            <td class="text-right">
                                                                <div class="actions">
                                                                    <a class="btn btn-sm bg-success-light"
                                                                        data-toggle="modal" href="#edit_staff">
                                                                        <i class="fe fe-pencil"></i> Edit
                                                                    </a>
                                                                    <a data-toggle="modal" href="#delete_modal"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        Disable
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="assets/img/patients/patient2.jpg"
                                                                            alt="User Image"></a>
                                                                    <a href="profile.html">Travis Trimble </a>
                                                                </h2>
                                                            </td>
                                                            <td>Ramsgate</td>
                                                            <td class="text-center">
                                                                <select name="" id="" class="role-select form-control">
                                                                    <option value="pharmacist">Pharmacist</option>


                                                                    <option value="store-keeper">Store keeper</option>
                                                                </select>
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="actions">
                                                                    <a class="btn btn-sm bg-success-light"
                                                                        data-toggle="modal" href="#edit_staff">
                                                                        <i class="fe fe-pencil"></i> Edit
                                                                    </a>
                                                                    <a data-toggle="modal" href="#delete_modal"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        Disable
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="assets/img/patients/patient3.jpg"
                                                                            alt="User Image"></a>
                                                                    <a href="profile.html">Carl Kelly</a>
                                                                </h2>
                                                            </td>
                                                            <td>Micoson</td>
                                                            <td class="text-center">
                                                                <select name="" id="" class="role-select form-control">
                                                                    <option value="store-keeper">Store keeper</option>
                                                                    <option value="manager">Manager</option>
                                                                    <option value="pharmacist">Pharmacist</option>

                                                                </select>
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="actions">
                                                                    <a class="btn btn-sm bg-success-light"
                                                                        data-toggle="modal" href="#edit_staff">
                                                                        <i class="fe fe-pencil"></i> Edit
                                                                    </a>
                                                                    <a data-toggle="modal" href="#delete_modal"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        Disable
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="assets/img/patients/patient4.jpg"
                                                                            alt="User Image"></a>
                                                                    <a href="profile.html"> Michelle Fairfax</a>
                                                                </h2>
                                                            </td>
                                                            <td>Meh</td>
                                                            <td class="text-center">
                                                                <select name="" id="" class="role-select form-control">
                                                                    <option value="manager">Manager</option>
                                                                    <option value="pharmacist">Pharmacist</option>
                                                                    <option value="store-keeper">Store keeper</option>
                                                                </select>
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="actions">
                                                                    <a class="btn btn-sm bg-success-light"
                                                                        data-toggle="modal" href="#edit_staff">
                                                                        <i class="fe fe-pencil"></i> Edit
                                                                    </a>
                                                                    <a data-toggle="modal" href="#delete_modal"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        Disable
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="profile.html"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="assets/img/patients/patient5.jpg"
                                                                            alt="User Image"></a>
                                                                    <a href="profile.html">Gina Moore</a>
                                                                </h2>
                                                            </td>
                                                            <td>Bleh</td>
                                                            <td class="text-center">
                                                                <select name="" id="" class="role-select form-control">
                                                                    <option value="agbero">Agbero</option>
                                                                    <option value="manager">Manager</option>
                                                                    <option value="pharmacist">Pharmacist</option>
                                                                    <option value="store-keeper">Store keeper</option>
                                                                </select>
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="actions">
                                                                    <a class="btn btn-sm bg-success-light"
                                                                        data-toggle="modal" href="#edit_staff">
                                                                        <i class="fe fe-pencil"></i> Edit
                                                                    </a>
                                                                    <a data-toggle="modal" href="#delete_modal"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        Disable
                                                                    </a>
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
<div class="modal fade custom-modal add-modal" id="add_staff">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Staff</h5>
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
                                        <label class="col-lg-3 col-form-label">Email Address</label>
                                        <div class="col-lg-9">
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Pharmacy</label>
                                        <div class="col-lg-9">
                                            <select name="" id="" class="role-select form-control">
                                                <option value="agbero">Micoson</option>
                                                <option value="pharmacist">Ramsagate</option>
                                                <option value="store-keeper">Tewe tegbo</option>
                                            </select>
                                            </td>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Role</label>
                                        <div class="col-lg-9">
                                            <select name="" id="" class="role-select form-control">
                                                <option value="agbero">Agbero</option>
                                                <option value="manager">Manager</option>
                                                <option value="pharmacist">Pharmacist</option>
                                                <option value="store-keeper">Store keeper</option>
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


<!-- Edit Details Modal -->
<div class="modal fade custom-modal" id="edit_staff">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Staff Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="usr">Staff Email:</label>
                    <input type="email" class="form-control" id="usr">
                </div>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- /Edit Details Modal -->