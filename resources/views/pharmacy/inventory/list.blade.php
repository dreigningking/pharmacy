@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
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
            @include('pharmacy.sidebar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="mb-3">Inventory </h2>
                                <div class="d-flex justify-content-around my-2">
                                    <table>
                                        <tr>
                                            <td colspan="2" class="text-center">Selected:   <span id="checkedcount">0</span></td>
                                        </tr>
                                        <tr>
                                            <td> <button class="btn btn-dark actionbuttons disabled" id="transfer" disabled>Transfer</button></td>
                                            <td> <button class="btn btn-primary actionbuttons disabled" id="purchase" disabled>Purchase</button></td>
                                            
                                        </tr>
                                    </table>
                                </div>
                                <form id="submitInventory" action="#" method="POST">@csrf
                                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                    <div class="table-responsive">
                                        <table class="datatable table table-hover table-bordered table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="header_input"></th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Shelf</th>
                                                    <th>Batch</th>
                                                    <th>Qty</th>
                                                    <th>Cost</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th>Details</th>   
                                                </tr>
                                            </thead>
                                            <tbody>                                              
                                                @forelse ($items->sortBy('name') as $item)
                                                    @foreach ($item->batches as $batch)
                                                    <tr>
                                                        <td><input type="checkbox" class="checkboxes" name="inventories[]" value="{{$item->id}}"></td>
                                                        <td>{{$item->name}}</td>
                                                        <td>@if($item->drug_id) Drug @else Others @endif</td>   
                                                        <td>{{$item->shelf->name}}</td>   
                                                        <td>{{$batch->number}}</td>   
                                                        <td>{{$batch->quantity}}</td>   
                                                        <td>{{$item->unit_cost}}</td>   
                                                        <td>{{$item->unit_price}}</td>   
                                                        <td>
                                                            @if($batch->expire_at && $batch->expire_at < now())
                                                                <span class="badge badge-danger">Expired</span>
                                                            @elseif($batch->quantity <= $pharmacy->minimum_stocklevel)
                                                                <span class="badge badge-danger">Stock Level Too Low</span>
                                                            @elseif($batch->quantity <= $pharmacy->maximum_stocklevel)
                                                                <span class="badge badge-danger">Stock Level Too High</span>
                                                            @else 
                                                            <span class="badge badge-primary">Available</span>
                                                            @endif
                                                        </td>
                                                        <td><button data-toggle="modal" data-target="#item{{$item->id}}" class="btn btn-sm btn-primary">view</button></td>
                                                    </tr>
                                                    @endforeach
                                                @empty
                                                    <tr><td colspan="5" class="text-center">No Item <a href="{{route('pharmacy.inventory.setup',$pharmacy)}}">Start Inventory</a></td></tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
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
<!-- Add Staff Modal -->
@section('modals')

@foreach ($items as $item)
    <div class=" modal fade custom-modal add-modal" id="item{{$item->id}}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Drug Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 d-flex">
                            <div class="card flex-fill">

                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr><td>Name:</td><td>{{$item->name}}</td> </tr>
                                        <tr><td>Batch:</td><td>{{$item->batch}}</td></tr>
                                        <tr><td>Shelf:</td><td>{{$item->shelf->name}}</td></tr>
                                        <tr><td>Remaining:</td><td>{{$item->quantity}}</td></tr>
                                        <tr><td>Expired:</td><td>{{$item->expired->count()}}</td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection

@push('scripts')
<script src="{{asset('adminassets/js/script.js')}}"></script>
<script>
    $('#header_input').on('click',function(){
        if($(this).is(':checked')){
            $('.checkboxes').prop('checked', this.checked);
            updateCounter()
        } 
        else{   
            $('.checkboxes').prop('checked', false);
            updateCounter()
        }       
    })
    $('.checkboxes').on('change',function(){
        updateCounter()
    })
    function updateCounter(){
        let num = $('.checkboxes:checked').length
        if(num)
            $('.actionbuttons').removeClass('disabled').prop('disabled',false)
        else
            $('.actionbuttons').addClass('disabled').prop('disabled',true)
        $('#checkedcount').text(num)
    }
    $('#transfer').on('click',function(){
        let clicked = []
        $('.checkboxes:checked').each(function(){
            clicked.push($(this).val());
        });
        $('#submitInventory').attr('action',"{{route('pharmacy.transfer.inventory.create',$pharmacy)}}").submit();
        
    })
    $('#purchase').on('click',function(){
        let clicked = []
        $('.checkboxes:checked').each(function(){
            clicked.push($(this).val());
        });
        $('#submitInventory').attr('action',"{{route('pharmacy.purchase.inventory.create',$pharmacy)}}").submit();
        
    })

</script>
@endpush