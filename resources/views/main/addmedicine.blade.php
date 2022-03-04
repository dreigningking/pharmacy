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
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="row pl-2">
                            <h1 class="text-muted">Add Medicine</h1>
                        </div>
                        <form action="/action_page.php" class="needs-validation" novalidate>
                            <div class="form-group">
                                <label for="uname">Name:</label>
                                <input type="text" class="form-control" id="uname" placeholder="Enter Name" name="name"
                                    required>

                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Description:</label>
                                <input type="description" class="form-control" id="pwd" placeholder="Enter description"
                                    name="description" required>

                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pwd">Diseases:</label>
                                    <div class="row disease-data">
                                        <div class="disease col-12">
                                            <input list="encodings" value=""
                                                class="col-sm-12 custom-select custom-select-sm">
                                            <datalist id="encodings">
                                                <option value="ISO-8859-1">ISO-8859-1</option>
                                                <option value="cp1252">ANSI</option>
                                                <option value="utf8">UTF-8</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="add-more">
                                        <a href="javascript:void(0);" class="add-disease"><i
                                                class="fa fa-plus-circle"></i> Add More</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group contra">
                                        <label for="pwd">Contraindication:</label>
                                        <input class="input-tags form-control" list="encoding" data-role="tagsinput"
                                            placeholder="Enter Specialization" name="specialist"
                                            value="Children Care,Dental Care" id="specialist">
                                        <datalist id="encoding">
                                            <option value="ISO-8859-1">ISO-8859-1</option>
                                            <option value="cp1252">ANSI</option>
                                            <option value="utf8">UTF-8</option>
                                        </datalist>
                                        <small class="form-text text-muted">Note : Type & Press enter to add new
                                            specialization</small>
                                    </div>

                                    <div class="add-more">
                                        <a href="javascript:void(0);" class="add-award "><i
                                                class="fa fa-plus-circle"></i> Add More</a>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary pl-4 pr-4 mt-2">Submit</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>
        <!-- /Page Content -->
    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('adminassets/js/script.js')}}"></script>

<script>
// Disable form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
    // Awards Add More

    $(".disease-data").on('click', '.trash', function() {
        $(this).closest('.disease').remove();
        return false;
    });

    $(".add-disease").on('click', function() {
        console.log("meh")
        var regcontent = '<div class="col-12 d-flex disease">' +
            '<div class="col-10 pl-0">' +
            '<input list="encodings" value="" class="col-sm-12 custom-select custom-select-sm">' +
            '<datalist id="encodings">' +
            '<option value="ISO-8859-1">ISO-8859-1</option>' +
            '<option value="cp1252">ANSI</option>' +
            '<option value="utf8">UTF-8</option>' +
            '</datalist>' +
            '</div>' +
            '<div class="col-2 pr-0 pl-0 d-flex align-items-start justify-content-end" >' +
            '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
            '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
            '</div>' +
            '</div>';

        $(".disease-data").append(regcontent);
        return false;
    });
})();
</script>
@endpush