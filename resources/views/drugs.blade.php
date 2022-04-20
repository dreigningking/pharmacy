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
									<li class="breadcrumb-Drug"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-Drug active" aria-current="page">Search</li>
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
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                {{-- <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
                
                    <!-- Search Filter -->
                    <div class="card search-filter">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Search Filter</h4>
                        </div>
                        <div class="card-body">
                        
                        <div class="filter-widget">
                            <h4>Gender</h4>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type" checked>
                                    <span class="checkmark"></span> Male Doctor
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type">
                                    <span class="checkmark"></span> Female Doctor
                                </label>
                            </div>
                        </div>
                        <div class="filter-widget">
                            <h4>Select Specialist</h4>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="select_specialist" checked>
                                    <span class="checkmark"></span> Urology
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="select_specialist" checked>
                                    <span class="checkmark"></span> Neurology
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="select_specialist">
                                    <span class="checkmark"></span> Dentist
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="select_specialist">
                                    <span class="checkmark"></span> Orthopedic
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="select_specialist">
                                    <span class="checkmark"></span> Cardiologist
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="select_specialist">
                                    <span class="checkmark"></span> Cardiologist
                                </label>
                            </div>
                        </div>
                            <div class="btn-search">
                                <button type="button" class="btn btn-block">Search</button>
                            </div>	
                        </div>
                    </div>
                    <!-- /Search Filter -->
                    
                </div> --}}
                
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h4>drugs</h4></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-bordered table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Drug Name</th>
                                            <th>Manufacturer</th>
                                            <th>Contents</th>
                                            <th>Diseases</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($drugs->sortBy('name') as $drug)
                                        <tr>
                                            <td><a href="invoice.html">{{$drug->name}}</td>
                                            <td><a href="invoice.html">{{$drug->manufacturer}}</td>
                                            <td>{{implode(',',$drug->ingredients->pluck('name')->toArray())}}</td>
                                            <td>Something, Anything</td>
                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>		
    <!-- /Page Content -->
			
@endsection
@push('scripts')
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('adminassets/js/script.js')}}"></script>
<script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
@endpush