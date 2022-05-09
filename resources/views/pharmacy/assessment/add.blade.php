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
                <div class="card">
                    <div class="card-body">
                        
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Add Patient</li>
                            <li class="breadcrumb-item">Assessment</li>
                            <li class="breadcrumb-item active">Prescription</li>
                            <li class="breadcrumb-item active">Non-medication plan</li>

                        </ul>
                        <h4 class="card-title assessment-title">ADD ASSESSMENT</h4>
                        <form action="" class="w-100">
                            <button type="button" class="collapse-button btn btn-dark open btn-block my-3" data-toggle="collapse" data-target="#physical_assessment"><span class="shows">  </span> Patient's Physical Assessment</button>
                            <div class=" collapse show px-3" id="physical_assessment">
                                <div class="physical-assessment">
                                    <div class="row physical">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <select class="form-control" id="sel1">
                                                    <option value="Temp (&deg;c)">Temp (&deg;c)</option>
                                                    <option value="BP (mmHg)">BP (mmHg)</option>
                                                    <option value="PR (Beats/min)">PR (Beats/min)</option>
                                                    <option value="Wt (Kg)">Wt (Kg)</option>
                                                    <option value="Ht (m)">Ht (m)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="plus-more add-more ml-4">
                                    <a href="javascript:void(0);" class="add-physical ml-2">
                                        <i class="fa fa-plus-circle"></i> Add More</a>
                                </div>
                            </div>
                           
                            <button type="button" class="collapse-button btn btn-dark btn-block my-3" data-toggle="collapse" data-target="#medical_history"><span class="shows"> </span> Medical History</button>
                            <div class=" collapse px-3" id="medical_history">                     
                                <h4 class="text-muted text-center">Medications for Past Medical Condition</h4>
                                <div class="">
                                    <div class="row physical my-2 past">
                                        <div class="col-md-7">
                                            <div class="form-group">                                          
                                                <input type="text" name="medical_history" placeholder="Medication" class=" form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
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
                                    <a href="javascript:void(0);" class="add-past ml-4"><i
                                            class="fa fa-plus-circle"></i> Add More</a>
                                </div>
                            </div>
                            
                            {{-- <div class="row justify-content-start mt-4 w-100"> --}}

                            <button type="button" class="collapse-button btn btn-dark btn-block my-3" data-toggle="collapse" data-target="#lab"><span class="shows"> </span> Laboratory Findings</button>
                            <div class="collapse px-3" id="lab">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label pr-0">Laboratory
                                        Result</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" rows="4"
                                            id="laboratory_result"></textarea>
                                    </div>
                                </div>
                            </div>
                           

                            <button type="button" class="collapse-button btn btn-dark btn-block my-3" data-toggle="collapse" data-target="#diagnosis"><span class="shows"> </span> Diagnosis</button>
                            <div class="collapse px-3" id="diagnosis">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label pr-0">Diagnosis</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" rows="2"
                                            id="laboratory_result"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="button" class="collapse-button btn btn-dark btn-block my-3" data-toggle="collapse" data-target="#plan"><span class="shows"> </span> Non-Medication Plan</button>
                            <div class="collapse px-3" id="plan">
                                <div class="plans">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label pr-0">Plan</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="plus-more add-more">
                                    <a href="javascript:void(0);" class="add-plan ml-2"><i class="fa fa-plus-circle"></i> Add More</a>
                                </div>
                            </div>
                            
                            <div class="row w-100 pr-4 mt-4 ml-6 justify-content-between">
                                <button type="submit" class="btn btn-primary pl-2 pr-2 ml-4">Save</button>   
                                <button type="submit" class="btn btn-primary pres">Save & Prescribe Medicine</button>
                            </div>
                        </form>
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
<script>
    // $('.collapse-button').click(function(){
    //     if($(this).hasClass('collapsed')){
    //         $(this).find('.shows').html('')
    //     }else {
    //         $(this).find('.shows').html('Show')
    //     }
    // })
$(".physical-assessment").on('click', '.trash', function() {
    $(this).closest('.physical').remove();
    return false;
});
$(".add-physical").on('click', function() {
    console.log("meh")
    var regcontent = `
                        <div class="row physical">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <select class="form-control" id="sel1">
                                        <option value="Temp (&deg;c)">Temp (&deg;c)</option>
                                        <option value="BP (mmHg)">BP (mmHg)</option>
                                        <option value="PR (Beats/min)">PR (Beats/min)</option>
                                        <option value="Wt (Kg)">Wt (Kg)</option>
                                        <option value="Ht (m)">Ht (m)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-1 pr-0 pl-0 d-flex align-items-start justify-content-end" >
                                <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                <a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </div>`;

    $(".physical-assessment").append(regcontent);
    return false;
});


$(".past-med").on('click', '.trash', function() {
    $(this).closest('.past').remove();
    return false;
});
$(".add-past").on('click', function() {
    console.log("meh")
    var regcontent = ` <div class = "col-11 physical d-flex align-items-start mt-2 mb-2 past" > 
                            <div class="col-md-7 pl-0 pr-0">
                                <div class="form-group row">
                                    <div class="col-lg-11">
                                        <div class="form-group d-flex align-items-center">
                                            <label for="usr">Medication:</label>
                                            <input type="text" name="" id="" class = "ml-2 form-control" > 
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
                                            <input type="radio" class="form-check-input" name = "optradio" > Yes 
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name = "optradio" > No 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1 pr-0 pl-0 d-flex align-items-start justify-content-end" >
                            <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                            <a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                        </div>
                        </div>
                        </div>`;

    $(".past-med").append(regcontent);
    return false;
});



$(".plans").on('click', '.trash', function() {
    $(this).closest('.plan').remove();
    return false;
});
$(".add-plan").on('click', function() {
    console.log("meh")
    var regcontent = `<div class="col-md-12 pl-0 plan">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label pr-0"></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-1 pr-0 pl-0 d-flex align-items-start justify-content-end" >
                                <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                    <a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>`;

    $(".plans").append(regcontent);
    return false;
});
</script>
@endpush