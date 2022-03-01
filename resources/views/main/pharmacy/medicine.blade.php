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
            @include('main.pharmacy.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                @if(Auth::user()->role->name != "sales")
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <button class="btn btn-primary">Add Medicine</button>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end ">
                        <button class="btn btn-primary disabled">Add Reaction</button>
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
                                                    <tr>
                                                        <td class=" text-center">
                                                            <input class="form-check-input medicine-check"
                                                                type="checkbox" name="remember" required>

                                                        </td>
                                                        <td class="d-flex align-items-center">

                                                            Paracetamol
                                                        </td>

                                                        <td class="text-center">
                                                            5
                                                        </td>
                                                        <td class="text-right"> <a class="btn btn-sm bg-success-light"
                                                                data-toggle="modal" href="#medication_info">
                                                                <i class="fe fe-eye"></i> View More
                                                            </a></td>

                                                    </tr>
                                                    <tr>
                                                        <td class=" text-center">
                                                            <input class="form-check-input medicine-check"
                                                                type="checkbox" name="remember" required>

                                                        </td>
                                                        <td class="d-flex align-items-center">

                                                            Ibuprofen
                                                        </td>

                                                        <td class="text-center">
                                                            1
                                                        </td>
                                                        <td class="text-right"> <a class="btn btn-sm bg-success-light"
                                                                data-toggle="modal" href="#medication_info">
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
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->
@endsection

@push('scripts')
<script src="{{asset('adminassets/js/script.js')}}"></script>
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

                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-sm-4 pl-0 pr-0">
                                        Name:
                                    </div>
                                    <div class="col-sm-8 pl-0 pr-0">Paracetamol</div>
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
                                    <div class="col-sm-8 pl-0 pr-0">Not to be used by sad patients</div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-4 pl-0 pr-0">
                                        Treats:
                                    </div>
                                    <div class="col-sm-8 pl-0 pr-0">Headache et al.,</div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-4 pl-0 pr-0">
                                        Treats:
                                    </div>
                                    <div class="col-sm-8 pl-0 pr-0">Headache et al.,</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Medicine Info Modal -->