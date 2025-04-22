<?php

// use App\Http\Controllers\CustomerController;
// use App\Http\Controllers\FoodController;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\PhotoController;
// use App\Http\Controllers\TransactionController;
// use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

//Customer
Route::get('/', function() {
    return view('customer.home');
})->name('home');


Route::get('/about', function() {
    return view('customer.about');
})->name('about');

Route::resource('menu',FoodController::class);
Route::resource('listkategori',CategoryController::class);
Route::resource('listcustomer',UserController::class);
Route::resource('listtransaksi',TransactionController::class);
Route::post("/category/showHighestFoods",[CategoryController::class, 'showHighestFoods'])->name("category.showHighestFoods");


//Admin
Route::get('/admin', function() {
    return view('admin.home');
})->name('admin');

Route::get('/admin/dashboard', function() {
    return view('admin.dashboard');
})->name('dashboard_admin');

Route::get('/admin/product', [FoodController::class,"DetailProduct"])->name('product_admin');


Route::get('/admin/order', [TransactionController::class,"DetailOrder"])->name('order_admin');


Route::get('/admin/customer', [UserController::class,"DetailCustomer"])->name('customer_admin');
