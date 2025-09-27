<?php

namespace App\Providers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        View::composer('layouts.navigation', function ($view) {
            $count = 0;

            if (Auth::check()) {
                $cart = Auth::user()
                    ->cart()
                    ->withSum('items', 'qty')
                    ->first();

                $count = (int) ($cart?->items_sum_qty ?? 0);
            }

            $view->with('cartItemCount', $count);
        });

        View::composer(['components.admin-layout', 'layouts.admin'], function ($view) {
            $view->with('recentActivities', function () {
                return Order::with('user:id,name')
                    ->latest()
                    ->take(5)
                    ->get(['id', 'user_id', 'status', 'total', 'created_at']);
            });
        });
    }
}
