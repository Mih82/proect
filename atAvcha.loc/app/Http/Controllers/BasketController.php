<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function getTotalQuantity()
    {
        (!isset($_COOKIE['cart_id'])) ?  $totalQuantity = 0 : $totalQuantity = \ Cart::session($_COOKIE['cart_id'])-> getTotalQuantity();
        return response()->json(['totalQuantity'=>$totalQuantity]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart_id = $_COOKIE['cart_id'];
        $items = \Cart::session($cart_id)->getContent();
        return view(env("THEME").'.basket',['baskets'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        $product = Product::find($id);
        //dd($product);
        if (!isset($_COOKIE['cart_id']))  setcookie('cart_id',uniqid());
        $cart_id = $_COOKIE['cart_id'];
        //\Cart::session($cart_id);

        \Cart::session($cart_id)->add(array(
            'id' => uniqid(),
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array([
                'img'=> $product->img,
            ]),
            'associatedModel' => $product
        ));

        return response()->json(['status'=>'ok' ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //dd($request['quantity']);
        $cart_id = $_COOKIE['cart_id'];
        \ Cart::session($cart_id)->update( $request['rowId'],[
            'quantity' => [
                'relative' => false ,
                'value' => $request['quantity']
            ]
        ] );

        ;
        return response()->json(['totalQuantity'=>\ Cart::session($_COOKIE['cart_id'])-> getTotalQuantity()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart_id = $_COOKIE['cart_id'];
        \ Cart::session($cart_id)->remove($id);
        //$baskets = \Cart::getContent();
        //return response()->json(view(env('THEME').'.basket_table',['baskets'=>$baskets])->render());
        return response()->json(['status',true]);
    }
}
