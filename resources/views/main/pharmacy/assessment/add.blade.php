@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('adminassets/plugins/morris/morris.css')}}">
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
                <!-- Basic Information -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Assessment</h4>
                        <div class="row justify-content-center">
                            <form class="search-form d-flex">
                                <input class="search" type="text"
                                    placeholder="Search by EMR, patient name, phone number or email">
                                <button class="btn btn-primary search-btn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="row">
                            <form action="" class="w-100">
                                <div class="row justify-content-start mt-4 w-100">

                                    <button type="button" class="btn btn-text" data-toggle="collapse"
                                        data-target="#personal_info">Patient's Personal Information</button>

                                    <div class="row mt-4 pl-4 pr-2 collapse show w-100 justify-content-center"
                                        id="personal_info">

                                        <div class="row w-100">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label pr-0">EMR</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label pr-0">Patient Name</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row w-100">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label pr-0">Phone Number</label>
                                                    <div class="col-lg-9">
                                                        <input type="number" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label pr-0">Email</label>
                                                    <div class="col-lg-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row w-100">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label pr-0">Date of
                                                        birth</label>
                                                    <div class="col-lg-9">
                                                        <input type="date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="row justify-content-start mt-4 w-100 ">

                                    <button type="button" class="btn btn-text" data-toggle="collapse"
                                        data-target="#physical_assessment">Patient's Physical Assessment</button>

                                    <div class="row w-100 collapse show">
                                        <div class="row mt-4 pl-4 pr-2  w-100 justify-content-center physical-assessment"
                                            id="physical_assessment">

                                            <div class="col-11 physical d-flex">
                                                <div class="col-md-6 pl-0 pr-0">
                                                    <div class="form-group row">

                                                        <div class="col-lg-11">
                                                            <select class="form-control" id="sel1">
                                                                <option value="Temp (&deg;c)">Temp (&deg;c)</option>
                                                                <option value="BP (mmHg)">BP (mmHg)</option>
                                                                <option value="PR (Beats/min)">PR (Beats/min)</option>
                                                                <option value="Wt (Kg)">Wt (Kg)</option>
                                                                <option value="Ht (m)">Ht (m)</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0 pl-0">
                                                    <div class="form-group row">

                                                        <div class="col-lg-11">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="add-more pl-4">
                                            <a href="javascript:void(0);" class="add-physical"><i
                                                    class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="row justify-content-start mt-4 w-100 ">
                                    <button type="button" class="btn btn-text" data-toggle="collapse"
                                        data-target="#medical_history">Medical History</button>

                                </div>
                            </form>
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
<script>
$(".physical-assessment").on('click', '.trash', function() {
    $(this).closest('.physical').remove();
    return false;
});
$(".add-physical").on('click', function() {
    console.log("meh")
    var regcontent = ' <div class="col-11 physical d-flex">' +
        ' <div class="col-md-6 pr-0 pl-0">' +
        '<div class="form-group row">' +
        ' <div class="col-lg-11">' +
        '<select class="form-control" id="sel1">' +
        '<option value="Temp (&deg;c)">Temp (&deg;c)</option>' +
        '<option value="BP (mmHg)">BP (mmHg)</option>' +
        '<option value="PR (Beats/min)">PR (Beats/min)</option>' +
        '<option value="Wt (Kg)">Wt (Kg)</option>' +
        '<option value="Ht (m)">Ht (m)</option>' +
        ' </select>' +
        '</div>' +
        '</div>' +
        '</div>' +
        ' <div class="col-md-6 pr-0 pl-0">' +
        ' <div class="form-group row">' +
        ' <div class="col-lg-11">' +
        '<input type="text" class="form-control">' +
        ' </div>' +
        ' </div>' +
        ' </div>' +
        '<div class="col-1 pr-0 pl-0 d-flex align-items-start justify-content-end" >' +
        '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
        '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
        '</div>' +
        '</div>';

    $(".physical-assessment").append(regcontent);
    return false;
});
</script>
@endpush