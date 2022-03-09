<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SubscriptionMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        if($request->route('pharmacy') && $request->route('pharmacy')->subscriptions->isEmpty()){
            return redirect()->route('plans');
        }elseif($request->user()->subscriptions->isEmpty() || $request->user()->subscriptions->where('status',true)->isEmpty()){
            return redirect()->route('plans');
        }
        return $next($request);
    }
}
