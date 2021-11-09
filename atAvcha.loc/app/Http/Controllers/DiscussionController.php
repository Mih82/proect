<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;

class DiscussionController extends Controller
{
    public function get_form($id)
    {
        $discussion = Discussion::find($id);

        $product['id'] = $discussion['product_id'];

        return response()->json( view(env('THEME').'.discussion_form',[
            'product'=>$product,
            'discussion'=>$discussion,
        ])->render() );

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $discussions = Discussion::latest()->take(3)->get;
        dd($discussions);
        return view(env("THEME").'.index',['discussions'=>$discussions ]);
        */
    }

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
        $data = $request->except('_token');
        $discussion = new Discussion($data);
        $discussion->save();
       return redirect()->route('discussion.show',['id'=>$discussion->id]);
        //dd('ok' , $discussion->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discussion = Discussion::find($id);
        $regulator = ( $discussion->parent_id == 0 ) ? 0 : 1 ;

        return response()->json( [ $regulator ,  view(env('THEME').'.add_discussion_one',['discussion'=>$discussion])
            ->render()]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
