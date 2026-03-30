<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $cart = collect($request->session()->get('cart', []));
        $subtotal = $cart->sum(fn (array $item) => $item['price'] * $item['quantity']);

        return view('pages.cart', [
            'cartItems' => $cart->values(),
            'subtotal' => $subtotal,
            'shipping' => $cart->isNotEmpty() ? 60 : 0,
        ]);
    }

    public function store(Request $request, Product $product): RedirectResponse
    {
        $cart = $request->session()->get('cart', []);
        $productKey = (string) $product->id;
        $quantity = max(1, (int) $request->input('quantity', 1));

        if (isset($cart[$productKey])) {
            $cart[$productKey]['quantity'] += $quantity;
        } else {
            $cart[$productKey] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => (float) $product->price,
                'image' => $product->image,
                'quantity' => $quantity,
                'total' => 0,
            ];
        }

        $cart[$productKey]['total'] = $cart[$productKey]['price'] * $cart[$productKey]['quantity'];

        $request->session()->put('cart', $cart);

        return redirect()
            ->back()
            ->with('status', 'Product added to cart.');
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $cart = $request->session()->get('cart', []);
        $productKey = (string) $product->id;

        if (! isset($cart[$productKey])) {
            return redirect()->route('cart');
        }

        $quantity = max(1, (int) $request->input('quantity', 1));
        $cart[$productKey]['quantity'] = $quantity;
        $cart[$productKey]['total'] = $cart[$productKey]['price'] * $quantity;

        $request->session()->put('cart', $cart);

        return redirect()
            ->route('cart')
            ->with('status', 'Cart updated successfully.');
    }

    public function destroy(Request $request, Product $product): RedirectResponse
    {
        $cart = $request->session()->get('cart', []);

        unset($cart[(string) $product->id]);

        $request->session()->put('cart', $cart);

        return redirect()
            ->route('cart')
            ->with('status', 'Item removed from cart.');
    }
}
