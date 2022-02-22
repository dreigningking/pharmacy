<?php
namespace App\Http\Traits;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

trait CreateUserTrait
{
    protected function createUser(Request $request){
        $role = Role::where('name','user')->first();
        $info = Cache::get(request()->ip());
            $user = User::create([
                    'firstname' => $request->firstname,
                    'surname' => $request->firstname,
                    'email' => $request->firstname,
                    'mobile' => $request->mobile,
                    'password' => Hash::make($request->firstname),
                    'timezone' => $info['timezone'], 
                    'country_id' => $info['country_id'], 
                    'state_id' => $info['state_id'], 
                    'city_id' => $info['city_id'], 
                    'role_id' => $role->id, 
                ]);
        return $user;
    }

    protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'firstname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    
}

