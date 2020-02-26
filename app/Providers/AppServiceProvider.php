<?php

namespace App\Providers;

use App\Models\Categories\Category;
use App\Models\Products\Product;
use App\Observers\Categories\CategoryObserve;
use App\Observers\Products\ProductObserver;
use App\Observers\Users\UserObserve;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Product::observe(ProductObserver::class);
        Category::observe(CategoryObserve::class);
        User::observe(UserObserve::class);
    }
}
