@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('adminassets/plugins/morris/morris.css')}}">

<!-- Datatables CSS -->
<link rel="stylesheet" href="{{asset('adminassets/plugins/datatables/datatables.min.css')}}">
@endpush
@section('main')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('main.user.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                @if(!Auth::user()->isAnyRole(['sales']))
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <button class="btn btn-primary add-medicine">
                            <a href="{{route('addmedicine')}}"> Add Medicine</a></button>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end ">
                        <button class="btn btn-primary disabled reaction-btn" disabled data-toggle="modal"
                            href="#reaction">Add
                            Reaction</button>
                    </div>

                </div>
                @endif
                <div class="page-wrapper">
                    <div class="content container-fluid">

                        <!-- Page Header -->
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="page-title">Medicines</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active">Medicines</li>
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
                                                        <th class="text-center">Select</th>
                                                        <th>Paracetamol</th>

                                                        <th class="text-center">No Of Brands</th>
                                                        <th class="text-right"> Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($medicine as $medic)
                                                    <tr>
                                                        <td class=" text-center">
                                                            <input class="form-check-input medicine-check"
                                                                type="checkbox" name="remember" id="medicine-check"
                                                                required>

                                                        </td>
                                                        <td class="d-flex align-items-center">

                                                            {{$medic->name}}
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
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->
@endsection

@push('scripts')

<script src="{{asset('adminassets/js/script.js')}}"></script>
<script>
function medineCheck() {
    let selectMedicine = document.querySelectorAll("#medicine-check")
    let selArray = [];
    let reaction = document.querySelector(".reaction-btn");
    for (let i = 0; i <= selectMedicine.length; i++) {
        selectMedicine[i]?.addEventListener('change', function() {
            if (selectMedicine[i].checked) {
                selArray.push(selectMedicine[i].name)
                console.log(selArray)
                if (selArray.length === 2) {
                    console.log("mrh")
                    reaction.removeAttribute("disabled");
                    reaction.classList.remove("disabled");
                } else {
                    reaction.setAttribute("disabled", "disabled");
                    reaction.classList.add("disabled");
                }
            } else {
                selArray.pop(selectMedicine[i].name)
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


}
medineCheck();
</script>
@endpush

<!-- Medicine Info Modal -->
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
                            @foreach($medicine as $medic)
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-sm-4 pl-0 pr-0">
                                        Name:
                                    </div>
                                    <div class="col-sm-8 pl-0 pr-0">{{$medic->name}}</div>
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
                                    <div class="col-sm-8 pl-0 pr-0">{{$medic->contraindications}}</div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-4 pl-0 pr-0">
                                        Treats:
                                    </div>
                                    @foreach($medicine as $medic)
                                    <div class="col-sm-8 pl-0 pr-0">
                                        @foreach($medic->diseases as $disease)
                                        {{$disease->name}},
                                        @endforeach</div>
                                    @endforeach
                                </div>
                                <!-- <div class="row mb-4">
                                    <div class="col-sm-4 pl-0 pr-0">
                                        Treats:
                                    </div>
                                    <div class="col-sm-8 pl-0 pr-0">Headache et al.,</div>
                                </div> -->
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

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
                                        @foreach($medicine as $medic)
                                        <option value=" {{$medic->name}}">{{$medic->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="sel1">Select list:</label>
                                    <select class="form-control" id="sel1" name="medicine_b">
                                        @foreach($medicine as $medic)
                                        <option value="{{$medic->name}}">{{$medic->name}}</option>
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
                                        <input type="radio" class="form-check-input" name="healthy" value="0">Good
                                        reaction
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="healthy" value="1">Bad
                                        reaction
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