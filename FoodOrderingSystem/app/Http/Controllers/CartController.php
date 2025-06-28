<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
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

        return view('customer.cart', compact('carts'));
    }
    public function checkout(Request $request)
    {
        $request->validate([
            'type' => 'required|in:Dine In,Take Away',
            'table_number' => 'nullable|string|max:10'
        ]);

        $user = auth()->user();
        $carts = Cart::with('food')->where('user_id', $user->id)->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Keranjang kamu kosong!');
        }

        // Buat transaksi
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'status' => 'Menunggu Diproses',
            'type' => $request->type,
            'table_number' => $request->type === 'Dine In' ? $request->table_number : null
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
            "status" =>"oke",
            "msg"=>"Delete success!"
        ),200);
    }
}
