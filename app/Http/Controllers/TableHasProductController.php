<?php

namespace App\Http\Controllers;

use App\Models\serviceProduct;
use App\Models\table;
use App\Models\tableHasProduct;
use App\Models\tableHasRound;
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
        $tableOrderlimit = tableOrderLimit::where('table_id', $request->table_id)->first();
        $totalOrderdItem = $tableOrderlimit->total_orderd + $request->quantity;
        if ($totalOrderdItem > $tableOrderlimit->order_limit) {
            return back()->withErrors('Sorry You Cant order More Then Your Limit');
        }
        $tableOrderlimit->total_orderd = $totalOrderdItem;
        $tableOrderlimit->save();

        $request->validate([
            'table_id'=> 'required',
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        tableHasProduct::create($request->all());

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
    public function destroy(tableHasProduct $tableHasProduct)
    {
        //
    }


    public function OrderedProducts(Request $request)
    {

        $table = table::find($request->table_id);

        if($table->active_status == 1){

        $tableData = tableHasProduct::where('table_id', $request->table_id)->get();
        $requestedTable = $table;
        $table_id = $table->id;
        $tableOrderlimit = tableOrderLimit::where('table_id',$table_id)->first();
        $tableRound = tableHasRound::where('table_id',$table_id)->first();
        $services = serviceProduct::all();
        $current_round = $tableRound->current_round;
        $totalPrice = 0;

        for ($i=0; $i < $tableData->count(); $i++) {

            $multiplyQuantity = $tableData[$i]->quantity * $tableData[$i]->products[0]->price;
            $totalPrice +=  $multiplyQuantity;
        }

         return view('pages.order.index',compact('tableData','totalPrice','requestedTable','table_id', 'tableOrderlimit', 'current_round', 'services'));

        }else{
            return view('errors.tableNotActive');
        }


    }


    public function deleteProductAndUpdateLimit(Request $request)
    {
        $tableHasProduct = tableHasProduct::find($request->order_id);
        $tableHasProduct->delete();


        $tableOrderlimit = tableOrderLimit::where('table_id',$request->table_id)->first();
        $currentOrderItem =  $tableOrderlimit->total_orderd;
        $tableOrderlimit->total_orderd = $currentOrderItem - $request->quantity;
        $tableOrderlimit->save();
        return $this->OrderedProducts($request);
    }


}
