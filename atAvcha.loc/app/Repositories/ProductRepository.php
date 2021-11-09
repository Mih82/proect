<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::all();
    }

    public function findById($id)
    {
        return Product::find($id);
    }

    public function new($data = false)
    {
        return ($data) ? new Product($data) : new Product();
    }
    public function getProducts($id = false){
        $category = ($id) ? Category::find($id) : Category::first();
        $products = $category->products;
        $categories = Category::all();
        return view(env('THEME').'.admin.products.products',['products'=>$products, 'categories'=>$categories]) ->render();
    }
}
