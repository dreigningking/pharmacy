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
                <h3 class="page-title">drugs</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">drugs</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-sm-6">
                        
                                <a href="{{route('admin.drugs.upload')}}" class="btn btn-primary"> Upload Drugs</a>
                        </div>
                        
    
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">Name</th>
                                    <th class="text-left">Content</th>
                                    <th class="text-left">Sold by</th>
                                    <th class="text-left">Qty Sold</th>
                                    <th class="text-left">Global Revenue</th>
                                    <th class="">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($drugs as $drug)
                                    <tr>
                                        <td>{{$drug->name}}</td>
                                        <td class="">
                                            @foreach($drug->ingredients as $ingredient)
                                                {{$ingredient->name}},
                                            @endforeach
                                        </td>
                                        <td class="">
                                            {{$drug->batches->sum('quantity')}}
                                        </td>
                                        <td class="">
                                            50
                                        </td>
                                        <td class=""> $76895697869</td>
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

