@extends('layouts.admin.app')
@section('title', 'Rejected Loans')
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
              <h3 class="page-title">Assessments Settings</h3>
              <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Assessment</a></li>
                  <li class="breadcrumb-item active">Conditions</li>
              </ul>
          </div>
      </div>
  </div>
  <!-- /Page Header -->
  <div class="row">
      <div class="col-sm-12">
        <div class="card card-body">
          <div class="bg-white p-3 d-flex justify-content-between align-items-center">
            <h5 class='m-0 p-0'>Filter</h5>
            <form action="{{route('rejected_applications')}}" method="GET" class="d-flex gap-3 justify-content-between align-items-center">
              <input name="month" type="month" class="form-control" value="{{$date}}">
              <button type="submit" class='btn btn-secondary'>Filter</button>
            </form>
          </div>
          <hr>

          <div class="table-responsive">
            <table class="table nowrap">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>IPPIS</th>
                  <th>Customer's Name</th>
                  <th>Amount(₦)</th>
                  <th>Phone</th>
                  <th>Loan Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($applications as $application)
                <tr>
                  <td>{{date_format($application->date_created, 'D, d M Y')}}</td>
                  <td>{{$application->ippis}}</td>
                  <td>{{$application->loan_agree}}</td>
                  <td>{{$application->requested}}</td>
                  <td>{{$application->tel_no}}</td>
                  <td>{{$application->loan_status}}</td>
                  <td>
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{'loanModal'.$application->id}}" data-bs-target="#Modal"><i class="uil uil-eye"></i></a>
                    <!-- modal -->
                    <div class="modal fade" id="{{'loanModal'.$application->id}}" tabindex="-1" aria-labelledby="{{'loanModal'.$application->id}}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="loanModal">Loan Status</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h5>{{$application->verification->verify_loan_title}}</h5>
                            <p>{{$application->verification->verify_loan_desc}}</p>
                          </div>
                          <div class="modal-footer">
                            <a href="employer?ippis={{$application->ippis}}" class="btn btn-primary">View Loan</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- modal -->
                  </td>
                </tr>
                @endforeach
                @foreach($reapplications as $reapplication)
                <tr>
                  <td>{{date_format($reapplication->date_created, 'D, d M Y')}}</td>
                  <td>{{$reapplication->ippis}}</td>
                  <td>{{$reapplication->application->loan_agree}}</td>
                  <td>{{$reapplication->top_up_request}}</td>
                  <td>{{$reapplication->application->tel_no}}</td>
                  <td>{{$reapplication->status}}</td>
                  <td>
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{'loanModal'.$reapplication->id}}" data-bs-target="#Modal"><i class="uil uil-eye"></i></a>
                    <!-- modal -->
                    <div class="modal fade" id="{{'loanModal'.$reapplication->id}}" tabindex="-1" aria-labelledby="{{'loanModal'.$reapplication->id}}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="loanModal">Loan Status</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h5>{{$reapplication->verification->verify_loan_title}}</h5>
                            <p>{{$reapplication->verification->verify_loan_desc}}</p>
                          </div>
                          <div class="modal-footer">
                            <a href="employer?ippis={{$reapplication->ippis}}" class="btn btn-primary">View Loan</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- modal -->
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
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