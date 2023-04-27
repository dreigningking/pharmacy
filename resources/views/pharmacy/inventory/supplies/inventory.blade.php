@extends('layouts.main.app')
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <style>
        
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
            border: none;
            outline: none;
        }
        input[type="text"]::-webkit-outer-spin-button,
        input[type="text"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="text"]:not(#additional) {
            border: none;
            outline: none;
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
                <h2 class="breadcrumb-title">Add to Inventory</h2>
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
                <!-- Page Wrapper -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('pharmacy.inventory.purchases.save_to_inventory',$pharmacy)}}" method="POST">@csrf
                            <input type="hidden" name="purchase_id" value="{{$purchase->id}}">
                            <div class="invoice-content">
                                <div class="invoice-item invoice-table-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive no_select_border">
                                                <table class="invoice-table table table-bordered" id="table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">
                                                                <span>Product</span> 
                                                            </th>
                                                            <th class="text-center">Cost</th>
                                                            <th class="text-center">Batch No</th>
                                                            <th class="text-center">Expiry</th>
                                                            <th class="text-center">Total Unit in Package</th>
                                                            <th class="text-center ">Total Markup</th>
                                                            <th class="text-right">Unit Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  class="select-body">
                                                        @foreach($purchase->details as $detail)
                                                            <tr class="select-row">
                                                                <td class="first-column">
                                                                    <input type="hidden" name="inventories[]" value="{{$detail->inventory_id}}">{{$detail->inventory->name}}
                                                                </td>
                                                                <td class="text-center extra-column">
                                                                    <input type="hidden" name="cost[]" class="cost" value="{{$detail->cost}}">
                                                                    {{$detail->cost}}
                                                                </td>
                                                                <td class="text-center extra-column"> <input type="text" name="batch[]" style="width:90px;" class="" autofocus></td>
                                                                <td class="text-center extra-column"> <input type="date" name="expiry[]" class="date table-input" style="width:130px;"></td>
                                                                <td class="text-center extra-column"> 
                                                                    <input type="number" name="units[]" min="1" value="1" class="table-input units" style="width:30px;" autofocus required></td>
                                                                <td class="">
                                                                    <div class="input-group input-group-sm" style="width:100px;">
                                                                        <input type="number" class="form-control markup" min="0.1" step="0.1" aria-label="Text input with dropdown button" autofocus required>
                                                                        <input type="hidden" name="markup_type[]" class="markup_type" value=".00">
                                                                        <div class="input-group-append">
                                                                          <button class="btn btn-outline-secondary dropdown-toggle markup_button" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">.00</button>
                                                                          <div class="dropdown-menu">
                                                                            <a class="dropdown-item markup_option" href="#">%</a>
                                                                          </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    {{-- <div class="input">
                                                                        <input type="number" name="amounts[]" value="{{$inventory->unit_cost}}" class="table-input amount" readonly>
                                                                    </div> --}}
                                                                </td>
                                                                <td class="text-center extra-column">
                                                                    <input type="text" name="price[]" class="table-input price" value="{{$detail->cost}}" style="width:50px;" required>
                                                                </td>
                                                            </tr> 
                                                        @endforeach  
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-3">
                                                <h6>Additional information</h6>
                                                <input type="text" name="info" id="additional" class="w-100">
                                            </div>
                                            <div class="mt-3">
                                                <input type="checkbox" name="" id=""> Email Supplier
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-4 ml-auto">
                                            <div class="table-responsive">
                                                <table class="invoice-table-two table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Total Cost:</td>
                                                            <td>
                                                                <span>{{$pharmacy->country->currency_symbol}}<span id="subtotal">{{number_format($purchase->total)}}</span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>Total Expected Sales:</td>
                                                            <td><span>{{$pharmacy->country->currency_symbol}}<span id="subprice">0</span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Expected Profit:</td>
                                                            <td><span>{{$pharmacy->country->currency_symbol}}<span id="subprofit">0</span></span></td>
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
                                        <button type="submit" class="btn btn-dark">Execute</button>                              
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
        //table area
        $('.markup_option').click(function(e){
            e.preventDefault();
            let new_option = $(this).html();
            let old_option = $(this).closest('.input-group').find('.markup_type').val();
            $(this).closest('.input-group').find('.markup_type').val(new_option)
            $(this).closest('.input-group').find('.markup_button').html(new_option)
            $(this).html(old_option);
            
            let cost = $(this).closest('.select-row').find('.cost').val()
            let units = $(this).closest('.select-row').find('.units').val()
            let markup = $(this).closest('.select-row').find('.markup').val() 
            markup = markup ? markup : 0 
            let unit_price = calculateUnitPrice(new_option,parseInt(markup),parseInt(cost),parseInt(units))
            $(this).closest('.select-row').find('.price').val(unit_price)
            
        });
        $('.units').on('input',function(){
            let markup_type = $(this).closest('.select-row').find('.markup_type').val()
            let cost = $(this).closest('.select-row').find('.cost').val()
            let markup = $(this).closest('.select-row').find('.markup').val() 
            markup = markup ? markup : 0 
            let units = $(this).val()
            let unit_price = calculateUnitPrice(markup_type,parseInt(markup),parseInt(cost),parseInt(units))
            $(this).closest('.select-row').find('.price').val(unit_price)                                                                                                                                                                                                                       
        })
        $('.markup').on('input',function(){
            let markup_type = $(this).closest('.select-row').find('.markup_type').val()
            let cost = $(this).closest('.select-row').find('.cost').val()
            let units = $(this).closest('.select-row').find('.units').val()
            let markup = $(this).val()
            let unit_price = calculateUnitPrice(markup_type,parseInt(markup),parseInt(cost),parseInt(units))
            $(this).closest('.select-row').find('.price').val(unit_price)
        })
        function calculateUnitPrice(markup_type,markup,cost,units){
            if(markup == ''){
                markup = 0
            }
            
            if(markup_type == '%'){
                add = ((markup * cost) / 100) + cost
            }else{
                add = markup + cost
            }
            selling_price = add/units
            console.log('markup:'+markup)
            console.log('cost:'+cost)
            console.log('units:'+units)
            console.log('add:'+add)
            console.log('selling_price:'+selling_price)
            calculateRevenues()
            return selling_price
                
              
        }
    </script>
    <script>
        function calculateRevenues(){
            let total = 0
            $('.price').each(function(){
                if($(this).val()){
                    total = parseInt(total) + parseInt($(this).val())
                }
            })
            // $('#subprice').text(total * )
        }
        function calculateProfits(){
            let total = 0
            $('.cost').each(function(){
                if($(this).val()){
                    total = parseInt(total) + parseInt($(this).val())
                }
            })        
        }
        
        // console.log(total)
            
    </script>
@endpush
