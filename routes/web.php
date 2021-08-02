<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TableHasProductController;
use Illuminate\Support\Facades\Route;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth:sanctum'])->group(function(){

    Route::get('/', function () {

        if(!is_null(auth()->user()->role_id)){
            if(auth()->user()->role_id == 3){
                return redirect(route('admin.employees.index'));
            }else{

                return redirect(route('admin.dashboard'));
            }
        }
        return redirect(route('login'));
    })->name('dashboard');



});


    Route::get('gotable/{table_id}',[TableController::class, 'findTheTable']);
    Route::post('addtocart',[TableHasProductController::class,'store'])->name('addtocart');


    Route::get('gorders/{table_id}',[OrderController::class, 'OrderedProducts'])->name('gorders');




    Route::get('products', function(){
        return view('products.index');
    });

    Route::get('bill', function(){
        return view('pages.bill.index');
    });

    Route::get('order', function(){
        return view('pages.order.index');
    });

    Route::get('service', function(){
        return view('pages.service.index');
    });
