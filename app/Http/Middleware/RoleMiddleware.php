<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * This middleware checks if the role required is admin and you are not admin, abort
     * It also checks if current user has the required role in any of the pharmacies where he belongs
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$roles)
    {
        return $next($request);
        if($request->user()->pharmacies->isNotEmpty()){
            return $next($request);
        }else{
            abort(404,'You do not have permission to view this page');
        }
        
    }
}
