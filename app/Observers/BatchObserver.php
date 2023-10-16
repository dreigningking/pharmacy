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
        if($batch->inventory->batches->count() > 1){
            $inventory = $batch->inventory;
            $inventory->quantity += $batch->quantity;
            $inventory->save();
        }else{
            $inventory = $batch->inventory;
            $inventory->quantity = $batch->quantity;
            $inventory->save();
        }
    }

    /**
     * Handle the Batch "updated" event.
     *
     * @param  \App\Models\Batch  $batch
     * @return void
     */
    public function updated(Batch $batch)
    {
        if($batch->isDirty('quantity')){
            $inventory = $batch->inventory;
            if($batch->getOriginal('quantity') > $batch->quantity){
                $inventory->quantity -= ($batch->getOriginal('quantity') - $batch->quantity);
            }else{
                $inventory->quantity += ($batch->quantity - $batch->getOriginal('quantity'));               
            }
            $inventory->save();
        }
    }

    public function deleting(Batch $batch)
    {
        $inventory = $batch->inventory;
        $inventory->quantity -= $batch->quantity;
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
