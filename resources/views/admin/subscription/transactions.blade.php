@extends('layouts.admin.app')
@push('styles')

<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
@endpush
@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Transactions</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Transactions</li>
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
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>User</th>
                                    <th>Purpose</th>
                                    <th>Medium</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    
                                    <td> 15/12/2022 06:38 PM</td>
                                    
                                    <td> $31.99  </td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}" alt="User Image"></a>
                                            <a href="profile.html">Dr. Ruby Perrin</a>
                                        </h2>
                                    </td>
                                    <td>Subscription</td>
                                    <td>Card</td>
                                    <td class="">
                                        <div class="d-flex">
                                            {{-- <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a> --}}
                                            <a class="btn btn-sm bg-primary-light mx-1" data-toggle="modal" href="#view"> <i class="fe fe-eye"></i> View Receipt </a>
                                            {{-- <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-trash"></i> Delete </a> --}}
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    
                                    <td> 15/12/2022 19:45 PM</td>
                                    
                                    <td> $31.99  </td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}" alt="User Image"></a>
                                            <a href="profile.html">Dr. Ruby Perrin</a>
                                        </h2>
                                    </td>
                                    <td>SMS Units</td>
                                    <td>Card</td>
                                    <td class="">
                                        <div class="d-flex">
                                            {{-- <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a> --}}
                                            <a class="btn btn-sm bg-primary-light mx-1" data-toggle="modal" href="#view"> <i class="fe fe-eye"></i> View Receipt </a>
                                            {{-- <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-trash"></i> Delete </a> --}}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    
                                    <td> 15/12/2022 18:02 PM</td>
                                    
                                    <td> $31.99  </td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}" alt="User Image"></a>
                                            <a href="profile.html">Dr. Ruby Perrin</a>
                                        </h2>
                                    </td>
                                    <td> Subscription </td>
                                    <td> USSD </td>
                                    <td class="">
                                        <div class="d-flex">
                                            {{-- <a class="btn btn-sm bg-info-light mx-1" data-toggle="modal" href="#edit"> <i class="fe fe-pencil"></i> Edit </a> --}}
                                            <a class="btn btn-sm bg-primary-light mx-1" data-toggle="modal" href="#view"> <i class="fe fe-eye"></i> View Receipt </a>
                                            {{-- <a class="btn btn-sm bg-danger-light mx-1" data-toggle="modal" href="#delete"> <i class="fe fe-trash"></i> Delete </a> --}}
                                        </div>
                                    </td>
                                </tr>
                                
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

@endpush

@section('modals')
<!-- Reaction Modal -->
@endsection
