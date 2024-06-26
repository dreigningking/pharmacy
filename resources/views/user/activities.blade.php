@extends('layouts.main.app')
@push('styles')


<!-- Datatables CSS -->
<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
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
            @include('user.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-header"><h4>Activities</h4></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Icon</th>
                                        <th>Staff Name</th>

                                        <th>Pharmacy Name</th>
                                        <th>Role</th>
                                        <th class="text-center">Activities Description</th>
                                        <th class="text-right">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <i class="fas fa-bell"></i></td>
                                        <td class="d-flex align-items-center">

                                            Uzumaki Naruto
                                        </td>

                                        <td>
                                            <h2 class="table-avatar">

                                                <a href="profile.html">Konoha </a>
                                            </h2>
                                        </td>
                                        <td>Genin</td>
                                        <td class="text-center">
                                            Beat
                                            Sasuke's Ass
                                        </td>
                                        <td class="text-right">
                                            01-02-2022
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-dot-circle"></i></td>
                                        <td class="d-flex align-items-center">

                                            Hatake Kakashi
                                        </td>

                                        <td>
                                            <h2 class="table-avatar">

                                                <a href="profile.html">Konoha </a>
                                            </h2>
                                        </td>
                                        <td>Chunin</td>
                                        <td class="text-center">
                                            Beat
                                            Nagato Ass
                                        </td>
                                        <td class="text-right">
                                            01-02-2022
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-bell"></i>
                                        </td>
                                        <td class="d-flex align-items-center">Uzumaki Naruto</td>

                                        <td>
                                            <h2 class="table-avatar">

                                                <a href="profile.html">Konoha </a>
                                            </h2>
                                        </td>
                                        <td>Genin</td>
                                        <td class="text-center">
                                            Beat
                                            Sasuke's Ass
                                        </td>
                                        <td class="text-right">
                                            01-02-2022
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-exclamation-circle mr-1"></i></td>
                                        <td class="d-flex align-items-center">


                                            Uzumaki Naruto
                                        </td>

                                        <td>
                                            <h2 class="table-avatar">

                                                <a href="profile.html">Konoha </a>
                                            </h2>
                                        </td>
                                        <td>Genin</td>
                                        <td class="text-center">
                                            Beat
                                            Sasuke's Ass
                                        </td>
                                        <td class="text-right">
                                            01-02-2022
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

</div>
<!-- /Page Content -->
@endsection

@push('scripts')
<script src="{{asset('adminassets/js/script.js')}}"></script>
@endpush