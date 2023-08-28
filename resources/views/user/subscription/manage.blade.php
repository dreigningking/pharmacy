@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
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
                        <li class="breadcrumb-item active" aria-current="page">Subscriptions</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Subscriptions</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-12 col-lg-10 offset-lg-1 col-xl-10 offset-xl-1">
                
                <div class="card dash-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-3">
                                <div class="dash-widget dct-border-rht">
                                    <div class="circle-bar circle-bar1">
                                        <div class="circle-graph1" data-percent="75">
                                            <img src="{{asset('assets/img/icon-01.png')}}" class="img-fluid" alt="patient">
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>All Licenses</h6>
                                        <h3>{{$user->licenses->where('expire_at','>',now())->count()}}</h3>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-lg-3">
                                <div class="dash-widget dct-border-rht">
                                    <div class="circle-bar circle-bar2">
                                        <div class="circle-graph2" data-percent="65">
                                            <img src="{{asset('assets/img/icon-02.png')}}" class="img-fluid" alt="Patient">
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>Available License</h6>
                                        <h3>{{$user->availableLicenses->count()}}</h3>
                                    </div>
                                </div>
                            </div> 

                            <div class="col-md-12 col-lg-3">
                                <div class="dash-widget">
                                    <div class="circle-bar circle-bar3">
                                        <div class="circle-graph3" data-percent="50">
                                            <img src="{{asset('assets/img/icon-03.png')}}" class="img-fluid" alt="Patient">
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>All SMS Units</h6>
                                        <h3>{{$user->pharmacies->sum('sms_credit')}}</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-3">
                                <div class="dash-widget">
                                    <div class="circle-bar circle-bar3">
                                        <div class="circle-graph3" data-percent="50">
                                            <img src="{{asset('assets/img/icon-03.png')}}" class="img-fluid" alt="Patient">
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>Available SMS Units</h6>
                                        <h3>{{$user->availableSmsUnits->sum('available')}}</h3>
                                        {{-- <p class="text-muted">All time</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(session('flash_message'))
                    @include('layouts.main.flash')
                @endif
                <div class="card">
                    <div class="card-body pt-0">
                        <div class="user-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#billing" data-toggle="tab"> <span>Pharmacy Subscription</span> </a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="#assessments" data-toggle="tab">SMS Units</a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="tab-content">
                            
                            <!-- Billing Tab -->
                            <div id="billing" class="tab-pane fade show active">
                                    <!-- Doctor Widget -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="doc-info-cont">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h4 class="doc-name"><a href="doctor-profile.html">Available Licenses</a></h4>
                                                    <p class="doc-speciality">Lorem extraculate Immersia baptizo koinonia descripto</p>
                                                </div>
                                            
                                                <div class="clinic-booking">
                                                    <a class="view-pro-btn" href="{{route('subscription.create')}}">Buy Licenses</a>  
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>Licenses</th>
                                                        <th>Type</th>
                                                        <th>Durations</th>
                                                        <th>Assigned To</th>
                                                        <th></th>
                                                    </tr>
                                                    @forelse ($user->availableLicenses as $license)

                                                        <tr class="availableLicenses">
                                                            <td class="align-middle">{{$license->number}}</td>
                                                            <td class="align-middle">{{ucwords($license->payment_id ? $license->type : 'trial')}}</td>
                                                            <td class="align-middle">
                                                                {{$license->duration_days < 30 ? $license->duration_days.' Days' : intval($license->duration_days/30).' Months'}}
                                                                @if($license->expire_at). {{$license->expire_at->diffInDays(now())}} Days left @endif
                                                            </td>
                                                            <td class="align-middle">
                                                                <select class="form-control pharmacy">
                                                                    @foreach ($user->pharmacies as $pharmacy)
                                                                        <option value="{{$pharmacy->id}}">{{$pharmacy->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="d-none license">{{$license->id}}</span>
                                                            </td>
                                                            
                                                            <td class="align-middle">
                                                                <button class="btn btn-primary btn-sm assign_license">Complete</button>
                                                            </td>
                                                        </tr>

                                                    @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            No License Available
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                    
                                                </table>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">

                                        <div class="doc-info-cont">
                                            <h4 class="doc-name"><a href="doctor-profile.html">Current Subscription</a></h4>
                                            <p class="doc-speciality">Lorem extraculate Immersia baptizo koinonia descripto</p>
                                            
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>Pharmacy</th>
                                                        <th>License</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    @forelse ($user->activeLicenses as $license)
                                                    <tr>
                                                        <td class="align-middle">{{$license->pharmacy->name}}</td>
                                                        <td class="align-middle">{{$license->number}}</td>
                                                        <td class="align-middle">{{$license->start_at->format('jS \o\f M Y')}}</td>
                                                        <td class="align-middle">{{$license->expire_at->format('jS \o\f M Y')}}</td>
                                                        <td class="align-middle">
                                                            @if(!$license->status)
                                                                Disabled
                                                            @elseif($license->warn_at < now())
                                                                Expiring
                                                            @else Running
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @empty 
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            No Active Subscription
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </table>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- /Doctor Widget -->
                            </div>
                            <div id="assessments" class="tab-pane fade">
                                <!-- Doctor Widget -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                
                                                <div class="doc-info-cont border">
                                                    <div class="p-3">
                                                        <h4 class="doc-name">
                                                            SMS Balance
                                                        </h4>
                                                        <p class="doc-speciality">Lorem extraculate Immersia baptizo koinonia</p>
                                                    </div>
                                                    
                                                    {{-- <h5 class="doc-department">
                                                        Licenses:
                                                    </h5> --}}
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th>Pharmacy</th>
                                                                <th>Remaining</th>
                                                            </tr>
                                                            @foreach($user->pharmacies as $pharmacy)
                                                            <tr>
                                                                <td class="align-middle">{{$pharmacy->name}}</td>
                                                                <td class="align-middle">{{$pharmacy->sms_credit}}</td>   
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </table>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="doc-info-cont">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="p-3">
                                                            <h4 class="doc-name"> SMS Units </h4>
                                                            <p class="doc-speciality">Lorem extraculate Immersia baptizo koinonia descripto</p>
                                                        </div>
                                                        <div class="clinic-booking pt-3">
                                                            <a class="#" href="#buy_sms" data-toggle="modal">Buy SMS</a>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <th>Purchased Date</th>
                                                                <th>Purchased Units</th>
                                                                <th>Available</th>
                                                                <th></th>
                                                            </tr>
                                                            @forelse($user->availableSmsUnits as $sms)
                                                            <tr class="availableSmsUnits">
                                                                <td class="align-middle">{{$sms->created_at->calendar()}}</td>
                                                                <td class="align-middle">{{$sms->units}}</td>
                                                                <td class="align-middle sms_available">{{$sms->available}}</td>
                                                                
                                                                <td class="align-middle">
                                                                    <span class="d-none sms_id">{{$sms->id}}</span>
                                                                    <button class="btn btn-primary btn-sm allocate_sms">Allocate</button>
                                                                </td>
                                                                
                                                            </tr>
                                                            @empty
                                                            <tr>
                                                                <td colspan="6" class="text-center">
                                                                    No available units to allocate
                                                                </td>
                                                            </tr>
                                                            @endforelse
                                                            
                                                        </table>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Doctor Widget -->
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
@section('modals')
<div class="modal fade custom-modal add-modal" id="license_assignment">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign License
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <p class="text-center">You are about to assign a license to pharmacy:<br> 
                                    <span id="pharmacy_name"></span> </p>
                                <div class="mt-3">
                                    <div class="change-avatar justify-content-center">
                                        <form class="" action="{{route('subscription.update')}}" method="POST">@csrf
                                            <input type="hidden" name="pharmacy_id" id="pharmacy_id">
                                            <input type="hidden" name="license_id" id="license_id">
                                            <div class="input-group">
                                                <input type="text" name="license_number" placeholder="License Number" class="form-control">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary">Continue</button>
                                                </div>
                                            </div>
                                            <small class="form-text text-muted">Enter the license number to continue</small>
                                            
                                        </form>
                                        
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
<div class="modal fade custom-modal add-modal" id="sms_allocation">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Allocate SMS Units
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                
                                <div class="mt-3">
                                    <div class="change-avatar justify-content-center">
                                        <form class="" action="{{route('subscription.sms.allocation')}}" method="POST">@csrf
                                            <select name="pharmacy_id" class="form-control mb-3" required>
                                                <option value="null" selected disabled>Select Pharmacy</option>
                                                @foreach ($user->pharmacies as $pharmacy)
                                                    <option value="{{$pharmacy->id}}">{{$pharmacy->name}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="sms_id" id="sms_id">
                                            <div class="input-group">
                                                <input type="number" id="units" max="" name="units" placeholder="units" class="form-control">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary">Continue</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        
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
<div class="modal fade custom-modal add-modal" id="buy_sms">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buy SMS </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <p class="text-center">Enter Number of SMS units you want to purchase</p>
                                <div class="mt-3">
                                    <div class="change-avatar justify-content-center">
                                        <form class="" action="{{route('subscription.sms.purchase')}}" method="POST">@csrf
                                            <div class="input-group">
                                                <input type="number" name="sms_units" id="sms_units" value="1" placeholder="Units" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">{{$user->currency_symbol}}
                                                        <span id="sms_cost" class="d-none">{{$sms_cost}}</span>
                                                        <span class="sms_cost">{{$sms_cost}}</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group mt-2">
                                                <button class="btn btn-primary btn-block">Continue</button>
                                            </div>
                                            
                                            
                                            
                                        </form>
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
@endsection
@push('scripts')
<script src="{{asset('assets/js/jqueryui.min.js')}}"></script>
<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>
<script>
    $('.assign_license').click(function(){
        $('#license_id').val($(this).closest('.availableLicenses').find('.license').text())
        $('#pharmacy_id').val($(this).closest('.availableLicenses').find('.pharmacy').val())
        $('#pharmacy_name').text($(this).closest('.availableLicenses').find('.pharmacy').find(":selected").text())
        $('#license_assignment').modal('show')
    })
    $('.allocate_sms').click(function(){
        $('#sms_id').val($(this).closest('.availableSmsUnits').find('.sms_id').text())
        $('#units').attr('max',$(this).closest('.availableSmsUnits').find('.sms_available').text())
        $('#units').val($(this).closest('.availableSmsUnits').find('.sms_available').text())
        $('#sms_allocation').modal('show')
    })
    $('#sms_units').on('input',function(){
        $('.sms_cost').text(parseInt($('#sms_cost').text()) * $(this).val())
    })
</script>
@endpush






