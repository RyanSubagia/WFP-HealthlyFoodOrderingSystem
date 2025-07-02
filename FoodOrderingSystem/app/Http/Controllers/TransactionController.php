<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Eloquent
    // tampilkan 10 data terbaru lebih dulu
    $transaction = Transaction::orderByDesc('tgl_Pemesanan')->paginate(10);
    }

    public function DetailOrder(Transaction $transaction)
    {
    // sama: terbaru → terlama
    $order = Transaction::orderByDesc('tgl_Pemesanan')->paginate(10);


    return view('admin.order', ['transaction' => $order]);
    }

    public function details(Transaction $transaction)
    {
        // Ambil semua item untuk transaksi ini
        $items = $transaction->items()->with('food')->get();

        return view('admin.order_detail', compact('transaction', 'items'));
    }

    public function updateStatus(Request $request, Transaction $transaction)
    {
        $request->validate([
            'status' => 'required|in:' . implode(',', Transaction::STATUSES),
        ]);

        $current = $transaction->status;
        $next    = Transaction::NEXT_STATUS[$current] ?? null;

        // Pastikan status baru adalah satu‑satunya transisi sah
        if ($next !== $request->status) {
            return back()->withErrors('Perubahan status tidak sah.');
        }

        $transaction->update(['status' => $request->status]);

        return $request->ajax()
            ? response()->json(['success' => true])
            : back()->with('success', 'Status updated');
    }
    public function status()
    {
    $transaction = Transaction::where('status', '!=','completed')->orderBy('tgl_Pemesanan')->paginate(10);

    return view('admin.status', ['transaction' => $transaction]);
    }
}
