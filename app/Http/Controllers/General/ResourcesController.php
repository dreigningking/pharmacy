<?php

namespace App\Http\Controllers\General;

use App\Models\Drug;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DrugResource;
use App\Http\Resources\MedicineResource;

class ResourcesController extends Controller
{
    
    public function drugs()
    {
        
        // $drugs = Drug::where('status',true);
        // if($name = request()->name)
        // $drugs = $drugs->where('name','LIKE',"%$name%");
        // if($manufacturer = request()->manufacturer)
        // $drugs = $drugs->where('manufacturer','LIKE',"%$name%");
        // if($categoriz = request()->categories)
        // $drugs = $drugs->whereIn('category_id',$categoriz);
        
        // $categories = DrugCategory::all();
        // return request()->expectsJson() ?
        // response()->json([
        //     'data' => DrugResource::collection($drugs->get()),
        // ],200):
        // view('pharmacy.inventory.drugs',compact('drugs','categories','pharmacy'));   $drugs = $drugs->paginate(100);
    }

    public function api()
    {
        $medicines = Medicine::all();
        return response()->json([
            'data' => MedicineResource::collection($medicines),
        ],200);
    }

    public function drugCategories()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
