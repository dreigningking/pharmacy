@extends('layouts.main.app')
@push('styles')

<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
@endpush
@section('main')
    
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Search</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">{{$drugs->count()}} count of drugs</h2>
                </div>
                <div class="col-md-4 col-12 d-md-block d-none">
                    <div class="sort-by">
                        <span class="text-white">If you didnt find list of drugs you sell:</span>
                        <button class="btn btn-info">Upload</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
                
                    <!-- Search Filter -->
                    <div class="card search-filter">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Search Filter</h4>
                        </div>
                        <div class="card-body">
                            <form action="#" method="GET">
                                <div class="filter-widget">
                                    <div class="">
                                        <input type="text" name="search" class="form-control" placeholder="Drug Name">
                                    </div>		
                                </div>
                                <div class="filter-widget">
                                    <div class="">
                                        <input type="text" name="manufacturer" class="form-control" placeholder="Manufacturer">
                                    </div>			
                                </div>
                            
                                <div class="filter-widget">
                                    <h4>Category</h4>
                                    @foreach ($categories as $category)
                                        <div>
                                            <label class="custom_check">
                                                <input type="checkbox" name="categories[]" value="{{$category->id}}" checked>
                                                <span class="checkmark"></span> {{$category->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="filter-widget">
                                    <h4>Show Drugs in Inventory</h4> 
                                    <div>
                                        <label class="custom_check">
                                            <input type="checkbox" name="hide_inventory_drugs" value="1" @if($hide_inventory_drugs) checked @endif>
                                            <span class="checkmark"></span> Hide
                                        </label>
                                    </div>
                                </div>
                                <div class="btn-search">
                                    <button type="submit" class="btn btn-block">Search</button>
                                </div>	
                            </form>
                        </div>
                    </div>
                    <!-- /Search Filter -->
                    
                </div>
                
                <div class="col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Drugs to Inventory</h4>
                        </div>
                        <div class="card-body">
                            <form  action="{{route('pharmacy.inventory.store.many', $pharmacy)}}" method="POST">@csrf
                                
                                <button type="submit"  class="btn btn-secondary mb-3">Add to Inventory </button>
                            
                                <div class="table-responsive">
                                    
                                    <table class="table table-hover table-bordered table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th> 
                                                    <label class="custom_check">
                                                        <input type="checkbox" id="checkbox_master" value="" >
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>Drug Name</th>
                                                <th>Category</th>
                                                <th>Manufacturer</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($drugs->sortBy('name') as $drug)
                                            <tr>
                                                <td> 
                                                    <label class="custom_check">
                                                        <input type="checkbox" class="checkboxes" name="drug_id[]" value="{{$drug->id}}">
                                                        <input type="hidden" name="category[{{$drug->id}}]" value="{{$drug->category->name}}">
                                                        <input type="hidden" name="name[{{$drug->id}}]" value="{{$drug->name}}">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>{{$drug->name}}</td>
                                                <td>{{$drug->category->name}}</td>
                                                <td>{{$drug->manufacturer}}</td>  
                                                <td>
                                                    @if($drug->pharmacyInventory($pharmacy->id))
                                                        <span class="">Exist in Inventory</span>
                                                    @endif
                                                </td>  
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit"  class="btn btn-secondary mb-3">Add to Inventory </button>
                                @include('layouts.pagination',['data'=> $drugs])
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>		
			
@endsection
@push('scripts')

<script src="{{asset('adminassets/js/script.js')}}"></script>

@endpush