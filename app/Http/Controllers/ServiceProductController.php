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

        $request->validate([
            'name' => 'required',
        ]);


        $serviceProduct = new serviceProduct;
        $serviceProduct->name = $request->name;
        $serviceProduct->save();
        return back()->withSuccess('Service Has been Saved');


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
        ]);

       $serviceProduct = serviceProduct::find($request->id);
        $serviceProduct->name = $request->name;
        $serviceProduct->save();
        return back()->withSuccess('Service Has been updated');

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
