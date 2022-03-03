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
        
        if($request->user()->pharmacies->isEmpty())
        return redirect()->route('setup');
        if($request->user()->pharmacies->where('id',$request->route('pharmacy')->id)->where('pivot.status',false)->isNotEmpty())
        return redirect()->route('invitations');
        if($request->user()->pharmacies->where('id',$request->route('pharmacy')->id)->isEmpty())
        abort(404,'You do not have permission to view this page');
        return $next($request);
    }
}