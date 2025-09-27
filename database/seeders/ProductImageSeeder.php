<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Tas Rajut Warna-Warni',
                'image_url' => 'https://images.unsplash.com/photo-1594736797933-d0201ba2fe65?w=400&h=400&fit=crop&auto=format',
                'filename' => 'tas-rajut-1.jpg'
            ],
            [
                'id' => 2,
                'name' => 'Sweater Rajut Hangat',
                'image_url' => 'https://images.unsplash.com/photo-1571945153237-4929e783af4a?w=400&h=400&fit=crop&auto=format',
                'filename' => 'sweater-rajut-1.jpg'
            ],
            [
                'id' => 3,
                'name' => 'Syal Rajut Lembut',
                'image_url' => 'https://images.unsplash.com/photo-1447958374760-8053861d5ec7?w=400&h=400&fit=crop&auto=format',
                'filename' => 'syal-rajut-1.jpg'
            ],
            [
                'id' => 4,
                'name' => 'Topi Rajut Lucu',
                'image_url' => 'https://images.unsplash.com/photo-1521369909029-2afed882baee?w=400&h=400&fit=crop&auto=format',
                'filename' => 'topi-rajut-1.jpg'
            ],
            [
                'id' => 5,
                'name' => 'Sarung Tangan Rajut',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=400&fit=crop&auto=format',
                'filename' => 'sarung-tangan-rajut-1.jpg'
            ],
            [
                'id' => 6,
                'name' => 'Cardigan Rajut Elegan',
                'image_url' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=400&h=400&fit=crop&auto=format',
                'filename' => 'cardigan-rajut-1.jpg'
            ],
            [
                'id' => 7,
                'name' => 'Kaus Kaki Rajut',
                'image_url' => 'https://images.unsplash.com/photo-1544966503-7cc5ac882d5d?w=400&h=400&fit=crop&auto=format',
                'filename' => 'kaus-kaki-rajut-1.jpg'
            ],
            [
                'id' => 8,
                'name' => 'Poncho Rajut Bohemian',
                'image_url' => 'https://images.unsplash.com/photo-1518684079-3c830dcef090?w=400&h=400&fit=crop&auto=format',
                'filename' => 'poncho-rajut-1.jpg'
            ]
        ];

        foreach ($products as $productData) {
            try {
                // Download image from URL
                $response = \Illuminate\Support\Facades\Http::timeout(30)->get($productData['image_url']);
                
                if ($response->successful()) {
                    // Save image to storage
                    $imagePath = 'products/' . $productData['filename'];
                    \Illuminate\Support\Facades\Storage::disk('public')->put($imagePath, $response->body());
                    
                    // Update product with image path and name
                    \App\Models\Product::where('id', $productData['id'])->update([
                        'name' => $productData['name'],
                        'image' => $imagePath
                    ]);
                    
                    $this->command->info("Downloaded and saved: {$productData['name']}");
                } else {
                    $this->command->error("Failed to download image for: {$productData['name']}");
                }
            } catch (\Exception $e) {
                $this->command->error("Error processing {$productData['name']}: " . $e->getMessage());
            }
        }
    }
}
