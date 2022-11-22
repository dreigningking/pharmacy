@extends('layouts.admin.app')
@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Assessment Settings</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Assessment</a></li>
                    <li class="breadcrumb-item active">Advises</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    
                    <div class="col ml-md-n2 profile-user-info">
                        
                        <div class="about-text">Medication and Non Medication Advises</div>
                        
                    </div>
                    
                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab"> Medication Advises</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Non Medication Advises</a>
                    </li>
                    <li class="nav-item border">
                        <a class="nav-link" href="{{route('admin.advises.upload')}}">Upload Advises</a>
                    </li>
                    
                </ul>
            </div>	
            <div class="tab-content profile-tab-cont">
                
                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Medication Advises</h5>
                                    <div class="table-responsive">
                                        <table class="datatable table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-left"></th>
                                                    <th>Advise</th>
                                                    <th>Status</th>
                                                    <th class=""> Action</th>
                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- <tr>
                                                    <td class=" text-center">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                            <label class="custom-control-label" for="customControlValidation1"></label>
                                                        </div>
                                                    </td>
                                                    <td> Eat before taking medicine</td>
                                                    
                                                    
                                                    <td> Active </td>
                                                    <td> 
                                                        <div class="d-flex">
                                                            <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a>
                                                            <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-eye"></i> Delete </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                            <label class="custom-control-label" for="customControlValidation1"></label>
                                                        </div>
                                                    </td>
                                                    <td > Take medicine with water</td>
                                                    <td class=""> Active </td>
                                                    <td> 
                                                        <div class="d-flex">
                                                            <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a>
                                                            <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-eye"></i> Delete </a>
                                                        </div>
                                                    </td>
                                                </tr> --}}
                                                @forelse ($advices->where('type','medication') as $med_advice)
                                                    <tr>
                                                        <td class="text-center">
                                                            <div class="custom-control custom-checkbox mb-3">
                                                                <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                                <label class="custom-control-label" for="customControlValidation1"></label>
                                                            </div>
                                                        </td>
                                                        <td class="d-flex align-items-center">
                                                            {{$med_advice->description}}
                                                        </td>
                                                        
                                                        <td class=""> Active </td>
                                                        <td class=""> 
                                                            <div class="d-flex">
                                                                <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a>
                                                                <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-eye"></i> Delete </a>
                                                            </div>
                                                        </td>
                                                    </tr>    
                                                @empty
                                                    <tr>
                                                        <td colspan="4"> No medication advice</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Personal Details Tab -->
                
                <!-- Change Password Tab -->
                <div id="password_tab" class="tab-pane fade">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Non Medication Advises</h5>
                                    <div class="table-responsive">
                                        <table class="datatable table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-left"></th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th class=""> Action</th>
                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($advices->where('type','non_medication') as $non_medadvice)
                                                    <tr>
                                                        <td class="text-center">
                                                            <div class="custom-control custom-checkbox mb-3">
                                                                <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                                <label class="custom-control-label" for="customControlValidation1"></label>
                                                            </div>
                                                        </td>
                                                        <td class="d-flex align-items-center">
                                                            {{$non_medadvice->description}}
                                                        </td>
                                                        
                                                        <td class=""> Active </td>
                                                        <td class=""> 
                                                            <div class="d-flex">
                                                                <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a>
                                                                <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-eye"></i> Delete </a>
                                                            </div>
                                                        </td>
                                                    </tr>    
                                                @empty
                                                    <tr>
                                                        <td colspan="4"> No Non-medication advice</td>
                                                    </tr>
                                                @endforelse
                                                
                                            </tbody>
                                        </table>
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
@endsection
@push('scripts')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>

@endpush