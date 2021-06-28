<?php

namespace App\Http\Controllers;

use App\Models\printers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PrintersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $printers = printers::orderBy('id', 'DESC')->get();
            return view('admin.printer.index',compact('printers'));
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
     * @param  \App\Models\printers  $printers
     * @return \Illuminate\Http\Response
     */
    public function show(printers $printers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\printers  $printers
     * @return \Illuminate\Http\Response
     */
    public function edit(printers $printers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\printers  $printers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, printers $printers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\printers  $printers
     * @return \Illuminate\Http\Response
     */
    public function destroy(printers $printers)
    {
        //
    }
}
