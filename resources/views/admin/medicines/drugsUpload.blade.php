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
                <h3 class="page-title">Profile</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-md-12">
            {{-- <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#">
                            <img class="rounded-circle" alt="User Image" src="{{asset('adminassets/img/profiles/avatar-01.jpg')}}">
                        </a>
                    </div>
                    <div class="col ml-md-n2 profile-user-info">
                        <h4 class="user-name mb-0">Ryan Taylor</h4>
                        <h6 class="text-muted">ryantaylor@admin.com</h6>
                        <div class="user-Location"><i class="fa fa-map-marker"></i> Florida, United States</div>
                        <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    </div>
                    <div class="col-auto profile-btn">
                        
                        <a href="#" class="btn btn-primary">
                            Edit
                        </a>
                    </div>
                </div>
            </div> --}}
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#drugs">Upload Drugs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#relationships">Upload Medicine Relationships</a>
                    </li>
                </ul>
            </div>	
            <div class="tab-content profile-tab-cont">
                
                <!-- Change Password Tab -->
                <div id="relationships" class="tab-pane fade">
                
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Upload Instructions</span> 
                                        {{-- <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a> --}}
                                    </h5>
                                    <form action="{{route('admin.medicines.downloadrelationship')}}" method="post">@csrf
                                        <div class="row">
                                            <p class="col-sm-12 text-muted mb-0 mb-sm-3">Here you can upload the interactions (both positive and negative) between two medicines</p>
                                            <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create an excel file and name it <span class="font-weight-bold">medicine_relationship.xls</span> </p>
                                            <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create the content in the format below. Take note of the table headers that they are written in small textcases </p>
                                            
                                            
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Select Medicine A</label>
                                                        <select class="form-control select" name="medicine_a">
                                                            @forelse ($medicines as $medicine)
                                                                <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                                            @empty   
                                                                <option selected disabled>No Medicine</option>
                                                            @endforelse   
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <label>Select All Medicine B</label>
                                                        <select class="form-control select" name="medicine_b[]" multiple>
                                                            @foreach ($medicines as $medicine)
                                                                <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-lg btn-primary">Download Combination</button>
                                                    </div>
                                                </div>
                                            

                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>medicine_a</th>
                                                    <th>medicine_aName</th>
                                                    <th>medicine_b</th>
                                                    <th>medicine_bName</th>
                                                    <th>reaction</th>
                                                   
                                                </tr>
                                                <tr>
                                                    <td>48</td>
                                                    <td>Ampicilin</td>
                                                    <td>20</td>
                                                    <td>Aspirin</td>
                                                    <td>Contraindicated </td>
                                                </tr>
                                                <tr>
                                                    <td>48</td>
                                                    <td>Ampicilin</td>
                                                    <td>23</td>
                                                    <td>Artemether</td>
                                                    <td>Look for alternative</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>48</td>
                                                    <td>Ampicilin</td>
                                                    <td>3</td>
                                                    <td>Anopheles</td>
                                                    <td>Monitor Closely</td> 
                                                </tr>
                                                <tr>
                                                    <td>48</td>
                                                    <td>Ampicilin</td>
                                                    <td>3</td>
                                                    <td>Anopheles</td>
                                                    <td>OK</td> 
                                                </tr>
                                            </table>
                                            
                                        </div>
                                    </form>
                                    
                                        <form action="{{route('admin.medicines.uploadrelationship')}}" method="POST" enctype="multipart/form-data">@csrf
                                            <div class="row my-3">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Upload File</label>
                                                        <div class="col-lg-9">
                                                            <input type="file" name="relationships" class="form-control" required accept=".xlsx,.xls">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <button class="btn btn-lg  btn-primary">Upload</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    
                                    
                                </div>
                            </div>
                        </div>

                    
                    </div>
                </div>

                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="drugs">
                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Upload Instructions</span> 
                                        {{-- <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a> --}}
                                    </h5>
                                    <div class="row">
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Uploading from excel is simple. Prepare the document in the following format:</p>
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create an excel file and name it <span class="font-weight-bold">drugs.xls</span> </p>
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create the content in the format below. Take note of the table headers that they are written in small textcases </p>
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Seperate each of the contents with the pipe character i.e |</p>
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Each content is a combination of the medicine name and its miligram ie. Arthemeter:250 </p>
                                        <p class="col-sm-12 text-danger mb-0 mb-sm-3">Drugs with incorrect medicine names will not be uploaded</p>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>name</th>
                                                <th>administration</th>
                                                <th>manufacturer</th>
                                                <th>contents</th>
            
                                            </tr>
                                            <tr>
                                                <td>Lonart</td>
                                                <td>oral|injection</td>
                                                <td>Sun Microsystems</td>
                                                <td>Lumenfantrine:500|Abracadabra:250</td>
                                            </tr>
                                            <tr>
                                                <td>Baba Blue</td>
                                                <td>Aural|Dermal</td>
                                                <td>Nickben Ltd</td>
                                                <td>Lumenfantrine:500|Abracadabra:250</td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                    <div class="my-3">
                                        <form class="row" action="{{route('admin.medicines.uploadDrug')}}" method="POST" enctype="multipart/form-data">@csrf
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Upload File</label>
                                                    <div class="col-lg-9">
                                                        <input type="file" name="drugs" class="form-control" required accept=".xlsx,.xls">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg  btn-primary">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    
                    </div>
                    <!-- /Personal Details -->

                </div>
                <!-- /Personal Details Tab -->
                
                
            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
    <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
@endpush