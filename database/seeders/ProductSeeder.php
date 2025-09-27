<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Electronics - Rajutan Tools & Machines
            ['name' => 'Mesin Rajut Elektronik Brother', 'price' => 8500000, 'stock' => 3, 'category_id' => 1],
            ['name' => 'Counter Stitch Digital', 'price' => 250000, 'stock' => 15, 'category_id' => 1],
            ['name' => 'Lampu LED Portable untuk Merajut', 'price' => 350000, 'stock' => 25, 'category_id' => 1],
            
            // Fashion - Produk Rajutan Jadi
            ['name' => 'Sweater Rajut Wool Premium', 'price' => 450000, 'stock' => 20, 'category_id' => 2],
            ['name' => 'Cardigan Rajut Vintage', 'price' => 380000, 'stock' => 15, 'category_id' => 2],
            ['name' => 'Syal Rajut Cashmere', 'price' => 275000, 'stock' => 30, 'category_id' => 2],
            ['name' => 'Topi Beanie Rajut', 'price' => 85000, 'stock' => 50, 'category_id' => 2],
            ['name' => 'Kaos Kaki Rajut Wool', 'price' => 65000, 'stock' => 40, 'category_id' => 2],
            
            // Food & Beverages - Snack untuk Merajut
            ['name' => 'Teh Hangat Earl Grey 100g', 'price' => 55000, 'stock' => 80, 'category_id' => 3],
            ['name' => 'Kopi Premium untuk Crafting', 'price' => 85000, 'stock' => 60, 'category_id' => 3],
            ['name' => 'Snack Mix Energy Boost', 'price' => 35000, 'stock' => 100, 'category_id' => 3],
            
            // Books - Buku Panduan Rajutan
            ['name' => 'Panduan Lengkap Merajut untuk Pemula', 'price' => 120000, 'stock' => 25, 'category_id' => 4],
            ['name' => 'Pola Rajutan Modern & Trendy', 'price' => 150000, 'stock' => 20, 'category_id' => 4],
            ['name' => 'Teknik Advanced Crochet & Knitting', 'price' => 180000, 'stock' => 15, 'category_id' => 4],
            
            // Home & Garden - Dekorasi Rajutan
            ['name' => 'Sarung Bantal Rajut Bohemian', 'price' => 95000, 'stock' => 35, 'category_id' => 5],
            ['name' => 'Pot Cover Rajut untuk Tanaman', 'price' => 45000, 'stock' => 50, 'category_id' => 5],
            ['name' => 'Table Runner Rajut Lace', 'price' => 125000, 'stock' => 20, 'category_id' => 5],
            ['name' => 'Keranjang Penyimpanan Rajut', 'price' => 165000, 'stock' => 25, 'category_id' => 5],
            
            // Health & Beauty - Perawatan Tangan
            ['name' => 'Hand Cream untuk Perajut 75ml', 'price' => 85000, 'stock' => 40, 'category_id' => 6],
            ['name' => 'Finger Guard Protector Set', 'price' => 25000, 'stock' => 60, 'category_id' => 6],
            ['name' => 'Essential Oil Lavender Relaxing', 'price' => 95000, 'stock' => 30, 'category_id' => 6],
            
            // Sports & Outdoor - Tas & Aksesoris Rajut
            ['name' => 'Tas Rajut Outdoor Waterproof', 'price' => 320000, 'stock' => 12, 'category_id' => 7],
            ['name' => 'Yoga Mat Bag Rajut', 'price' => 180000, 'stock' => 18, 'category_id' => 7],
            ['name' => 'Sarung Tangan Rajut Anti-slip', 'price' => 75000, 'stock' => 35, 'category_id' => 7],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
