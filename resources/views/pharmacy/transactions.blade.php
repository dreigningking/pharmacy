@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<!-- Datatables CSS -->
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
@endpush
@section('main')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Transactions</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('pharmacy.sidebar')
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="page-wrapper">
                    <div class="content container-fluid">

                        <!-- Page Header -->
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="page-title">Transactions</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
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
                                                        <th>Invoice Number</th>

                                                        <th>Item</th>
                                                        <th>Quantity</th>
                                                        <th>Total Amount</th>

                                                        <th class="text-right">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><a href="invoice.html">#IN0001</td>

                                                        <td>
                                                            <h2 class="table-avatar">

                                                                Biscuit
                                                            </h2>
                                                        </td>
                                                        <td Biscuit>200</td>
                                                        <td>$100.00</td>

                                                        <td class="text-right">
                                                            <div class="actions">
                                                                <a class="btn btn-sm bg-success-light"
                                                                    data-toggle="modal" href="#delete_modal">
                                                                    <i class="fe fe-eye"></i> View More
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="invoice.html">#IN0002</td>

                                                        <td>
                                                            <h2 class="table-avatar">

                                                                Micoson
                                                            </h2>
                                                        </td>
                                                        <td>501</td>
                                                        <td>$200.00</td>

                                                        <td class="text-right">
                                                            <div class="actions">
                                                                <a class="btn btn-sm bg-success-light"
                                                                    data-toggle="modal" href="#delete_modal">
                                                                    <i class="fe fe-eye"></i> View More
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="invoice.html">#IN0003</td>
                                                        <!-- <td>#PT003</td> -->
                                                        <td>
                                                            <h2 class="table-avatar">

                                                                Coke
                                                            </h2>
                                                        </td>
                                                        <td>100 </td>
                                                        <td>$250.00</td>

                                                        <td class="text-right">
                                                            <div class="actions">
                                                                <a class="btn btn-sm bg-success-light"
                                                                    data-toggle="modal" href="#delete_modal">
                                                                    <i class="fe fe-eye"></i> View More
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="invoice.html">#IN0004</td>
                                                        <!-- <td>#PT004</td> -->
                                                        <td>
                                                            <h2 class="table-avatar">

                                                                Fairfax
                                                            </h2>
                                                        </td>
                                                        <td>260</td>
                                                        <td>$150.00</td>

                                                        <td class="text-right">
                                                            <div class="actions">
                                                                <a class="btn btn-sm bg-success-light"
                                                                    data-toggle="modal" href="#delete_modal">
                                                                    <i class="fe fe-eye"></i> View More
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="invoice.html">#IN0005</td>
                                                        <!-- <td>#PT005</td> -->
                                                        <td>
                                                            <h2 class="table-avatar">

                                                                <a href="profile.html">kuli kuli</a>
                                                            </h2>
                                                        </td>
                                                        <td>105</td>
                                                        <td Fairfax>$350.00</td>

                                                        <td class="text-right">
                                                            <div class="actions">
                                                                <a class="btn btn-sm bg-success-light"
                                                                    data-toggle="modal" href="#delete_modal">
                                                                    <i class="fe fe-eye"></i> View More
                                                                </a>
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
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /Page Content -->
@endsection


@push('scripts')
<script src="{{asset('adminassets/js/script.js')}}"></script>
@endpush