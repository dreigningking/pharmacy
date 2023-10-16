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
            {{-- @include('pharmacy.sidebar') --}}
            <div class="col-md-10 offset-md-1">
                <!-- Page Wrapper -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('pharmacy.purchases.update',$pharmacy)}}" method="POST">@csrf
                            <input type="hidden" name="purchase_id" value="{{$purchase->id}}">
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
                                                <strong>Order: </strong> #{{$purchase->invoice_number}}
                                                </p>
                                                <p class="invoice-details">
                                                <strong>Issued:</strong> 
                                                <input type="date" name="" value="{{$purchase->created_at->format('Y-m-d')}}" class="date" readonly>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Invoice Drug -->
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-info">
                                                <strong class="customer-text">Purchase Order From</strong>
                                                <p class="invoice-details invoice-details-two">
                                                    {{$pharmacy->name}}, <br>
                                                    {{$pharmacy->city->name}}, {{$pharmacy->state->name}} <br>
                                                   {{$pharmacy->country->name}}.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="invoice-info invoice-info2">
                                                <a href="#add_supplier" data-toggle="modal" class="text-info"><u>Add new</u></a>
                                                <div class="customer-text d-inline mx-2"><bold>Supplier</bold></div>
                                                <div class="invoice-details no_select_border">
                                                    <select name="supplier_id" id="supplier_select" class="select form-control supplier-select" required>
                                                        <option value="{{$purchase->supplier_id}}" selected>{{$purchase->supplier->name}}</option>
                                                        @forelse ($pharmacy->suppliers as $supplier)   
                                                            <option value="{{$supplier->id}}"
                                                                data-email="{{$supplier->email}}"
                                                                data-mobile="{{$supplier->mobile}}"
                                                                data-location="{{$supplier->location}}">
                                                                {{$supplier->name}}
                                                            </option>                                             
                                                            
                                                        @empty
                                                            <option disabled>No Supplier</option>
                                                        @endforelse

                                                    </select>
                                                    {{-- <br> --}}
                                                    <p id="supplier_email">{{$purchase->supplier->email}}</p>
                                                    <p id="supplier_mobile">{{$purchase->supplier->mobile}}</p>
                                                    <p id="supplier_location">{{$purchase->supplier->location}}</p>
                                                    
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
                                                            <th class="d-flex flex-wrap justify-content-between" style="min-width: 180px;">
                                                                <span>Description</span> 
                                                                {{-- <a data-toggle="modal" href="#add_drug" class="font-weight-normal text-info">
                                                                    <u>Add New Drug</u>
                                                                </a> --}}
                                                            </th>
                                                            <th class="text-center">Packaging</th>
                                                            <th class="text-center">Cost</th>
                                                            <th class="text-center">Qty</th>
                                                            <th class="text-right ">Total</th>
                                                            <th class="extra-column">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  class="select-body">
                                                        
                                                        @forelse($purchase->details as $detail)
                                                            <tr class="select-row">
                                                                <td class="first-column">
                                                                    <select name="inventories[]" class="select-remote form-control w-100">
                                                                        <option value="{{$detail->inventory->id}}">{{$detail->inventory->name}}</option>
                                                                    </select>
                                                                </td>
                                                                <td class="text-center extra-column">
                                                                    <select class="table-input" name="package_types[]" >
                                                                        <option @if($detail->package_type == 'Packs') selected @endif>Packs</option>
                                                                        <option @if($detail->package_type == 'Bottle') selected @endif>Bottle</option>
                                                                        <option @if($detail->package_type == 'Cartons') selected @endif>Cartons</option>
                                                                        <option @if($detail->package_type == 'Bags') selected @endif>Bags</option>
                                                                        <option @if($detail->package_type == 'Pieces') selected @endif>Pieces</option>
                                                                    </select>
                                                                </td>
                                                                <td class="text-center extra-column">
                                                                    <input type="number" name="costs[]" value="{{$detail->cost}}" class="table-input unit_cost">
                                                                </td>
                                                                <td class="text-center extra-column"> 
                                                                    <input type="number" name="quantities[]" value="{{$detail->quantity}}" class="table-input unit_quantity">
                                                                </td>
                                                                <td class="text-right unit_amount">
                                                                    <input type="number" name="amounts[]" value="{{$detail->amount}}" class="table-input amount" readonly>
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0)" class="btn btn-danger trash table-trash">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </a>
                                                                </td>
                                                            </tr> 
                                                        @endforeach
                                                        
                                                        <tr class="select-row">
                                                            <td class="first-column">
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
                                                            <td class="text-center  extra-column">
                                                                <input type="number" name="costs[]" class="table-input unit_cost">
                                                            </td>
                                                            <td class="text-center extra-column"> 
                                                                <input type="number" name="quantities[]" min="1" value="" class="table-input unit_quantity">
                                                            </td>
                                                            <td class="text-right">
                                                                <input type="number" name="amounts[]" class="table-input amount" readonly>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)" class="btn btn-danger trash table-trash no-column">
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
                                                <input type="text" name="info" value="{{$purchase->info}}" class="w-100">
                                            </div>
                                            {{-- <div class="mt-3">
                                                <input type="checkbox" name="email_supplier" value="1"> Email Supplier
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
                                                                <span id="subtotal">{{$purchase->total}}</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <th>Discount:</th>
                                                        <td><span>-10%</span></td>
                                                    </tr> --}}
                                                    <tr>
                                                        <th>Total Amount:</th>
                                                        <td><span>{{$pharmacy->country->currency_symbol}}<span id="total">{{$purchase->total}}</span></span></td>
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
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-light btn-sm supplies_submit " >Save as Draft</button>
                                        <button type="submit" name="email_supplier" value="1" class="btn btn-dark btn-sm supplies_submit" >Save & Email Supplier</button>
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
                <h5 class="modal-title">Add Supplier
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
                                <form id="add_supplier_form" method="POST" action="{{route('pharmacy.inventory.suppliers',$pharmacy)}}">@csrf
                                    
                                    <input type="hidden" name="pharmacy_id" value="{{$pharmacy->id}}">
                                    <div class="form-group ">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name"  class="form-control" required>
                                    </div>
                                    <div class="form-group ">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email"  class="form-control" required>
                                    </div>
                                    <div class="form-group ">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" name="mobile" class="form-control" required>
                                    </div>
                                    <div class="form-group ">
                                        <label class="form-label">Location</label>
                                        <input type="text" name="location" placeholder="e.g Address, City, State" class="form-control" required>
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
        $(document).on('select2:select','#supplier_select',function(e){
            let data = e.params.data;
            $('#supplier_email').text(data.element.dataset.email)                         
            $('#supplier_mobile').text(data.element.dataset.mobile)                         
            $('#supplier_location').text(data.element.dataset.location)                         
            
        })
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
                            pharmacy_id: @json($pharmacy->id)
                    
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
                let index = $(this).closest('.select-row').index()
                let lengt = $('.select-row').length
                if(parseInt(index) + 1 != parseInt(lengt)){
                    if($('.select-row').length > 1)
                        $(this).closest('.select-row').remove()
                }

            });            
            $(document).on('select2:select','.select-remote',function(e){
                var data = e.params.data;
                console.log(data)
                $(this).closest('tr').find('.unit_quantity').val(1)   
                $(this).closest('tr').find('.unit_cost').val(data.unit_cost)               
                $(this).closest('tr').find('.amount').val(data.unit_cost)                                
                recalculateTotal()
                addNewRow()
            })
            $(document).on('keyup keypress blur change','.unit_quantity',function(){
                let thiscost = $(this).closest('tr').find('.unit_cost').val()
                let qty = $(this).val() > 0 ? $(this).val():1
                $(this).closest('tr').find('.amount').val(thiscost * qty)
                recalculateTotal()
            })
            $(document).on('keyup keypress blur change','.unit_cost',function(){
                let thiscost = $(this).val()
                let qty = $(this).closest('tr').find('.unit_quantity').val() > 0 ? $(this).closest('tr').find('.unit_quantity').val() : 1
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
                        <a href="javascript:void(0)" class="btn btn-danger trash table-trash"><i class="far fa-trash-alt"></i></a>
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
                            pharmacy_id: @json($pharmacy->id)    
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
            
    </script>
@endpush
