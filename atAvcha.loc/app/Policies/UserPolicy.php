<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function entry(User $user)
    {
        foreach ($user->roles as $role) {
             return ($role->name === 'Admin') ? true : false;
        }
    }


    public function show(User $user, $data)
    {

        if(Auth::user()->id === $data->id) {
            return true;
        }
        else {
            foreach ($user->roles as $role) {
                return ($role->name === 'Admin') ? true : false;
            }
        }
    }

    public function destroy(User $user, $data)
    {

        if(Auth::user()->id === $data->id) {
            return true;
        }
        else {
            foreach ($user->roles as $role) {
                return ($role->name === 'Admin') ? true : false;
            }
        }
    }
}
