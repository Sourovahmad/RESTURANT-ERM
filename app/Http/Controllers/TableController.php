<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\menu;
use App\Models\order;
use App\Models\printQueue;
use App\Models\product;
use App\Models\serviceProduct;
use App\Models\table;
use App\Models\tableHasMenu;
use App\Models\tableHasOrder;
use App\Models\tableHasProduct;
use App\Models\tableHasRound;
use App\Models\tableHasService;
use App\Models\tableOrderLimit;
use Carbon\Carbon;
use Database\Seeders\TableHasOrderSeeder;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

use function PHPUnit\Framework\isEmpty;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = table::orderby('id','desc')->get();
        return view('admin.table.index',compact('tables',));
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
            'name'=> 'required'
        ]);


        $table = new table;
        $table->name = $request->name;
        $table->description = $request->description;

        $table->active_status = 2;


        $b = date('i');

        $latestInSertedData = table::latest('id')->first();

        if(!is_null($latestInSertedData)){
         $latestId = $latestInSertedData->id + 1;
        }else{
            $latestId = 1;
        }

        $final = $latestId . $b;

        $table-> table_url = route('dashboard'). '/' . 'gotable/'.$final;


        $table->save();
         return back()->withSuccess('Table Has been Save with Url And QrCode');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $tableForPrint = table::find($id);
        $quantity = $request->quantity;
        $size = $request->size;
        return view('admin.table.qrcode',compact('tableForPrint','quantity','size'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Table $table)
    {
        $table->name = $request->name;
        if(!is_null($request->description)){
            $table->description = $request->description;
        }

        $requestTableUrl = route('dashboard') . '/' . 'gotable' . '/' . $request->table_url;
        if ($table->table_url != $requestTableUrl){

        $tableUrl = table::where('table_url', $requestTableUrl)->get();

        if($tableUrl->count() == 0){
            $table->table_url = $requestTableUrl;
        }else{
            $table->save();
            return back()->withErrors('table url already used. try with a diffrent url');
        }
        }
        $table->save();
        return back()->withSuccess('table updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(table $table)
    {
        if($table->active_status != 1){
            $table->delete();
            return back()->withErrors("table deleted");
        } else{
            return back()->withErrors("Can't Delete Table while its Active");
        }
    }

    public function findTheTable($table_id)
    {
        $myid = route('dashboard'). '/'.'gotable'.'/' . $table_id;

        try{
            $requestedTable = table::where('table_url',$myid)->firstOrFail();
        } catch(\Exception $exception){
            return view('errors.tableNotFound',compact('myid'));
        }

        if($requestedTable->active_status == 1){

            $tableOrderLimit = tableOrderLimit::where('table_id', $requestedTable->id)->first();
            $tablehasround = tableHasRound::where('table_id', $requestedTable->id)->first();
            $current_round = $tablehasround->current_round;
            $products = product::where('active_status', 1)->get();
            $services = serviceProduct::all();
            $categories = category::all();


            return view('products.index',compact('requestedTable','products','categories', 'tableOrderLimit', 'current_round', 'services'));

        } else{

         return view('errors.tableNotActive',compact('requestedTable'));

        }


        // deleted category assing part

        // $tableAssignedCategories = DB::table('table_has_category_assigned')
        // ->where('table_id', $requestedTable->id)->get();

        // $Filterdcategories = [];
        // $allcategories = category::all();

        // if ($tableAssignedCategories[0]->category_id != 156000) {
        //     for ($i = 0; $i < count($tableAssignedCategories); $i++) {

        //         $currentCategoryId = $tableAssignedCategories[$i]->category_id;
        //         $resultCategory =  $allcategories->where('id', $currentCategoryId)->first();
        //         array_push($Filterdcategories, $resultCategory);
        //         $categories = $Filterdcategories;
        //     }
        // } else {
        //     array_push($Filterdcategories, $allcategories);
        //     $categories = $Filterdcategories[0];
        // }



    }

    public function updateStatus(Request $request)
    {


        $request->validate([
            'table_id' => 'required',
        ]);

        $data =  $request->except('_token');

        $totalMenu = 0;
        foreach($data as $key => $value){
            if($key != 'table_id'){
                if(!is_null($value)){
                    if($value != 0 || $value != 00){
                        $totalMenu += $value;
                        $tableHasMenu = new tableHasMenu;
                        $tableHasMenu->table_id = $request->table_id;
                        $tableHasMenu->menu_id = $key;
                        $tableHasMenu->quantity = $value;
                        $tableHasMenu->save();
                    }

                }
            }
        }


        $table = table::find($request->table_id);
        $table->active_status = 1;
        $table->end_time = Carbon::now()->addMinutes(150);
        $table->save();


        $tableOrderLimit = new tableOrderLimit;
        $tableOrderLimit->table_id = $table->id;
        $tableOrderLimit->total_customer = $totalMenu;
        $tableOrderLimit->order_limit = $totalMenu * 5;
        $tableOrderLimit->total_orderd = 0;

        $tableOrderLimit->save();


        $tableRound = new tableHasRound;
        $tableRound -> table_id = $table->id;
        $tableRound -> current_round = 1;
        $tableRound->save();




        return back()->withSuccess('table active and order limit set up success');




    //  $allRequestCategories =  $request->category_id;

    //     if($allRequestCategories[0] != 156000){

    //         for ($i=0; $i < count($allRequestCategories) ; $i++) {

    //             DB::table('table_has_category_assigned')->insert([
    //                 'table_id' => $table->id,
    //                 'category_id' => $allRequestCategories[$i],
    //             ]);
    //         }
    //     } else{
    //         DB::table('table_has_category_assigned')->insert([
    //             'table_id' => $table->id,
    //             'category_id' => '156000',
    //         ]);
    //     }




    }


    public function tableclose(Request $request)
    {
        
 
        $orders = tableHasOrder::where('table_id',$request->table_id)->orderBy('round','asc')->get();
        $totalPrice = 0;

        for ($i = 0; $i < $orders->count(); $i++) {

            $multiplyQuantity = $orders[$i]->quantity * $orders[$i]->products->price;
            $totalPrice +=  $multiplyQuantity;
        }

        $menus = tableHasMenu::where('table_id',$request->table_id)->get();

        foreach($menus as $menu){
                $multiplyMenuQuantity = $menu->quantity * $menu->menu->price;
                $totalPrice +=  $multiplyMenuQuantity;
        }


        $table = table::find($request->table_id);


        $orders = new order;
        $orders->table_name = $table->name;
        $orders->total_amount = $totalPrice;
        $orders->save();


        //this function is for if someone add to cart but did't orderd.
        $tableHasproducts = tableHasProduct::where('table_id',$request->table_id)->get();

        if(!$tableHasproducts->isEmpty()){
            foreach ($tableHasproducts as $tableHasproduct) {
               $tableHasproduct->delete();
            }
        }

        $allMenu = tableHasMenu::where('table_id', $request->table_id)->get();
        foreach ($allMenu as $menu) {
            $menu->delete();
        }

        $allOrders = tableHasOrder::where('table_id', $request->table_id)->get();
        foreach ($allOrders as $orderr) {
            $orderr->delete();
        }

        $tablehasround = tableHasRound::where('table_id',$request->table_id)->first();
        $tablehasround->delete();


        $allServices = tableHasService::where('table_id', $request->table_id)->get();
        foreach ($allServices as $allService) {
            $allService->delete();
        }


        $tableOrderLimit = tableOrderLimit::where('table_id',$request->table_id)->first();
        $tableOrderLimit->delete();

     

        $orderQueeCheck = printQueue::where('table_id', $request->table_id)->get();
        if ($orderQueeCheck->isEmpty()) {
            $printQueue = new printQueue;
            $printQueue->table_id = $request->table_id;
            $printQueue->save();
        }

        
        $table->active_status = 2;
        $table->end_time = null;
        if (!is_null($table->order_limit_time)) {
            $table->order_limit_time = null;
        }
        $table->save();



        return back()->withSuccess('Table Has been Deactivated SuccessFull, Collect The Memo');
    }


    public function tableEdit(Request $request){

        $table = table::find($request->table_id);
        $tableOrderLimit = tableOrderLimit::where('table_id',$request->table_id)->first();
        $tableOrderLimit->total_customer =$request->total_customer ;
        if(!is_null($request->extra_hour)){
            $table->end_time = Carbon::parse( $table->end_time)->addHours($request->extra_hour);
        }
        if(!is_null($request->extra_miniute)){
            $table->end_time = Carbon::parse( $table->end_time)->addMinutes($request->extra_miniute);
        }
        $table->save();
        $tableOrderLimit->save();
        return back()->withSuccess('Table data added successfully');

    }

    public function tableBill(Request $request)
    {

        $requestedTable = table::find($request->table_id);

        if($requestedTable->active_status == 1){

        $orders = tableHasOrder::where('table_id',$request->table_id)->orderBy('round','asc')->get();
        $tableOrderLimit = tableOrderLimit::where('table_id',$request->table_id)->first();
        $services = serviceProduct::all();
        $totalPrice = 0;

        for ($i = 0; $i < $orders->count(); $i++) {

            $multiplyQuantity = $orders[$i]->quantity * $orders[$i]->products->price;
            $totalPrice +=  $multiplyQuantity;
        }

        $menus = tableHasMenu::where('table_id',$request->table_id)->get();

        foreach($menus as $menu){
                $multiplyMenuQuantity = $menu->quantity * $menu->menu->price;
                $totalPrice +=  $multiplyMenuQuantity;
        }




        return view('pages.bill.index',compact('orders', 'totalPrice', 'requestedTable', 'tableOrderLimit', 'services', 'menus'));
        } else{
            return view('errors.tableNotActive');
        }
    }


    public function OrderTimeLimitupdate(Request $request)
    {
        $table = table::find($request->table_id);
        $table->order_limit_time = null;
        $table->save();
    }

        public function OrderTimeLimitupdateTwo(Request $request)
    {
        $table = table::find($request->table_id);
        $table->order_limit_time = null;
        $table->save();
        return back()->withSuccess('Time limit Stoped');
    }


}
