<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use App\Models\table;
use App\Models\tableOrderLimit;
use Carbon\Carbon;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
        $table->active_status = $request->active_status;


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
         //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(table $table)
    {
        //
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

            $products = product::all();
            $categories = category::all();
            return view('products.index',compact('requestedTable','products','categories'));

        } else{

         return view('errors.tableNotActive',compact('requestedTable'));

        }


    }

    public function updateStatus(Request $request)
    {
     $table = table::find($request->id);
     $table->active_status = $request->value;
     $table->save();


    $tableOrderLimit = new tableOrderLimit;
    $tableOrderLimit->table_id = $table->id;
    $tableOrderLimit->total_customer = $request->customer_quantity;
    $tableOrderLimit->order_limit = $request->customer_quantity * 5;
    $tableOrderLimit->total_orderd = 0;

    $tableOrderLimit->save();

    return "table active and order limit set up success";

    }


}
