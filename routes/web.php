<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
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




Route::get('/', [MemberController::class, 'index'])->name('home');

Route::get('login', [MemberController::class, 'showLoginForm'])->name('login');
Route::post('login', [MemberController::class, 'login']);
Route::get('logout', [MemberController::class, 'logout'])->name('logout');
Route::get('register', [MemberController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [MemberController::class, 'register']);
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendPasswordEmail'])->name('password.email');

Route::middleware('authCheck')->group(function () {
    Route::middleware('isAdmin')->group(function () {
        Route::get('admin-home', [AdminController::class, 'index'])->name('admin-home');
        Route::resource('articles', ArticleController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('accounts', AccountController::class);
    });
    Route::middleware('isMember')->group(function () {
        Route::get('chitiet/{id}', [MemberController::class, 'find'])->name('chitiet');
        Route::get('cat/{id}', [MemberController::class, 'tinTrongLoai']);
        Route::get('search', [MemberController::class, 'search'])->name('search');
    });
});
