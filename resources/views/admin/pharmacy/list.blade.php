@extends('layouts.admin.app')
@push('styles')
<!-- Datatables CSS -->
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
@endpush
@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Pharmacies</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pharmacies</li>
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
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-left"></th>
                                    <th>Name</th>
                                    <th>Owned By</th>
                                    <th>Sales</th>
                                    <th>Patients</th>
                                    <th>Status</th>
                                    <th class="text-right"> Action</th>

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
                                    <td class=""> 5 </td>
                                    <td class=""> Active </td>
                                    <td class="text-right"> 
                                        <a class="btn btn-sm bg-success-light" href="{{route('admin.pharmacy.details')}}">
                                            <i class="fe fe-eye"></i> View More
                                        </a>
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
                                    <td class=""> 20 </td>
                                    <td class=""> Active </td>
                                    <td class="text-right"> 
                                        <a class="btn btn-sm bg-success-light" href="{{route('admin.pharmacy.details')}}">
                                            <i class="fe fe-eye"></i> View More
                                        </a>
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
    <div class="modal fade custom-modal add-modal" id="reaction">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Medicine Reactions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="/action_page.php" class="needs-validation" novalidate>


                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="sel1">Select list:</label>
                                        <select class="form-control" id="sel1" name="medicine_a">
                                            <option value="Medplus">Paracetamol</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sel1">Select list:</label>
                                        <select class="form-control" id="sel2" name="medicine_b">
                                            <option value="Medplus">Paracetamol</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="pwd">Remark:</label>
                                    <textarea class="form-control" rows="2" id="description" name="remark"
                                        required></textarea>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group mt-2">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="healthy" value="0">Positive
                                            Reaction
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="healthy" value="1">Negative
                                            Reaction
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pl-4 pr-4 mt-2">Submit</button>
                            </form>
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
    <script>
        function medineCheck() {
            let selectMedicine = document.querySelectorAll("#medicine-check")
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
    </script>
@endpush
