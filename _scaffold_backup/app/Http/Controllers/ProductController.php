<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.shop');
    }

    public function show(int $id)
    {
        return view('pages.product', ['productId' => $id]);
    }
}

