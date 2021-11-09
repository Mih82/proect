<?php

namespace App\Http\Controllers;


use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Discussion;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class IndexController extends Controller
{

    public function __construct( CategoryRepositoryInterface  $categoryRepository,
                                 ProductRepositoryInterface  $productRepository
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
        $contents = $this->categoryRepository->all();
        $products = $contents->first()->products;
        $discussions = Discussion::latest()->take(3)->get();
        $user = new User();
        //$news = News::latest()->take(3)->get();
        $news = News::orderBy('id', 'desc')->take(3)->get();


        return view(env('THEME').'.show_catalog', ['contents'=>$contents, 'products'=>$products,
           'discussions'=>$discussions, 'news'=>$news, 'user'=>$user,
            ]);
    }

    /*    public function product_select($id)
        {
            $product = $this->productRepository->findById($id);
            $contents = $this->categoryRepository->all();
            $discussions = Discussion::latest()->take(3)->get();
            $news = News::latest()->take(3)->get();
            return view(env('THEME').'.index',['contents'=>$contents, 'product'=>$product,
            'discussions'=>$discussions, 'news'=>$news
            ]);
        }
    */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $catalog_id)
    {
        $contents = $this->categoryRepository->all();
        $products = $contents->find($catalog_id)->products;
        $discussions = Discussion::latest()->take(3)->get();
        $news = News::latest()->take(3)->get();
        //dd($products);
     /*
        return view(env('THEME').'.show_catalog', ['contents'=>$contents, 'products'=>$products,
            'discussions'=>$discussions, 'news'=>$news ]);
    */
        return response()->json( view(env('THEME').'.show_table_content',['products'=>$products])->render() );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function edit(Index $index)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Index $index)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy(Index $index)
    {
        //
    }
}
