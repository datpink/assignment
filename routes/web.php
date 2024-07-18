<?php

use App\Http\Controllers\TinController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('tk', function () {
    return view('timkiem');
});
Route::get('/', function () {
    return view('tin-trong-loai');
});
Route::get('index',[TinController::class,'index'])->name('home');
Route::get('chitiet/{id}',[TinController::class,'find']);

