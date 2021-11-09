<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * @param false $id
     * @return array|string
     *  $products = $category->products
     */
    public function getProducts($id = false){
        $category = ($id) ? $this->categoryRepository->findById($id) : $this->categoryRepository->first();
        $products = $category->products;
        $categories = $this->categoryRepository->all();
        return view(env('THEME').'.admin.products.products',['products'=>$products, 'categories'=>$categories]) ->render();
    }

    protected function getEditCategoriesForm(){
        $categories = $this->categoryRepository->all();
        return view(env('THEME').'.admin.categories.edit_category',['categories'=>$categories])->render();
    }

    protected function getCategoriesListRender(){
        $categories = $this->categoryRepository->all();
        return view(env('THEME').'.admin.categories.categories_list_edit_render',['categories'=>$categories])->render();
    }
}

