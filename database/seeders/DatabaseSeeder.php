<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@giftnest.com'],
            [
                'name' => 'GiftNest Admin',
                'password' => 'password',
                'role' => 'admin',
            ],
        );

        User::firstOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'GiftNest Customer',
                'password' => 'password',
                'role' => 'user',
            ],
        );

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
