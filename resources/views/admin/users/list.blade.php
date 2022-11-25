@extends('layouts.admin.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

<!-- Datatables CSS -->
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
@endpush
@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Users</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class=" justify-content-end">
                        
                        <button class="btn btn-primary reaction-btn" data-toggle="modal" href="#add">Create Admin</button>
    
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th> Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                <label class="custom-control-label" for="customControlValidation1"></label>
                                            </div>
                                        </td>
                                        <td> {{$user->name}} </td>
                                        <td> {{$user->email}}  </td>
                                        <td> 
                                            <select class="form-control" name="role_id" disabled>
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}" @if($user->role_id == $role->id) selected @endif> {{ucwords($role->name)}} </option>
                                                @endforeach
                                            </select>
                                        
                                        </td>
                                        <td class="">
                                            <div class="d-flex">
                                                <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit{{$user->id}}"> <i class="fe fe-pencil"></i> Edit </a>
                                                <form id="deleteform{{$user->id}}" action="{{route('admin.users.manage')}}" method="POST">@csrf
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                    <input type="hidden" name="action" value="delete">
                                                    <button type="button" class="btn btn-sm bg-danger-light mx-1 delete" id="{{$user->id}}delete"> <i class="fe fe-trash"></i> Delete </button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                {{-- <tr>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                            <label class="custom-control-label" for="customControlValidation1"></label>
                                        </div>
                                    </td>
                                    <td> David Goliath </td>
                                    <td> davidin@gmail.com | 0802383984394  </td>
                                    <td> 
                                        <select class="form-control">
                                            <option> Customer Care </option>
                                            <option> Super Admin  </option>
                                            <option> Customer Care  </option>
                                        </select>
                                       
                                    </td>
                                    <td class="">
                                        <div class="d-flex">
                                            <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a>
                                             <a class="btn btn-sm bg-primary-light mx-1" data-toggle="modal" href="#view"> <i class="fe fe-eye"></i> View More </a> 
                                            <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-trash"></i> Delete </a>
                                        </div>
                                    </td>

                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush

@section('modals')
<div class="modal fade custom-modal add-modal" id="add">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.users.manage')}}" method="POST">@csrf
                            <div class="row my-2">
                                <div class="col-md-4">
                                    <label for="sel1">Name:</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" placeholder="Name" >
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-4">
                                    <label for="sel1">Email:</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="email" placeholder="Email address" >
                                </div>
                            </div>        
                               
                            <div class="row my-2">
                                <div class="col-md-4">
                                    <label for="sel1">Role:</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" name="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}"> {{ucwords($role->name)}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <p>The email will be used as password and will be required to change on first login</p>
                            <div class="d-flex my-2 justify-content-between">
                                <div class="">
                                    <button type="submit" name="action" value="create" class="btn btn-success">Save</button>
                                </div>
                                <div class="">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                                </div>
                            </div>
                            
                            {{-- <button type="submit" class="btn btn-primary pl-4 pr-4 mt-2">Submit</button> --}}
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($users as $user)
<div class="modal fade custom-modal add-modal" id="edit{{$user->id}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.users.manage')}}" method="POST">@csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <div class="row my-2">
                                <div class="col-md-4">
                                    <label for="sel1">Name:</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Name" >
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-4">
                                    <label for="sel1">Email:</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Email address" >
                                </div>
                            </div>        
                               
                            <div class="row my-2">
                                <div class="col-md-4">
                                    <label for="sel1">Role:</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" name="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}" @if($user->role_id == $role->id) selected @endif> {{ucwords($role->name)}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="d-flex my-2 justify-content-between">
                                <div class="">
                                    <button type="submit" name="action" value="update" class="btn btn-success">Save</button>
                                </div>
                                <div class="">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade custom-modal add-modal" id="delete">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p>Are you sure you want to delete the user</p>
                        
                        <button class="btn btn-danger" id="confirmdelete">Yes, I'm Sure</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reaction Modal -->
@endsection
@push('scripts')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
<script>
    let item;
    $('.delete').click(function(){
        $('#delete').modal();
        item = parseInt($(this).attr('id'));
    })
    $('#confirmdelete').click(function(){
        $('#deleteform'+item).submit();
    })
</script>
@endpush

