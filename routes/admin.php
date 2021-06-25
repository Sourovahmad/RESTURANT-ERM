<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DailyQuoteController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\SuperAdminController;
use App\Models\option;
use App\Models\question as ModelsQuestion;
use App\Models\questionAnswer;
use Illuminate\Support\Facades\Route;

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
//
Route::middleware(['auth:sanctum'])->group(function(){

Route::get('/', function () {
    return view('admin.index');
})->name('dashboard');

});



