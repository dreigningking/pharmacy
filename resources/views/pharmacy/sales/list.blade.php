@extends('layouts.main.app')
@push('styles')

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
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                <div class="card search-filter">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Search Filter</h3>
                    </div>
                    <div class="card-body">
                        <div class="filter-widget">
                            <h4>Item</h4>			
                        </div>
                        <div class="filter-widget">
                            <input type="text" class="form-control" placeholder="Name or Batch">		
                        </div>
                        {{-- <div class="filter-widget">
                            <h4>Complaint/Diagnosis</h4>			
                        </div>
                        <div class="filter-widget">
                            <input type="text" class="form-control" placeholder="e.g Headache, High Blood Pressure">		
                        </div> --}}
                        <div class="filter-widget">
                            <h4>Date Range</h4>			
                        </div>
                        <div class="filter-widget">
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" placeholder="From Date">
                            </div>			
                        </div>
                        <div class="filter-widget">
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" placeholder="To Date">
                            </div>			
                        </div>
                        <div class="filter-widget">
                            <h4>Status</h4>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type" checked>
                                    <span class="checkmark"></span> Awaiting Diagnosis
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type" checked>
                                    <span class="checkmark"></span> Ongoing Treatment
                                </label>
                            </div> 
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type" checked>
                                    <span class="checkmark"></span> Awaiting Followup
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type" checked>
                                    <span class="checkmark"></span> Completed
                                </label>
                            </div> 
                            
                        </div>
                        <div class="filter-widget">
                            <h4>Drug Administered</h4>
                            <div>
                                <select class="form-control">
                                    <option>Anti-Malaria</option>
                                    <option>Anti-Bacteria</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-widget">
                            <h4>Staff</h4>
                            <div>
                                <select class="form-control">
                                    <option>Dr Lewis</option>
                                    <option> Mr Emmanuel</option>
                                </select>
                            </div>
                            
                        </div>
                    
                        <div class="btn-search">
                            <button type="button" class="btn btn-block">Search</button>
                        </div>	
                        
                    </div>
                    {{-- <div class="card-body">
                        <div class="clinic-booking">
                            <a class="apt-btn" href="booking.html">View Subscription Plans</a>
                        </div>
                    </div> --}}
                    
                </div>
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <h3>Sales</h3>
                                    <a class="btn btn-primary btn-lg"
                                        href="{{route('pharmacy.sales.create',$pharmacy)}}">New
                                        Sale</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-center">
                                        <thead class="th-dark">
                                            <tr>
                                                <th>Date</th>
                                                <th>Invoice No</th>
                                                
                                                <th>Items</th>  
                                                <th>Total Amount</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap">14-Nov-2019 </td>
                                                <td>
                                                    USK3834
                                                </td>
                                                
                                                
                                                <td>Paracetamol,Amoxil + 3more</td>
                                                <td>₦ 2,300</td>
                                                <td><span class="badge badge-pill bg-dark-light">Draft</span></td>
                                                
                                                <td class="text-right">
                                                    <div class="table-action">
                                                        <a href="{{route('pharmacy.sales.show',$pharmacy)}}" class="btn btn-sm bg-dark text-white">
                                                            <i class="far fa-edit"></i> Edit
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-nowrap">14-Nov-2019 </td>
                                                <td>
                                                    USK3834
                                                </td>
                                                <td>Paracetamol,Amoxil + 3more</td>
                                                <td>₦ 2,300</td>
                                                <td><span class="badge badge-pill bg-success-light">Completed</span></td>

                                                <td class="text-right">
                                                    <div class="table-action">
                                                        <a href="{{route('pharmacy.sales.show',$pharmacy)}}" class="btn btn-sm bg-success-light">
                                                            <i class="far fa-eye"></i> View
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active">
                                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Next</a>
                                                </li>
                                            </ul>
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
<!-- /Page Content -->

@endsection