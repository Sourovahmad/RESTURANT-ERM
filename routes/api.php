<?php

use App\Http\Controllers\api\ApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('print-kitchen-orders', [ApiController::class, 'kitchenOrders']);
Route::get('memo-print' , [ApiController::class, 'memoPrint']);
Route::get('website-details' , [ApiController::class,'WebDetails']);
