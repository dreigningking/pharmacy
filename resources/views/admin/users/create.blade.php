@extends('layouts.admin.app')
@push('styles')
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
                
                <div class="card-body">
                    <form action="{{route('admin.medicine.save')}}" method="POST" class="needs-validation" novalidate>@csrf
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
                                            class="col-sm-12 custom-select custom-select-sm" name="disease[]">
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
                                    <input class="form-control" placeholder=""
                                        name="contraindications">

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
</div>

@endsection

@push('scripts')

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
            '<input list="encodings" value="" class="col-sm-12 custom-select custom-select-sm" name="disease[]">' +
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