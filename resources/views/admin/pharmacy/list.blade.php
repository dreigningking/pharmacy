@extends('layouts.admin.app')
@push('styles')
<!-- Datatables CSS -->
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
@endpush
@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Pharmacies</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pharmacies</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-left"></th>
                                    <th>Name</th>
                                    <th>Owned By</th>
                                    <th>Patients</th>
                                    <th>Assessments</th>
                                    <th>Prescriptions</th>
                                    <th>Status</th>
                                    <th class="text-right"> Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pharmacies as $pharmacy)
                                    <tr>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input medicine-check" id="customControlValidation1">
                                                <label class="custom-control-label" for="customControlValidation1"></label>
                                            </div>
                                        </td>
                                        <td class="d-flex align-items-center"> {{$pharmacy->name}} </td>
                                        <td class=""> {{$pharmacy->owner->name}} </td>
                                        <td class=""> {{$pharmacy->patients->count()}} </td>
                                        <td class=""> {{$pharmacy->assessments->count()}}  </td>
                                        <td class=""> {{$pharmacy->prescriptions->count()}}  </td>
                                        <td class=""> 
                                            @if($pharmacy->license && $pharmacy->license->active())
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        <td class="text-right"> 
                                            <a class="btn btn-sm bg-success-light" href="{{route('admin.pharmacy.details',$pharmacy)}}">
                                                <i class="fe fe-eye"></i> View More
                                            </a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">
                                            No pharmacy
                                        </td>
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
@endsection


@push('scripts')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
@endpush
