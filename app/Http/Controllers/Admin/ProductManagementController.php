<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductManagementController extends Controller
{
    public function index(): View
    {
        $productQuery = Product::query()->with('category')->latest();

        return view('admin.products.index', [
            'products' => $productQuery->paginate(12),
            'productStats' => [
                'total' => Product::query()->count(),
                'active' => Product::query()->where('is_active', true)->count(),
                'categories' => Category::query()->count(),
                'low_stock' => Product::query()->where('stock', '<=', 5)->count(),
            ],
        ]);
    }

    public function create(): View
    {
        return view('admin.products.create', [
            'product' => new Product([
                'is_active' => true,
                'stock' => 0,
            ]),
            'categories' => Category::query()->orderBy('name')->get(),
            'formAction' => route('admin.products.store'),
            'formMethod' => 'POST',
            'pageTitle' => 'Add Product',
            'submitLabel' => 'Create product',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Product::create($this->validatedData($request));

        return redirect()
            ->route('admin.products')
            ->with('status', 'Product added successfully.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::query()->orderBy('name')->get(),
            'formAction' => route('admin.products.update', $product),
            'formMethod' => 'PUT',
            'pageTitle' => 'Edit Product',
            'submitLabel' => 'Save changes',
        ]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $product->update($this->validatedData($request));

        return redirect()
            ->route('admin.products')
            ->with('status', 'Product updated successfully.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('admin.products')
            ->with('status', 'Product deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'string', 'max:255'],
            'image_upload' => ['nullable', 'image', 'max:4096'],
            'description' => ['required', 'string'],
            'stock' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image_upload')) {
            $image = $request->file('image_upload');
            $filename = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
            $filename = $filename.'-'.time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $filename);
            $data['image'] = $filename;
        }

        unset($data['image_upload']);

        return $data;
    }
}

