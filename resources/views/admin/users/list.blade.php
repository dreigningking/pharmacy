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
                <h3 class="page-title">Users</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class=" justify-content-end">
                        
                        <button class="btn btn-primary reaction-btn" data-toggle="modal"
                                href="#reaction">Create Admin</button>
    
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Select</th>
                                    <th>Name</th>

                                    <th class="text-center">No Of Brands</th>
                                    <th class="text-right"> Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class=" text-center">
                                        <input class="form-check-input medicine-check"
                                            type="checkbox" name="remember" id="medicine-check"
                                            value="{{$user->name}}" required>

                                    </td>
                                    <td class="d-flex align-items-center">

                                        {{$user->name}}
                                    </td>

                                    <td class="text-center">
                                        5
                                    </td>
                                    <td class="text-right"> <a class="btn btn-sm bg-success-light"
                                            data-toggle="modal" href="#medication_info">
                                            <i class="fe fe-eye"></i> View More
                                        </a></td>

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
@endsection

@push('scripts')

@endpush

@section('modals')
<div class="modal fade custom-modal add-modal" id="reaction">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Medicine Reactions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form action="/action_page.php" class="needs-validation" novalidate>


                            <div class="row">
                                <div class="col-md-6">
                                    <label for="sel1">Select list:</label>
                                    <select class="form-control" id="sel1" name="medicine_a">
                                        @foreach($users as $user)
                                        <option value=" {{$user->name}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="sel1">Select list:</label>
                                    <select class="form-control" id="sel2" name="medicine_b">
                                        @foreach($users as $user)
                                        <option value="{{$user->name}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="pwd">Remark:</label>
                                <textarea class="form-control" rows="2" id="description" name="remark"
                                    required></textarea>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group mt-2">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="healthy" value="0">Positive
                                        Reaction
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="healthy" value="1">Negative
                                        Reaction
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pl-4 pr-4 mt-2">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reaction Modal -->
@endsection
