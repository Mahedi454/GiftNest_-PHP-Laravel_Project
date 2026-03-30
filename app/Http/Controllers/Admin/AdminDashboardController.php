<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $totalRevenue = Order::query()
            ->where('status', 'completed')
            ->sum('total_price');

        return view('pages.admin.index', [
            'stats' => [
                'users' => User::query()->count(),
                'products' => Product::query()->count(),
                'orders' => Order::query()->count(),
                'revenue' => $totalRevenue,
            ],
        ]);
    }
}
