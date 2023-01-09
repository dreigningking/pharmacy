<?php

namespace App\Observers;

use App\Models\Patient;
use App\Models\Pharmacy;
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
        // $pharmacy->notify(new WelcomeNotification())
        Patient::create(['pharmacy_id'=> $pharmacy->id,'name'=> 'Walkin Customer','mobile'=> $pharmacy->id.'000000','email'=> $pharmacy->email,'dob'=> $pharmacy->created_at,'gender'=> 'Male','emr'=> 'WALKIN000','address'=> $pharmacy->address,'country_id'=> $pharmacy->country_id,'state_id'=> $pharmacy->state_id,'city_id'=> $pharmacy->city_id]);
    }

    /**
     * Handle the Pharmacy "updated" event.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return void
     */
    public function updated(Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Handle the Pharmacy "deleted" event.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return void
     */
    public function deleted(Pharmacy $pharmacy)
    {
        //
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
