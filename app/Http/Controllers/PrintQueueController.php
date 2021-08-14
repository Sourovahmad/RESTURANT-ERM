<?php

namespace App\Http\Controllers;

use App\Models\printers;
use App\Models\printQueue;
use App\Models\setting;
use App\Models\tableHasOrder;
use Illuminate\Http\Request;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class PrintQueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $printQueues = printQueue::all();
        foreach($printQueues as $printQueue){
            $orders = tableHasOrder::where('table_id',$printQueue->table_id)->get();

            if(!$orders->isEmpty())
            {
                $settings = setting::find(1);
                $printer = printers::find($settings->bill_printer_id);
    
                $connector = new WindowsPrintConnector($printer->name);
                $printer = new Printer($connector);
                $total_price = 0;

                $printer -> text($settings->website_name."\n");
                $printer -> text($settings->address."\n");
                $printer -> text($settings->email."\n");
                $printer -> text($settings->phone."\n");
                $printer -> text("-----------------------------\n");
                foreach($orders as $order){
                  
                    $printer -> text($order->quantity . "x    ". $order->products->name ."\n");
                    $total_price += $order->quantity * $order->products->price;
                }
                $printer -> text("-----------------------------\n");
                $printer -> text("Total Price  : ".$total_price . "\n");
                $printer -> text("Thank You\n");



                 $printer->cut();
                $printer -> close();

            }
            $printQueue->delete();

        }
        return $total_price;
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
        $printQueue =new printQueue;
        $printQueue->table_id = $request->table_id;
        $printQueue->save();
        return redirect()->back()->withSuccess('Memo Printing');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\printQueue  $printQueue
     * @return \Illuminate\Http\Response
     */
    public function show(printQueue $printQueue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\printQueue  $printQueue
     * @return \Illuminate\Http\Response
     */
    public function edit(printQueue $printQueue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\printQueue  $printQueue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, printQueue $printQueue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\printQueue  $printQueue
     * @return \Illuminate\Http\Response
     */
    public function destroy(printQueue $printQueue)
    {
        //
    }
}
