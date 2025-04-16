<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TransactionController;
use App\Models\Category;
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

Route::get('/', function() {
    return view('welcome');
})->name('home');
Route::resource('daftarfoto',PhotoController::class);
Route::resource('listmakanan',FoodController::class);
Route::resource('listkategori',CategoryController::class);
Route::resource('listcustomer',CustomerController::class);
Route::resource('listtransaksi',TransactionController::class);