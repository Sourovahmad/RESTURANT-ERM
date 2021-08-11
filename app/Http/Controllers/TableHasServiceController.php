<?php

namespace App\Http\Controllers;

use App\Models\table;
use App\Models\tableHasService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TableHasServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tableHasService::all()->groupBy('table_id');
        return $data;
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
        $tableHasService = new tableHasService;
        $tableHasService->table_id = $request->table_id;
        $tableHasService->service = $request->service;
        $tableHasService->save();
        $table = table::find( $request->table_id);
        return redirect($table->table_url)->withSuccess('Service asked for '.$request->service );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tableHasService  $tableHasService
     * @return \Illuminate\Http\Response
     */
    public function show(tableHasService $tableHasService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tableHasService  $tableHasService
     * @return \Illuminate\Http\Response
     */
    public function edit(tableHasService $tableHasService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tableHasService  $tableHasService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tableHasService $tableHasService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tableHasService  $tableHasService
     * @return \Illuminate\Http\Response
     */
    public function destroy(tableHasService $tableHasService)
    {
        //
    }
}
