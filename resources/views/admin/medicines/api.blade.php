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
                    <a href="#" data-toggle="modal" data-target="" class="btn btn-primary"> Add New</a>
                    <a href="{{route('admin.apis.upload')}}" class="btn btn-info"> Upload</a>
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
                                <tr>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                            <label class="custom-control-label" for="customControlValidation1"></label>
                                        </div>
                                    </td>
                                    <td class="d-flex align-items-center"> Medplus Pharmacy </td>
                                    <td class=""> 5 </td>
                                    <td class=""> 5 </td>
                                    <td class=""> Active </td>
                                    <td class=""> 
                                        <div class="d-flex">
                                            <a class="btn btn-sm bg-info-light mx-1" > <i class="fe fe-pencil"></i> Edit </a>
                                            <a class="btn btn-sm bg-primary-light mx-1" > <i class="fe fe-eye"></i> View More </a>
                                            <a class="btn btn-sm bg-danger-light mx-1" > <i class="fe fe-eye"></i> Delete </a>
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
                                    <td class="d-flex align-items-center"> Health Plus Pharmacy </td>
                                    <td class=""> 15 </td>
                                    <td class=""> 50 </td>
                                    <td class=""> Active </td>
                                    <td class=""> 
                                        <div class="d-flex">
                                            <a class="btn btn-sm bg-info-light mx-1" > <i class="fe fe-pencil"></i> Edit </a>
                                            <a class="btn btn-sm bg-primary-light mx-1" > <i class="fe fe-eye"></i> View More </a>
                                            <a class="btn btn-sm bg-danger-light mx-1" > <i class="fe fe-eye"></i> Delete </a>
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

