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
use OpenPayU_Configuration;

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
        OpenPayU_Configuration::setEnvironment('sandbox');
        OpenPayU_Configuration::setMerchantPosId('377814');
        OpenPayU_Configuration::setSignatureKey('cec7f96ee87b4457621da7bae8049ca1');

        OpenPayU_Configuration::setOauthClientId('377814');
        OpenPayU_Configuration::setOauthClientSecret('9f452ecfba439d6958136de2bd88565e');
    }
}
