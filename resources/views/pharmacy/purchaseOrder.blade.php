@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<style>
    .no_select_border span.select2-selection.select2-selection--single{
        border:0px !important;
    }
    span.select2-selection.select2-selection--single{
        height:46px;
        padding-top:10px;
        padding-bottom:10px;
        width:200px;
    }
    span.select2.select2-container select2-container--default{
        width:200px!important;
    }
    .select2-container--default .select2-selection--single {
        height: 50px;
        border: 1px solid #dcdcdc;
        border-radius: 3px;
    }
    .select2-container--default.select2-selection--single.select2-selection__arrow {
        top: 10px !important;
    }
    .select2-container--default.select2-selection--single.select2-selection__arrow{
        top: 8px !important;
    }
    .select2-container--default.select2-selection--single.select2-selection__rendered {
        line-height: 42px;
    }
    
    /* .select-remote {
        width: 650px !important;
    } */
    .select2-container--default .select2-selection--single .select2-selection__arrow{
    top: 8px !important;
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
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        -moz-appearance: textfield;
    }
    
    .table-trash {
        width: 29px !important;
        height: 29px !important;
    }
    .select-remote {
width: 450px !important;
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
            @include('user.sidebar')
            <div class="col-md-7 col-lg-8 col-xl-9">
                <!-- Page Wrapper -->
                <div class="page-wrapper">
                    <div class="content container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
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
                                                            <strong>Order:</strong> #00124
                                                            </p>
                                                            <p class="invoice-details">
                                                            <strong>Issued:</strong> <input type="date" name="" id="" class="date">
                                                            </p>
                                                           
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Invoice Item -->
                                            <div class="invoice-item">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="invoice-info">
                                                            <strong class="customer-text">Purchase Order From</strong>
                                                            <p class="invoice-details invoice-details-two">
                                                                {{$pharmacy->city->name}}, <br>
                                                                {{$pharmacy->state->name}}, {{$pharmacy->country->name}}.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="invoice-info invoice-info2">
                                                            <a href="#add_supplier" data-toggle="modal" class="text-info"><u>Add new</u></a>
                                                            <div class="customer-text d-inline mx-2"><bold>Supplier</bold></div>
                                                            <div class="invoice-details no_select_border">
                                                                <select name="supplier_id" id="supplier_select"
                                                                    class="select form-control supplier-select">
                                                                    <option value ="" selected>Select Supplier</option>
                                                                    @forelse ($suppliers as $supplier)
                                                                   
                                                                    <option value="{{$supplier->id}}"
                                                                        data-city="{{$supplier->city->name}}"
                                                                        data-state="{{$supplier->state->name}}"
                                                                        data-country="{{$supplier->country->name}}">
                                                                        {{$supplier->name}}</option>
                                                                    @empty
                                                                    <option disabled>No Supplier</option>
                                                                    @endforelse

                                                                </select>
                                                                {{-- <br> --}}
                                                                <p class="city"></p>
                                                                <p class="state"></p>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Invoice Item -->
                                            
                                            <!-- Invoice Item -->
                                            <div class="invoice-item">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="invoice-info ">
                                                            <strong class="customer-text">Delivery</strong>
                                                            <p class="invoice-details invoice-details-two ">
                                                            {{$pharmacy->city->name}}, <br>
                                                                {{$pharmacy->state->name}}, {{$pharmacy->country->name}}.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="invoice-info invoice-info2">
                                                            <strong class="customer-text">Payment Method</strong>
                                                            <p class="invoice-details ">
                                                                Debit Card <br>
                                                                XXXXXXXXXXXX-2541 <br>
                                                                HDFC Bank<br>
                                                            </p>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Invoice Item -->
                                            
                                            <!-- Invoice Item -->
                                            <div class="invoice-item invoice-table-wrap">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive no_select_border">
                                                            <table class="invoice-table table table-bordered" id="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="d-flex justify-content-between"><span>Description</span> <a data-toggle="modal" href="#add_drug" class="font-weight-normal text-info"><u>Add New Item</u></a></th>
                                                                        <th class="text-center">Unit Cost</th>
                                                                        <th class="text-center">Qty</th>
                                                                        <th class="text-right ">Total</th>
                                                                        <th class="extra-column">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody  class="select-body">
                                                                    <tr>
                                                                        <td class="first-column">
                                                                            <select name="item_id[]" class="select-remote form-control w-100">
                                                                                
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center select-row pl-0 pr-0 extra-column">
                                                                            <input type="number" name="" id="" class="table-input">
                                                                        </td>
                                                                        <td class="text-center pl-0 pr-0 extra-column"> <input type="number" name="" id="" class="table-input"></td>
                                                                        <td class="text-right">{{$pharmacy->country->currency_symbol}}<span class="amount">100</span></td>
                                                                        <td><a href="#" class="btn btn-danger trash table-trash no-column"><i class="far fa-trash-alt"></i></a></td>
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
                                                                    <td><span>{{$pharmacy->country->currency_symbol}}<span class="subtotal">315</span></span></td>
                                                                </tr>
                                                                {{-- <tr>
                                                                    <th>Discount:</th>
                                                                    <td><span>-10%</span></td>
                                                                </tr> --}}
                                                                <tr>
                                                                    <th>Total Amount:</th>
                                                                    <td><span>{{$pharmacy->country->currency_symbol}}<span class="total">315</span></span></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Invoice Item -->
                                            
                                            <!-- Invoice Information -->
                                            <div class="other-info">
                                                <h4>Other information</h4>
                                                <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
                                            </div>
                                            <!-- /Invoice Information -->
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                <form id="add_supplier_form" method="POST">@csrf
                                    <input type="hidden" name="ajax" value="1">
                                    <input type="hidden" name="pharmacy_id" value="{{$pharmacy->id}}">
                                    <div class="form-group ">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" id="supplier_name" class="form-control" required>
                                    </div>
                                    <div class="form-group ">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" id="supplier_email" class="form-control" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="form-label">Mobile Number</label>
                                                <input type="text" name="mobile" id="supplier_mobile" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Country</label>
                                                <select name="country_id" id="supplier_country" class="select form-control" required>
                                                    @foreach ($countries as $country)
                                                        <option value="{{$country->id}}" @if($pharmacy->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">State</label>
                                                <select name="state_id" id="supplier_state" class="select form-control" required>
                                                    @foreach ($pharmacy->country->states as $state)
                                                        <option value="{{$state->id}}" @if($pharmacy->state_id == $state->id) selected @endif>{{$state->name}}</option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">City</label>
                                                <select name="city_id" id="supplier_city" class="select form-control" required>
                                                    @foreach ($pharmacy->country->cities as $city)
                                                        <option value="{{$city->id}}" @if($pharmacy->city_id == $city->id) selected @endif>{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
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
                <h5 class="modal-title">Add Drug
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
    <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
    <script>
        $('#add_supplier_form').on('submit',function(e){
            e.preventDefault();
            // console.log($('#add_supplier_form').serialize())
            $.ajax({
                type:'POST',
                dataType: 'json',
                url: "{{route('supplier.save')}}",
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
        $('#supplier_select').on('change',function(){
            console.log($(this).val())
        })
        
    </script>
    <script> 
            $('.select-remote').select2({
                width: 'resolve',
                ajax: {
                    url: "{{route('drugs')}}",
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
                        var data = $.map(data.drugs, function (obj) {
                            obj.text = obj.text || obj.name; // replace name with the property used for the text
                            return obj;
                        });
                        return {
                            results: data
                        };
                    }
                }
            })
    
        
    </script>
    <script>
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
        $(".select-body").on('click', '.trash', function() {
            $(this).closest('.new-row').remove();
            return false;
        });
    $(document).on('click',".select-row", function() {
        var regcontent = '<tr class="new-row">' +
            '<td>' +
            ' <select name="item_id[]" class="select-remote form-control w-100">' +
                                                                                        
            '</select>' +
            '</td>' +
            '<td class="text-center select-row pl-0 pr-0">' +
            '  <input type="number" name="" id="" class="table-input">' +
            '</td>' +
            '<td class="text-center pl-0 pr-0">' +
            '<input type="number" name="" id="" class="table-input">' +
            '</td>' +
            '<td class="text-right">$100</td>' +
            '<td>' +
            '<a href="#" class="btn btn-danger trash table-trash"><i class="far fa-trash-alt"></i></a>' +
            '</td>' +
            '</tr>';
            $(".select-body").append(regcontent);
            $('.select-remote:last').select2({
                width: 'resolve',
                ajax: {
                    url: "{{route('drugs')}}",
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
                        var data = $.map(data.drugs, function (obj) {
                            obj.text = obj.text || obj.name; // replace name with the property used for the text
                            return obj;
                        });
                        return {
                            results: data
                        };
                    }
                }
            });
        return false;
    });
    </script>
@endpush
