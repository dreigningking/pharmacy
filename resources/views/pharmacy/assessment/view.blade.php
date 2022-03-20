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
                <!-- Basic Information -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title assessment-title">SHOW ASSESSMENT</h4>
                        {{-- <div class="row justify-content-center">
                            <form class="search-form d-flex">
                                <input class="search" type="text"
                                    placeholder="Search by EMR, patient name, phone number or email">
                                <button class="btn btn-primary search-btn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div> --}}
                        <div class="row">
                            <form action="" class="w-100">
                                <div class="row justify-content-start mt-4 w-100">

                                    <button type="button" class="btn btn-text open" data-toggle="collapse"
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

                                    <button type="button" class="btn btn-text open" data-toggle="collapse"
                                        data-target="#physical_assessment">Patient's Physical Assessment</button>

                                    <div class="row w-100 collapse show" id="physical_assessment">
                                        <div
                                            class="row mt-4 pl-4 pr-2  w-100 justify-content-center physical-assessment">

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
                                        <div class="plus-more add-more">
                                            <a href="javascript:void(0);" class="add-physical"><i
                                                    class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="row justify-content-start mt-4 w-100 ">
                                    <button type="button" class="btn btn-text open" data-toggle="collapse"
                                        data-target="#medical_history">Medical History</button>
                                    <div class="row collapse show w-100" id="medical_history">

                                        <div class="row w-100 mt-4">
                                            <div class="row mt-4 pl-4 pr-2  w-100 justify-content-center past-med">
                                                <h4 class="text-muted align-text-start mb-2">Medications for Past
                                                    Medical
                                                    Contdition</h4>
                                                <div class="col-11 physical d-flex align-items-center mt-2 mb-2 past">
                                                    <div class="col-md-7 pl-0 pr-0">
                                                        <div class="form-group row">

                                                            <div class="col-lg-11">
                                                                <div class="form-group d-flex align-items-center">
                                                                    <label for="usr">Medication:</label>
                                                                    <input type="text" name="" id=""
                                                                        class="ml-2 form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pr-0 pl-0">
                                                        <div class="form-group row">
                                                            <div class="col-lg-4">
                                                                <p>Effective?</p>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="optradio">Yes
                                                                    </label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="optradio">No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="plus-more add-more">
                                                <a href="javascript:void(0);" class="add-past"><i
                                                        class="fa fa-plus-circle"></i> Add More</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-start mt-4 w-100">

                                    <button type="button" class="btn btn-text open" data-toggle="collapse"
                                        data-target="#lab">Laboratory Findings</button>

                                    <div class="row mt-4 pl-4 pr-2 collapse show w-100 justify-content-center" id="lab">

                                        <div class="row w-100">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label pr-0">Laboratory
                                                        Result</label>
                                                    <div class="col-lg-10">
                                                        <textarea class="form-control" rows="4"
                                                            id="laboratory_result"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                                <div class="row justify-content-start mt-4 w-100">

                                    <button type="button" class="btn btn-text open" data-toggle="collapse"
                                        data-target="#diagnosis">Diagnosis</button>

                                    <div class="row mt-4 pl-4 pr-2 collapse show w-100 justify-content-center"
                                        id="diagnosis">

                                        <div class="row w-100">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label pr-0">Diagnosis</label>
                                                    <div class="col-lg-10">
                                                        <textarea class="form-control" rows="2"
                                                            id="laboratory_result"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                                <div class="row justify-content-start mt-4 w-100">

                                    <button type="button" class="btn btn-text open" data-toggle="collapse"
                                        data-target="#prescriptions">Prescription</button>

                                    <div class="row mt-4  pr-2 collapse show w-100 justify-content-center"
                                        id="prescriptions">

                                        <div class="row w-100 pl-4">
                                            <div class="col-md-12 w-100 prescriptions">
                                                <div class="prescription">
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label pr-0">Prescription</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="plus-more add-more">
                                                <a href="javascript:void(0);" class="add-prescription"><i
                                                        class="fa fa-plus-circle"></i> Add More</a>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="row justify-content-start mt-4 w-100">

                                    <button type="button" class="btn btn-text open" data-toggle="collapse"
                                        data-target="#plan">Non-Medication Plan</button>

                                    <div class="row mt-4  pr-2 collapse show w-100 justify-content-center" id="plan">

                                        <div class="row w-100 pl-4">
                                            <div class="col-md-12 w-100 plans">
                                                <div class="plann">
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label pr-0">Plan</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="plus-more add-more">
                                                <a href="javascript:void(0);" class="add-plan"><i
                                                        class="fa fa-plus-circle"></i> Add More</a>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="row pr-4 mt-4 justify-content-end">
                                    <button type="submit" class="btn btn-primary pl-2 pr-2">Save</button>
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