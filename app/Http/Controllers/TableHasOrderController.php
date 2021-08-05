<?php

namespace App\Http\Controllers;

use App\Models\table;
use App\Models\tableHasOrder;
use App\Models\tableHasProduct;
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
        $tables = table::all();
        return view('admin.employee.index',compact('tables'));
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
        return $tableHasProduct;
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
