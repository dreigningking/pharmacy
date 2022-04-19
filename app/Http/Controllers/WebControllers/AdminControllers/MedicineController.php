<?php

namespace App\Http\Controllers\WebControllers\AdminControllers;

use App\Models\Item;
use App\Models\Disease;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Imports\MedicinesImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MedicineRelationshipsExport;
class MedicineController extends Controller
{
    public function index()
   
    {
        $user = Auth::user();
        $medicine = Medicine::all();
        // dd($medicine);
        return view('admin.medicines.list',compact('user', 'medicine'));
    }

    public function create()
    {
        $user = Auth::user();
        $diseases = Disease::all();
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

    public function diseases()
    {
        $diseases = Disease::all();
        return view('admin.medicines.diseases',compact('diseases'));
    }

    public function drugs()
    {
        $items = Item::all();
        return view('admin.medicines.drugs',compact('items'));
    }

    public function destroy($id)
    {
        //
    }

    public function upload(){
        $medicines = Medicine::all();
        return view('admin.medicines.upload',compact('medicines'));
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
        
    }
    public function uploadDiseases(Request $request){
        
    }
    public function uploadMedicineReactions(Request $request){
        
    }
}
