<?php

namespace App\Http\Controllers;

use App\Http\Requests\productValidation;
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

        $products = product::orderBy('id', 'desc')->get();
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
    public function store(productValidation $request)
    {

        $product = new product;
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->active_status = $request->status;
        $product->price = $request->price;

        if(!is_null($request->chinese_name)){
            $product->chinese_name = $request->chinese_name;
        }
        if(!is_null($request->image)){

            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

            $fileNameFull = time() . '.full.' . $request->image->getClientOriginalName();
            $fileNameSmall = time() . '.small.' . $request->image->getClientOriginalName();

            $imageSize = getimagesize($request->image);

            $pictureBig = Photo::make($request->image)->fit($imageSize[0], $imageSize[1])->save('images/'.$fileNameFull);
            $pictureSmall = Photo::make($request->image)->fit(135,225)->save('images/'.$fileNameSmall);


            $product->image_small = 'images/'.$fileNameSmall;
            $product->image_big = 'images/'.$fileNameFull;
        }


        $product->save();
        return back()->withSuccess('Product Has Been Saved');


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
    public function update(productValidation $request, product $product)
    {
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->active_status = $request->status;
        $product->price = $request->price;
        
        if (!is_null($request->chinese_name)) {
            $product->chinese_name = $request->chinese_name;
        }
        if (!is_null($request->image)) {

            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

            $fileNameFull = time() . '.full.' . $request->image->getClientOriginalName();
            $fileNameSmall = time() . '.small.' . $request->image->getClientOriginalName();

            $imageSize = getimagesize($request->image);

            $pictureBig = Photo::make($request->image)->fit($imageSize[0], $imageSize[1])->save('images/' . $fileNameFull);
            $pictureSmall = Photo::make($request->image)->fit(135, 225)->save('images/' . $fileNameSmall);


            $product->image_small = 'images/' . $fileNameSmall;
            $product->image_big = 'images/' . $fileNameFull;
        }


        $product->save();
        return back()->withSuccess('Product Has Been updated');
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
