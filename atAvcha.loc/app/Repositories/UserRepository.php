<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function findById($id)
    {
        return User::find($id);
    }

    public function new($data = false)
    {
        return ($data) ? new User($data) : new User();
    }
}
