<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Gate;

class CategoryController extends AdminController
{
    public function __construct( CategoryRepositoryInterface  $categoryRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();
        $products = $this->getProducts();
        return view(env('THEME').'.admin.categories.categories',['categories'=>$categories, 'products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = $this->categoryRepository->all();
       // return response()->json(view(env('THEME').'.admin.categories.edit_category',['categories'=>$categories])->render());
        return response()->json( $this->getCategoriesListRender());

/*
        return view(env('THEME').'.admin.categories.categories',[
            'categories'=>$this->categoryRepository->all(),
            'products'=>$this->getEditCategoriesForm(),
            ]);
*/

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = $this->categoryRepository->new();

        if(Gate::denies('add', $category)) {
            $request->session()->flash('status', 'Не хватает прав доступа!');
            return response()->json([ $this->getCategoriesListRender()]);
        }
        $category = $this->categoryRepository->new();
        $category->name = $request->name;
        $category->save();
        $request->session()->flash('status', 'Запись создана!!');
        return response()->json([ $this->getCategoriesListRender()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json( $this->getProducts($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $category = $this->categoryRepository->new();
       if(Gate::denies('update', $category)) {
           $request->session()->flash('status', 'Не хватает прав доступа на обновление!');
            return response()->json([$this->getCategoriesListRender()]);
       }

           $category = $this->categoryRepository->findById($request->updateId);
           $category->update(['name' => $request->updateName]);
           $request->session()->flash('status', 'Запись изенена!');

           return response()->json([$this->getCategoriesListRender()]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category = $this->categoryRepository->new();
        if(Gate::denies('delete', $category )){;
            $request->session()->flash('status', 'Не хватает прав доступа для удаления записи!');
            return response()->json([ $this->getCategoriesListRender()]);
        }
        $category = $this->categoryRepository->findById($request->destroyId) ;
        $category->products()->detach();
        $category->delete();

        return response()->json([ $this->getCategoriesListRender()]);
    }
}
