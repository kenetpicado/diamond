<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AlertController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('requests', RequestController::class);

    Route::get('alerts', [AlertController::class, 'index'])->name('alerts.index');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('earnings', [EarningController::class, 'index'])->name('earnings.index');

        Route::resource('users', UserController::class)->except(['show']);
    });
});

Auth::routes();
