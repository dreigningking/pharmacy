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
    public function handle($request, Closure $next,...$roles)
    {
        // dd($roles);
        $role_ids = Role::whereIn('name',$roles)->get()->pluck('id')->toArray();
        if(in_array('admin',$roles) && $request->user()->admin != true){
            \abort(404,'You do not have permission to view this page');
        }
        elseif(!(in_array('admin',$roles)) && $request->user()->pharmacies->whereIn('pivot.role_id',$role_ids)->isEmpty()){
            abort(404,'You do not have permission to view this page');
        }
        return $next($request);
    }
}
