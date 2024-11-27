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
                'name' => 'Nasi Tim Ayam',
                'price' => 'Rp',
                'image' => 'menu1.jpg', // Tambahkan gambar di folder public
            ],
            [
                'name' => 'Mie Ayam',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Mie Kangkung Ayam',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
        ];

        return view('homepage', compact('menus'));
    }
}
