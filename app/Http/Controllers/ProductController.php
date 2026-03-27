<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function home(): View
    {
        $products = Product::query()
            ->with('category')
            ->where('is_active', true)
            ->latest('id')
            ->get();

        return view('pages.home', [
            'heroProducts' => $products->take(3),
            'featuredProducts' => $products->skip(3)->take(4),
            'categoryCount' => Category::query()->count(),
        ]);
    }

    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));
        $category = trim((string) $request->query('category', ''));
        $maxPrice = (int) $request->query('max_price', 0);

        $categories = Category::query()
            ->orderBy('name')
            ->pluck('name')
            ->all();

        $products = Product::query()
            ->with('category')
            ->where('is_active', true)
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($innerQuery) use ($search) {
                    $innerQuery
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhereHas('category', fn ($categoryQuery) => $categoryQuery->where('name', 'like', "%{$search}%"));
                });
            })
            ->when($category !== '', function ($query) use ($category) {
                $query->whereHas('category', fn ($categoryQuery) => $categoryQuery->where('name', $category));
            })
            ->when($maxPrice > 0, function ($query) use ($maxPrice) {
                $query->where('price', '<=', $maxPrice);
            })
            ->latest('id')
            ->paginate(12)
            ->withQueryString();

        $recommendedProducts = Product::query()
            ->with('category')
            ->where('is_active', true)
            ->when($category !== '', function ($query) use ($category) {
                $query->whereHas('category', fn ($categoryQuery) => $categoryQuery->where('name', $category));
            })
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('pages.shop', [
            'products' => $products,
            'categories' => $categories,
            'filters' => [
                'search' => $search,
                'category' => $category,
                'max_price' => $maxPrice,
            ],
            'recommendedProducts' => $recommendedProducts,
        ]);
    }

    public function show(Product $product): View
    {
        $product->load('category');

        return view('pages.product', [
            'product' => $product,
            'relatedProducts' => Product::query()
                ->with('category')
                ->where('is_active', true)
                ->where('category_id', $product->category_id)
                ->whereKeyNot($product->id)
                ->latest('id')
                ->take(4)
                ->get(),
        ]);
    }
}
