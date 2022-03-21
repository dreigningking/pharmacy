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
                    <div class="card-header border-0"><h3>Suppliers</h3></div>
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

                                    <tr>    
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html"
                                                    class="avatar avatar-sm mr-2"><img
                                                        class="avatar-img rounded-circle"
                                                        src="assets/img/patients/patient1.jpg"
                                                        alt="User Image"></a>
                                                <a href="profile.html">Charleen Pharma </a>
                                            </h2>
                                        </td>

                                        <td>0802 345 6789</td>
                                        <td>supplier@gmail.com</td>
                                        <td>GTBank 0051234943</td>
                                        
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
<!-- /Page Content -->

@endsection
@section('modals')
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
@endsection
