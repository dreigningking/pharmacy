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
                    @foreach ($roles->where('name','!=','admin') as $role)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->first) active @endif" data-toggle="tab" href="#{{$role->name}}">{{ucwords($role->name)}}</a>
                    </li>
                    @endforeach
                    

                </ul>
            </div>
            <div class="tab-content profile-tab-cont">
                @foreach ($roles->where('name','!=','admin') as $role)
                <div class="tab-pane fade show @if($loop->first) active @endif" id="{{$role->name}}">
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
                                            <input type="hidden" name="role" value="subadmin">
                                            @foreach($permissions as $permission)
                                                <div class="col-md-12 d-flex">

                                                    <div class="form-group w-100 d-flex">
                                                        <label for="usr" class="col-5">{{$permission->description}}</label>
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="list" @if($role->permissions->firstWhere('id',$permission->id) && $role->permissions->firstWhere('id',$permission->id)->pivot->list) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="view" @if($role->permissions->firstWhere('id',$permission->id) && $role->permissions->firstWhere('id',$permission->id)->pivot->view) checked @endif>
                                                        
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="edit" @if($role->permissions->firstWhere('id',$permission->id) && $role->permissions->firstWhere('id',$permission->id)->pivot->edit) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="new" @if($role->permissions->firstWhere('id',$permission->id) && $role->permissions->firstWhere('id',$permission->id)->pivot->new) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="delete" @if($role->permissions->firstWhere('id',$permission->id) && $role->permissions->firstWhere('id',$permission->id)->pivot->remove) checked @endif>
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
                @endforeach
                {{-- <div class="tab-pane fade show" id="finance_tab">
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
                                            <input type="hidden" name="role" value="finance">
                                            @foreach($permissions as $permission)
                                                <div class="col-md-12 d-flex">

                                                    <div class="form-group w-100 d-flex">
                                                        <label for="usr" class="col-5">{{$permission->description}}</label>
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="list" 
                                                            @if($roles->where('name','finance')->first()->permissions->where('id',$permission->id)->where('pivot.list',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="view" 
                                                            @if($roles->where('name','finance')->first()->permissions->where('id',$permission->id)->where('pivot.view',1)->isNotEmpty()) checked @endif>
                                                        
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="edit" 
                                                            @if($roles->where('name','finance')->first()->permissions->where('id',$permission->id)->where('pivot.edit',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="new" 
                                                            @if($roles->where('name','finance')->first()->permissions->where('id',$permission->id)->where('pivot.new',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="remove" 
                                                            @if($roles->where('name','finance')->first()->permissions->where('id',$permission->id)->where('pivot.remove',1)->isNotEmpty()) checked @endif>
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
                
                <div class="tab-pane fade show" id="operations_tab">
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
                                            <input type="hidden" name="role" value="operations">
                                            @foreach($permissions as $permission)
                                                <div class="col-md-12 d-flex">

                                                    <div class="form-group w-100 d-flex">
                                                        <label for="usr" class="col-5">{{$permission->description}}</label>
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="list" 
                                                            @if($roles->where('name','operations')->first()->permissions->where('id',$permission->id)->where('pivot.list',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="view" 
                                                            @if($roles->where('name','operations')->first()->permissions->where('id',$permission->id)->where('pivot.view',1)->isNotEmpty()) checked @endif>
                                                        
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="edit" 
                                                            @if($roles->where('name','operations')->first()->permissions->where('id',$permission->id)->where('pivot.edit',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="new" 
                                                            @if($roles->where('name','operations')->first()->permissions->where('id',$permission->id)->where('pivot.new',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="remove" 
                                                            @if($roles->where('name','operations')->first()->permissions->where('id',$permission->id)->where('pivot.remove',1)->isNotEmpty()) checked @endif>
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

                <div class="tab-pane fade show" id="customer_tab">
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
                                            <input type="hidden" name="role" value="customer">
                                            @foreach($permissions as $permission)
                                                <div class="col-md-12 d-flex">

                                                    <div class="form-group w-100 d-flex">
                                                        <label for="usr" class="col-5">{{$permission->description}}</label>
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="list" 
                                                            @if($roles->where('name','customer')->first()->permissions->where('id',$permission->id)->where('pivot.list',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="view" 
                                                            @if($roles->where('name','customer')->first()->permissions->where('id',$permission->id)->where('pivot.view',1)->isNotEmpty()) checked @endif>
                                                        
                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="edit" 
                                                            @if($roles->where('name','customer')->first()->permissions->where('id',$permission->id)->where('pivot.edit',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="new" 
                                                            @if($roles->where('name','customer')->first()->permissions->where('id',$permission->id)->where('pivot.new',1)->isNotEmpty()) checked @endif>

                                                        <input type="checkbox" class="form-control col-1" name="permissions[{{$permission->id}}][]" value="remove" 
                                                            @if($roles->where('name','customer')->first()->permissions->where('id',$permission->id)->where('pivot.remove',1)->isNotEmpty()) checked @endif>
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
                </div> --}}
            </div>
        </div>
    </div>
</div>

</div>
@endsection