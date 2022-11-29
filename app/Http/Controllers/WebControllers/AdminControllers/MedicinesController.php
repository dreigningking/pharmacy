<?php

namespace App\Http\Controllers\WebControllers\AdminControllers;

use App\Models\Drug;
use App\Models\Category;
use App\Models\Medicine;
use App\Models\Ingredient;
use Illuminate\Support\Str;
use App\Imports\DrugsImport;
use App\Models\DrugCategory;
use Illuminate\Http\Request;
use App\Imports\MedicinesImport;
use App\Models\MedicineInteraction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MedicineInteractionsExport;
use App\Imports\MedicineInteractionsImport;

class MedicinesController extends Controller
{

    public function api(){
        $medicines = Medicine::orderBy('id','desc')->take(100)->get();
        // dd(is_array($medicines[1]->alternatives));
        return view('admin.medicines.api',compact('medicines'));
    }

    public function api_upload(Request $request){
        // dd($request->all());
        try {
            Excel::import(new MedicinesImport, $request->file('api'));
            }
        catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            $failures = $e->failures();
            dd($failures);
            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.
            }
        }
        
        return redirect()->route('admin.apis');
    }

    public function api_store(Request $request){
        $medicine = new Medicine;
        $medicine->name = $request->name;
        $medicine->side_effects = explode('|',$request->side_effects);
        $medicine->contraindications = explode('|',$request->contraindications);
        $medicine->pregnancy_status = $request->pregnancy_status;
        $medicine->lactation_status = $request->lactation_status;
        $medicine->alternatives = $request->alternatives;
        $medicine->medication_counsel = explode('|',$request->medication_counsel);
        $medicine->status = $request->status;
        $medicine->save();
        return redirect()->back();
    }

    public function api_update(Request $request){
        $medicine = Medicine::find($request->medicine_id);
        $medicine->name = $request->name;
        $medicine->side_effects = explode('|',$request->side_effects);
        $medicine->contraindications = explode('|',$request->contraindications);
        $medicine->pregnancy_status = $request->pregnancy_status;
        $medicine->lactation_status = $request->lactation_status;
        $medicine->alternatives = $request->alternatives;
        $medicine->medication_counsel = explode('|',$request->medication_counsel);
        $medicine->status = $request->status;
        $medicine->save();
        return redirect()->back();
    }

    public function api_interactions(){
        $interactions = MedicineInteraction::all();
        $medicines = Medicine::all();
        return view('admin.medicines.interactions',compact('interactions','medicines'));
    }

    public function api_interactions_store(Request $request){
        $interaction = new MedicineInteraction;
        $interaction->medicine_a = $request->medicine_a;
        $interaction->medicine_b = $request->medicine_b;
        $interaction->remark = $request->remark;
        $interaction->mechanism = $request->mechanism;
        $interaction->save();
        return redirect()->back();
    }

    public function api_interactions_update(Request $request){
        $interaction = MedicineInteraction::find($request->interaction_id);
        $interaction->medicine_a = $request->medicine_a;
        $interaction->medicine_b = $request->medicine_b;
        $interaction->remark = $request->remark;
        $interaction->mechanism = $request->mechanism;
        $interaction->save();
        return redirect()->back();
    }

    public function interactions_upload_instructions(){
        $medicines = Medicine::all();
        return view('admin.medicines.uploads.interactions',compact('medicines'));
    }
    
    public function api_interactions_download(Request $request){
        $interaction = [];
        $medicine_a = Medicine::find($request->medicine_a);
        foreach($request->medicine_b as $med){
            $interaction[] = [$request->medicine_a,$medicine_a->name,$med,Medicine::find($med)->name,'',''];
        }
        return Excel::download(new MedicineInteractionsExport($interaction), 'interaction.xlsx');
    }

    public function api_interactions_upload(Request $request){
        // dd($request->all());
        try {
            Excel::import(new MedicineInteractionsImport, $request->file('interactions'));
            }
        catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            $failures = $e->failures();
            dd($failures);
            // foreach ($failures as $failure) {
            //     $failure->row(); // row that went wrong
            //     $failure->attribute(); // either heading key (if using heading row concern) or column index
            //     $failure->errors(); // Actual error messages from Laravel validator
            //     $failure->values(); // The values of the row that has failed.
            // }
        }
        return redirect()->back();
    }

    public function categories(){
        $categories = DrugCategory::all();
        return view('admin.medicines.categories',compact('categories'));
    }

    public function categories_store(Request $request){
        $category = new DrugCategory;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->back();
    }

    public function categories_update(Request $request){
        $category = DrugCategory::find($request->category_id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->back();
    }

    public function drugs(){
        $drugs = Drug::all();
        $categories = DrugCategory::all();
        $medicines = Medicine::paginate(100);
        return view('admin.medicines.drugs',compact('drugs','categories','medicines'));
    }

    public function drugs_store(Request $request){
        $drug = new Drug;
        $drug->name = $request->name;
        $drug->category_id = $request->category_id;
        $drug->manufacturer = $request->manufacturer;
        $drug->dosage_form = $request->dosage_form;
        $drug->status = $request->status;
        $drug->save();
        if($request->filled('medicine_a'))
        $ingredients = Ingredient::updateOrCreate(['drug_id'=> $drug->id,'medicine_id'=> $request->medicine_a],['size' => $request->size_a]);
        if($request->filled('medicine_b'))
        $ingredients = Ingredient::updateOrCreate(['drug_id'=> $drug->id,'medicine_id'=> $request->medicine_b],['size' => $request->size_b]);
        if($request->filled('medicine_c'))
        $ingredients = Ingredient::updateOrCreate(['drug_id'=> $drug->id,'medicine_id'=> $request->medicine_c],['size' => $request->size_c]);
        return redirect()->back();
    }

    public function drugs_update(Request $request){
        $drug = Drug::find($request->drug_id);
        $drug->name = $request->name;
        $drug->category_id = $request->category_id;
        $drug->manufacturer = $request->manufacturer;
        $drug->dosage_form = $request->dosage_form;
        $drug->status = $request->status;
        $drug->save();
        if($request->filled('medicine_a'))
        $ingredients = Ingredient::updateOrCreate(['drug_id'=> $drug->id,'medicine_id'=> $request->medicine_a],['size' => $request->size_a]);
        if($request->filled('medicine_b'))
        $ingredients = Ingredient::updateOrCreate(['drug_id'=> $drug->id,'medicine_id'=> $request->medicine_b],['size' => $request->size_b]);
        if($request->filled('medicine_c'))
        $ingredients = Ingredient::updateOrCreate(['drug_id'=> $drug->id,'medicine_id'=> $request->medicine_c],['size' => $request->size_c]);
        return redirect()->back();
    }

    public function drugs_upload(Request $request){
        $request->session()->forget('imported_drugs');
        try {
                Excel::import(new DrugsImport, $request->file('drugs'));
            }
        catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            $failures = $e->failures();
        }
        return redirect()->route('admin.drugs.apimatching',['drugs' => session('imported_drugs')]);
        // return view('admin.medicines.drugsUpload');
    }

    public function drugs_api_matching(){
        if(request()->isMethod('get')){
            $drugs = session('imported_drugs');
        }else{
            $drugs = Drug::whereIn('id',request()->drugs)->get();
        }
        $categories = DrugCategory::all();
        $medicines = Medicine::all();
        return view('admin.medicines.apimatching',compact('drugs','categories','medicines'));
    }
    
    public function drugs_match(Request $request){
        foreach($request->drugs as $key => $val){
            $drug = Drug::find($val);
            $drug->category_id = $request->category[$key];
            $drug->save();
            if($request->medicine_a[$key])
            $ingredients = Ingredient::updateOrCreate(['drug_id'=> $drug->id,'medicine_id'=> $request->medicine_a[$key]],['size' => $request->size_a[$key]]);
            if($request->medicine_b[$key])
            $ingredients = Ingredient::updateOrCreate(['drug_id'=> $drug->id,'medicine_id'=> $request->medicine_b[$key]],['size' => $request->size_b[$key]]);
            if($request->medicine_c[$key])
            $ingredients = Ingredient::updateOrCreate(['drug_id'=> $drug->id,'medicine_id'=> $request->medicine_c[$key]],['size' => $request->size_c[$key]]);
        }
        return redirect()->route('admin.drugs');
    }

    public function submissions(){
        $categories = DrugCategory::all();
        $medicines = Medicine::paginate(100);
        return view('admin.medicines.submissions',compact('categories','medicines'));
    }

    

    
}
