<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

<<<<<<< Updated upstream
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

// Auth routes
=======
// Auth routes (should be at the top)
>>>>>>> Stashed changes
Auth::routes();

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Public routes (accessible without authentication)
Route::resource('menu', FoodController::class);

// Public home page (accessible to everyone)
Route::get('/', function() {
    return view('home'); // or whatever your public home page is
})->name('home');

// Customer routes
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/home', function() {
        return view('customer.home');
    })->name('home');

    Route::get('/about', function() {
        return view('customer.about');
    })->name('about');
    
    // Add other customer-specific routes here
    // Route::get('/profile', [CustomerController::class, 'profile'])->name('profile');
});

// Admin routes
Route::middleware(['auth', 'role:admin,employee'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');

    // Category routes
    Route::post("/showHighestFoods", [CategoryController::class, 'showHighestFoods'])->name("category.showHighestFoods");
    Route::post("/showListFoods", [CategoryController::class, 'showListFoods'])->name("category.showListFoods");

    // Product routes
    Route::get('/products/product', [FoodController::class, "DetailProduct"])->name('product');
    Route::get('/products/product/create', [FoodController::class, 'create'])->name('product.create');
    Route::post('/products/product/store', [FoodController::class, 'store'])->name('product.store');
    Route::post('/products/product/update', [FoodController::class, 'update'])->name('product.update');
    Route::post('/products/product/destroy', [FoodController::class, 'destroy'])->name('product.destroy');
    
    // AJAX product routes
    Route::post('/ajax/product/getCreateForm', [FoodController::class, 'getCreateForm'])->name('product.getCreateForm');
    Route::post('/ajax/product/getEditForm', [FoodController::class, 'getEditForm'])->name('product.getEditForm');
    Route::post('/ajax/product/saveDataUpdate', [FoodController::class, 'saveDataUpdate'])->name('product.saveDataUpdate');

    // Category routes
    Route::get('/categories/category', [CategoryController::class, "DetailCategory"])->name('category');
    Route::get('/categories/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/categories/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/categories/category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    
    // AJAX category routes
    Route::post('/ajax/category/getEditForm', [CategoryController::class, 'getEditForm'])->name('category.getEditForm');
    Route::post('/ajax/category/saveDataUpdate', [CategoryController::class, 'saveDataUpdate'])->name('category.saveDataUpdate');

    // Order and Customer management
    Route::get('/orders', [TransactionController::class, "DetailOrder"])->name('orders');
    Route::get('/customers', [UserController::class, "DetailCustomer"])->name('customers');
    
    // Resource routes for admin
    Route::resource('users', UserController::class);
    Route::resource('transactions', TransactionController::class);
});

// Dashboard route - redirect based on user role after login
Route::get('/dashboard', function() {
    if (auth()->check()) {
        $userRole = auth()->user()->role;
        
        if (in_array($userRole, ['admin', 'employee'])) {
            return redirect()->route('admin.dashboard');
        } elseif ($userRole === 'customer') {
            return redirect()->route('customer.home');
        }
    }
    
    return redirect()->route('login');
})->name('dashboard');