<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class RoleMiddleware
{
    /**
     * This middleware checks if the role required is admin and you are not admin, abort
     * It also checks if current user has the required role in any of the pharmacies where he belongs
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $role_id = Role::where('name',$role)->first()->id;
        \abort_if($role == 'admin' && !$request->user()->admin,400);
        if(!$request->user()->pharmacies->where('role_id',$role_id)->isEmpty())
        abort(404,'You do not have permission to view this page');
        return $next($request);
    }
}
