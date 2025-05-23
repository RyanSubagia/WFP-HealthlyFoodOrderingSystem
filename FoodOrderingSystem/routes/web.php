<?php
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
Route::resource('listcustomer',UserController::class);
Route::resource('listtransaksi',TransactionController::class);
Route::post("/admin/showHighestFoods",[CategoryController::class, 'showHighestFoods'])->name("category.showHighestFoods");
Route::post("/admin/showListFoods",[CategoryController::class, 'showListFoods'])->name("category.showListFoods");


//Admin
Route::get('/admin', function() {
    return view('admin.home');
})->name('admin');

Route::get('/admin/dashboard', function() {
    return view('admin.dashboard');
})->name('dashboard_admin');

Route::get('/admin/product', [FoodController::class,"DetailProduct"])->name('product_admin');


Route::get('/admin/categories/category',[CategoryController::class,"DetailCategory"])->name('category_admin');
Route::get('/admin/categories/category/create', [CategoryController::class, 'create'])->name('listkategori.create');
Route::post('/admin/categories/category/store', [CategoryController::class, 'store'])->name('listkategori.store');
Route::post('/admin/categories/category/update', [CategoryController::class, 'update'])->name('listkategori.update');
Route::post('/ajax/category/getEditForm',[CategoryController::class,'getEditForm'])->name('kategori.getEditForm');
Route::post('/ajax/category/saveDataUpdate',[CategoryController::class,'saveDataUpdate'])->name('kategori.saveDataUpdate');


Route::get('/admin/order', [TransactionController::class,"DetailOrder"])->name('order_admin');


Route::get('/admin/customer', [UserController::class,"DetailCustomer"])->name('customer_admin');
