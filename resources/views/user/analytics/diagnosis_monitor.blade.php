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
                        <h4>Diagnosis Monitor</h4>
                        <form action="">
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Diagnoses</label>
                                        <select class="form-control select2" data-placeholder="Select Diagnoses" name="conditions[]" multiple>
                                            <option value=""></option>
                                            @foreach ($diagnoses as $diagnosis)
                                                <option value="{{$diagnosis->id}}" @if($conditions && in_array($diagnosis->id,$conditions)) selected @endif>{{$diagnosis->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Select Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="" @if(!$gender) selected @endif>Both</option>
                                            <option value="male" @if($gender == 'male') selected @endif>Male</option>
                                            <option value="female" @if($gender == 'female') selected @endif>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Age Bracket</label>
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <input type="number" value="{{$minimum_age}}" name="minimum_age" class="form-control" placeholder="Minimum">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" value="{{$maximum_age}}" name="maximum_age" class="form-control" placeholder="Maximum">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                <table class="table table-stripped">
                                    <tr>
                                        <th>
                                            Diagnosis
                                        </th>
                                        <th>
                                            Number of cases <br>in the defined period
                                        </th>
                                    </tr>
                                    @foreach($results as $result)
                                    <tr>
                                        <td>{{$result['name']}}</td>
                                        <td>{{$result['cases']}}</td>
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
        const yVolume = results.map(b => b.cases);
        console.log(xVolume)
        new Chart("volumeChart", {
            type: "bar",
            data: {
                labels: xVolume,
                datasets: [{
                    label: "Diagnosis Monitor",
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
                        text: "Diagnosis Monitor"
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