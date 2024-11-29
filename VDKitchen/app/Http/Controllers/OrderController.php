<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $totalPrice = array_sum(array_column($cart, 'subtotal'));

        return view('orderpage', [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function placeOrder(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'order_type' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        // Ambil data cart dari session
        $cart = $request->session()->get('cart', []);

        // Jika cart kosong, kembalikan dengan error
        if (empty($cart)) {
            return redirect()->route('checkout')->withErrors(['cart' => 'Cart is empty!']);
        }

        // Setelah validasi, buat pesanan
        $order = Order::create([
            'user_id' => auth()->check() ? auth()->id() : null,
            'guest_id' => auth()->check() ? null : session()->getId(),
            'order_type' => $validated['order_type'],
            'total_price' => $validated['total_price'],
        ]);

        // Simpan item ke tabel order_items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        // Bersihkan cart
        $request->session()->forget('cart');

        // Redirect ke halaman sukses
        return redirect()->route('home')->with('success', 'Order placed successfully.');
    }
}
