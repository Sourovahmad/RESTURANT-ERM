<?php

namespace App\Http\Controllers;

use App\Models\table;
use App\Models\tableHasOrder;
use App\Models\tableHasProduct;
use App\Models\tableHasRound;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TableHasOrderController extends Controller
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
        $tableHasProduct = tableHasProduct::where('table_id', $request->table_id)->get();

        for ($i=0; $i < $tableHasProduct->count(); $i++) {

            $tableHasOrder = new tableHasOrder;
            $tableHasOrder->table_id = $tableHasProduct[$i]->table_id;
            $tableHasOrder->product_id = $tableHasProduct[$i]->product_id;
            $tableHasOrder->quantity = $tableHasProduct[$i]->quantity;
            $tableHasOrder->round = $request->round;
            $tableHasOrder->save();

           $currentTableProduct = tableHasProduct::find($tableHasProduct[$i]->id);
            $currentTableProduct->delete();

        }

        $table = table::find($request->table_id);
        $table->order_limit_time = Carbon::now()->addMinutes(10);
        $table->save();

        $tableHasRound = tableHasRound::where('table_id', $request->table_id)->first();
        $tableHasRound->current_round = $tableHasRound->current_round + 1;
        $tableHasRound->save();


        return redirect($table->table_url)->withSuccess('We Recived Your Order, Thank You');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tableHasOrder  $tableHasOrder
     * @return \Illuminate\Http\Response
     */
    public function show(tableHasOrder $tableHasOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tableHasOrder  $tableHasOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(tableHasOrder $tableHasOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tableHasOrder  $tableHasOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tableHasOrder $tableHasOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tableHasOrder  $tableHasOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(tableHasOrder $tableHasOrder)
    {
        //
    }
}
