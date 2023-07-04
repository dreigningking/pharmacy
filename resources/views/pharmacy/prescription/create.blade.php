@extends('layouts.main.app')
@push('styles')
<style>
    span.select2-selection.select2-selection--single{
        height:36px;
        /* padding-top:10px;
        padding-bottom:10px; */
        /* width:200px; */
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        top: 4px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height:36px;
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
                <h2 class="breadcrumb-title">Prescription</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title mb-0">Add Prescription</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class= "row mb-5">
                            <div class="col-sm-4">
                                <h4 class="d-block">Patient</h4>
                                <select name="supplier_id" id="supplier_select" class=" form-control " required>
                                    @foreach($patients as $pateint)
                                        <option value="">{{$pateint->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <h4 class="d-block">Previous Assessment Record</h4>
                                <select name="supplier_id" id="supplier_select" class="form-control " required>
                                    @foreach($assessments as $assess)
                                        <option value="">{{$assess->slug}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <h4 class="d-block">Source</h4>
                                <select name="supplier_id" id="supplier_select" class="form-control " required>
                                    <option value="" selected>Hospital</option>
                                    <option value="">Pharmacist</option>
                                    <option value="">Sales Rep</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="user-tabs mb-3">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#billing" data-toggle="tab"> <span>Medication planning</span> </a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="#assessments" data-toggle="tab">Check the profile of the patient’s
                                        medications</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#prescription" data-toggle="tab"><span>Check the
                                        interaction profile of the patient’s medications</span></a>
                                </li>
                            </ul>
                        </div>

                        <!-- Contents -->
                        <div class="tab-content">
                            
                            <!-- Prescription Tab -->
                            <div id="billing" class="tab-pane fade show active">
                                
                                <div class="card card-table">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center">
                                                <thead>
                                                    <tr>
                                                        <th style="min-width: 300px">Select patient’s medications</th>
                                                        <th style="min-width: 100px">Quantity Per dose</th>
                                                        <th style="min-width: 100px">Duration</th>
                                                        <th style="min-width: 100px;">Frequency</th>
                                                        <th style="min-width: 80px;">
                                                            <div class="add-more-item text-right">
                                                                <a href="javascript:void(0);" id="add_prescription_item"><i class="fas fa-plus-circle"></i> Add Item</a>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="prescription_body">
                                                    <tr class="prescription_row">
                                                        <td>
                                                            <select class="form-control prescription_inventory">
                                                                @foreach($inventories as $inventory)
                                                                    <option></option>
                                                                    <option value="{{$inventory->id}}">{{$inventory->drug->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="number">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="number" placeholder="Number of days">
                                                        </td>
                                                        <td>
                                                            <div class="">
                                                                <select class="form-control">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                </select>
                                                            </div>
                                                            
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="btn bg-danger-light trash remove_prescription_item"><i class="far fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td>
                                                            <select class="form-control select">
                                                                <option>ABC</option>
                                                                <option>ABC</option>
                                                                <option>ABC</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text">
                                                        </td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox"> Morning
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox"> Afternoon
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox"> Evening
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox"> Night
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="btn bg-danger-light trash"><i class="far fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row p-5">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Medication Advise</label>
                                                    <select name="" id="" class="form-control select2" multiple>
                                                        <option value="">Take your drugs with food</option>
                                                        <option value="">Complete all the antibiotics</option>
                                                        <option value="">Stop the pain reliever when pain and fever are gone</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Non-Medication Advise</label>
                                                    <select name="" id="" class="form-control select2" multiple>
                                                        <option value="">Avoid Smoke-filled environment</option>
                                                        <option value="">Sleep early</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="submit-section">
                                                    <button type="submit" class="btn btn-primary submit-btn">Save & Close</button>
                                                    <button type="submit" class="btn btn-success submit-btn">Save & Dispense <i class="fa fa-arrow-right"></i></button>
                                                    <button type="reset" class="btn btn-secondary submit-btn">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Medication Planning Tab -->
                            <div class="tab-pane fade" id="assessments">
                                
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>API</th>
                                                        <th>Side Effects</th>
                                                        <th>Contraindications</th>
                                                        <th>Lactation Status</th>
                                                        <th>Counsel</th>
                                                        <th>Alternative</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> Current</td>
                                                        <td>Arthemeter</td>
                                                        <td>Vomiting, Rashes</td>
                                                        <td> Vomiting, Rashes </td>
                                                        <td> Vomiting, Rashes </td>
                                                        <td> Take water,Sleep early
                                                            
                                                            {{-- <span class="badge badge-pill bg-warning-light">Ongoing</span> --}}
                                                        </td>
                                                        <td class="text-right">
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Current </td>
                                                        <td>Chloroquine</td>
                                                        <td>Running Nose </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            {{-- <span class="badge badge-pill bg-danger-light">Cancelled</span> --}}
                                                        </td>
                                                        <td class="text-right">
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> New </td>
                                                        <td>Ampicilin</td>
                                                        <td>Running Nose </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            {{-- <span class="badge badge-pill bg-danger-light">Cancelled</span> --}}
                                                        </td>
                                                        <td class="text-right">
                                                            
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Medication Planning Tab -->

                            <!-- Interaction Chamber Tab -->
                            <div class="tab-pane fade" id="prescription">
                                
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>API A </th>
                                                        <th>API B </th>
                                                        <th>Interaction</th>									
                                                        <th>Mechanism</th>									
                                                        
                                                    </tr>     
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Artemether</td>
                                                        <td>Chloroquine</td>
                                                        <td>Contraindicated</td>
                                                        <td class="text-right">
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Artemether</td>
                                                        <td>Chloroquine</td>
                                                        <td>Contraindicated</td>
                                                        <td class="text-right">
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Artemether</td>
                                                        <td>Chloroquine</td>
                                                        <td>Contraindicated</td>
                                                        <td class="text-right">
                                                            
                                                        </td>
                                                    </tr>
                                                </tbody>	
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Interaction Chamber  Tab -->

                            
                            
                            
                                    
                        </div>

                        <!-- Submit Section -->
                        
                        <!-- /Submit Section -->
                        
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection
@section('modals')
<div class=" modal fade custom-modal add-modal" id="add_supplier">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Prescription Error
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 d-flex">
                        <div class="card flex-fill">

                            <div class="card-body">
                                <form id="add_supplier_form" method="GET">@csrf
                                   
                                    <input type="hidden" name="pharmacy_id" value="{{$pharmacy->id}}">
                                    <div class="form-group ">
                                        <label class="form-label">Select Error</label>
                                        <select name="email" id="supplier_email" class="form-control">
                                            <option value="">ABCDEFGH</option>
                                            <option value="">YXAALLWEKLKLWE</option>
                                            <option value="">YXAALLWEklwewejkw</option>
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <label class="form-label">Select Intervention</label>
                                        <select name="email" id="supplier_email" class="form-control">
                                            <option value="">ABCDEFGH</option>
                                            <option value="">YXAALLWEKLKLWE</option>
                                            <option value="">YXAALLWEklwewejkw</option>
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <label class="form-label">Select Outcome</label>
                                        <select name="email" id="supplier_email" class="form-control">
                                            <option value="">ABCDEFGH</option>
                                            <option value="">YXAALLWEKLKLWE</option>
                                            <option value="">YXAALLWEklwewejkw</option>
                                        </select>
                                    </div>
                                    

                                    <div class="text-right">
                                        <button type="submit" id="save_supplier" class="btn btn-primary">Submit</button>
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

<div class=" modal fade custom-modal add-modal" id="add_drug">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Item
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 d-flex">
                        <div class="card flex-fill">

                            <div class="card-body">
                                <form>
                                    <div class="form-group ">
                                        <label class="form-label">Name</label>
                                        <input type="email" class="form-control">
                                    </div>
                                    <div class="form-group ">
                                        <label class="form-label">Manufacturer</label>
                                        <input type="email" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label d-flex justify-content-between"><span>Content</span> <small class="text-right">Can select multiple</small></label>
                                        <select name="" id="" class="select form-control" multiple>
                                            <option>Lumefantrine</option> 
                                            <option>Ampicilin</option> 
                                            <option>Flagyl</option> 
                                            <option>Septrin</option> 
                                        </select>
                                    </div>

                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary">Submit</button>
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
@endsection

@push('scripts')
    
<script>
    var prescription
    $('.select2').select2()

    $(document).ready(function(){
        prescription = $('.prescription_row').last().prop("outerHTML");
        $('.prescription_inventory').select2({width:'100%',placeholder:'Select'});
    })
    $(document).on('click','#add_prescription_item',function(){
        $('#prescription_body').append(prescription);
        $('.prescription_inventory').select2({width:'100%',placeholder:'Select'})
        // resetPastMedicationAttributes()
    })
    $(document).on('click','.remove_prescription_item',function(){
        $(this).closest('.prescription_row').remove();
        // resetPastMedicationAttributes()
    })

    $(document).on('select2:select','.prescription_inventory',function(e){
        let data = e.params.data;
        console.log(data);
        // $('#patient_name').text(data.element.dataset.name)
        // $('#patient_emr').text(data.element.dataset.emr)
        // $('#patient_phone').text(data.element.dataset.phone)
        // $('#patient_email').text(data.element.dataset.email)
        // $('#patient_age_gender').text(data.element.dataset.age +' Years, '+data.element.dataset.gender)
        // $('#patient_bloodgroup').text(data.element.dataset.bloodgroup)
        // $('#patient_genotype').text(data.element.dataset.genotype)
        // $('.result,.call-footer').show(); 
    });
    
</script>
    {{-- <script> 
            $('.select-remote').select2({
                width: 'resolve',
                ajax: {
                    url: "{{route('pharmacy.inventory.index',$pharmacy)}}",
                    dataType: 'json', 
                    cache: true, 
                    data: function (params) {
                        var query = {
                            search: params.term,
                            pharmacy_id: @json($pharmacy->id),
                            type: 'ajax'
                        }
                        return query;
                    },
                    processResults: function (data) {
                        var data = $.map(data.items, function (obj) {
                            obj.text = obj.text || obj.name; // replace name with the property used for the text
                            return obj;
                        });
                        return {
                            results: data
                        };
                    }
                }
            })
                        
            $(document).on('select2:select','.select-remote',function(e){
                var data = e.params.data;
                console.log(data)
                $(this).closest('tr').find('.unit_quantity').val(1)   
                $(this).closest('tr').find('.unit_cost').val(data.cost)               
                $(this).closest('tr').find('.amount').val(data.cost)                                
                recalculateTotal()
                addNewRow()
            })
            $(document).on('keyup keypress blur change','.unit_quantity',function(){
                let thiscost = $(this).closest('tr').find('.unit_cost').val()
                let qty = $(this).val() > 0 ? $(this).val():1
                $(this).closest('tr').find('.amount').val(thiscost * qty)
                recalculateTotal()
            })  
    </script> --}}
<script>
    function recalculateTotal(){
        let total = 0
        $('.amount').each(function(){
            if($(this).val()){
                total = parseInt(total) + parseInt($(this).val())
            }
        })
        $('#subtotal').text(total)
        $('#total').text(total)
        if(total)
            $('.supplies_submit').removeClass('disabled').prop('disabled',false)
        else
            $('.supplies_submit').addClass('disabled').prop('disabled',true)
    }      
</script>
@endpush
