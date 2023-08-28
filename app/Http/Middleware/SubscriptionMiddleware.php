<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class SubscriptionMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        // dd($request->route('pharmacy'));
        if($request->route('pharmacy')){
            if(!$request->route('pharmacy')->activeLicense){
                if($request->user()->id == $request->route('pharmacy')->owner_id){
                    return redirect()->route('subscription.show');
                }else{
                    Auth::logout();
                }
            }
        }
        return $next($request);
        
    }
}
