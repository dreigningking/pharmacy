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
                <h3 class="page-title">Assessments Settings</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Assessment</a></li>
                    <li class="breadcrumb-item active">Laboratory Tests</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <a href="#add" data-toggle="modal" class="btn btn-primary"> Add New</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-left"></th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th class=""> Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tests as $test)
                                    <tr>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                <label class="custom-control-label" for="customControlValidation1"></label>
                                            </div>
                                        </td>
                                        <td class="">
                                            {{$test->name}}
                                        </td>
                                        <td class="">
                                            {{$test->category}}
                                        </td>
                                        <td class=""> @if($test->status) Active  @else Inactive @endif    </td>
                                        <td class=""> 
                                            <div class="d-flex">
                                                <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit{{$test->id}}"> <i class="fe fe-pencil"></i> Edit </a>
                                                <form id="deleteform{{$test->id}}" action="{{route('admin.assessments.labtests.manage')}}" method="POST">@csrf
                                                    <input type="hidden" name="test_id" value="{{$test->id}}">
                                                    <input type="hidden" name="action" value="delete">
                                                    <button type="button" class="btn btn-sm bg-danger-light mx-1 delete" id="{{$test->id}}delete"> <i class="fe fe-eye"></i> Delete </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>    
                                @empty
                                    <tr>
                                        <td colspan="4"> No test</td>
                                    </tr>
                                @endforelse
                                
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modals')
    <div class="modal fade custom-modal add-modal" id="add">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Laboratory Test</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.assessments.labtests.manage')}}" method="POST">@csrf
                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Name:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="name" placeholder="" ></textarea>
                                    </div>
                                </div>

                                <div class="row my-2">
                                    <div class="col-md-4 form-group">
                                        <label for="sel1">Category:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control " required="" name="category" aria-hidden="true">
                                            <option selected disabled>Select</option>
                                            <option>Hematology</option>
                                            <option>Hormonal</option>
                                            <option>Microbiology</option>
                                            <option>Chemistry</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="row my-2">
                                    <div class="col-md-4 form-group">
                                        <label for="sel1">Status:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="status" required>
                                            <option value="1">ON</option>
                                            <option value="0">OFF</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex my-2 justify-content-between">
                                    <div class="">
                                        <button type="submit" name="action" value="create" class="btn btn-success">Save</button>
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
    @foreach ($tests as $test)
    <div class="modal fade custom-modal add-modal" id="edit{{$test->id}}">                       
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Lab Test</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.assessments.labtests.manage')}}" method="POST">@csrf
                                <input type="hidden" name="test_id" value="{{$test->id}}">
                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Name:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="name" value="{{$test->name}}" placeholder="" >
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-md-4 form-group">
                                        <label for="sel1">Category:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="category" class="form-control " required="" aria-hidden="true">
                                            <option>Select</option>
                                            <option @if($test->category == 'Hematology') selected @endif >Hematology</option>
                                            <option @if($test->category == 'Hormonal') selected @endif>Hormonal</option>
                                            <option @if($test->category == 'Microbiology') selected @endif>Microbiology</option>
                                            <option @if($test->category == 'Chemistry') selected @endif>Chemistry</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="row my-2">
                                    <div class="col-md-4 form-group">
                                        <label for="sel1">Status:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="status" required>
                                            <option value="1" @if($test->status) selected @endif>ON</option>
                                            <option value="0" @if(!$test->status) selected @endif>OFF</option>
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
                    <h5 class="modal-title">Delete Lab Test</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Are you sure you want to delete Lab Test?</p>
                            <button class="btn btn-danger" id="confirmdelete">Yes, I'm Sure</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
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

