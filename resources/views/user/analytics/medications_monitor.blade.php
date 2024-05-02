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
    .select2-container .select2-selection--multiple{
        min-height:46px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__rendered{
        line-height: 30px;
    }
    
</style>
    
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
                        <h4>Medications Outcome Monitor</h4>
                        <form action="">
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Select Diagnosis</label>
                                        <select class="form-control select2" data-placeholder="Select Diagnosis" name="condition_id">
                                            <option value=""></option>
                                            @foreach ($diagnoses as $diagnosis)
                                                <option value="{{$diagnosis->id}}" @if($condition_id == $diagnosis->id) selected @endif>{{$diagnosis->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="form-label">Select Medication</label>
                                        <select class="form-control select2" data-placeholder="Select Medications" name="medications[]" multiple>
                                            @foreach ($inventories as $inventory)
                                                <option value="{{$inventory->id}}" @if($inventory_ids && in_array($inventory->id,$inventory_ids)) selected @endif>{{$inventory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="form-label">Date Range</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">From</label>
                                                <div class="cal-icon">
                                                    <input name="from" value="{{$from? $from->format('d/m/Y') : ''}}" type="text" class="form-control datetimepicker" placeholder="Select Date">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="">To</label>
                                                <div class="cal-icon">
                                                    <input name="to" value="{{$to? $to->format('d/m/Y') : ''}}" type="text" class="form-control datetimepicker" placeholder="Select Date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class=" btn btn-primary">Generate Chart</button>
                                </div>
                            </div>
                        </form>
                        @if($results)
                        <div class="row mt-5">
                            <div class="col-md-5">
                                <table class="table table-stripped">
                                    <tr>
                                        <th>
                                            Brand
                                        </th>
                                        <th>
                                            % outcome Achieved
                                        </th>
                                    </tr>
                                    @foreach($results as $result)
                                    <tr>
                                        <td>{{$result['name']}}</td>
                                        <td>{{$result['achieved']}}%</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div> 
                            <div class="col-md-7">
                                <canvas id="volumeChart" style="width:100%;max-width:700px"></canvas>
                            </div>
                        </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

<!-- /Page Content -->

@endsection

@push('scripts')
<script>
    $('.select2').select2();
</script>
<script src="{{asset('plugins/chart/chart.min.js')}}"></script>
<script src="{{asset('plugins/chart/chartjs-plugin-datalabels.min.js')}}"></script>
<script>
    var results = @json($results);
    if(results){
        const xVolume = results.map(a => a.name);
        const yVolume = results.map(b => b.achieved);
        console.log(xVolume)
        new Chart("volumeChart", {
            type: "bar",
            data: {
                labels: xVolume,
                datasets: [{
                    label: "Medication Outcome Monitor",
                    backgroundColor: "rgba(0,0,255,1.0)",
                    // borderColor: "rgba(0,0,255,0.1)",
                    data: yVolume
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Medication Outcome Monitor"
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
            }
        });
    }
    
   
</script>
@endpush