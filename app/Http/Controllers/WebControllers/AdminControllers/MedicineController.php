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

    public function drugs(){
        $drugs = Drug::all();
        return view('admin.medicines.drugs',compact('drugs'));
    }

    public function drugsUpload(){
        return view('admin.medicines.drugsUpload');
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

    public function interactions(){
        $medicines = Medicine::all();
        return view('admin.medicines.interactions',compact('medicines'));
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

    
    
}
