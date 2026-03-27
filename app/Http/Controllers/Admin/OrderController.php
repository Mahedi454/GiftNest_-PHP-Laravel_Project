<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.orders', [
            'orders' => Order::query()
                ->with(['user', 'items.product'])
                ->latest()
                ->paginate(12),
        ]);
    }

    public function updateStatus(Request $request, Order $order): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,completed'],
        ]);

        $order->update($data);

        return back()->with('status', 'Order status updated successfully.');
    }
}
