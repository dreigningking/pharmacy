@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

@endpush
@section('main')
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Login Tab Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        {{-- <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure
                        Login">
                    </div> --}}
                    <div class="col-12 ">
                        <!-- <div class="login-header">
                            <h3>Login <span>Doccure</span></h3>
                        </div> -->

                        <div class="row justify-content-center mb-4">

                            <ul class="nav nav-pills text-align-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#home">Monthly</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#menu1">Quarterly</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#menu2">Annually</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active container-fluid">
                                <div class="row">

                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card ">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        Silver
                                                    </h4>
                                                    <h1>$500
                                                    </h1>
                                                </div>
                                                <div class="d-flex justify-content-center my-4">
                                                    <button class="btn btn-dark btn-lg">
                                                        Get started
                                                    </button>
                                                </div>
                                                <!-- <p class="text-muted">Renews at &#8358;800 a year</p> -->
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>7 days</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Free trial</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>1 pharmacy</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card ">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        Gold
                                                    </h4>
                                                    <h1>$1000
                                                    </h1>
                                                </div>
                                                <div class="d-flex justify-content-center my-4">
                                                    <button class="btn btn-dark btn-lg">
                                                        Get started
                                                    </button>
                                                </div>
                                                <!-- <p class="text-muted">Renews at &#8358;800 a year</p> -->
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>7 days</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Free trial</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>5 pharmacies</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        Diamond
                                                    </h4>
                                                    <h1>$2000
                                                    </h1>
                                                </div>
                                                <div class="d-flex justify-content-center my-4">
                                                    <button class="btn btn-dark btn-lg">
                                                        Get started
                                                    </button>
                                                </div>
                                                <!-- <p class="text-muted">Renews at &#8358;800 a year</p> -->
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>7 days</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Free trial</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Unlimited pharmacies</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div id="menu1" class="container tab-pane fade">
                                <div class="row">

                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card ">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        Silver
                                                    </h4>
                                                    <h1>$1500
                                                    </h1>
                                                </div>
                                                <div class="d-flex justify-content-center my-4">
                                                    <button class="btn btn-dark btn-lg">
                                                        Get started
                                                    </button>
                                                </div>
                                                <!-- <p class="text-muted">Renews at &#8358;800 a year</p> -->
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>14 days</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Free trial</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>1 pharmacy</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card ">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        Gold
                                                    </h4>
                                                    <h1>$2500
                                                    </h1>
                                                </div>
                                                <div class="d-flex justify-content-center my-4">
                                                    <button class="btn btn-dark btn-lg">
                                                        Get started
                                                    </button>
                                                </div>
                                                <!-- <p class="text-muted">Renews at &#8358;800 a year</p> -->
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>14 days</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Free trial</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>5 pharmacies</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        Diamond
                                                    </h4>
                                                    <h1>$5000
                                                    </h1>
                                                </div>
                                                <div class="d-flex justify-content-center my-4">
                                                    <button class="btn btn-dark btn-lg">
                                                        Get started
                                                    </button>
                                                </div>
                                                <!-- <p class="text-muted">Renews at &#8358;800 a year</p> -->
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>14 days</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Free trial</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Unlimited pharmacies</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div id="menu2" class="container tab-pane fade">
                                <div class="row">

                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card ">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        Silver
                                                    </h4>
                                                    <h1>$5000
                                                    </h1>
                                                </div>
                                                <div class="d-flex justify-content-center my-4">
                                                    <button class="btn btn-dark btn-lg">
                                                        Get started
                                                    </button>
                                                </div>
                                                <!-- <p class="text-muted">Renews at &#8358;800 a year</p> -->
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>14 days</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Free trial</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>1 pharmacy</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card ">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        Gold
                                                    </h4>
                                                    <h1>$10000
                                                    </h1>
                                                </div>
                                                <div class="d-flex justify-content-center my-4">
                                                    <button class="btn btn-dark btn-lg">
                                                        Get started
                                                    </button>
                                                </div>
                                                <!-- <p class="text-muted">Renews at &#8358;800 a year</p> -->
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>14 days</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Free trial</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>5 pharmacies</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="card">
                                            <div class="card-body sub-card">
                                                <div class="text-center">
                                                    <h4 class="text-muted">
                                                        Diamond
                                                    </h4>
                                                    <h1>$20000
                                                    </h1>
                                                </div>
                                                <div class="d-flex justify-content-center my-4">
                                                    <button class="btn btn-dark btn-lg">
                                                        Get started
                                                    </button>
                                                </div>
                                                <!-- <p class="text-muted">Renews at &#8358;800 a year</p> -->
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>14 days</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Free trial</p>
                                                </div>
                                                <div class="sub-info">
                                                    <i class="fas fa-check mt-1 mr-1"></i>
                                                    <p>Unlimited pharmacies</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <p class="text-muted mx-3">
                                You're currently on 14days Free Silver plan
                            </p>
                            <a href="{{route('pharmacy.dashboard',$pharmacy)}}" class="btn btn-info">Continune</a>
                        </div>
                        <!-- <form method=" POST" action="{{ route('login') }}">@csrf
                            <div class="tab-content" id="top-tabContent">
                                <div class="tab-pane fade active show" id="welcome" role="tabpanel">
                                    @if (Session::has('errors'))
                                    <div class="dashboard-right tab-content">
                                        <div class="dashboard">
                                            <div class="page-title text-danger">
                                                <h2>Errors</h2>
                                            </div>
                                            <div class="welcome-msg">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li class="d-block">
                                                        <p class="invalid-feedback d-block text-danger" role="alert">
                                                            <strong>{{ $error }}</strong>
                                                        </p>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class=" tab-content">
                                        <div class="">
                                            <h2>User Agreement</h2>
                                            <p>
                                                You are about to increase your sales and customer base through Swivas.
                                                To jumpstart your experience, the setup process includes completion of
                                                your
                                                profile, identity verification and bank account details.
                                                To continue, please read and accept the shop agreement.
                                            </p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="box">

                                                        <div class="box-title">
                                                            <h3>Terms</h3>
                                                        </div>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry.
                                                            Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry.
                                                            Lorem Ipsum has been the industry's standard dummy text ever
                                                            since the 1500s,
                                                            when an unknown printer took a galley of type and scrambled
                                                            it to make a type specimen book.
                                                            It has survived not only five centuries, but also the leap
                                                            into electronic typesetting,
                                                            remaining essentially unchanged. It was popularised in the
                                                            1960s with the release of Letraset
                                                            sheets containing Lorem Ipsum passages, and more recently
                                                            with desktop publishing software like
                                                            Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                        <p><a href="{{route('agreement')}}"><u>Click here to view whole
                                                                    document: https://pharmacy.com</u></a> </p>

                                                    </div>
                                                    <div class="form-group ">
                                                        {{-- <label class="col-xl-3 col-md-4">Free Shipping</label> --}}
                                                        <div class="checkbox checkbox-primary ">
                                                            <input id="checkbox-primary-1" type="checkbox"
                                                                data-original-title="" title="" name="agreement"
                                                                value="1">
                                                            <label for="checkbox-primary-1 px-2"> I have read the
                                                                agreement</label>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="d-flex justify-content-end">

                                                <div>
                                                    <button type="button" type="button"
                                                        class="btn btn-dark next float-right"
                                                        id="goto-owner">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="owner" role="tabpanel">
                                    <div class="dashboard-right tab-content">
                                        <div class="dashboard">
                                            <div class="page-title">
                                                <h2>Details of Shop Owner</h2>
                                            </div>
                                            {{-- <div class="welcome-msg">
                                                        <p>With an something your transactions and operations are authenticated to confirm its really you that is performing those actions. Please choose an accesspin that is hard to guess and do not share it with anyone, including us.</p>
                                                    </div> --}}
                                            <div class="box-account box-info my-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstname" class="form-label">First Name</label>
                                                            <input type="text" name="firstname" class="form-control"
                                                                id="firstname" @auth
                                                                value="{{ Auth::user()->firstname ?? old('firstname') }}"
                                                                readonly @endauth placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="surname" class="form-label">Surname</label>
                                                            <input type="text" name="surname" class="form-control"
                                                                id="surname" @auth
                                                                value="{{Auth::user()->surname ?? old('surname')}}"
                                                                readonly @endauth placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" name="email" class="form-control"
                                                                id="email" @auth
                                                                value="{{Auth::user()->email ?? old('email')}}" readonly
                                                                @endauth placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mobile" class="form-label">Mobile</label>
                                                            <input type="text" name="mobile" class="form-control"
                                                                id="mobile" @auth
                                                                value="{{Auth::user()->mobile ?? old('mobile')}}"
                                                                readonly @endauth placeholder="Mobile">
                                                        </div>
                                                    </div>
                                                </div>
                                                @guest
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password" class="form-label">Password</label>
                                                            <input type="password" name="password" class="form-control"
                                                                id="password" placeholder="******">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password-confirmation" class="form-label">Repeat
                                                                Password</label>
                                                            <input type="password" name="password-confirmation"
                                                                class="form-control" id="password-confirmation"
                                                                placeholder="******">
                                                        </div>
                                                    </div>
                                                </div>
                                                @endguest
                                            </div>
                                            <div class="page-title">
                                                <h2>Contact Person</h2>
                                            </div>
                                            {{-- <div class="welcome-msg">
                                                        <p>With an something your transactions and operations are authenticated to confirm its really you that is performing those actions. Please choose an accesspin that is hard to guess and do not share it with anyone, including us.</p>
                                                    </div> --}}
                                            <div class="box-account box-info my-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="contact_name" class="form-label">Full
                                                                Name</label>
                                                            <input type="text" name="contact_name"
                                                                value="{{ old('contact_name') }}" class="form-control"
                                                                id="contact_name"
                                                                placeholder="Contact Person Full name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="contact_email" class="form-label">Email</label>
                                                            <input type="text" name="contact_email"
                                                                value="{{ old('contact_email') }}" class="form-control"
                                                                id="contact_email" placeholder="Contact Email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="contact_phone" class="form-label">Phone
                                                                Number</label>
                                                            <input type="text" name="contact_phone"
                                                                value="{{ old('contact_phone') }}" class="form-control"
                                                                id="contact_phone" placeholder="Contact Mobile number">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="contact_document">Upload Contact Person's
                                                                ID</label>
                                                            <input type="file" name="contact_document"
                                                                class="form-control" id="contact_document">
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="button" class="btn btn-primary previous"
                                                    id="goto-welcome">previous</button>
                                                <button type="button" class="btn btn-dark next float-right"
                                                    id="goto-details">next</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="details" role="tabpanel">
                                    <div class="dashboard-right tab-content">
                                        <div class="dashboard">
                                            <div class="page-title">
                                                <h2>Shop SetUp</h2>
                                            </div>
                                            <div class="welcome-msg">

                                                <p>Your are about to start making lots of money from sales. Let's help
                                                    you get started with a few setup functionalities to jumpstart your
                                                    experience on Swivas-Marketplace.
                                                    This setup process includes your profile completion, accesspin, bank
                                                    acccount, identity verification.</p>
                                            </div>
                                            <div class="box-account box-info">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="box">
                                                            <div class="box-title">
                                                                <h3>Upload Cover Image</h3>
                                                            </div>
                                                            <div class="box-content upload-photo mb-4">
                                                                <input type="file" style="visibility:hidden"
                                                                    name="cover" id="cover">
                                                                <img src="{{asset('assets/images/img/1.jpg')}}"
                                                                    class="img-fluid"
                                                                    style="width:100%;height:500px;cursor:pointer"
                                                                    id="cover-upload">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="box">
                                                            <div class="box-title">
                                                                <h3>Upload Logo</h3>
                                                            </div>
                                                            <div class="box-content upload-photo mb-3">
                                                                <input type="file" style="visibility:hidden" name="logo"
                                                                    id="logo">
                                                                <img src="{{asset('assets/images/img/1.jpg')}}"
                                                                    style="height:150px;width:150px;cursor:pointer"
                                                                    id="logo-upload">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="box">
                                                            <div class="box-title">
                                                                <h3>Info</h3>
                                                            </div>
                                                            <div class="box-content">
                                                                <div class="form-group">
                                                                    <label>Business Name</label>
                                                                    <input name="business_name"
                                                                        value="{{ old('business_name') }}"
                                                                        id="business_name" class="form-control digits"
                                                                        type="text" autocomplete="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Business Description</label>
                                                                    <textarea name="business_description"
                                                                        value="{{ old('business_description') }}"
                                                                        id="business_description"
                                                                        placeholder="We are into sales of..."
                                                                        class="form-control digits"></textarea>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="box">
                                                            <div class="box-title">
                                                                <h3>Info</h3>
                                                            </div>
                                                            <div class="box-content">

                                                                <div class="form-group">
                                                                    <label for="certificate">CAC Document</label>
                                                                    <input type="file" name="business_certificate"
                                                                        class="form-control" id="certificate">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Categories of Products You Sell</label>
                                                                    <div class="">
                                                                        <select name="business_categories[]"
                                                                            class="select2" multiple>

                                                                            <option value="1">Bags</option>
                                                                            <option value="2">Shoes</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <button type="button" class="btn btn-primary previous"
                                                    id="goto-owner">Previous</button>

                                                <button type="button" class="btn btn-dark next float-right"
                                                    id="goto-address">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel">
                                    <div class="dashboard-right tab-content">
                                        <div class="dashboard">
                                            <div class="page-title">
                                                <h2>PHYSICAL LOCATION</h2>
                                            </div>
                                            <div class="welcome-msg">

                                                <p>Where would you like items you purchased and gifts you received to be
                                                    delivered to ? . Specifying your address now helps you streamline
                                                    the logistics procedures after. You can edit this later.</p>
                                            </div>
                                            <div class="box-account box-info">
                                                <div class="box-head mb-3">
                                                    <h2>Fill Address Information</h2>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAddress">Address</label>
                                                    <input type="text" name="address" value="{{ old('address') }}"
                                                        class="form-control" id="inputAddress"
                                                        placeholder="1234 Main St">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="country">Country</label>
                                                        <select id="country" name="country_id"
                                                            class="countries select2 form-control">

                                                            <option value="1">Nigeria</option>
                                                            <option value="2">Ghana</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputState">State</label>
                                                        <select id="inputState" name="state_id"
                                                            class="states form-control select2">
                                                            <option value="1">Lagos</option>
                                                            <option value="2">Abuja</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputCity">Area</label>
                                                        <select id="inputCity select2" name="city_id"
                                                            class="cities form-control">
                                                            <option>Long</option>
                                                            <option>Lat</option>
                                                        </select>
                                                    </div>


                                                </div>

                                                <button type="button" class="btn btn-primary previous"
                                                    id="goto-details">Previous</button>
                                                <button type="button" class="btn btn-dark next float-right"
                                                    id="goto-identification">next</button>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="bankaccount" role="tabpanel">
                                    <div class="dashboard-right tab-content">
                                        <div class="dashboard">
                                            <div class="page-title">
                                                <h2>Bank Accounts</h2>
                                            </div>
                                            <div class="welcome-msg">
                                                <p>Hello, MARK JECNO !</p>
                                                <p>Your registration is successful. Let's help you get started with a
                                                    few setup functionalities to jumpstart your experience on
                                                    Swivas-Marketplace.
                                                    This setup process includes your profile completion, accesspin, bank
                                                    acccount, identity verification.</p>
                                            </div>
                                            <div class="box-account box-info">
                                                {{-- <div class="box-head">
                                                            <h2>Account Information</h2>
                                                        </div> --}}
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="box">
                                                            <div class="box-title mb-3">
                                                                <h3>Bank Information</h3>
                                                            </div>
                                                            <div class="box-content">
                                                                <div class="form-group">
                                                                    <label for="bank w-100">Select Bank</label>
                                                                    <select id="bank" name="bank_id"
                                                                        class="form-control select2 w-100">

                                                                        <option value="1">GTB</option>
                                                                        <option value="2">First Bank</option>

                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="account_number">Account Number</label>
                                                                    <input name="account_number"
                                                                        value="{{ old('account_number') }}" type="text"
                                                                        class="form-control" id="account_number">
                                                                </div>
                                                                <div class="form-group" style="display: none;">
                                                                    <label for="bank_branch">Select Branch</label>
                                                                    <select id="bank_branch"
                                                                        class="form-control select2" name="bank_branch">

                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="account_number">Account Name</label>
                                                                    <input name="account_name" type="text"
                                                                        class="form-control" id="account_name" readonly>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="box">
                                                            <div class="box-title">
                                                                <h3>Information</h3>
                                                            </div>
                                                            <div class="box-content">
                                                                <p>Please be informed that these information will be
                                                                    verified before your account is completely active.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary previous">previous</button>
                                                <button type="submit" class="btn btn-dark float-right">save &
                                                    continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group form-focus mb-2">
                                        <input id="email" name="email" value="{{ old('email') }}" required
                            autocomplete="email" autofocus type="email" class="form-control @error('email') is-invalid
                            @enderror floating">
                            <label class="focus-label">Email</label>
                            @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group form-focus mb-2">
                            <input id="password" name="password" required autocomplete="current-password"
                                type="password" class="form-control @error('password') is-invalid @enderror floating">
                            <label class="focus-label">Password</label>
                            @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="text-right">
                            <a class="forgot-link" href="{{ route('password.request') }}">Forgot Password ?</a>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>
                        <div class="row form-row social-login">
                            <div class="col-6">
                                <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i>
                                    Login</a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i>
                                    Login</a>
                            </div>
                        </div>
                        <div class="text-center dont-have">Don’t have an account?
                            <a href="{{ route('register') }}">Register</a>
                        </div> --}}
                        </form> -->




                    </div>
                </div>
            </div>
            <!-- /Login Tab Content -->

        </div>
    </div>

</div>

</div>
<!-- /Page Content -->
@endsection