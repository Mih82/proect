<?php

namespace App\Http\Requests;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Gate;

class StoreProduct extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
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
            [
                'name'=>'required|max:255',
                'description'=>'required|max:3',
                'price'=>'required'
            ]
        ];
    }
    //protected $redirectRoute;
}
