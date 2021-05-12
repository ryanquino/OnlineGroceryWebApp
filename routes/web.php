<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/edit/{id}', [ProductController::class, 'editProduct'])->name('edit');
Route::post('/update/{id}', [ProductController::class, 'updateProduct'])->name('update');
Route::post('/delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete');
Route::resource('products', ProductController::class);
