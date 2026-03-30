<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function home(): View
    {
        $products = Product::query()
            ->where('is_active', true)
            ->latest('id')
            ->get();

        return view('pages.home', [
            'heroProducts' => $products->take(3),
            'featuredProducts' => $products->skip(3)->take(4),
            'categoryCount' => Category::query()->count(),
        ]);
    }

    public function index(): View
    {
        return view('pages.shop', [
            'products' => Product::query()
                ->where('is_active', true)
                ->latest('id')
                ->paginate(12),
        ]);
    }

    public function show(Product $product): View
    {
        abort_unless($product->is_active, 404);

        return view('pages.product', [
            'product' => $product,
            'relatedProducts' => Product::query()
                ->where('is_active', true)
                ->whereKeyNot($product->id)
                ->latest('id')
                ->take(4)
                ->get(),
        ]);
    }
}
