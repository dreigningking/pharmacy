@extends('layouts.main.app')
@push('styles')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<style>
    .no_select_border span.select2-selection.select2-selection--single{
        border:0px !important;
    }
    #select2-supplier_select-container{
        text-align: right;
    }
    span.select2-selection.select2-selection--single{
        height:46px;
        padding-top:10px;
        padding-bottom:10px;
        /* width:200px; */
    }
    span.select2.select2-container select2-container--default{
        width:200px!important;
    }
    .select2-container--default .select2-selection--single {
        height: 50px;
        border: 1px solid #dcdcdc;
        border-radius: 3px;
    }
    /* .select2-container--default.select2-selection--single.select2-selection__arrow {
        top: 10px !important;
    } */
    .select2-container--default.select2-selection--single.select2-selection__arrow{
        top: 8px !important;
    }
    /* .select2-container--default .select2-selection--single .select2-selection__arrow{
        top: 8px !important;
    } */
    .select2-container--default.select2-selection--single.select2-selection__rendered {
        line-height: 42px;
    }
    
    .table-trash {
        width: 29px !important;
        height: 29px !important;
    }
    .date {
        width: 150px;
    }
    .table-input{
        width: 90px;
        height: 50px;
        border: none;
    }
    .table-input:focus{
        border: none;
        outline: none;
    }
    .table tr td{
        vertical-align: middle;
        
    }
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        /* -moz-appearance: textfield; */
    }
    .select-remote {
        /* width: 450px !important; */
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
            {{-- @include('pharmacy.sidebar') --}}
            <div class="col-md-12">
                <!-- Page Wrapper -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('pharmacy.purchase.store',$pharmacy)}}" method="POST">@csrf
                            <div class="invoice-content">
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-logo">
                                                <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <!-- Invoice Drug -->
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-info">
                                                <strong class="customer-text">Patient</strong>
                                                <p class="invoice-details invoice-details-two">
                                                    <select name="supplier_id" id="supplier_select" class="select form-control " required>
                                                        <option value ="" selected>Select Patient</option>
                                                        <option value ="">Olwuadamilola Smauel</option>
                                                    </select>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="invoice-info invoice-info2">
                                                {{-- <a href="#add_supplier" data-toggle="modal" class="text-info"><u>Add new</u></a> --}}
                                                <div class="customer-text d-inline mx-2"><strong>Select Assessment</strong></div>
                                                <div class="invoice-details no_select_border">
                                                    <select name="supplier_id" id="supplier_select" class="select form-control supplier-select" required>
                                                        <option value ="" selected>Select Assessment</option>
                                                        <option value ="" >Assessment #12132</option>
                                                        <option value ="" >Assessment #344545</option>
                                                        {{-- @forelse ($suppliers as $supplier)                                                
                                                            <option value="{{$supplier->id}}"
                                                                data-city="{{$supplier->city->name}}"
                                                                data-state="{{$supplier->state->name}}"
                                                                data-country="{{$supplier->country->name}}">
                                                                {{$supplier->name}}
                                                            </option>
                                                        @empty
                                                            <option disabled>No Supplier</option>
                                                        @endforelse --}}

                                                    </select>
                                                    {{-- <br> --}}
                                                    <p class="city"></p>
                                                    <p class="state"></p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <!-- Invoice Drug -->
                                <div class="invoice-item invoice-table-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive no_select_border">
                                                <table class="invoice-table table table-bordered" id="table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="d-flex flex-wrap justify-content-between" style="min-width: 180px;">
                                                                <span>Drug</span> 
                                                            </th>
                                                            <th class="text-center">Qty Per Dose</th>
                                                            <th class="text-center">Frequency</th>
                                                            <th class="text-center">Duration</th>
                                                            <th class="text-left ">Medication Advise</th>
                                                            <th class="extra-column">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  class="select-body">
                                                        @if(isset($inventories))
                                                            @forelse($inventories as $inventory)
                                                                <tr class="select-row">
                                                                    <td class="first-column">
                                                                        <select name="inventories[]" class="select-remote form-control w-100">
                                                                            <option id="{{$inventory->id}}">{{$inventory->name}}</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-center extra-column">
                                                                        <input type="number" class="table-input unit_quantity">
                                                                    </td>
                                                                    <td class="text-center extra-column">
                                                                        <input type="number" name="frq"  class="table-input unit_cost">
                                                                    </td>
                                                                    <td class="text-center extra-column"> 
                                                                        <input type="number" name="duration[]" value="1" placeholder="days" class="table-input unit_quantity">
                                                                    </td>
                                                                    <td class="text-left unit_amount">
                                                                        <input type="text" name="advise[]" class="table-input">
                                                                    </td>
                                                                    <td>
                                                                        <a href="#" class="btn btn-danger trash table-trash no-column">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr> 
                                                            @endforeach
                                                        @endif
                                                        <tr class="select-row">
                                                            <td class="first-column">
                                                                <select name="inventories[]" class="select-remote form-control w-100">
                                                                    
                                                                </select>
                                                            </td>
                                                            <td class="text-center extra-column">
                                                                <input type="number" class="table-input unit_quantity">
                                                            </td>
                                                            <td class="text-center extra-column">
                                                                <input type="number" name="frq"  class="table-input unit_cost">
                                                            </td>
                                                            <td class="text-center extra-column"> 
                                                                <input type="number" name="duration[]" value="1" placeholder="days" class="table-input unit_quantity">
                                                            </td>
                                                            <td class="text-left unit_amount">
                                                                <input type="text" name="advise[]" class="table-input">
                                                            </td>
                                                            <td>
                                                                <a href="#" class="btn btn-danger trash table-trash no-column">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </a>
                                                            </td>
                                                        </tr>  
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- /Invoice Drug -->
                                
                                <!-- Invoice Information -->
                                <div class="other-info">
                                    <h6>Non Medication Advise</h6>
                                    <div class="d-flex justify-content-between">
                                        <textarea name="info" class="form-control col-md-5"></textarea>
                                        <div class="col-md-2"><a href="#add_supplier" data-toggle="modal">Add Prescription Error</a></div>
                                        <div class="col-md-4 text-right">
                                            <button type="submit" name="action" value="save" class="btn btn-light btn-sm supplies_submit " >Save as Draft</button>
                                            <button type="submit" name="action" value="execute" class="btn btn-dark btn-sm supplies_submit " >Save & Dispense</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Invoice Information -->
                                
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Page Wrapper -->


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
