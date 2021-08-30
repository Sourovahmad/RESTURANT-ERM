<?php

use App\Http\Controllers\api\ApiController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->post('/user', function (Request $request) {
    return $request->user();
});


Route::get('print-kitchen-orders', [ApiController::class, 'kitchenOrders']);
Route::get('kitchen-print-success', [ApiController::class, 'kitchenOrdersSuccess']);



Route::get('memo-print' , [ApiController::class, 'memoPrint']);
Route::get('memo-print-success',[ApiController::class, 'memoSuccess']);
