<?php

namespace App\Http\Requests;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

use Gate;

class UpdateProduct extends FormRequest
{
    public function __construct(CategoryRepositoryInterface  $categoryRepository, ProductRepositoryInterface  $productRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $prodModel = $this->productRepository->new();

        if (Gate::denies('create', $prodModel)){
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:255',
            'description'=>'nullable|max:3',
            'price'=>'required'
        ];
    }
   // protected $redirectRoute = '';
}
