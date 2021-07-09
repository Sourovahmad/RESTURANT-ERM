<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Intervention\Image\ImageManagerStatic as Photo;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = product::where('active_status','1')
        ->orderBy('id', 'desc')->get();
        $categories = category::all();

        return view('admin.products.index',compact('products','categories'));

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

        $product = new product;
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->active_status = $request->status;

        if(!is_null($request->image)){

            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

            $fileNameFull = time() . '.full.' . $request->image->getClientOriginalName();
            $fileNameSmall = time() . '.small.' . $request->image->getClientOriginalName();

            $imageSize = getimagesize($request->image);

            $pictureSmall = Photo::make($request->image)->fit($imageSize[0], $imageSize[1])->save('images/'.$fileNameFull);
            $pictureBig = Photo::make($request->image)->fit(135, 100)->save('images/'.$fileNameSmall);


            $product->image_small = 'images/'.$fileNameSmall;
            $product->image_big = 'images/'.$fileNameFull;
        }


        $product->save();
        return back()->withSuccess('Product Has Been Save');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
