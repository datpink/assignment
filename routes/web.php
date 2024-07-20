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

Route::get('/',[TinController::class,'index'])->name('home');
Route::get('chitiet/{id}',[TinController::class,'find'])->name('chitiet');
Route::get('cat/{id}', [TinController::class,'tinTrongLoai']);
Route::get('/search', [TinController::class, 'search'])->name('search');
