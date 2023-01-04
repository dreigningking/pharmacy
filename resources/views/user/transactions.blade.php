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
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Transactions</h2>
            </div>
        </div>
    </div>
</div>
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
                <!-- Search Filter -->
                <div class="card search-filter">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Search Filter</h4>
                    </div>
                    <div class="card-body">
                        <div class="filter-widget">
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" placeholder="Select Date">
                            </div>			
                        </div>
                        <div class="filter-widget">
                            <h4>Type</h4>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type" checked>
                                    <span class="checkmark"></span> Pharmacy Management Subscription
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type">
                                    <span class="checkmark"></span> Analytics Subscriptions
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="select_specialist" checked>
                                    <span class="checkmark"></span> SMS
                                </label>
                            </div>
                        </div>
                        
                        <div class="btn-search">
                            <button type="button" class="btn btn-block">Search</button>
                        </div>	
                    </div>
                </div>
                <!-- /Search Filter -->
                
            </div>
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card card-table">
                    <div class="card-body">
                    
                        <!-- Invoice Table -->
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Invoice No</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Paid On</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="invoice-view.html">#INV-0010</a>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="patient-profile.html" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" src="assets/img/patients/patient.jpg" alt="User Image">
                                                </a>
                                                <a href="patient-profile.html">Richard Wilson <span>#PT0016</span></a>
                                            </h2>
                                        </td>
                                        <td>$450</td>
                                        <td>14 Nov 2019</td>
                                        <td class="text-right">
                                            <div class="table-action">
                                                <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i> View
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                    <i class="fas fa-print"></i> Print
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="invoice-view.html">#INV-0009</a>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="patient-profile.html" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" src="assets/img/patients/patient1.jpg" alt="User Image">
                                                </a>
                                                <a href="patient-profile.html">Charlene Reed <span>#PT0001</span></a>
                                            </h2>
                                        </td>
                                        <td>$200</td>
                                        <td>13 Nov 2019</td>
                                        <td class="text-right">
                                            <div class="table-action">
                                                <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i> View
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                    <i class="fas fa-print"></i> Print
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="invoice-view.html">#INV-0008</a>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="patient-profile.html" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" src="assets/img/patients/patient2.jpg" alt="User Image">
                                                </a>
                                                <a href="patient-profile.html">Travis Trimble <span>#PT0002</span></a>
                                            </h2>
                                        </td>
                                        <td>$100</td>
                                        <td>12 Nov 2019</td>
                                        <td class="text-right">
                                            <div class="table-action">
                                                <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i> View
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                    <i class="fas fa-print"></i> Print
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="invoice-view.html">#INV-0007</a>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="patient-profile.html" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" src="assets/img/patients/patient3.jpg" alt="User Image">
                                                </a>
                                                <a href="patient-profile.html">Carl Kelly <span>#PT0003</span></a>
                                            </h2>
                                        </td>
                                        <td>$350</td>
                                        <td>11 Nov 2019</td>
                                        <td class="text-right">
                                            <div class="table-action">
                                                <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i> View
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                    <i class="fas fa-print"></i> Print
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="invoice-view.html">#INV-0006</a>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="patient-profile.html" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" src="assets/img/patients/patient4.jpg" alt="User Image">
                                                </a>
                                                <a href="patient-profile.html">Michelle Fairfax <span>#PT0004</span></a>
                                            </h2>
                                        </td>
                                        <td>$275</td>
                                        <td>10 Nov 2019</td>
                                        <td class="text-right">
                                            <div class="table-action">
                                                <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i> View
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                    <i class="fas fa-print"></i> Print
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="invoice-view.html">#INV-0005</a>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="patient-profile.html" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" src="assets/img/patients/patient5.jpg" alt="User Image">
                                                </a>
                                                <a href="patient-profile.html">Gina Moore <span>#PT0005</span></a>
                                            </h2>
                                        </td>
                                        <td>$600</td>
                                        <td>9 Nov 2019</td>
                                        <td class="text-right">
                                            <div class="table-action">
                                                <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i> View
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                    <i class="fas fa-print"></i> Print
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="invoice-view.html">#INV-0004</a>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="patient-profile.html" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" src="assets/img/patients/patient6.jpg" alt="User Image">
                                                </a>
                                                <a href="patient-profile.html">Elsie Gilley <span>#PT0006</span></a>
                                            </h2>
                                        </td>
                                        <td>$50</td>
                                        <td>8 Nov 2019</td>
                                        <td class="text-right">
                                            <div class="table-action">
                                                <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i> View
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                    <i class="fas fa-print"></i> Print
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="invoice-view.html">#INV-0003</a>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="patient-profile.html" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" src="assets/img/patients/patient7.jpg" alt="User Image">
                                                </a>
                                                <a href="patient-profile.html">Joan Gardner <span>#PT0007</span></a>
                                            </h2>
                                        </td>
                                        <td>$400</td>
                                        <td>7 Nov 2019</td>
                                        <td class="text-right">
                                            <div class="table-action">
                                                <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i> View
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                    <i class="fas fa-print"></i> Print
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="invoice-view.html">#INV-0002</a>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="patient-profile.html" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" src="assets/img/patients/patient8.jpg" alt="User Image">
                                                </a>
                                                <a href="patient-profile.html">Daniel Griffing <span>#PT0008</span></a>
                                            </h2>
                                        </td>
                                        <td>$550</td>
                                        <td>6 Nov 2019</td>
                                        <td class="text-right">
                                            <div class="table-action">
                                                <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i> View
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                    <i class="fas fa-print"></i> Print
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="invoice-view.html">#INV-0001</a>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="patient-profile.html" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" src="assets/img/patients/patient9.jpg" alt="User Image">
                                                </a>
                                                <a href="patient-profile.html">Walter Roberson <span>#PT0009</span></a>
                                            </h2>
                                        </td>
                                        <td>$100</td>
                                        <td>5 Nov 2019</td>
                                        <td class="text-right">
                                            <div class="table-action">
                                                <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i> View
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                    <i class="fas fa-print"></i> Print
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /Invoice Table -->
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>		
<!-- /Page Content -->

@endsection

