@extends('layouts.main.app')
@push('styles')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<style>
    .no_select_border span.select2-selection.select2-selection--single{
        border:0px !important;
    }
    /* #select2-supplier_select-container{
        text-align: right;
    } */
    span.select2-selection.select2-selection--single{
        height:46px;
        padding-top:10px;
        padding-bottom:10px;
        /* width:200px; */
    }
    span.select2.select2-container select2-container--default{
        width:200px!important;
    }
    .select2-container--default .select2-selection--single {
        height: 50px;
        border: 1px solid #dcdcdc;
        border-radius: 3px;
    }
    /* .select2-container--default.select2-selection--single.select2-selection__arrow {
        top: 10px !important;
    } */
    .select2-container--default.select2-selection--single.select2-selection__arrow{
        top: 8px !important;
    }
    /* .select2-container--default .select2-selection--single .select2-selection__arrow{
        top: 8px !important;
    } */
    .select2-container--default.select2-selection--single.select2-selection__rendered {
        line-height: 42px;
    }
    
    .table-trash {
        width: 29px !important;
        height: 29px !important;
    }
    .date {
        width: 150px;
    }
    .table-input{
        width: 90px;
        height: 50px;
        border: none;
    }
    .table-input:focus{
        border: none;
        outline: none;
    }
    .table tr td{
        vertical-align: middle;
        
    }
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        /* -moz-appearance: textfield; */
    }
    .select-remote {
        /* width: 450px !important; */
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
                <h2 class="breadcrumb-title">Assessment</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            {{-- @include('pharmacy.sidebar') --}}
            <div class="col-md-12">
                <!-- Page Wrapper -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('pharmacy.inventory.purchases.store',$pharmacy)}}" method="POST">@csrf
                            <div class="invoice-content">
                                {{-- <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-logo">
                                                <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div> --}}
                                
                                <!-- Invoice Drug -->
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td> Name: </td>
                                                    <td> Olwuadamilola Samuel </td>
                                                </tr>
                                                <tr>
                                                    <td> Phone Number: </td>
                                                    <td> 08053483984 </td>
                                                </tr>
                                                <tr>
                                                    <td> Assessment Date: </td>
                                                    <td> 12th May 2023 </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td> <a href="{{route('pharmacy.assessments.create',$pharmacy)}}" class="btn btn-light btn-sm supplies_submit">Edit Assessment</a>  </td>
                                                    <td> <a href="{{route('pharmacy.prescriptions.create',$pharmacy)}}" class="btn btn-dark btn-sm supplies_submit " >View Prescription</a> </td>
                                                </tr>
                                                
                                            </table>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="">
                                                <strong class="customer-text">Patient</strong>
                                                <p class="invoice-details invoice-details-two">
                                                    <select name="supplier_id" id="supplier_select" class="select form-control " required>
                                                        <option value ="" selected>Select Patient</option>
                                                        <option value ="">Olwuadamilola Smauel</option>
                                                    </select>
                                                </p>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            {{-- <div class="invoice-info invoice-info2">
                                                <a href="#add_supplier" data-toggle="modal" class="text-info"><u>Add new</u></a>
                                                <div class="customer-text d-inline mx-2"><strong>Select Assessment</strong></div>
                                                <div class="invoice-details no_select_border">
                                                    <select name="supplier_id" id="supplier_select" class="select form-control supplier-select" required>
                                                        <option value ="" selected>Select Assessment</option>
                                                        <option value ="" >Assessment #12132</option>
                                                        <option value ="" >Assessment #344545</option>
                                                        @forelse ($suppliers as $supplier)                                                
                                                            <option value="{{$supplier->id}}"
                                                                data-city="{{$supplier->city->name}}"
                                                                data-state="{{$supplier->state->name}}"
                                                                data-country="{{$supplier->country->name}}">
                                                                {{$supplier->name}}
                                                            </option>
                                                        @empty
                                                            <option disabled>No Supplier</option>
                                                        @endforelse

                                                    </select>
                                                   
                                                    <p class="city"></p>
                                                    <p class="state"></p>
                                                    
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <!-- Invoice Drug -->
                                <div class="invoice-item invoice-table-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive no_select_border">
                                                <table class="invoice-table table table-bordered" id="table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Assessment
                                                                
                                                            </th>
                                                            <th class="text-left">Details</th>
                                                            <th class="text-left">Remark</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody  class="">
                                                        <tr class="">
                                                            <td class="extra-column">
                                                                Complaints
                                                            </td>
                                                            <td class="">
                                                                Cough, Cattarh, Pain in the neck
                                                            </td>
                                                            <td></td>
                                                        </tr> 
                                                        <tr class="">
                                                            <td class="extra-column">
                                                                Past Medical Record
                                                            </td>
                                                            <td class="">
                                                                <ul>
                                                                    <li>Malaria and Thyphod - 2008
                                                                        <ul class="list-unstyled font-italic">
                                                                            <li class="list-style-none">Medication Used</li>
                                                                            <ul class="text-muted small">
                                                                                <li >Lonart</li>
                                                                                <li >Paracetamol    </li>
                                                                            </ul>
                                                                        </ul>
                                                                        
                                                                    </li>
                                                                    <li>Malaria and Thyphod - 2008</li>
                                                                </ul>
                                                                
                                                            </td>
                                                            <td></td>
                                                        </tr> 
                                                        <tr class="">
                                                            <td class="extra-column">
                                                                Current Medical Record
                                                            </td>
                                                            <td class="">
                                                                <ul>
                                                                    <li>Malaria and Thyphod - 2008
                                                                        <ul class="list-unstyled font-italic">
                                                                            <li class="list-style-none">Medication Used</li>
                                                                            <ul class="text-muted small">
                                                                                <li >Lonart</li>
                                                                            </ul>
                                                                        </ul>
                                                                        
                                                                    </li>
                                                                    <li>Malaria and Thyphod - 2008</li>
                                                                </ul>
                                                                
                                                            </td>
                                                            <td></td>
                                                        </tr> 
                                                        <tr class="">
                                                            <td class="extra-column">
                                                                Family & Social History
                                                            </td>
                                                            <td class="">
                                                                <ul>
                                                                    <li>Smoking </li>
                                                                    <li>Multiple Sexual Partners</li>
                                                                </ul>
                                                                
                                                            </td>
                                                            <td></td>
                                                        </tr>  
                                                        <tr class="">
                                                            <td class="extra-column">
                                                                Vitals
                                                            </td>
                                                            <td class="">
                                                                <ul>
                                                                    <li>Temperature : 150 degrees celcius </li>
                                                                    <li>Heart Beat Rate: 150BP/BM</li>
                                                                </ul>
                                                                
                                                            </td>
                                                            <td></td>
                                                        </tr>  
                                                        <tr class="">
                                                            <td class="extra-column">
                                                                System Review
                                                            </td>
                                                            <td class="">
                                                                <ul>
                                                                    <li>Digestive System
                                                                        <ul class="font-italic">
                                                                            <li class="">Painful tooth</li>
                                                                            <li class="">Painful Head</li>
                                                                        </ul>
                                                                        
                                                                    </li>
                                                                    <li>Skeletal System
                                                                        <ul class="font-italic">
                                                                            <li class="">Painful tooth</li>
                                                                            <li class="">Painful Head</li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                            <td></td>
                                                        </tr>  
                                                        <tr class="">
                                                            <td class="extra-column">
                                                                Provisional Diagnosis
                                                            </td>
                                                            <td class="">
                                                                Patient is sick of old naira notes
                                                            </td>
                                                            <td></td>
                                                        </tr>  
                                                        <tr class="">
                                                            <td class="extra-column">
                                                               Laboratory
                                                            </td>
                                                            <td class="">
                                                                <ul>
                                                                    <li>Pregnancy Test : </li>
                                                                    <li>Endocrine Test:</li>
                                                                </ul>
                                                                
                                                            </td>
                                                            <td></td>
                                                        </tr> 
                                                        <tr class="">
                                                            <td class="extra-column">
                                                               Final Diagnosis
                                                            </td>
                                                            <td class="">
                                                                Confirmed Presence of CBN intervention
                                                            </td>
                                                            <td></td>
                                                        </tr> 
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- /Invoice Drug -->
                                
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Page Wrapper -->


            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection



