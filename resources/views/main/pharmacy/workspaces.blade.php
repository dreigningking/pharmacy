@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
@endpush
@section('main')
    
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row justify-content-center workspace-block">
               
                <div class="col-md-7 col-lg-8 col-xl-8">

                  <div class="row mb-2 pl-2">
                      <h4>Here are the pharmacies you're a staff of: </h4>
                  </div>
                  <ul>
                      <li>
                          <a href="{{route('pharmacy.dashboard')}}">
                          <div class="row workspace">
                       
                       <div class="col-2">
                          <div class="avatar avatar-xl avatar-block">
                          <img src="{{asset('assets/img/pharmacy-logo2.png')}}" class="avatar-img rounded-circle" alt="logo">
                          </div>
                       </div>
                       <div class="col-7 col-md-offset-2 workspace-info">
                           <h3>Medicare</h3>
                           <p>Sango, Ota</p>
                           <span class="text-muted">15 members</span>
                       </div>
                   
               </div>
                          </a>
                      </li>
                      <li>
                          <a href="{{route('pharmacy.dashboard')}}">
                          <div class="row workspace">
                       
                       <div class="col-2">
                          <div class="avatar avatar-xl avatar-block">
                          <img src="{{asset('assets/img/pharmacy-logo2.png')}}" class="avatar-img rounded-circle" alt="logo">
                          </div>
                       </div>
                       <div class="col-7 col-md-offset-2 workspace-info">
                           <h3>Medicare</h3>
                           <p>Sango, Ota</p>
                           <span class="text-muted">15 members</span>
                       </div>
                   
               </div>
                          </a>
                      </li>
                      <li>
                          <a href="{{route('pharmacy.dashboard')}}">
                          <div class="row workspace">
                       
                       <div class="col-2">
                          <div class="avatar avatar-xl avatar-block">
                          <img src="{{asset('assets/img/pharmacy-logo2.png')}}" class="avatar-img rounded-circle" alt="logo">
                          </div>
                       </div>
                       <div class="col-7 col-md-offset-2 workspace-info">
                           <h3>Medicare</h3>
                           <p>Sango, Ota</p>
                           <span class="text-muted">15 members</span>
                       </div>
                   
               </div>
                          </a>
                     
                      </li>
                  </ul>
                   
                    
                    
	
                    

                </div>
            </div>

        </div>

    </div>		
    <!-- /Page Content -->
@endsection