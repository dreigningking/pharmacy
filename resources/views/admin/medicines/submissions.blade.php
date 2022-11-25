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
                <h3 class="page-title">Drugs</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Drug Submissions</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="table-responsive">
                        {{-- <form action="{{route('admin.drugs.apimatching')}}" method="post" class="d-inline" id="api_matching">@csrf 
                            <button type="button" id="matching" class="btn btn-success">Match Selected</button>
                        </form>
                        <button type="button" class="btn btn-danger"> Delete Selected</button> --}}
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <td>
                                        User
                                    </td>
                                    <th style="width:50px">Name</th>
                                    <th>Manufacturer</th>
                                    <th>API A</th>
                                    <th>API B</th>
                                    <th>API C</th>
                                    <th>Date</th>
                                    <th class=""> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}" alt="User Image"></a>
                                            <a href="profile.html">Dr. Ruby Perrin</a>
                                        </h2>
                                    </td>
                                    <td > Lysine </td>
                                    <td class=""> Sun Ecosystem Ltd </td>
                                    <td class=""> Vitamin A </td>
                                    <td class=""> Vitamin B </td>
                                    <td class=""> Vitamin C </td>
                                    <td class=""> 15/Jun/2022 </td>
                                    <td class=""> 
                                        <div class="d-flex">
                                            <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#add"> <i class="fe fe-plus"></i> Add to Master List </a>
                                            <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-trash"></i> Delete </a>
                                        </div>
                                    </td>
                                </tr>           
                                
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

