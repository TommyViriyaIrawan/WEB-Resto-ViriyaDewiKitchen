<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            // Foods
            ['name' => 'Nasi Tim Ayam', 'price' => 24000, 'image' => 'nasitimayam1.jpg', 'category' => 'food'],
            ['name' => 'Mie Ayam', 'price' => 19000, 'image' => 'menu2.jpg', 'category' => 'food'],
            ['name' => 'Mie Ayam Yamin', 'price' => 20000, 'image' => 'menu2.jpg', 'category' => 'food'],
            ['name' => 'Mie Kangkung Ayam', 'price' => 24000, 'image' => 'miekangkungayam.jpg', 'category' => 'food'],
            ['name' => 'Bihun Ayam', 'price' => 19000, 'image' => 'menu2.jpg', 'category' => 'food'],
            ['name' => 'Bihun Ayam Yamin', 'price' => 20000, 'image' => 'menu2.jpg', 'category' => 'food'],
            ['name' => 'Bihun Kangkung Ayam', 'price' => 24000, 'image' => 'bihunkangkungayam.jpg', 'category' => 'food'],
            ['name' => 'Kwetiau Ayam', 'price' => 19000, 'image' => 'kweitauayam.jpg', 'category' => 'food'],
            ['name' => 'Kwetiau Ayam Yamin', 'price' => 20000, 'image' => 'menu2.jpg', 'category' => 'food'],
            ['name' => 'Kwetiau Kangkung Ayam', 'price' => 24000, 'image' => 'menu2.jpg', 'category' => 'food'],
            ['name' => 'Locupan Ayam', 'price' => 22000, 'image' => 'locupanayam.jpg', 'category' => 'food'],
            ['name' => 'Baso Ikan/Sapi (isi 5)', 'price' => 16000, 'image' => 'basoikansapi.jpg', 'category' => 'food'],
            ['name' => 'Pangsit Ayam Rebus', 'price' => 16000, 'image' => 'menu2.jpg', 'category' => 'food'],
            ['name' => 'Siomay', 'price' => 6000, 'image' => 'siomay.jpg', 'category' => 'food'],
            ['name' => 'Baso Goreng', 'price' => 7500, 'image' => 'basogoreng.jpg', 'category' => 'food'],
            ['name' => 'Kerupuk Putih', 'price' => 2000, 'image' => 'kerupukputih.jpg', 'category' => 'food'],

            // Drinks
            ['name' => 'Teh Tawar', 'price' => 1000, 'image' => 'menu2.jpg', 'category' => 'drink'],
            ['name' => 'Es Teh Tawar', 'price' => 2000, 'image' => 'menu2.jpg', 'category' => 'drink'],
            ['name' => 'Teh Manis', 'price' => 2000, 'image' => 'menu2.jpg', 'category' => 'drink'],
            ['name' => 'Es Teh Manis', 'price' => 3000, 'image' => 'menu2.jpg', 'category' => 'drink'],
            ['name' => 'Kopi', 'price' => 5000, 'image' => 'menu2.jpg', 'category' => 'drink'],
            ['name' => 'Teh Pucuk', 'price' => 5000, 'image' => 'menu2.jpg', 'category' => 'drink'],
            ['name' => 'Aqua Botol', 'price' => 5000, 'image' => 'menu2.jpg', 'category' => 'drink'],
            ['name' => 'Liang Teh', 'price' => 12000, 'image' => 'menu2.jpg', 'category' => 'drink'],
            ['name' => 'Minuman Badak', 'price' => 15000, 'image' => 'minumanbadak.jpg', 'category' => 'drink'],
        ];

        // Insert data ke dalam tabel menus
        DB::table('menus')->insert($menus);
    }
}

