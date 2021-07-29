<?php

use App\Http\Controllers\TableController;
use App\Http\Controllers\testController;
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

    Route::get('gotable/{table_id}',[TableController::class, 'findTheTable']);


});
