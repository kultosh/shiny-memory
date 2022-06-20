<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
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


Route::group(['prefix' => 'admin', 'middleware' => ['prevent-back-history','guest']], function () {
    Route::get('/',  [AuthController::class, 'index'])->name('login');
    Route::post('/',  [AuthController::class, 'logIn'])->name('admin.login');
});

Route::group(['prefix' => 'admin', 'middleware' => ['prevent-back-history','auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logOut'])->name('logout');
});

Route::get('/{any}', function () {
    return view('layouts.app');
})->where('any', '.*');
