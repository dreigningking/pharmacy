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
                        <a class="nav-link active" data-toggle="tab" href="#director">Director</a>
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
                
                <div class="tab-pane fade show active" id="director">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 d-flex">
                                            <div class="form-group row w-100 d-flex font-weight-bold">
                                                <div class="col-sm-12 col-md-5 mr-2">Permission</div>
                                                <div  class="col-sm-2 col-md-1">List</div>
                                                <div  class="col-sm-2 col-md-1">View</div>
                                                <div  class="col-sm-2 col-md-1">Edit</div>
                                                <div  class="col-sm-2 col-md-1">Create</div>
                                                <div  class="col-sm-2 col-md-1">Delete</div>
                                            </div>
                                        </div>
                                        <form action="{{route('admin.roles.permissions')}}" class="row w-100" method="POST">@csrf
                                            <input type="hidden" name="role" value="director">
                                            @foreach($permissions as $permission)
                                                <div class="col-md-12 d-flex">

                                                    <div class="form-group w-100 d-flex">
                                                        <label for="usr" class="col-5">{{$permission->description}}</label>
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="list" 
                                                            @if($roles->where('name','director')->first()->permissions->where('id',$permission->id)->where('pivot.list',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="view" 
                                                            @if($roles->where('name','director')->first()->permissions->where('id',$permission->id)->where('pivot.view',1)->isNotEmpty()) checked @endif>
                                                        
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="edit"  
                                                            @if($roles->where('name','director')->first()->permissions->where('id',$permission->id)->where('pivot.edit',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="new"  
                                                            @if($roles->where('name','director')->first()->permissions->where('id',$permission->id)->where('pivot.new',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="delete"  
                                                            @if($roles->where('name','director')->first()->permissions->where('id',$permission->id)->where('pivot.remove',1)->isNotEmpty()) checked @endif>
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
                <div class="tab-pane fade show" id="manager_tab">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 d-flex">
                                            <div class="form-group row w-100 d-flex font-weight-bold">
                                                <div class="col-sm-12 col-md-5 mr-2">Permission</div>
                                                <div  class="col-sm-2 col-md-1">List</div>
                                                <div  class="col-sm-2 col-md-1">View</div>
                                                <div  class="col-sm-2 col-md-1">Edit</div>
                                                <div  class="col-sm-2 col-md-1">Create</div>
                                                <div  class="col-sm-2 col-md-1">Delete</div>
                                            </div>
                                        </div>
                                        {{-- manager --}}
                                        <form action="{{route('admin.roles.permissions')}}" class="row w-100" method="POST">@csrf
                                            @foreach($permissions as $permission)
                                                <div class="col-md-12 d-flex">

                                                    <div class="form-group w-100 d-flex">
                                                        <label for="usr" class="col-5">{{$permission->description}}</label>
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="list" 
                                                            @if($roles->where('name','manager')->first()->permissions->where('id',$permission->id)->where('pivot.list',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="view" 
                                                            @if($roles->where('name','manager')->first()->permissions->where('id',$permission->id)->where('pivot.view',1)->isNotEmpty()) checked @endif>
                                                        
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="edit" 
                                                            @if($roles->where('name','manager')->first()->permissions->where('id',$permission->id)->where('pivot.edit',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="new" 
                                                            @if($roles->where('name','manager')->first()->permissions->where('id',$permission->id)->where('pivot.new',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="remove" 
                                                            @if($roles->where('name','manager')->first()->permissions->where('id',$permission->id)->where('pivot.remove',1)->isNotEmpty()) checked @endif>
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
                
                <div class="tab-pane fade show" id="pharmacist_tab">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 d-flex">
                                            <div class="form-group row w-100 d-flex font-weight-bold">
                                                <div class="col-sm-12 col-md-5 mr-2">Permission</div>
                                                <div  class="col-sm-2 col-md-1">List</div>
                                                <div  class="col-sm-2 col-md-1">View</div>
                                                <div  class="col-sm-2 col-md-1">Edit</div>
                                                <div  class="col-sm-2 col-md-1">Create</div>
                                                <div  class="col-sm-2 col-md-1">Delete</div>
                                            </div>
                                        </div>
                                        {{-- pharmacist --}}
                                        <form action="{{route('admin.roles.permissions')}}" class="row w-100" method="POST">@csrf
                                            @foreach($permissions as $permission)
                                                <div class="col-md-12 d-flex">

                                                    <div class="form-group w-100 d-flex">
                                                        <label for="usr" class="col-5">{{$permission->description}}</label>
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="list" 
                                                            @if($roles->where('name','pharmacist')->first()->permissions->where('id',$permission->id)->where('pivot.list',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="view" 
                                                            @if($roles->where('name','pharmacist')->first()->permissions->where('id',$permission->id)->where('pivot.view',1)->isNotEmpty()) checked @endif>
                                                        
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="edit" 
                                                            @if($roles->where('name','pharmacist')->first()->permissions->where('id',$permission->id)->where('pivot.edit',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="new" 
                                                            @if($roles->where('name','pharmacist')->first()->permissions->where('id',$permission->id)->where('pivot.new',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="remove" 
                                                            @if($roles->where('name','pharmacist')->first()->permissions->where('id',$permission->id)->where('pivot.remove',1)->isNotEmpty()) checked @endif>
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
                <div class="tab-pane fade show" id="sales_tab">

                
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 d-flex">
                                            <div class="form-group row w-100 d-flex font-weight-bold">
                                                <div class="col-sm-12 col-md-5 mr-2">Permission</div>
                                                <div  class="col-sm-2 col-md-1">List</div>
                                                <div  class="col-sm-2 col-md-1">View</div>
                                                <div  class="col-sm-2 col-md-1">Edit</div>
                                                <div  class="col-sm-2 col-md-1">Create</div>
                                                <div  class="col-sm-2 col-md-1">Delete</div>
                                            </div>
                                        </div>
                                        {{-- sales --}}
                                        <form action="{{route('admin.roles.permissions')}}" class="row w-100" method="POST">@csrf
                                            @foreach($permissions as $permission)
                                                <div class="col-md-12 d-flex">

                                                    <div class="form-group w-100 d-flex">
                                                        <label for="usr" class="col-5">{{$permission->description}}</label>
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="list" 
                                                            @if($roles->where('name','sales')->first()->permissions->where('id',$permission->id)->where('pivot.list',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="view" 
                                                            @if($roles->where('name','sales')->first()->permissions->where('id',$permission->id)->where('pivot.view',1)->isNotEmpty()) checked @endif>
                                                        
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="edit" 
                                                            @if($roles->where('name','sales')->first()->permissions->where('id',$permission->id)->where('pivot.edit',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="new" 
                                                            @if($roles->where('name','sales')->first()->permissions->where('id',$permission->id)->where('pivot.new',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="remove" 
                                                            @if($roles->where('name','sales')->first()->permissions->where('id',$permission->id)->where('pivot.remove',1)->isNotEmpty()) checked @endif>
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