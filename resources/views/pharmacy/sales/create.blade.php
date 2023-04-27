@extends('layouts.main.app')
@push('styles')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<style>
    .no_select_border span.select2-selection.select2-selection--single{
        border:0px !important;
    }
    /* #select2-supplier_select-container{
        text-align: right;
    } */
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
                        <form action="{{route('pharmacy.inventory.purchases.store',$pharmacy)}}" method="POST">@csrf
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
                                <div class="invoice-item invoice-table-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive no_select_border">
                                                <table class="invoice-table table table-bordered" id="table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th style="min-width: 180px;">
                                                                <span>Description</span> 
                                                            </th>
                                                            <th class="text-left">Batch</th>
                                                            <th class="text-center">Qty</th>
                                                            <th class="text-center">Cost</th>
                                                            <th class="text-right ">Worth</th>
                                                            <th class="extra-column">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  class="select-body">
                                                        @if(isset($inventories))
                                                            @foreach($inventories as $inventory)
                                                                @foreach ($inventory->batches as $batch)
                                                                    <tr class="select-row">
                                                                        <td class="first-column">
                                                                            <select name="batches[]" class="select-remote form-control w-100">
                                                                                <option id="{{$batch->id}}">{{$inventory->name}} | {{$batch->number}}</option>
                                                                            </select>
                                                                        </td>
                                                                        
                                                                        <td class="text-center extra-column"> 
                                                                            <input type="number" name="quantities[]" min="1" max="{{$batch->quantity}}" value="{{$batch->quantity}}" class="table-input unit_quantity">
                                                                        </td>
                                                                        <td class="text-center extra-column">
                                                                            <input type="number" name="costs[]" value="{{$inventory->unit_cost}}" class="table-input unit_cost" readonly>
                                                                        </td>
                                                                        
                                                                        <td class="text-right unit_amount">
                                                                            <input type="number" name="amounts[]" value="{{$inventory->unit_cost * $batch->quantity}}" class="table-input amount" readonly>
                                                                        </td>
                                                                        <td>
                                                                            <a href="#" class="btn btn-danger trash table-trash no-column">
                                                                                <i class="far fa-trash-alt"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr> 
                                                                @endforeach
                                                            @endforeach
                                                        @endif
                                                        <tr class="select-row">
                                                            <td class="first-column">
                                                                <select name="batches[]" class="select-remote form-control w-100">
                                                                    
                                                                </select>
                                                            </td>
                                                            <td class="text-center extra-column"> 
                                                                <select name="batches[]" class="form-control w-100">
                                                                    <option value="">Select Batch</option>
                                                                    <option value="">Not Applicable</option>
                                                                    <option value="">BA92334- 8 left</option>
                                                                    <option value="">BA92334- 2 left</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center extra-column"> 
                                                                <input type="number" name="quantities[]" min="1" max="" value="" class="table-input unit_quantity">
                                                            </td>
                                                            <td class="text-center  extra-column">
                                                                <input type="number" name="costs[]" class="table-input unit_cost" readonly>
                                                            </td>
                                                            <td class="text-right">
                                                                <input type="number" name="amounts[]" class="table-input amount" readonly>
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
                                        <div class="col-md-6 col-xl-4 ml-auto">
                                            <div class="table-responsive">
                                                <table class="invoice-table-two table">
                                                    <tbody>
                                                    <tr>
                                                        <th>Subtotal:</th>
                                                        <td>
                                                            <span>{{$pharmacy->country->currency_symbol}}
                                                                <span id="subtotal">0</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <th>Discount:</th>
                                                        <td><span>-10%</span></td>
                                                    </tr> --}}
                                                    <tr>
                                                        <th>Total Amount:</th>
                                                        <td><span>{{$pharmacy->country->currency_symbol}}<span id="total">0</span></span></td>
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
                                    <h6>Additional information</h6>
                                    <div class="d-flex justify-content-between">
                                        <input type="text" name="info" class="w-100">
                                        
                                        <div class="col-md-4 text-right">
                                            <button type="submit" name="action" value="save" class="btn btn-dark btn-sm supplies_submit">Execute</button>
                                            <button type="submit" name="action" value="execute" class="btn btn-info btn-sm supplies_submit">Execute & New Sale</button>
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
            $(document).on('input change','.unit_quantity',function(){
                let thiscost = $(this).closest('tr').find('.unit_cost').val()
                if($(this).val() < 0) {
                    $(this).val(1)
                }
                if($(this).val() > $(this).attr('max')){
                    $(this).val($(this).attr('max'))
                } 
                $(this).closest('tr').find('.amount').val(thiscost * $(this).val())
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
                        <select name="batches[]" class="select-remote form-control w-100">
                                                                                                
                        </select>
                    </td>
                    <td class="text-center extra-column">
                        <select name="batches[]" class="form-control w-100">
                            <option value="">Select Batch</option>
                            <option value="">Not Applicable</option>
                            <option value="">BA92334- 8 left</option>
                            <option value="">BA92334- 2 left</option>
                        </select>    
                    </td>
                    <td class="text-center extra-column"> 
                        <input type="number" name="quantities[]" value="1" min="1" max="" id="" class="table-input unit_quantity">
                    </td>
                    <td class="text-center extra-column">
                        <input type="number" name="costs[]" id="" class="table-input unit_cost" readonly>
                    </td>
                    
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
                    url: "{{route('pharmacy.inventory.batches',$pharmacy)}}",
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
                            obj.text = obj.text || obj.inventory.name+' | '+obj.number; // replace name with the property used for the text
                            return obj;
                        });
                        return {
                            results: data
                        };
                    }
                }
            });
        }
        
       
            
    </script>
@endpush

