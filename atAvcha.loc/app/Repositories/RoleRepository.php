<?php
namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    public function all()
    {
        return Role::all();
    }

    public function findById($id)
    {
        return Role::find($id);
    }

    public function new($data = false)
    {
        return ($data) ? new Role($data) : new Role();
    }
}
