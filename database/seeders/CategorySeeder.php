<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Birthday Gifts',
            'Flowers',
            'Jewelry',
            'Chocolates',
            'Gift Boxes',
            'Gift Hampers',
            'Chocolate Bouquets',
            'Perfumes',
            'Personalized Gifts',
            'Stationery',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
