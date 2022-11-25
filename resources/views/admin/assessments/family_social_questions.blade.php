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
                    <li class="breadcrumb-item active">Questions</li>
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
                    <a href="{{route('admin.assessments.upload_instructions')}}" class="btn btn-info"> Upload</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-left"></th>
                                    <th>Question</th>
                                    <th>Status</th>
                                    <th class=""> Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($questions as $question)
                                    <tr>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                <label class="custom-control-label" for="customControlValidation1"></label>
                                            </div>
                                        </td>
                                        <td class="d-flex align-items-center">
                                            {{$question->description}}
                                        </td>
                                        
                                        <td class=""> @if($question->status) Active  @else Inactive @endif    </td>
                                        <td class=""> 
                                            <div class="d-flex">
                                                <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit{{$question->id}}"> <i class="fe fe-pencil"></i> Edit </a>
                                                    <form id="deleteform{{$question->id}}" action="{{route('admin.assessments.family_social_questions.manage')}}" method="POST">@csrf
                                                        <input type="hidden" name="question_id" value="{{$question->id}}">
                                                        <input type="hidden" name="action" value="delete">
                                                        <button type="button" class="btn btn-sm bg-danger-light mx-1 delete" id="{{$question->id}}delete"> <i class="fe fe-eye"></i> Delete </button>
                                                    </form>
                                            </div>
                                        </td>
                                    </tr>    
                                @empty
                                    <tr>
                                        <td colspan="4"> No question</td>
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
                    <h5 class="modal-title">Add Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.assessments.system_review_questions.manage')}}" method="POST">@csrf
                                <div class="form-group my-3">
                                    <label for="sel1">Describe Question:</label>
                                    <textarea class="form-control" rows="4" name="description" placeholder="" ></textarea>
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
    @foreach ($questions as $question)
    <div class="modal fade custom-modal add-modal" id="edit{{$question->id}}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.assessments.family_social_questions.manage')}}" method="POST">@csrf
                                <input type="hidden" name="question_id" value="{{$question->id}}">
                                <div class="form-group my-3">
                                    <label for="sel1">Describe Conditions:</label>
                                    <textarea class="form-control" rows="4" name="description" required>{{$question->description}}</textarea>
                                </div>
                                <div class="form-group my-3">
                                    <label for="sel1">Status:</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1" @if($question->status) selected @endif>ON</option>
                                        <option value="0" @if(!$question->status) selected @endif>OFF</option>
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
                    <h5 class="modal-title">Delete Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Are you sure you want to delete Question</p>
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

