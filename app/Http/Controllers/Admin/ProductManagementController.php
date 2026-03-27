<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductManagementController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.products', [
            'products' => Product::query()
                ->with('category')
                ->latest()
                ->paginate(12),
        ]);
    }

    public function create(): View
    {
        return view('pages.admin.product-form', [
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
        return view('pages.admin.product-form', [
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
            'description' => ['required', 'string'],
            'stock' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}

