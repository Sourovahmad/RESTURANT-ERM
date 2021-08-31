<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\printQueue;
use App\Models\setting;
use App\Models\table;
use App\Models\tableHasOrder;
use App\Models\tableHasRound;
use App\Models\tableOrderLimit;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function kitchenOrders()
    {
        $orders = tableHasOrder::where('printed', false)->get()->groupBy('table_id');

        if (!$orders->isEmpty()) {
        $apiOrders = array();
        foreach ($orders as $key=> $order) {
            $temp= array();
            $table='';
            foreach ($order as $value) {

                $chinese_name = '';
                if (!is_null($value->products->chinese_name)) {
                    $chinese_name = '(' . $value->products->chinese_name . ')';
                }
                $name= $value->products->name . $chinese_name;
                array_push($temp, array("product_name" =>$name ,
                 "quantity" =>  $value->quantity,

                 ));
                $table = $value->table->name;
            }
            $apiOrders[$table] = $temp;
        }

        return $apiOrders;


        } else{
            return "no data";
        }

    }




    public function kitchenOrdersSuccess()
    {
        $orders = tableHasOrder::where('printed', false)->orderBy('table_id')->get();
        foreach ($orders as $order) {
            $order->printed = true;
            $order->save();
        }
        return "success";
    }


    public function memoPrint()
    {
        $printQueues = printQueue::all()->groupBy('table_id');

        $apiMemo = array();

        foreach ($printQueues as $printQueue) {


            $orders = tableHasOrder::where('table_id', $printQueue[0]->table_id)->get();

            if (!$orders->isEmpty()) {

                $total_price = 0;
                $allOrders = array();
                $table = '';
                $allProducts = array();
                foreach ($orders as $order) {

                    $products = $order->quantity . "x    " . $order->products->name;
                    $total_price += $order->quantity * $order->products->price;

                    array_push($allProducts, array(
                        "products" => $products,

                    ));
                }

                array_push($allOrders, array(
                    "products" => $allProducts,
                    "Total Price" =>  $total_price,

                ));

                $table = $order->table->name;
                $apiMemo[$table] = $allOrders;




            }else{
                return "no data";
            }

        }

        return $apiMemo;


    }


    public function memoSuccess()
    {
        $printQueues = printQueue::all();
        foreach ($printQueues as $printQueue) {


            $orders = tableHasOrder::where('table_id', $printQueue->table_id)->get();



            $total_price = 0;

            foreach ($orders as $order) {
                $total_price += $order->quantity * $order->products->price;
                $order->delete();
            }


            $table = table::find($printQueue->table_id);



            $adminOrder = new order;
            $adminOrder->table_name = $table->name;
            $adminOrder->total_amount = $total_price;
            $adminOrder->save();

            $tableOrderLimit = tableOrderLimit::where('table_id', $table->id)->first();
            $tableOrderLimit->delete();


            $tablehasround = tableHasRound::where('table_id', $table->id)->first();
            $tablehasround->delete();


            $tablehascategoryAssined = DB::table('table_has_category_assigned')
            ->where('table_id', $table->id)->delete();



            $printQueue->delete();


        }

        return "success";
    }


    public function WebDetails()
    {
        $setting = setting::find(1);
        $details = array();

        array_push($details, array(
            "website_name" => $setting->website_name,
            "phone" =>  $setting->phone,
            "email" =>  $setting->email,
            "address" =>  $setting->address,
        ));

        return $details;

    }
}
