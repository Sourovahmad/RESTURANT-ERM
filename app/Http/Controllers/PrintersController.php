<?php

namespace App\Http\Controllers;

use App\Models\printers;
use App\Models\tableHasOrder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

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
        $request->validate([
            'name' => "required",
            'description' => "required",
        ]);

        printers::create($request->only([
            'name',
            'description'
        ]));

        return back()->withSuccess("Printer Added Successfully");
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
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $printers = printers::find($request->id);
        $printers->update($request->only([
            'name',
            'description'
        ]));
        return back()->withSuccess('Printer Has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\printers  $printers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //    find the connections and connect them with a default printers
           $printers = printers::find($id);
           $printers->delete();
         return back()->withErrors("Printer Deleted Successfully");
    }


    public function printOrderKitchen(){


        $orders = tableHasOrder::where('printed',false)->orderBy('table_id')->get();
        $table_name = "";
        if(!$orders->isEmpty())
        {
            $connector = new WindowsPrintConnector("EPSON L380 Series");
            $printer = new Printer($connector);

            foreach($orders as $order){
                if($table_name != $order->table->name){
                    $table_name = $order->table->name;

                    $printer -> text($table_name . "\n");
                }
                
                $printer -> text($order->quantity . "x    ". $order->products->name ."\n");

            }
            // $printer->cut();
            $printer -> close();

            foreach($orders as $order){
                $order->printed = true;
                $order->save();
            }
        }
        return 'success';
    }
}
