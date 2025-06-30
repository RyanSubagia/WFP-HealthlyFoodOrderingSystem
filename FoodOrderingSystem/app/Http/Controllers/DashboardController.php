<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Produk dengan jumlah terbanyak (berdasarkan kategori)
        $mostFood = DB::table('categories')
            ->join('foods', 'categories.id', '=', 'foods.category_id')
            ->select('categories.name', DB::raw('count(foods.id) as total'))
            ->groupBy('categories.name')
            ->orderByDesc('total')
            ->first();

        // Member teraktif berdasarkan jumlah transaksi
        $mostActiveMember = DB::table('transactions')
            ->select('users.name', DB::raw('count(*) as total'))
            ->join('users', 'users.id', '=', 'transactions.users_id')
            ->groupBy('users.name')
            ->orderByDesc('total')
            ->first();

        // Member dengan pembelian terbanyak
        $mostPurchasingMember = DB::table('transactions')
            ->select('users.name', DB::raw('sum(total) as total_spent'))
            ->join('users', 'users.id', '=', 'transactions.users_id')
            ->groupBy('users.name')
            ->orderByDesc('total_spent')
            ->first();

        // Total omzet
        $totalRevenue = DB::table('transactions')->sum('total');

        // Produk terlaris (berdasarkan jumlah penjualan dari transaction_items)
        $topProduct = DB::table('transaction_items')
            ->select('foods.name', DB::raw('sum(transaction_items.quantity) as total_sold'))
            ->join('foods', 'foods.id', '=', 'transaction_items.food_id')
            ->groupBy('foods.name')
            ->orderByDesc('total_sold')
            ->first();

        // Produk yang perlu diendorse (penjualan terendah)
        $endorseProduct = DB::table('transaction_items')
            ->select('foods.name', DB::raw('sum(transaction_items.quantity) as total_sold'))
            ->join('foods', 'foods.id', '=', 'transaction_items.food_id')
            ->groupBy('foods.name')
            ->orderBy('total_sold')
            ->first();

        return view('admin.dashboard', compact(
            'mostFood',
            'mostActiveMember',
            'mostPurchasingMember',
            'totalRevenue',
            'topProduct',
            'endorseProduct'
        ));
    }
}
