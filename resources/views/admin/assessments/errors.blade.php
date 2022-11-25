@extends('layouts.admin.app')
@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Assessment Settings</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Assessment</a></li>
                    <li class="breadcrumb-item active">Errors</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    
                    <div class="col ml-md-n2 profile-user-info">
                        
                        <div class="about-text">Contains Prescription Error, Drug Administration Error</div>
                        
                    </div>
                    
                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab"> Errors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Interventions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#outcome_tab">Intervention Outcomes</a>
                    </li>
                </ul>
            </div>	
            <div class="tab-content profile-tab-cont">
                
                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Errors</h5>
                                    <a class="btn btn-primary my-2" href="#add_error" data-toggle="modal">Add New</a>
                                    <a class="btn btn-info my-2" href="{{route('admin.assessments.upload_instructions')}}">Upload</a>
                                    <div class="table-responsive">
                                        <table class="datatable table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-left"></th>
                                                    <th>Description</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                    <th class=""> Action</th>
                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($erors as $eror)
                                                <tr>
                                                    <td class=" text-center">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                            <label class="custom-control-label" for="customControlValidation1"></label>
                                                        </div>
                                                    </td>
                                                    <td> {{$eror->description}}</td>
                                                    <td> {{$eror->type}} </td>
                                                    
                                                    <td> @if($eror->status) Active  @else Inactive @endif  </td>
                                                    <td> 
                                                        <div class="d-flex">
                                                            <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit_error{{$eror->id}}"> <i class="fe fe-pencil"></i> Edit </a>
                                                            <form id="delete_error{{$eror->id}}" action="{{route('admin.assessments.errors.manage')}}" method="POST">@csrf
                                                                <input type="hidden" name="error_id" value="{{$eror->id}}">
                                                                <input type="hidden" name="action" value="delete">
                                                                <button type="button" class="btn btn-sm bg-danger-light mx-1 delete" id="{{$eror->id}}error"> <i class="fe fe-eye"></i> Delete </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                    
                                                @empty
                                                    <tr>
                                                        <td colspan="5">
                                                            No Errors
                                                        </td>
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
                <!-- Change Password Tab -->
                <div id="password_tab" class="tab-pane fade">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Interventions</h5>
                                    <a class="btn btn-primary my-2" href="#add_intervention" data-toggle="modal">Add New</a>
                                    <a class="btn btn-info my-2" href="{{route('admin.assessments.upload_instructions')}}">Upload</a>
                                    <div class="table-responsive">
                                        <table class="datatable table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-left"></th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th class=""> Action</th>
                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($interventions as $intervention)
                                                    <tr>
                                                        <td class="text-center">
                                                            <div class="custom-control custom-checkbox mb-3">
                                                                <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                                <label class="custom-control-label" for="customControlValidation1"></label>
                                                            </div>
                                                        </td>
                                                        <td class="d-flex align-items-center">
                                                            {{$intervention->description}}
                                                        </td>
                                                        
                                                        <td> @if($intervention->status) Active  @else Inactive @endif  </td>
                                                        <td> 
                                                            <div class="d-flex">
                                                                <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit_intervention{{$intervention->id}}"> <i class="fe fe-pencil"></i> Edit </a>
                                                                <form id="delete_intervention{{$intervention->id}}" action="{{route('admin.assessments.interventions.manage')}}" method="POST">@csrf
                                                                    <input type="hidden" name="intervention_id" value="{{$intervention->id}}">
                                                                    <input type="hidden" name="action" value="delete">
                                                                    <button type="button" class="btn btn-sm bg-danger-light mx-1 delete" id="{{$intervention->id}}intervention"> <i class="fe fe-eye"></i> Delete </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>    
                                                @empty
                                                    <tr>
                                                        <td colspan="4"> No Intervention</td>
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
                <!-- /Change Password Tab -->
                <div id="outcome_tab" class="tab-pane fade">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Intervention Outcomes</h5>
                                    <a class="btn btn-primary my-2" href="#add_outcome" data-toggle="modal" >Add New</a>
                                    <a class="btn btn-info my-2" href="{{route('admin.assessments.upload_instructions')}}">Upload</a>
                                    <div class="table-responsive">
                                        <table class="datatable table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-left"></th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th class=""> Action</th>
                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($outcomes as $outcome)
                                                    <tr>
                                                        <td class="text-center">
                                                            <div class="custom-control custom-checkbox mb-3">
                                                                <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                                <label class="custom-control-label" for="customControlValidation1"></label>
                                                            </div>
                                                        </td>
                                                        <td class="d-flex align-items-center">
                                                            {{$outcome->description}}
                                                        </td>
                                                        
                                                        <td class=""> Active </td>
                                                        <td class=""> 
                                                            <div class="d-flex">
                                                                <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit_outcome{{$outcome->id}}"> <i class="fe fe-pencil"></i> Edit </a>
                                                                <form id="delete_outcome{{$outcome->id}}" action="{{route('admin.assessments.outcomes.manage')}}" method="POST">@csrf
                                                                    <input type="hidden" name="outcome_id" value="{{$outcome->id}}">
                                                                    <input type="hidden" name="action" value="delete">
                                                                    <button type="button" class="btn btn-sm bg-danger-light mx-1 delete" id="{{$outcome->id}}outcome"> <i class="fe fe-eye"></i> Delete </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>    
                                                @empty
                                                    <tr>
                                                        <td colspan="4"> No Intervention Outcomes</td>
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
                <!-- /Change Password Tab -->
                
            </div>
        </div>
    </div>

