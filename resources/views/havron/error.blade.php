@extends('layouts.main.app')
@section('main')
<div class="content success-page-cont" style="min-height: 17px;">
    <div class="container-fluid">
    
        <div class="row justify-content-center">
            <div class="col-lg-6">
            
                <!-- Success Card -->
                <div class="card success-card">
                    <div class="card-body">
                        <div class="success-cont">
                            <i class="fas fa-times bg-danger border-danger"></i>
                            <h3>Payment Failed</h3>
                            <p>Your donation has not been received. Something must have gone wrong</p>
                            <a href="#" class="btn btn-primary view-inv-btn">Try Again</a>
                        </div>
                    </div>
                </div>
                <!-- /Success Card -->
                
            </div>
        </div>
        
    </div>
</div>
@endsection



