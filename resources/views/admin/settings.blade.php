@extends('layouts.admin.app')
@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Settings</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Others</a>
                    </li>
                </ul>
            </div>	
            <div class="tab-content profile-tab-cont">
                
                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">
                
                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>General Settings</span> 
                                        <a class="edit-link" data-toggle="modal" href="#"><i class="fa fa-edit mr-1"></i>Edit</a>
                                    </h5>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Name of application</p>
                                        <p class="col-sm-10">John Doe</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted  mb-0 mb-sm-3">VAT</p>
                                        <p class="col-sm-10">5%</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted  mb-0 mb-sm-3">Currency</p>
                                        <p class="col-sm-10">Nigeria</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted  mb-0 mb-sm-3"> Auto Delete Expired Medications </p>
                                        <p class="col-sm-10">Yes</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted  mb-0">Company Address</p>
                                        <p class="col-sm-10 mb-0">4663  Agriculture Lane,<br>
                                        Miami,<br>
                                        Florida - 33165,<br>
                                        United States.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Edit Details Modal -->
                            <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Personal Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row form-row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control" value="John">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control" value="Doe">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Date of Birth</label>
                                                            <div class="cal-icon">
                                                                <input type="text" class="form-control" value="24-07-1983">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Email ID</label>
                                                            <input type="email" class="form-control" value="johndoe@example.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Mobile</label>
                                                            <input type="text" value="+1 202-555-0125" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="form-title"><span>Address</span></h5>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                        <label>Address</label>
                                                            <input type="text" class="form-control" value="4663 Agriculture Lane">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" value="Miami">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>State</label>
                                                            <input type="text" class="form-control" value="Florida">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Zip Code</label>
                                                            <input type="text" class="form-control" value="22434">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <input type="text" class="form-control" value="United States">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Edit Details Modal -->
                            
                        </div>

                    
                    </div>
                    <!-- /Personal Details -->

                </div>
                <!-- /Personal Details Tab -->
                
                <!-- Change Password Tab -->
                <div id="password_tab" class="tab-pane fade">
                
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Notications</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">
                                    <table class="table table-hover table-center mb-0">
                                        
                                        <tbody>
                                            <tr>
                                                <td>Send mail to subscribers 2weeks to subscription expiry</td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_1" class="check" checked>
                                                        <label for="status_1" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>      
                                            </tr>
                                            <tr>
                                                <td>Send mail to patients on patient add</td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_1" class="check" checked>
                                                        <label for="status_1" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>      
                                            </tr>
                                            <tr>
                                                <td>Send prescription to patient email</td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_1" class="check" checked>
                                                        <label for="status_1" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>      
                                            </tr>
                                            <tr>
                                                <td>Send follow-up email to patient after treatment</td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_1" class="check" checked>
                                                        <label for="status_1" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>      
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Change Password Tab -->
                
            </div>
        </div>
    </div>

</div>
@endsection