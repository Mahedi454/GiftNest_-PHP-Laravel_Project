<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            return;
        }

        if (! extension_loaded('pdo_pgsql') && config('database.default') === 'pgsql') {
            return;
        }

        if (! Schema::hasTable('users')) {
            return;
        }

        User::updateOrCreate(
            ['email' => 'admin@giftnest.com'],
            [
                'name' => 'GiftNest Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
        );
    }
}
