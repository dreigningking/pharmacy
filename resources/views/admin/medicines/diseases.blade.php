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
                <h3 class="page-title">Diseases</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Diseases</li>
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
                                    <th class="text-left">Select</th>
                                    <th>Name</th>
                                    <th>Medicines</th>
                                    <th class="text-right"> Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($diseases as $disease)
                                <tr>
                                    <td class=" text-center">
                                        <input class="form-check-input medicine-check"
                                            type="checkbox" name="remember" id="medicine-check"
                                            value="{{$disease->name}}" required>

                                    </td>
                                    <td class="d-flex align-items-center">

                                        {{$disease->name}}
                                    </td>

                                    <td class="text-center">
                                        5
                                    </td>
                                    <td class="text-right"> <a class="btn btn-sm bg-success-light"
                                            data-toggle="modal" href="#medication_info">
                                            <i class="fe fe-eye"></i> View More
                                        </a></td>

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

@push('scripts')
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

<!-- Medicine Info Modal -->
@foreach($diseases as $disease)
<div class="modal fade custom-modal add-modal" id="medication_info">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Medication Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 d-flex">
                        <div class="card flex-fill">
                            
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-sm-4 pl-0 pr-0">
                                        Name:
                                    </div>
                                    <div class="col-sm-8 pl-0 pr-0">{{$disease->name}}</div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-4 pl-0 pr-0">
                                        Brands:
                                    </div>
                                    <div class="col-sm-8 pl-0 pr-0">Emzor, M&B</div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-4 pl-0 pr-0">
                                        Contraindications:
                                    </div>
                                    <div class="col-sm-8 pl-0 pr-0">{{$disease->contraindications}}</div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-4 pl-0 pr-0">
                                        Treats:
                                    </div>
                                
                                    <div class="col-sm-8 pl-0 pr-0">
                                        @foreach($diseases as $disease)
                                        {{$disease->name}},
                                        </div>
                                        @endforeach
                                </div>
                                <!-- <div class="row mb-4">
                                    <div class="col-sm-4 pl-0 pr-0">
                                        Treats:
                                    </div>
                                    <div class="col-sm-8 pl-0 pr-0">Headache et al.,</div>
                                </div> -->
                            </div>
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Medicine Info Modal -->
<!-- Reaction Modal -->
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
                                        @foreach($diseases as $disease)
                                        <option value=" {{$disease->name}}">{{$disease->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="sel1">Select list:</label>
                                    <select class="form-control" id="sel2" name="medicine_b">
                                        @foreach($diseases as $disease)
                                        <option value="{{$disease->name}}">{{$disease->name}}</option>
                                        @endforeach
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

<!-- Reaction Modal -->