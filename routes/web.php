<?php

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

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::post('/accounts', [\App\Http\Controllers\IndexController::class, 'storeAccounts'])->name('store-accounts');
Route::post('/deals', [\App\Http\Controllers\IndexController::class, 'storeDeals'])->name('store-deals');

Route::post('/get-deals', [\App\Http\Controllers\IndexController::class, 'getDeals']);
Route::post('/get-accounts', [\App\Http\Controllers\IndexController::class, 'getAccounts']);
