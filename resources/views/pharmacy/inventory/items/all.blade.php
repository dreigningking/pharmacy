@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
<style>
    .select2-container .select2-selection--single{
        height:46px;
        border:1px solid #ced4da;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 40px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        position:absolute;
        top: 10px!important;
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
                        <li class="breadcrumb-item active" aria-current="page">Inventory</li>
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
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                <div class="card search-filter">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Search Inventory</h3>
                    </div>
                    <div class="card-body">
                        <form action="#" method="get">
                            <div class="filter-widget">
                                <h4>Filter Name</h4>	
                                <input type="text" name="search" value="{{$search}}" class="form-control" placeholder="">	
                            </div>
                            
                            
                            <div class="filter-widget">
                                <h4>Filter Type</h4>
                                <div>
                                    <select name="type" class="form-control">
                                        <option value="both" @if($type == 'both') selected @endif>Both</option>
                                        <option value="drugs" @if($type == 'drugs') selected @endif> Drugs</option>
                                        <option value="non-drugs" @if($type == 'non-drugs') selected @endif> Non-Drugs</option>
                                       
                                    </select>
                                </div>
                                
                            </div>
                            
                                                        
                            <div class="filter-widget">
                                <h4>Status</h4>
                                <div>
                                    <select name="show" class="form-control">
                                        <option value="all" @if($show == 'all') selected @endif>All Items</option>
                                        <option value="out_of_stock" @if($show == 'out_of_stock') selected @endif> Out of Stock</option>
                                        <option value="over_stock" @if($show == 'over_stock') selected @endif> Over Stocked</option>
                                        <option value="under_stock" @if($show == 'under_stock') selected @endif> Under Stocked</option>
                                    </select>
                                </div>
                                
    
                            </div>
                            
                            <div class="btn-search">
                                <button type="submit" class="btn btn-block">Search</button>
                            </div>	
                        </form>
                    </div>
                    
                    
                </div>
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <div>
                                        <a class="btn btn-dark" href="{{route('pharmacy.inventory.create',$pharmacy)}}">New Item</a>
                                    </div>
                                    
                                </div>
                                <div class="d-flex justify-content-around my-2">
                                    <table>
                                        <tr>
                                            <td colspan="2" class="text-center">Selected:   <span id="checkedcount">0</span></td>
                                        </tr>
                                        <tr>
                                            <td> <button class="btn btn-outline-dark actionbuttons disabled" id="purchase" disabled>Purchase <i class="fa fa-shopping-cart"></i></button></td>
                                            <td> <button class="btn btn-secondary actionbuttons disabled" id="transfer" disabled>Transfer <i class="fa fa-arrow-right"></i> </button></td>
                                            {{-- <td> <button class="btn btn-outline-dark actionbuttons disabled" id="download" disabled>Download <i class="fa fa-download"></i></button></td> --}}
                                            
                                            
                                        </tr>
                                    </table>
                                </div>
                                <form id="submitInventory" action="#" method="POST">@csrf
                                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 40%">
                                                        
                                                        <div>
                                                            <label class="custom_check">
                                                                <input type="checkbox" id="header_input" name="gender_type">
                                                                <span class="checkmark"></span>
                                                            </label>Item
                                                        </div>
                                                    </th>
                                                    <th style="width:15%">Shelf </th>                            
                                                    <th>Available </th>
                                                    <th>Unit Cost </th>
                                                    <th>Unit Price</th>
                                                    <th>View</th>   
                                                </tr>
                                            </thead>
                                            <tbody>                                              
                                                @forelse ($items->sortBy('name') as $item)
                                                    <tr>
                                                        <td>
                                                            
                                                            <div>
                                                                <label class="custom_check">
                                                                    <input type="checkbox" class="checkboxes" name="inventories[]" value="{{$item->id}}">
                                                                    <span class="checkmark"></span>
                                                                    {{$item->name}} 
                                                                    <small class="d-block">@if($item->drug_id) Drug @else Others @endif | 
                                                                        @switch($item->stock_status)
                                                                            @case('out of stock')
                                                                            <span class="badge badge-pill bg-danger-light">Out of Stock</span>
                                                                            @break
                                                                            @case('overstocked')
                                                                            <span class="badge badge-pill bg-danger-light">{{$item->maximum_stocklevel}} Over Stocked</span>
                                                                            @break 
                                                                            @case('understocked')
                                                                            <span class="badge badge-pill bg-danger-light">Under Stocked</span>
                                                                            @break
                                                                            @default
                                                                            <span class="badge badge-pill bg-success-light">In Stock</span>
                                                                        @endswitch
                                                                    </small>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>{{$item->shelf}}</td>        
                                                        <td>
                                                            {{$item->available}} 
                                                        </td>   
                                                        <td>{{$item->unit_cost}}</td>   
                                                        <td>{{$item->unit_price}}</td> 
                                                        <td class="text-right">
                                                            <div class="table-action">
                                                                <a href="{{route('pharmacy.inventory.show',[$pharmacy,$item])}}" class="btn btn-sm bg-primary-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                                
                                                            </div>
                                                        </td>
                                                        
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">
                                                            No Item in Inventory
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                     @include('layouts.pagination',['data'=> $items])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->

@endsection
<!-- Add Staff Modal -->
@section('modals')

{{-- <div class=" modal fade custom-modal add-modal" id="upload">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Drug Details
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <small>You are required to have filled the downloaded inventory sheets with all the items parameters such
                                    as item name, unit cost, unit price, shelves (optional) and category (optional),
                                </small>
                                <div class="mt-3">
                                    <div class="change-avatar justify-content-center">
                                        <div class="">
                                            <div class="d-flex">
                                                <input type="file" class="upload"><button class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
                                            </div>
                                            <small class="form-text text-muted">Allowed XLS, XLXS. Max size of 2MB</small>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> 

<div class=" modal fade custom-modal add-modal" id="items">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Item
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="appointment-tab">

                    <!-- Appointment Tab -->
                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                        <li class="nav-item">
                            <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Drugs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#today-appointments" data-toggle="tab">Non Drugs</a>
                        </li> 
                    </ul>
                    <!-- /Appointment Tab -->
                    
                    <div class="tab-content border border-grey">
                    
                        <!-- Upcoming Appointment Tab -->
                        <div class="tab-pane active" id="upcoming-appointments">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <form action="{{route('pharmacy.inventory.store', $pharmacy)}}" class="w-100" method="POST">@csrf
                                        <div class="row w-100">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label d-flex justify-content-between"><span>Drug</span>
                                                        <a href="{{route('pharmacy.inventory.drugs', $pharmacy)}}"> 
                                                            <u>Click here to add many at once</u> 
                                                        </a>
                                                    </label>
                                                    <select type="text" class="select-remote w-100" style="width:100%" name="drug_id">

                                                    </select>
                                                    <input type="hidden" id="drug_name" name="name">
                                                </div>
                                            </div>   
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="form-label">Category</label>
                                                    <input type="text" class="form-control" readonly id="drug_category" name="category">
                                                </div>
                                            </div>  
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="form-label">Shelf</label>
                                                    <select class="form-control" name="shelf">
                                                        <option value="">Select Shelf</option>
                                                        @foreach (explode(',',$pharmacy->shelves) as $shelf)
                                                                <option value="{{$shelf}}">{{$shelf}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>     
                                                       
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="form-label">Unit Cost</label>
                                                    <input type="number" class="form-control" name="unit_cost" value="">
                                                </div>
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Unit Price</label>
                                                    <input type="number" class="form-control" name="unit_price" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Unit of Sales</label>
                                                    <select name="unit_of_sales" class="form-control">
                                                        <option value="">Select Unit</option>
                                                        <option value="pill">Pill</option>
                                                        <option value="bottle">Bottle</option>
                                                        <option value="sachet">Sachet</option>
                                                        <option value="packet">Packet</option>
                                                        <option value="carton">Carton</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="form-label">Minimum Stock</label>
                                                    <input type="number" class="form-control" name="minimum_stocklevel">
                                                </div>
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Maximum Stock</label>
                                                    <input type="number" class="form-control" name="maximum_stocklevel">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Alert Expiry</label>
                                                    <input type="number" class="form-control" name="expiry_alert_weeks" placeholder="Weeks before expiry">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group mt-2">
                                                    <br>
                                                    <button type="submit" class="btn btn-md btn-info" name="action" value="save">Save</button>
                                                </div>
                                            </div> 
                
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Upcoming Appointment Tab -->
                    
                        <!-- Today Appointment Tab -->
                        <div class="tab-pane show" id="today-appointments">
                            <div class="card mb-0">
                                <div class="card-body">
                                <form action="{{route('pharmacy.inventory.store', $pharmacy)}}" class="w-100" method="POST">@csrf
                                        <div class="row w-100 mr-0">
                                            <div class="col-md-12 d-flex justify-content-end">
                                                <a href="{{route('pharmacy.inventory.settings',$pharmacy)}}#upload"> 
                                                    <u>Upload many at once</u> 
                                                </a>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                            </div>   
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-control" name="category">
                                                        <option value="">Select Category</option>
                                                        @foreach (explode(',',$pharmacy->categories) as $category)
                                                            <option value="{{$category}}">{{$category}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>    
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="form-label">Shelf</label>
                                                    <select class="form-control" id="gender" name="shelf">
                                                        <option value="">Select Shelf</option>
                                                        @foreach (explode(',',$pharmacy->shelves) as $shelf)
                                                            <option value="{{$shelf}}">{{$shelf}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>     
                                                       
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="form-label">Unit Cost</label>
                                                    <input type="number" class="form-control" name="unit_cost" value="">
                                                </div>
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Unit Price</label>
                                                    <input type="number" class="form-control" name="unit_price" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Unit of Sales</label>
                                                    <select name="unit_of_sales" class="form-control">
                                                        <option value="">Select Unit</option>
                                                        <option value="pill">Pill</option>
                                                        <option value="bottle">Bottle</option>
                                                        <option value="sachet">Sachet</option>
                                                        <option value="packet">Packet</option>
                                                        <option value="carton">Carton</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="form-label">Minimum Stock</label>
                                                    <input type="number" class="form-control" name="minimum_stocklevel">
                                                </div>
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Maximum Stock</label>
                                                    <input type="number" class="form-control" name="maximum_stocklevel">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Alert Expiry</label>
                                                    <input type="number" class="form-control" name="expiry_alert_weeks" placeholder="Weeks before expiry">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mt-2">
                                                    <br>
                                                    <button type="submit" class="btn btn-md btn-info" name="action" value="save">Save</button>
                                                </div>
                                            </div> 
                
                                        </div>
                                    </form>
                                </div>	
                            </div>	
                        </div>
                        <!-- /Today Appointment Tab -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
@endsection

@push('scripts')
<script src="{{asset('adminassets/js/script.js')}}"></script>
<script>

    $('#header_input').on('click',function(){
        if($(this).is(':checked')){
            $('.checkboxes').prop('checked', this.checked);
            updateCounter()
        } 
        else{   
            $('.checkboxes').prop('checked', false);
            updateCounter()
        }       
    })
    $('.checkboxes').on('change',function(){
        updateCounter()
    })
    function updateCounter(){
        let num = $('.checkboxes:checked').length
        if(num)
            $('.actionbuttons').removeClass('disabled').prop('disabled',false)
        else
            $('.actionbuttons').addClass('disabled').prop('disabled',true)
        $('#checkedcount').text(num)
    }
    $('#transfer').on('click',function(){
        let clicked = []
        $('.checkboxes:checked').each(function(){
            clicked.push($(this).val());
        });
        $('#submitInventory').attr('action',"{{route('pharmacy.transfer.create',$pharmacy)}}").submit();
        
    })
    $('#purchase').on('click',function(){
        let clicked = []
        $('.checkboxes:checked').each(function(){
            clicked.push($(this).val());
        });
        $('#submitInventory').attr('action',"{{route('pharmacy.purchases.create',$pharmacy)}}").submit();
        
    })

</script>

@endpush