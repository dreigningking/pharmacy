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
                <h3 class="page-title">Medicine</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Categories</li>
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
                                    <th>Name</th>
                                    <th class="text-center">Drug Quantity</th>
                                    <th class="text-left">Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td class=" text-center">
                                            <input class="form-check-input medicine-check" type="checkbox" name="remember" id="medicine-check" required>
                                        </td>
                                        <td class="d-flex align-items-center">{{$category->name}}</td>
                                        <td class="text-center">{{$category->drugs->count()}}</td>
                                        <td class=""> 
                                            <div class="d-flex">
                                                <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit{{$category->id}}"> <i class="fe fe-pencil"></i> Edit </a>
                                                <a class="btn btn-sm bg-primary-light mx-1"  href="{{route('admin.drugs')}}?search={{$category->name}}"> <i class="fe fe-eye"></i> View Drugs </a>
                                                <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-trash"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Category.. Create new</td>
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
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.categories.store')}}" method="POST" class="needs-validation" novalidate>@csrf
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Name:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" placeholder="Category Name" >
                                    </div>
                                </div>  
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Description:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="description" placeholder="Category Description" ></textarea>
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
    @foreach ($categories as $category)
        <div class="modal fade custom-modal add-modal" id="edit{{$category->id}}">
            <div class="modal-dialog modal-dialog-centered">
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
                                <form action="{{route('admin.categories.update')}}" method="POST" class="needs-validation" novalidate>@csrf
                                    <input type="hidden" name="category_id" value="{{$category->id}}">
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Name:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="Category Name" >
                                        </div>
                                    </div>  
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <label for="sel1">Description:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="description" placeholder="Category Description" >{{$category->description}}</textarea>
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
        <div class="modal-dialog modal-dialog-centered">
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
                            <p>Deleting will remove Drug permanently</p>
                            <button class="btn btn-danger">Continue</button>
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
{{-- <script>
    function medineCheck() {
        let selectMedicine = document.querySelectorAll("#medicine-check")
        // console.log(selectMedicine)
        let medicinesel = document.querySelector("#sel1")
        let medicinesel2 = document.querySelector("#sel2")
        let selArray = [];
        let reaction = document.querySelector(".reaction-btn");
        for (let i = 0; i <= selectMedicine.length; i++) {
            selectMedicine[i]?.addEventListener('change', function() {
                if (selectMedicine[i].checked) {
                    selArray.push(selectMedicine[i].value)
                    console.log(selArray)
                    console.log(selectMedicine[i].value)
                    for (let j = 0; j <= medicinesel?.children.length; j++) {
                        if (selArray[0] === medicinesel?.children[i]?.innerText) {
                            console.log("meh")
                            medicinesel?.children[i].setAttribute("selected", "selected");
                        }
                    }
                    for (let k = 0; k <= medicinesel2?.children.length; k++) {
                        if (selArray[1] === medicinesel2?.children[i]?.innerText) {
                            console.log("meh")
                            medicinesel?.children[i].setAttribute("selected", "selected");
                        }
                    }

                    if (selArray.length === 2) {
                        console.log("mrh")
                        reaction.removeAttribute("disabled");
                        reaction.classList.remove("disabled");
                    } else {
                        reaction.setAttribute("disabled", "disabled");
                        reaction.classList.add("disabled");
                    }
                } else {
                    selArray.pop(selectMedicine[i].value)
                    console.log(selArray)
                    if (selArray.length === 2) {
                        console.log("mrh")
                        reaction.removeAttribute("disabled");
                        reaction.classList.remove("disabled");
                    } else {
                        reaction.setAttribute("disabled", "disabled");
                        reaction.classList.add("disabled");
                    }
                }
                if (selArray.length > 2) {
                    console.log("nah")
                    alert("Select just two")
                }
            })

        }

        console.log(medicinesel.children)


    }
    medineCheck();
</script> --}}
@endpush

