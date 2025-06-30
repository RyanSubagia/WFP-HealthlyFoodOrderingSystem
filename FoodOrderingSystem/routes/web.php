<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Auth routes
Auth::routes();

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Public routes (accessible without authentication)
Route::resource('menu', FoodController::class);

// Public home page (accessible to everyone)
Route::get('/', function () {
    return view('customer.home'); // or whatever your public home page is
})->name('home');

Route::get('/about', function () {
    return view('customer.about'); // or whatever your public home page is
})->name('about');

// Customer routes
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/', function () {
        return view('customer.home');
    })->name('home');

    Route::get('/menu', function () {
        return view('customer.menu');
    })->name('menu');

    Route::post('/cart', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/transactions', [CartController::class, 'history'])->name('customer.cart.history');



    // Add other customer-specific routes here
    // Route::get('/profile', [CustomerController::class, 'profile'])->name('profile');
});

// Admin routes
Route::middleware(['auth', 'role:admin,employee'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Category routes
    Route::post("/showHighestFoods", [CategoryController::class, 'showHighestFoods'])->name("category.showHighestFoods");
    Route::post("/showListFoods", [CategoryController::class, 'showListFoods'])->name("category.showListFoods");

    // Product routes
    Route::get('/products/product', [FoodController::class, "DetailProduct"])->name('product_admin');
    Route::get('/products/product/create', [FoodController::class, 'create'])->name('product.create');
    Route::post('/products/product/store', [FoodController::class, 'store'])->name('product.store');
    Route::post('/products/product/update', [FoodController::class, 'update'])->name('product.update');
    Route::post('/products/product/destroy', [FoodController::class, 'destroy'])->name('product.destroy');

    // AJAX product routes
    Route::post('/ajax/product/getCreateForm', [FoodController::class, 'getCreateForm'])->name('product.getCreateForm');
    Route::post('/ajax/product/getEditForm', [FoodController::class, 'getEditForm'])->name('product.getEditForm');
    Route::post('/ajax/product/saveDataUpdate', [FoodController::class, 'saveDataUpdate'])->name('product.saveDataUpdate');

    // Category routes
    Route::get('/categories/category', [CategoryController::class, "DetailCategory"])->name('category_admin');
    Route::get('/categories/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/categories/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/categories/category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

    // AJAX category routes
    Route::post('/ajax/category/getEditForm', [CategoryController::class, 'getEditForm'])->name('category.getEditForm');
    Route::post('/ajax/category/saveDataUpdate', [CategoryController::class, 'saveDataUpdate'])->name('category.saveDataUpdate');

    // Order, Employee and Customer management
    Route::get('/orders', [TransactionController::class, "DetailOrder"])->name('order_admin');
    Route::get('/customers', [UserController::class, "DetailCustomer"])->name('customer_admin');
    Route::get('/employees', [UserController::class, "DetailEmployee"])->name('employee_admin');
    Route::post('/employee/employee/store', [UserController::class, 'store'])->name('addEmployee.store');
    // Resource routes for admin
    Route::resource('users', UserController::class);
    Route::resource('transactions', TransactionController::class);
});

Route::get('/password/reset', function () {
    return view('auth.passwords.reset');
})->name('passwords.reset');

Route::post('/password/update', 'App\Http\Controllers\Auth\ResetPasswordController@updatePassword')->name('password.update');

// Dashboard route - redirect based on user role after login
Route::get('/dashboard', function () {
    if (auth()->check()) {
        $userRoles = auth()->user()->role;
        
        if (in_array($userRoles, ['admin', 'employee'])) {
            return redirect()->route('admin.dashboard');
        } elseif ($userRoles === 'customer') {
            return redirect()->route('customer.home');
        }
    }

    return redirect()->route('login');
})->name('dashboard');
