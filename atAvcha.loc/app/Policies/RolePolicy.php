<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
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

    public function show(User $user)
    {
        //dd($user);
        foreach ($user->roles as $role){
        return ($role->name === 'Admin') ? true : false;
        }
    }

    public function update_role(User $user)
    {
        foreach ($user->roles as $role){
            return ($role->name === 'Admin')? true : false;
        }
    }
}
