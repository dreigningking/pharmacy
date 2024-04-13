@extends('layouts.main.app')
@push('styles')

<style>
    .select2-container .select2-selection--single{
        height:46px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 42px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        position:absolute;
        top: 6px!important;
    }
    
</style>
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
                <h2 class="breadcrumb-title">Analytics</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    
                <!-- Profile Sidebar -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Analytics</h4>
                    </div>
                    <div class="dashboard-widget">
                        @include('user.analytics.menu')
                    </div>
                </div>
                <!-- /Profile Sidebar -->
            
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <h4>Business Capitalization</h4>
                        
                        
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>
                                            Period
                                        </th>
                                        <th>
                                            Stock Valuation at Cost Price
                                        </th>
                                        <th>
                                            Cash at Hand
                                        </th>
                                        <th>
                                            Cash in Bank
                                        </th>
                                        <th>
                                            Account Receivable
                                        </th>
                                        <th>
                                            Account Payable
                                        </th>
                                        <th>
                                            Total
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control">
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                </table>
                                <button class="btn btn-dark">Add Row</button>
                            </div> 
                            <div class="col-md-12 text-center">
                                <button class=" btn btn-primary">Generate Chart</button>
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


@endpush