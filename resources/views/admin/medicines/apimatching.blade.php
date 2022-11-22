@extends('layouts.admin.app')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
@endpush
@section('main')
<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Dashboard</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Drug formulations</a></li>
                    <li class="breadcrumb-item active">API Matching</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-md-12">
            {{-- <div class="card"> --}}
                <div class="">
                    {{-- <h5 class="card-title d-flex justify-content-between">
                        <span>{{session('drugs')}}</span> 
                        
                    </h5> --}}
                    <form action="{{route('admin.drugs.match')}}" method="POST">@csrf
                        <div class="row table-responsive">
                            
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>API A</th>
                                        <th>API B</th>
                                        <th>API C</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($drugs as $drug)
                                        <tr>
                                            <td>
                                                <select class="form-control" name="drugs[]">
                                                    <option value="{{$drug->id}}" selected>{{$drug->name}}</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="category[]">
                                                    <option value="0">Select</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->id}}" @if($category->id == $drug->category_id) selected @endif>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <div>
                                                    <select class="form-control select" name="medicine_a[]">
                                                        <option value="0">Select</option>
                                                        @foreach ($medicines as $medicine)
                                                            <option value="{{$medicine->id}}" @if(isset($drug->ingredients[0]) && $drug->ingredients[0]->id == $medicine->id) selected @endif>{{$medicine->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" name="size_a[]" value="{{isset($drug->ingredients[0]) ? $drug->ingredients[0]->pivot->size : ''}}" class="form-control mt-1" placeholder="strength e.g 2mg">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <select class="form-control select" name="medicine_b[]">
                                                        <option value="0">Select</option>
                                                        @foreach ($medicines as $medicin)
                                                            <option value="{{$medicin->id}}" @if(isset($drug->ingredients[1]) && $drug->ingredients[1]->id == $medicin->id ) selected @endif>{{$medicin->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" name="size_b[]" value="{{isset($drug->ingredients[1]) ? $drug->ingredients[1]->pivot->size : ''}}" class="form-control mt-1" placeholder="strength e.g 2mg">
                                                </div>
                                            </td>   
                                            <td>
                                                <div>
                                                    <select class="form-control select" name="medicine_c[]">
                                                        <option value="0">Select</option>
                                                        @foreach ($medicines as $meds)
                                                            <option value="{{$meds->id}}" @if(isset($drug->ingredients[2]) && $drug->ingredients[2]->id == $meds->id) selected @endif>{{$meds->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" name="size_c[]" value="{{isset($drug->ingredients[2]) ? $drug->ingredients[2]->pivot->size : ''}}" class="form-control mt-1" placeholder="strength e.g 2mg">
                                                </div>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
                        </div>
                        <div class="my-3">
                             
                            <div class="col-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg  btn-primary">Save</button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            {{-- </div> --}}
        </div>
    </div>

</div>
@endsection
@push('scripts')
    <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
@endpush