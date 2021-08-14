<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::orderBy('id','asc')->get();
        return view('admin.category.index',compact('categories'));
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
            'name'=> 'required',
        ]);

        category::create($request->only([
            'name',
            'description'
        ]));

        return back()->withSuccess('Category Has been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name'=> 'required',
        ]);

        $category = category::find($id);
        $category->update($request->all());
        return back()->withSuccess('Category Has been Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id != 1){

            $products = product::where('category_id',$id)->get();
            $categories = category::all();
            $defaultCategory = $categories->find(1);
            $requestedCategory = $categories->find($id);

            if($products->count() == 0 ){

                    $requestedCategory->delete();
                    return back()->withSuccess('Category Deleted');

            }else{
                foreach($products as $product){
                    $product->category_id = 1;
                    $product->save();
                    $requestedCategory->delete();
                    return back()->withSuccess('Category Deleted and Products Category Set as '. $defaultCategory->name);
            }

            }


        }else{
            return back()->withErrors('Only Edit Allow for Defalut Category');
        }
    }
}
