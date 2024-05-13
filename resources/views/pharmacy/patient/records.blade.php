@extends('layouts.main.records')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<style>
    .card{
        border:1px solid #f0f0f0;
    }
    .table.assessment td{
        border-top:0px;
    }
    .page-break {
        page-break-after: always;
    }
    @media print {
        .noPrint {
            display:none;
        }
    }
    @media screen {
        .onlyPrint {
            display: none;
        }
    }
</style>
@endpush
@section('main')
<!-- Breadcrumb -->

    <div class="container">
        <div class="breadcrumb-bar mx-3">
            <div class="d-flex align-items-center justify-content-center">
                <div class="">
                    <h2 class="breadcrumb-title">ABC Pharmacy Patient Records</h2>
                </div>
            </div>
        </div>
    </div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            
            <div class="col-md-7 col-lg-8 col-xl-9">
            
                <!-- Basic Information -->
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Basic Information</h1>
                        <div class="row mx-0">
                            <div class="col-md-4 border pt-4">
                                <h4>Personal Records</h4>
                                <table class="table">
                                    <tr>
                                        <td>EMR:</td>
                                        <td>ABC123drm</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Name:</td>
                                        <td>Abiodun Markson</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Gender:</td>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <td>Age:</td>
                                        <td>26</td>
                                    </tr>
                                    <tr>
                                        <td>BloodGroup:</td>
                                        <td>ABC123drm</td>
                                    </tr>
                                    <tr>
                                        <td>Genotype:</td>
                                        <td>A+</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4 border pt-4 ml-md-2 mt-3 mt-md-0">
                                <h4>Contact Records</h4>
                                <table class="table">
                                    
                                    <tr>
                                        <td>Email:</td>
                                        <td>ABC123drm</td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td>ABC123drm</td>
                                    </tr>
                                    
                                </table>
                            </div> 
                            <div class="col-md-3 border pt-4 ml-md-2 mt-3 mt-md-0">
                                <h4>Summary of Records</h4>
                                <table class="table">
                                    
                                    <tr>
                                        <td>Number of Assessments:</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>Number of Visits:</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>Number of Diagnosis:</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>Number of Prescriptions:</td>
                                        <td>4</td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>
                        <div class="row mx-0 mt-3">
                            <div class="col-md-12 mt-5 mt-md-0 border pt-4">
                                <h4>Known Family and Social History</h4>
                                <table class="table">
                                    <tr>
                                        <td>Consumption of Alcohol</td>
                                        <td>Patient is experiencing addition</td>
                                    </tr>
                                    <tr>
                                        <td>Multiple Sexual Partners</td>
                                        <td>The guy no dey hear word</td>
                                    </tr>
                                    <tr>
                                        <td>Poor hygiene condition of food</td>
                                        <td>He too dirty</td>
                                    </tr>
                                    
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /Basic Information -->
                <div class="page-break"></div>
                <!-- Medical records -->
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Medical Records</h1>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-baseline">
                                    <h4 class="card-title pr-2">Cholera </h4> 
                                    <span class="small">( January to December 2022 )</span>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Medications</h5>
                                        <table class="table ">
                                            <tr>
                                                <th>Drug</th>
                                                <th>Period</th>
                                                <th>Effective ?</th>
                                            </tr>
                                            <tr>
                                                <td>Paracetamol</td>
                                                <td>Jan to Jun</td>
                                                <td>yes</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>              
                        </div>
                        <div class="page-break"></div>
                        <h1 class="card-title onlyPrint">Medical Records</h1>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-baseline">
                                    <h4 class="card-title pr-2">Malaria </h4> 
                                    <span class="small">( January to December 2022 )</span>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Medications</h5>
                                        <table class="table">
                                            <tr>
                                                <th>Drug</th>
                                                <th>Period</th>
                                                <th>Effective ?</th>
                                            </tr>
                                            <tr>
                                                <td>Paracetamol</td>
                                                <td>Jan to Jun</td>
                                                <td>yes</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>              
                        </div>   
                    </div>
                </div>
                <div class="page-break"></div>
                <!-- Contact Details -->
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Assessment Records</h1>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-0">
                                    <table class="table mb-4">
                                        <tr>
                                            <th class="w-25 border">Assessment ID</th>
                                            <td class="border">435453434</td>
                                        </tr>
                                        <tr>
                                            <th class="w-25 border">Date</th>
                                            <td class="border">12 March 2020</td>
                                        </tr>
                                        <tr>
                                            <th class="w-25 border">Complaint</th>
                                            <td class="border">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias amet omnis accusamus magnam consectetur? Nostrum blanditiis nemo, cupiditate vel quis voluptas in dolorum animi fugit enim repellendus, quisquam quae quas.</td>
                                        </tr>
                                    </table>

                                    <table class="table">
                                        <tr>
                                            <th colspan="4">Vitals Taken</th> 
                                        </tr>
                                        <tr>
                                            <th class="border">Date</th>
                                            <th class="border"> Vital</th>
                                            <th class="border">Result</th>
                                            <th class="border">Comment</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                    </table>
                                    <table class="table">
                                        <tr>
                                            <th colspan="4">System Review</th> 
                                        </tr>
                                        <tr>
                                            <th class="border">Date</th>
                                            <th class="border">System</th>
                                            <th class="border">Finding </th>
                                            <th class="border">Comment</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                    </table>
                                    <table class="table">
                                        <tr>
                                            <th colspan="3">Provisional Diagnosis</th> 
                                        </tr>
                                        <tr>
                                            <th class="border">#</th>
                                            <th class="border"> Condition</th>
                                            <th class="border">Required Investigation</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                    </table>
                                    <table class="table">
                                        <tr>
                                            <th colspan="4">Laboratory Investigation</th> 
                                        </tr>
                                        <tr>
                                            <th class="border">#</th>
                                            <th class="border"> Title</th>
                                            <th class="border">Result</th>
                                            <th class="border">Comment</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                    </table>
                                    <table class="table">
                                        <tr>
                                            <th colspan="4">Final Diagnosis</th> 
                                        </tr>
                                        <tr>
                                            <th class="border">#</th>
                                            <th class="border"> Condition</th>
                                            <th class="border">Expected Outcome</th>
                                            <th class="border">Achieved</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                    </table>
                                    <table class="table">
                                        <tr>
                                            <th colspan="5">Prescriptions</th> 
                                        </tr>
                                        <tr>
                                            <th class="border">#</th>
                                            <th class="border"> Drug</th>
                                            <th class="border"> Dosage Qty</th>
                                            <th class="border"> Duration</th>
                                            <th class="border"> Frequency</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                    </table>
                                </div>              
                            </div>              
                        </div>
                        <div class="page-break"></div>
                        <h1 class="card-title onlyPrint">Assessment Records</h1>
                        <div class="card">
                            <div class="card-body">
                                <div class="border">
                                    <table class="table mb-4">
                                        <tr>
                                            <th class="w-25 border">Assessment ID</th>
                                            <td class="border">223323232</td>
                                        </tr>
                                        <tr>
                                            <th class="w-25 border">Date</th>
                                            <td class="border">12 March 2020</td>
                                        </tr>
                                        <tr>
                                            <th class="w-25 border">Complaint</th>
                                            <td class="border">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias amet omnis accusamus magnam consectetur? Nostrum blanditiis nemo, cupiditate vel quis voluptas in dolorum animi fugit enim repellendus, quisquam quae quas.</td>
                                        </tr>
                                    </table>

                                    <table class="table">
                                        <tr>
                                            <th colspan="4">Vitals Taken</th> 
                                        </tr>
                                        <tr>
                                            <th class="border">Date</th>
                                            <th class="border"> Vital</th>
                                            <th class="border">Result</th>
                                            <th class="border">Comment</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                    </table>
                                    <table class="table">
                                        <tr>
                                            <th colspan="4">System Review</th> 
                                        </tr>
                                        <tr>
                                            <th class="border">Date</th>
                                            <th class="border">System</th>
                                            <th class="border">Finding </th>
                                            <th class="border">Comment</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                    </table>
                                    <table class="table">
                                        <tr>
                                            <th colspan="3">Provisional Diagnosis</th> 
                                        </tr>
                                        <tr>
                                            <th class="border">#</th>
                                            <th class="border"> Condition</th>
                                            <th class="border">Required Investigation</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                    </table>
                                    <table class="table">
                                        <tr>
                                            <th colspan="4">Laboratory Investigation</th> 
                                        </tr>
                                        <tr>
                                            <th class="border">#</th>
                                            <th class="border"> Title</th>
                                            <th class="border">Result</th>
                                            <th class="border">Comment</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                    </table>
                                    <table class="table">
                                        <tr>
                                            <th colspan="4">Final Diagnosis</th> 
                                        </tr>
                                        <tr>
                                            <th class="border">#</th>
                                            <th class="border"> Condition</th>
                                            <th class="border">Expected Outcome</th>
                                            <th class="border">Achieved</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                    </table>
                                    <table class="table">
                                        <tr>
                                            <th colspan="5">Prescriptions</th> 
                                        </tr>
                                        <tr>
                                            <th class="border">#</th>
                                            <th class="border"> Drug</th>
                                            <th class="border"> Dosage Qty</th>
                                            <th class="border"> Duration</th>
                                            <th class="border"> Frequency</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
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
<!-- /Page Content -->

@endsection

@push('scripts')

@endpush