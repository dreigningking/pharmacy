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
                                                            <th class="text-center">Status</th>

                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                            @foreach($user->pharmacies as $pharmacy)

                                                                @foreach($pharmacy->users as $staff)
                                                                    <tr>
                                                                        <td>
                                                                            <h2 class="table-avatar">
                                                                                <a href="profile.html"
                                                                                    class="avatar avatar-sm mr-2"><img
                                                                                        class="avatar-img rounded-circle"
                                                                                        src="assets/img/patients/patient2.jpg"
                                                                                        alt="User Image"></a>
                                                                                {{$staff->name}}
                                                                            </h2>
                                                                        </td>
                                                                        <td>{{$staff->pharmacies->where("id",$pharmacy->id)->first()->name}}</td>
                                                                        <td class="text-center">
                                                                            <select name="" id="" class="role-select form-control">
                                                                                <option selected >{{$pharmacy->staff->where('user_id',$user->id)->first()->role->name}}</option>
                                                                                @foreach($roles->where("id","!=",$pharmacy->staff->where('user_id',$user->id)->first()->role->id)  as $role)
                                                                                <option value="pharmacist"> {{$role->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center">@if($pharmacy->staff->where('user_id',$user->id)->first()->status) Active @else Inactive @endif</td>
                                                                        <td class="text-right d-flex justify-content-center">
                                                                            <div class="actions d-flex align-items-center justity-content-center">
                                                                                <a class="btn btn-sm bg-success-light"
                                                                                    data-toggle="modal" href="#edit_staff">
                                                                                    <i class="fe fe-pencil"></i> Edit
                                                                                </a>
                                                                                <form action="{{route('staff.destroy')}}" method="POST" class="mb-0 ml-2"> @csrf
                                                                                    <div class="form-group-inline">
                                                                                        <div>
                                                                                            <input type="hidden" name="pharmacy_id" class="form-control" value="{{$pharmacy->id}}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group-inline">
                                                                                        <div>
                                                                                            <input type="hidden" name="user_id" class="form-control" value="{{$staff->id}}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <button type="submit" class="btn btn-sm bg-danger-light">Delete </button>
                                                                                </form>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
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
                <!-- /Page Wrapper -->


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
                                    <form action="{{route('staff')}}" method="POST"> @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Email Address</label>
                                            <div class="col-lg-9">
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Pharmacy</label>
                                            <div class="col-lg-9">
                                                <select name="pharmacy_id" id="pharmacy_id" class="role-select form-control">
                                                    @foreach ($user->pharmacies as $pharmacy )
                                                        <option value="{{$pharmacy->id}}">{{ucwords($pharmacy->name)}}</option>
                                                    @endforeach
                                                </select>
                                                </td>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Role</label>
                                            <div class="col-lg-9">
                                                <select name="role_id" id="role_id" class="role-select form-control">
                                                    @foreach ($roles as $role )
                                                        <option value="{{$role->id}}">{{ucwords($role->name)}}</option>
                                                    @endforeach
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
    <!-- Edit Details Modal -->
    @foreach($user->pharmacies as $pharmacy)

        @foreach($pharmacy->users as $staff)
            <div class="modal fade custom-modal" id="edit_staff">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Staff</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl-12 d-flex">
                                    <div class="card flex-fill">
                                        
                                        <div class="card-body">
                                            <form action="{{route('staff')}}" method="POST"> @csrf
                                        
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Name</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="name" class="form-control" value="{{$staff->name}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Email Address</label>
                                                    <div class="col-lg-9">
                                                        <input type="email" name="email" class="form-control" value="{{$staff->email}}">
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Pharmacy</label>
                                                    <div class="col-lg-9">
                                                        <select name="pharmacy_id" id="pharmacy_id" class="role-select form-control">
                                                            @foreach ($user->pharmacies as $pharmacy )
                                                                <option value="{{$pharmacy->id}}">{{ucwords($pharmacy->name)}}</option>
                                                            @endforeach
                                                        </select>
                                                        </td>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Role</label>
                                                    <div class="col-lg-9">
                                                        <select name="role_id" id="role_id" class="role-select form-control">
                                                            @foreach ($roles as $role )
                                                                <option value="{{$role->id}}">{{ucwords($role->name)}}</option>
                                                            @endforeach
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
        @endforeach
    @endforeach
@endsection
    