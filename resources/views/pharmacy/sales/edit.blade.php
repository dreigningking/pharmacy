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
                <h2 class="breadcrumb-title">Sales</h2>
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
                <form action="{{route('pharmacy.sales.update',$pharmacy)}}" method="post">@csrf
                    <input type="hidden" name="sale_id" value="{{$sale->id}}">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center">
                                    <thead>
                                        <tr>
                                            <th style="min-width: 300px">Item</th>
                                            <th style="min-width: 300px">Batch</th>
                                            <th style="min-width: 100px">Cost</th>
                                            <th style="min-width: 100px;">#Sales Unit (Qty)</th>
                                            <th style="min-width: 100px;">Worth</th>
                                            <th style="min-width: 80px;">
                                                <div class="add-more-item text-right">
                                                    <a href="javascript:void(0);" id="add_sales_item"><i class="fas fa-plus-circle"></i> Add Item</a>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="sales_body">
                                        @foreach($sale->details as $detail)
                                            <tr class="sales_row">
                                                <td>
                                                    <select class="form-control sales_inventory" name="inventories[]" required>
                                                        <option value=""></option>
                                                        @foreach($inventories as $inventory)
                                                            <option value="{{$inventory->id}}" @if($inventory->id == $detail->inventory_id) selected @endif>{{$inventory->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="detail_id[]" value="{{$detail->id}}">
                                                </td>
                                                <td>
                                                    <select class="form-control batches" name="batches[]" required>
                                                        <option value=""></option>
                                                        @foreach($detail->inventory->batches as $batch)
                                                            <option value="{{$batch->number}}" @if($batch->number == $detail->batch) selected @endif>{{$batch->number}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="form-control prices" type="number" name="prices[]" value="{{$detail->price}}" readonly>
                                                </td>
                                                
                                                <td>
                                                    <input class="form-control quantities" type="number" value="{{$detail->quantity}}" name="quantities[]" placeholder="Quantity">
                                                </td>
                                                <td>
                                                    <input class="form-control amounts" min="1" type="number" name="amounts[]" value="{{$detail->price * $detail->quantity}}" placeholder="Total" readonly>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn bg-danger-light trash remove_sales_item"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                        <tr class="sales_row">
                                            <td>
                                                <select class="form-control sales_inventory" name="inventories[]" required>
                                                    <option></option>
                                                    @foreach($inventories as $inventory)
                                                        <option value="{{$inventory->id}}">{{$inventory->name}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="detail_id[]" value="">
                                            </td>
                                            <td>
                                                <select class="form-control batches" name="batches[]" required>
                                                    
                                                </select>
                                            </td>
                                            <td>
                                                <input class="form-control prices" type="number" value="" name="prices[]" readonly>
                                            </td>
                                            
                                            <td>
                                                <input class="form-control quantities" type="number" min="1" placeholder="Quantity" value="1" name="quantities[]">
                                            </td>
                                            <td>
                                                <input class="form-control amounts" type="number" placeholder="Total" name="amounts[]" readonly>
                                            </td>
                                            
                                            <td>
                                                <a href="javascript:void(0);" class="btn bg-danger-light trash remove_sales_item"><i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row my-3">               
                                <div class="col-md-3 ml-4">
                                    <h4 class="d-block">Patient</h4>
                                    <select name="patient_id" id="patient_id" class="form-control patient_id" required disabled>
                                        <option value=""></option>
                                        @foreach($patients as $pateint)
                                            <option value="{{$pateint->id}}" @if($sale && $sale->patient_id == $pateint->id) selected @endif>{{$pateint->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-xl-4 ml-auto">
                                    <div class="table-responsive">
                                        <table class="invoice-table table">
                                            <tbody>
                                            <tr>
                                                <th>Subtotal:</th>
                                                <td>
                                                    <span>{{$pharmacy->country->currency_symbol}}
                                                        <span id="subtotal">{{number_format($sale->total)}}</span>
                                                    </span>
                                                </td>
                                            </tr>
                                        
                                            <tr>
                                                <th>Total Amount:</th>
                                                <td><span>{{$pharmacy->country->currency_symbol}}<span id="total">{{number_format($sale->total)}}</span></span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="submit-section">
                                        <a href="{{route('pharmacy.sales.index',$pharmacy)}}" class="btn btn-dark submit-btn mb-2">Cancels</a>
                                        @if(!$sale->status)
                                        <button type="submit" name="status" value="0" class="btn btn-secondary submit-btn mb-2">Save as Draft</button>
                                        <button type="submit" id="execute" name="status" value="1" class="btn btn-outline-primary submit-btn disabled" disabled>Execute </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            
        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection


@push('scripts')
    
<script>
    var sales
    $(document).ready(function(){
        sales = $('.sales_row').last().prop("outerHTML");
        $('.sales_inventory,.batches,.patient_id').select2({width:'100%',placeholder:'Select'});
        recalculateTotal()
    })
    $(document).on('click','#add_sales_item',function(){
        $('#sales_body').append(sales);
        $('.sales_inventory,.batches').select2({width:'100%',placeholder:'Select'})
        
    })
    $(document).on('click','.remove_sales_item',function(){
        $(this).closest('.sales_row').remove();
        recalculateTotal()
    })

    $(document).on('select2:select','.sales_inventory',function(e){
        let clicked = $(this);
        let inventory_id = $(this).val()
        $.ajax({
            type:'POST',
            dataType: 'json',
            url: "{{route('getInventoryDetails')}}",
            data:{
                '_token' : $('meta[name="csrf-token"]').attr('content'),
                'inventory_id': inventory_id,
            },
            success:function(data) {
                console.log(data)
                clicked.closest('tr').find('.batches').children().remove()
                $.each(data.batches,function(index,value){
                    let option = `<option value="${value.number}">${value.number}</option>`
                    clicked.closest('tr').find('.batches').append(option)
                })
                clicked.closest('tr').find('.prices').val(data.unit_price)
                clicked.closest('tr').find('.amounts').val(data.unit_price)
                recalculateTotal()
            },
            error: function(data) {
                console.log(data);
            }
        });
        
    });
    $(document).on('keyup keypress blur change','.quantities',function(){
        let thiscost = $(this).closest('tr').find('.prices').val()
        let qty = $(this).val();
        $(this).closest('tr').find('.amounts').val(thiscost * qty)
        recalculateTotal()
    })  
    
</script>
    
<script>
    function recalculateTotal(){
        let total = 0
        $('.amounts').each(function(){
            if($(this).val()){
                total = parseInt(total) + parseInt($(this).val())
            }
        })
        $('#subtotal').text(total)
        $('#total').text(total)
        if(total)
            $('#execute').removeClass('disabled').prop('disabled',false)
        else
            $('#execute').addClass('disabled').prop('disabled',true)
    }      
</script>



@endpush
