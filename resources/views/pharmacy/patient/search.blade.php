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
                <div class="call-wrapper">
                    <div class="call-main-row">
                        <div class="call-main-wrapper">
                            <div class="call-view">
                                <div class="call-window">
                                
                                    <!-- Call Header -->
                                    <div class="fixed-header">
                                        <div class="navbar">
                                            <div class="user-details mr-auto">
                                                <div class="float-left user-img">
                                                    <a class="avatar avatar-sm mr-2" href="patient-profile.html" title="Charlene Reed">
                                                        <img src="assets/img/patients/patient1.jpg" alt="User Image" class="rounded-circle">
                                                        <span class="status online"></span>
                                                    </a>
                                                </div>
                                                <div class="user-info float-left">
                                                    <a href="patient-profile.html"><span>Charlene Reed</span></a>
                                                    <span class="last-seen">Online</span>
                                                </div>
                                            </div>
                                            <ul class="nav float-right custom-menu">
                                                <li class="nav-item dropdown dropdown-action">
                                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="javascript:void(0)" class="dropdown-item">Settings</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Call Header -->
                                    
                                    <!-- Call Contents -->
                                    <div class="call-contents">
                                        <div class="call-content-wrap">
                                            <div class="voice-call-avatar">
                                                <img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image" class="call-avatar">
                                                <span class="username">Dr. Darren Elder</span>
                                                <span class="call-timing-count">00:59</span>
                                            </div>
                                            <div class="call-users">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/img/patients/patient1.jpg" class="img-fluid" alt="User Image">
                                                            <span class="call-mute"><i class="fa fa-microphone-slash"></i></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Call Contents -->
                                    
                                    <!-- Call Footer -->
                                    <div class="call-footer">
                                        <div class="call-icons">
                                            <ul class="call-items">
                                                <li class="call-item">
                                                    <a href="#" title="Enable Video" data-placement="top" data-toggle="tooltip">
                                                        <i class="fas fa-video camera"></i>
                                                    </a>
                                                </li>
                                                <li class="call-item">
                                                    <a href="#" title="Mute" data-placement="top" data-toggle="tooltip">
                                                        <i class="fa fa-microphone microphone"></i>
                                                    </a>
                                                </li>
                                                <li class="call-item">
                                                    <a href="#" title="Add User" data-placement="top" data-toggle="tooltip">
                                                        <i class="fa fa-user-plus"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="end-call">
                                                <a href="javascript:void(0);">
                                                    <i class="material-icons">call_end</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Call Footer -->
                                
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

</div>

</div>
<!-- /Page Content -->

@endsection

@push('scripts')
<script>
$(".physical-assessment").on('click', '.trash', function() {
    $(this).closest('.physical').remove();
    return false;
});
$(".add-physical").on('click', function() {
    console.log("meh")
    var regcontent = ' <div class="col-11 physical d-flex">' +
        ' <div class="col-md-6 pr-0 pl-0">' +
        '<div class="form-group row">' +
        ' <div class="col-lg-11">' +
        '<select class="form-control" id="sel1">' +
        '<option value="Temp (&deg;c)">Temp (&deg;c)</option>' +
        '<option value="BP (mmHg)">BP (mmHg)</option>' +
        '<option value="PR (Beats/min)">PR (Beats/min)</option>' +
        '<option value="Wt (Kg)">Wt (Kg)</option>' +
        '<option value="Ht (m)">Ht (m)</option>' +
        ' </select>' +
        '</div>' +
        '</div>' +
        '</div>' +
        ' <div class="col-md-6 pr-0 pl-0">' +
        ' <div class="form-group row">' +
        ' <div class="col-lg-11">' +
        '<input type="text" class="form-control">' +
        ' </div>' +
        ' </div>' +
        ' </div>' +
        '<div class="col-1 pr-0 pl-0 d-flex align-items-start justify-content-end" >' +
        '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
        '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
        '</div>' +
        '</div>';

    $(".physical-assessment").append(regcontent);
    return false;
});


$(".past-med").on('click', '.trash', function() {
    $(this).closest('.past').remove();
    return false;
});
$(".add-past").on('click', function() {
    console.log("meh")
    var regcontent = ' <div class = "col-11 physical d-flex align-items-start mt-2 mb-2 past" > ' +
        ' <div class="col-md-7 pl-0 pr-0">' +
        '<div class="form-group row">' +
        ' <div class="col-lg-11">' +
        '<div class="form-group d-flex align-items-center">' +
        '<label for="usr">Medication:</label>' +
        '<input type="text" name="" id="" class = "ml-2 form-control" > ' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        ' <div class="col-md-4 pr-0 pl-0">' +
        ' <div class="form-group row">' +
        '<div class="col-lg-4">' +
        '<p>Effective?</p>' +
        '</div>' +
        '<div class="col-lg-8">' +
        '<div class="form-check-inline">' +
        '<label class="form-check-label">' +
        '<input type="radio" class="form-check-input" name = "optradio" > Yes ' +
        '</label>' +
        '</div>' +
        '<div class="form-check-inline">' +
        '<label class="form-check-label">' +
        '<input type="radio" class="form-check-input" name = "optradio" > No ' +
        '</label>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '<div class="col-1 pr-0 pl-0 d-flex align-items-start justify-content-end" >' +
        '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
        '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
        '</div>' +
        '</div>' +
        '</div>';

    $(".past-med").append(regcontent);
    return false;
});



$(".plans").on('click', '.trash', function() {
    $(this).closest('.plan').remove();
    return false;
});
$(".add-plan").on('click', function() {
    console.log("meh")
    var regcontent = '<div class="col-md-12 pl-0 plan">' +
        ' <div class="form-group row">' +
        '<label class="col-lg-2 col-form-label pr-0"></label>' +
        '<div class="col-lg-9">' +
        '<input type="text" class="form-control">' +
        '</div>' +
        '<div class="col-1 pr-0 pl-0 d-flex align-items-start justify-content-end" >' +
        '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
        '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
        '</div>' +
        '</div>' +

        '</div>';

    $(".plans").append(regcontent);
    return false;
});
</script>
@endpush