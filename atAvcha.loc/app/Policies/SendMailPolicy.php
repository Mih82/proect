<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class SendMailPolicy
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

    public function send(User $user)
    {
        foreach($user->roles as $role){
            return ($role['name'] === 'Admin')? true : false;
        }
    }

}
