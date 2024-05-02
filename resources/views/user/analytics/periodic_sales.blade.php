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
                        <h4>Periodic Sales Monitor</h4>
                        <form action="">
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Select Type</label>
                                        <select class="form-control" name="type">
                                            <option value="Annually" @if($type == 'Annual') selected @endif>Annual</option>
                                            <option value="Quarterly" @if($type == 'Quarterly') selected @endif>Quarterly</option>
                                            <option value="Monthly" @if($type == 'Monthly') selected @endif>Monthly</option>
                                            <option value="Weekly" @if($type == 'Weekly') selected @endif>Weekly</option>
                                            <option value="Daily" @if($type == 'Daily') selected @endif>Daily</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Select Category</label>
                                        <select class="form-control" name="category">
                                            <option value="" @if(!$category) selected @endif>All</option>
                                            <option value="drugs" @if($category == 'drugs') selected @endif>Drugs</option>
                                            <option value="nondrugs" @if($category == 'nondrugs') selected @endif>Non Drugs</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Date Range (From | To)</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="cal-icon">
                                                    <input name="from" value="{{$from? $from->format('d/m/Y') : ''}}" type="text" class="form-control datetimepicker" placeholder="From Date">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                
                                                <div class="cal-icon">
                                                    <input name="to" value="{{$to? $to->format('d/m/Y') : ''}}" type="text" class="form-control datetimepicker" placeholder="To  Date">
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
                                <table class="table table-striped">
                                    <tr>
                                        <th>
                                            Period
                                        </th>
                                        <th>
                                            Sales
                                        </th>
                                    </tr>
                                    @foreach($results as $result)
                                    <tr>
                                        <td>{{$result['name']}}</td>
                                        <td>{{$result['sales']}}</td>
                                        
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
<script src="{{asset('plugins/chart/chart.min.js')}}"></script>
<script src="{{asset('plugins/chart/chartjs-plugin-datalabels.min.js')}}"></script>
<script>
    var results = @json($results);
    if(results){
        const xVolume = results.map(a => a.name);
        const yVolume = results.map(b => b.sales);
        console.log(xVolume)
        new Chart("volumeChart", {
            type: "bar",
            data: {
                labels: xVolume,
                datasets: [{
                    label: "Periodic Sales",
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
                        text: "Periodic Sales"
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