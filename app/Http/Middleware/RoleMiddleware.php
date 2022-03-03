<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $role_id = Role::where('name',$role)->first()->id;
        if(!$request->user()->pharmacies->where('role_id',$role_id)->isEmpty())
            return redirect()->route('workspaces');
        return $next($request);
    }
}
