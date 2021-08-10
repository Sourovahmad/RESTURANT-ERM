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

            $tableOrderLimit = tableOrderLimit::where('table_id', $requestedTable->id)->first();
            $products = product::where('active_status', 1)->get();
            $categories = category::all();

            return $categories;
            return view('products.index',compact('requestedTable','products','categories', 'tableOrderLimit'));

        } else{

         return view('errors.tableNotActive',compact('requestedTable'));

        }


    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'table_id' => 'required',
            'customer_quantity' => 'required',
            'category_id' => 'required',
        ]);

        $table = table::find($request->table_id);
        $table->active_status = 1;
        $table->save();


        $tableOrderLimit = new tableOrderLimit;
        $tableOrderLimit->table_id = $table->id;
        $tableOrderLimit->total_customer = $request->customer_quantity;
        $tableOrderLimit->order_limit = $request->customer_quantity * 5;
        $tableOrderLimit->total_orderd = 0;

        $tableOrderLimit->save();


    return back()->withSuccess('table active and order limit set up success');

    }


    public function tableclose(Request $request)
    {
        $table = table::find($request->table_id);
        $table->active_status = 2;
        $table->save();


        $tableOrderLimit = tableOrderLimit::where('table_id',$request->table_id)->first();

        // here will be the printing functions

        $tableOrderLimit->delete();

        return back()->withErrors('Table Has been Deactivated SuccessFull');
    }


}
