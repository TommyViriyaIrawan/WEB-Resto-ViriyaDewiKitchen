<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
       public function index()
    {
        // Data menu
        $foods = [
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
                'name' => 'Mie Ayam Yamin',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Mie Kangkung Ayam',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Bihun Ayam',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Bihun Ayam Yamin',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Bihun Kangkung Ayam',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Kwetiau Ayam',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Kwetiau Ayam Yamin',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Kwetiau Kangkung Ayam',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Locupan Ayam',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Baso Ikan/Sapi (isi 5)',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Pangsit Ayam Rebus',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
        ];

        $drinks = [
            [
                'name' => 'Teh Tawar',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Es Teh Tawar',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Teh Manis',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Es Teh Manis',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Kopi',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Teh Pucuk',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Aqua Botol',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Liang Teh',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Minuman Badak',
                'price' => 'Rp',
                'image' => 'menu2.jpg',
            ],
        ];

        return view('homepage', compact('foods', 'drinks'));
    }
}
