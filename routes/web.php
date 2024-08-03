<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PasswordController;
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




Route::get('/',[MemberController::class,'index'])->name('home');

Route::get('chitiet/{id}',[MemberController::class,'find'])->name('chitiet');
Route::get('cat/{id}', [MemberController::class,'tinTrongLoai']);
Route::get('search', [MemberController::class, 'search'])->name('search');


Route::get('register', [MemberController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [MemberController::class, 'register']);

Route::get('login', [MemberController::class, 'showLoginForm'])->name('login');
Route::post('login', [MemberController::class, 'login']);
Route::get('logout', [MemberController::class, 'logout'])->name('logout');


Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendPasswordEmail'])->name('password.email');


Route::get('admin-home',[AdminController::class,'index'])->name('admin-home');
