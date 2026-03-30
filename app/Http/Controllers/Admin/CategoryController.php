<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => Category::query()
                ->withCount('products')
                ->orderBy('name')
                ->get(),
            'categoryStats' => [
                'total' => Category::query()->count(),
                'with_products' => Category::query()->has('products')->count(),
                'empty' => Category::query()->doesntHave('products')->count(),
            ],
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Category::create($request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
        ]));

        return back()->with('status', 'Category created successfully.');
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $category->update($request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,'.$category->id],
        ]));

        return back()->with('status', 'Category updated successfully.');
    }

    public function destroy(Category $category): RedirectResponse
    {
        if ($category->products()->exists()) {
            return back()->with('status', 'Delete or move products from this category first.');
        }

        $category->delete();

        return back()->with('status', 'Category deleted successfully.');
    }
}
