@extends('layouts.admin.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<style>
  .email-app {
    display: flex;
    flex-direction: row;
    background: #fff;
    border: 1px solid #e1e6ef;
  }

  .email-app nav {
      flex: 0 0 200px;
      padding: 1rem;
      border-right: 1px solid #e1e6ef;
  }

  .email-app nav .btn-block {
      margin-bottom: 15px;
  }

  .email-app nav .nav {
      flex-direction: column;
  }

  .email-app nav .nav .nav-item {
      position: relative;
  }

  .email-app nav .nav .nav-item .nav-link,
  .email-app nav .nav .nav-item .navbar .dropdown-toggle,
  .navbar .email-app nav .nav .nav-item .dropdown-toggle {
      color: #151b1e;
      border-bottom: 1px solid #e1e6ef;
  }

  .email-app nav .nav .nav-item .nav-link i,
  .email-app nav .nav .nav-item .navbar .dropdown-toggle i,
  .navbar .email-app nav .nav .nav-item .dropdown-toggle i {
      width: 20px;
      margin: 0 10px 0 0;
      font-size: 14px;
      text-align: center;
  }

  .email-app nav .nav .nav-item .nav-link .badge,
  .email-app nav .nav .nav-item .navbar .dropdown-toggle .badge,
  .navbar .email-app nav .nav .nav-item .dropdown-toggle .badge {
      float: right;
      margin-top: 4px;
      margin-left: 10px;
  }

  .email-app main {
      min-width: 0;
      flex: 1;
      padding: 1rem;
  }

  .email-app .inbox .toolbar {
      padding-bottom: 1rem;
      border-bottom: 1px solid #e1e6ef;
  }

  .email-app .inbox .messages {
      padding: 0;
      list-style: none;
  }

  .email-app .inbox .message {
      position: relative;
      padding: 1rem 1rem 1rem 2rem;
      cursor: pointer;
      border-bottom: 1px solid #e1e6ef;
  }

  .email-app .inbox .message:hover {
      background: #f9f9fa;
  }

  .email-app .inbox .message .actions {
      position: absolute;
      left: 0;
      display: flex;
      flex-direction: column;
  }

  .email-app .inbox .message .actions .action {
      width: 2rem;
      margin-bottom: 0.5rem;
      color: #c0cadd;
      text-align: center;
  }

  .email-app .inbox .message a {
      color: #000;
  }

  .email-app .inbox .message a:hover {
      text-decoration: none;
  }

  .email-app .inbox .message.unread .email-header,
  .email-app .inbox .message.unread .title {
      font-weight: bold;
  }

  .email-app .inbox .message .email-header {
      display: flex;
      flex-direction: row;
      margin-bottom: 0.5rem;
  }

  .email-app .inbox .message .email-header .date {
      margin-left: auto;
  }

  .email-app .inbox .message .title {
      margin-bottom: 0.5rem;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
  }

  .email-app .inbox .message .description {
      font-size: 12px;
  }

  .email-app .message .toolbar {
      padding-bottom: 1rem;
      border-bottom: 1px solid #e1e6ef;
  }

  .email-app .message .details .title {
      padding: 1rem 0;
      font-weight: bold;
  }

  .email-app .message .details .email-header {
      display: flex;
      padding: 1rem 0;
      margin: 1rem 0;
      border-top: 1px solid #e1e6ef;
      border-bottom: 1px solid #e1e6ef;
  }

  .email-app .message .details .email-header .avatar {
      width: 40px;
      height: 40px;
      margin-right: 1rem;
  }

  .email-app .message .details .email-header .from {
      font-size: 12px;
      color: #9faecb;
      align-self: center;
  }

  .email-app .message .details .email-header .from span {
      display: block;
      font-weight: bold;
  }

  .email-app .message .details .email-header .date {
      margin-left: auto;
  }

  .email-app .message .details .attachments {
      padding: 1rem 0;
      margin-bottom: 1rem;
      border-top: 3px solid #f9f9fa;
      border-bottom: 3px solid #f9f9fa;
  }

  .email-app .message .details .attachments .attachment {
      display: flex;
      margin: 0.5rem 0;
      font-size: 12px;
      align-self: center;
  }

  .email-app .message .details .attachments .attachment .badge {
      margin: 0 0.5rem;
      line-height: inherit;
  }

  .email-app .message .details .attachments .attachment .menu {
      margin-left: auto;
  }

  .email-app .message .details .attachments .attachment .menu a {
      padding: 0 0.5rem;
      font-size: 14px;
      color: #e1e6ef;
  }

  @media (max-width: 767px) {
      .email-app {
          flex-direction: column;
      }
      .email-app nav {
          flex: 0 0 100%;
      }
  }

  @media (max-width: 575px) {
      .email-app .message .email-header {
          flex-flow: row wrap;
      }
      .email-app .message .email-header .date {
          flex: 0 0 100%;
      }
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
                    <li class="breadcrumb-item active">Ticket #1291032</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Header -->
    <div class="row">
        <div class="col-sm-12">
           <div class="email-app mb-4">
            <main class="message">
              <div class="toolbar">
                <a href="{{route('admin.support.inbox')}}" class="btn btn-danger">Back to Tickets</a>
                <div class="btn-group">
                  <button type="button" class="btn btn-light">
                    <span class="fa fa-star"></span>
                  </button>
                  <button type="button" class="btn btn-light">
                    <span class="fa fa-star-o"></span>
                  </button>
                  <button type="button" class="btn btn-light">
                    <span class="fa fa-bookmark-o"></span>
                  </button>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-light">
                    <span class="fa fa-mail-reply"></span>
                  </button>
                  <button type="button" class="btn btn-light">
                    <span class="fa fa-mail-reply-all"></span>
                  </button>
                  <button type="button" class="btn btn-light">
                    <span class="fa fa-mail-forward"></span>
                  </button>
                </div>
                <button type="button" class="btn btn-light">
                  <span class="fa fa-trash-o"></span>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                    <span class="fa fa-tags"></span>
                    <span class="caret"></span>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">add label <span class="badge badge-danger"> Home</span></a>
                    <a class="dropdown-item" href="#">add label <span class="badge badge-info"> Job</span></a>
                    <a class="dropdown-item" href="#">add label <span class="badge badge-success"> Clients</span></a>
                    <a class="dropdown-item" href="#">add label <span class="badge badge-warning"> News</span></a>
                  </div>
                </div>
              </div>
              <div class="details">
                <div class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</div>
                <div class="email-header">
                  <img class="avatar" src="{{asset('adminassets/img/doctors/doctor-thumb-01.jpg')}}">
                  <div class="from">
                    <span>Lukasz Holeczek</span>
                    lukasz@bootstrapmaster.com
                  </div>
                  <div class="date">Today, <b>3:47 PM</b></div>
                </div>
                <div class="content">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                    in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </p>
                  <blockquote>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                    in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </blockquote>
                </div>
                <div class="attachments">
                  <div class="attachment">
                    <span class="badge badge-danger">zip</span> <b>bootstrap.zip</b> <i>(2,5MB)</i>
                    <span class="menu">
                      <a href="#" class="fa fa-search"></a>
                      <a href="#" class="fa fa-share"></a>
                      <a href="#" class="fa fa-cloud-download"></a>
                    </span>
                  </div>
                  <div class="attachment">
                    <span class="badge badge-info">txt</span> <b>readme.txt</b> <i>(7KB)</i>
                    <span class="menu">
                      <a href="#" class="fa fa-search"></a>
                      <a href="#" class="fa fa-share"></a>
                      <a href="#" class="fa fa-cloud-download"></a>
                    </span>
                  </div>
                  <div class="attachment">
                    <span class="badge badge-success">xls</span> <b>spreadsheet.xls</b> <i>(984KB)</i>
                    <span class="menu">
                      <a href="#" class="fa fa-search"></a>
                      <a href="#" class="fa fa-share"></a>
                      <a href="#" class="fa fa-cloud-download"></a>
                    </span>
                  </div>
                </div>
                <form method="post" action="">
                  <div class="form-group">
                    <textarea class="form-control" id="message" name="body" rows="12" placeholder="Click here to reply"></textarea>
                  </div>
                  <div class="form-group">
                    <button tabindex="3" type="submit" class="btn btn-success">Send message</button>
                  </div>
                </form>
              </div>
            </main>
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
                    <h5 class="modal-title">Add Drug</h5>
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

