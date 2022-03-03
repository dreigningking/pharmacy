<?php

namespace App\Observers;

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
