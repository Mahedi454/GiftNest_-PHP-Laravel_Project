<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{
    public function checkout()
    {
        return view('pages.checkout');
    }

    public function index()
    {
        return view('pages.orders');
    }
}

