@extends('layouts.main.app')
@push('styles')

@endpush
@section('main')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-Drug"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-Drug active" aria-current="page">Dashboard</li>
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
            @include('pharmacy.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">

                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="card contact-card">
                            <div class="card-body">
                                <h4 class="card-title">Overview</h4>
                                <div class="row jusify-content-between">

                                    <div class="col-md-6">
                                        <div class="bill">
                                            <p class=" text-muted">SILVER(BILLED YEARLY):</p>
                                            <h6>Starter, February 2022</h6>

                                        </div>
                                        <div class="bill">
                                            <p class="text-muted">TOTAL PER YEAR:</p>
                                            <h2 class="text-primary">$20000USD</h2>

                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row justify-content-end">
                                            <button class="btn btn-outline-secondary mr-4">
                                                Cancel Subscription
                                            </button>
                                            <button class="btn btn-primary">
                                                Update Plan
                                            </button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="card contact-card">
                            <div class="card-body">
                                <h4 class="card-title">Payment Methods</h4>
                                <div class="row jusify-content-between pl-2 pr-2">

                                    <p class="text-muted">
                                        Cards will be charged either at the end of the month or whenever your balance
                                        exceeds the usage threshold. All major credit / debit cards accepted.
                                    </p>
                                    <div class="row payment">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="card contact-card">
                            <div class="card  card-table flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title">Payment History</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Reference</th>
                                                    <th>Status</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Invoice</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#3682303</td>
                                                    <td>Pending</td>
                                                    <td>$264</td>
                                                    <td>22/04/2020</td>
                                                    <td>
                                                        <button
                                                            class="btn btn-outline d-flex align-items-center payment-btn">
                                                            <i class="fas fa-file-download"></i>
                                                            <p class="ml-2 mt-0 mb-0">PDF</p>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button
                                                            class="btn btn-outline d-flex align-items-center payment-btn">

                                                            <i class="fas fa-eye"></i>
                                                            <p class="ml-2 mt-0 mb-0">Quick View</p>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#3682303</td>
                                                    <td>Successful</td>
                                                    <td>$264</td>
                                                    <td>22/04/2020</td>
                                                    <td>
                                                        <button
                                                            class="btn btn-outline d-flex align-items-center payment-btn">
                                                            <i class="fas fa-file-download"></i>
                                                            <p class="ml-2 mt-0 mb-0">PDF</p>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button
                                                            class="btn btn-outline d-flex align-items-center payment-btn">

                                                            <i class="fas fa-eye"></i>
                                                            <p class="ml-2 mt-0 mb-0">Quick View</p>
                                                        </button>
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
</div>

</div>

</div>
<!-- /Page Content -->
@endsection






