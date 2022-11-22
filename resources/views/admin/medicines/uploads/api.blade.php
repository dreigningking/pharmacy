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
                <h3 class="page-title">API</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item">API</li>
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
                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create an excel file and name it <span class="font-weight-bold">api.xls</span> </p>
                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create the content in the format below. Take note of the table headers that they are written in small textcases </p>
                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Seperate each of the contents with the pipe character i.e |</p>
                        <p class="col-sm-12 text-muted mb-0 mb-sm-3">Each content is a combination of the medicine name and its miligram ie. Arthemeter:250 </p>
                        <p class="col-sm-12 text-danger mb-0 mb-sm-3">Drugs with incorrect medicine names will not be uploaded</p>
                        <table class="table table-bordered">
                            <tr>
                                <th>name</th>
                                <th>side_effects</th>
                                <th>contraindications</th>
                                <th>pregnancy_status</th>
                                <th>lactation_status</th>
                                <th>alternative</th>
                                <th>medication_counsel</th>
                                

                            </tr>
                            <tr>
                                <td>Arthemeter</td>
                                <td>It causes dark skin| User may feel excessive vomitting</td>
                                <td>It has contraindications with malaria | It has contraindications with thyphod</td>
                                <td>safe for pregnancy</td>
                                <td>not safe for lactating mothers</td>
                                <td>Chloroquine|Quinine</td>
                                <td>use as prescribed</td>
                            </tr>
                            <tr>
                                <td>Abacavir</td>
                                <td>It causes dark skin| User may feel excessive vomitting</td>
                                <td>It has contraindications with malaria | It has contraindications with thyphod</td>
                                <td>safe for pregnancy</td>
                                <td>not safe for lactating mothers</td>
                                <td>Procold|Strepsil</td>
                                <td>do not overdose</td>
                            </tr>
                            <tr>
                                <td>Lumefantrine</td>
                                <td>It causes dark skin| User may feel excessive vomitting</td>
                                <td>It has contraindications with malaria | It has contraindications with thyphod</td>
                                <td>safe for pregnancy</td>
                                <td>not safe for lactating mothers</td>
                                <td>Procold|Strepsil</td>
                                <td>do not overdose</td> 
                            </tr>
                            <tr>
                                <td>Aspirin</td>
                                <td>It causes dark skin| User may feel excessive vomitting</td>
                                <td>It has contraindications with malaria | It has contraindications with thyphod</td>
                                <td>safe for pregnancy</td>
                                <td>not safe for lactating mothers</td>
                                <td>Procold|Strepsil</td>
                                <td>do not overdose</td>
                            </tr>
                        </table>
                        
                    </div>
                    <div class="my-3">
                        <form class="row" action="{{route('admin.apis.upload')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Upload File</label>
                                    <div class="col-lg-9">
                                        <input type="file" name="api" class="form-control" required accept=".xlsx,.xls">
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

</div>
@endsection
@push('scripts')
    <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
@endpush