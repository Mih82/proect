<?php
namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function findById($id)
    {
        return Category::find($id);
    }

    public function first()
    {
        return Category::first();
    }

    public function new()
    {
        return new Category;
    }
}
