@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<style>
    .no_select_border span.select2-selection.select2-selection--single{
        border:0px !important;
    }
    span.select2-selection.select2-selection--single{
        height:46px;
        padding-top:10px;
        padding-bottom:10px;
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
                                                        <p class="invoice-details">
                                                            <strong>Order:</strong> #00124 <br>
                                                            <strong>Issued:</strong> 20/07/2019
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
                                                                Dr. Darren Elder <br>
                                                                806  Twin Willow Lane, Old Forge,<br>
                                                                Newyork, USA <br>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="invoice-info invoice-info2">
                                                            <a href="#add_supplier" data-toggle="modal" class="text-info"><u>Add new</u></a>
                                                            <div class="customer-text d-inline mx-2"><bold>Supplier</bold></div>
                                                            <p class="invoice-details no_select_border">
                                                                <select name="supplier_id" id="supplier_select" class="select form-control">
                                                                    @forelse ($suppliers as $supplier)
                                                                        <option value="{{$supplier->id}}" >{{$supplier->name}}</option>
                                                                    @empty
                                                                    <option disabled>No Supplier</option>
                                                                    @endforelse
                                                                    
                                                                </select> 
                                                                {{-- <br> --}}
                                                                299 Star Trek Drive, Panama City, <br>
                                                                Florida, 32405, USA <br>
                                                            </p>
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
                                                                Walter Roberson <br>
                                                                299 Star Trek Drive, Panama City, <br>
                                                                Florida, 32405, USA <br>
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
                                                            <table class="invoice-table table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="d-flex justify-content-between"><span>Description</span> <a data-toggle="modal" href="#add_drug" class="font-weight-normal text-info"><u>Add New Item</u></a></th>
                                                                        <th class="text-center">Unit Cost</th>
                                                                        <th class="text-center">Qty</th>
                                                                        <th class="text-right">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <select name="item_id" class="select form-control">
                                                                                <option>Biscuit</option>
                                                                                <option>Sweet</option>
                                                                                <option>Chocolate</option>
                                                                                <option>Pringles</option>
                                                                                <option>Popcorn</option>
                                                                                <option>Cheese Balls</option>
                                                                                <option>Ice Cream</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center">$0</td>
                                                                        <td class="text-center">1</td>
                                                                        <td class="text-right">$100</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <select name="item_id" class="select form-control">
                                                                                <option>Biscuit</option>
                                                                                <option>Sweet</option>
                                                                                <option>Chocolate</option>
                                                                                <option>Pringles</option>
                                                                                <option>Popcorn</option>
                                                                                <option>Cheese Balls</option>
                                                                                <option>Ice Cream</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center">$0</td>
                                                                        <td class="text-center">1</td>  
                                                                        <td class="text-right">$250</td>
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
                                                                    <td><span>$350</span></td>
                                                                </tr>
                                                                {{-- <tr>
                                                                    <th>Discount:</th>
                                                                    <td><span>-10%</span></td>
                                                                </tr> --}}
                                                                <tr>
                                                                    <th>Total Amount:</th>
                                                                    <td><span>$315</span></td>
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
@endpush