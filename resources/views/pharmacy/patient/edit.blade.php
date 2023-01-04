@extends('layouts.main.app')
@push('styles')

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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item ">Add
                                        Patient</li>
                                    <li class="breadcrumb-item active">Assessment</li>
                                    <li class="breadcrumb-item active">Prescription</li>
                                    <li class="breadcrumb-item active">Non-medication plan</li>
                                </ul>             
                                                
                            </div>
                        </div>
                    </div>
                    <!-- /Page Wrapper -->
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /Page Content -->

@endsection
@push('scripts')
    <script>
        $(document).on('click',".add_condition", function() {
            console.log("condition")
            var condition = ` 
                                <div class="row my-4 condition">
                                    <div class="col-md-7">
                                        <div class="form-group">  
                                            <label class="text-muted text-center">Previous Medical Condition</label>                                        
                                            <input type="text" name="medical_history" placeholder="Condition name" class=" form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                            <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                            <button type="button" class="btn btn-primary add_condition" title="add more"><i class="fa fa-plus"></i></button>
                                            <button type="button" class="btn btn-danger remove_condition" title="add more"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                    <div class="col-md-12 medications">
                                        <div class="med mb-1">
                                            <input type="text" name="medical_history" placeholder="Medication used" class="form-control-sm"> 
                                            <label class="form-check-label mx-3">Effective? </label>
                                            <label class="form-check-label mx-3">
                                                <input type="radio" class="form-check-input" name="optradio">Yes
                                            </label>
                                            <label class="form-check-label mx-3">
                                                <input type="radio" class="form-check-input" name="optradio">No
                                            </label>
                                            <button type="button" class="btn btn-sm btn-info add_medication" title="add more"><i class="fa fa-plus"></i></button>
                                        </div>
                                        
                                    </div>     
                                </div>
                            `;

            $("#medical_conditions").append(condition);
        });
        $(document).on('click',".add_medication", function() {
            var medication = ` 
                                <div class="med mb-1">
                                    <input type="text" name="medical_history" placeholder="Medication used" class="form-control-sm"> 
                                    <label class="form-check-label mx-3">Effective? </label>
                                    <label class="form-check-label mx-3">
                                        <input type="radio" class="form-check-input" name="optradio">Yes
                                    </label>
                                    <label class="form-check-label mx-3">
                                        <input type="radio" class="form-check-input" name="optradio">No
                                    </label>
                                    <button type="button" class="btn btn-sm btn-info add_medication" title="add more"><i class="fa fa-plus"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger remove_medication" title="remove"><i class="far fa-trash-alt"></i></button>
                                </div> 
                            `;

            $(this).closest(".medications").append(medication);
        });
        $(document).on('click', '.remove_condition', function() {
            $(this).closest('.condition').remove();
        });
        $(document).on('click', '.remove_medication', function() {
            $(this).closest('.med').remove();
        });

    

                                                    
    </script>
@endpush