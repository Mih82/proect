<?php
namespace App\Repositories\Interfaces;


interface UserRepositoryInterface
{
    public function all();

    public function findById($id);

    public function new();
}

