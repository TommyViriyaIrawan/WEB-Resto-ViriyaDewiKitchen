<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Pastikan Auth diimpor
use Illuminate\Http\Request; // Pastikan Request diimpor
use App\Models\Order; // Pastikan model Order diimpor
use App\Models\OrderItem; // Pastikan model OrderItem diimpor

class OrderController extends Controller
{
    // Fungsi untuk checkout
    public function checkout(Request $request)
    {
        // Cek apakah user login atau tidak
        $userId = auth()->check() ? auth()->id() : null;
        $guestId = auth()->check() ? null : $request->session()->getId();

        // Ambil cart dari session
        $cart = $request->session()->get('cart', []);

        // Hitung total harga dari session
        $totalPrice = array_sum(array_column($cart, 'subtotal'));

        // Jika tidak ada item di session, ambil dari database
        if (empty($cart)) {
            $order = Order::with('items') // Eager load relasi 'items'
                ->when($userId, function ($query) use ($userId) {
                    return $query->where('user_id', $userId);
                })
                ->when($guestId, function ($query) use ($guestId) {
                    return $query->where('guest_id', $guestId);
                })
                ->latest()
                ->first();

            // Jika ada order sebelumnya, ambil detailnya
            if ($order) {
                $cart = $order->items->map(function ($item) {
                    return [
                        'name' => $item->item_name,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                        'subtotal' => $item->subtotal,
                    ];
                })->toArray();

                $totalPrice = $order->total_price;
            }
        }

        // Return ke view orderpage dengan data cart dan total price
        return view('orderpage', [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
        ]);
    }

    // Fungsi untuk place order
    public function placeOrder(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'order_type' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        // Ambil data cart dari session
        $cart = $request->session()->get('cart', []);

        // Jika cart kosong, redirect dengan error
        if (empty($cart)) {
            return redirect()->route('checkout')->withErrors(['cart' => 'Cart is empty!']);
        }

        // Setelah validasi, buat pesanan
        $order = Order::create([
            'user_id' => auth()->check() ? auth()->id() : null,
            'guest_id' => auth()->check() ? null : $request->session()->getId(),
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

        // Bersihkan cart dari session
        $request->session()->forget('cart');

        // Redirect ke halaman sukses
        return redirect()->route('homepage')->with('success', 'Order placed successfully.');
    }
}
