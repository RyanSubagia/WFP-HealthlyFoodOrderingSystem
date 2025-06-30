<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Cart;
use App\Models\Payments;
use App\Models\Transaction;
use App\Models\TransactionItem;


class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'food_id' => 'required|exists:foods,id',
            'size' => 'required|in:S,M,L',
            'note' => 'nullable|string|max:255',
        ]);

        Cart::create([
            'food_id' => $request->food_id,
            'size' => $request->size,
            'note' => $request->note,
            'quantity' => 1,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Item berhasil ditambahkan ke keranjang!');
    }
    public function index()
    {
        $carts = Cart::with('food')
            ->where('user_id', auth()->id())
            ->get();

        $paymentMethods = Payments::all();

        return view('customer.cart', compact('carts', 'paymentMethods'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'type' => 'required|in:Dine-In,Take-Away',
            'table_number' => 'nullable|string|max:10',
            'payments_id' => 'required|exists:payments,id'
        ]);

        $user = auth()->user();
        $carts = Cart::with('food')->where('user_id', $user->id)->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Keranjang kamu kosong!');
        }

        $grandTotal = $carts->sum(function ($item) {
            return $item->food->price * $item->quantity;
        });
        $transaction = Transaction::create([
            'users_id' => $user->id,
            'payments_id' => $request->payments_id,
            'metode_Pemesanan' => $request->type,
            'no_meja' => $request->type === 'Dine-In' ? $request->table_number : '-',
            'total' => $grandTotal,
            'tgl_Pemesanan' => now(),
            'status' => 'pending',
        ]);


        foreach ($carts as $cart) {
            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'food_id' => $cart->food_id,
                'size' => $cart->size,
                'note' => $cart->note,
                'quantity' => $cart->quantity,
                'price' => $cart->food->price,
            ]);
        }

        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('customer.cart.index')->with('success', 'Pesanan berhasil dibuat!');
    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        $foods = Cart::find($id);
        $foods->delete();

        return response()->json(array(
            "status" => "oke",
            "msg" => "Delete success!"
        ), 200);
    }
    public function history()
    {
        return view('customer.transaction');
    }
    public function historyJson()
    {
        $transactions = Transaction::where('users_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($trx) {
                return [
                    'tgl_Pemesanan' => Carbon::parse($trx->tgl_Pemesanan)->format('d M Y H:i'),
                    'total' => number_format($trx->total, 0, ',', '.'),
                    'metode_Pemesanan' => $trx->metode_Pemesanan,
                    'no_meja' => $trx->no_meja,
                    'status' => ucfirst($trx->status),
                    'badge' => match ($trx->status) {
                        'pending' => 'warning',
                        'processing' => 'primary',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'secondary',
                    },
                ];
            });

        return response()->json($transactions);
    }
}
