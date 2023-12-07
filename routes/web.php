<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('index');
Route::get('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\ProductController::class, 'store'])->name('store');
Route::get('/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('delete');
Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
Route::post ('/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('update');

