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
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Add Prescription</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-sm-4">
                                <h4 class="d-block">Patient</h4>
                                <select name="supplier_id" id="supplier_select" class=" form-control " required>
                                    <option value="" selected>Walk-in Patient</option>
                                    <option value="">Olwuadamilola Smauel</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <h4 class="d-block">Assessment</h4>
                                <select name="supplier_id" id="supplier_select" class="form-control " required>
                                    <option value="" selected>Walk-in Patient</option>
                                    <option value="">Olwuadamilola Smauel</option>
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
                        
                        <!-- Add Item -->
                        <div class="add-more-item text-right">
                            <a href="javascript:void(0);"><i class="fas fa-plus-circle"></i> Add Item</a>
                        </div>
                        <!-- /Add Item -->
                        
                        <!-- Prescription Item -->
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 200px">Name</th>
                                                <th style="min-width: 100px">Quantity</th>
                                                <th style="min-width: 100px">Days</th>
                                                <th style="min-width: 100px;">Time</th>
                                                <th style="min-width: 80px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
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
                                            </tr>
                                            <tr>
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
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Prescription Item -->
                        
                        <!-- Signature -->
                        {{-- <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="signature-wrap">
                                    <div class="signature">
                                        Click here to sign
                                    </div>
                                    <div class="sign-name">
                                        <p class="mb-0">( Dr. Darren Elder )</p>
                                        <span class="text-muted">Signature</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- /Signature -->
                        
                        <!-- Submit Section -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Save</button>
                                    <button type="reset" class="btn btn-secondary submit-btn">Clear</button>
                                </div>
                            </div>
                        </div>
                        <!-- /Submit Section -->
                        
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
            
                <!-- Profile Widget -->
                <div class="card widget-profile pat-widget-profile">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="nav-item"><a class="nav-link active" href="#basic-justified-tab1" data-toggle="tab">Medication Planning</a></li>
                            <li class="nav-item"><a class="nav-link" href="#basic-justified-tab2" data-toggle="tab">Interaction Chamber</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="basic-justified-tab1">
                                <div class="pro-widget-content">
                                    <div class="profile-info-widget">
                                        <a href="#" class="booking-doc-img">
                                            <img src="{{asset('assets/img/patients/patient.jpg')}}" alt="User Image">
                                        </a>
                                        <div class="profile-det-info">
                                            <h3><a href="patient-profile.html">Richard Wilson</a></h3>
                                            <div class="patient-details">
                                                <h5><b>Patient ID :</b> PT0016</h5>
                                                <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="basic-justified-tab2">
                                <div class="patient-info">
                                    <ul>
                                        <li>Phone <span>+1 952 001 8563</span></li>
                                        <li>Age <span>38 Years, Male</span></li>
                                        <li>Blood Group <span>AB+</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <!-- /Profile Widget -->
                
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
        $('#add_supplier_form').on('submit',function(e){
            e.preventDefault();
            // console.log($('#add_supplier_form').serialize())
            $.ajax({
                type:'POST',
                dataType: 'json',
                // url: "#",
                data: $('#add_supplier_form').serialize(),
                success:function(data) {
                    //close the modal
                    var newOption = new Option(data.supplier.name,data.supplier.id,true,true);
                    $('#supplier_select').append(newOption).trigger('change');
                    $('#add_supplier').modal('hide');
                console.log(data.supplier)
                },
                error: function (data, textStatus, errorThrown) {
                    //show error on modal
                    console.log(data);
                },
            });
        })
        //supplier
        let supplySelect = document.getElementById('supplier_select')
        let cityBox = document.querySelector(".city")
        let stateBox = document.querySelector(".state")
        supplySelect.onchange = function(event) {
            let rc = event?.target.options[event.target.selectedIndex].dataset.city;
            let clnc = event?.target.options[event.target.selectedIndex].dataset.state;
            let cln = event?.target.options[event.target.selectedIndex].dataset.country;
            cityBox.innerHTML = rc + ",";
            stateBox.innerHTML = clnc + "," + " " + cln + "."
        }
        
    </script>
    <script> 
        //table area
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
            $(".select-body").on('click', '.trash', function() {
                $(this).closest('.new-row').remove();
                return false;
            });            
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
    </script>
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
        function addNewRow(){
            var regcontent = `
                <tr class="new-row select-row">
                    <td>
                        <select name="inventories[]" class="select-remote form-control w-100">
                                                                                                
                        </select>
                    </td>
                    <td class="text-center extra-column">
                        <select class="table-input" name="package_types[]" >
                            <option selected>Packs</option>
                            <option>Bottle</option>
                            <option>Cartons</option>
                            <option>Bags</option>
                            <option>Pieces</option>
                        </select>
                    </td>
                    <td class="text-center extra-column">
                        <input type="number" name="costs[]" id="" class="table-input unit_cost">
                    </td>
                    <td class="text-center extra-column"> 
                        <input type="number" name="quantities[]" value="1" min="1" id="" class="table-input unit_quantity"></td>
                    <td class="text-right">
                        <input type="number" name="amounts[]" class="table-input amount" readonly>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger trash table-trash"><i class="far fa-trash-alt"></i></a>
                    </td>
                ]</tr>`;
            $(".select-body").append(regcontent);
            
            $('.select-remote:last').select2({
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
            });
        }
        
        // console.log(total)
            
    </script>
@endpush
