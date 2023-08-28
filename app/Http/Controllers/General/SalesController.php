<?php

namespace App\Http\Controllers\General;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Prescription;

class SalesController extends Controller
{
    
    public function index(Pharmacy $pharmacy){
        return view('pharmacy.sales.list',compact('pharmacy'));
    }

    public function create(Pharmacy $pharmacy,Prescription $prescription = null)
    {
        $inventories = $pharmacy->inventories;
        return view('pharmacy.sales.create',compact('pharmacy','inventories','prescription'));
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {
        return view('pharmacy.sales.view',compact('pharmacy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
