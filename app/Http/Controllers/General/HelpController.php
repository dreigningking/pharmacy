<?php

namespace App\Http\Controllers\General;

use App\Models\Drug;
use App\Models\Patient;
use App\Models\Medicine;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\MedicineInteraction;
use App\Http\Controllers\Controller;
use App\Http\Resources\DrugResource;
use App\Http\Resources\MedicineResource;

class HelpController extends Controller
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

    public function medicationApis(Request $request)
    {

        $apis = collect([]);
        if($request->patient_id){
            $patient = Patient::find($request->patient_id);
            foreach ($patient->activeMedicationHistory as $history) {
                foreach ($history->drug->ingredients as $ingredient) {
                    $apis->push($ingredient);
                }
            }
            return $apis->unique('id')->sortBy('name')->values()->all();
        }elseif($request->drugs){
            $drugs = Drug::whereIn('id',$request->drugs)->get();
            foreach($drugs as $drug){
                foreach($drug->ingredients as $ingredient) {
                    $apis->push($ingredient);
                }
            }
            return $apis->unique('id')->sortBy('name')->values()->all();
        }
        return $apis;
        
    }

    public function medicationInteractions(Request $request){
        $interactions = MedicineInteraction::whereIn('medicine_a',$request->api_ids)->whereIn('medicine_b',$request->api_ids)->get();
        return $interactions;
    }

    public function patientAssessments(Request $request)
    {
        $patient = Patient::find($request->patient_id);
        return $patient->assessments;
    }

    public function inventory(Request $request)
    {
        $inventory = Inventory::find($request->inventory_id);
        return $inventory;
    }

    public function destroy($id)
    {
        //
    }
}
