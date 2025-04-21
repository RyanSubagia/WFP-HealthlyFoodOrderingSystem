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
//     return view('home', [
//         "title" => "Home",
//     ]);
// });

// Route::get('/menu', function () {
//     return view('menu', [
//         "title" => "Menu",
//     ]);
// });
Route::get('/', function() {
    return view('home');
})->name('home');

Route::get('/admin', function() {
    return view('admin.index');
})->name('admin');


Route::get('/about', function() {
    return view('about');
})->name('about');

// // BASE_URL/welcome 🡪 beri text “Selamat Datang”
// // BASE_URL/before_order 🡪 beri text “Pilih DINE-IN atau Take Away”
// // Gunakan Parameter. Setelah menu gunakan parameter untuk memenuhi method pemesanan dine-in atau take-away.
// // BASE_URL/menu/dinein 🡪 beri text “Daftar menu Dine-in”
// // BASE_URL/menu/takeaway 🡪 beri text “Daftar menu Take-away”
// // Untuk bagian Administrasi
// // BASE_URL/admin/categories/ 🡪 beri text “Portal Manajemen: Daftar Kategori”
// // BASE_URL/admin/order 🡪 beri text “Portal Manajemen: Daftar Order”
// // BASE_URL/admin/members/ 🡪 beri text “Portal Manajemen: Daftar Member”


Route::resource('daftarfoto',PhotoController::class);
Route::resource('menu',FoodController::class);
Route::resource('listkategori',CategoryController::class);
Route::resource('listcustomer',UserController::class);
Route::resource('listtransaksi',TransactionController::class);
Route::post("/category/showHighestFoods",[CategoryController::class, 'showHighestFoods'])->name("category.showHighestFoods");


Route::get('/admin/dashboard', function() {
    return view('admin.dashboard.index');
})->name('dashboardAdmin');
Route::get('/admin/dashboard', function() {
    return view('admin.loyalty.index');
})->name('loyaltyAdmin');
Route::get('/admin/dashboard', function() {
    return view('admin.order.index');
})->name('orderAdmin');
Route::get('/admin/dashboard', function() {
    return view('admin.pruducts.index');
})->name('pruductsAdmin');