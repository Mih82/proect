<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateProduct;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Gate;
use Validator;

class ProductController extends AdminController
{
    public function __construct(CategoryRepositoryInterface  $categoryRepository, ProductRepositoryInterface  $productRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->all();
        return response()->json(view(env('THEME').'.admin.products.add_new_product',['categories'=>$categories])->render());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prodModel = $this->productRepository->new();

        if ($request->user()->cannot('create', $prodModel)){
            session()->flash('status', 'Запись не создана! Не хватает прав доступа!');
            return response()->json($this->productRepository->getProducts($request->category));
        }

                        $validated = Validator::make( $request->all() , [
                                                'name'=>'required|max:255',
                                                'description'=>'required',
                                                'price'=>'required'
                                           ]);

        $categories = $this->categoryRepository->all();

        if($validated->fails()) {
              return response()->json(view(env('THEME').'.admin.products.add_new_product',[
                   'categories'=>$categories,
                   'old'=>$request->all(),
                ])->withErrors($validated)
                     //->with($request->all())
                       ->render()
                    );
        }


        if($request->hasFile('img')){
            $file = $request->file('img');
            $imageName = $file->getClientOriginalName();
            $file->move(public_path(env('THEME').'/img/'),$imageName);
        }
        else{ $imageName = 'noImg.jpg';
        }
        $data = $request->except('_token','_method');
        $data['img'] = $imageName;
        $category = $this->categoryRepository->findById($request->category);
        $product = $this->productRepository->new($data);
        $category->products()->save($product);
        $request->session()->flash('status', 'Данные добавлены!!');

        return response()->json($this->getProducts($request->category));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepository->findById($id);
        return response()->json(view(env('THEME').'.admin.products.product',['product'=>$product])->render());
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
    public function update(UpdateProduct $request, $id)
    {
        /*
        $product = $this->productRepository->new();
        if( Gate::denies('update',$product)){
            return redirect()->back()->with('status','Не хватает прав доступа для обновления!');
        }
        */
/*
        $request->validate([
            'name'=>'required|max:255',
            'description'=>'required|max:3',
            'price'=>'required'
        ]);
*/

        if($request->hasFile('img')){
            $file = $request->file('img');
            $imageName = $file->getClientOriginalName();
            $file->move(public_path(env('THEME').'/img/'),$imageName);
        }
        else{ $imageName =  $request->input('oldImg');
        }
        $data = $request->except('_token','_method','oldImg');
        $data['img'] = $imageName;
        $product = $this->productRepository->findById($id);
        $product->update($data);
        //$request->session()->flash('status', 'Данные изменены!!');
        session('status', 'Данные изменены!!');

        return redirect()->back()->with('status','Продукт обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = new Product();
        if (Gate::denies('forceDelete', $product)){
            return response()->json(['status',false]);
        }
        $product = $this->productRepository->findById($id);
        $product->category()->detach();
        $product->delete();
        session()->flash('status', 'Запись удалена!');

        return response()->json(['status',true]);
    }
}
