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
            ['name' => 'Smartphone Android', 'price' => 2500000, 'stock' => 10, 'category_id' => 1],
            ['name' => 'Laptop Gaming', 'price' => 15000000, 'stock' => 5, 'category_id' => 1],
            ['name' => 'Wireless Earbuds', 'price' => 500000, 'stock' => 20, 'category_id' => 1],
            ['name' => 'T-Shirt Cotton', 'price' => 150000, 'stock' => 50, 'category_id' => 2],
            ['name' => 'Jeans Premium', 'price' => 400000, 'stock' => 30, 'category_id' => 2],
            ['name' => 'Sneakers Sport', 'price' => 800000, 'stock' => 15, 'category_id' => 2],
            ['name' => 'Kopi Arabica 250g', 'price' => 75000, 'stock' => 100, 'category_id' => 3],
            ['name' => 'Teh Hijau Organik', 'price' => 45000, 'stock' => 80, 'category_id' => 3],
            ['name' => 'Snack Sehat Mix', 'price' => 25000, 'stock' => 200, 'category_id' => 3],
            ['name' => 'Novel Bestseller', 'price' => 85000, 'stock' => 25, 'category_id' => 4],
            ['name' => 'Buku Motivasi', 'price' => 120000, 'stock' => 35, 'category_id' => 4],
            ['name' => 'Tanaman Hias Kecil', 'price' => 35000, 'stock' => 60, 'category_id' => 5],
            ['name' => 'Vas Bunga Keramik', 'price' => 180000, 'stock' => 12, 'category_id' => 5],
            ['name' => 'Skincare Set', 'price' => 250000, 'stock' => 25, 'category_id' => 6],
            ['name' => 'Shampo Herbal', 'price' => 65000, 'stock' => 40, 'category_id' => 6],
            ['name' => 'Yoga Mat Premium', 'price' => 300000, 'stock' => 18, 'category_id' => 7],
            ['name' => 'Dumbbell 5kg', 'price' => 150000, 'stock' => 22, 'category_id' => 7],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
