<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'customer@example.com')->first();
        $products = Product::query()->take(3)->get();

        if (! $user || $products->count() < 2) {
            return;
        }

        $orders = [
            [
                'status' => 'pending',
                'items' => [
                    ['product' => $products[0], 'quantity' => 2],
                    ['product' => $products[1], 'quantity' => 1],
                ],
            ],
            [
                'status' => 'completed',
                'items' => [
                    ['product' => $products[2], 'quantity' => 1],
                ],
            ],
        ];

        foreach ($orders as $orderData) {
            $total = collect($orderData['items'])->sum(fn ($item) => $item['product']->price * $item['quantity']);

            $order = Order::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'status' => $orderData['status'],
                    'total_price' => $total,
                ],
                [
                    'total_price' => $total,
                ],
            );

            foreach ($orderData['items'] as $itemData) {
                OrderItem::updateOrCreate(
                    [
                        'order_id' => $order->id,
                        'product_id' => $itemData['product']->id,
                    ],
                    [
                        'quantity' => $itemData['quantity'],
                        'price' => $itemData['product']->price,
                    ],
                );
            }
        }
    }
}
