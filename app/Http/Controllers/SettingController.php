<?php

namespace App\Http\Controllers;

use App\Models\printers;
use App\Models\setting;
use Barryvdh\Debugbar\DataCollector\ViewCollector;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use function GuzzleHttp\Promise\settle;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = setting::find(1);
        $printers = printers::all();

        return view('admin.setting.index',compact('setting', 'printers'));
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
            'website_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'kitchen_printer_id' => 'required',
            'bill_printer_id' => 'required',
        ]);
        $setting = Setting::find(1);
        $setting->website_name = $request->website_name;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->address = $request->address;
        $setting->kitchen_printer_id = $request->kitchen_printer_id;
        $setting->bill_printer_id = $request->bill_printer_id;
        $setting->save();
        return back()->withSuccess('Updated SuccessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting $setting)
    {
        //
    }
}
