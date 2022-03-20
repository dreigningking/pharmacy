@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">
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
            @include('pharmacy.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="page-header">
                    <div class="row">

                        <div class="col-sm-12">
                            <!-- <h3 class="page-title">List of Patients</h3> -->
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('pharmacy.addpatient',$pharmacy)}}">Add
                                        Patient</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{route('pharmacy.newassessment',$pharmacy)}}">Assessment</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{route('pharmacy.prescription',$pharmacy)}}">Prescription</a></li>
                                <li class="breadcrumb-item active">Non-medication
                                    plan</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card col-12">

                        <div class="card-body">
                            <h4 class="card-title">Prescription</h4>
                        </div>

                        <div class="row w-100 pl-4">
                            <form>
                                <div class="col-md-12 w-100 prescriptions">
                                    <div class="prescription">
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label pr-0">Medication name</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <label class="col-12 col-form-label pr-0">Strength</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <label class="col-12 col-form-label pr-0">Doze</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <label class="col-12 col-form-label pr-0">Duration</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <label class="col-12 col-form-label pr-0">Frequency</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="plus-more add-more">
                                    <a href="javascript:void(0);" class="add-prescription"><i
                                            class="fa fa-plus-circle"></i> Add More</a>
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
$(".prescriptions").on('click', '.trash', function() {
    $(this).closest('.prescription').remove();
    return false;
});
$(".add-prescription").on('click', function() {

    var regcontent = '<div class="row prescription">' +
        '<div class="col-11 pl-0 ">' +
        ' <div class="form-group row">' +
        '<label class="col-lg-2 col-form-label pr-0">Medication Name</label>' +
        '<div class="col-lg-10">' +
        '<input type="text" class="form-control">' +
        '</div>' +
        '</div>' +
        '<div class="row">' +

        '<div class="col-md-3">' +
        '<div class="form-group row">' +
        '<label class="col-12 col-form-label pr-0">Strength</label>' +
        '<div class="col-md-12">' +
        '<input type="text" class="form-control">' +
        '</div>' +
        '</div>' +
        '</div>' +

        '<div class="col-md-3">' +
        '<div class="form-group row">' +
        '<label class="col-12 col-form-label pr-0">Dose</label>' +
        '<div class="col-md-12">' +
        '<input type="text" class="form-control">' +
        '</div>' +
        '</div>' +
        '</div>' +

        '<div class="col-md-3">' +
        '<div class="form-group row">' +
        '<label class="col-md-12 col-form-label pr-0">Duration</label>' +
        '<div class="col-12">' +
        '<input type="text" class="form-control">' +
        '</div>' +
        '</div>' +
        '</div>' +

        '<div class="col-md-3">' +
        '<div class="form-group row">' +
        '<label class="col-12 col-form-label pr-0">Frequency</label>' +
        '<div class="col-12">' +
        '<input type="text" class="form-control">' +
        '</div>' +
        '</div>' +
        '</div>' +

        '</div>' +

        '</div>' +

        '<div class="col-1 pr-0 pl-0 d-flex align-items-start justify-content-end" >' +
        '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
        '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
        '</div>' +

        '</div>';

    $(".prescriptions").append(regcontent);
    return false;
});
</script>

@endpush