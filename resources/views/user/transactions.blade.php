@extends('layouts.main.app')
@push('styles')

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
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('user.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-header"><h4>Transactions</h4></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Date</th>

                                        <th>Pharmacy Name</th>
                                        <th>Item</th>
                                        <th>Total</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->orders->sortByDesc('created_at') as $sale)
                                    <tr>
                                        <td>{{$sale->created_at->format('jS-M Y')}}</td>

                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html">{{$sale->pharmacy->name}} </a>
                                            </h2>
                                        </td>
                                        <td>{{$sale->pharmacy->country->currency_symbol}}{{$sale->total}}</td>
                                        <td class="text-center">
                                            <span
                                                class="badge badge-pill bg-secondary inv-badge">Walk-in</span>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-sm bg-success-light" data-toggle="modal"
                                                href="#delete_modal">
                                                <i class="fe fe-eye"></i> View Prescriptions
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                    {{-- <tr>
                                        <td><a href="invoice.html">#IN0002</td>

                                        <td>
                                            <h2 class="table-avatar">

                                                <a href="profile.html">Micoson</a>
                                            </h2>
                                        </td>
                                        <td>$200.00</td>
                                        <td class="text-center">
                                            <span
                                                class="badge badge-pill bg-success inv-badge">Revenue</span>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-sm bg-success-light" data-toggle="modal"
                                                href="#delete_modal">
                                                <i class="fe fe-eye"></i> View More
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="invoice.html">#IN0003</td>
                                        <!-- <td>#PT003</td> -->
                                        <td>
                                            <h2 class="table-avatar">

                                                <a href="profile.html">Medplus</a>
                                            </h2>
                                        </td>
                                        <td>$250.00</td>
                                        <td class="text-center">
                                            <span
                                                class="badge badge-pill bg-success inv-badge">Expense</span>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-sm bg-success-light" data-toggle="modal"
                                                href="#delete_modal">
                                                <i class="fe fe-eye"></i> View More
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="invoice.html">#IN0004</td>
                                        <!-- <td>#PT004</td> -->
                                        <td>
                                            <h2 class="table-avatar">

                                                <a href="profile.html">Fairfax</a>
                                            </h2>
                                        </td>
                                        <td>$150.00</td>
                                        <td class="text-center">
                                            <span
                                                class="badge badge-pill bg-success inv-badge">Revenue</span>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-sm bg-success-light" data-toggle="modal"
                                                href="#delete_modal">
                                                <i class="fe fe-eye"></i> View More
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="invoice.html">#IN0005</td>
                                        <!-- <td>#PT005</td> -->
                                        <td>
                                            <h2 class="table-avatar">

                                                <a href="profile.html">Moore</a>
                                            </h2>
                                        </td>
                                        <td>$350.00</td>
                                        <td class="text-center">
                                            <span
                                                class="badge badge-pill bg-success inv-badge">Revenue</span>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-sm bg-success-light" data-toggle="modal"
                                                href="#delete_modal">
                                                <i class="fe fe-eye"></i> View More
                                            </a>
                                        </td>
                                    </tr> --}}

                                </tbody>
                            </table>
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