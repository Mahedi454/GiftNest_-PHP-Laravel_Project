<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('pages.login');
    }

    public function showRegister()
    {
        return view('pages.register');
    }

    public function logout(Request $request)
    {
        // Placeholder. Replace with Laravel auth logout later.
        return redirect()->route('home');
    }
}

