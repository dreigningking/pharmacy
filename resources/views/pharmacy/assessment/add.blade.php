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
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    
                <!-- Profile Sidebar -->
                <div class="profile-sidebar">
                    
                    <div class="dashboard-widget">
                        <h3>Assessment</h3>
                        <nav class="dashboard-menu">
                            <ul>
                                <li>
                                    <a href="#patient" class="active" data-toggle="tab">
                                        <i class="fas fa-user-injured"></i> <span>Patient</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#complaint" data-toggle="tab">
                                        <i class="fas fa-pen"></i>
                                        <span>Complaint</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#review" data-toggle="tab">
                                        <i class="fas fa-male"></i>
                                        <span>System Review</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#vitals" data-toggle="tab">
                                        <i class="fas fa-thermometer-full"></i>
                                        <span>Vitals</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#laboratory" data-toggle="tab">
                                        <i class="fas fa-microscope"></i>
                                        <span>Laboratory</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#diagnosis" data-toggle="tab">
                                        <i class="fas fa-stethoscope"></i>
                                        <span>Diagnosis</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /Profile Sidebar -->
            
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="patient">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Patients</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <p>Begin assessment by finding the patient for whom accessment will be done</p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="h4">Patient</label>
                                                    <select name="patient_id" class="selectpatient form-control">
                                                        <option></option>
                                                        @foreach ($patients as $patient)
                                                            <option value="{{$patient->id}}" @if($pateint && $pateint->id == $patient->id) selected @endif>{{$patient->emr}}{{$patient->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="tab-pane fade" id="complaint">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Compliants</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <textarea class="form-control" name="complaints" rows="2" required placeholder="What is the patient's complaints"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="review">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>System Review</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <textarea class="form-control" name="complaints" rows="2" required placeholder="What is the patient's complaints"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vitals">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Patient's Vitals</h4>
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
                            </div> 
                            <div class="tab-pane fade" id="laboratory">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Lab Test</h4>
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
                                                    <button type="button" class="btn btn-sm btn-danger remove_test " title="remove more"><i class="fa fa-trash"></i></button>
                                                </div>
                                                
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="diagnosis">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Diagnosis</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <textarea class="form-control" name="diagnosis" rows="2" required></textarea>
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
</div>

</div>

</div>
<!-- /Page Content -->

@endsection

@push('scripts')

<script>
    $('.selectpatient').select2({
            placeholder: 'Select Patient',
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