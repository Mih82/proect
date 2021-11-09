<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;

class CategoryPolicy
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

    public function add(User $user)
    {
        foreach ($user->roles as $role) {
            return ($role->name === 'Admin') ? true : false;
        }
    }

    public function update(User $user )
    {
        foreach ($user->roles as $role) {
            return ($role->name === 'Admin') ? true : false;
        }
    }

    public function delete(User $user )
    {
        foreach ($user->roles as $role) {
            return ($role->name === 'Admin') ? true : false;
        }
    }

}
