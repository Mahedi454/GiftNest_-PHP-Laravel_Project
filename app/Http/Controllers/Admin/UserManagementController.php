<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::query()->latest()->paginate(12),
            'userStats' => [
                'total' => User::query()->count(),
                'admins' => User::query()->where('role', 'admin')->count(),
                'customers' => User::query()->where('role', 'user')->count(),
            ],
        ]);
    }

    public function updateRole(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'role' => ['required', 'in:admin,user'],
        ]);

        if ($request->user()?->is($user) && $data['role'] !== 'admin') {
            return back()->with('status', 'You cannot remove admin access from your own account.');
        }

        $user->update($data);

        return back()->with('status', 'User role updated successfully.');
    }
}
