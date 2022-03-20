<?php

namespace App\Http\Controllers\WebControllers\AdminControllers;

use App\Models\Disease;
use App\Models\Medicine;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.medicines.upload');
    }
    public function uploadMedicine(Request $request){

    }
    public function uploadMedicineRelationship(Request $request){
        
    }
    public function uploadDiseases(Request $request){
        
    }
    public function uploadMedicineReactions(Request $request){
        
    }
}
