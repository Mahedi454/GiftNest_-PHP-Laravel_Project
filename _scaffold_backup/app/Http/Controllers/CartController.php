<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.cart');
    }

    public function add(Request $request)
    {
        // Placeholder for session/db cart logic
        return redirect()->route('cart');
    }
}

