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
                                <table class="table table-bordered" id="series">
                                    <tr>
                                        <th style="width: 14%">
                                            Period
                                        </th>
                                        <th style="width: 12%">
                                            Stock Valuation at Cost Price
                                        </th>
                                        <th style="width: 12%">
                                            Cash at Hand
                                        </th>
                                        <th style="width: 12%">
                                            Cash in Bank
                                        </th>
                                        <th style="width: 12%">
                                            Account Receivable
                                        </th>
                                        <th style="width: 12%">
                                            Account Payable
                                        </th>
                                        <th style="width: 12%">
                                            Total
                                        </th>
                                        <th style="width: 5%"></th>
                                    </tr>
                                    <tr class="valuations">
                                        <td>
                                            <input type="text" class="form-control period input">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control stock input" value="0">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control cash_hand input" value="0">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control cash_bank input" value="0">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control account_receivable input" value="0">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control account_payable input" value="0">
                                        </td>
                                        <td class="total">0 </td>
                                        <td>
                                            <button id="removeRow" class="btn bg-danger text-white"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </table>
                                <button id="addRow" class="btn btn-dark mx-3">Add Row</button>
                            </div> 
                            <div class="col-md-12 text-center">
                                <button id="generate_chart" class=" btn btn-primary">Generate Chart</button>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <canvas id="volumeChart" style="width:100%;"></canvas>
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
<script src="{{asset('plugins/chart/chart.min.js')}}"></script>
<script src="{{asset('plugins/chart/chartjs-plugin-datalabels.min.js')}}"></script>

<script>
    var series;
    var chart = new Chart("volumeChart", { 
                    data: {},
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: "Business Capitalization"
                            },
                        },
                    }
                });
    $(document).ready(function(){
        series = $('.valuations').last().prop("outerHTML");
    })
    $(document).on('click','#addRow',function(){
        $('#series').append(series);
    })
    $(document).on('click','#removeRow',function(){
        $(this).closest('.valuations').remove();
    })
    $(document).on('input','.input',function(){
        let sum = parseInt($(this).closest('.valuations').find('.stock').val()) + 
            parseInt($(this).closest('.valuations').find('.cash_hand').val()) + 
            parseInt($(this).closest('.valuations').find('.cash_bank').val()) + 
            parseInt($(this).closest('.valuations').find('.account_receivable').val()) - 
            parseInt($(this).closest('.valuations').find('.account_payable').val());
        $(this).closest('.valuations').find('.total').text(sum)
    })
    $(document).on('click','#generate_chart',function(){
        let periods = [];
        let valuations = [];
        $('.period').each(function( index, value ) {
            periods.push(value.value)
        })
        $('.total').each(function( index, value ) {
            valuations.push(parseInt($(value).text()))
        })
        let dataset = [];
        dataset.push({ type: "line", label: "Single Input", backgroundColor: "rgba(0,0,255,1.0)", data: valuations})
        updateChart(chart,periods,dataset)
    })
    
    function updateChart(chart, label, newData) {
        chart.data.labels = label;
        chart.data.datasets = newData;
        chart.update();
    }
</script>

@endpush