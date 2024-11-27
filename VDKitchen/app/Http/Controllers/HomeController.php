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
                'price' => 'Rp24.000',
                'image' => 'menu1.jpg', // Tambahkan gambar di folder public
            ],
            [
                'name' => 'Mie Ayam',
                'price' => 'Rp19.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Mie Ayam Yamin',
                'price' => 'Rp20.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Mie Kangkung Ayam',
                'price' => 'Rp24.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Bihun Ayam',
                'price' => 'Rp19.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Bihun Ayam Yamin',
                'price' => 'Rp20.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Bihun Kangkung Ayam',
                'price' => 'Rp24.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Kwetiau Ayam',
                'price' => 'Rp19.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Kwetiau Ayam Yamin',
                'price' => 'Rp20.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Kwetiau Kangkung Ayam',
                'price' => 'Rp24.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Locupan Ayam',
                'price' => 'Rp22.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Baso Ikan/Sapi (isi 5)',
                'price' => 'Rp16.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Pangsit Ayam Rebus',
                'price' => 'Rp16.000',
                'image' => 'menu2.jpg',
            ],
        ];

        $drinks = [
            [
                'name' => 'Teh Tawar',
                'price' => 'Rp1.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Es Teh Tawar',
                'price' => 'Rp2.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Teh Manis',
                'price' => 'Rp2.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Es Teh Manis',
                'price' => 'Rp3.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Kopi',
                'price' => 'Rp5.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Teh Pucuk',
                'price' => 'Rp5.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Aqua Botol',
                'price' => 'Rp5.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Liang Teh',
                'price' => 'Rp12.000',
                'image' => 'menu2.jpg',
            ],
            [
                'name' => 'Minuman Badak',
                'price' => 'Rp15.000',
                'image' => 'menu2.jpg',
            ],
        ];

        return view('homepage', compact('foods', 'drinks'));
    }
}
