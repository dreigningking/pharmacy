<?php
namespace App\Http\Traits;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Pharmacy;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

trait PharmacyTrait
{
    protected function createSubscription(Plan $plan,Pharmacy $pharmacy,$duration,$trial = false){
        // $trial= false;
        $start = Carbon::now();
        $end = Carbon::now()->addYears($duration);
        $trial_end = Carbon::now()->addDays($duration);
        $warn = $trial ? Carbon::now()->addDays($duration)->subDays(2) : Carbon::now()->addYears($duration)->subWeeks(2);
        $subscription = Subscription::create(['user_id'=> Auth::id(),'pharmacy_id'=> $pharmacy->id,
        'plan_id'=> $plan->id,'trial'=> $trial,
        'start'=> $start,
        'end'=> $trial ? $trial_end : $end,
        'warn'=> $warn,
        'status'=> true]);
        return $subscription;
            
    }

    protected function getLicense(){
        return str_shuffle(str_replace('.','',strtoupper(uniqid('',true).time())));
    }


    
}

