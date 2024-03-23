<?php

namespace App\Observers;

use App\Models\Batch;

class BatchObserver
{
    /**
     * Handle the Batch "created" event.
     *
     * @param  \App\Models\Batch  $batch
     * @return void
     */
    public function created(Batch $batch)
    {
        $inventory = $batch->inventory;
        $inventory->quantity = $inventory->available;
        $inventory->save();
    }

    /**
     * Handle the Batch "updated" event.
     *
     * @param  \App\Models\Batch  $batch
     * @return void
     */
    public function updated(Batch $batch)
    {
        $inventory = $batch->inventory;
        $inventory->quantity = $inventory->available;
        $inventory->save();
    }

    public function deleting(Batch $batch)
    {
        $inventory = $batch->inventory;
        $inventory->quantity = $inventory->available;
        $inventory->save();
    }

    /**
     * Handle the Batch "restored" event.
     *
     * @param  \App\Models\Batch  $batch
     * @return void
     */
    public function restored(Batch $batch)
    {
        //
    }

    /**
     * Handle the Batch "force deleted" event.
     *
     * @param  \App\Models\Batch  $batch
     * @return void
     */
    public function forceDeleted(Batch $batch)
    {
        //
    }
}
