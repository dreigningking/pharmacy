@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
@endpush
@section('main')
    
    <!-- Page Content -->
    <div class="content success-page-cont">
        <div class="container-fluid">
        
            <div class="row justify-content-center">
                <div class="col-lg-6">
                
                    <!-- Success Card -->
                    <div class="card success-card">
                        <div class="card-body">
                            <div class="success-cont">
                                <i class="fas fa-check"></i>
                                <h3>Pharmacy Invitation!</h3>
                                <p>Here is an invitation to join us to work at {{$pharmacy->name}} as a manager </p>
                                
                                <form action="{{route('invitations')}}" method="POST">@csrf
                                    <button type="submit" class="btn btn-primary view-inv-btn">Accept Invitation</button>
                                </form>
                               
                            </div>
                        </div>
                    </div>
                    <!-- /Success Card -->
                    
                </div>
            </div>
            
        </div>
    </div>			
    <!-- /Page Content -->
@endsection