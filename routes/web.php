<?php

use App\Http\Controllers\Admin\AdminDashBoardController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Auth\DashBoardController;
use App\Http\Controllers\Auth\LoginController;
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


Route::get('/', function () {
    return view('home');
});
Route::get('/login', [LoginController::class, 'index']);

Route::post('/login-check', [LoginController::class, 'login'])->name('user.login');
Route::middleware(['web'])->group(function () {
    Route::get('/dashboard', [DashBoardController::class, 'dashBoard'])->name('user.dashboard');
    Route::post('/logout', [LoginController::class, 'logout']);
});

//Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'index']);
    Route::post('/login-check', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AdminDashBoardController::class, 'index']);
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});
