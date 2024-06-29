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
                <h2 class="breadcrumb-title">Inventory</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            
            <div class="col-md-10 offset-md-1">
                <!-- Page Wrapper -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('pharmacy.transfer.store',$pharmacy)}}" method="POST">@csrf
                            <input type="hidden" id="pharmacy_id" value="{{$pharmacy->id}}">
                            <div class="invoice-content">
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-logo">
                                                <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="invoice-details ">
                                                <strong>Transfer no:</strong> #
                                                </p>
                                                <p class="invoice-details">
                                                <strong>Issued:</strong> 
                                                <input type="date" name="" id="" value="{{now()->format('Y-m-d')}}" class="date">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Invoice Drug -->
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-info">
                                                <strong class="customer-text">Sending Pharmacy</strong>
                                                <p class="invoice-details invoice-details-two">
                                                    {{$pharmacy->name}}, <br>
                                                    {{$pharmacy->city->name}}, {{$pharmacy->state->name}} <br>
                                                   {{$pharmacy->country->name}}.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="invoice-info invoice-info2">
                                                {{-- <a href="#add_supplier" data-toggle="modal" class="text-info"><u>Add new</u></a> --}}
                                                <div class="customer-text d-inline mx-2"><bold>Receiving Pharmacy</bold></div>
                                                <div class="invoice-details no_select_border">
                                                    <select name="to_pharmacy" id="supplier_select" class="select form-control supplier-select" required>
                                                        <option value ="" selected>Select Pharmacy</option>
                                                        @forelse ($pharmacies->except($pharmacy->id) as $receiver)                                                
                                                            <option value="{{$receiver->id}}"
                                                                data-city="{{$receiver->city->name}}"
                                                                data-state="{{$receiver->state->name}}"
                                                                data-country="{{$receiver->country->name}}">
                                                                {{$receiver->name}}
                                                            </option>
                                                        @empty
                                                            <option disabled>No Receiving Pharmacy</option>
                                                        @endforelse

                                                    </select>
                                                    {{-- <br> --}}
                                                    <p><span id="city"></span>,<span id="state"></span></p>
                                                    <p id="country"></p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Invoice Drug -->
                                
                                
                                
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
                                                            <th class="text-center">Qty</th>
                                                            <th class="text-center">Cost</th>
                                                            <th class="text-right ">Worth</th>
                                                            <th class="extra-column">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  class="select-body">
                                                        @if(isset($inventories))
                                                            @foreach($inventories as $inventory)
                                                                @foreach ($inventory->batches->where('quantity','>',0) as $batch)
                                                                    <tr class="select-row">
                                                                        <td class="first-column">
                                                                            <select name="batches[]" class="select-remote form-control w-100">
                                                                                <option value="{{$batch->id}}">{{$inventory->name}} | {{$batch->number}}</option>
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
                                                                            <a href="#" class="btn btn-danger trash table-trash ">
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
                                                                <input type="number" name="quantities[]" min="1" max="" value="" class="table-input unit_quantity">
                                                            </td>
                                                            <td class="text-center  extra-column">
                                                                <input type="number" name="costs[]" class="table-input unit_cost" readonly>
                                                            </td>
                                                            <td class="text-right">
                                                                <input type="number" name="amounts[]" class="table-input amount" readonly>
                                                            </td>
                                                            <td>
                                                                <a href="#" class="btn btn-danger trash table-trash ">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </a>
                                                            </td>
                                                        </tr>  
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-3">
                                                <h6>Additional information</h6>
                                                <input type="text" name="info" class="w-100">
                                            </div>
                                            {{-- <div class="mt-3">
                                                <input type="checkbox" name="" id=""> Email Supplier
                                            </div> --}}
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
                                    
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-light btn-sm supplies_submit @if(!isset($inventories)) disabled @endif" @if(!isset($inventories)) disabled @endif>Save as Draft</button>
                                            <button type="submit" name="send" value="1" class="btn btn-dark btn-sm supplies_submit @if(!isset($inventories)) disabled @endif" @if(!isset($inventories)) disabled @endif>Save Send</button>
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

@endsection

@push('scripts')
    
    <script> 
            $(document).on('select2:select','#supplier_select',function(e){
                let data = e.params.data;
                $('#city').text(data.element.dataset.city)                         
                $('#state').text(data.element.dataset.state)                         
                $('#country').text(data.element.dataset.country)                         
                
            })
        //table area
            $('.select-remote').select2({
                width: 'resolve',
                ajax: {
                    url: "{{route('pharmacy.transfer.batches',$pharmacy)}}",
                    dataType: 'json', 
                    cache: true, 
                    data: function (params) {
                        var query = {
                            search: params.term,
                            pharmacy_id: $('#pharmacy_id').val(),
                        }
                        return query;
                    },
                    processResults: function (data) {
                        console.log(data.items)
                        var data = $.map(data.items, function (obj) {
                            obj.text = obj.inventory.name +' | '+ obj.number; // replace name with the property used for the text
                            return obj;
                        });
                        return {
                            results: data
                        };
                    }
                }
            })
            $(".select-body").on('click', '.trash', function() {
                //alert('ok')
                $(this).closest('.select-row').remove();
                return false;
            });            
            $(document).on('select2:select','.select-remote',function(e){
                var data = e.params.data;
                $(this).closest('tr').find('.unit_quantity').val(data.quantity)   
                $(this).closest('tr').find('.unit_quantity').attr('max',data.quantity)   
                $(this).closest('tr').find('.unit_cost').val(data.inventory.unit_cost)               
                $(this).closest('tr').find('.amount').val(data.inventory.unit_cost * data.quantity)                                
                recalculateTotal()
                addNewRow()
            })
            $(document).on('input change','.unit_quantity',function(){
                let thiscost = $(this).closest('tr').find('.unit_cost').val()
                if($(this).val() < 0) {
                    $(this).val(1)
                }
                // if($(this).val() > $(this).attr('max')){
                //     $(this).val($(this).attr('max'))
                // } 
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
                    url: "{{route('pharmacy.transfer.batches',$pharmacy)}}",
                    dataType: 'json', 
                    cache: true, 
                    data: function (params) {
                        var query = {
                            search: params.term,
                            pharmacy_id: $('#pharmacy_id').val(),
                        }
                        return query;
                    },
                    processResults: function (data) {
                        var data = $.map(data.items, function (obj) {
                            obj.text = obj.inventory.name +' | '+ obj.number; // replace name with the property used for the text
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
