@extends('layouts.admin.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<!-- Datatables CSS -->
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
@endpush

@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Medicine</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Medicine</li>
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
                    <a href="{{route('admin.api.interactions.upload_instructions')}}" class="btn btn-info"> Upload</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-left"></th>
                                    <th class="">Api A</th>
                                    <th class="">Api B</th>
                                    <th class="">Remark</th>
                                    <th class="">Mechanism</th>
                                    <th class="d-flex">Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($interactions as $interaction)
                                <tr>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                            <label class="custom-control-label" for="customControlValidation1"></label>
                                        </div>
                                    </td>

                                    <td class="">
                                        {{$interaction->base->name}}
                                    </td>
                                    <td class="">
                                        {{$interaction->target->name}}
                                    </td>
                                    <td class="">
                                        {{$interaction->remark}}
                                    </td>
                                    <td class="">
                                        {{$interaction->mechanism}}
                                    </td>
                                    <td class=""> 
                                        <div class="d-flex">
                                            <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit{{$interaction->id}}"> <i class="fe fe-pencil"></i> Edit </a>
                                            {{-- <a class="btn btn-sm bg-primary-light mx-1" data-toggle="modal" href="#view"> <i class="fe fe-eye"></i> View More </a> --}}
                                            <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-trash"></i> Delete </a>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                                 
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
                    <h5 class="modal-title">Add New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.api.interactions.store')}}" method="POST" class="needs-validation" novalidate>@csrf
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Api A:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="medicine_a" class="form-control select" required="" aria-hidden="true">
                                            @foreach ($medicines as $medicine)
                                                <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>        
                                <div class="row my-2">
                                    <div class="col-md-4 form-group">
                                        <label for="sel1">Api B:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="medicine_b" class="form-control select" required="" aria-hidden="true">
                                            @foreach ($medicines as $medicin)
                                                <option value="{{$medicin->id}}">{{$medicin->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Remark:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="remark" class="form-control" required=""  aria-hidden="true">
                                            <option selected disabled>Select</option>
                                            <option>Contraindicated</option>
                                            <option>Severe Interaction, use alternative</option>
                                            <option>Monitor Closely</option>
                                            <option>OK</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Mechanism:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="mechanism"   >
                                    </div>
                                </div>   

                                <div class="d-flex my-2 justify-content-between">
                                    <div class="">
                                        <button type="submit" class="btn btn-success">Save</button>
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
    @foreach ($interactions as $interacted)
    <div class="modal fade custom-modal add-modal" id="edit{{$interacted->id}}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Interactions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.api.interactions.update')}}" class="needs-validation" method="POST" novalidate>@csrf
                                <input type="hidden" name="interaction_id" value="{{$interacted->id}}">
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Api A: {{$interacted->medicine_a}}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="medicine_a" class="form-control select" required="" aria-hidden="true">
                                            @foreach ($medicines as $medis)
                                                <option value="{{$medis->id}}" @if($medis->id == $interacted->medicine_a) selected @endif>{{$medis->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>        
                                <div class="row my-2">
                                    <div class="col-md-4 form-group">
                                        <label for="sel1">Api B:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="medicine_b" class="form-control select" required="" aria-hidden="true">
                                            @foreach ($medicines as $medicin)
                                                <option value="{{$medicin->id}}" @if($medicin->id == $interacted->medicine_b) selected @endif>{{$medicin->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Remark:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="remark" class="form-control" required=""  aria-hidden="true">
                                            <option selected disabled>Select</option>
                                            <option @if($interacted->remark == 'Contraindicated') selected @endif>Contraindicated</option>
                                            <option @if($interacted->remark == 'Severe Interaction, use alternative') selected @endif>Severe Interaction, use alternative</option>
                                            <option @if($interacted->remark == 'Monitor Closely') selected @endif>Monitor Closely</option>
                                            <option @if($interacted->remark == 'OK') selected @endif>OK</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Mechanism:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="mechanism" value="{{$interacted->mechanism}}" >
                                    </div>
                                </div>   

                                <div class="d-flex my-2 justify-content-between">
                                    <div class="">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</a>
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
                    <h5 class="modal-title">Delete Interactions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Are you sure you want to delete Interactions</p>
                            <button class="btn btn-danger">Yes, I'm Sure</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function() {
        let url = window.location.href;
        let query = url.split('?')[1] ? url.split('?')[1].split('=')[1] :'';
        let table = $('.datatable').DataTable()
        table.search(query).draw();
    });
</script>
@endpush

