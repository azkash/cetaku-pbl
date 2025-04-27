<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\BahanController;

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

Route::get('/items', [ItemController::class, 'index']);
Route::apiResource('items', ItemController::class);

Route::apiResource('customs', CustomController::class);

Route::apiResource('ukuran', UkuranController::class)->except(['update']);
Route::apiResource('jenis', JenisController::class)->except(['update']);
Route::apiResource('bahan', BahanController::class)->except(['update']);

