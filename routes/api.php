<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientStockController;
use App\Http\Controllers\StockController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//stock..
Route::prefix('stock')->group(function () {
    Route::get('/index', [StockController::class, 'index']);
    Route::get('/show/{id}', [StockController::class, 'show']);
    Route::post('/store', [StockController::class, 'store']);
    Route::put('/update/{id}', [StockController::class, 'update']);
    Route::delete('/delete/{id}', [StockController::class, 'delete']);
});

//client ....
Route::prefix('client')->group(function () {
    Route::get('/index', [ClientController::class, 'index']);
    Route::post('/store', [ClientController::class, 'store']);
});

//
Route::prefix('client-stock')->group(function () {
    Route::get('/index', [ClientStockController::class, 'index']);
    Route::post('/store', [ClientStockController::class, 'store']);
});

