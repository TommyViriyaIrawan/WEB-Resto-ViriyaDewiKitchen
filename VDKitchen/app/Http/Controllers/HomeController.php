<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; // Pastikan model Menu sudah dibuat

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data makanan (food)
        $foods = Menu::where('category', 'food')->get();

        // Ambil data minuman (drink)
        $drinks = Menu::where('category', 'drink')->get();

        // Kirim data ke view
        return view('homepage', compact('foods', 'drinks'));
    }

    public function addToCart(Request $request)
    {
        $menu = Menu::find($request->id);

        $cart = session()->get('cart', []);

        if (isset($cart[$menu->id])) {
            $cart[$menu->id]['quantity']++;
        } else {
            $cart[$menu->id] = [
                'name' => $menu->name,
                'price' => $menu->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => 'Item added to cart']);
    }

    public function getCart()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->reduce(fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);

        return response()->json([
            'cart' => $cart,
            'total' => $total,
        ]);
    }
}
