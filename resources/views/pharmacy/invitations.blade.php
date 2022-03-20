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
                                <p>Here is an invitation to join us to work at {{$pharmacy->name}} as a {{$pharmacy->staff->where('user_id',$user->id)->first()->role->name}} </p>
                                
                                <p>If you accept this invitation, you will be redirected to login with the following details</p>
                                <ul class="list-unstyled">
                                    <li>Email: {{$user->email}}</li>
                                    <li>Password: {{$user->email}}</li>
                                </ul>
                                <form action="{{route('confirm_invitations')}}" method="POST">@csrf
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="hidden" name="pharmacy_id" value="{{$pharmacy->id}}">
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