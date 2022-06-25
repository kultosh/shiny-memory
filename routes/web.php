<?php

use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\OperatorController;
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
    // Level
    Route::get('/level', [LevelController::class, 'index'])->name('level.index');
    Route::get('/add-level', [LevelController::class, 'create'])->name('level.create');
    Route::post('/level', [LevelController::class, 'store'])->name('level.store');
    Route::get('/level/{id}/edit', [LevelController::class, 'edit'])->name('level.edit');
    Route::put('/level/{id}', [LevelController::class, 'update'])->name('level.update');
    Route::delete('/level/{id}', [LevelController::class, 'destroy'])->name('level.destroy');

    // Operator
    Route::get('/operator', [OperatorController::class, 'index'])->name('operator.index');
    Route::get('/add-operator', [OperatorController::class, 'create'])->name('operator.create');
    Route::post('/operator', [OperatorController::class, 'store'])->name('operator.store');
    Route::get('/operator/{id}/edit', [OperatorController::class, 'edit'])->name('operator.edit');
    Route::put('/operator/{id}', [OperatorController::class, 'update'])->name('operator.update');
    Route::delete('/operator/{id}', [OperatorController::class, 'destroy'])->name('operator.destroy');

    // Answer
    Route::get('/answer', [AnswerController::class, 'index'])->name('answer.index');
    Route::get('/add-answer', [AnswerController::class, 'create'])->name('answer.create');
    Route::post('/answer', [AnswerController::class, 'store'])->name('answer.store');
    Route::get('/answer/{id}/edit', [AnswerController::class, 'edit'])->name('answer.edit');
    Route::put('/answer/{id}', [AnswerController::class, 'update'])->name('answer.update');
    Route::delete('/answer/{id}', [AnswerController::class, 'destroy'])->name('answer.destroy');

    // LogOut
    Route::get('/logout', [AuthController::class, 'logOut'])->name('logout');
});

Route::get('/{any}', function () {
    return view('layouts.app');
})->where('any', '.*');
