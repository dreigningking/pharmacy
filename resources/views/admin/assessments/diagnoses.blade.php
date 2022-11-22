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
                    <li class="breadcrumb-item active">Diagnoses</li>
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
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th class=""> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($diagnoses as $diagnosis)
                                    <tr>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                <label class="custom-control-label" for="customControlValidation1"></label>
                                            </div>
                                        </td>
                                        <td class="d-flex align-items-center">
                                            {{$diagnosis->description}}
                                        </td>
                                        
                                        <td class=""> Active </td>
                                        <td class=""> 
                                            <div class="d-flex">
                                                <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a>
                                                <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-eye"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>    
                                @empty
                                    <tr>
                                        <td colspan="4"> No diagnoses</td>
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
                    <h5 class="modal-title">Add Diagnosis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="#" class="needs-validation" novalidate>
                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Describe Diagnosis:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="name" placeholder="" ></textarea>
                                    </div>
                                </div>

                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Expected Outcome:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="name" placeholder="" ></textarea>
                                    </div>
                                </div>

                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Outcome Achieved?:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="name" placeholder="" >
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Date Expected:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" type="date" name="" placeholder="YYYY-MM-DD" value="" id="datepicker">
                                    </div>
                                </div>
                                <div class="d-flex my-2 justify-content-between">
                                    <div class="">
                                        <a href="#" class="btn btn-success">Save</a>
                                    </div>
                                    <div class="">
                                        <a href="#" class="btn btn-danger">Cancel</a>
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

    <div class="modal fade custom-modal add-modal" id="edit">                       
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Diagnosis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="#" class="needs-validation" novalidate>
                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Describe Diagnosis:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="diagnosis" value="High blood sugar" >
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Expected Outcome:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="" value="Blood Glucose of 3.8mmol/L" placeholder="" >
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Outcome Achieved?:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="" value="YES" placeholder="" >
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Date Expected:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" type="date" name="" placeholder="YYYY-MM-DD" value="12/02/2022" id="datepicker">
                                    </div>
                                </div>

                                <div class="d-flex my-2 justify-content-between">
                                    <div class="">
                                        <a href="#" class="btn btn-success">Save</a>
                                    </div>
                                    <div class="">
                                        <a href="#" class="btn btn-danger">Cancel</a>
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
    
    <div class="modal fade custom-modal add-modal" id="delete">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Diagnosis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Are you sure you want to delete Diagnosis?</p>
                            <button class="btn btn-danger">Yes, I'm Sure</button>
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
@endpush

