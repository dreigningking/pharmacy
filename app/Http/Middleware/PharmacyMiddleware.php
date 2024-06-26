<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PharmacyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->pharmacies->isEmpty() && !$request->user()->pharmacy)
        return redirect()->route('pharmacy.setup');
        if(in_array($request->route('pharmacy')->id,$request->user()->pharmacies->pluck('id')->toArray()))
        return $next($request);
        elseif($request->user()->pharmacy_id == $request->route('pharmacy')->id)
        return $next($request);
        else abort(404,'Page not found');
        return $next($request);
    }
}