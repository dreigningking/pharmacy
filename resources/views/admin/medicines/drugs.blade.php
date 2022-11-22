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
                <h3 class="page-title">Medicines</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Drugs</li>
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
                    <a href="{{route('admin.drugs.upload_instructions')}}" class="btn btn-info"> Upload</a>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{route('admin.drugs.apimatching')}}" method="post" class="d-inline" id="api_matching">@csrf 
                            <button type="button" id="matching" class="btn btn-success">Match Selected</button>
                        </form>
                        <button type="button" class="btn btn-danger"> Delete Selected</button>
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-left">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" name="drug_id[]" class="custom-control-input drugscheck" id="checkbox_master">
                                            <label class="custom-control-label" for="checkbox_master"></label>
                                        </div>
                                    </th>
                                    <th style="width:50px">Name</th>
                                    <th>Category</th>
                                    <th>APIS</th>
                                    <th>Manufacturer</th>
                                    <th>Dosage Form</th>
                                    <th>Match</th>
                                    <th>Status</th>
                                    <th class=""> Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($drugs as $drug)
                                <tr>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" name="drugs[]" value="{{$drug->id}}" class="custom-control-input drugscheck" id="customControlValidation{{$drug->id}}">
                                            <label class="custom-control-label" for="customControlValidation{{$drug->id}}"></label>
                                        </div>
                                    </td>
                                    <td > {{$drug->name}} </td>
                                    <td class=""> {{$drug->category->name}} </td>
                                    <td class="d-flex align-items-center"> 
                                        <ul class="pl-3">
                                            @foreach ($drug->ingredients as $medicine)
                                            <li>{{$medicine->name}} : {{$medicine->pivot->size}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class=""> {{$drug->Manufacturer}} </td>
                                    <td class=""> {{$drug->dosage_form}}</td>
                                    <td class=""> 
                                        @if($drug->ingredients->isNotEmpty() && $drug->category_id) Matched @else Unmatched @endif    
                                    </td>
                                    <td class=""> 
                                        @if($drug->status)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </td>
                                    <td class=""> 
                                        <div class="d-flex">
                                            <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit{{$drug->id}}"> <i class="fe fe-pencil"></i> Edit </a>
                                            <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-trash"></i> Delete </a>
                                        </div>
                                    </td>
                                </tr>           
                                @empty
                                    
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
                    <h5 class="modal-title">Add Drug</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.drugs.store')}}" method="POST" >@csrf
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Name:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Category:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="category_id">
                                            <option value="">Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>        
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">API A:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="form-control select" name="medicine_a">
                                            <option value=""> Select</option>
                                            @foreach ($medicines as $medicine)
                                                <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="size_a" id="">
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">API B:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="form-control select" name="medicine_b">
                                            <option value=""> Select</option>
                                            @foreach ($medicines as $medicin)
                                                <option value="{{$medicin->id}}" >{{$medicin->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="size_b" id="">
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">API C:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="form-control select" name="medicine_c">
                                            <option value=""> Select</option>
                                            @foreach ($medicines as $meds)
                                                <option value="{{$meds->id}}" >{{$meds->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="size_c" placeholder="50 mg" id="">
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Manufacturer:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="manufacturer" >
                                    </div>
                                </div> 
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Dosage Form:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="dosage_form" >
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
    @foreach ($drugs as $drug)
        <div class="modal fade custom-modal add-modal" id="edit{{$drug->id}}">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Drug</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{route('admin.drugs.update')}}" method="POST" >@csrf
                                    <input type="hidden" name="drug_id" value="{{$drug->id}}">
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Name:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="name" value="{{$drug->name}}">
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Category:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control" name="category_id">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}" @if($category->id == $drug->category_id) selected @endif>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>        
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">API A:</label>
                                        </div>
                                        <div class="col-md-5">
                                            <select class="form-control select" name="medicine_a">
                                                <option value=""> Select</option>
                                                @foreach ($medicines as $medicine)
                                                    <option value="{{$medicine->id}}" @if( isset($drug->ingredients[0]) && $drug->ingredients[0]->id == $medicine->id) selected @endif>{{$medicine->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="size_a" value="{{isset($drug->ingredients[0]) ? $drug->ingredients[0]->pivot->size : ''}}" id="">
                                        </div>
                                    </div>    
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">API B:</label>
                                        </div>
                                        <div class="col-md-5">
                                            <select class="form-control select" name="medicine_b">
                                                <option value=""> Select</option>
                                                @foreach ($medicines as $medicin)
                                                    <option value="{{$medicin->id}}" @if(isset($drug->ingredients[1]) && $drug->ingredients[1]->id == $medicin->id ) selected @endif>{{$medicin->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="size_b" value="{{isset($drug->ingredients[1]) ? $drug->ingredients[1]->pivot->size : ''}}" id="">
                                        </div>
                                    </div>    
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">API C:</label>
                                        </div>
                                        <div class="col-md-5">
                                            <select class="form-control select" name="medicine_c">
                                                <option value=""> Select</option>
                                                @foreach ($medicines as $meds)
                                                    <option value="{{$meds->id}}" @if(isset($drug->ingredients[2]) && $drug->ingredients[2]->id == $meds->id) selected @endif>{{$meds->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="size_c" value="{{isset($drug->ingredients[2]) ? $drug->ingredients[2]->pivot->size : ''}}" placeholder="50 mg" id="">
                                        </div>
                                    </div>    
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Manufacturer:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="manufacturer" value="{{$drug->manufacturer}}" >
                                        </div>
                                    </div> 
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Dosage Form:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="dosage_form" value="{{$drug->dosage_form}}"  >
                                        </div>
                                    </div>   
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Status:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control" name="status">
                                                <option value="1" @if($drug->status) selected @endif>ON</option>
                                                <option value="0" @if(!$drug->status) selected @endif>OFF</option>
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
                    <h5 class="modal-title">Delete Drug</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Are you sure you want to delete this drug from the master datalist</p>
                            
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
<script>
    $(document).ready(function() {
        let url = window.location.href;
        let query = url.split('?')[1] ? url.split('?')[1].split('=')[1] :'';
        let table = $('.datatable').DataTable()
        table.search(query).draw();
    });

    $('#matching').on('click',function(){
        $('.drugscheck:checked').not('#checkbox_master').each(function(key,elem){
              var input = $("<input>").attr("type", "hidden").attr("name", 'drugs[]').val(elem.value);
              $('#api_matching').append(input);
        });
        $('#api_matching').submit();
    })
    
</script>
@endpush

