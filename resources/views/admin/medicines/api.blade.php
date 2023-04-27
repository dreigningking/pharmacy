@extends('layouts.admin.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
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
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <a href="#add" data-toggle="modal" class="btn btn-primary"> Add New</a>
                        <a href="{{route('admin.apis.upload_instructions')}}" class="btn btn-info"> Upload</a>
                    </div>
                    <div>
                        <form action="#" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" value="{{$search ?? old('search')}}" placeholder="Search">
                                <div class="input-group-append ">
                                    <button type="submit" class="btn btn-white">Search</button>
                                    <a href="" class="btn btn-light">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table table-hover table-stripped">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th class="w-75">Details </th>
                                    <th>More </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($medicines as $medicine)
                                <tr>
                                    <td>{{$loop->iteration}}
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                            <label class="custom-control-label" for="customControlValidation1"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row font-weight-bold">
                                            <div class="col-md-3">
                                                Name:
                                            </div>
                                            <div class="col-md-9">
                                                {{$medicine->name}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                Side-Effects:
                                            </div>
                                            <div class="col-md-9">
                                                @if($medicine->side_effects && count($medicine->side_effects)) {{implode('|',$medicine->side_effects)}} @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                Contraindications:
                                            </div>
                                            <div class="col-md-9">
                                                @if($medicine->contraindications && count($medicine->contraindications)) {{implode('|',$medicine->contraindications) }}@endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                Pregnancy Status:
                                            </div>
                                            <div class="col-md-9">
                                                @if($medicine->pregnancy_status && count($medicine->pregnancy_status)){{implode('|',$medicine->pregnancy_status)}}@endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                Lactation Status:
                                            </div>
                                            <div class="col-md-9">
                                                @if($medicine->lactation_status && count($medicine->lactation_status)){{implode('|',$medicine->lactation_status)}}@endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                Alternative:
                                            </div>
                                            <div class="col-md-9">
                                                @if($medicine->alternatives && count($medicine->alternatives)){{implode('|',$medicine->alternatives)}}@endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                Medication Counsel:
                                            </div>
                                            <div class="col-md-9">
                                                @if($medicine->medication_counsel && count($medicine->medication_counsel)){{implode('|',$medicine->medication_counsel)}}@endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            @if($medicine->drugs->count())
                                            <a href="{{route('admin.drugs')}}?search={{$medicine->name}}">{{$medicine->drugs->count()}} Formulations</a>
                                            @else
                                            <span class="d-block">0 Formulations</span>
                                            @endif
                                        </div>
                                        <div class="">
                                            @if($medicine->medicine_a->count() || $medicine->medicine_b->count())
                                            <a href="{{route('admin.api.interactions')}}?search={{$medicine->name}}">{{$medicine->medicine_a->count() + $medicine->medicine_b->count()}} Interactions</a>
                                            @else
                                            <span class="d-block">0 Interactions</span>
                                            @endif
                                        </div>
                                        <div class="">
                                            <span class="d-block">Status:  {{$medicine->status ? 'Active': 'Inactive'}}</span>
                                        </div>
                                        
                                        <div class="d-flex mt-2">
                                            <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a>
                                            <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-trash"></i> Delete </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No API added yet</td>
                                    </tr>
                                @endforelse  
                            </tbody>
                        </table>

                    </div>
                    <div class="mt-3">
                        <ul class="pagination justify-content-center">
                            <li class="page-item @if($medicines->onFirstPage()) disabled @endif">
                                <a class="page-link " href="{{$medicines->previousPageUrl()}}" tabindex="-1">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $medicines->lastPage(); $i++)
                            <li class="page-item">
                                <a class="page-link @if($medicines->currentPage() == $i) active @endif" href="{{$medicines->url($i)}}">{{$i}} 
                                    @if($medicines->currentPage() == $i) <span class="sr-only">(current)</span> @endif
                                </a>
                            </li>
                            @endfor
                            
                            <li class="page-item @if($medicines->currentPage() == $medicines->lastPage()) disabled @endif">
                                <a class="page-link" href="{{$medicines->nextPageUrl()}}">Next</a>
                            </li>
                        </ul>
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
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="name" >
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Side Effect:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <textarea class="form-control" name="side_effects"></textarea>
                                        <small>Seperate multiple options with a pipe character. ie |</small>
                                    </div>
                                </div>        
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Contraindications:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <textarea class="form-control" name="contraindications"></textarea>
                                        <small>Seperate multiple options with a pipe character. ie |</small>
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Pregnancy Status:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <textarea class="form-control" name="side_effects"></textarea>
                                        <small>Seperate multiple options with a pipe character. ie |</small>
                                    </div>
                                </div> 
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Lactation Status:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <textarea class="form-control" name="side_effects"></textarea>
                                        <small>Seperate multiple options with a pipe character. ie |</small>
                                    </div>
                                </div>   
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Drug Alternatives:</label>
                                    </div>
                                    <div class="col-md-7">
                                        {{-- <select class="form-control select" name="alternatives[]" multiple>
                                            @foreach ($medicines as $medicin)
                                                <option value="{{$medicin->name}}">{{$medicin->name}}</option>
                                            @endforeach
                                        </select> --}}
                                        <small>You can select multiple options </small>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Medication Counselling:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <textarea class="form-control" name="medication_counsel"></textarea>
                                        <small>Seperate multiple options with a pipe character. ie |</small>
                                    </div>
                                </div>  
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Status:</label>
                                    </div>
                                    <div class="col-md-7">
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
    {{-- @foreach ($medicines as $medicine)
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
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="name" value="{{$medicine->name}}" >
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Side Effect:</label>
                                        </div>
                                        <div class="col-md-7">
                                            <textarea class="form-control" name="side_effects">@if(is_array($medicine->side_effects)){{implode('|',$medicine->side_effects)}}@endif</textarea>
                                            <small>Seperate multiple options with a pipe character. ie |</small>
                                        </div>
                                    </div>        
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Contraindications:</label>
                                        </div>
                                        <div class="col-md-7">
                                            <textarea class="form-control" name="contraindications">@if(is_array($medicine->contraindications)){{implode('|',$medicine->contraindications)}}@endif</textarea>
                                            <small>Seperate multiple options with a pipe character. ie |</small>
                                        </div>
                                    </div>    
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Pregnancy Status:</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="pregnancy_status" value="{{$medicine->pregnancy_status}}" >
                                        </div>
                                    </div> 
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Lactation Status:</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="lactation_status" value="{{$medicine->lactation_status}}"    >
                                        </div>
                                    </div>   
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Drug Alternatives:</label>
                                        </div>
                                        <div class="col-md-7">
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
                                            <label for="sel1">Medication Counselling:</label>
                                        </div>
                                        <div class="col-md-7">
                                            <textarea class="form-control" name="medication_counsel">@if(is_array($medicine->medication_counsel)){{implode('|',$medicine->medication_counsel)}}@endif</textarea>
                                            <small>Seperate multiple options with a pipe character. ie |</small>
                                        </div>
                                    </div>  
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Status:</label>
                                        </div>
                                        <div class="col-md-7">
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
        
    @endforeach --}}
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
<script>

</script>

@endpush

