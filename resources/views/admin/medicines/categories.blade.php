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
                    <div class="row justify-content-between">
                        <div class="col-sm-6">
                            <a href="{{route('admin.medicine.interactions')}}" class="btn btn-primary"> Add Medicine Interactions</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th class="text-center">No Of Brands</th>
                                    <th class="text-right"> Action</th>
                                    <th class="text-right"> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td class=" text-center">
                                        <input class="form-check-input medicine-check"
                                            type="checkbox" name="remember" id="medicine-check"
                                            value="ABC" required>
                                    </td>
                                    <td class="d-flex align-items-center">

                                        Paracetamol
                                    </td>

                                    <td class="text-center">
                                        15
                                    </td>
                                    <td class="text-right"> <a class="btn btn-sm bg-success-light"
                                            data-toggle="modal" href="#medication_info1">
                                            <i class="fe fe-eye"></i> View More
                                        </a></td>

                                </tr>
                                <tr>
                                    <td class=" text-center">
                                        <input class="form-check-input medicine-check"
                                            type="checkbox" name="remember" id="medicine-check"
                                            value="ABC" required>
                                    </td>
                                    <td class="d-flex align-items-center">

                                        Paracetamol
                                    </td>

                                    <td class="text-center">
                                        15
                                    </td>
                                    <td class="text-right"> <a class="btn btn-sm bg-success-light"
                                            data-toggle="modal" href="#medication_info1">
                                            <i class="fe fe-eye"></i> View More
                                        </a></td>

                                </tr>
                                <tr>
                                    <td class=" text-center">
                                        <input class="form-check-input medicine-check"
                                            type="checkbox" name="remember" id="medicine-check"
                                            value="ABC" required>
                                    </td>
                                    <td class="d-flex align-items-center">

                                        Paracetamol
                                    </td>

                                    <td class="text-center">
                                        15
                                    </td>
                                    <td class="text-right"> <a class="btn btn-sm bg-success-light"
                                            data-toggle="modal" href="#medication_info1">
                                            <i class="fe fe-eye"></i> View More
                                        </a></td>

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

