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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/profile', 'welcome');

Route::get('user/{uname?}', function($uname){
    return 'User ber-id = '.$uname;
});

Route::get('user/{uname?}/{gender}', function($uname,$gender){
    return 'Halo, '.$uname."(".$gender.")";
});

// BASE_URL/welcome 🡪 beri text “Selamat Datang”
// BASE_URL/before_order 🡪 beri text “Pilih DINE-IN atau Take Away”
// Gunakan Parameter. Setelah menu gunakan parameter untuk memenuhi method pemesanan dine-in atau take-away.
// BASE_URL/menu/dinein 🡪 beri text “Daftar menu Dine-in”
// BASE_URL/menu/takeaway 🡪 beri text “Daftar menu Take-away”
// Untuk bagian Administrasi
// BASE_URL/admin/categories/ 🡪 beri text “Portal Manajemen: Daftar Kategori”
// BASE_URL/admin/order 🡪 beri text “Portal Manajemen: Daftar Order”
// BASE_URL/admin/members/ 🡪 beri text “Portal Manajemen: Daftar Member”

Route::get('welcome', function () {
    return 'Selamat Datang';
});

Route::get('before_order', function () {
    return view('before_order');
});

Route::get('menu/{order}', function ($order) {
    if($order == 'dinein'){
        return 'Daftar menu Dine-In';
    }
    else if($order == 'takeaway'){
        return 'Daftar menu Take-Away';
    }
})->name('menu');

Route::get('/admin/categories', function () {
    return 'Portal Manajemen: Daftar Kategori';
});

Route::get('/admin/order', function () {
    return 'Portal Manajemen: Daftar Order';
});

Route::get('/admin/members', function () {
    return 'Portal Manajemen: Daftar Member';
});

Route::resource('daftarfoto',PhotoController::class);
Route::resource('listmakanan',FoodController::class);
Route::resource('listkategori',CategoryController::class);
Route::resource('listcustomer',CustomerController::class);
Route::resource('listtransaksi',TransactionController::class);