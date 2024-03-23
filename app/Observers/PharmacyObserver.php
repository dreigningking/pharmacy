<?php

namespace App\Observers;

use App\Models\Patient;
use App\Models\Pharmacy;
use App\Models\Inventory;
use Illuminate\Support\Facades\Storage;
use App\Notifications\WelcomeNotification;

class PharmacyObserver
{
    /**
     * Handle the Pharmacy "created" event.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return void
     */
    public function created(Pharmacy $pharmacy)
    {
        $patient = Patient::create(['pharmacy_id'=> $pharmacy->id,'name' => 'Walkin Patient','email'=> $pharmacy->email,
        'mobile'=> $pharmacy->mobile,'gender'=> 'male']);
        $pharmacy->walkin_patient_id = $patient->id;
        $pharmacy->save();

    }

    /**
     * Handle the Pharmacy "updated" event.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return void
     */
    public function updated(Pharmacy $pharmacy)
    {
        if($pharmacy->isDirty('shelves')){
            $shelves = explode(',',$pharmacy->shelves);
            Inventory::whereNotIn('shelf',$shelves)->update(['shelf'=> null]);
        }
        if($pharmacy->isDirty('categories')){
            $categories = explode(',',$pharmacy->categories);
            Inventory::whereNull('drug_id')->whereNotIn('category',$categories)->update(['category'=> null]);
        }
    }

    public function deleting(Pharmacy $pharmacy){
        $pharmacy->inventories()->delete();
        $pharmacy->purchases()->delete();
        $pharmacy->patients()->delete();
        $pharmacy->assessments()->delete();
        $pharmacy->prescriptions()->delete();
        $pharmacy->sales()->delete();
        $pharmacy->users()->delete();
        $pharmacy->activeLicense->update(['pharmacy_id'=> null]);
        Storage::delete('public/pharmacies/logos',$pharmacy->image);
    }

    public function deleted(Pharmacy $pharmacy)
    {
        //send an email that the pharmacy has been deleted
    }

    /**
     * Handle the Pharmacy "restored" event.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return void
     */
    public function restored(Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Handle the Pharmacy "force deleted" event.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return void
     */
    public function forceDeleted(Pharmacy $pharmacy)
    {
        //
    }
}
