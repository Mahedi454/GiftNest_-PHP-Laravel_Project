<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function home(): View
    {
        $products = $this->products();

        return view('pages.home', [
            'heroProducts' => array_slice($products, 0, 3),
            'featuredProducts' => array_slice($products, 3, 4),
        ]);
    }

    public function index(Request $request): View
    {
        $allProducts = collect($this->products());
        $categories = $allProducts
            ->pluck('category')
            ->unique()
            ->values()
            ->all();

        $search = trim((string) $request->query('search', ''));
        $category = trim((string) $request->query('category', ''));
        $maxPrice = (int) $request->query('max_price', 0);

        $filteredProducts = $allProducts
            ->when($search !== '', function ($collection) use ($search) {
                $needle = mb_strtolower($search);

                return $collection->filter(function (array $product) use ($needle) {
                    return str_contains(mb_strtolower($product['name']), $needle)
                        || str_contains(mb_strtolower($product['category']), $needle)
                        || str_contains(mb_strtolower($product['description']), $needle);
                });
            })
            ->when($category !== '', function ($collection) use ($category) {
                return $collection->where('category', $category);
            })
            ->when($maxPrice > 0, function ($collection) use ($maxPrice) {
                return $collection->filter(fn (array $product) => $product['price'] <= $maxPrice);
            })
            ->values();

        $recommendedProducts = $allProducts
            ->when($category !== '', function ($collection) use ($category) {
                $categoryMatches = $collection->where('category', $category)->values();

                return $categoryMatches->isNotEmpty() ? $categoryMatches : $collection;
            })
            ->when($search !== '', function ($collection) use ($search) {
                $needle = mb_strtolower((string) strtok($search, ' '));
                $searchMatches = $collection->filter(function (array $product) use ($needle) {
                    return $needle !== ''
                        && (str_contains(mb_strtolower($product['name']), $needle)
                        || str_contains(mb_strtolower($product['description']), $needle));
                })->values();

                return $searchMatches->isNotEmpty() ? $searchMatches : $collection;
            })
            ->take(4)
            ->values()
            ->all();

        $perPage = 12;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $paginatedProducts = new LengthAwarePaginator(
            items: $filteredProducts->forPage($currentPage, $perPage)->values(),
            total: $filteredProducts->count(),
            perPage: $perPage,
            currentPage: $currentPage,
            options: [
                'path' => $request->url(),
                'query' => $request->query(),
            ],
        );

        return view('pages.shop', [
            'products' => $paginatedProducts,
            'categories' => $categories,
            'filters' => [
                'search' => $search,
                'category' => $category,
                'max_price' => $maxPrice,
            ],
            'recommendedProducts' => $recommendedProducts,
        ]);
    }

    public function show(int $id): View
    {
        $products = $this->products();
        $product = collect($products)->firstWhere('id', $id) ?? $products[0];

        return view('pages.product', [
            'product' => $product,
            'relatedProducts' => collect($products)
                ->where('category', $product['category'])
                ->where('id', '!=', $product['id'])
                ->take(4)
                ->values()
                ->all(),
        ]);
    }

    private function products(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Blush Rose Bouquet',
                'category' => 'Flowers',
                'price' => 1490,
                'badge' => 'Best Seller',
                'image' => '1.jpg',
                'description' => 'A soft pink rose bouquet wrapped for elegant gifting and romantic surprises.',
            ],
            [
                'id' => 2,
                'name' => 'Infinity Spark Ring',
                'category' => 'Jewelry',
                'price' => 1890,
                'badge' => 'Elegant',
                'image' => '2.jpg',
                'description' => 'A slim gold-toned infinity ring with stone detailing for timeless everyday style.',
            ],
            [
                'id' => 3,
                'name' => 'Scarlet Romance Bouquet',
                'category' => 'Flowers',
                'price' => 1990,
                'badge' => 'Romantic',
                'image' => '3.jpg',
                'description' => 'Deep red roses arranged in a premium wrap for anniversaries and heartfelt occasions.',
            ],
            [
                'id' => 4,
                'name' => 'Pure Almond Chocolate Bar',
                'category' => 'Chocolates',
                'price' => 420,
                'badge' => 'Sweet',
                'image' => '4.jpg',
                'description' => 'A classic chocolate bar with almond and walnut notes for quick gifting.',
            ],
            [
                'id' => 5,
                'name' => 'Nugali Premium Trio',
                'category' => 'Chocolates',
                'price' => 890,
                'badge' => 'Premium',
                'image' => '5.jpg',
                'description' => 'A refined set of premium chocolate bars for elegant gift hampers.',
            ],
            [
                'id' => 6,
                'name' => 'Crystal Bloom Stud',
                'category' => 'Jewelry',
                'price' => 1290,
                'badge' => 'Shine',
                'image' => '6.jpg',
                'description' => 'A floral crystal stud earring with a bright, celebratory finish.',
            ],
            [
                'id' => 7,
                'name' => 'Snowflake Crystal Stud',
                'category' => 'Jewelry',
                'price' => 1290,
                'badge' => 'Gift Pick',
                'image' => '7.jpg',
                'description' => 'A sparkling snowflake-style stud designed for a delicate gift set.',
            ],
            [
                'id' => 8,
                'name' => 'Braided Gold Bracelet',
                'category' => 'Jewelry',
                'price' => 1750,
                'badge' => 'Classic',
                'image' => '8.jpg',
                'description' => 'A polished bracelet with braided links that works for everyday wear and gifting.',
            ],
            [
                'id' => 9,
                'name' => 'Link Charm Bracelet',
                'category' => 'Jewelry',
                'price' => 2090,
                'badge' => 'Trending',
                'image' => '9.jpg',
                'description' => 'A modern chain bracelet with a central crystal link detail.',
            ],
            [
                'id' => 10,
                'name' => 'Infinity Knot Ring',
                'category' => 'Jewelry',
                'price' => 1690,
                'badge' => 'Minimal',
                'image' => '10.jpg',
                'description' => 'A sleek knot ring with a sculpted infinity shape for understated gifting.',
            ],
            [
                'id' => 11,
                'name' => 'Velvet Dark Chocolate',
                'category' => 'Chocolates',
                'price' => 560,
                'badge' => 'Dark',
                'image' => '11.jpg',
                'description' => 'A bold dark chocolate bar with gift-ready premium packaging.',
            ],
            [
                'id' => 12,
                'name' => 'Love Surprise Explosion Box',
                'category' => 'Gift Boxes',
                'price' => 1350,
                'badge' => 'Creative',
                'image' => '12.jpg',
                'description' => 'A handcrafted surprise box perfect for birthdays, proposals, and personal notes.',
            ],
            [
                'id' => 13,
                'name' => 'Sweet Teddy Snack Basket',
                'category' => 'Gift Hampers',
                'price' => 2490,
                'badge' => 'Popular',
                'image' => '13.jpg',
                'description' => 'A cheerful hamper filled with chocolates, snacks, and a soft teddy companion.',
            ],
            [
                'id' => 14,
                'name' => 'Celebration Snack Hamper',
                'category' => 'Gift Hampers',
                'price' => 1890,
                'badge' => 'Party',
                'image' => '14.jpg',
                'description' => 'A colorful snack hamper packed for birthdays, office treats, and festive gifting.',
            ],
            [
                'id' => 15,
                'name' => 'Pastel Garden Bouquet',
                'category' => 'Flowers',
                'price' => 1590,
                'badge' => 'Soft',
                'image' => '15.jpg',
                'description' => 'A pastel flower arrangement with roses and fillers for soft, elegant gifting.',
            ],
            [
                'id' => 16,
                'name' => 'Kinder Luxe Chocolate Bouquet',
                'category' => 'Chocolate Bouquets',
                'price' => 1790,
                'badge' => 'Luxury',
                'image' => '16.jpg',
                'description' => 'A wrapped bouquet of premium chocolates styled for impressive delivery.',
            ],
            [
                'id' => 17,
                'name' => 'Golden Bloom Perfume',
                'category' => 'Perfumes',
                'price' => 2290,
                'badge' => 'Fragrance',
                'image' => '17.jpg',
                'description' => 'A luminous perfume bottle suited for premium feminine gifting.',
            ],
            [
                'id' => 18,
                'name' => 'Shalimar Signature Perfume',
                'category' => 'Perfumes',
                'price' => 2490,
                'badge' => 'Signature',
                'image' => '18.jpg',
                'description' => 'A signature-style perfume with a refined bottle and occasion-ready presence.',
            ],
            [
                'id' => 19,
                'name' => 'Verde Fresh Perfume',
                'category' => 'Perfumes',
                'price' => 1890,
                'badge' => 'Fresh',
                'image' => '19.jpg',
                'description' => 'A modern green fragrance bottle for clean, versatile gifting.',
            ],
            [
                'id' => 20,
                'name' => 'Happy Birthday Mug',
                'category' => 'Personalized Gifts',
                'price' => 490,
                'badge' => 'Custom',
                'image' => '20.jpg',
                'description' => 'A bright printed mug that makes an easy and affordable birthday gift.',
            ],
            [
                'id' => 21,
                'name' => 'Pastel Spiral Notebook Set',
                'category' => 'Stationery',
                'price' => 380,
                'badge' => 'Study',
                'image' => '21.jpg',
                'description' => 'A vibrant set of spiral notebooks suited for students, journaling, and desk gifts.',
            ],
            [
                'id' => 22,
                'name' => 'Classic Spiral Notebook Pack',
                'category' => 'Stationery',
                'price' => 640,
                'badge' => 'Useful',
                'image' => '22.jpg',
                'description' => 'A practical multi-color notebook pack for study bundles and office gifting.',
            ],
        ];
    }
}
