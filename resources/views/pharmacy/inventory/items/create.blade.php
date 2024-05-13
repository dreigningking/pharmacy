@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<!-- Datatables CSS -->
<style>
    .select2-container .select2-selection--single{
        height:46px;
        border:1px solid #ced4da;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 40px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        position:absolute;
        top: 10px!important;
    }
</style>
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

        <div class="row justify-content-center">
            

            <div class="col-md-7 col-lg-8 col-xl-9 ">
                <div class="card">
                    <div class="card-body">
                        <h3>Create Inventory</h3>
                        <div class="appointment-tab">
                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Create Drugs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#today-appointments" data-toggle="tab">Create Non Drugs</a>
                                </li> 
                            </ul>
                            <!-- /Appointment Tab -->
                            <form action="{{route('pharmacy.inventory.store', $pharmacy)}}" class="w-100" method="POST">@csrf
                                <div class="tab-content border border-grey">
                                    <div class="tab-pane active" id="upcoming-appointments">
                                        <div class="card mb-0">
                                            <div class="card-body">                                    
                                                <div class="row w-100">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label d-flex justify-content-between"><span>Drug</span>
                                                                <a href="{{route('pharmacy.inventory.drugs', $pharmacy)}}"> 
                                                                    <u>Click here to add many at once</u> 
                                                                </a>
                                                            </label>
                                                            <select type="text" class="select-remote w-100" style="width:100%" name="drug_id">
        
                                                            </select>
                                                            
                                                        </div>
                                                    </div>   
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="form-label">Category</label>
                                                            <input type="text" class="form-control" readonly id="drug_category" name="drug_category">
                                                        </div>
                                                    </div>  
                                                </div>                                     
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane show" id="today-appointments">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="row w-100 mr-0">
                                                    <div class="col-md-12 d-flex justify-content-end">
                                                        <a href="{{route('pharmacy.inventory.settings',$pharmacy)}}#upload"> 
                                                            <u>Upload many at once</u> 
                                                        </a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" id="item_name" class="form-control" name="name">
                                                        </div>
                                                    </div>   
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="form-label">Category</label>
                                                            <select class="form-control" name="category">
                                                                <option value="">Select Category</option>
                                                                @foreach (explode(',',$pharmacy->categories) as $category)
                                                                    <option value="{{$category}}">{{$category}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>    
                                                    
                        
                                                </div>
                                            </div>	
                                        </div>	
                                    </div>
                                </div>

                                <div class="card mb-0 border">
                                    <div class="card-body">   
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label class="form-label">Shelf</label>
                                                    <select class="form-control" name="shelf">
                                                        <option value="">Select Shelf</option>
                                                        @foreach (explode(',',$pharmacy->shelves) as $shelf)
                                                                <option value="{{$shelf}}">{{$shelf}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>     
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Unit of Sales</label>
                                                    <select name="unit_of_sales" class="form-control">
                                                        <option value="">Select Unit</option>
                                                        <option value="pill">Pill</option>
                                                        <option value="bottle">Bottle</option>
                                                        <option value="sachet">Sachet</option>
                                                        <option value="packet">Packet</option>
                                                        <option value="carton">Carton</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label class="form-label">Unit Cost</label>
                                                    <input type="number" class="form-control" name="unit_cost" value="">
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Unit Price</label>
                                                    <input type="number" class="form-control" name="unit_price" value="">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label class="form-label">Minimum Stock</label>
                                                    <input type="number" class="form-control" name="minimum_stocklevel">
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Maximum Stock</label>
                                                    <input type="number" class="form-control" name="maximum_stocklevel">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Alert Expiry</label>
                                                    <input type="number" class="form-control" name="expiry_alert_weeks" placeholder="Weeks before expiry">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="row w-100">
                                            <div class="col-md-12 registrations-info">
                                                
                                                <div class="row reg-cont">
                                                    <div class="col-md-3">
                                                        <div class="form-group">  
                                                            <label class="text-muted text-center">Batch Name</label>                                        
                                                            <input type="text" name="batch[]" placeholder="Batch Name/Number" class=" form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="text-muted text-center">Quantity</label>
                                                            <input type="number" name="quantity[]" placeholder="Quantity" class="form-control"> 
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="text-muted text-center">Expiry</label>
                                                            <input type="date" name="expire_at[]" placeholder="Year. e.g 2023" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="d-md-block">&nbsp;</label>
                                                        <a href="#" class="btn btn-danger btn-block trash">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                    

                                                </div>
                                            </div>
                                            <div class="add-more m-4">
                                                <a href="javascript:void(0);" class="add-reg"><i class="fa fa-plus-circle"></i> Add New</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-md btn-info" name="action" value="save">Save</button>
                                            </div> 
                                        </div> 
                                    </div> 
                                </div> 
                            </form>
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
<script>
    $('.select-remote').select2({
        width: 'resolve',
        ajax: {
            url: "{{route('pharmacy.inventory.drugs',$pharmacy)}}",
            dataType: 'json', 
            cache: true, 
            data: function (params) {
                var query = {
                    search: params.term,
                    pharmacy_id: @json($pharmacy->id),
                }
                return query;
            },
            processResults: function (data) {
                var data = $.map(data.drugs, function (obj) {
                    obj.text = obj.text || obj.name; // replace name with the property used for the text
                    return obj;
                });
                return {
                    results: data
                };
            }
        }
    })
    $(document).on('select2:select','.select-remote',function(e){
        var data = e.params.data;
        console.log(data)
        $('#item_name').val(data.name)   
        $('#drug_category').val(data.category_name)   
    })
</script>
<script>
    $(document).ready(function(){
        regcontent = $('.reg-cont').last().prop("outerHTML");
    })
    $(".registrations-info").on('click','.trash', function () {
        $(this).closest('.reg-cont').remove();
        return false;
    });
        // reg-cont
    $(document).on('click',".add-reg", function () {
        $(".registrations-info").append(regcontent);
        $('.permission').each(function(index,val){
            $(this).find('.custom-control-input').attr('id','id'+index);  
            $(this).find('.custom-control-label').attr('for','id'+index); 
        })
        $('.reg-cont').each(function(index,val){
            $(this).find('.custom-control-input').each(function(abc,valu){
                let name = $(this).attr('name');
                let new_name = name.replace("[]","["+index+"]") 
                $(this).attr('name',new_name);
                // console.log('index:'+index+',inner:'+abc+',item:'+$(this).attr('name'))
            })
            
        })
        
        return false;
    });                                        
</script>
@endpush