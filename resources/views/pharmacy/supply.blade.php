@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
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
            @include('pharmacy.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">


                <!-- Page Wrapper -->
                <div class="page-wrapper">

                    <div class="card">
                        <h4 class="card-header mb-4">New Supply</h4>
                        <div class="card-body">

                            <form action="">
                                <div class="container-fluid pl-0 pr-0">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <div class="form-group">
                                                <label for="usr">Supplier:</label>
                                                <select class="form-control" id="sel1">
                                                    @forelse($suppliers as $supplier)
                                                        <option>{{$supplier->name}}</option>
                                                        @empty
                                                        <option value="0" disabled>No Suppliers</option>
                                                    @endforelse
                                                    
                                                </select>
                                            </div>
                                            <div>
                                                <a class="btn btn-primary" data-toggle="modal" href="#">Add Supplier</a>
                                                
                                                <a class="btn btn-primary w-100" data-toggle="modal" href="#">Add New Drug</a>
                                               
                                            </div> 
                                        </div>
                                        <div>
                                            <div class="form-group align-items-left">
                                                <label for="usr">Invoice No:</label>
                                                <input type="text" class="form-control" id="usr">
                                            </div>
                                            
                                            <div class="form-group row align-items-center">
                                                <label for="usr">Date:</label>
                                                <input type="date" class="form-control" id="usr">
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="row ">
                                        <div class="col-12">
                                            <table class="table">
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Quantity</th>
                                                    <th>Amount</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select name="medicine" id="" class="form-control select">
                                                            <option value="1">Lonart</option>
                                                            <option value="2">Amoxil</option>
                                                        </select>
                                                    </td>
                                                    <td>Quantity</td>
                                                    <td>Amount</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row w-100 mt-4">
                                        <div class="supplies row w-100">
                                            <div class="col-11 supply d-flex">
                                                <div class="col-md-7">
                                                    <div class="form-group row align-items-center">
                                                        <label for="usr" class="col-3">Supply:</label>
                                                        <select class="form-control col-9" id="sel1">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group row align-items-center">
                                                        <label for="usr" class="col-3">Quantity:</label>
                                                        <input type="number" class="form-control col-9" id="usr">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="plus-more add-more">
                                            <a href="javascript:void(0);" class="add-supply"><i
                                                    class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>
                                    <div class="row mt-4 ml-2">
                                        <button class="btn btn-primary mt-4">Save as Draft</button>
                                        <button class="btn btn-primary ml-4 mt-4">Save and Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /Page Wrapper -->


        </div>
    </div>

</div>

</div>
<!-- /Page Content -->

@endsection

@push('scripts')
<script src="{{asset('plugins/select2/css/select2.min.js')}}"></script>
<script>
$(".supplies").on('click', '.trash', function() {
    $(this).closest('.supply').remove();
    return false;
});
$(".add-supply").on('click', function() {

    var regcontent = '<div class="supply row w-100 pl-4">' +

        '<div class="col-11 pr-0 pl-0 d-flex">' +

        '<div class="col-md-7">' +
        '<div class="form-group row align-items-center">' +
        '<label for="usr" class="col-3">Supply:</label>' +
        '<select class="form-control col-9" id="sel1">' +
        '<option>1</option>' +
        '<option>2</option>' +
        '<option>3</option>' +
        '<option>4</option>' +
        '</select>' +
        '</div>' +
        '</div>' +

        ' <div class="col-md-5">' +
        '<div class="form-group row align-items-center">' +
        '<label for="usr" class="col-3">Quantity:</label>' +
        '<input type="number" class="form-control col-9" id="usr">' +
        '</div>' +
        '</div>' +

        '<div class="col-1 pr-0 pl-0 d-flex align-items-start justify-content-end" >' +
        '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
        '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
        '</div>' +
        '</div>';

    $(".supplies").append(regcontent);
    return false;
});
</script>
@endpush