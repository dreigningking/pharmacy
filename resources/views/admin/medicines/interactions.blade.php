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
                    <a href="{{route('admin.interactions.upload')}}" class="btn btn-info"> Upload</a>
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
                                
                                <tr>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                            <label class="custom-control-label" for="customControlValidation1"></label>
                                        </div>
                                    </td>

                                    <td class="">
                                        Lumenfantrine
                                    </td>
                                    <td class="">
                                        Vitamin C
                                    </td>
                                    <td class="">
                                        Contraindicated
                                    </td>
                                    <td class="">
                                        The medicine will not go down well
                                    </td>
                                    <td class=""> 
                                        <div class="d-flex">
                                            <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a>
                                            {{-- <a class="btn btn-sm bg-primary-light mx-1" data-toggle="modal" href="#view"> <i class="fe fe-eye"></i> View More </a> --}}
                                            <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-trash"></i> Delete </a>
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

                                    <td class="">
                                        Lumenfantrine
                                    </td>
                                    <td class="">
                                        Vitamin C
                                    </td>
                                    <td class="">
                                        Severe Interactions, Use alternative
                                    </td>
                                    <td class="">
                                        Lumenfantrine inhibits absorption of Vitamin C
                                    </td>
                                    <td class=""> 
                                        <div class="d-flex">
                                            <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a>
                                            {{-- <a class="btn btn-sm bg-primary-light mx-1" data-toggle="modal" href="#view"> <i class="fe fe-eye"></i> View More </a> --}}
                                            <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-trash"></i> Delete </a>
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

                                    <td class="">
                                        Artemeter
                                    </td>
                                    <td> Vitamin C</td>
                                    <td class="">
                                        Monitor Closely
                                    </td>
                                    <td class="">
                                        The medicine cause severe reactions
                                    </td>
                                    <td class=""> 
                                        <div class="d-flex">
                                            <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a>
                                            {{-- <a class="btn btn-sm bg-primary-light mx-1" data-toggle="modal" href="#view"> <i class="fe fe-eye"></i> View More </a> --}}
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
                            <form action="#" class="needs-validation" novalidate>
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Api A:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" required="" aria-hidden="true">
                                            <option>Select</option>
                                            <option>Lumefantrine</option>
                                            <option>Artemether</option>
                                            <option>polymyxins</option>
                                        </select>
                                    </div>
                                </div>        
                                <div class="row my-2">
                                    <div class="col-md-4 form-group">
                                        <label for="sel1">Api B:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control select" required="" aria-hidden="true">
                                            <option></option>
                                            <option>Vitamin C</option>
                                            <option>Valvas</option>
                                            <option>Ampicilin</option>
                                            <option>Cilzec</option>
                                        </select>
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="form-group col-md-4">
                                        <label for="sel1">Remark:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" required="" aria-hidden="true"><option>Select</option>
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
                                        <input type="text" class="form-control" name="name"   >
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
                    <h5 class="modal-title">Edit Interactions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="#" class="needs-validation" novalidate>
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Api A:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" required="" aria-hidden="true">
                                            <option>Lumefantrine</option>
                                            <option>Artemether</option>
                                            <option>polymyxins</option>
                                        </select>
                                    </div>
                                </div>        
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Api B:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" required="" aria-hidden="true">
                                            <option>Vitamin C</option>
                                            <option>Valvas</option>
                                            <option>Ampicilin</option>
                                            <option>Cilzec</option>
                                        </select>
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Remark:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" required="" aria-hidden="true">
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
                                        <input type="text" class="form-control" name="name" value="Lumenfantrine inhibits absorption of vitamin c"    >
                                    </div>
                                </div>   
                                

                                <div class="d-flex my-2 justify-content-between">
                                    <div class="">
                                        <a href="#" class="btn btn-success">Update</a>
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

