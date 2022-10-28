@extends('layouts.admin.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

<!-- Datatables CSS -->
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
@endpush
@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Medicines</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Drugs</li>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>License Number</th>
                                    <th>Plan</th>
                                    <th>Validity Period</th>
                                    <th>Status</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}" alt="User Image"></a>
                                            <a href="profile.html">Dr. Ruby Perrin</a>
                                        </h2>
                                    </td>
                                    <td>LBDKKL83948343</td>
                                    <td>
                                        <h2>
                                            Gold Plan
                                        </h2>
                                    </td>
                                    <td>23 Nov 2019 - 12 Dec 2022</td>
                                    <td>
                                        <div class="status-toggle">
                                            <input type="checkbox" id="status_1" class="check" checked>
                                            <label for="status_1" class="checktoggle">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        $200.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image"></a>
                                            <a href="profile.html">Dr. Darren Elder</a>
                                        </h2>
                                    </td>
                                    <td>LBDKKL83948343</td>
                                    <td>
                                        <h2>
                                            Gold Plan
                                        </h2>
                                    </td>
                                    
                                    <td>23 Nov 2019 - 12 Dec 2022</td>
                                    <td>
                                        <div class="status-toggle">
                                            <input type="checkbox" id="status_2" class="check" checked>
                                            <label for="status_2" class="checktoggle">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        $300.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-03.jpg')}}" alt="User Image"></a>
                                            <a href="profile.html">Dr. Deborah Angel</a>
                                        </h2>
                                    </td>
                                    <td>LBDKKL83j45458343</td>
                                    <td>
                                        <h2>
                                            Gold Plan
                                        </h2>
                                    </td>
                                    <td>23 Nov 2019 - 12 Dec 2022</td>
                                    <td>
                                        <div class="status-toggle">
                                            <input type="checkbox" id="status_3" class="check" checked>
                                            <label for="status_3" class="checktoggle">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        $150.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-04.jpg')}}" alt="User Image"></a>
                                            <a href="profile.html">Dr. Sofia Brient</a>
                                        </h2>
                                    </td>
                                    <td>LBDKKL4345458343</td>
                                    <td>
                                        <h2>
                                            Gold Plan
                                        </h2>
                                    </td>
                                    <td>23 Nov 2019 - 12 Dec 2022</td>
                                    <td>
                                        <div class="status-toggle">
                                            <input type="checkbox" id="status_4" class="check" checked>
                                            <label for="status_4" class="checktoggle">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        $150.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-05.jpg')}}" alt="User Image"></a>
                                            <a href="profile.html">Dr. Marvin Campbell</a>
                                        </h2>
                                    </td>
                                    <td>LBDKKL4345458343</td>
                                    <td>
                                        <h2>
                                            Gold Plan
                                        </h2>
                                    </td>
                                    
                                    <td>23 Nov 2019 - 12 Dec 2022</td>
                                    <td>
                                        <div class="status-toggle">
                                            <input type="checkbox" id="status_5" class="check" checked>
                                            <label for="status_5" class="checktoggle">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        $200.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-06.jpg')}}" alt="User Image"></a>
                                            <a href="profile.html">Dr. Katharine Berthold</a>
                                        </h2>
                                    </td>
                                    <td>LBDKKL4345458343</td>
                                    <td>
                                        <h2>
                                            Gold Plan
                                        </h2>
                                    </td>
                                    
                                    <td>23 Nov 2019 - 12 Dec 2022</td>
                                    <td>
                                        <div class="status-toggle">
                                            <input type="checkbox" id="status_5" class="check" checked>
                                            <label for="status_5" class="checktoggle">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        $250.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-07.jpg')}}" alt="User Image"></a>
                                            <a href="profile.html">Dr. Linda Tobin</a>
                                        </h2>
                                    </td>
                                    <td>NeLBDKKL4345458343</td>
                                    <td>
                                        <h2>
                                            Gold Plan
                                        </h2>
                                    </td>
                                    
                                    <td>23 Nov 2019 - 12 Dec 2022</td>
                                    <td>
                                        <div class="status-toggle">
                                            <input type="checkbox" id="status_5" class="check" checked>
                                            <label for="status_5" class="checktoggle">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        $260.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-08.jpg')}}" alt="User Image"></a>
                                            <a href="profile.html">Dr. Paul Richard</a>
                                        </h2>
                                    </td>
                                    <td>LBDKKL4345458343</td>
                                    <td>
                                        <h2>
                                            Silver Plan
                                        </h2>
                                    </td>
                                    
                                    <td>23 Nov 2019 - 12 Dec 2022</td>
                                    <td>
                                        <div class="status-toggle">
                                            <input type="checkbox" id="status_5" class="check" checked>
                                            <label for="status_5" class="checktoggle">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        $260.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-09.jpg')}}" alt="User Image"></a>
                                            <a href="profile.html">Dr. John Gibbs</a>
                                        </h2>
                                    </td>
                                    <td>LBDKKL83948343</td>
                                    <td>
                                        <h2>
                                            Gold Plan
                                        </h2>
                                    </td>
                                    
                                    <td>23 Nov 2019 - 12 Dec 2022</span></td>
                                    <td>
                                        <div class="status-toggle">
                                            <input type="checkbox" id="status_5" class="check" checked>
                                            <label for="status_5" class="checktoggle">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        $300.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-10.jpg')}}" alt="User Image"></a>
                                            <a href="profile.html">Dr. Olga Barlow</a>
                                        </h2>
                                    </td>
                                    <td>LBDKKL83948343</td>
                                    <td>
                                        <h2>
                                            Gold Plan
                                        </h2>
                                    </td>
                                    
                                    <td>23 Nov 2019 - 12 Dec 2022</td>
                                    <td>
                                        <div class="status-toggle">
                                            <input type="checkbox" id="status_5" class="check" checked>
                                            <label for="status_5" class="checktoggle">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        $300.00
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
@endpush
