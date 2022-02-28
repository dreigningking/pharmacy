<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Str;

use App\Http\Traits\GeoLocationTrait;

class VisitorMiddleware
{
    use GeoLocationTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( !(Str::contains($request->path(), ['css', 'font','js']))){
            $location = $this->getLocation();
        }
        return $next($request);
    }
}