@extends('layouts.admin.app')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
@endpush
@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Dashboard</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Drug formulations</a></li>
                    <li class="breadcrumb-item active">Upload Drugs</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-md-12">
            {{-- <div class="card"> --}}
                <div class="">
                    {{-- <h5 class="card-title d-flex justify-content-between">
                        <span>Upload Medicines</span> 
                        <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
                    </h5> --}}
                    <form action="{{route('admin.drugs')}}">
                    <div class="row table-responsive">
                        
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>API A</th>
                                    <th>API B</th>
                                    <th>API C</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><select class="form-control" name="drug">
                                        <option value="lonart" >Lonart</option>
                                        <option>Coartem</option>
                                        <option>Lomofen</option>
                                        <option>Paracetamol</option>
                                        <option>Ascorbic acid</option>
                                        <option>Ibruprofen</option>
                                        </select>
                                    </td>
                                    <td><select class="form-control ">
                                            <option>Anti-Malaria</option>
                                            <option>Anti-Biotics</option>
                                            <option>Anti-Septic</option>
                                            <option>Pain Killers</option>
                                            <option>Vitamins&Minerals</option>
                                            <option>Anti-Burn</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div>
                                            <select class="form-control">
                                                <option>Abacavir</option>
                                                <option>Abatacept</option>
                                                <option>Anti-Septic</option>
                                                <option>Acetylcysteine</option>
                                                <option>Baclofen</option>
                                                <option>Benoxinate</option>
                                                <option>Balsalazide</option>
                                                <option>Benzydamine</option>
                                                <option>Cefotaxime</option>
                                                <option>Cefpodoxime</option>
                                                <option>Cerebrolysin</option>
                                            </select>
                                            <input type="text" class="form-control mt-1" placeholder="strength e.g 2mg">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <select class="form-control">
                                                <option>Abacavir</option>
                                                <option>Abatacept</option>
                                                <option>Anti-Septic</option>
                                                <option>Acetylcysteine</option>
                                                <option>Baclofen</option>
                                                <option>Benoxinate</option>
                                                <option>Balsalazide</option>
                                                <option>Benzydamine</option>
                                                <option>Cefotaxime</option>
                                                <option>Cefpodoxime</option>
                                                <option>Cerebrolysin</option>
                                            </select>
                                            <input type="text" class="form-control mt-1" placeholder="strength e.g 2mg">
                                        </div>
                                    </td>   
                                    <td>
                                        <div>
                                            <select class="form-control">
                                                <option>Abacavir</option>
                                                <option>Abatacept</option>
                                                <option>Anti-Septic</option>
                                                <option>Acetylcysteine</option>
                                                <option>Baclofen</option>
                                                <option>Benoxinate</option>
                                                <option>Balsalazide</option>
                                                <option>Benzydamine</option>
                                                <option>Cefotaxime</option>
                                                <option>Cefpodoxime</option>
                                                <option>Cerebrolysin</option>
                                            </select>
                                            <input type="text" class="form-control mt-1" placeholder="strength e.g 2mg">
                                        </div>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td><select class="form-control ">
                                        <option>Lonart</option>
                                        <option>Coartem</option>
                                        <option>Lomofen</option>
                                        <option>Paracetamol</option>
                                        <option>Ascorbic acid</option>
                                        <option>Ibruprofen</option>
                                        </select>
                                    </td>
                                    <td><select class="form-control">
                                            <option>Anti-Malaria</option>
                                            <option>Anti-Biotics</option>
                                            <option>Anti-Septic</option>
                                            <option>Pain Killers</option>
                                            <option>Vitamins</option>
                                            <option>Anti-Burn</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div>
                                            <select class="form-control">
                                                <option>Anti-Malaria</option>
                                                <option>Anti-Biotics</option>
                                                <option>Anti-Septic</option>
                                                <option>Pain Killers</option>
                                                <option>Vitamins</option>
                                                <option>Anti-Burn</option>
                                            </select>
                                            <input type="text" class="form-control mt-1" placeholder="strength e.g 2mg">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <select class="form-control">
                                                <option>Anti-Malaria</option>
                                                <option>Anti-Biotics</option>
                                                <option>Anti-Septic</option>
                                                <option>Pain Killers</option>
                                                <option>Vitamins</option>
                                                <option>Anti-Burn</option>
                                            </select>
                                            <input type="text" class="form-control mt-1" placeholder="strength e.g 2mg">
                                        </div>
                                    </td>   
                                    <td>
                                        <div>
                                            <select class="form-control">
                                                <option>Anti-Malaria</option>
                                                <option>Anti-Biotics</option>
                                                <option>Anti-Septic</option>
                                                <option>Pain Killers</option>
                                                <option>Vitamins</option>
                                                <option>Anti-Burn</option>
                                            </select>
                                            <input type="text" class="form-control mt-1" placeholder="strength e.g 2mg">
                                        </div>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td><select class="form-control ">
                                        <option>Lonart</option>
                                        <option>Coartem</option>
                                        <option>Lomofen</option>
                                        <option>Paracetamol</option>
                                        <option>Ascorbic acid</option>
                                        <option>Ibruprofen</option>
                                        </select>
                                    </td>
                                    <td><select class="form-control">
                                            <option>Anti-Malaria</option>
                                            <option>Anti-Biotics</option>
                                            <option>Anti-Septic</option>
                                            <option>Pain Killers</option>
                                            <option>Vitamins</option>
                                            <option>Anti-Burn</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div>
                                            <select class="form-control">
                                                <option>Anti-Malaria</option>
                                                <option>Anti-Biotics</option>
                                                <option>Anti-Septic</option>
                                                <option>Pain Killers</option>
                                                <option>Vitamins</option>
                                                <option>Anti-Burn</option>
                                            </select>
                                            <input type="text" class="form-control mt-1" placeholder="strength e.g 2mg">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <select class="form-control">
                                                <option>Anti-Malaria</option>
                                                <option>Anti-Biotics</option>
                                                <option>Anti-Septic</option>
                                                <option>Pain Killers</option>
                                                <option>Vitamins</option>
                                                <option>Anti-Burn</option>
                                            </select>
                                            <input type="text" class="form-control mt-1" placeholder="strength e.g 2mg">
                                        </div>
                                    </td>   
                                    <td>
                                        <div>
                                            <select class="form-control">
                                                <option>Anti-Malaria</option>
                                                <option>Anti-Biotics</option>
                                                <option>Anti-Septic</option>
                                                <option>Pain Killers</option>
                                                <option>Vitamins</option>
                                                <option>Anti-Burn</option>
                                            </select>
                                            <input type="text" class="form-control mt-1" placeholder="strength e.g 2mg">
                                        </div>
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="my-3">
                        {{-- <form class="row" action="{{route('admin.drugs.upload')}}" method="POST" enctype="multipart/form-data">@csrf --}}
                            {{-- <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Upload File</label>
                                    <div class="col-lg-9">
                                        <input type="file" name="drugs" class="form-control" required accept=".xlsx,.xls">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <a href="{{route('admin.drugs')}}" class="btn btn-lg  btn-primary">Save</a>
                                </div>
                            </div>
                        {{-- </form> --}}
                        
                    </div>
                    </form>
                </div>
            {{-- </div> --}}
        </div>
    </div>

</div>
@endsection
@push('scripts')
    <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
@endpush