</div>
@endsection
@section('modals')

    <div class="modal fade custom-modal add-modal" id="add_error">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.assessments.errors.manage')}}" method="POST">@csrf
                                <div class="form-group my-3">
                                    <label for="sel1">Describe Error:</label>
                                    <textarea class="form-control" rows="4" name="description" placeholder="" required></textarea>
                                </div>
                                <div class="form-group my-3">
                                    <label for="sel1">Type:</label>
                                    <select class="form-control" name="type" required>
                                        <option value="prescription">PRESCRIPTION</option>
                                        <option value="administration">ADMINISTRATION</option>
                                    </select>
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
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade custom-modal add-modal" id="add_intervention">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Intervention</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.assessments.interventions.manage')}}" method="POST">@csrf
                                <div class="form-group my-3">
                                    <label for="sel1">Describe Intervention:</label>
                                    <textarea class="form-control" rows="4" name="description" required></textarea>
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
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade custom-modal add-modal" id="add_outcome">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Intervention Outcome</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.assessments.outcomes.manage')}}" method="POST">@csrf
                                <div class="form-group my-3">
                                    <label for="sel1">Describe Outcome:</label>
                                    <textarea class="form-control" rows="4" name="description" required></textarea>
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
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($erors as $eror)
    <div class="modal fade custom-modal add-modal" id="edit_error{{$eror->id}}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.assessments.errors.manage')}}" method="POST">@csrf
                                <input type="hidden" name="error_id" value="{{$eror->id}}">
                                <div class="form-group my-3">
                                    <label for="sel1">Describe Errors:</label>
                                    <textarea class="form-control" rows="4" name="description" required>{{$eror->description}}</textarea>
                                </div>
                                <div class="form-group my-3">
                                    <label for="sel1">Type:</label>
                                    <select class="form-control" name="type" required>
                                        <option value="prescription">PRESCRIPTION</option>
                                        <option value="administration">ADMINISTRATION</option>
                                    </select>
                                </div>
                                <div class="form-group my-3">
                                    <label for="sel1">Status:</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1" @if($eror->status) selected @endif>ON</option>
                                        <option value="0" @if(!$eror->status) selected @endif>OFF</option>
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
                                
                                {{-- <button type="submit" class="btn btn-primary pl-4 pr-4 mt-2">Submit</button> --}}
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($interventions as $intervention)
    <div class="modal fade custom-modal add-modal" id="edit_intervention{{$intervention->id}}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Intervention</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.assessments.interventions.manage')}}" method="POST">@csrf
                                <input type="hidden" name="intervention_id" value="{{$intervention->id}}">
                                <div class="form-group my-3">
                                    <label for="sel1">Describe Intervention:</label>
                                    <textarea class="form-control" rows="4" name="description" required>{{$intervention->description}}</textarea>
                                </div>
                                <div class="form-group my-3">
                                    <label for="sel1">Status:</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1" @if($intervention->status) selected @endif>ON</option>
                                        <option value="0" @if(!$intervention->status) selected @endif>OFF</option>
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
    @foreach ($outcomes as $outcome)
    <div class="modal fade custom-modal add-modal" id="edit_outcome{{$outcome->id}}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Intervention Outcome</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.assessments.outcomes.manage')}}" method="POST">@csrf
                                <input type="hidden" name="outcome_id" value="{{$outcome->id}}">
                                <div class="form-group my-3">
                                    <label for="sel1">Describe Errors:</label>
                                    <textarea class="form-control" rows="4" name="description" required>{{$outcome->description}}</textarea>
                                </div>
                                <div class="form-group my-3">
                                    <label for="sel1">Status:</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1" @if($outcome->status) selected @endif>ON</option>
                                        <option value="0" @if(!$outcome->status) selected @endif>OFF</option>
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
                    <h5 class="modal-title">Delete Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Are you sure you want to delete this item</p>
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
    let item,type;
    $('.delete').click(function(){
        $('#delete').modal();
        item = parseInt($(this).attr('id'));
        type = $(this).attr('id').replace(/[0-9]/g, '')
    })
    $('#confirmdelete').click(function(){
        $('#delete_'+type+item).submit();
    })
</script>
@endpush