<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Blush Rose Bouquet', 'category' => 'Flowers', 'price' => 1490, 'image' => '1.jpg', 'description' => 'A soft pink rose bouquet wrapped for elegant gifting and romantic surprises.', 'stock' => 18, 'is_active' => true],
            ['name' => 'Infinity Spark Ring', 'category' => 'Jewelry', 'price' => 1890, 'image' => '2.jpg', 'description' => 'A slim gold-toned infinity ring with stone detailing for timeless everyday style.', 'stock' => 14, 'is_active' => true],
            ['name' => 'Scarlet Romance Bouquet', 'category' => 'Flowers', 'price' => 1990, 'image' => '3.jpg', 'description' => 'Deep red roses arranged in a premium wrap for anniversaries and heartfelt occasions.', 'stock' => 11, 'is_active' => true],
            ['name' => 'Pure Almond Chocolate Bar', 'category' => 'Chocolates', 'price' => 420, 'image' => '4.jpg', 'description' => 'A classic chocolate bar with almond and walnut notes for quick gifting.', 'stock' => 30, 'is_active' => true],
            ['name' => 'Nugali Premium Trio', 'category' => 'Chocolates', 'price' => 890, 'image' => '5.jpg', 'description' => 'A refined set of premium chocolate bars for elegant gift hampers.', 'stock' => 22, 'is_active' => true],
            ['name' => 'Crystal Bloom Stud', 'category' => 'Jewelry', 'price' => 1290, 'image' => '6.jpg', 'description' => 'A floral crystal stud earring with a bright, celebratory finish.', 'stock' => 17, 'is_active' => true],
            ['name' => 'Snowflake Crystal Stud', 'category' => 'Jewelry', 'price' => 1290, 'image' => '7.jpg', 'description' => 'A sparkling snowflake-style stud designed for a delicate gift set.', 'stock' => 19, 'is_active' => true],
            ['name' => 'Braided Gold Bracelet', 'category' => 'Jewelry', 'price' => 1750, 'image' => '8.jpg', 'description' => 'A polished bracelet with braided links that works for everyday wear and gifting.', 'stock' => 12, 'is_active' => true],
            ['name' => 'Link Charm Bracelet', 'category' => 'Jewelry', 'price' => 2090, 'image' => '9.jpg', 'description' => 'A modern chain bracelet with a central crystal link detail.', 'stock' => 10, 'is_active' => true],
            ['name' => 'Infinity Knot Ring', 'category' => 'Jewelry', 'price' => 1690, 'image' => '10.jpg', 'description' => 'A sleek knot ring with a sculpted infinity shape for understated gifting.', 'stock' => 13, 'is_active' => true],
            ['name' => 'Velvet Dark Chocolate', 'category' => 'Chocolates', 'price' => 560, 'image' => '11.jpg', 'description' => 'A bold dark chocolate bar with gift-ready premium packaging.', 'stock' => 28, 'is_active' => true],
            ['name' => 'Love Surprise Explosion Box', 'category' => 'Gift Boxes', 'price' => 1350, 'image' => '12.jpg', 'description' => 'A handcrafted surprise box perfect for birthdays, proposals, and personal notes.', 'stock' => 16, 'is_active' => true],
            ['name' => 'Sweet Teddy Snack Basket', 'category' => 'Gift Hampers', 'price' => 2490, 'image' => '13.jpg', 'description' => 'A cheerful hamper filled with chocolates, snacks, and a soft teddy companion.', 'stock' => 9, 'is_active' => true],
            ['name' => 'Celebration Snack Hamper', 'category' => 'Gift Hampers', 'price' => 1890, 'image' => '14.jpg', 'description' => 'A colorful snack hamper packed for birthdays, office treats, and festive gifting.', 'stock' => 15, 'is_active' => true],
            ['name' => 'Pastel Garden Bouquet', 'category' => 'Flowers', 'price' => 1590, 'image' => '15.jpg', 'description' => 'A pastel flower arrangement with roses and fillers for soft, elegant gifting.', 'stock' => 12, 'is_active' => true],
            ['name' => 'Kinder Luxe Chocolate Bouquet', 'category' => 'Chocolate Bouquets', 'price' => 1790, 'image' => '16.jpg', 'description' => 'A wrapped bouquet of premium chocolates styled for impressive delivery.', 'stock' => 8, 'is_active' => true],
            ['name' => 'Golden Bloom Perfume', 'category' => 'Perfumes', 'price' => 2290, 'image' => '17.jpg', 'description' => 'A luminous perfume bottle suited for premium feminine gifting.', 'stock' => 11, 'is_active' => true],
            ['name' => 'Shalimar Signature Perfume', 'category' => 'Perfumes', 'price' => 2490, 'image' => '18.jpg', 'description' => 'A signature-style perfume with a refined bottle and occasion-ready presence.', 'stock' => 7, 'is_active' => true],
            ['name' => 'Verde Fresh Perfume', 'category' => 'Perfumes', 'price' => 1890, 'image' => '19.jpg', 'description' => 'A modern green fragrance bottle for clean, versatile gifting.', 'stock' => 14, 'is_active' => true],
            ['name' => 'Happy Birthday Mug', 'category' => 'Personalized Gifts', 'price' => 490, 'image' => '20.jpg', 'description' => 'A bright printed mug that makes an easy and affordable birthday gift.', 'stock' => 35, 'is_active' => true],
            ['name' => 'Pastel Spiral Notebook Set', 'category' => 'Stationery', 'price' => 380, 'image' => '21.jpg', 'description' => 'A vibrant set of spiral notebooks suited for students, journaling, and desk gifts.', 'stock' => 26, 'is_active' => true],
            ['name' => 'Classic Spiral Notebook Pack', 'category' => 'Stationery', 'price' => 640, 'image' => '22.jpg', 'description' => 'A practical multi-color notebook pack for study bundles and office gifting.', 'stock' => 20, 'is_active' => true],
        ];

        foreach ($products as $product) {
            $category = Category::where('name', $product['category'])->firstOrFail();

            Product::updateOrCreate(
                ['name' => $product['name']],
                [
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'description' => $product['description'],
                    'image' => $product['image'],
                    'category_id' => $category->id,
                    'stock' => $product['stock'],
                    'is_active' => $product['is_active'],
                ],
            );
        }
    }
}
