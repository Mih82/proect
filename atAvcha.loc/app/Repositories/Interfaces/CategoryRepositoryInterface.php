<?php
namespace App\Repositories\Interfaces;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function all();

    public function findById($id);

    public function first();

    public function new();

}
