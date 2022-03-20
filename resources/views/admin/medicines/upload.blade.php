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
                        <a class="nav-link active" data-toggle="tab" href="#medicines">Upload Medicines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#relationships">Upload Medicine Relationships</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#diseases">Upload Medical Conditions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#reactions">Upload Medicine Reactions</a>
                    </li>
                </ul>
            </div>	
            <div class="tab-content profile-tab-cont">
                
                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="medicines">
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
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create an excel file and name it <span class="font-weight-bold">medicines.xls</span> </p>
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create the content in the format below. Take note of the table headers that they are written in small textcases </p>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>name</th>
                                                <th>description</th>
                                                <th>contraindication</th>
                                            </tr>
                                            <tr>
                                                <td>Aspirin</td>
                                                <td>Aspirin is used for treating malaria and thyphoid fever</td>
                                                <td>It is not good for pregnant woman and people above the age of 60 </td>
                                            </tr>
                                            <tr>
                                                <td>Tetracyclin</td>
                                                <td>It is used for treating malaria and thyphoid fever</td>
                                                <td>It is not good for pregnant woman and people above the age of 60 </td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Upload File</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <button class="btn btn-lg  btn-primary">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    
                    </div>
                    <!-- /Personal Details -->

                </div>
                <!-- /Personal Details Tab -->
                
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
                                    <div class="row">
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Here you can upload the interactions (both positive and negative) between two medicines</p>
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create an excel file and name it <span class="font-weight-bold">medicine_relationship.xls</span> </p>
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create the content in the format below. Take note of the table headers that they are written in small textcases </p>
                                        
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Select Medicine A</label>
                                                <select class="form-control select" name="medicines">
                                                    <option>Nive</option>
                                                    <option>Klod</option>
                                                    <option>Plog</option>
                                                    <option>Yuop</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-9">
                                            <div class="form-group">
                                                <label>Select All Medicine B</label>
                                                <select class="form-control select" name="medicine_b" multiple>
                                                    <option>Nive</option>
                                                    <option>Klod</option>
                                                    <option>Plog</option>
                                                    <option>Yuop</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <button class="btn btn-lg btn-primary">Download Combination</button>
                                            </div>
                                        </div>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>medicine_a</th>
                                                <th>medicine_b</th>
                                                <th>b_name</th>
                                                <th>positive</th>
                                                <th>remark</th>
                                            </tr>
                                            <tr>
                                                <td>48</td>
                                                <td>1</td>
                                                <td>Aspirin</td>
                                                <td>1</td>
                                                <td>It is good for pregnant woman and people above the age of 60 </td>
                                            </tr>
                                            <tr>
                                                <td>48</td>
                                                <td>2</td>
                                                <td>Ampicilin</td>
                                                <td>0</td>
                                                <td>It is not good for pregnant woman and people above the age of 60 </td>
                                            </tr>
                                            <tr>
                                                <td>48</td>
                                                <td>3</td>
                                                <td>Anopheles</td>
                                                <td>1</td>
                                                <td>It is good for pregnant woman and people above the age of 60 </td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Upload File</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <button class="btn btn-lg  btn-primary">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    
                    </div>
                </div>
                <!-- /Change Password Tab -->
                <div class="tab-pane fade show active" id="diseases">
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
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create an excel file and name it <span class="font-weight-bold">conditions.xls</span> </p>
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create the content in the format below. Take note of the table headers that they are written in small textcases </p>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>name</th>
                                                <th>description</th>
                                                <th>symptoms</th>
                                            </tr>
                                            <tr>
                                                <td>Cough</td>
                                                <td>Feeling of whoop whoop whoop</td>
                                                <td> Throat dissactisfaction </td>
                                            </tr>
                                            <tr>
                                                <td>Malaria</td>
                                                <td>Infection caused by mosquito</td>
                                                <td>Fever, High Body Temperature</td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Upload File</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <button class="btn btn-lg  btn-primary">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    
                    </div>
                    <!-- /Personal Details -->

                </div>
                <!-- Change Password Tab -->
                <div id="reactions" class="tab-pane fade">
                
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Upload Instructions</span> 
                                        {{-- <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a> --}}
                                    </h5>
                                    <div class="row">
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Here you can upload the interactions (both positive and negative) between two medicines</p>
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create an excel file and name it <span class="font-weight-bold">medicine_reactions.xls</span> </p>
                                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create the content in the format below. Take note of the table headers that they are written in small textcases </p>
                                        
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Select Medicine A</label>
                                                <select class="form-control select" name="medicines">
                                                    <option>Nive</option>
                                                    <option>Klod</option>
                                                    <option>Plog</option>
                                                    <option>Yuop</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-9">
                                            <div class="form-group">
                                                <label>Select All Diseases</label>
                                                <select class="form-control select" name="medicine_b" multiple>
                                                    <option>Nive</option>
                                                    <option>Klod</option>
                                                    <option>Plog</option>
                                                    <option>Yuop</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <button class="btn btn-lg btn-primary">Download Combination</button>
                                            </div>
                                        </div>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>medicine_id</th>
                                                <th>disease_id</th>
                                                <th>disease_name</th>
                                                <th>positive</th>
                                                <th>remark</th>
                                            </tr>
                                            <tr>
                                                <td>48</td>
                                                <td>1</td>
                                                <td>Cough</td>
                                                <td>1</td>
                                                <td>It is good for pregnant woman and people above the age of 60 </td>
                                            </tr>
                                            <tr>
                                                <td>48</td>
                                                <td>2</td>
                                                <td>Diabetes</td>
                                                <td>0</td>
                                                <td>It increases sugar </td>
                                            </tr>
                                            <tr>
                                                <td>48</td>
                                                <td>3</td>
                                                <td>Malaria</td>
                                                <td>1</td>
                                                <td>It is good for treating malaria</td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Upload File</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <button class="btn btn-lg  btn-primary">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    
                    </div>
                </div>
                <!-- /Change Password Tab -->
                
            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
    <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
@endpush