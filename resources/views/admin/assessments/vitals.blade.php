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
                    <li class="breadcrumb-item active">Vitals</li>
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
                                    <th>Vital</th>
                                    <th>Status</th>
                                    <th class=""> Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($vitals as $vital)
                                    <tr>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                <label class="custom-control-label" for="customControlValidation1"></label>
                                            </div>
                                        </td>
                                        <td class="d-flex align-items-center">
                                            {{$vital->type}}
                                        </td>
                                        
                                        <td class=""> @if($vital->status) Active  @else Inactive @endif    </td>
                                        <td class=""> 
                                            <div class="d-flex">
                                                <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit{{$vital->id}}"> <i class="fe fe-pencil"></i> Edit </a>
                                                    <form id="deleteform{{$vital->id}}" action="{{route('admin.assessments.vitals.manage')}}" method="POST">@csrf
                                                        <input type="hidden" name="vital_id" value="{{$vital->id}}">
                                                        <input type="hidden" name="action" value="delete">
                                                        <button type="button" class="btn btn-sm bg-danger-light mx-1 delete" id="{{$vital->id}}delete"> <i class="fe fe-eye"></i> Delete </button>
                                                    </form>
                                            </div>
                                        </td>
                                    </tr>    
                                @empty
                                    <tr>
                                        <td colspan="4"> No vital</td>
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
                    <h5 class="modal-title">Add Vital</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.assessments.vitals.manage')}}" method="POST">@csrf
                                <div class="form-group my-3">
                                    <label for="sel1">Describe Vital:</label>
                                    <textarea class="form-control" rows="4" name="type" placeholder="" ></textarea>
                                </div>
                                
                                <div class="form-group my-3">
                                    <label for="sel1">Status:</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1">ON</option>
                                        <option value="0">OFF</option>
                                    </select>
                                </div>
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
    @foreach ($vitals as $vital)
    <div class="modal fade custom-modal add-modal" id="edit{{$vital->id}}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Vital</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.assessments.vitals.manage')}}" method="POST">@csrf
                                <input type="hidden" name="vital_id" value="{{$vital->id}}">
                                <div class="form-group my-3">
                                    <label for="sel1">Describe Conditions:</label>
                                    <textarea class="form-control" rows="4" name="type" required>{{$vital->type}}</textarea>
                                </div>
                                <div class="form-group my-3">
                                    <label for="sel1">Status:</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1" @if($vital->status) selected @endif>ON</option>
                                        <option value="0" @if(!$vital->status) selected @endif>OFF</option>
                                    </select>
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
                    <h5 class="modal-title">Delete Vital</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Are you sure you want to delete Vital</p>
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
