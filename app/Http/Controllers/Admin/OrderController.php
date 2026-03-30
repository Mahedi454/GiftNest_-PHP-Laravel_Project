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
        return view('admin.orders.index', [
            'orders' => Order::query()
                ->with(['user', 'items.product'])
                ->latest()
                ->paginate(12),
            'orderStats' => [
                'total' => Order::query()->count(),
                'pending' => Order::query()->where('status', 'pending')->count(),
                'completed' => Order::query()->where('status', 'completed')->count(),
                'revenue' => Order::query()->where('status', 'completed')->sum('total_price'),
            ],
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
