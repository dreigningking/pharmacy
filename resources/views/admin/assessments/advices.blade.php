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
                    <li class="breadcrumb-item active">Advises</li>
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
                        
                        <div class="about-text">Medication and Non Medication Advises</div>
                        
                    </div>
                    
                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab"> Medication Advises</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Non Medication Advises</a>
                    </li>
                    <li class="nav-item border">
                        <a class="nav-link" href="{{route('admin.assessments.upload_instructions')}}">Upload Advises</a>
                    </li>
                    
                </ul>
            </div>	
            <div class="tab-content profile-tab-cont">
                
                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="#add" data-toggle="modal" class="btn btn-primary"> Add New</a>
                                    <a href="{{route('admin.assessments.upload_instructions')}}" class="btn btn-info"> Upload</a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Medication Advises</h5>
                                    <div class="table-responsive">
                                        <table class="datatable table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-left"></th>
                                                    <th>Advise</th>
                                                    <th>Status</th>
                                                    <th class=""> Action</th>
                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- <tr>
                                                    <td class=" text-center">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                            <label class="custom-control-label" for="customControlValidation1"></label>
                                                        </div>
                                                    </td>
                                                    <td> Eat before taking medicine</td>
                                                    
                                                    
                                                    <td> Active </td>
                                                    <td> 
                                                        <div class="d-flex">
                                                            <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a>
                                                            <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-eye"></i> Delete </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                            <label class="custom-control-label" for="customControlValidation1"></label>
                                                        </div>
                                                    </td>
                                                    <td > Take medicine with water</td>
                                                    <td class=""> Active </td>
                                                    <td> 
                                                        <div class="d-flex">
                                                            <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a>
                                                            <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-eye"></i> Delete </a>
                                                        </div>
                                                    </td>
                                                </tr> --}}
                                                @forelse ($advices->where('type','medication') as $med_advice)
                                                    <tr>
                                                        <td class="text-center">
                                                            <div class="custom-control custom-checkbox mb-3">
                                                                <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                                <label class="custom-control-label" for="customControlValidation1"></label>
                                                            </div>
                                                        </td>
                                                        <td class="d-flex align-items-center">
                                                            {{$med_advice->description}}
                                                        </td>
                                                        
                                                        <td class=""> @if($med_advice->status) Active  @else Inactive @endif </td>
                                                        <td class=""> 
                                                            <div class="d-flex">
                                                                <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit{{$med_advice->id}}"> <i class="fe fe-pencil"></i> Edit </a>
                                                                <form id="deleteform{{$med_advice->id}}" action="{{route('admin.assessments.advices.manage')}}" method="POST">@csrf
                                                                    <input type="hidden" name="advice_id" value="{{$med_advice->id}}">
                                                                    <input type="hidden" name="action" value="delete">
                                                                    <button type="button" class="btn btn-sm bg-danger-light mx-1 delete" id="{{$med_advice->id}}delete"> <i class="fe fe-eye"></i> Delete </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>    
                                                @empty
                                                    <tr>
                                                        <td colspan="4"> No medication advice</td>
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
                <!-- /Personal Details Tab -->
                
                <!-- Change Password Tab -->
                <div id="password_tab" class="tab-pane fade">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="#add" data-toggle="modal" class="btn btn-primary"> Add New</a>
                                    <a href="{{route('admin.assessments.upload_instructions')}}" class="btn btn-info"> Upload</a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Non Medication Advises</h5>
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
                                                @forelse ($advices->where('type','non_medication') as $non_medadvice)
                                                    <tr>
                                                        <td class="text-center">
                                                            <div class="custom-control custom-checkbox mb-3">
                                                                <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                                <label class="custom-control-label" for="customControlValidation1"></label>
                                                            </div>
                                                        </td>
                                                        <td class="d-flex align-items-center">
                                                            {{$non_medadvice->description}}
                                                        </td>
                                                        
                                                        <td class=""> Active </td>
                                                        <td class=""> 
                                                            <div class="d-flex">
                                                                <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit{{$non_medadvice->id}}"> <i class="fe fe-pencil"></i> Edit </a>
                                                                <form id="deleteform{{$non_medadvice->id}}" action="{{route('admin.assessments.advices.manage')}}" method="POST">@csrf
                                                                    <input type="hidden" name="advice_id" value="{{$non_medadvice->id}}">
                                                                    <input type="hidden" name="action" value="delete">
                                                                    <button type="button" class="btn btn-sm bg-danger-light mx-1 delete" id="{{$non_medadvice->id}}delete"> <i class="fe fe-eye"></i> Delete </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>    
                                                @empty
                                                    <tr>
                                                        <td colspan="4"> No Non-medication advice</td>
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
                    <h5 class="modal-title">Add Advice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.assessments.advices.manage')}}" method="POST">@csrf
                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Describe Advice:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="description" placeholder="" ></textarea>
                                    </div>
                                </div>

                                <div class="row my-2">
                                    <div class="col-md-4 form-group">
                                        <label for="sel1">Type:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control " required="" name="type" aria-hidden="true">
                                            <option selected disabled>Select</option>
                                            <option value="medication">Medication</option>
                                            <option value="non_medication">Non Medication</option>
                                            
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
    @foreach ($advices as $advice)
    <div class="modal fade custom-modal add-modal" id="edit{{$advice->id}}">                       
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Advice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.assessments.advices.manage')}}" method="POST">@csrf
                                <input type="hidden" name="advice_id" value="{{$advice->id}}">
                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Description:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="description" value="{{$advice->description}}" placeholder="" >
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-md-4 form-group">
                                        <label for="sel1">Type:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="type" class="form-control " required="" aria-hidden="true">
                                            <option disabled>Select</option>
                                            <option @if($advice->type == 'medication') selected @endif >Medication</option>
                                            <option @if($advice->type == 'non_medication') selected @endif>Non Medication</option>
                                            
                                        </select>
                                    </div>
                                </div> 
                                <div class="row my-2">
                                    <div class="col-md-4 form-group">
                                        <label for="sel1">Status:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="status" required>
                                            <option value="1" @if($advice->status) selected @endif>ON</option>
                                            <option value="0" @if(!$advice->status) selected @endif>OFF</option>
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
                    <h5 class="modal-title">Delete Advice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Are you sure you want to delete this Advice?</p>
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