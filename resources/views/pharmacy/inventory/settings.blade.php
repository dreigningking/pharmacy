@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">
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
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                <div class="card widget-profile pat-widget-profile">
                    <div class="card-body">
                        <div class="pro-widget-content pb-0">
                            <div class="profile-info-widget">
                                <a href="#" >
                                    <img src="{{Storage::url('pharmacies/logos/'.$pharmacy->image)}}" class="img-fluid" alt="User Image">
                                </a>
                                <div class="profile-det-info mt-3">
                                    <h3>{{$pharmacy->name}}</h3>
                                    
                                    <div class="patient-details">
                                        <h5>Inventory Settings</h5>
                                        {{-- <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, United States</h5> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-widget">
                        <nav class="dashboard-menu">
                            <ul class="nav nav-tabs d-block">
                                <li class="nav-item">
                                    <a href="#basic" class="nav-link active" data-toggle="tab">
                                        <i class="fas fa-cog"></i>
                                        <span>Basic</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="#suppliers" class="nav-link" data-toggle="tab">
                                        <i class="fas fa-users"></i>
                                        <span>Suppliers</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#upload" class="nav-link" data-toggle="tab">
                                        <i class="fas fa-upload"></i>
                                        <span>Upload</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
                @if(session('flash_message'))
                    @include('layouts.main.flash')
                @endif
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tab-content pt-0">
                            <div class="tab-pane fade show active" id="basic">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Basic Settings</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('pharmacy.settings.others',$pharmacy)}}" method="POST">@csrf  
                                            <input type="hidden" name="pharmacy_id" value="{{$pharmacy->id}}">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="" class="text-muted">Markup</label>
                                                        <div class="input-group">
                                                            <input type="number" name="mark_up" value="{{$pharmacy->mark_up}}" class="form-control">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                            
                                                        </div>
                                                        <small>This will be applied when product markup is not set</small>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label class="text-muted">Stock Levels</label>
                                                        <div class="d-flex">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Min</span>
                                                                </div>
                                                                <input type="number" name="minimum_stocklevel" value="{{$pharmacy->minimum_stocklevel}}" class="form-control rounded-0">
                                                            </div>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Max</span>
                                                                </div>
                                                                <input type="number" name="maximum_stocklevel" value="{{$pharmacy->maximum_stocklevel}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <small>This will be applied when product stock limit is not set</small>
                                                    </div>                                                  
                                                    <div class="form-group">
                                                        <label class="text-muted">Expiry Alert</label>
                                                        <div class="input-group">
                                                            <input type="number" min="1" name="expiry_alert_weeks" value="{{$pharmacy->expiry_alert_weeks}}" class="form-control" placeholder="2">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Weeks Before Expiry</span>
                                                            </div>
                                                        </div>
                                                        <small>This will be applied when product expiry alert is not set</small>
                                                    </div>
                                                </div> 
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Shelves</label>
                                                        <input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="e.g ABC,PQR," name="shelves" value="{{$pharmacy->shelves}}" id="services">
                                                        <small class="form-text text-muted">Note : Deleting a shelf will not delete items on the shelf, but items will not be shelved</small>
                                                    </div> 
                                                    <div class="form-group mb-0">
                                                        <label>Non Drug Categories </label>
                                                        <input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="e.g Baby Things,Drinks," name="categories" value="{{$pharmacy->categories}}" id="specialist">
                                                        <small class="form-text text-muted">Note : Deleting a category will not delete items in the category, but items will not be categorized</small>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="submit-section submit-btn-bottom mt-4">
                                                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                                    </div>    
                                                </div>   
                                            </div>                                              
                                            
                                        </form>
                                    </div>
                                </div>
                            </div> 
                            <div class="tab-pane fade" id="suppliers">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Suppliers</h4>
                                    </div>
                                    <div class="card-body">
                                        {{-- <input type="hidden" name="pharmacy_id" value="{{$pharmacy->id}}">    --}}
                                        <form action="{{route('pharmacy.inventory.suppliers',$pharmacy)}}" class="w-100" method="POST">@csrf
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">  
                                                        <label class="text-muted text-center">Name</label>                                        
                                                        <input type="text" id="supplier_name" name="name" placeholder="First and Last Name" class=" form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">  
                                                        <label class="text-muted text-center">Email</label>                                        
                                                        <input type="email" id="supplier_email" name="email" placeholder="Email Address" class=" form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">  
                                                        <label class="text-muted text-center">Phone</label>                                        
                                                        <input type="text" id="supplier_mobile" name="mobile" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">  
                                                        <label class="text-muted text-center">Location</label>                                        
                                                        <input type="text" id="supplier_location" name="location" placeholder="e.g Address, City, State " class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mt-4">
                                                        <button type="submit" class="btn btn-lg btn-info btn-block" id="supplier_button">Save Supplier</button>  
                                                    </div> 
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                        </form>    
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr> 
                                                        <th>#</th> 
                                                        <th>Name</th> 
                                                        <th>Email</th> 
                                                        <th>Phone</th> 
                                                        <th>Location</th> 
                                                        <th>Actions</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pharmacy->suppliers as $supplier)
                                                        <tr> 
                                                            <td> {{$loop->iteration}} </td>
                                                            <td> {{$supplier->name}} </td>
                                                            <td> {{$supplier->email}} </td>
                                                            <td> {{$supplier->mobile}} </td>
                                                            <td> {{$supplier->location}} </td>
                                                            <td> 
                                                                <div class="d-flex">
                                                                    <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary edit-supplier" data-supplier_email="{{$supplier->email}}" data-supplier_mobile="{{$supplier->mobile}}" data-supplier_name="{{$supplier->name}}" data-supplier_location="{{$supplier->location}}"> <i class="fa fa-pen"></i></a>  
                                                                    <form action="{{route('pharmacy.inventory.suppliers',$pharmacy)}}" class="d-inline" method="POST" onsubmit="return confirm('Are you want you want to delete supplier')">@csrf
                                                                        <input type="hidden" name="supplier_id" value="{{$supplier->id}}">
                                                                        <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                                                    </form>
                                                                </div>
                                                            </td> 
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div> 
                                    </div>
                                </div>
                            </div> 
                            <div class="tab-pane fade" id="upload">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Upload</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h3 class="card-title d-flex justify-content-between">
                                                            <span>Non Drug Upload Instructions</span> 
                                                            {{-- <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a> --}}
                                                        </h3>
                                                        <p class="text-muted mb-0 mb-sm-3">Uploading from excel is simple. Prepare the document in the following format:</p>
                                                        <p class="text-muted mb-0 mb-sm-3">Create an excel file and name it <span class="font-weight-bold">inventory.xls</span> (i.e with excel extension) </p>
                                                        <p class="text-muted mb-0 mb-sm-3">Create the content in the format below. Take note of the table headers that they are written in small textcases </p>
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th>name</th>
                                                                <th>category</th>
                                                                <th>shelf</th>
                                                                <th>unit_cost</th>
                                                                <th>unit_price</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Pampas</td>
                                                                <td>Baby Things</td>
                                                                <td>XYZ</td>
                                                                <td>20</td>
                                                                <td>30</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Coca Cola</td>
                                                                <td>Drinks</td>
                                                                <td>Consumables</td>
                                                                <td>10</td>
                                                                <td>15</td>
                                                            </tr>
                                                        </table>
                                                        <div class="my-3">
                                                            <form class="row" action="{{route('pharmacy.inventory.import',$pharmacy)}}" method="POST" enctype="multipart/form-data">@csrf
                                                                <div class="col-md-6">
                                                                    <a href="#"><u>Download example file format</u> </a>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="hidden" name="pharmacy_id" value="{{$pharmacy->id}}">
                                                                    <div class="input-group">
                                                                        <label class="p-2 input-group-prepend">Upload File</label>
                                                                        <input type="file" name="inventories" class="form-control" required accept=".xlsx,.xls">
                                                                        <div class="input-group-append">
                                                                            <button type="submit" class="btn btn-primary">Upload</button>
                                                                        </div>
                                                                    </div>
                                                                    
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
                            
                        </div>
                    </div>
                    <!-- /Page Wrapper -->
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /Page Content -->

@endsection


@push('scripts')
<script src="{{asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
    <script>
        $(document).ready(function ($) {
            let selectedTab = window.location.hash;
            $('.nav-link[href="' + selectedTab + '"]' ).trigger('click');
            $('.nav-link[href="' + selectedTab + '"]' ).addClass('active');
        })

        $('.edit-supplier').on('click',function(){
            $('#supplier_name').val($(this).attr('data-supplier_name'))
            $('#supplier_email').val($(this).attr('data-supplier_email'))
            $('#supplier_mobile').val($(this).attr('data-supplier_mobile'))
            $('#supplier_location').val($(this).attr('data-supplier_location'))
            $('#supplier_button').text('Update');
        })

                                                    
    </script>
@endpush