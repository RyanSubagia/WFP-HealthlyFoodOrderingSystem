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


    return view('transaction.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
    public function DetailOrder(Transaction $transaction)
    {
    // sama: terbaru → terlama
    $order = Transaction::orderByDesc('tgl_Pemesanan')->paginate(10);


    return view('admin.order', ['transaction' => $order]);
    }

        // Tambahkan di bawah method index()
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
}
