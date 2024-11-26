<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
       public function index()
    {
        // Data menu
        $menus = [
            [
                'name' => 'Nasi Tim',
                'price' => 'Rp',
                'image' => 'menu1.jpg', // Tambahkan gambar di folder public
            ],
            [
                'name' => 'Bakmi Ayam',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
        ];

        return view('homepage', compact('menus'));
    }
}
