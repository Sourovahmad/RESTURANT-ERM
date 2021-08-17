<?php

namespace App\Http\Controllers;

use App\Models\table;
use App\Models\tableHasRound;
use App\Models\tableOrderLimit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TableHasRoundController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tableHasRound  $tableHasRound
     * @return \Illuminate\Http\Response
     */
    public function show(tableHasRound $tableHasRound)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tableHasRound  $tableHasRound
     * @return \Illuminate\Http\Response
     */
    public function edit(tableHasRound $tableHasRound)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tableHasRound  $tableHasRound
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tableHasRound $tableHasRound)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tableHasRound  $tableHasRound
     * @return \Illuminate\Http\Response
     */
    public function destroy(tableHasRound $tableHasRound)
    {
        //
    }


    public function Roundupdate(Request $request)
    {

        $table = table::find($request->table_id);
        $table->end_time = Carbon::now()->addMinutes(150);
        $table->save();

        $tableHasRound = tableHasRound::where('table_id', $request->table_id)->first();
        $tableHasRound->current_round = $tableHasRound->current_round + 1;
        $tableHasRound->save();

        $tableOrderLimit = tableOrderLimit::where('table_id', $request->table_id)->first();
        $tableOrderLimit->total_orderd = 0;
        $tableOrderLimit->save();

    }
}
