<?php

namespace App\Http\Controllers;

use App\Models\table;
use App\Models\tableHasProduct;
use App\Models\tableOrderLimit;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TableHasProductController extends Controller
{
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
            'table_id'=> 'required',
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        tableHasProduct::create($request->all());

        $tableOrderlimit = tableOrderLimit::where('table_id',$request->table_id)->first();
        $totalOrderdItem = $tableOrderlimit->total_orderd + 1;
        $tableOrderlimit->total_orderd = $totalOrderdItem;
        $tableOrderlimit->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tableHasProduct  $tableHasProduct
     * @return \Illuminate\Http\Response
     */
    public function show(tableHasProduct $tableHasProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tableHasProduct  $tableHasProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(tableHasProduct $tableHasProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tableHasProduct  $tableHasProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tableHasProduct $tableHasProduct)
    {
        $tableHasProduct = tableHasProduct::find($request->table_product_id);
        $tableHasProduct->quantity = $request->quantity;
        $tableHasProduct->save();


        $tableOrderlimit = tableOrderLimit::where('table_id',$request->table_id)->first();

        if($request->request_for == 1){
            $totalOrderdItem = $tableOrderlimit->total_orderd + 1;
            $tableOrderlimit->total_orderd = $totalOrderdItem;
            $tableOrderlimit->save();
        } else{
            $totalOrderdItem = $tableOrderlimit->total_orderd - 1;
            $tableOrderlimit->total_orderd = $totalOrderdItem;
            $tableOrderlimit->save();
        }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tableHasProduct  $tableHasProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(tableHasProduct $tableHasProduct,$order_id)
    {
       $tableHasProduct = tableHasProduct::find($order_id);
       $tableHasProduct -> delete();
       return back()->withErrors('Item Deleted');
    }


    public function OrderedProducts($table_id)
    {

        $table = table::find($table_id);

        if($table->active_status == 1){

        $tableData = tableHasProduct::where('table_id', $table_id)->get();
        $requestedTable = $table;
        $table_id = $table->id;
        $tableOrderlimit = tableOrderLimit::where('table_id',$table_id)->first();

        $totalPrice = 0;

        for ($i=0; $i < $tableData->count(); $i++) {

            $multiplyQuantity = $tableData[$i]->quantity * $tableData[$i]->products[0]->price;
            $totalPrice +=  $multiplyQuantity;
        }

         return view('pages.order.index',compact('tableData','totalPrice','requestedTable','table_id', 'tableOrderlimit'));

        }else{
            return view('errors.tableNotActive');
        }


    }
}
