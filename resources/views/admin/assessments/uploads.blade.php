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
                <h3 class="page-title">Assessment Settings</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Assessment</a></li>
                    <li class="breadcrumb-item active">Upload</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-between">
                        <span>Upload Instructions</span> 
                        {{-- <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a> --}}
                    </h5>
                    <div class="row">
                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Uploading from excel is simple. Prepare the document in the following format:</p>
                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create an excel file and name it <span class="font-weight-bold">assessment.xls</span> </p>
                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create the content in the format below. Take note of the table headers that they are written in small textcases </p>
                        <p class="col-sm-12 text-danger mb-0 mb-sm-3">Drugs with incorrect medicine names will not be uploaded</p>
                        <div class="col-md-12">
                            <div class="profile-menu">
                                <ul class="nav nav-tabs nav-tabs-solid">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#Complaints">Complaints</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#Conditions">Conditions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#Errors">Errors</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#Interventions">Interventions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#Outcomes">Outcomes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#questions">Family and Social Questions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#review">System Review</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#Advices">Advices</a>
                                    </li>
                                </ul>
                            </div>	
                            <div class="tab-content profile-tab-cont">
                                
                                <!-- Personal Details Tab -->
                                <div class="tab-pane fade show active" id="Complaints">
                                    <!-- Personal Details -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Complaints</span> 
                                                        
                                                    </h5>
                                                    <table class="table table-stripped">
                                                        <tr>
                                                            <th>Description</th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Ache in the head</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Vomiting and Stooling</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Throat Pain and discomfort in breathing</td>
                                                        </tr>
                                                    </table>
                                                    <div class="my-3">
                                                        <form class="row" action="{{route('admin.drugs.upload')}}" method="POST" enctype="multipart/form-data">@csrf
                                                            <div class="col-6">
                                                                <div class="form-group row no-gutters">
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
                                
                                <!-- Change Password Tab -->
                                <div id="Conditions" class="tab-pane fade">
                                    <!-- Personal Details -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Conditions</span> 
                                                        
                                                    </h5>
                                                    <table class="table table-stripped">
                                                        <tr>
                                                            <th>Description</th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Diarrhea</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Diabetes</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hypertension</td>
                                                        </tr>
                                                    </table>
                                                    <div class="my-3">
                                                        <form class="row" action="{{route('admin.drugs.upload')}}" method="POST" enctype="multipart/form-data">@csrf
                                                            <div class="col-6">
                                                                <div class="form-group row no-gutters">
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
                                <!-- /Change Password Tab -->

                                <!-- Change Password Tab -->
                                <div id="Errors" class="tab-pane fade">
                                    <!-- Personal Details -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Error</span> 
                                                        
                                                    </h5>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Description</th>
                                                            <th>Type</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Wrong dose</td>
                                                            <td>Prescription</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Overdose</td>
                                                            <td>Administration</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Underdose</td>
                                                            <td>Prescription</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Patient reacts to drug</td>
                                                            <td>Administration</td>
                                                        </tr>
                                                    </table>
                                                    <div class="my-3">
                                                        <form class="row" action="{{route('admin.drugs.upload')}}" method="POST" enctype="multipart/form-data">@csrf
                                                            <div class="col-6">
                                                                <div class="form-group row no-gutters">
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
                                <!-- /Change Password Tab -->

                                <!-- Change Password Tab -->
                                <div id="Interventions" class="tab-pane fade">
                                    <!-- Personal Details -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Interventions</span> 
                                                        
                                                    </h5>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Description</th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Adjust Prescription</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Call doctor</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Request new prescription</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ignore error</td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                    <div class="my-3">
                                                        <form class="row" action="{{route('admin.drugs.upload')}}" method="POST" enctype="multipart/form-data">@csrf
                                                            <div class="col-6">
                                                                <div class="form-group row no-gutters">
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
                                <!-- /Change Password Tab -->

                                <!-- Change Password Tab -->
                                <div id="Outcomes" class="tab-pane fade">
                                    <!-- Personal Details -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Outcomes</span> 
                                                        
                                                    </h5>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Description</th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Prescription changed</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lesser problems</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Patient's wellbeing has improved</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Minute reaction observed</td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                    <div class="my-3">
                                                        <form class="row" action="{{route('admin.drugs.upload')}}" method="POST" enctype="multipart/form-data">@csrf
                                                            <div class="col-6">
                                                                <div class="form-group row no-gutters">
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
                                <!-- /Change Password Tab -->

                                <!-- Change Password Tab -->
                                <div id="questions" class="tab-pane fade">
                                    <!-- Personal Details -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Family and Social Questions</span> 
                                                        
                                                    </h5>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Questions</th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Do you smoke</td>     
                                                            <td></td>     
                                                        </tr>
                                                        <tr>
                                                            <td>Do you drink</td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                    <div class="my-3">
                                                        <form class="row" action="{{route('admin.drugs.upload')}}" method="POST" enctype="multipart/form-data">@csrf
                                                            <div class="col-6">
                                                                <div class="form-group row no-gutters">
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
                                <!-- /Change Password Tab -->

                                <!-- Change Password Tab -->
                                <div id="review" class="tab-pane fade">
                                    <!-- Personal Details -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>System Review Questions</span> 
                                                        
                                                    </h5>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Question</th>
                                                            <th>System</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Have you ever had a head injury or recent fall?</td>
                                                            <td>Nervous</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Do you have any chest pain with breathing?</td>
                                                            <td>Respiratory</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ever had a broken bone? If so, how was it treated?</td>
                                                            <td>Muscular</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Any diffficulty in general body movements?</td>
                                                            <td>Skeletal</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Any change in urinary or bowel habits?</td>
                                                            <td>Endocrine</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Do you smoke, use alcohol or other drugs?</td>
                                                            <td>Circulatory</td>
                                                        </tr>
                                                    </table>
                                                    <div class="my-3">
                                                        <form class="row" action="{{route('admin.drugs.upload')}}" method="POST" enctype="multipart/form-data">@csrf
                                                            <div class="col-6">
                                                                <div class="form-group row no-gutters">
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
                                <!-- /Change Password Tab -->

                                <!-- Change Password Tab -->
                                <div id="Advices" class="tab-pane fade">
                                    <!-- Personal Details -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Advices</span> 
                                                    </h5>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Advise</th>
                                                            <th>Type</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Eat before taking medicine</td>
                                                            <td>Medication</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Take medicine with water</td>
                                                            <td>Non_medication</td>
                                                        </tr>
                                                        
                                                    </table>
                                                    <div class="my-3">
                                                        <form class="row" action="{{route('admin.drugs.upload')}}" method="POST" enctype="multipart/form-data">@csrf
                                                            <div class="col-6">
                                                                <div class="form-group row no-gutters">
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
                                <!-- /Change Password Tab -->

                                
                                
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
@endpush