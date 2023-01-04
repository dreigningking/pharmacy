@extends('layouts.main.app')
@push('styles')

<style>
    span.select2-selection.select2-selection--single{
        border:0px !important;
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
                <!-- Page Wrapper -->
                <div class="page-wrapper">
                    <div class="content container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="invoice-content">
                                            <div class="invoice-item">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="invoice-logo">
                                                            <img src="assets/img/logo.png" alt="logo">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="invoice-details">
                                                            <strong>Order:</strong> #00124 <br>
                                                            <strong>Issued:</strong> 20/07/2019
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Invoice Drug -->
                                            <div class="invoice-item">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="invoice-info">
                                                            <strong class="customer-text">Purchase Order From</strong>
                                                            <p class="invoice-details invoice-details-two">
                                                                Dr. Darren Elder <br>
                                                                806  Twin Willow Lane, Old Forge,<br>
                                                                Newyork, USA <br>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="invoice-info invoice-info2">
                                                            
                                                            <div class="customer-text"><strong>Patient</strong></div>
                                                            <p class="invoice-details">
                                                                <select name="supplier_id" class="select form-control">
                                                                    <option disabled>No Supplier</option>
                                                                    <option>Something Pharmaceuticals</option>
                                                                    <option>Anything Pharmaceuticals</option>
                                                                    <option>ABC & Sons LTD</option>
                                                                </select> 
                                                                {{-- <br> --}}
                                                                299 Star Trek Drive, Panama City, <br>
                                                                Florida, 32405, USA <br>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Invoice Drug -->
                                            
                                            
                                            
                                            <!-- Invoice Drug -->
                                            <div class="invoice-item invoice-table-wrap">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="invoice-table table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Description</th>
                                                                        <th class="text-center">Qty</th>
                                                                        <th class="text-center">M</th>
                                                                        <th class="text-center">A</th>
                                                                        <th class="text-center">N</th>
                                                                        <th class="text-center">Instruction</th>
                                                                        <th class="text-left">Remark</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Biscuit  </td>
                                                                        <td class="text-center">50</td>
                                                                        <td class="text-center">2</td>
                                                                        <td class="text-center">2</td>
                                                                        <td class="text-center">2</td>
                                                                        <td class="text-center">Take before food</td>
                                                                        <td class="text-left">Patient cannot take this medicine because patient is diabetic</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Popcorn  </td>
                                                                        <td class="text-center">50</td>
                                                                        <td class="text-center">1</td>
                                                                        <td class="text-center">0</td>
                                                                        <td class="text-center">1</td>
                                                                        <td class="text-center">Take after food</td>
                                                                        <td class="text-left">
                                                                            <ul>
                                                                                <li>Patient cannot take this medicine because patient is diabetic</li>
                                                                                <li>This drug contraindicates with paracematol</li>
                                                                            </ul>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-xl-4 ml-auto">
                                                        <div class="table-responsive">
                                                            <table class="invoice-table-two table">
                                                                <tbody>
                                                                <tr>
                                                                    <th>Subtotal:</th>
                                                                    <td><span>$350</span></td>
                                                                </tr>
                                                                {{-- <tr>
                                                                    <th>Discount:</th>
                                                                    <td><span>-10%</span></td>
                                                                </tr> --}}
                                                                <tr>
                                                                    <th>Total Amount:</th>
                                                                    <td><span>$315</span></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Invoice Drug -->
                                            
                                            <!-- Invoice Information -->
                                            <div class="other-info">
                                                <h4>Other information</h4>
                                                <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
                                            </div>
                                            <!-- /Invoice Information -->
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /Page Wrapper -->


            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection
@push('scripts')
    
@endpush
