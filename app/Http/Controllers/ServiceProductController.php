<?php

namespace App\Http\Controllers;

use App\Models\serviceProduct;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Intervention\Image\ImageManagerStatic as Photo;
use SebastianBergmann\Environment\Runtime;

class ServiceProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceProducts = serviceProduct::all();
        return view('admin.ServiceProduct.index',compact('serviceProducts'));
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

        $serviceProduct = new serviceProduct;
        $serviceProduct->name = $request->name;
        $serviceProduct->price = $request->price;

        if($request->price != 0){
             $serviceProduct->cost_status = 2;
        } else {
             $serviceProduct->cost_status = 1;
        }



            $fileNameFull = time() . '.full.' . $request->image->getClientOriginalName();
            $fileNameSmall = time() . '.small.' . $request->image->getClientOriginalName();

            $imageSize = getimagesize($request->image);

            $pictureBig = Photo::make($request->image)->fit($imageSize[0], $imageSize[1])->save('images/'.$fileNameFull);
            $pictureSmall = Photo::make($request->image)->fit(135,225)->save('images/'.$fileNameSmall);


            $serviceProduct->image_small = 'images/'.$fileNameSmall;
            $serviceProduct->image_big = 'images/'.$fileNameFull;


        $serviceProduct->save();
        return back()->withSuccess('Service Product Has been Saved');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\serviceProduct  $serviceProduct
     * @return \Illuminate\Http\Response
     */
    public function show(serviceProduct $serviceProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\serviceProduct  $serviceProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(serviceProduct $serviceProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\serviceProduct  $serviceProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, serviceProduct $serviceProduct)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'cost_status' => 'required',
        ]);

       $serviceProduct = serviceProduct::find($request->id);
        $serviceProduct->name = $request->name;
        $serviceProduct->price = $request->price;

        if ($request->price != 0) {
            $serviceProduct->cost_status = 2;
        } else {
            $serviceProduct->cost_status = 1;
        }

        if(!is_null($request->image)){

        $fileName = time() . '.full.' . $request->image->getClientOriginalName();
        $imageSize = getimagesize($request->image);
        $pictureSmall = Photo::make($request->image)->fit($imageSize[0], $imageSize[1])->save('images/'.$fileName);
        $serviceProduct->image = 'images/'.$fileName;

        }


        $serviceProduct->save();
        return back()->withSuccess('Service Product Has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\serviceProduct  $serviceProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(serviceProduct $serviceProduct)
    {
        //
    }
}
