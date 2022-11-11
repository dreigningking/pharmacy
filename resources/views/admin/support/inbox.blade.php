@extends('layouts.admin.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<style>
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: 0;
    }
    .mailbox-widget .custom-tab .nav-item .nav-link {
        border: 0;
        color: #fff;
        border-bottom: 3px solid transparent;
    }
    .mailbox-widget .custom-tab .nav-item .nav-link.active {
        background: 0 0;
        color: #fff;
        border-bottom: 3px solid #2cd07e;
    }
    .no-wrap td, .no-wrap th {
        white-space: nowrap;
    }
    .table td, .table th {
        padding: .9375rem .4rem;
        vertical-align: top;
        border-top: 1px solid rgba(120,130,140,.13);
    }
    .font-light {
        font-weight: 300;
    }
</style>
@endpush
@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Support</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Support</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                {{-- <div class="card-header">
                    <a href="#add" data-toggle="modal" class="btn btn-primary"> Add New</a>
                    <a href="{{route('admin.drugs.upload')}}" class="btn btn-info"> Upload</a>
                </div> --}}
                <div class="card-body bg-primary text-white mailbox-widget py-0">
                    <ul class="nav nav-tabs custom-tab border-bottom-0 " id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="inbox-tab" data-toggle="tab" aria-controls="inbox" href="#inbox" role="tab" aria-selected="true">
                                <span class="d-block d-md-none"><i class="ti-email"></i></span>
                                <span class="d-none d-md-block"> INBOX</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sent-tab" data-toggle="tab" aria-controls="sent" href="#sent" role="tab" aria-selected="false">
                                <span class="d-block d-md-none"><i class="ti-export"></i></span>
                                <span class="d-none d-md-block">SENT</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="spam-tab" data-toggle="tab" aria-controls="spam" href="#spam" role="tab" aria-selected="false">
                                <span class="d-block d-md-none"><i class="ti-panel"></i></span>
                                <span class="d-none d-md-block">ARCHIVED</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="delete-tab" data-toggle="tab" aria-controls="delete" href="#delete" role="tab" aria-selected="false">
                                <span class="d-block d-md-none"><i class="ti-trash"></i></span>
                                <span class="d-none d-md-block">DELETED</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="inbox" aria-labelledby="inbox-tab" role="tabpanel">
                        <div>
                            <div class="row p-4 no-gutters align-items-center">
                                <div class="col-sm-12 col-md-6">
                                    <h3 class="font-light mb-0"><i class="ti-email mr-2"></i>350 Unread emails</h3>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <ul class="list-inline dl mb-0 float-left float-md-right">
                                        <li class="list-inline-item text-info mr-3">
                                            <a href="#add" data-toggle="modal">
                                                <button class="btn btn-circle btn-success text-white" href="javascript:void(0)">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                <span class="ml-2 font-normal text-dark">Compose</span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item text-danger">
                                            <a href="#">
                                                <button class="btn btn-circle btn-danger text-white" href="javascript:void(0)">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <span class="ml-2 font-normal text-dark">Delete</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Mail list-->
                            <div class="table-responsive">
                                <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
                                    <tbody>
                                        <!-- row -->
                                        <tr>
                                            <!-- label -->
                                            <td class="pl-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cst1" />
                                                    <label class="custom-control-label" for="cst1">&nbsp;</label>
                                                </div>
                                            </td>
                                            <!-- star -->
                                            <td><i class="fa fa-star text-warning"></i></td>
                                            <td>
                                                <a class="link" href="{{route('admin.support.read')}}">
                                                    <span class="mb-0 text-muted">Hritik Roshan</span>
                                                </a>
                                            </td>
                                            <!-- Message -->
                                            <td>
                                                <a class="link" href="{{route('admin.support.read')}}">
                                                    <span class="badge badge-pill text-white font-medium badge-danger mr-2">Work</span>
                                                    <span class="text-dark">Lorem ipsum perspiciatis-</span>
                                                </a>
                                            </td>
                                            <!-- Attachment -->
                                            <td><i class="fa fa-paperclip text-muted"></i></td>
                                            <!-- Time -->
                                            <td class="text-muted">May 13</td>
                                        </tr>
                                        <!-- row -->
                                        <tr>
                                            <!-- label -->
                                            <td class="pl-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cst2" />
                                                    <label class="custom-control-label" for="cst2">&nbsp;</label>
                                                </div>
                                            </td>
                                            <!-- star -->
                                            <td><i class="fa fa-star"></i></td>
                                            <!-- User -->
                                            <td>
                                                <span class="mb-0 text-muted">Genelia Roshan</span>
                                            </td>
                                            <!-- Message -->
                                            <td>
                                                <a class="link" href="javascript: void(0)">
                                                    <span class="badge badge-pill text-white font-medium badge-info mr-2">Business</span>
                                                    <span class="text-dark">Inquiry about license for Admin </span>
                                                </a>
                                            </td>
                                            <!-- Attachment -->
                                            <td><i class="fa fa-paperclip text-muted"></i></td>
                                            <!-- Time -->
                                            <td class="text-muted">May 13</td>
                                        </tr>
                                        <!-- row -->
                                        <tr>
                                            <!-- label -->
                                            <td class="pl-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cst3" />
                                                    <label class="custom-control-label" for="cst3">&nbsp;</label>
                                                </div>
                                            </td>
                                            <!-- star -->
                                            <td><i class="fa fa-star text-warning"></i></td>
                                            <!-- User -->
                                            <td class="user-name max-texts">
                                                <span class="mb-0 text-muted font-light">Ritesh Deshmukh</span>
                                            </td>
                                            <!-- Message -->
                                            <td>
                                                <a class="link" href="javascript: void(0)">
                                                    <span class="badge badge-pill text-white font-medium badge-warning mr-2">Friend</span>
                                                    <span class="font-light text-dark">Bitbucket (commit Pushed) by Ritesh</span>
                                                </a>
                                            </td>
                                            <!-- Attachment -->
                                            <td><i class="fa fa-paperclip text-muted"></i></td>
                                            <!-- Time -->
                                            <td class="text-muted font-light">May 13</td>
                                        </tr>
                                        <!-- row -->
                                        <tr class="">
                                            <!-- label -->
                                            <td class="pl-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cst4" />
                                                    <label class="custom-control-label" for="cst4">&nbsp;</label>
                                                </div>
                                            </td>
                                            <!-- star -->
                                            <td><i class="fa fa-star"></i></td>
                                            <!-- User -->
                                            <td>
                                                <span class="mb-0 text-muted font-light">Akshay Kumar</span>
                                            </td>
                                            <!-- Message -->
                                            <td>
                                                <a class="link" href="javascript: void(0)">
                                                    <span class="badge badge-pill text-white font-medium badge-info mr-2">Work</span><span class="font-light text-dark">Perspiciatis unde omnis- iste Lorem ipsum</span>
                                                </a>
                                            </td>
                                            <!-- Attachment -->
                                            <td><i class="fa fa-paperclip text-muted"></i></td>
                                            <!-- Time -->
                                            <td class="text-muted font-light">May 9</td>
                                        </tr>
                                        <!-- row -->
                                        <tr class="">
                                            <!-- label -->
                                            <td class="pl-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cst5" />
                                                    <label class="custom-control-label" for="cst5">&nbsp;</label>
                                                </div>
                                            </td>
                                            <!-- star -->
                                            <td><i class="fa fa-star"></i></td>
                                            <!-- User -->
                                            <td>
                                                <span class="mb-0 text-muted font-light">John Abraham</span>
                                            </td>
                                            <!-- Message -->
                                            <td>
                                                <a class="link" href="javascript: void(0)">
                                                    <span class="badge badge-pill text-white font-medium badge-success mr-2">Work</span> <span class="font-light text-dark">Lorem ipsum perspiciatis- unde omnis</span>
                                                </a>
                                            </td>
                                            <!-- Attachment -->
                                            <td><i class="fa fa-paperclip text-muted"></i></td>
                                            <!-- Time -->
                                            <td class="text-muted font-light">Mar 10</td>
                                        </tr>
                                        <!-- row -->
                                        <tr class="">
                                            <!-- label -->
                                            <td class="pl-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cst6" />
                                                    <label class="custom-control-label" for="cst6">&nbsp;</label>
                                                </div>
                                            </td>
                                            <!-- star -->
                                            <td><i class="fa fa-star text-warning"></i></td>
                                            <!-- User -->
                                            <td>
                                                <span class="mb-0 text-muted font-light">Akshay Kumar</span>
                                            </td>
                                            <!-- Message -->
                                            <td>
                                                <a class="link" href="javascript: void(0)">
                                                    <span class="badge badge-pill text-white font-medium badge-success mr-2">Work</span> <span class="font-light text-dark">Lorem ipsum perspiciatis - unde</span>
                                                </a>
                                            </td>
                                            <!-- Attachment -->
                                            <td><i class="fa fa-paperclip text-muted"></i></td>
                                            <!-- Time -->
                                            <td class="text-muted font-light">Mar 09</td>
                                        </tr>
                                        <!-- row -->
                                        <tr class="">
                                            <!-- label -->
                                            <td class="pl-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cst7" />
                                                    <label class="custom-control-label" for="cst7">&nbsp;</label>
                                                </div>
                                            </td>
                                            <!-- star -->
                                            <td><i class="fa fa-star text-warning"></i></td>
                                            <!-- User -->
                                            <td>
                                                <span class="mb-0 text-muted font-light">Hanna Gover</span>
                                            </td>
                                            <!-- Message -->
                                            <td>
                                                <a class="link" href="javascript: void(0)">
                                                    <span class="badge badge-pill text-white font-medium badge-danger mr-2">Work</span><span class="font-light text-dark"> Unde omnis Lorem ipsum perspiciatis</span>
                                                </a>
                                            </td>
                                            <!-- Attachment -->
                                            <td><i class="fa fa-paperclip text-muted"></i></td>
                                            <!-- Time -->
                                            <td class="text-muted font-light">Mar 09</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sent" aria-labelledby="sent-tab" role="tabpanel">
                        <div class="row p-3 text-dark">
                            <div class="col-md-6">
                                <h3 class="font-light">Lets check profile</h3>
                                <h4 class="font-light">you can use it with the small code</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="spam" aria-labelledby="spam-tab" role="tabpanel">
                        <div class="row p-3 text-dark">
                            <div class="col-md-6">
                                <h3 class="font-light">Come on you have a lot message</h3>
                                <h4 class="font-light">you can use it with the small code</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="delete" aria-labelledby="delete-tab" role="tabpanel">
                        <div class="row p-3 text-dark">
                            <div class="col-md-6">
                                <h3 class="font-light">Just do Settings</h3>
                                <h4 class="font-light">you can use it with the small code</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modals')
    <div class="modal fade custom-modal add-modal" id="add">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Compose New Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="#" class="needs-validation" novalidate>
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">To:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" placeholder="Drug Name" >
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Category:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="name">
                                            <option>Anti-Malaria</option>
                                            <option>Anti-Biotics</option>
                                            <option>Anti-Septic</option>
                                            <option>Pain Killers</option>
                                            <option>Vitamins</option>
                                            <option>Anti-Burn</option>
                                        </select>
                                    </div>
                                </div>        
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">API A:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="form-control" name="name">
                                            <option value="">Arthemeter</option>
                                            <option value="">Lumenfantrine</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="mg" placeholder="" id="">
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">API B:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="form-control" name="name">
                                            <option value="">Arthemeter</option>
                                            <option value="">Lumenfantrine</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="mg" placeholder="mg" id="">
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">API C:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="form-control" name="name">
                                            <option value="">Arthemeter</option>
                                            <option value="">Lumenfantrine</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="mg" placeholder="mg" id="">
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Manufacturer:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name"  >
                                    </div>
                                </div> 
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Dosage:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name"   >
                                    </div>
                                </div>   

                                <div class="d-flex my-2 justify-content-between">
                                    <div class="">
                                        <a href="#" class="btn btn-success">Save</a>
                                    </div>
                                    <div class="">
                                        <a href="#" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                                
                                {{-- <button type="submit" class="btn btn-primary pl-4 pr-4 mt-2">Submit</button> --}}
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade custom-modal add-modal" id="edit">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Drug</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="#" class="needs-validation" novalidate>
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Name:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" value="Lonart" >
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Category:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="name">
                                            <option selected>Anti-Malaria</option>
                                            <option>Anti-Biotics</option>
                                            <option>Anti-Septic</option>
                                            <option>Pain Killers</option>
                                            <option>Vitamins</option>
                                            <option>Anti-Burn</option>
                                        </select>
                                    </div>
                                </div>        
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">API A:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="form-control" name="name">
                                            <option value="" selected>Arthemeter</option>
                                            <option value="">Lumenfantrine</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="mg" value="20mg" id="">
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">API B:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="form-control" name="name">
                                            <option value="">Arthemeter</option>
                                            <option value="" selected>Lumenfantrine</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="mg" value="50mg" id="">
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">API C:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="form-control" name="name">
                                            <option value="" disabled>Select</option>
                                            <option value="">Arthemeter</option>
                                            <option value="">Lumenfantrine</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="mg" placeholder="mg" id="">
                                    </div>
                                </div>    
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Manufacturer:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" value="Microsoft Inc" >
                                    </div>
                                </div> 
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <label for="sel1">Dosage:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" value="Oral"  >
                                    </div>
                                </div>   

                                <div class="d-flex my-2 justify-content-between">
                                    <div class="">
                                        <a href="#" class="btn btn-success">Update</a>
                                    </div>
                                    <div class="">
                                        <a href="#" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                                
                                {{-- <button type="submit" class="btn btn-primary pl-4 pr-4 mt-2">Submit</button> --}}
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade custom-modal add-modal" id="delete">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Drug</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Are you sure you want to delete this drug from the master datalist</p>
                            
                            <button class="btn btn-danger">Continue</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
{{-- <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/datatables.min.js')}}"></script> --}}
@endpush
