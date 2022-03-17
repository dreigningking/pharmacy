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

                <div class="row">
                    <div class="card col-12">

                        <div class="card-body">
                            <h4 class="card-title">Non-medication Plan</h4>
                        </div>

                        <div class="row w-100 pl-4">
                            <form class="row w-100">
                                <div class="col-md-12 w-100 plans">
                                    <div class="plan">
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label pr-0">Plan Info</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="plus-more add-more">
                                    <a href="javascript:void(0);" class="add-plan"><i class="fa fa-plus-circle"></i> Add
                                        More</a>
                                </div>
                                <div class="row w-100 mt-6 justify-content-end">
<button class="btn btn-primary mb-4">Save</button>
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
$(".plans").on('click', '.trash', function() {
    $(this).closest('.plan').remove();
    return false;
});
$(".add-plan").on('click', function() {
    console.log("meh")
    var regcontent = '<div class="plan row">' +
        '<div class="col-11 pr-0 pl-0">' +
        ' <div class="form-group row">' +
        '<label class="col-lg-2 col-form-label"></label>' +
        '<div class="col-lg-10">' +
        '<input type="text" class="form-control">' +
        '</div>' +

        '</div>' +
        '</div>' +
        '<div class="col-1 pr-0 pl-0 d-flex align-items-start justify-content-end" >' +
        '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
        '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
        '</div>' +
        '</div>';

    $(".plans").append(regcontent);
    return false;
});
</script>

@endpush