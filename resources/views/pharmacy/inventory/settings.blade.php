@extends('layouts.main.app')
@push('styles')
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
                                        <h5>Inventory</h5>
                                        {{-- <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, United States</h5> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-widget">
                        <nav class="dashboard-menu">
                            <ul class="nav nav-tabs d-block">
                                <li>
                                    <a href="#basic" class="active" data-toggle="tab">
                                        <i class="fas fa-columns"></i>
                                        <span>Basic</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#past_med_history" data-toggle="tab">
                                        <i class="fas fa-user-injured"></i>
                                        <span>Shelves</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#current_med_history" data-toggle="tab">
            
                                        <i class="fas fa-pen"></i>
                                        <span>Categories</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#family_social_history" data-toggle="tab">
                                        <i class="fas fa-user"></i>
                                        <span>Suppliers</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tab-content pt-0">
                            <div class="tab-pane fade show active" id="basic">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Basic Settings</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="#" method="POST">  
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row my-4">
                                                        <p class="col-sm-3 text-muted">Currency</p>
                                                        <div class="col-sm-7">
                                                            <select name="" id="" class="form-control">
                                                                <option value="">Naira</option>
                                                                <option value="">Dollars</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="row my-4">
                                                        <p class="col-sm-3 text-muted">Package Type</p>
                                                        <div class="col-sm-7">
                                                            <select name="" id="" class="form-control">
                                                                <option value="">Cartons</option>
                                                                <option value="">Sachets</option>
                                                                <option value="">Packs</option>
                                                                <option value="">Cards</option>
                                                                <option value="">Pills & Bottles</option>
                                                            </select>
                                                        </div>
                                                    </div>    --}}
                                                    <div class="row my-3">
                                                        <p class="col-md-3 text-muted  mb-0 mb-sm-3">Markup</p>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <input type="number" class="form-control">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="row my-3">
                                                        <p class="col-md-3 text-muted  mb-0 mb-sm-3">Stock Level</p>
                                                        <div class="col-md-7">
                                                            <div class="row no-gutters">
                                                                <div class="col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Min</span>
                                                                        </div>
                                                                        <input type="number" class="form-control rounded-0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Max</span>
                                                                        </div>
                                                                        <input type="number" class="form-control">
                                                                    </div>
                                                                </div>
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row my-3">
                                                        <p class="col-md-3 text-muted  mb-0 mb-sm-3">Restock</p>
                                                        <div class="col-md-8 form-group mb-0">
                                                            <select name="" id="" class="form-control">
                                                                <option value="">Manual Upload</option>
                                                                <option value="">Via Supplier Purchase</option>
                                                                
                                                            </select>
                    
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row my-3">
                                                        <p class="col-md-3 text-muted  mb-0 mb-sm-3">Expiry Alert</p>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <input type="number" min="0" class="form-control" placeholder="2">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Weeks Before Expiry</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div> 
                                                <div class="col-md-6 ">
                                                    <div class="row my-3">
                                                        <div class="col-12 text-muted mb-3">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" id="price_custom" name="rating_option" value="custom_price" class="custom-control-input">
                                                                <label class="custom-control-label" for="price_custom">Notify on stock level limits</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-muted mb-3">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" id="price_custom" name="rating_option" value="custom_price" class="custom-control-input">
                                                                <label class="custom-control-label" for="price_custom">Notify on stock expiry</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-muted mb-3">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                                <label class="custom-control-label" for="autodelete">Auto-Delete expired batch items</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-muted mb-3">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" id="autodelete" name="rating_option" value="custom_price" class="custom-control-input">
                                                                <label class="custom-control-label" for="autodelete">Allow Transfer of Items</label>
                                                            </div>
                                                        </div>
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
                            <div class="tab-pane fade" id="past_med_history">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Shelves</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="#" class="w-100" method="POST">@csrf
                                            <div class="row w-100">
                                                <div class="col-md-4">
                                                    <div class="form-group">  
                                                        <label class="text-muted text-center">Name</label>                                        
                                                        <input type="text" name="medical_history" placeholder="e.g A1" class=" form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-md btn-info btn-block" name="action" value="save">Save</button>  
                                                    </div> 
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr> <th>Name</th> <th>Items</th> <th>Actions</th> </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr> <td> ABC </td><td>20</td> <td>Edit | Delete</td> </tr>
                                                                <tr> <td> XYZ </td><td>20</td> <td>Edit | Delete</td> </tr>
                                                                <tr> <td> PQR </td><td>20</td> <td>Edit | Delete</td> </tr>
                                                            </tbody>
                                                        </table>
                                                    </div> 
                                                </div>
                                                
                                               
        
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="current_med_history">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Categories</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="#" class="w-100" method="POST">@csrf
                                            <div class="row w-100">
                                                <div class="col-md-4">
                                                    <div class="form-group">  
                                                        <label class="text-muted text-center">Name</label>                                        
                                                        <input type="text" name="medical_history" placeholder="e.g First Aid" class=" form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-md btn-info btn-block" name="action" value="save">Save</button>  
                                                    </div> 
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr> <th>Name</th> <th>Items</th> <th>Actions</th> </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr> <td> First Aid </td><td>20</td> <td>Edit | Delete</td> </tr>
                                                                <tr> <td> First Aid </td><td>20</td> <td>Edit | Delete</td> </tr>
                                                                <tr> <td> First Aid </td><td>20</td> <td>Edit | Delete</td> </tr>
                                                            </tbody>
                                                        </table>
                                                    </div> 
                                                </div>
                                                
                                               
        
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="family_social_history">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Suppliers</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="#" class="w-100" method="POST">@csrf
                                            <div class="row w-100">
                                                <div class="col-md-4">
                                                    <div class="form-group">  
                                                        <label class="text-muted text-center">Name</label>                                        
                                                        <input type="text" name="medical_history" placeholder="e.g A1" class=" form-control">
                                                    </div>
                                                    <div class="form-group">  
                                                        <label class="text-muted text-center">Email</label>                                        
                                                        <input type="email" name="medical_history" placeholder="Email Address" class=" form-control">
                                                    </div>
                                                    <div class="form-group">  
                                                        <label class="text-muted text-center">Phone</label>                                        
                                                        <input type="text" name="medical_history" class=" form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-md btn-info btn-block" name="action" value="save">Save</button>  
                                                    </div> 
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr> <th>Name</th> <th>Items</th> <th>Actions</th> </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr> <td> ABC </td><td>20</td> <td>Edit | Delete</td> </tr>
                                                                <tr> <td> XYZ </td><td>20</td> <td>Edit | Delete</td> </tr>
                                                                <tr> <td> PQR </td><td>20</td> <td>Edit | Delete</td> </tr>
                                                            </tbody>
                                                        </table>
                                                    </div> 
                                                </div>
                                                
                                               
        
                                            </div>
                                        </form>
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
    <script>
        $(document).on('click',".add_condition", function() {
            
            var condition = ` 
                                <div class="row my-4 condition">
                                    <div class="col-md-5">
                                        <div class="form-group">  
                                            <label class="text-muted text-center">Previous Medical Condition</label>                                        
                                            <select name="previous_history['condition']" placeholder="Condition name" class="select form-control">
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">  
                                            <label class="text-muted text-center">When did it happen</label>    
                                            <div class="input-group">
                                                <input type="month" name="previous_history['year']" placeholder="Year. e.g 2023" class="form-control">
                                            </div>                                    
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                            <button type="button" class="btn btn-primary add_condition" title="add more"><i class="fa fa-plus"></i></button>
                                    </div>
                                    <div class="col-md-12 medications">
                                        <div class="row med mb-1">
                                            <div class="col-md-4">
                                                <select name="previous_history['medicine']" placeholder="Medication used" class="select form-control-sm"> 
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-3 pt-2">
                                                <label for="d-block">Effective?</label>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="yes" name="previous_history['medicine_effectiveness']" value="custom_price" class="custom-control-input">
                                                    <label class="custom-control-label" for="yes">Yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="no" name="previous_history['medicine_effectiveness']" value="custom_price" class="custom-control-input">
                                                    <label class="custom-control-label" for="no">No</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-sm btn-info add_medication" title="add more"><i class="fa fa-plus"></i></button>
                                                <button type="button" class="btn btn-sm btn-danger remove_medication" title="remove"><i class="far fa-trash-alt"></i></button>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            `;

            $("#medical_conditions").append(condition);
        });
        $(document).on('click',".add_medication", function() {
            var medication = ` 
                                <div class="col-md-12 medications">
                                    <div class="row med mb-1">
                                        <div class="col-md-4">
                                            <select name="previous_history['medicine']" placeholder="Medication used" class="select form-control-sm"> 
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-3 pt-2">
                                            <label for="d-block">Effective?</label>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="yes" name="previous_history['medicine_effectiveness']" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="yes">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="no" name="previous_history['medicine_effectiveness']" value="custom_price" class="custom-control-input">
                                                <label class="custom-control-label" for="no">No</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-sm btn-info add_medication" title="add more"><i class="fa fa-plus"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger remove_medication" title="remove"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            `;

            $(this).closest(".medications").append(medication);
        });
        $(document).on('click', '.remove_condition', function() {
            $(this).closest('.condition').remove();
        });
        $(document).on('click', '.remove_medication', function() {
            $(this).closest('.med').remove();
        });

    

                                                    
    </script>
@endpush