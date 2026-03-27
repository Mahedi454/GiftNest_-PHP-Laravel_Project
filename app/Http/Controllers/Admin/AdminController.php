<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $products = Product::query()->latest()->get();

        return view('pages.admin.index', [
            'stats' => [
                'products' => $products->count(),
                'activeProducts' => $products->where('is_active', true)->count(),
                'lowStockProducts' => $products->where('stock', '<=', 5)->count(),
                'users' => User::query()->count(),
            ],
            'latestProducts' => $products->take(5),
        ]);
    }
}

