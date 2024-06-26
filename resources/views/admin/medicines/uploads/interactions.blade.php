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
                <h3 class="page-title">Medicine</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Upload</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Upload Instructions</span> 
                                {{-- <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a> --}}
                            </h5>
                            <form action="{{route('admin.api.interactions.download')}}" method="post">@csrf
                                <div class="row">
                                    <p class="col-sm-12 text-muted mb-0 mb-sm-3">Here you can upload the interactions (both positive and negative) between two medicines</p>
                                    <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create an excel file and name it <span class="font-weight-bold">interactions.xls</span> </p>
                                    <p class="col-sm-12 text-muted mb-0 mb-sm-3">Create the content in the format below. Take note of the table headers that they are written in small textcases </p>
                                    
                                    
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Select Medicine A</label>
                                                <select class="form-control select" name="medicine_a">
                                                    @foreach ($medicines as $medicine)
                                                        <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-9">
                                            <div class="form-group">
                                                <label>Select All Medicine B</label>
                                                <select class="form-control select" name="medicine_b[]" multiple>
                                                    @foreach ($medicines as $medicin)
                                                        <option value="{{$medicin->id}}">{{$medicin->name}}</option>
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
                                            <th>remark</th>
                                            <th>mechanism</th>
                                           
                                        </tr>
                                        <tr>
                                            <td>48</td>
                                            <td>Ampicilin</td>
                                            <td>20</td>
                                            <td>Aspirin</td>
                                            <td>Contraindicated </td>
                                            <td>API A inhibits absorption of API B</td>
                                        </tr>
                                        <tr>
                                            <td>48</td>
                                            <td>Ampicilin</td>
                                            <td>23</td>
                                            <td>Artemether</td>
                                            <td>Look for alternative</td>
                                            <td>API A inhibits absorption of API B</td>
                                        </tr>
                                        <tr>
                                            <td>48</td>
                                            <td>Ampicilin</td>
                                            <td>3</td>
                                            <td>Anopheles</td>
                                            <td>Monitor Closely</td>
                                            <td>API A inhibits absorption of API B</td>
                                        </tr>
                                        <tr>
                                            <td>48</td>
                                            <td>Ampicilin</td>
                                            <td>3</td>
                                            <td>Anopheles</td>
                                            <td>OK</td> 
                                            <td>API A inhibits absorption of API B</td>
                                        </tr>
                                    </table>
                                    
                                </div>
                            </form>
                            
                                <form action="{{route('admin.api.interactions.upload')}}" method="POST" enctype="multipart/form-data">@csrf
                                    <div class="row my-3">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Upload File</label>
                                                <div class="col-lg-9">
                                                    <input type="file" name="interactions" class="form-control" required accept=".xlsx,.xls">
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
    </div>

</div>
@endsection
@push('scripts')
    <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
@endpush