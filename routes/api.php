<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('v1/product/list', [App\Http\Controllers\Api\ProductController::class, 'index']);
Route::post('v1/product/store', [App\Http\Controllers\Api\ProductController::class, 'store']);
Route::get('v1/product/delete/{id}', [App\Http\Controllers\Api\ProductController::class, 'delete']);
Route::post ('v1/product/update/{id}', [App\Http\Controllers\Api\ProductController::class, 'update']);
