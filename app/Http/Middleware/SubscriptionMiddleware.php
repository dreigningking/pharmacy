<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SubscriptionMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        if($request->route('pharmacy')){
            if($request->route('pharmacy')->subscriptions->isEmpty()){
                return redirect()->route('pricing');
            }
        }elseif($request->user()->subscriptions->isEmpty() || $request->user()->subscriptions->where('status',true)->isEmpty()){
            return redirect()->route('pricing');
        }
        return $next($request);
    }
}
