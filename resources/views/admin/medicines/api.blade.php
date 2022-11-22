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
                <h3 class="page-title">APIs</h3>
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
                    <a href="{{route('admin.apis.upload_instructions')}}" class="btn btn-info"> Upload</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-left"></th>
                                    <th>Name</th>
                                    <th>Formulations</th>
                                    <th>Interactions</th>
                                    <th>Status</th>
                                    <th class=""> Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($medicines as $medicine)
                                    <tr>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                <label class="custom-control-label" for="customControlValidation1"></label>
                                            </div>
                                        </td>
                                        <td class="d-flex align-items-center"> {{$medicine->name}}</td>
                                        <td class=""> {{$medicine->drugs->count()}} </td>
                                        <td class=""> {{$medicine->medicine_a->count() + $medicine->medicine_b->count()}} </td>
                                        <td class=""> 
                                            @if($medicine->status)
                                                Active
                                            @else
                                                Inactive
                                            @endif    
                                        </td>
                                        <td class=""> 
                                            <div class="d-flex">
                                                <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit{{$medicine->id}}"> <i class="fe fe-pencil"></i> Edit </a>
                                                <a class="btn btn-sm bg-primary-light mx-1" data-toggle="modal" href="#view{{$medicine->id}}"> <i class="fe fe-eye"></i> View More </a>
                                                <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-trash"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6"></td>
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
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add API</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.apis.store')}}" class="needs-validation" method="POST">@csrf
                                
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Name:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" >
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Side Effect:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="side_effects"></textarea>
                                        <small>Seperate multiple options with a pipe character. ie |</small>
                                    </div>
                                </div>        
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Contraindications:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="contraindications"></textarea>
                                        <small>Seperate multiple options with a pipe character. ie |</small>
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Pregnancy Status:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="pregnancy_status" >
                                    </div>
                                </div> 
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Lactation Status:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="lactation_status">
                                    </div>
                                </div>   
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Drug Alternatives:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control select" name="alternatives[]" multiple>
                                            @foreach ($medicines as $medicin)
                                                <option value="{{$medicin->name}}">{{$medicin->name}}</option>
                                            @endforeach
                                        </select>
                                        <small>You can select multiple options </small>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Medical Counselling:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="medication_counsel"></textarea>
                                        <small>Seperate multiple options with a pipe character. ie |</small>
                                    </div>
                                </div>  
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Status:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="status">
                                            <option value="1">ON</option>
                                            <option value="0">OFF</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="d-flex my-2 justify-content-between">
                                    <div class="">
                                        <button type="submit" class="btn btn-success">Save</button>
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
    @foreach ($medicines as $medicine)
        <div class="modal fade custom-modal add-modal" id="edit{{$medicine->id}}">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit API</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{route('admin.apis.update')}}" class="needs-validation" method="POST">@csrf
                                    <input type="hidden" name="medicine_id" value="{{$medicine->id}}">
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Name:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="name" value="{{$medicine->name}}" >
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Side Effect:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="side_effects">@if(is_array($medicine->side_effects)){{implode('|',$medicine->side_effects)}}@endif</textarea>
                                            <small>Seperate multiple options with a pipe character. ie |</small>
                                        </div>
                                    </div>        
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Contraindications:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="contraindications">@if(is_array($medicine->contraindications)){{implode('|',$medicine->contraindications)}}@endif</textarea>
                                            <small>Seperate multiple options with a pipe character. ie |</small>
                                        </div>
                                    </div>    
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Pregnancy Status:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="pregnancy_status" value="{{$medicine->pregnancy_status}}" >
                                        </div>
                                    </div> 
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Lactation Status:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="lactation_status" value="{{$medicine->lactation_status}}"    >
                                        </div>
                                    </div>   
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Drug Alternatives:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control select" name="alternatives[]" multiple>
                                                @if(is_array($medicine->alternatives))
                                                    @foreach ($medicine->alternatives as $alternative)
                                                    <option value="{{$alternative}}" selected >{{$alternative}}</option> 
                                                    @endforeach
                                                @endif
                                                @foreach ($medicines as $medicin)
                                                    <option value="{{$medicin->name}}">{{$medicin->name}}</option>
                                                @endforeach
                                            </select>
                                            <small>You can select multiple options </small>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Medical Counselling:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="medication_counsel">@if(is_array($medicine->medication_counsel)){{implode('|',$medicine->medication_counsel)}}@endif</textarea>
                                            <small>Seperate multiple options with a pipe character. ie |</small>
                                        </div>
                                    </div>  
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Status:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control" name="status">
                                                <option value="1" @if($medicine->status) selected @endif>ON</option>
                                                <option value="0" @if(!$medicine->status) selected @endif>OFF</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex my-2 justify-content-between">
                                        <div class="">
                                            <button type="submit" class="btn btn-success">Update</button>
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
        <div class="modal fade custom-modal add-modal" id="view{{$medicine->id}}">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View API</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="#" class="needs-validation" novalidate>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="sel1">Name:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="name" value="{{$medicine->name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="sel1">Side Effect:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="side_effects" readonly>@if(is_array($medicine->side_effects)){{implode('|',$medicine->side_effects)}}@endif</textarea>
                                            <small>Seperate multiple options with a pipe character. ie |</small>
                                        </div>
                                    </div>        
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="sel1">Contraindications:</label>
                                        </div>
                                        <div class="col-md-8">
                                            @if(is_array($medicine->contraindications))
                                                @foreach ($medicine->contraindications as $item)
                                                    <input type="text" class="form-control" value="{{$item}}" readonly> 
                                                @endforeach
                                            @endif
                                            
                                        </div>
                                    </div>    
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="sel1">Pregnancy Status:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="pregnancy_status" value="{{$medicine->pregnancy_status}}" readonly>
                                        </div>
                                    </div> 
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="sel1">Lactation Status:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="lactation_status" value="{{$medicine->lactation_status}}" readonly>
                                        </div>
                                    </div>   
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="sel1">Drug Alternatives:</label>
                                        </div>
                                        <div class="col-md-8">
                                                @if(is_array($medicine->alternatives))
                                                    @foreach ($medicine->alternatives as $alternate)
                                                    <input type="text" value="{{$alternate}}" class="form-control" readonly>
                                                    @endforeach
                                                @endif     
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="sel1">Medical Counselling:</label>
                                        </div>
                                        <div class="col-md-8">
                                            @if(is_array($medicine->medication_counsel))
                                                @foreach ($medicine->medication_counsel as $counsel)
                                                <input type="text" value="{{$counsel}}" class="form-control" readonly>
                                                @endforeach
                                            @endif 
                                        </div>
                                    </div>  
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="sel1">Status:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control" name="status" disabled>
                                                <option value="1" @if($medicine->status) selected @endif>ON</option>
                                                <option value="0" @if(!$medicine->status) selected @endif>OFF</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row my-2 justify-content-center">
                                        <div class="col-md-6">
                                            <a href="{{route('admin.drugs')}}?search={{$medicine->name}}" class="btn btn-primary">View Drug Formulations</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{route('admin.api.interactions')}}?search={{$medicine->name}}" class="btn btn-info">View Interactions</a>
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
    <div class="modal fade custom-modal add-modal" id="delete">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete API</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Deleting this API will produce cascading delete actions of the following</p>
                            <ul>
                                <li>All api interactions</li>
                                <li>All drug formulations containing this API</li>
                                <li>The API itself</li>
                            </ul>
                            <button class="btn btn-danger">Continue</button>
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

@endpush

