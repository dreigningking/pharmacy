<?php

namespace App\Http\Controllers\WebControllers\AdminControllers;

use App\Models\Drug;
use App\Models\Medicine;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\DrugsImport;
use App\Imports\MedicinesImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MedicineRelationshipsExport;
use App\Imports\MedicineRelationshipsImport;
class MedicineController extends Controller
{
    public function index()
   
    {
        $user = Auth::user();
        $medicines = Medicine::all();
        // dd($medicine);
        return view('admin.medicines.list',compact('user', 'medicines'));
    }

    public function create()
    {
        $user = Auth::user();
        $diseases = Medicine::all()->pluck('curables');
        $diseases = $diseases->filter()->flatten()->unique();
        return view('admin.medicines.create',compact('user','diseases'));
    }

    public function store(Request $request)
    {
        $medicine = new Medicine;
        $medicine->name = $request->name;
        $medicine->description = $request->description;
        $medicine->contraindications = $request->contraindications;
        $medicine->save();
        foreach($request->disease as $disease){
            $dis = Disease::firstOrCreate(['name'=> $disease]);
            $medicine->diseases()->attach($dis->id);
        }
       return redirect() ->route("admin.medicines");
    }

    public function drugs()
    {
        $drugs = Drug::all();
        return view('admin.medicines.drugs',compact('drugs'));
    }

    public function destroy($id)
    {
        //
    }

    public function upload(){
        $medicines = Medicine::all();
        $api = 'Bendazac lysine';
        // dd(array_key_exists(1,explode(':',$api)));
        
        // $medicine = Medicine::where('name','LIKE',$this->cleanapi($api).'%')->first(); 
        // dd($medicine);
        return view('admin.medicines.upload',compact('medicines'));
    }

    public function cleanapi($api){
        if(Str::length($api) < 6)
            return $api;
        if(Str::contains($api, ' ')){
            $text = explode(' ',$api)[0];
            return Str::substr($text, 0, ceil(Str::length($text)/2)+1); 
        }     
        else
            return Str::substr($api, 0, ceil(Str::length($api)/2)+1); 
    }

    public function uploadMedicine(Request $request){
        try {
            Excel::import(new MedicinesImport, $request->file('medicines'));
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
    
    public function downloadRelationship(Request $request){
        // dd($request->all());
        $relationship = [];
        $medicine_a = Medicine::find($request->medicine_a);
        foreach($request->medicine_b as $med){
            $relationship[] = [$request->medicine_a,$medicine_a->name,$med,Medicine::find($med)->name,'',''];
        }
        return Excel::download(new MedicineRelationshipsExport($relationship), 'relationship.xlsx');
    }
    public function uploadRelationship(Request $request){
        // dd($request->all());
        try {
            Excel::import(new MedicineRelationshipsImport, $request->file('relationships'));
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

    public function uploadDrug(Request $request){
        // dd($request->all());
        try {
            Excel::import(new DrugsImport, $request->file('drugs'));
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
    
}
