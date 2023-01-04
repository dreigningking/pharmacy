@extends('layouts.main.app')
@push('styles')

<style>
    .select2-container .select2-selection--single{
        height:40px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 35px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        position:absolute;
        top: 6px!important;
    }
</style>
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
                            <li class="breadcrumb-item active">Patient</li>
                            <li class="breadcrumb-item">Assessment</li>
                            <li class="breadcrumb-item active">Prescription</li>

                        </ul>
                        <h4 class="card-title assessment-title">ADD ASSESSMENT</h4>
                        <form action="{{route('pharmacy.assessment.store',$pharmacy)}}" method="POST" class="w-100">@csrf
                            <input type="hidden" name="patient_id" value="{{$patient->id}}">
                            <div class="card px-3" id="compliant">
                                <div class="card-header">
                                    <h4>Compliants</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <textarea class="form-control" name="complaints" rows="2" required placeholder="What is the patient's complaints"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card px-3" id="physical_assessment">
                                <div class="card-header">
                                    <h4>Patient's Physical Assessment</h4>
                                </div>
                                <div class="card-body physical-assessment">
                                    <div class="row physical">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <select class="form-control" id="sel1" name="physical_assessment[]">
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
                                                <input type="text" class="form-control" name="physical_assessment_value[]">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <a href="javascript:void(0);" class="btn btn-primary add-physical ml-2">
                                                    <i class="fa fa-plus-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="card px-3" id="lab">
                                <div class="card-header">
                                    <h4>Require Test</h4>
                                </div>
                                <div class="card-body form-group row">
                                    <div class="col-md-12 labtest ">
                                        <div class="test mb-3 row">
                                            <select name="tests[]" class="form-control select2 col-md-6"> 
                                                <option value="pregnancy">Pregnancy Test</option>
                                                <option value="brain_scan">Brain Scan</option>
                                                <option value="tommy_scan">Tommy Scan</option>
                                            </select>
                                            
                                            <label class="form-check-label pt-1 pl-5 col-md-2">
                                                <input type="radio" class="form-check-input" id="positive" name="test_result[]" value="1">Positive
                                            </label>
                                            <label class="form-check-label pt-1 pl-5 col-md-2">
                                                <input type="radio" class="form-check-input" id="negative" name="test_result[]" value="0">Negative
                                            </label>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-sm btn-info add_test " title="add more"><i class="fa fa-plus"></i></button>
                                                {{-- <button type="button" class="btn btn-sm btn-danger remove_test " title="remove more"><i class="fa fa-trash"></i></button> --}}
                                            </div>
                                            
                                        </div>    
                                    </div>
                                </div>
                            </div>
                           

                            <div class="card px-3" id="diagnosis">
                                <div class="card-header">
                                    <h4>Diagnosis</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <textarea class="form-control" name="diagnosis" rows="2" required></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="plans px-5">
                                <div class="form-group">
                                    <label class="form-label">Non Medical Treatment</label>
                                    <div class="">
                                        <input type="text" name="non_medical" class="form-control" placeholder="optional">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row justify-content-around px-5">
                                <button type="submit" name="action" value="save" class="col-5 btn btn-dark">Save Only</button>   
                                <button type="submit" name="action" value="prescribe" class="col-5 btn btn-info">Save & Prescribe Medicine</button>
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
    $('.select2').select2({
            placeholder: 'Select Test',
            width: '50%',
            height:'100px'
        });
    // $('.collapse-button').click(function(){
    //     if($(this).hasClass('collapsed')){
    //         $(this).find('.shows').html('')
    //     }else {
    //         $(this).find('.shows').html('Show')
    //     }
    // })
$(".physical-assessment").on('click', '.remove-physical', function() {
    $(this).closest('.physical').remove();
    return false;
});
$(".physical-assessment").on('click', ".add-physical",function() {
    console.log("meh")
    var regcontent = `
                        <div class="row physical">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <select class="form-control" id="sel1"name="physical_assessment[]" >
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
                                    <input type="text" class="form-control" name="physical_assessment_value[]">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <a href="javascript:void(0);" class="btn btn-primary add-physical ml-2">
                                        <i class="fa fa-plus-circle"></i></a>
                                    <a href="#" class="btn btn-danger remove-physical"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                            
                        </div>`;

    $(".physical-assessment").append(regcontent);
    
});
$(".labtest").on('click','.add_test',function(){
    let test = `
                <div class="test mb-3 row">
                    <select name="tests[]" class="form-control select2 col-md-6"> 
                        <option value="pregnancy">Pregnancy Test</option>
                        <option value="brain_scan">Brain Scan</option>
                        <option value="tommy_scan">Tommy Scan</option>
                    </select>
                    
                    <label class="form-check-label pt-1 pl-5 col-md-2">
                        <input type="radio" class="form-check-input" id="positive" name="test_result[]" value="1">Positive
                    </label>
                    <label class="form-check-label pt-1 pl-5 col-md-2">
                        <input type="radio" class="form-check-input" id="negative" name="test_result[]" value="0">Negative
                    </label>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-sm btn-info add_test " title="add more"><i class="fa fa-plus"></i></button>
                        <button type="button" class="btn btn-sm btn-danger remove_test " title="remove more"><i class="fa fa-trash"></i></button>
                    </div>  
                </div>
             `
    $(".labtest").append(test);
    $('.select2').select2({
        placeholder: 'Select Test',
        width: '50%',
        height:'100px'
    });
})
$(".labtest").on('click', '.remove_test', function() {
    $(this).closest('.test').remove();
    return false;
});


</script>
@endpush