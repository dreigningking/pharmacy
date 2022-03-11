<?php

namespace App\Http\Controllers\GeneralControllers;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\Medicine;
use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
   
    {
        $user = Auth::user();
        $medicine = Medicine::all();
        dd($medicine);
        return view('main.medicine',compact('user', 'medicine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('main.addmedicine',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $medicine = new Medicine;
        $medicine->name = $request->name;
        $medicine->description = $request->description;
        $medicine->contraindications = $request->contraindications;
        $medicine->save();
        foreach($request->disease as $disease){
            $dis = new Disease;
            $dis->name = $disease;
            $dis->save();

            $medicine->diseases()->attach($dis->id);
        }
       return redirect() ->route("medicine");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function drug(Pharmacy $pharmacy){
        return view('main.pharmacy.drugs',compact('pharmacy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}