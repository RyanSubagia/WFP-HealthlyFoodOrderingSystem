<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController; // Tambahkan ini
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('admin.dashboard');
})->name('admin')->middleware('auth');

Route::get('/admin/products/product', [FoodController::class,"DetailProduct"])->name('product_admin');
Route::get('/admin/products/product/create', [FoodController::class, 'create'])->name('listmakanan.create');
Route::post('/admin/products/product/store', [FoodController::class, 'store'])->name('listmakanan.store');
Route::post('/admin/products/product/update', [FoodController::class, 'update'])->name('listmakanan.update');
Route::post('/admin/products/product/destroy',  [FoodController::class, 'destroy'])->name('listmakanan.destroy');
Route::post('/ajax/product/getCreateForm',[FoodController::class,'getCreateForm'])->name('produk.getCreateForm');
Route::post('/ajax/product/getEditForm',[FoodController::class,'getEditForm'])->name('produk.getEditForm');
Route::post('/ajax/product/saveDataUpdate',[FoodController::class,'saveDataUpdate'])->name('produk.saveDataUpdate');

Route::get('/admin/categories/category',[CategoryController::class,"DetailCategory"])->name('category_admin');
Route::get('/admin/categories/category/create', [CategoryController::class, 'create'])->name('listkategori.create');
Route::post('/admin/categories/category/store', [CategoryController::class, 'store'])->name('listkategori.store');
Route::post('/admin/categories/category/update', [CategoryController::class, 'update'])->name('listkategori.update');
Route::post('/admin/categories/category/destroy',  [CategoryController::class, 'destroy'])->name('listkategori.destroy');
Route::post('/ajax/category/getEditForm',[CategoryController::class,'getEditForm'])->name('kategori.getEditForm');
Route::post('/ajax/category/saveDataUpdate',[CategoryController::class,'saveDataUpdate'])->name('kategori.saveDataUpdate');

Route::get('/admin/order', [TransactionController::class,"DetailOrder"])->name('order_admin');
Route::get('/admin/customer', [UserController::class,"DetailCustomer"])->name('customer_admin');
Route::get('/admin/employee', [UserController::class,"DetailEmployee"])->name('employee_admin');
Route::post('/admin/employee/employee/store', [UserController::class, 'store'])->name('addEmployee.store');



// Auth routes
Auth::routes();

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Home route (hapus yang duplikat)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');