<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\printers;
use App\Models\printQueue;
use App\Models\setting;
use App\Models\table;
use App\Models\tableHasOrder;
use App\Models\tableHasProduct;
use App\Models\tableHasRound;
use App\Models\tableOrderLimit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use TableHasCategoryAssigned;

use function PHPUnit\Framework\isEmpty;

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
                $Settingprinter = printers::find($settings->bill_printer_id);

                if(!is_null($Settingprinter)){

                    $connector = new WindowsPrintConnector($Settingprinter->name);
                    $printer = new Printer($connector);


                    $printer -> text($settings->website_name."\n");
                    $printer -> text($settings->address."\n");
                    $printer -> text($settings->email."\n");
                    $printer -> text($settings->phone."\n");
                    $printer -> text("-----------------------------\n");


                    $total_price = 0;

                    foreach($orders as $order){

                        $printer -> text($order->quantity . "x    ". $order->products->name ."\n");
                        $total_price += $order->quantity * $order->products->price;
                        $order->delete();
                    }

                    $table = table::find($orders[0]->table_id);



                    $adminOrder = new order;
                    $adminOrder->table_name = $table->name;
                    $adminOrder->total_amount = $total_price;
                    $adminOrder->save();

                    $tableOrderLimit = tableOrderLimit::where('table_id',$table->id)->first();
                    $tableOrderLimit->delete();


                    $tablehasround = tableHasRound::where('table_id', $table->id)->first();
                    $tablehasround->delete();


                    $tablehascategoryAssined = DB::table('table_has_category_assigned')
                    ->where('table_id',$table->id)->delete();

                    // delete table order limit




                    $printer -> text("-----------------------------\n");
                    $printer -> text("Total Price  : ".$total_price . "\n");
                    $printer -> text("Thank You\n");



                    $printer->cut();
                    $printer -> close();


                    $printQueue->delete();
                }else{
                    return 'Printer Not Found.Please check the Printer Setting';
                }


            }

            $printQueue->delete();





        }
        return "nothing to print";
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
        $tableHasproducts = tableHasProduct::where('table_id', $request->table_id)->get();
        if (!$tableHasproducts->isEmpty()) {
            foreach ($tableHasproducts as $tableHasproduct) {
                $tableHasproduct->delete();
            }
            $tableOrderLimit = tableOrderLimit::where('table_id', $request->table_id)->first();
            $tableOrderLimit->delete();

            $tablehasround = tableHasRound::where('table_id', $request->table_id)->first();
            $tablehasround->delete();

            $tablehascategoryAssined = DB::table('table_has_category_assigned')
            ->where('table_id', $request->table_id)->delete();
        }



        $orderQueeCheck = printQueue::where('table_id', $request->table_id)->get();
        if (isEmpty($orderQueeCheck)) {
            $printQueue = new printQueue;
            $printQueue->table_id = $request->table_id;
            $printQueue->save();
        }

        $table = table::find($request->table_id);
        $table->active_status = 2;
        $table->end_time = null;
        $table->save();
        return redirect()->back()->withSuccess('Memo Printing,let The Memo Come,Then Active Again');
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
