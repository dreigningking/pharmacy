@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('adminassets/plugins/morris/morris.css')}}">
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
            @include('main.pharmacy.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                @foreach($roles as $role)
                <div class="card">
                    <div class="card-header">

                        <button class="btn permission-btn" type="button" data-toggle="collapse"
                            data-target="#collapseExample{{$role->id}}" aria-expanded="false"
                            aria-controls="collapseExample">
                            {{$role ->name}} </button>
                    </div>

                    <div class=" card-body">
                        <div class="collapse" id="collapseExample{{$role->id}}">
                            <div class="card card-body">
                                <form action="">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Option 1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Option 2
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Option 3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Option 4
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Option 5
                                                </label>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="row justify-content-start mt-4">
                                        <button class="btn btn-primary mr-4" type="submit">
                                            Save
                                        </button>
                                        <button class="btn btn-outline-secondary ">
                                            Cancel
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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