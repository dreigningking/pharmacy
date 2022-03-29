@extends('layouts.admin.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
@endpush
@section('main')
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Role Management</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Roles & Permissions</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab">Director</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#manager_tab">Manager</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#pharmacist_tab">Pharmacist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#sales_tab">Sales Rep</a>
                    </li>

                </ul>
            </div>
            <div class="tab-content profile-tab-cont">

                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">

                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($permissions as $permission)

                                        <form action="{{route('admin.permissions')}}" class="row w-100" method="POST">@csrf
                                        <div class="col-md-6 d-flex">
                                            <div class="form-group w-100 d-flex">
                                                <label for="usr" class="col-5">{{$permission->description}}</label>
                                                <input type="checkbox" class="form-control col-1" name="permissions[]" value="{{$permission->id}}" @if(
                                                    in_array($permission->id,$roles->where('name',
                                                'director')->first()->permissions->pluck('id')->toArray()) ) checked
                                                @endif>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="row justify-content-end ml-4">
                                            <button type="submit" class="btn btn-primary ml-2">Save</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>


                </div>
                <div class="tab-pane fade show active" id="manager_tab">

                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($permissions as $permission)

                                       <form action="{{route('admin.permissions')}}" class="row w-100" method="POST">@csrf
                                        <div class="col-md-6 d-flex">
                                            <div class="form-group w-100 d-flex">
                                                <label for="usr" class="col-5">{{$permission->description}}</label>
                                                <input type="checkbox" class="form-control col-1" name="permissions[]" value="{{$permission->id}}" @if(
                                                    in_array($permission->id,$roles->where('name',
                                                'manager')->first()->permissions->pluck('id')->toArray()) ) checked
                                                @endif>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="row justify-content-end ml-4">
                                            <button type="submit" class="btn btn-primary ml-2">Save</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>


                </div>
                <div class="tab-pane fade show active" id="pharmacist_tab">

                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($permissions as $permission)

                                       <form action="{{route('admin.permissions')}}" class="row w-100" method="POST">@csrf
                                        <div class="col-md-6 d-flex">
                                            <div class="form-group w-100 d-flex">
                                                <label for="usr" class="col-5">{{$permission->description}}</label>
                                                <input type="checkbox" class="form-control col-1" name="permissions[]" value="{{$permission->id}}" @if(
                                                    in_array($permission->id,$roles->where('name',
                                                'pharmacist')->first()->permissions->pluck('id')->toArray()) ) checked
                                                @endif>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="row justify-content-end ml-4">
                                            <button type="submit" class="btn btn-primary ml-2">Save</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>


                </div>
                <div class="tab-pane fade show active" id="sales_tab">

                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($permissions as $permission)

                                       <form action="{{route('admin.permissions')}}" class="row w-100" method="POST">@csrf
                                        <div class="col-md-6 d-flex">
                                            <div class="form-group w-100 d-flex">
                                                <label for="usr" class="col-5">{{$permission->description}}</label>
                                                <input type="checkbox" class="form-control col-1" name="permissions[]" value="{{$permission->id}}" @if(
                                                    in_array($permission->id,$roles->where('name',
                                                'sales')->first()->permissions->pluck('id')->toArray()) ) checked
                                                @endif>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="row justify-content-end ml-4">
                                            <button type="submit" class="btn btn-primary ml-2">Save</button>
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
    </div>
</div>

</div>
@endsection