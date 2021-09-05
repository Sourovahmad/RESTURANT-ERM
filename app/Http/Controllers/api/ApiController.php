<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\printQueue;
use App\Models\setting;
use App\Models\table;
use App\Models\tableHasMenu;
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
                    $chinese_name = '/' . $value->products->chinese_name;
                }
                $name= $value->products->name . $chinese_name;
                array_push($temp, array("product_name" =>$name ,
                 "quantity" =>  $value->quantity,

                 ));
                $table = $value->table->name;
                // $value->printed = true;
                // $value->save();
            }
            $apiOrders[$table] = $temp;
        }

        return $apiOrders;


        } else{
            return "no data";
        }

    }


    public function memoPrint()
    {
        $printQueues = printQueue::all()->groupBy('table_id');

        $apiMemo = array();

        if (!$printQueues->isEmpty()) {

        foreach ($printQueues as $printQueue) {


            $orders = tableHasOrder::where('table_id', $printQueue[0]->table_id)->get();


            if(!$orders->isEmpty()){
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

                        $order->delete();
                    }

                    array_push($allOrders, array(
                        "products" => $allProducts,
                        "Total Price" =>  $total_price,

                    ));

                    $table = $orders[0]->table->name;
                    $apiMemo[$table] = $allOrders;




                    $table = table::find($printQueue[0]->table_id);

                    $adminOrder = new order;
                    $adminOrder->table_name = $table->name;
                    $adminOrder->total_amount = $total_price;
                    $adminOrder->save();

                    $tableOrderLimit = tableOrderLimit::where('table_id', $table->id)->first();
                    $tableOrderLimit->delete();


                    $tablehasround = tableHasRound::where('table_id', $table->id)->first();
                    $tablehasround->delete();


                    $allMenu = tableHasMenu::where('table_id', $table->id)->get();
                    foreach ($allMenu as $menu) {
                        $menu->delete();
                    }


            }




                $printQueue[0]->delete();


        }

        return $apiMemo;

        }else{
                return "no data";
            }

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
