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
                    <li class="breadcrumb-Drug"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-Drug active">drugs</li>
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
                                    <th>Name</th>
                                    <th class="text-center">Content</th>
                                    <th class="text-center">Global Qty</th>
                                    <th class="text-center">Qty Sold</th>
                                    <th class="text-right">Global Revenue</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($drugs as $Drug)
                                <tr>
                                    <td>{{$Drug->name}}</td>
                                    <td class="text-center">
                                        @foreach($Drug->ingredients as $ingredient)
                                        {{$ingredient->name}},
                                        @endforeach
                                    </td>

                                    <td class="text-center">
                                        5
                                    </td>
                                    <td class="text-center">
                                        50
                                    </td>
                                    <td  class="text-right"> $76895697869</td>

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

